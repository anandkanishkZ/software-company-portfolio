<?php

namespace App\Http\Controllers;

use App\Models\Industry;

class IndustriesController extends Controller
{
    public function index()
    {
        $industries = Industry::all();

        return view('industries', compact('industries'));
    }
}
