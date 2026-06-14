<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['title' => 'AI Virtual Assistant', 'description' => 'An intelligent AI-powered virtual assistant that responds to employee and customer inquiries in real time, reducing response times and improving satisfaction across your organisation.', 'icon' => 'bi-robot', 'sort_order' => 1],
            ['title' => 'AI Prototyping Solutions', 'description' => 'Affordable, rapid AI-based prototyping services that allow you to test and validate ideas quickly before committing to full-scale development — cutting your time-to-market significantly.', 'icon' => 'bi-lightning-charge', 'sort_order' => 2],
            ['title' => 'Digital Employee Experience', 'description' => 'Comprehensive platform to proactively identify and resolve issues impacting the digital workplace, ensuring your workforce remains productive and engaged at all times.', 'icon' => 'bi-people', 'sort_order' => 3],
            ['title' => 'Predictive Analytics', 'description' => 'Harness the power of machine learning to predict trends, identify bottlenecks, and make data-driven decisions that drive growth and operational efficiency.', 'icon' => 'bi-graph-up-arrow', 'sort_order' => 4],
            ['title' => 'Process Automation', 'description' => 'Automate repetitive workflows and manual processes with intelligent AI agents, freeing your teams to focus on high-value creative and strategic work.', 'icon' => 'bi-gear-wide-connected', 'sort_order' => 5],
            ['title' => 'Custom AI Integration', 'description' => 'Seamlessly integrate AI capabilities into your existing software stack — from ERP and CRM to bespoke legacy systems — without disrupting your current operations.', 'icon' => 'bi-puzzle', 'sort_order' => 6],
        ];

        foreach ($services as $service) {
            Service::firstOrCreate(['title' => $service['title']], $service);
        }
    }
}
