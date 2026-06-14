<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'phone'        => 'required|string|max:50',
            'company_name' => 'required|string|max:255',
            'country'      => 'required|string|max:100',
            'job_title'    => 'required|string|max:255',
            'job_details'  => 'required|string|max:5000',
        ]);

        Contact::create($validated);

        return redirect()->route('contact')->with('success', 'Thank you! Your enquiry has been received. We will be in touch shortly.');
    }
}
