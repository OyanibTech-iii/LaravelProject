    {{-- Navbar --}}
    <nav class="sticky top-0 z-50 bg-cream/80 backdrop-blur-md border-b border-navy/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="#hero" class="flex items-center gap-3">
                    <img src="{{ asset('assets/images/logotransparent.png') }}" alt="IcedCoffee Logo" class="h-12 w-auto object-contain">
                    <span class="text-2xl font-bold tracking-tight">IcedCoffee</span>
                </a>
                <div class="hidden md:flex items-center gap-8 self-stretch">
                    <a href="#hero" class="nav-link font-medium hover:text-brick transition-colors border-b-2 border-transparent h-full flex items-center">Home</a>
                    <a href="#features" class="nav-link font-medium hover:text-brick transition-colors border-b-2 border-transparent h-full flex items-center">Features</a>
                    <a href="#about" class="nav-link font-medium hover:text-brick transition-colors border-b-2 border-transparent h-full flex items-center">About</a>
                    <a href="#menu" class="nav-link font-medium hover:text-brick transition-colors border-b-2 border-transparent h-full flex items-center">Menu</a>
                    <a href="#gallery" class="nav-link font-medium hover:text-brick transition-colors border-b-2 border-transparent h-full flex items-center">Gallery</a>
                    <a href="#testimonials" class="nav-link font-medium hover:text-brick transition-colors border-b-2 border-transparent h-full flex items-center">Stories</a>
                    <a href="#contact" class="nav-link font-medium hover:text-brick transition-colors border-b-2 border-transparent h-full flex items-center">Contact</a>
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
