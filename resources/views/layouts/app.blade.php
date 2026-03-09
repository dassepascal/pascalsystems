<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pascal Systems | @yield('title', 'Architectures Automatisées')</title>
    
    <!-- Tailwind CSS & Fonts (CDN pour la simplicité) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=Space+Grotesk:wght@400;500;700&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'bg': '#09090b', 'card': '#111111', 'accent': '#3b82f6',
                        'text-main': '#f4f4f5', 'text-muted': '#a1a1aa',
                    },
                    fontFamily: {
                        'heading': ['"Space Grotesk"', 'sans-serif'],
                        'body': ['"Inter"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Styles globaux -->
    <style>
        html { scroll-behavior: smooth; }
        body { font-family: 'Inter', sans-serif; background-color: #09090b; color: #f4f4f5; overflow-x: hidden; }
        h1, h2, h3, label { font-family: 'Space Grotesk', sans-serif; }
        
        /* Boutons Globaux */
        .btn-primary {
            position: relative; background: #3b82f6; padding: 1rem 2.5rem;
            border-radius: 9999px; font-weight: 500; letter-spacing: 0.025em;
            transition: all 0.3s ease; border: 1px solid transparent; z-index: 1;
        }
        .btn-primary:hover {
            transform: translateY(-2px); background: transparent;
            border-color: #3b82f6; color: #3b82f6;
            box-shadow: 0 10px 40px -10px rgba(59, 130, 246, 0.6);
        }
        
        /* Animations Révélation */
        .reveal { opacity: 0; transform: translateY(40px); transition: all 1s cubic-bezier(0.16, 1, 0.3, 1); }
        .reveal.active { opacity: 1; transform: translateY(0); }
    </style>

    @stack('styles')
</head>
<body class="antialiased">

    <!-- Canvas Background (Global) -->
    <canvas id="canvas-bg" class="fixed top-0 left-0 w-full h-full z-0 opacity-60 pointer-events-none"></canvas>

    <!-- Main Container -->
    <div class="relative z-10">

        <!-- Navigation -->
        <nav class="fixed top-0 left-0 right-0 z-50 px-6 py-6 md:px-12 bg-bg/50 backdrop-blur-md border-b border-white/5">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <a href="{{ route('home') }}" class="font-heading text-xl font-bold tracking-tight hover:text-accent transition-colors">
                    Pascal<span class="text-accent">.</span>Systems
                </a>
                
                <div class="flex items-center gap-6">
                    <a href="{{ route('audit.create') }}" class="text-sm text-text-muted hover:text-white transition-colors hidden md:block">
                        Audit
                    </a>
                    <a href="{{ route('booking.create') }}" class="btn-primary text-white text-sm py-2 px-4">
                        Réserver un appel
                    </a>
                </div>
            </div>
        </nav>

        <!-- Le contenu de la page s'injecte ici -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="py-12 px-6 border-t border-white/5 mt-20">
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center text-sm text-text-muted">
                <div class="font-heading text-lg text-white mb-4 md:mb-0">
                    Pascal<span class="text-accent">.</span>Systems
                </div>
                <div>&copy; {{ date('Y') }} Pascal Systems. Tous droits réservés.</div>
            </div>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script> <!-- Si vous avez du JS local -->
    @stack('scripts')
    
    <!-- Script Canvas Minimaliste pour toutes les pages -->
    <script>
        const canvas = document.getElementById('canvas-bg');
        if (canvas) {
            const ctx = canvas.getContext('2d');
            let width, height, particles = [];
            const particleCount = 40;
            
            const resize = () => {
                width = canvas.width = window.innerWidth;
                height = canvas.height = window.innerHeight;
            };
            
            class Particle {
                constructor() {
                    this.x = Math.random() * width; this.y = Math.random() * height;
                    this.vx = (Math.random() - 0.5) * 0.5; this.vy = (Math.random() - 0.5) * 0.5;
                    this.radius = Math.random() * 1.5 + 0.5;
                }
                update() {
                    this.x += this.vx; this.y += this.vy;
                    if (this.x < 0 || this.x > width) this.vx *= -1;
                    if (this.y < 0 || this.y > height) this.vy *= -1;
                }
                draw() {
                    ctx.beginPath(); ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                    ctx.fillStyle = 'rgba(255, 255, 255, 0.4)'; ctx.fill();
                }
            }
            
            const init = () => {
                resize();
                particles = [];
                for (let i = 0; i < particleCount; i++) particles.push(new Particle());
            };
            
            const animate = () => {
                ctx.clearRect(0, 0, width, height);
                particles.forEach(p => { p.update(); p.draw(); });
                // Dessiner les connexions
                for (let i = 0; i < particles.length; i++) {
                    for (let j = i + 1; j < particles.length; j++) {
                        const dx = particles[i].x - particles[j].x;
                        const dy = particles[i].y - particles[j].y;
                        const dist = Math.sqrt(dx * dx + dy * dy);
                        if (dist < 150) {
                            ctx.beginPath(); ctx.moveTo(particles[i].x, particles[i].y);
                            ctx.lineTo(particles[j].x, particles[j].y);
                            ctx.strokeStyle = `rgba(59, 130, 246, ${0.15 * (1 - dist / 150)})`;
                            ctx.lineWidth = 0.5; ctx.stroke();
                        }
                    }
                }
                requestAnimationFrame(animate);
            };
            
            window.addEventListener('resize', resize);
            init(); animate();
        }
    </script>
</body>
</html>
