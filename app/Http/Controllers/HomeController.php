<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Industry;
use App\Models\Testimonial;
use App\Models\Article;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->take(6)->get();
        $industries = Industry::take(3)->get();
        $testimonials = Testimonial::approved()->latest()->take(4)->get();
        $articles = Article::whereNotNull('published_at')->latest('published_at')->take(3)->get();
        $events = Event::where('event_date', '>=', now())->orderBy('event_date')->take(3)->get();

        return view('home', compact('services', 'industries', 'testimonials', 'articles', 'events'));
    }
}
