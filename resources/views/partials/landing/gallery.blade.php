    {{-- Gallery Section --}}
    <section id="gallery" class="py-32 bg-cream overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-20">
            <h2 class="text-xl font-bold text-brick mb-4 uppercase tracking-[0.2em] reveal">The Coffee Visuals</h2>
            <p class="text-4xl md:text-5xl font-extrabold text-navy reveal reveal-delay-1">Moments Caught in a Cup</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 px-4">
            {{-- Column 1 --}}
            <div class="space-y-4">
                <div class="relative overflow-hidden rounded-[2rem] shadow-xl reveal group">
                    <img src="{{ asset('assets/images/Matcha.jfif') }}" alt="Matcha" class="w-full object-cover group-hover:scale-110 transition-transform duration-1000">
                </div>
                <div class="relative overflow-hidden rounded-[2rem] shadow-xl reveal reveal-delay-1 group">
                    <img src="{{ asset('assets/images/pastries/cookie.jfif') }}" alt="Signature Cookie" class="w-full object-cover group-hover:scale-110 transition-transform duration-1000">
                </div>
                <div class="relative overflow-hidden rounded-[2rem] shadow-xl reveal reveal-delay-2 group">
                    <img src="{{ asset('assets/images/blackberry.jfif') }}" alt="Blackberry" class="w-full object-cover group-hover:scale-110 transition-transform duration-1000">
                </div>
            </div>

            {{-- Column 2 --}}
            <div class="space-y-4 pt-12">
                <div class="relative overflow-hidden rounded-[2rem] shadow-xl reveal reveal-delay-2 group">
                    <img src="{{ asset('assets/images/pastries/dunot.jpg') }}" alt="Glazed Donut" class="w-full object-cover group-hover:scale-110 transition-transform duration-1000">
                </div>
                <div class="relative overflow-hidden rounded-[2rem] shadow-xl reveal reveal-delay-1 group">
                    <img src="{{ asset('assets/images/cold brew.jfif') }}" alt="Cold Brew" class="w-full object-cover group-hover:scale-110 transition-transform duration-1000">
                </div>
                <div class="relative overflow-hidden rounded-[2rem] shadow-xl reveal reveal-delay-2 group">
                    <img src="{{ asset('assets/images/pastries/empanada.jpg') }}" alt="Savory Empanada" class="w-full object-cover group-hover:scale-110 transition-transform duration-1000">
                </div>
            </div>

            {{-- Column 3 --}}
            <div class="space-y-4">
                <div class="relative overflow-hidden rounded-[2rem] shadow-xl reveal reveal-delay-3 group">
                    <img src="{{ asset('assets/images/Strawberry Cream Matcha.jfif') }}" alt="Strawberry Matcha" class="w-full object-cover group-hover:scale-110 transition-transform duration-1000">
                </div>
                <div class="relative overflow-hidden rounded-[2rem] shadow-xl reveal reveal-delay-2 group">
                    <img src="{{ asset('assets/images/pastries/sinamond rool.jfif') }}" alt="Cinnamon Roll" class="w-full object-cover group-hover:scale-110 transition-transform duration-1000">
                </div>
                <div class="relative overflow-hidden rounded-[2rem] shadow-xl reveal reveal-delay-1 group">
                    <img src="{{ asset('assets/images/expresso.jfif') }}" alt="Expresso" class="w-full object-cover group-hover:scale-110 transition-transform duration-1000">
                </div>
                <div class="relative overflow-hidden rounded-[2rem] shadow-xl reveal group">
                    <img src="{{ asset('assets/images/pastries/yambread.jfif') }}" alt="Yam Bread" class="w-full object-cover group-hover:scale-110 transition-transform duration-1000">
                </div>
            </div>

            {{-- Column 4 --}}
            <div class="space-y-4 pt-12">
                <div class="relative overflow-hidden rounded-[2rem] shadow-xl reveal group">
                    <img src="{{ asset('assets/images/pastries/mushroom.jpg') }}" alt="Mushroom Puff" class="w-full object-cover group-hover:scale-110 transition-transform duration-1000">
                </div>
                <div class="relative overflow-hidden rounded-[2rem] shadow-xl reveal reveal-delay-1 group">
                    <img src="{{ asset('assets/images/pastries/spanish bread.jpg') }}" alt="Spanish Bread" class="w-full object-cover group-hover:scale-110 transition-transform duration-1000">
                </div>
                <div class="relative overflow-hidden rounded-[2rem] shadow-xl reveal reveal-delay-1 group">
                    <img src="{{ asset('assets/images/Drink Bubble Tea.jfif') }}" alt="Bubble Tea" class="w-full object-cover group-hover:scale-110 transition-transform duration-1000">
                </div>
            </div>
        </div>
    </section>
