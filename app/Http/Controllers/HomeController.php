<?php

namespace App\Http\Controllers;

use App\Models\Partner;

class HomeController extends Controller
{
    public function index()
    {
        $partners = Partner::latest()->get();

        return view('welcome', compact('partners'));
    }
}