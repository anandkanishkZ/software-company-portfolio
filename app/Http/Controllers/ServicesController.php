<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->get();

        return view('services', compact('services'));
    }
}
