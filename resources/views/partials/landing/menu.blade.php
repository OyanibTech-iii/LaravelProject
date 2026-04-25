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
