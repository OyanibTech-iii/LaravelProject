<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IcedCoffee | Artisan Specialty Coffee</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.8s cubic-bezier(0.22, 1, 0.36, 1);
            will-change: transform, opacity;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0) !important;
        }

        /* Stagger delays for children */
        .reveal-delay-1 { transition-delay: 0.15s; }
        .reveal-delay-2 { transition-delay: 0.3s; }
        .reveal-delay-3 { transition-delay: 0.45s; }
    </style>
</head>

<body class="bg-cream text-navy font-sans antialiased">
    {{-- Navbar --}}
    <nav class="sticky top-0 z-50 bg-cream/80 backdrop-blur-md border-b border-navy/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center gap-2">
                    <span class="text-2xl font-bold tracking-tight">IcedCoffee</span>
                </div>
                <div class="hidden md:flex items-center gap-8">
                    <a href="#features" class="font-medium hover:text-brick transition-colors">Features</a>
                    <a href="#about" class="font-medium hover:text-brick transition-colors">About</a>
                    <a href="#menu" class="font-medium hover:text-brick transition-colors">Menu</a>
                    <a href="#gallery" class="font-medium hover:text-brick transition-colors">Gallery</a>
                    <a href="#testimonials" class="font-medium hover:text-brick transition-colors">Stories</a>
                    <a href="#contact" class="font-medium hover:text-brick transition-colors">Contact</a>
                    <div class="flex items-center gap-4 ml-4">
                        <a href="/login" class="font-bold text-navy hover:text-brick transition-colors">Log in</a>
                        <a href="/register"
                            class="bg-brick text-white px-6 py-2.5 rounded-full font-bold hover:bg-coffee-700 transition-all shadow-lg shadow-brick/20">Register</a>
                    </div>
                </div>
                <button class="md:hidden text-navy">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>

{{-- Hero Section --}}
        <section class="relative h-[85vh] flex items-center overflow-hidden bg-zinc-900">
            {{-- Background Glow (Helps the coffee pop) --}}
            <div class="absolute top-1/2 left-3/4 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-coffee-600/20 blur-[100px] rounded-full"></div>

            {{-- Floating Iced Coffee --}}
            <div class="absolute inset-0 z-0 flex items-center justify-end pr-10 md:pr-32 pointer-events-none">
                <img src="assets/images/heroimage.png" 
                     alt="3D Iced Coffee" 
                     class="h-[90vh] md:h-[90vh] object-contain drop-shadow-[0_35px_35px_rgba(0,0,0,0.5)] animate-float">
            </div>

            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full text-white">
                <div class="max-w-2xl">
                    <h1 class="text-5xl md:text-7xl font-bold leading-tight mb-6">
                        Crafting the Perfect Brew, <span class="text-coffee-600">One Cup</span> at a Time
                    </h1>
                    <p class="text-xl md:text-2xl text-white/80 mb-10">
                        Experience the rich aroma and exquisite taste of our sustainably sourced, artisan-roasted specialty coffee.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#menu" class="bg-brick text-white px-8 py-4 rounded-full font-bold text-lg text-center hover:bg-coffee-700 transition-all">Explore Menu</a>
                        <a href="#about" class="bg-white/10 backdrop-blur-md border border-white/30 text-white px-8 py-4 rounded-full font-bold text-lg text-center hover:bg-white/20 transition-all">Our Story</a>
                    </div>
                </div>
            </div>
        </section>

    {{-- Features Section --}}
    <section id="features" class="py-32 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-16">
                <div class="group reveal">
                    <div class="relative h-[32rem] w-full overflow-hidden rounded-[3rem] shadow-2xl mb-10 transition-transform duration-500 group-hover:-translate-y-2">
                        <img src="{{ asset('assets/images/specialty brews.jfif') }}" alt="Specialty Brews" 
                             class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-navy/40 to-transparent opacity-60"></div>
                    </div>
                    <div class="px-2">
                        <h3 class="text-3xl font-extrabold mb-5 tracking-tight text-navy">Specialty Brews</h3>
                        <p class="text-xl text-navy/60 leading-relaxed font-medium">Unique flavor profiles created by our master baristas using the finest seasonal harvests from around the globe.</p>
                    </div>
                </div>

                <div class="group reveal reveal-delay-1">
                    <div class="relative h-[32rem] w-full overflow-hidden rounded-[3rem] shadow-2xl mb-10 transition-transform duration-500 group-hover:-translate-y-2">
                        <img src="{{ asset('assets/images/organic bean.jfif') }}" alt="Organic Beans" 
                             class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-navy/40 to-transparent opacity-60"></div>
                    </div>
                    <div class="px-2">
                        <h3 class="text-3xl font-extrabold mb-5 tracking-tight text-navy">Organic Beans</h3>
                        <p class="text-xl text-navy/60 leading-relaxed font-medium">100% organic, ethically sourced beans from the world's most prestigious and sustainable coffee estates.</p>
                    </div>
                </div>

                <div class="group reveal reveal-delay-2">
                    <div class="relative h-[32rem] w-full overflow-hidden rounded-[3rem] shadow-2xl mb-10 transition-transform duration-500 group-hover:-translate-y-2">
                        <img src="{{ asset('assets/images/baked.jfif') }}" alt="Fresh Pastries" 
                             class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-navy/40 to-transparent opacity-60"></div>
                    </div>
                    <div class="px-2">
                        <h3 class="text-3xl font-extrabold mb-5 tracking-tight text-navy">Artisan Pastries</h3>
                        <p class="text-xl text-navy/60 leading-relaxed font-medium">Handcrafted daily by our master bakers to complement the complex notes of our signature coffee blends.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- About Section --}}
    <section id="about" class="py-24 bg-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="lg:w-2/5 reveal">
                    <img src="assets/images/banner2.jfif" alt="Latte Art" class="rounded-2xl">
                </div>
                <div class="lg:w-3/5 reveal reveal-delay-1">
                    <h2 class="text-4xl font-bold mb-6">Our Passion for the Bean</h2>
                    <p class="text-lg text-navy/70 mb-8 leading-relaxed">Founded in 2010, IcedCoffee started as a small
                        roastery with a big dream: to redefine the coffee experience. We believe that coffee is more
                        than just a caffeine kick; it's a craft, a community, and a journey of flavors.</p>
                    <ul class="space-y-4 mb-10">
                        <li class="flex items-start gap-3">
                            <div class="w-6 h-6 bg-brick rounded-full flex shrink-0 items-center justify-center mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="text-lg font-medium">Direct Trade Partnerships</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="w-6 h-6 bg-brick rounded-full flex shrink-0 items-center justify-center mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="text-lg font-medium">Small-Batch Artisan Roasting</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="w-6 h-6 bg-brick rounded-full flex shrink-0 items-center justify-center mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="text-lg font-medium">Expert Barista Training</span>
                        </li>
                    </ul>
                    <a href="#" class="text-brick font-bold text-lg inline-flex items-center gap-2 group">
                        Learn more about our mission
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 group-hover:translate-x-1 transition-transform" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Menu Section --}}
    <section id="menu" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-xl font-bold text-brick mb-4 uppercase tracking-[0.2em] reveal">Our Signature Menu</h2>
            <p class="text-sm text-navy/60 max-w-2xl mx-auto mb-16 reveal reveal-delay-1">Carefully curated selection of beverages and
                artisanal snacks, crafted with the finest ingredients.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 text-left">
                @foreach($products as $index => $product)
                    <div class="group reveal" style="transition-delay: {{ ($index % 3) * 0.2 }}s">
                        <div class="relative overflow-hidden rounded-[32px] aspect-square mb-6">
                            @if($product->image_path)
                                <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-cream flex items-center justify-center">
                                    <span class="text-brick font-bold">IcedCoffee</span>
                                </div>
                            @endif
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-navy/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-8">
                                <button class="bg-white text-navy px-6 py-2 rounded-full font-bold text-sm shadow-xl">Order
                                    Now</button>
                            </div>
                        </div>
                        <div class="flex justify-between items-start">
                            <div>
                                <h4
                                    class="text-sm font-bold text-navy group-hover:text-brick transition-colors duration-300">
                                    {{ $product->name }}</h4>
                                <p class="text-xs text-navy/50 italic mt-1">{{ $product->description }}</p>
                            </div>
                            <span class="text-brick font-black text-sm ml-4">₱{{ number_format($product->price, 0) }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Gallery Section --}}
    <section id="gallery" class="py-32 bg-cream overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-20">
            <h2 class="text-xl font-bold text-brick mb-4 uppercase tracking-[0.2em] reveal">The Coffee Visuals</h2>
            <p class="text-4xl md:text-5xl font-extrabold text-navy reveal reveal-delay-1">Moments Caught in a Cup</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 px-4">
            <div class="space-y-4">
                <div class="relative overflow-hidden rounded-[2rem] shadow-xl reveal group">
                    <img src="{{ asset('assets/images/Matcha.jfif') }}" alt="Matcha" class="w-full object-cover group-hover:scale-110 transition-transform duration-1000">
                </div>
                <div class="relative overflow-hidden rounded-[2rem] shadow-xl reveal reveal-delay-1 group">
                    <img src="{{ asset('assets/images/blackberry.jfif') }}" alt="Blackberry" class="w-full object-cover group-hover:scale-110 transition-transform duration-1000">
                </div>
            </div>
            <div class="space-y-4 pt-12">
                <div class="relative overflow-hidden rounded-[2rem] shadow-xl reveal reveal-delay-2 group">
                    <img src="{{ asset('assets/images/cold brew.jfif') }}" alt="Cold Brew" class="w-full object-cover group-hover:scale-110 transition-transform duration-1000">
                </div>
                <div class="relative overflow-hidden rounded-[2rem] shadow-xl reveal reveal-delay-1 group">
                    <img src="{{ asset('assets/images/blueberry-slush.jfif') }}" alt="Blueberry Slush" class="w-full object-cover group-hover:scale-110 transition-transform duration-1000">
                </div>
            </div>
            <div class="space-y-4">
                <div class="relative overflow-hidden rounded-[2rem] shadow-xl reveal reveal-delay-3 group">
                    <img src="{{ asset('assets/images/Strawberry Cream Matcha.jfif') }}" alt="Strawberry Matcha" class="w-full object-cover group-hover:scale-110 transition-transform duration-1000">
                </div>
                <div class="relative overflow-hidden rounded-[2rem] shadow-xl reveal reveal-delay-2 group">
                    <img src="{{ asset('assets/images/expresso.jfif') }}" alt="Expresso" class="w-full object-cover group-hover:scale-110 transition-transform duration-1000">
                </div>
            </div>
            <div class="space-y-4 pt-12">
                <div class="relative overflow-hidden rounded-[2rem] shadow-xl reveal reveal-delay-1 group">
                    <img src="{{ asset('assets/images/Drink Bubble Tea.jfif') }}" alt="Bubble Tea" class="w-full object-cover group-hover:scale-110 transition-transform duration-1000">
                </div>
                <div class="relative overflow-hidden rounded-[2rem] shadow-xl reveal group">
                    <img src="{{ asset('assets/images/Iced Coffee Drinks With Ice Cubes.jfif') }}" alt="Iced Coffee" class="w-full object-cover group-hover:scale-110 transition-transform duration-1000">
                </div>
            </div>
        </div>
    </section>

    {{-- Testimonials Section --}}
    <section id="testimonials" class="py-32 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="mb-16 reveal">
                <svg class="w-16 h-16 text-brick/20 mx-auto mb-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H16.017C15.4647 8 15.017 8.44772 15.017 9V12C15.017 12.5523 14.5693 13 14.017 13H11.017V21H14.017ZM5.01705 21L5.01705 18C5.01705 16.8954 5.91243 16 7.01705 16H10.0171C10.5693 16 11.0171 15.5523 11.0171 15V9C11.0171 8.44772 10.5693 8 10.0171 8H7.01705C6.46477 8 6.01705 8.44772 6.01705 9V12C6.01705 12.5523 5.56933 13 5.01705 13H2.01705V21H5.01705Z" />
                </svg>
                <h2 class="text-4xl md:text-5xl font-extrabold text-navy tracking-tight">Voices of Our Coffee Community</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 text-left">
                <div class="p-10 rounded-[3rem] bg-cream border border-navy/5 shadow-sm reveal reveal-delay-1">
                    <p class="text-xl text-navy/80 italic leading-relaxed mb-8">"The best cold brew I've ever had. The attention to detail in their roasting process is evident in every single sip. Truly a gem for our local community."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 overflow-hidden rounded-full shadow-lg shadow-brick/20">
                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=256&h=256&auto=format&fit=crop" 
                                 alt="James Santos" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-bold text-navy">James Santos</h4>
                            <p class="text-sm text-navy/50">Local Food Critic</p>
                        </div>
                    </div>
                </div>

                <div class="p-10 rounded-[3rem] bg-cream border border-navy/5 shadow-sm reveal reveal-delay-2">
                    <p class="text-xl text-navy/80 italic leading-relaxed mb-8">"IcedCoffee is my daily morning ritual. Not only is the coffee exceptional, but the atmosphere and staff make it the perfect place to start the day."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 overflow-hidden rounded-full shadow-lg shadow-navy/20">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=256&h=256&auto=format&fit=crop" 
                                 alt="Maria Rivera" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-bold text-navy">Maria Rivera</h4>
                            <p class="text-sm text-navy/50">Graphic Designer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer id="contact" class="bg-navy text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div class="col-span-1 md:col-span-2 reveal">
                    <div class="flex items-center gap-2 mb-6">
                        <span class="text-2xl font-bold tracking-tight">IcedCoffee</span>
                    </div>
                    <p class="text-white/60 mb-8 max-w-sm">Bringing the art of specialty coffee to your neighborhood.
                        Join our newsletter for updates and brewing tips.</p>
                    <form class="flex max-w-md">
                        <input type="email" placeholder="Email Address"
                            class="bg-white/5 border border-white/20 rounded-l-full px-6 py-3 w-full focus:outline-none focus:border-brick">
                        <button
                            class="bg-brick px-6 py-3 rounded-r-full font-bold hover:bg-coffee-700 transition-colors">Join</button>
                    </form>
                </div>
                <div class="reveal reveal-delay-1">
                    <h4 class="text-lg font-bold mb-6 uppercase tracking-wider text-brick">Visit Us</h4>
                    <address class="not-italic text-white/60 space-y-4">
                        <p>Coffee Lane<br>Dauin, Dumaguete City</p>
                        <p>Mon - Fri: 7am - 8pm<br>Sat - Sun: 8am - 9pm</p>
                    </address>
                </div>
                <div class="reveal reveal-delay-2">
                    <h4 class="text-lg font-bold mb-6 uppercase tracking-wider text-brick">Contact</h4>
                    <div class="text-white/60 space-y-4">
                        <p>icedcoffee@gmail.com</p>
                        <p>(555) 123-4567</p>
                        <div class="flex gap-4 pt-4">
                            <a href="#" class="hover:text-brick transition-colors">Instagram</a>
                            <a href="#" class="hover:text-brick transition-colors">Twitter</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-t border-white/10 mt-16 pt-8 text-center text-white/40 text-sm">
                &copy; {{ date('Y') }} IcedCoffee. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                        entry.target.style.transform = ''; // Clear inline transform
                    } else {
                        entry.target.classList.remove('active');
                        
                        // Set entrance direction based on exit position
                        const rect = entry.target.getBoundingClientRect();
                        if (rect.top < 0) {
                            // Element left through the top, next time it enters from top, slide down
                            entry.target.style.transform = 'translateY(-40px)';
                        } else {
                            // Element left through the bottom, next time it enters from bottom, slide up
                            entry.target.style.transform = 'translateY(40px)';
                        }
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
        });
    </script>
</body>

</html>