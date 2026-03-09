<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Affiche le formulaire
    public function create()
    {
        return view('booking.create');
    }

    // Traite la soumission
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date' => 'required|date|after:today',
            'time' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        Booking::create($validated);

        return back()->with('status', 'booking-sent');
    }
}
