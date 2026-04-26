{{-- Hero Section --}}
<section id="hero" class="relative h-[85vh] flex items-center overflow-hidden bg-zinc-900">
    {{-- Background Glow (Helps the coffee pop) --}}
    <div class="absolute top-1/2 left-3/4 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-coffee-600/20 blur-[100px] rounded-full"></div>

    {{-- Floating Iced Coffee --}}
    <div class="absolute inset-0 z-0 hidden md:flex items-center justify-end pr-10 md:pr-32 pointer-events-none">
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
