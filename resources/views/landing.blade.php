@extends('layouts.app')

@section('title', 'Pascal Systems — Designing intelligent systems for scalable businesses.')

@section('content')

    {{-- Section 1 — Hero --}}
    <section class="min-h-screen flex items-center">
        <div class="max-w-5xl mx-auto px-6 py-16 grid gap-10 md:grid-cols-2">
            <div class="space-y-6">
                <p class="text-xs uppercase tracking-[0.3em] text-neutral-400">
                    Pascal Systems
                </p>
                <h1 class="text-3xl md:text-5xl font-semibold leading-tight">
                    Designing intelligent systems<br>
                    for scalable businesses.
                </h1>
                <p class="text-neutral-400 text-sm md:text-base max-w-md">
                    Nous concevons des systèmes qui remplacent les processus manuels
                    par des architectures intelligentes, fiables et mesurables.
                </p>
                <div class="flex items-center gap-4">
                    <a href="#cta"
                       class="inline-flex items-center justify-center px-5 py-3 text-sm font-medium rounded-full bg-neutral-50 text-neutral-950 hover:bg-neutral-200 transition">
                        Request an Audit
                    </a>
                    <span class="text-xs text-neutral-500">
                        30 minutes pour comprendre vos enjeux, sans engagement.
                    </span>
                </div>
            </div>

            <div class="hidden md:flex items-center justify-center">
                <div class="aspect-[4/3] w-full max-w-md rounded-3xl border border-neutral-800 bg-gradient-to-br from-neutral-900 via-neutral-950 to-black p-6 flex flex-col justify-between">
                    <div class="space-y-3">
                        <p class="text-xs text-neutral-500">System overview</p>
                        <p class="text-sm text-neutral-300">
                            Orchestration des flux, automatisation des tâches, monitoring en temps réel.
                        </p>
                    </div>
                    <div class="space-y-2 text-xs text-neutral-400">
                        <p>• Ops automatisés</p>
                        <p>• Moins de friction humaine</p>
                        <p>• Infra prête à scaler</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Section 2 — Problème --}}
    <section id="problem" class="border-t border-neutral-900 bg-neutral-950/80">
        <div class="max-w-4xl mx-auto px-6 py-16 space-y-4">
            <p class="text-xs uppercase tracking-[0.3em] text-amber-400">
                Problem
            </p>
            <h2 class="text-2xl md:text-3xl font-medium">
                Les entreprises perdent du temps avec des processus manuels inefficaces.
            </h2>
            <p class="text-neutral-400 text-sm md:text-base max-w-2xl">
                Multiplication des outils, copier-coller, tâches répétitives, dépendance
                à quelques profils clés… Résultat&nbsp;: opérations fragiles, erreurs humaines,
                et impossibilité de scaler sereinement.
            </p>
        </div>
    </section>

    {{-- Section 3 — Solution --}}
    <section id="solution" class="border-t border-neutral-900 bg-neutral-950">
        <div class="max-w-4xl mx-auto px-6 py-16 space-y-4">
            <p class="text-xs uppercase tracking-[0.3em] text-sky-400">
                Solution
            </p>
            <h2 class="text-2xl md:text-3xl font-medium">
                Pascal Systems conçoit des architectures automatisées adaptées à votre structure.
            </h2>
            <p class="text-neutral-400 text-sm md:text-base max-w-2xl">
                Audit de vos workflows, modélisation des flux critiques, design d’un système
                automatisé aligné sur vos contraintes métiers (outils, équipes, compliance),
                puis mise en production progressive.
            </p>
        </div>
    </section>

    {{-- Section 4 — Résultats --}}
    <section id="results" class="border-t border-neutral-900 bg-neutral-950">
        <div class="max-w-5xl mx-auto px-6 py-16">
            <div class="flex items-baseline justify-between gap-4 mb-10">
                <div>
                    <p class="text-xs uppercase tracking-[0.3em] text-fuchsia-400">
                        Outcomes
                    </p>
                    <h2 class="text-2xl md:text-3xl font-medium">
                        Des systèmes qui délivrent des résultats tangibles.
                    </h2>
                </div>
            </div>

            <div class="grid gap-4 md:grid-cols-4 text-sm">
                <div class="rounded-2xl border border-neutral-900 bg-neutral-950/60 p-4">
                    <p class="text-neutral-300 font-medium">
                        Réduction des tâches manuelles
                    </p>
                    <p class="text-neutral-500 mt-2">
                        On élimine les actions répétitives à faible valeur via des scénarios robustes.
                    </p>
                </div>
                <div class="rounded-2xl border border-neutral-900 bg-neutral-950/60 p-4">
                    <p class="text-neutral-300 font-medium">
                        Gain de temps
                    </p>
                    <p class="text-neutral-500 mt-2">
                        Vos équipes se concentrent sur la stratégie, pas sur l’opérationnel mécanique.
                    </p>
                </div>
                <div class="rounded-2xl border border-neutral-900 bg-neutral-950/60 p-4">
                    <p class="text-neutral-300 font-medium">
                        Scalabilité
                    </p>
                    <p class="text-neutral-500 mt-2">
                        Une architecture pensée pour encaisser la croissance sans explosion des coûts humains.
                    </p>
                </div>
                <div class="rounded-2xl border border-neutral-900 bg-neutral-950/60 p-4">
                    <p class="text-neutral-300 font-medium">
                        ROI mesurable
                    </p>
                    <p class="text-neutral-500 mt-2">
                        Indicateurs clairs&nbsp;: temps gagné, tâches automatisées, volume traité par système.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Section 5 — Call to Action --}}
    <section id="cta" class="border-t border-neutral-900 bg-neutral-950">
        <div class="max-w-3xl mx-auto px-6 py-16 text-center space-y-6">
            <p class="text-xs uppercase tracking-[0.3em] text-red-400">
                Call to Action
            </p>
            <h2 class="text-2xl md:text-3xl font-medium">
                Book a discovery call.
            </h2>
            <p class="text-neutral-400 text-sm md:text-base max-w-xl mx-auto">
                En 30 à 45 minutes, nous cartographions vos processus clés et identifions
                les leviers d’automatisation les plus rapides à déployer.
            </p>

            <div class="flex flex-col sm:flex-row gap-3 justify-center items-center mt-4">
                <a href="#"
                   class="inline-flex items-center justify-center px-6 py-3 text-sm font-medium rounded-full bg-neutral-50 text-neutral-950 hover:bg-neutral-200 transition">
                    Book a discovery call
                </a>
                <span class="text-xs text-neutral-500">
                    Simple. Premium. Épuré.
                </span>
            </div>
        </div>
    </section>

@endsection
