<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $images = GalleryImage::orderBy('sort_order')->latest()->get();
        return view('admin.gallery.index', compact('images'));
    }

    public function create()
    {
        return view('admin.gallery.form', ['image' => new GalleryImage()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'      => ['required', 'string', 'max:150'],
            'image_file' => ['required', 'image', 'mimes:jpeg,jpg,png,webp', 'max:4096'],
            'event_name' => ['nullable', 'string', 'max:150'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['image_path'] = $request->file('image_file')->store('gallery', 'public');
        $data['sort_order'] = $data['sort_order'] ?? 0;
        unset($data['image_file']);

        GalleryImage::create($data);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Image added to gallery.');
    }

    public function edit(GalleryImage $gallery)
    {
        return view('admin.gallery.form', ['image' => $gallery]);
    }

    public function update(Request $request, GalleryImage $gallery)
    {
        $data = $request->validate([
            'title'      => ['required', 'string', 'max:150'],
            'image_file' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:4096'],
            'event_name' => ['nullable', 'string', 'max:150'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        if ($request->hasFile('image_file')) {
            Storage::disk('public')->delete($gallery->image_path);
            $data['image_path'] = $request->file('image_file')->store('gallery', 'public');
        }

        $data['sort_order'] = $data['sort_order'] ?? 0;
        unset($data['image_file']);

        $gallery->update($data);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery image updated.');
    }

    public function destroy(GalleryImage $gallery)
    {
        Storage::disk('public')->delete($gallery->image_path);
        $gallery->delete();
        return back()->with('success', 'Image removed from gallery.');
    }
}
