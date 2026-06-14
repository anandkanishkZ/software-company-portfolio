<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;

class ChatbotController extends Controller
{
    private const SYSTEM_PROMPT = <<<PROMPT
You are an AI virtual assistant for AI-Solutions, a technology company headquartered in Sunderland, United Kingdom.

Your role is to help website visitors learn about our company, services, and how we can help them.

About AI-Solutions:
- We leverage artificial intelligence to assist various industries with software solutions
- We rapidly and proactively address issues that impact the digital employee experience
- We specialise in speeding up design, engineering, and innovation for businesses
- Our unique selling point is an AI-powered virtual assistant that responds to user inquiries
- We provide affordable AI-based prototyping solutions
- Our mission: to innovate, promote, and deliver the future of the digital employee experience
- We support people at work globally, with a focus on human-centred AI
- Based in Sunderland, UK, but serving clients worldwide

Our Services:
- AI-Powered Virtual Assistants for business operations
- Intelligent Process Automation to streamline workflows
- Predictive Analytics & Business Intelligence
- AI Prototyping & Rapid Solution Development
- Digital Employee Experience optimisation
- Custom AI Software Solutions for any industry

Industries we serve: Healthcare, Financial Services, Manufacturing, Retail, Logistics, Education, and more.

Contact: hello@ai-solutions.co.uk | +44 191 000 0000 | Sunderland, UK

Guidelines:
- Be friendly, professional, and concise
- Answer questions about our services, industries, and company
- Encourage visitors to use the Contact Us form for specific project requirements
- If asked about pricing, say it depends on project scope and invite them to get in touch
- Keep responses short and scannable (2-4 sentences max unless more detail is needed)
- Do not make up specific case studies or client names
- If asked something outside our scope, politely redirect to our services
PROMPT;

    public function chat(Request $request)
    {
        $key = 'chatbot:' . $request->ip();

        if (RateLimiter::tooManyAttempts($key, 30)) {
            return response()->json(['error' => 'Too many messages. Please wait a moment.'], 429);
        }

        RateLimiter::hit($key, 60);

        $validated = $request->validate([
            'messages' => ['required', 'array', 'max:20'],
            'messages.*.role' => ['required', 'in:user,assistant'],
            'messages.*.content' => ['required', 'string', 'max:1000'],
        ]);

        $apiKey = config('services.deepseek.key');

        if (empty($apiKey)) {
            return response()->json(['error' => 'Chatbot is unavailable.'], 503);
        }

        $messages = array_merge(
            [['role' => 'system', 'content' => self::SYSTEM_PROMPT]],
            $validated['messages']
        );

        $response = Http::timeout(20)
            ->withOptions([
                'curl' => [
                    CURLOPT_CAINFO => storage_path('cacert.pem'),
                    CURLOPT_SSL_VERIFYPEER => true,
                ],
            ])
            ->withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type'  => 'application/json',
            ])
            ->post('https://api.deepseek.com/chat/completions', [
                'model'       => 'deepseek-chat',
                'messages'    => $messages,
                'max_tokens'  => 300,
                'temperature' => 0.7,
            ]);

        if ($response->status() === 402) {
            return response()->json(['error' => 'The AI assistant is temporarily offline. Please use our Contact Us form to reach the team.'], 503);
        }

        if ($response->failed()) {
            return response()->json(['error' => 'Unable to get a response. Please try again.'], 502);
        }

        $reply = $response->json('choices.0.message.content', 'Sorry, I could not generate a response. Please try again.');

        return response()->json(['reply' => $reply]);
    }
}
