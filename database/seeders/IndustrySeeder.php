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
                'name' => 'Healthcare',
                'title' => 'Transforming NHS Digital Employee Workflows',
                'description' => 'A major NHS trust was struggling with slow IT ticket resolution times, leading to frustrated clinical staff and delays in patient care access. Paper-based processes and disconnected systems were causing a 72-hour average resolution time.',
                'solution' => 'We deployed our AI Virtual Assistant integrated with the NHS service desk, which automatically categorised and resolved 65% of common IT issues without human intervention. This reduced average resolution time to under 4 hours and saved the trust £340,000 annually.',
                'image' => null,
            ],
            [
                'name' => 'Manufacturing',
                'title' => 'Predictive Maintenance for Smart Factories',
                'description' => 'A Tier-1 automotive manufacturer faced costly unplanned downtime across 12 production lines. Legacy equipment lacked monitoring capability, and reactive maintenance strategies were consuming over 30% of the maintenance budget on emergency repairs.',
                'solution' => 'We implemented an AI-powered predictive maintenance solution using IoT sensor data and machine learning models. The system now predicts equipment failures 48–72 hours in advance with 94% accuracy, reducing unplanned downtime by 78% and cutting maintenance costs by £1.2M per year.',
                'image' => null,
            ],
            [
                'name' => 'Financial Services',
                'title' => 'AI-Driven Compliance Automation for FinTech',
                'description' => 'A fast-growing FinTech company needed to scale compliance operations without proportional headcount growth. Manual review processes created a backlog of 5,000+ transactions per day waiting for sign-off.',
                'solution' => 'Our AI compliance engine trained on FCA and GDPR frameworks auto-screens transactions, flags anomalies, and generates audit trails. Result: 91% of transactions are auto-approved, compliance team capacity tripled, and zero regulatory fines in two years.',
                'image' => null,
            ],
        ];

        foreach ($industries as $industry) {
            Industry::firstOrCreate(['name' => $industry['name']], $industry);
        }
    }
}
