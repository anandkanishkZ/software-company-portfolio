<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'title' => 'AI in the Workplace Summit 2026',
                'description' => 'Join AI-Solutions at the UK\'s premier conference on artificial intelligence and the future of work. We will be presenting a keynote session and hosting a live demo booth.',
                'location' => 'Excel London, London, UK',
                'event_date' => now()->addDays(30),
                'link' => null,
            ],
            [
                'title' => 'North East Tech Expo 2026',
                'description' => 'AI-Solutions is proud to be a headline sponsor of the North East Tech Expo, bringing together the region\'s most innovative technology companies and thought leaders.',
                'location' => 'Sunderland AFC Stadium of Light, Sunderland, UK',
                'event_date' => now()->addDays(55),
                'link' => null,
            ],
            [
                'title' => 'Digital Health Innovation Forum',
                'description' => 'A focused roundtable event for NHS and private healthcare leaders exploring AI-driven solutions to workforce challenges and digital infrastructure.',
                'location' => 'Newcastle Civic Centre, Newcastle upon Tyne, UK',
                'event_date' => now()->addDays(80),
                'link' => null,
            ],
            [
                'title' => 'AI-Solutions Annual Client Day 2025',
                'description' => 'Our annual gathering of clients, partners, and industry leaders. A day of insights, networking, and a first look at our upcoming product roadmap.',
                'location' => 'Sunderland, UK',
                'event_date' => now()->subMonths(3),
                'link' => null,
            ],
        ];

        foreach ($events as $event) {
            Event::firstOrCreate(['title' => $event['title']], $event);
        }
    }
}
