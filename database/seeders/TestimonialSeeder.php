<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            ['client_name' => 'Sarah Mitchell', 'company' => 'NovaTech Systems', 'job_title' => 'Chief Technology Officer', 'rating' => 5, 'feedback' => 'AI-Solutions transformed how we handle internal support requests. The virtual assistant handles over 70% of queries autonomously, and our employee satisfaction scores have never been higher. Genuinely game-changing technology.'],
            ['client_name' => 'James Holbrook', 'company' => 'Meridian Finance Group', 'job_title' => 'Head of Digital Operations', 'rating' => 5, 'feedback' => 'The prototyping solution they delivered allowed us to validate our AI-driven loan assessment tool in just 6 weeks instead of 6 months. The team is incredibly knowledgeable and responsive throughout the entire engagement.'],
            ['client_name' => 'Dr. Priya Sharma', 'company' => 'Northern Health Trust', 'job_title' => 'Director of Digital Transformation', 'rating' => 5, 'feedback' => 'We were sceptical about AI in healthcare IT, but AI-Solutions proved us wrong. Their empathetic approach to understanding our workflows, combined with technical excellence, delivered results beyond what we thought possible.'],
            ['client_name' => 'Marco Bianchi', 'company' => 'AutoParts Europa GmbH', 'job_title' => 'VP of Manufacturing Operations', 'rating' => 4, 'feedback' => 'The predictive maintenance system has fundamentally changed how we manage our production floor. We have not had a single unexpected line shutdown in eight months. The ROI was evident within the first quarter of deployment.'],
            ['client_name' => 'Emma Thornton', 'company' => 'GreenLeaf Retail', 'job_title' => 'IT Director', 'rating' => 5, 'feedback' => 'From the initial discovery session to go-live, the AI-Solutions team was professional, thorough, and transparent. They genuinely care about delivering value rather than just shipping code. Outstanding partner.'],
            ['client_name' => 'Raj Patel', 'company' => 'CloudCore Logistics', 'job_title' => 'Head of Technology', 'rating' => 4, 'feedback' => 'Integrating AI into our existing supply chain software seemed daunting, but AI-Solutions made it seamless. The custom integration layer they built is robust, well-documented, and our ops team loves it.'],
        ];

        foreach ($testimonials as $t) {
            Testimonial::firstOrCreate(['client_name' => $t['client_name'], 'company' => $t['company']], $t);
        }
    }
}
