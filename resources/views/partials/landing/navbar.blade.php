    {{-- Navbar --}}
    <nav x-data="{ mobileMenuOpen: false }" class="sticky top-0 z-50 bg-cream/80 backdrop-blur-md border-b border-navy/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="#hero" class="flex items-center gap-3">
                    <img src="{{ asset('assets/images/logotransparent.png') }}" alt="IcedCoffee Logo" class="h-12 w-auto object-contain">
                    <span class="text-2xl font-bold tracking-tight">IcedCoffee</span>
                </a>
                
                {{-- Desktop Menu --}}
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

                {{-- Burger Button --}}
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-navy p-2">
                    <svg x-show="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                    <svg x-show="mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-cloak>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="md:hidden bg-white border-b border-navy/10 shadow-xl"
             x-cloak>
            <div class="px-4 py-8 space-y-4">
                <a href="#hero" @click="mobileMenuOpen = false" class="block text-lg font-bold text-navy hover:text-brick py-2 border-b border-gray-50">Home</a>
                <a href="#features" @click="mobileMenuOpen = false" class="block text-lg font-bold text-navy hover:text-brick py-2 border-b border-gray-50">Features</a>
                <a href="#about" @click="mobileMenuOpen = false" class="block text-lg font-bold text-navy hover:text-brick py-2 border-b border-gray-50">About</a>
                <a href="#menu" @click="mobileMenuOpen = false" class="block text-lg font-bold text-navy hover:text-brick py-2 border-b border-gray-50">Menu</a>
                <a href="#gallery" @click="mobileMenuOpen = false" class="block text-lg font-bold text-navy hover:text-brick py-2 border-b border-gray-50">Gallery</a>
                <a href="#testimonials" @click="mobileMenuOpen = false" class="block text-lg font-bold text-navy hover:text-brick py-2 border-b border-gray-50">Stories</a>
                <a href="#contact" @click="mobileMenuOpen = false" class="block text-lg font-bold text-navy hover:text-brick py-2 border-b border-gray-50">Contact</a>
                <div class="pt-6 grid grid-cols-2 gap-4">
                    <a href="/login" class="text-center font-bold text-navy border-2 border-navy/10 py-3 rounded-2xl">Log in</a>
                    <a href="/register" class="text-center font-bold text-white bg-brick py-3 rounded-2xl">Register</a>
                </div>
            </div>
        </div>
    </nav>
