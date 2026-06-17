<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Partner;

class HomeController extends Controller
{
    public function index()
    {
        $partners = Partner::latest()->get();
        $events = Event::orderBy('date')->take(6)->get();

        return view('welcome', compact('partners', 'events'));
    }
}