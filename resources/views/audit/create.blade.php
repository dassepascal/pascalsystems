@extends('layouts.app')

@section('title', 'Demande d\'Audit')

@push('styles')
<style>
    .form-input {
        width: 100%; background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 1.25rem 1rem; border-radius: 12px;
        color: #fff; transition: all 0.3s ease; font-size: 1rem;
    }
    .form-input:focus {
        outline: none; border-color: #3b82f6;
        background: rgba(59, 130, 246, 0.05);
        box-shadow: 0 0 20px rgba(59, 130, 246, 0.1);
    }
    .form-label { display: block; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.1em; color: #a1a1aa; margin-bottom: 0.75rem; font-weight: 500; }
    select.form-input { appearance: none; background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e"); background-position: right 1rem center; background-repeat: no-repeat; background-size: 1.5em 1.5em; cursor: pointer; }
    select option { background-color: #111111; color: #ffffff; }
    .btn-submit { width: 100%; background: #3b82f6; padding: 1.25rem 2rem; border-radius: 12px; font-weight: 600; letter-spacing: 0.05em; transition: all 0.3s ease; border: 1px solid transparent; }
    .btn-submit:hover { background: transparent; border-color: #3b82f6; color: #3b82f6; }
    .glass-card { background: linear-gradient(135deg, rgba(255,255,255,0.03) 0%, rgba(255,255,255,0.01) 100%); border: 1px solid rgba(255,255,255,0.05); backdrop-filter: blur(10px); }
</style>
@endpush

@section('content')
<main class="flex-grow flex items-center justify-center px-6 py-24 md:py-32">
    <div class="w-full max-w-2xl">
        
        <!-- Header -->
        <div class="text-center mb-12 reveal">
            <span class="inline-block text-xs uppercase tracking-widest text-accent mb-4 border border-accent/30 rounded-full px-4 py-2">
                Audit Gratuit
            </span>
            <h1 class="text-4xl md:text-5xl font-bold mb-4 tracking-tight">Faisons le point.</h1>
            <p class="text-text-muted text-lg max-w-md mx-auto">
                Répondez à quelques questions pour nous permettre de préparer votre audit personnalisé.
            </p>
        </div>

        <!-- Form Card -->
        <div class="glass-card rounded-3xl p-8 md:p-12 reveal" style="transition-delay: 0.1s;">
            
            <!-- Message de Succès -->
            @if(session('status') === 'audit-sent')
                <div id="success-msg" class="text-center py-10">
                    <div class="text-green-400 mb-4">
                        <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-2">Demande envoyée</h3>
                    <p class="text-text-muted">Merci pour votre confiance. Nous reviendrons vers vous rapidement.</p>
                    <a href="{{ route('home') }}" class="inline-block mt-8 text-sm text-accent border-b border-accent/30 hover:border-accent transition-colors">Retour à l'accueil</a>
                </div>
            @else
                <form action="{{ route('audit.store') }}" method="POST" class="space-y-8">
                    @csrf
                    
                    <!-- Name -->
                    <div class="form-group">
                        <label for="name" class="form-label">Votre Nom</label>
                        <input type="text" id="name" name="name" class="form-input @error('name') border-red-500 @enderror" placeholder="Jean Dupont" value="{{ old('name') }}" required>
                        @error('name') <p class="text-red-400 text-xs mt-2">{{ $message }}</p> @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email" class="form-label">Email Professionnel</label>
                        <input type="email" id="email" name="email" class="form-input @error('email') border-red-500 @enderror" placeholder="jean@entreprise.com" value="{{ old('email') }}" required>
                        @error('email') <p class="text-red-400 text-xs mt-2">{{ $message }}</p> @enderror
                    </div>

                    <!-- Company -->
                    <div class="form-group">
                        <label for="company" class="form-label">Nom de l'entreprise</label>
                        <input type="text" id="company" name="company" class="form-input" placeholder="Pascal Corp" value="{{ old('company') }}">
                    </div>

                    <!-- Problem -->
                    <div class="form-group">
                        <label for="challenge" class="form-label">Votre défi principal</label>
                        <select id="challenge" name="challenge" class="form-input @error('challenge') border-red-500 @enderror" required>
                            <option value="" disabled selected>Sélectionner une option</option>
                            <option value="manual_processes" {{ old('challenge') == 'manual_processes' ? 'selected' : '' }}>Processus manuels chronophages</option>
                            <option value="scalability" {{ old('challenge') == 'scalability' ? 'selected' : '' }}>Difficultés à scaler l'activité</option>
                            <option value="data_silos" {{ old('challenge') == 'data_silos' ? 'selected' : '' }}>Données dispersées (Silos)</option>
                            <option value="tech_debt" {{ old('challenge') == 'tech_debt' ? 'selected' : '' }}>Dette technique</option>
                            <option value="other" {{ old('challenge') == 'other' ? 'selected' : '' }}>Autre</option>
                        </select>
                        @error('challenge') <p class="text-red-400 text-xs mt-2">{{ $message }}</p> @enderror
                    </div>

                    <!-- Message -->
                    <div class="form-group">
                        <label for="message" class="form-label">Contexte additionnel (Optionnel)</label>
                        <textarea id="message" name="message" rows="4" class="form-input" placeholder="Décrivez brièvement vos outils actuels...">{{ old('message') }}</textarea>
                    </div>

                    <!-- Submit -->
                    <div>
                        <button type="submit" class="btn-submit text-white">Envoyer la demande</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</main>
@endsection
