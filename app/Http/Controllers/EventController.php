<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show(Event $event)
    {
        return view('event-detail', compact('event'));
    }

    public function ticket()
    {
        return view('ticket');
    }
}