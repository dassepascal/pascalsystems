<?php

namespace App\Http\Controllers;

use App\Models\AuditRequest;
use Illuminate\Http\Request;
use App\Mail\AuditConfirmation;
use Illuminate\Support\Facades\Mail;

class AuditController extends Controller
{
    // Affiche le formulaire
    public function create()
    {
        return view('audit.create');
    }

    // Traite la soumission
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'nullable|string|max:255',
            'challenge' => 'required|string',
            'message' => 'nullable|string',
        ]);

        $audit = AuditRequest::create($validated);

        // 1. Email de confirmation au client
        Mail::to($audit->email)->send(new AuditConfirmation($audit));

        // 2. Email de notification à l'admin (optionnel)
        // Remplacez 'admin@example.com' par votre vraie adresse email
        # 
        Mail::to('pascaldasse56@gmail.com')->send(new AuditConfirmation($audit));

        return back()->with('status', 'audit-sent');
    }

        

       
    }
