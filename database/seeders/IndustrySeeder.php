<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    public function run(): void
    {
        $industries = [
            [
                'name'        => 'Healthcare',
                'title'       => 'Transforming NHS Digital Employee Workflows',
                'description' => 'A major NHS trust was struggling with slow IT ticket resolution times, leading to frustrated clinical staff and delays in patient care access. Paper-based processes and disconnected systems were causing a 72-hour average resolution time.',
                'solution'    => 'We deployed our AI Virtual Assistant integrated with the NHS service desk, which automatically categorised and resolved 65% of common IT issues without human intervention. This reduced average resolution time to under 4 hours and saved the trust £340,000 annually.',
                'image'       => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=800&h=500&fit=crop&auto=format',
            ],
            [
                'name'        => 'Manufacturing',
                'title'       => 'Predictive Maintenance for Smart Factories',
                'description' => 'A Tier-1 automotive manufacturer faced costly unplanned downtime across 12 production lines. Legacy equipment lacked monitoring capability, and reactive maintenance strategies were consuming over 30% of the maintenance budget on emergency repairs.',
                'solution'    => 'We implemented an AI-powered predictive maintenance solution using IoT sensor data and machine learning models. The system now predicts equipment failures 48–72 hours in advance with 94% accuracy, reducing unplanned downtime by 78% and cutting maintenance costs by £1.2M per year.',
                'image'       => 'https://images.unsplash.com/photo-1565043589221-1a6fd9ae45c7?w=800&h=500&fit=crop&auto=format',
            ],
            [
                'name'        => 'Financial Services',
                'title'       => 'AI-Driven Compliance Automation for FinTech',
                'description' => 'A fast-growing FinTech company needed to scale compliance operations without proportional headcount growth. Manual review processes created a backlog of 5,000+ transactions per day waiting for sign-off.',
                'solution'    => 'Our AI compliance engine trained on FCA and GDPR frameworks auto-screens transactions, flags anomalies, and generates audit trails. Result: 91% of transactions are auto-approved, compliance team capacity tripled, and zero regulatory fines in two years.',
                'image'       => 'https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?w=800&h=500&fit=crop&auto=format',
            ],
            [
                'name'        => 'Retail',
                'title'       => 'Personalised AI Shopping Experiences at Scale',
                'description' => 'A UK retail chain with 200+ stores and an e-commerce platform was seeing declining basket sizes and high cart abandonment rates. Their recommendation engine was outdated and unable to leverage real-time behavioural signals.',
                'solution'    => 'We built a real-time AI recommendation engine processing 2M+ daily interactions, delivering hyper-personalised product suggestions across web, app, and in-store kiosks. Basket size increased by 34% and cart abandonment dropped by 22% within three months.',
                'image'       => 'https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?w=800&h=500&fit=crop&auto=format',
            ],
            [
                'name'        => 'Logistics',
                'title'       => 'AI Route Optimisation Across Last-Mile Delivery',
                'description' => 'A national courier company was operating with static route planning built on 10-year-old algorithms. Rising fuel costs, traffic unpredictability, and increasing parcel volumes were driving per-delivery costs up 18% year-on-year.',
                'solution'    => 'Our AI-powered dynamic routing platform continuously recalculates optimal delivery routes using live traffic, weather, and parcel priority data. The result: fuel costs reduced by 26%, on-time delivery rates improved to 98.4%, and drivers complete 14% more stops per shift.',
                'image'       => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=800&h=500&fit=crop&auto=format',
            ],
            [
                'name'        => 'Education',
                'title'       => 'Intelligent Tutoring Systems for Universities',
                'description' => 'A Russell Group university was concerned about student dropout rates, particularly in the first year. Academic support teams lacked the capacity to identify at-risk students early enough to intervene effectively.',
                'solution'    => 'We developed an AI early-intervention platform that analyses engagement signals — attendance, VLE activity, submission patterns — to identify at-risk students 6 weeks before a crisis point. Dropout rates fell by 31% in the first academic year, saving the university £2.4M in lost tuition.',
                'image'       => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800&h=500&fit=crop&auto=format',
            ],
        ];

        foreach ($industries as $industry) {
            Industry::updateOrCreate(['name' => $industry['name']], $industry);
        }
    }
}
