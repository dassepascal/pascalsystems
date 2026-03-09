@extends('layouts.app')

@section('title', 'Réserver un appel')

@push('styles')
<style>
    /* Styles identiques à audit/create.blade.php pour la cohérence */
    .form-input { width: 100%; background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.1); padding: 1.25rem 1rem; border-radius: 12px; color: #fff; transition: all 0.3s ease; font-size: 1rem; }
    .form-input:focus { outline: none; border-color: #3b82f6; background: rgba(59, 130, 246, 0.05); box-shadow: 0 0 20px rgba(59, 130, 246, 0.1); }
    .form-label { display: block; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.1em; color: #a1a1aa; margin-bottom: 0.75rem; font-weight: 500; }
    select.form-input { appearance: none; background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e"); background-position: right 1rem center; background-repeat: no-repeat; background-size: 1.5em 1.5em; cursor: pointer; }
    select option { background-color: #111111; color: #ffffff; }
    .btn-submit { width: 100%; background: #3b82f6; padding: 1.25rem 2rem; border-radius: 12px; font-weight: 600; transition: all 0.3s ease; border: 1px solid transparent; }
    .btn-submit:hover { background: transparent; border-color: #3b82f6; color: #3b82f6; }
    .glass-card { background: linear-gradient(135deg, rgba(255,255,255,0.03) 0%, rgba(255,255,255,0.01) 100%); border: 1px solid rgba(255,255,255,0.05); backdrop-filter: blur(10px); }
    .feature-bullet { width: 24px; height: 24px; border-radius: 50%; background: rgba(59, 130, 246, 0.1); border: 1px solid rgba(59, 130, 246, 0.3); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
</style>
@endpush

@section('content')
<main class="flex-grow flex items-center justify-center px-6 py-24 md:py-32">
    <div class="w-full max-w-5xl grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24 items-center">
        
        <!-- Left Column: Value Prop -->
        <div class="reveal">
            <span class="inline-block text-xs uppercase tracking-widest text-accent mb-4 border border-accent/30 rounded-full px-4 py-2">Appel de Découverte</span>
            <h1 class="text-4xl md:text-5xl font-bold mb-6 tracking-tight leading-tight">
                30 minutes pour <br><span class="text-accent">clarifier</span> vos systèmes.
            </h1>
            <p class="text-text-muted text-lg mb-10 leading-relaxed">
                Un échange sans engagement pour identifier vos goulots d'étranglement.
            </p>
            <div class="space-y-5">
                <div class="flex items-start gap-4">
                    <div class="feature-bullet mt-1"><div class="w-2 h-2 bg-accent rounded-full"></div></div>
                    <div><h4 class="font-semibold text-white">Analyse rapide</h4><p class="text-sm text-text-muted">Nous examinons vos processus actuels.</p></div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="feature-bullet mt-1"><div class="w-2 h-2 bg-accent rounded-full"></div></div>
                    <div><h4 class="font-semibold text-white">Conseils personnalisés</h4><p class="text-sm text-text-muted">Des solutions concrètes, pas de jargon.</p></div>
                </div>
            </div>
        </div>

        <!-- Right Column: Form -->
        <div class="glass-card rounded-3xl p-8 md:p-10 reveal" style="transition-delay: 0.15s;">
            
            @if(session('status') === 'booking-sent')
                <div id="success-msg" class="text-center py-10">
                    <div class="text-green-400 mb-4">
                        <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-2">Rendez-vous confirmé</h3>
                    <p class="text-text-muted">Vous allez recevoir un récapitulatif par email.</p>
                </div>
            @else
                <h3 class="text-xl font-bold mb-6">Choisissez votre créneau</h3>
                <form action="{{ route('booking.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="fullname" class="form-label">Nom complet</label>
                        <input type="text" id="fullname" name="fullname" class="form-input @error('fullname') border-red-500 @enderror" placeholder="Jean Dupont" value="{{ old('fullname') }}" required>
                        @error('fullname') <p class="text-red-400 text-xs mt-2">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="email" class="form-label">Email professionnel</label>
                        <input type="email" id="email" name="email" class="form-input @error('email') border-red-500 @enderror" placeholder="jean@entreprise.com" value="{{ old('email') }}" required>
                        @error('email') <p class="text-red-400 text-xs mt-2">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="date" class="form-label">Date souhaitée</label>
                        <input type="date" id="date" name="date" class="form-input @error('date') border-red-500 @enderror" required>
                        @error('date') <p class="text-red-400 text-xs mt-2">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="time" class="form-label">Créneau préféré</label>
                        <select id="time" name="time" class="form-input @error('time') border-red-500 @enderror" required>
                            <option value="" disabled selected>Choisir une plage horaire</option>
                            <option value="09h-11h" {{ old('time') == '09h-11h' ? 'selected' : '' }}>Matin (09h - 11h)</option>
                            <option value="14h-16h" {{ old('time') == '14h-16h' ? 'selected' : '' }}>Après-midi (14h - 16h)</option>
                        </select>
                        @error('time') <p class="text-red-400 text-xs mt-2">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <button type="submit" class="btn-submit text-white">Réserver l'appel</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</main>
@endsection
