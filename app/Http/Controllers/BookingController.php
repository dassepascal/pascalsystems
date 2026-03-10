<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Mail\BookingConfirmation;
use Illuminate\Support\Facades\Mail;

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

        $booking = Booking::create($validated);

        // Envoi de l'email
        Mail::to($booking->email)->send(new BookingConfirmation($booking));

        return back()->with('status', 'booking-sent');
    }
}
