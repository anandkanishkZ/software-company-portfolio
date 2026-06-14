<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.form', ['testimonial' => new Testimonial()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'client_name' => ['required', 'string', 'max:100'],
            'company'     => ['nullable', 'string', 'max:100'],
            'job_title'   => ['nullable', 'string', 'max:100'],
            'rating'      => ['required', 'integer', 'min:1', 'max:5'],
            'feedback'    => ['required', 'string', 'max:1000'],
        ]);

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial added successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.form', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'client_name' => ['required', 'string', 'max:100'],
            'company'     => ['nullable', 'string', 'max:100'],
            'job_title'   => ['nullable', 'string', 'max:100'],
            'rating'      => ['required', 'integer', 'min:1', 'max:5'],
            'feedback'    => ['required', 'string', 'max:1000'],
        ]);

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return back()->with('success', 'Testimonial deleted.');
    }
}
