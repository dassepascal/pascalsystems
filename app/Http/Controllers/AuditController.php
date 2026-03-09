<?php

namespace App\Http\Controllers;

use App\Models\AuditRequest;
use Illuminate\Http\Request;

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

        AuditRequest::create($validated);

        // Ici, vous pourriez ajouter l'envoi d'email (Mail::to...)

        return back()->with('status', 'audit-sent');
    }
}
