<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>IcedCoffee | Artisan Specialty Coffee</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-cream text-navy font-sans antialiased">
        {{-- Navbar --}}
        <nav class="sticky top-0 z-50 bg-cream/80 backdrop-blur-md border-b border-navy/10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 bg-brick rounded-full flex items-center justify-center text-white font-bold text-xl">C</div>
                        <span class="text-2xl font-bold tracking-tight">IcedCoffee</span>
                    </div>
                    <div class="hidden md:flex items-center gap-8">
                        <a href="#menu" class="font-medium hover:text-brick transition-colors">Menu</a>
                        <a href="#about" class="font-medium hover:text-brick transition-colors">About</a>
                        <a href="/query-lab" class="font-bold text-brick hover:text-navy transition-colors">DBMS Lab</a>
                        <div class="flex items-center gap-4 ml-4">
                            <a href="/login" class="font-bold text-navy hover:text-brick transition-colors">Log in</a>
                            <a href="/register" class="bg-brick text-white px-6 py-2.5 rounded-full font-bold hover:bg-coffee-700 transition-all shadow-lg shadow-brick/20">Register</a>
                        </div>
                    </div>
                    <button class="md:hidden text-navy">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>
        </nav>

        {{-- Hero Section --}}
        <section class="relative h-[85vh] flex items-center overflow-hidden">
            <div class="absolute inset-0 z-0">
                <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085" alt="Coffee Shop" class="w-full h-full object-cover brightness-50">
            </div>
            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full text-white">
                <div class="max-w-2xl">
                    <h1 class="text-5xl md:text-7xl font-bold leading-tight mb-6">Crafting the Perfect Brew, <span class="text-coffee-600">One Cup</span> at a Time</h1>
                    <p class="text-xl md:text-2xl text-white/80 mb-10">Experience the rich aroma and exquisite taste of our sustainably sourced, artisan-roasted specialty coffee.</p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#menu" class="bg-brick text-white px-8 py-4 rounded-full font-bold text-lg text-center hover:bg-coffee-700 transition-all">Explore Menu</a>
                        <a href="#about" class="bg-white/10 backdrop-blur-md border border-white/30 text-white px-8 py-4 rounded-full font-bold text-lg text-center hover:bg-white/20 transition-all">Our Story</a>
                    </div>
                </div>
            </div>
        </section>

        {{-- Features Section --}}
        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <div class="text-center group">
                        <div class="w-20 h-20 bg-cream rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-brick transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-brick group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Specialty Brews</h3>
                        <p class="text-navy/60 leading-relaxed">Unique flavor profiles created by our master baristas using the finest seasonal harvests.</p>
                    </div>
                    <div class="text-center group">
                        <div class="w-20 h-20 bg-cream rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-brick transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-brick group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Organic Beans</h3>
                        <p class="text-navy/60 leading-relaxed">100% organic, ethically sourced beans from the world's best sustainable coffee farms.</p>
                    </div>
                    <div class="text-center group">
                        <div class="w-20 h-20 bg-cream rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-brick transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-brick group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Fresh Pastries</h3>
                        <p class="text-navy/60 leading-relaxed">Baked fresh every morning to pair perfectly with your favorite cup of coffee.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- About Section --}}
        <section id="about" class="py-24 bg-cream">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row items-center gap-16">
                    <div class="lg:w-1/2">
                        <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93" alt="Latte Art" class="rounded-3xl shadow-2xl">
                    </div>
                    <div class="lg:w-1/2">
                        <h2 class="text-4xl font-bold mb-6">Our Passion for the Bean</h2>
                        <p class="text-lg text-navy/70 mb-8 leading-relaxed">Founded in 2010, IcedCoffee started as a small roastery with a big dream: to redefine the coffee experience. We believe that coffee is more than just a caffeine kick; it's a craft, a community, and a journey of flavors.</p>
                        <ul class="space-y-4 mb-10">
                            <li class="flex items-start gap-3">
                                <div class="w-6 h-6 bg-brick rounded-full flex shrink-0 items-center justify-center mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-lg font-medium">Direct Trade Partnerships</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="w-6 h-6 bg-brick rounded-full flex shrink-0 items-center justify-center mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-lg font-medium">Small-Batch Artisan Roasting</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="w-6 h-6 bg-brick rounded-full flex shrink-0 items-center justify-center mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-lg font-medium">Expert Barista Training</span>
                            </li>
                        </ul>
                        <a href="#" class="text-brick font-bold text-lg inline-flex items-center gap-2 group">
                            Learn more about our mission
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- Menu Section --}}
        <section id="menu" class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-4xl font-bold mb-4">Our Signature Menu</h2>
                <p class="text-navy/60 max-w-2xl mx-auto mb-16">Carefully curated selection of beverages and artisanal snacks.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-20 gap-y-10 text-left">
                    @foreach($products as $product)
                    <div class="flex justify-between items-end border-b border-dotted border-navy/20 pb-4">
                        <div>
                            <h4 class="text-xl font-bold">{{ $product->name }}</h4>
                            <p class="text-navy/60 italic text-sm">{{ $product->description }}</p>
                        </div>
                        <span class="text-brick font-bold text-xl">₱{{ number_format($product->price, 0) }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Footer --}}
        <footer id="contact" class="bg-navy text-white py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                    <div class="col-span-1 md:col-span-2">
                        <div class="flex items-center gap-2 mb-6">
                            <div class="w-10 h-10 bg-brick rounded-full flex items-center justify-center text-white font-bold text-xl">C</div>
                            <span class="text-2xl font-bold tracking-tight">IcedCoffee</span>
                        </div>
                        <p class="text-white/60 mb-8 max-w-sm">Bringing the art of specialty coffee to your neighborhood. Join our newsletter for updates and brewing tips.</p>
                        <form class="flex max-w-md">
                            <input type="email" placeholder="Email Address" class="bg-white/5 border border-white/20 rounded-l-full px-6 py-3 w-full focus:outline-none focus:border-brick">
                            <button class="bg-brick px-6 py-3 rounded-r-full font-bold hover:bg-coffee-700 transition-colors">Join</button>
                        </form>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold mb-6 uppercase tracking-wider text-brick">Visit Us</h4>
                        <address class="not-italic text-white/60 space-y-4">
                            <p>123 Coffee Lane<br>Beanville, CA 90210</p>
                            <p>Mon - Fri: 7am - 8pm<br>Sat - Sun: 8am - 9pm</p>
                        </address>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold mb-6 uppercase tracking-wider text-brick">Contact</h4>
                        <div class="text-white/60 space-y-4">
                            <p>hello@icedcoffee.com</p>
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
    </body>
</html>
