@extends('layouts.app')

@section('title', 'Systèmes Intelligents pour Entreprises Évolutives')

@push('styles')
<style>
    .gradient-text {
        background: linear-gradient(135deg, #ffffff 0%, #3b82f6 100%);
        -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    }
    .section-line {
        width: 1px; height: 80px;
        background: linear-gradient(to bottom, transparent, #3b82f6, transparent);
        margin: 0 auto;
    }
    .result-card {
        background: linear-gradient(135deg, rgba(255,255,255,0.03) 0%, rgba(255,255,255,0.01) 100%);
        border: 1px solid rgba(255,255,255,0.05); transition: all 0.4s ease;
    }
    .result-card:hover {
        border-color: rgba(59, 130, 246, 0.3);
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.05) 0%, rgba(255,255,255,0.01) 100%);
        transform: translateY(-5px);
    }
</style>
@endpush

@section('content')
    
    <!-- SECTION 1: HERO -->
    <section class="min-h-screen flex flex-col justify-center items-center relative px-6 text-center">
        <div class="max-w-4xl mx-auto">
            <div class="reveal" style="transition-delay: 0.1s;">
                <span class="inline-block text-xs uppercase tracking-widest text-accent mb-6 border border-accent/30 rounded-full px-4 py-2">
                    Architecture d'Entreprise
                </span>
            </div>
            
            <h1 class="reveal text-5xl md:text-7xl lg:text-8xl font-bold leading-[0.95] tracking-tighter mb-8" style="transition-delay: 0.2s;">
                Concevoir des systèmes<br>
                <span class="gradient-text">intelligents</span>
            </h1>
            
            <p class="reveal text-lg md:text-xl text-text-muted max-w-2xl mx-auto mb-12 font-light" style="transition-delay: 0.3s;">
                Pour des entreprises évolutives.
            </p>
            
            <div class="reveal" style="transition-delay: 0.4s;">
                <a href="{{ route('audit.create') }}" class="btn-primary inline-block text-white">
                    Demander un audit
                    <svg class="inline-block ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 opacity-50">
            <div class="w-6 h-10 border-2 border-white/20 rounded-full flex justify-center pt-2">
                <div class="w-1 h-2 bg-white/50 rounded-full animate-bounce"></div>
            </div>
        </div>
    </section>

    <!-- Divider -->
    <div class="section-line reveal"></div>

    <!-- SECTION 2: PROBLEM -->
    <section class="py-32 md:py-40 px-6">
        <div class="max-w-3xl mx-auto text-center">
            <p class="reveal text-sm uppercase tracking-widest text-text-muted mb-6">Le Constat</p>
            <h2 class="reveal text-3xl md:text-5xl font-bold text-text-main leading-tight" style="transition-delay: 0.1s;">
                Les entreprises perdent du temps avec des processus manuels <span class="text-red-400/80">inefficaces</span>.
            </h2>
        </div>
    </section>

    <!-- SECTION 3: SOLUTION -->
    <section class="py-32 md:py-40 px-6 relative">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-accent/10 rounded-full blur-[120px] pointer-events-none"></div>
        
        <div class="max-w-4xl mx-auto text-center relative z-10">
            <p class="reveal text-sm uppercase tracking-widest text-accent mb-6">Notre Approche</p>
            <h2 class="reveal text-3xl md:text-5xl font-bold leading-tight" style="transition-delay: 0.1s;">
                Pascal Systems conçoit des architectures automatisées adaptées à votre structure.
            </h2>
        </div>
    </section>

    <!-- SECTION 4: RESULTS -->
    <section class="py-32 md:py-40 px-6">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-16">
                <p class="reveal text-sm uppercase tracking-widest text-text-muted mb-6">Les Bénéfices</p>
                <h3 class="reveal text-xl md:text-2xl font-light text-text-muted">Une transformation mesurable.</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card 1 -->
                <div class="reveal result-card rounded-2xl p-8 text-center">
                    <div class="w-12 h-12 mx-auto mb-6 rounded-full border border-white/10 flex items-center justify-center">
                       <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h4 class="font-heading text-lg font-bold mb-2">Réduction</h4>
                    <p class="text-sm text-text-muted">Des tâches manuelles</p>
                </div>

                <!-- Card 2 -->
                <div class="reveal result-card rounded-2xl p-8 text-center" style="transition-delay: 0.1s;">
                    <div class="w-12 h-12 mx-auto mb-6 rounded-full border border-white/10 flex items-center justify-center">
                        <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h4 class="font-heading text-lg font-bold mb-2">Gain de temps</h4>
                    <p class="text-sm text-text-muted">Concentration sur la valeur</p>
                </div>

                <!-- Card 3 -->
                <div class="reveal result-card rounded-2xl p-8 text-center" style="transition-delay: 0.2s;">
                    <div class="w-12 h-12 mx-auto mb-6 rounded-full border border-white/10 flex items-center justify-center">
                        <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    </div>
                    <h4 class="font-heading text-lg font-bold mb-2">Scalabilité</h4>
                    <p class="text-sm text-text-muted">Croissance sans friction</p>
                </div>

                <!-- Card 4 -->
                <div class="reveal result-card rounded-2xl p-8 text-center" style="transition-delay: 0.3s;">
                    <div class="w-12 h-12 mx-auto mb-6 rounded-full border border-white/10 flex items-center justify-center">
                        <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <h4 class="font-heading text-lg font-bold mb-2">ROI Mesurable</h4>
                    <p class="text-sm text-text-muted">Impact financier direct</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 5: CTA -->
    <section id="contact" class="py-40 md:py-48 px-6 relative">
         <div class="absolute inset-0 bg-gradient-to-t from-accent/5 to-transparent pointer-events-none"></div>
         
         <div class="max-w-3xl mx-auto text-center relative z-10">
            <h2 class="reveal text-4xl md:text-6xl font-bold mb-8">
                Prêt à optimiser ?
            </h2>
            <p class="reveal text-text-muted text-lg mb-12" style="transition-delay: 0.1s;">
                Discutons de vos défis techniques et opérationnels.
            </p>
            <div class="reveal" style="transition-delay: 0.2s;">
                <a href="{{ route('booking.create') }}" class="border border-white/20 px-8 py-4 rounded-full text-white text-lg hover:bg-white/10 transition-all">
                    Réserver un appel de découverte
                </a>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    // Script spécifique pour l'animation de révélation au scroll
    const observerOptions = { threshold: 0.15, rootMargin: "0px 0px -50px 0px" };
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) entry.target.classList.add('active');
        });
    }, observerOptions);
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
</script>
@endpush
