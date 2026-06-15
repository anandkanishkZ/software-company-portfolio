<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::latest()->get();
        return view('admin.industries.index', compact('industries'));
    }

    public function create()
    {
        return view('admin.industries.form', ['industry' => new Industry()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => ['required', 'string', 'max:100'],
            'title'       => ['required', 'string', 'max:200'],
            'description' => ['required', 'string', 'max:1000'],
            'solution'    => ['required', 'string', 'max:1000'],
            'image'       => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('industries', 'public');
        }

        Industry::create($data);

        return redirect()->route('admin.industries.index')
            ->with('success', 'Industry added successfully.');
    }

    public function edit(Industry $industry)
    {
        return view('admin.industries.form', compact('industry'));
    }

    public function update(Request $request, Industry $industry)
    {
        $data = $request->validate([
            'name'        => ['required', 'string', 'max:100'],
            'title'       => ['required', 'string', 'max:200'],
            'description' => ['required', 'string', 'max:1000'],
            'solution'    => ['required', 'string', 'max:1000'],
            'image'       => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            if ($industry->image) {
                Storage::disk('public')->delete($industry->image);
            }
            $data['image'] = $request->file('image')->store('industries', 'public');
        }

        $industry->update($data);

        return redirect()->route('admin.industries.index')
            ->with('success', 'Industry updated successfully.');
    }

    public function destroy(Industry $industry)
    {
        if ($industry->image) {
            Storage::disk('public')->delete($industry->image);
        }

        $industry->delete();
        return back()->with('success', 'Industry deleted.');
    }
}
