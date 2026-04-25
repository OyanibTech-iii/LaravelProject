<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'IcedCoffee') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            @keyframes slideInUp {
                from { opacity: 0; transform: translateY(30px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-load {
                animation: slideInUp 0.8s cubic-bezier(0.22, 1, 0.36, 1) forwards;
            }

            .reveal {
                opacity: 0;
                transform: translateY(20px);
                transition: all 0.6s cubic-bezier(0.22, 1, 0.36, 1);
                will-change: transform, opacity;
            }

            .reveal.active {
                opacity: 1;
                transform: translateY(0);
            }

            .reveal-delay-1 { transition-delay: 0.1s; }
            .reveal-delay-2 { transition-delay: 0.2s; }
            .reveal-delay-3 { transition-delay: 0.3s; }
            .reveal-delay-4 { transition-delay: 0.4s; }
        </style>
    </head>
    <body class="font-sans text-navy antialiased bg-cream">
        <div class="min-h-screen flex flex-col sm:justify-center items-center p-4">
            <div class="animate-load w-full {{ isset($sideImage) ? 'max-w-5xl' : 'max-w-md' }} bg-white shadow-2xl shadow-navy/5 overflow-hidden rounded-[3rem] border border-gray-100 flex flex-col {{ ($sideLeft ?? false) ? 'md:flex-row-reverse' : 'md:flex-row' }}">
                
                {{-- Form Side --}}
                <div class="w-full {{ isset($sideImage) ? 'md:w-1/2' : '' }} px-8 py-12 md:px-12 flex flex-col justify-center">
                    <div class="flex justify-center mb-10">
                        <a href="/" class="flex flex-col items-center gap-2 group">
                            <img src="{{ asset('assets/images/logotransparent.png') }}" alt="IcedCoffee Logo" class="h-20 w-auto object-contain transition-transform group-hover:scale-105">
                            <span class="text-2xl font-extrabold tracking-tight text-navy ">IcedCoffee</span>
                        </a>
                    </div>
                    {{ $slot }}
                </div>

                {{-- Image Side --}}
                @if(isset($sideImage))
                    <div class="hidden md:block md:w-1/2 relative">
                        {{ $sideImage }}
                        <div class="absolute inset-0 bg-gradient-to-{{ ($sideLeft ?? false) ? 'r' : 'l' }} from-transparent to-white/10"></div>
                    </div>
                @endif
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('active');
                        }
                    });
                }, { threshold: 0.01 });

                document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
            });
        </script>
    </body>
</html>
