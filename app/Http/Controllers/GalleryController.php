<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;

class GalleryController extends Controller
{
    public function index()
    {
        $images = GalleryImage::orderBy('sort_order')->get();
        $events = $images->pluck('event_name')->unique()->filter();

        return view('gallery', compact('images', 'events'));
    }
}
