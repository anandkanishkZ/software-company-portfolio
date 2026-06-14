<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'How AI is Reshaping the Digital Employee Experience in 2025',
                'excerpt' => 'The workplace is evolving at an unprecedented pace. Discover how leading organisations are using AI to proactively resolve digital friction before it impacts productivity.',
                'content' => "The digital employee experience (DEX) has become a boardroom priority across every industry. As hybrid work solidifies as the new normal, the gap between a great digital workplace and a frustrating one has never been more consequential.\n\nAt AI-Solutions, we have spent the last three years working with organisations across healthcare, finance, and manufacturing to understand exactly where digital friction occurs — and more importantly, how AI can eliminate it before employees even notice a problem.\n\nThe cost of poor DEX is staggering. Research consistently shows that digital friction costs knowledge workers an average of two hours per day in lost productivity. Multiply that across a 500-person organisation and you are looking at over £4 million per year in lost output.\n\nThe AI-powered approach flips the traditional IT support model on its head. Rather than waiting for employees to raise tickets, predictive systems identify anomalies in device performance, application behaviour, and network connectivity — and resolve them automatically, often before the user experiences any impact.\n\nOrganisations that embrace proactive AI-driven DEX are not just solving IT problems. They are sending a clear signal to their workforce: we value your time, and we have invested in technology that proves it.",
                'author' => 'AI-Solutions Team',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'The Business Case for Affordable AI Prototyping',
                'excerpt' => 'Many organisations hesitate to invest in AI because the perceived cost and risk of large-scale deployments feels prohibitive. Rapid prototyping changes that equation entirely.',
                'content' => "One of the most common barriers we encounter in conversations with potential clients is the assumption that AI is expensive. This misconception often leads organisations to delay AI adoption until a competitor has already gained the advantage.\n\nAI prototyping is the antidote to this problem. Rather than committing to a full-scale AI deployment — which can cost hundreds of thousands of pounds and take 12-18 months to deliver — prototyping allows you to validate the core hypothesis of your AI use case in weeks, for a fraction of the cost.\n\nA prototype is not a finished product. It is a focused, functional demonstration of the AI capability you are trying to build, built quickly and intentionally to answer the question: does this work for our context?\n\nAt AI-Solutions, our prototyping engagements typically run 4-8 weeks and are structured around three phases: discovery (understanding your data, processes, and goals), build (developing the minimal viable AI model), and validate (testing with real users in your environment).\n\nThe result is not just a working prototype — it is the confidence to make informed investment decisions about your AI strategy, backed by evidence rather than assumption.",
                'author' => 'AI-Solutions Team',
                'published_at' => now()->subDays(14),
            ],
            [
                'title' => 'AI-Solutions Expands Global Operations from Sunderland HQ',
                'excerpt' => 'We are thrilled to announce the next chapter of our growth story, as AI-Solutions formally establishes partnerships in North America, Europe, and the Asia-Pacific region.',
                'content' => "Sunderland, UK — AI-Solutions is proud to announce a significant milestone in our journey to make a worldwide impact. Following three consecutive years of record growth, we are formalising our international expansion strategy with new partner agreements across three continents.\n\nOur mission has always been to democratise access to enterprise-grade AI technology — to make the tools that were once the preserve of FAANG-scale companies available to organisations of every size, in every industry, around the world.\n\nThe Sunderland tech scene has grown remarkably, and we are proud to be one of the companies at the forefront of that transformation. But our ambitions have always been global, and today we take a major step toward realising that vision.\n\nIn North America, we have partnered with three regional system integrators to bring our Digital Employee Experience platform to the US and Canadian markets. In APAC, a memorandum of understanding with a leading Singapore-based consultancy will open doors across Southeast Asia. And in Europe, our new German-language support capability means we can now serve clients in the DACH region more effectively than ever.\n\nIf you are interested in partnering with AI-Solutions or exploring how we can serve your market, please reach out through our contact form.",
                'author' => 'AI-Solutions Leadership Team',
                'published_at' => now()->subDays(30),
            ],
        ];

        foreach ($articles as $a) {
            Article::firstOrCreate(
                ['slug' => Str::slug($a['title'])],
                array_merge($a, ['slug' => Str::slug($a['title'])])
            );
        }
    }
}
