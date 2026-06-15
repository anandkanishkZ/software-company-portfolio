<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::approved()->latest()->get();

        return view('testimonials', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_name' => ['required', 'string', 'max:100'],
            'company'     => ['nullable', 'string', 'max:100'],
            'job_title'   => ['nullable', 'string', 'max:100'],
            'rating'      => ['required', 'integer', 'min:1', 'max:5'],
            'feedback'    => ['required', 'string', 'min:20', 'max:1000'],
        ]);

        Testimonial::create([
            'client_name' => $request->client_name,
            'company'     => $request->company,
            'job_title'   => $request->job_title,
            'rating'      => $request->rating,
            'feedback'    => $request->feedback,
            'source'      => 'public',
            'is_approved' => false,
        ]);

        return back()->with('review_submitted', 'Thank you! Your review has been submitted and will appear after approval.');
    }
}
