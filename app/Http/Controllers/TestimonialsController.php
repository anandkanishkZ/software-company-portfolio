<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;

class TestimonialsController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();

        return view('testimonials', compact('testimonials'));
    }
}
