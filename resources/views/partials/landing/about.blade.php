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

            {{-- Team Section --}}
            <div class="mt-32">
                <div class="text-center mb-16 reveal">
                    <h2 class="text-xl font-bold text-brick mb-4 uppercase tracking-[0.2em]">Meet Our Team</h2>
                    <p class="text-4xl font-extrabold text-navy">The Craftspeople Behind the Cup</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    {{-- Team Member 1 --}}
                    <div class="group reveal">
                        <div class="relative overflow-hidden rounded-[2.5rem] aspect-[4/5] mb-6 shadow-xl">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=800&auto=format&fit=crop" 
                                 alt="Marcus Chen" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-navy/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-8">
                                <p class="text-white/80 text-sm leading-relaxed">Master Roaster with 15 years of experience in specialty coffee sourcing.</p>
                            </div>
                        </div>
                        <h4 class="text-2xl font-bold text-navy mb-1">Marcus Chen</h4>
                        <p class="text-brick font-bold uppercase tracking-wider text-sm">Founder & Master Roaster</p>
                    </div>

                    {{-- Team Member 2 --}}
                    <div class="group reveal reveal-delay-1">
                        <div class="relative overflow-hidden rounded-[2.5rem] aspect-[4/5] mb-6 shadow-xl">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=800&auto=format&fit=crop" 
                                 alt="Elena Rodriguez" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-navy/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-8">
                                <p class="text-white/80 text-sm leading-relaxed">Award-winning barista trainer specializing in latte art and sensory analysis.</p>
                            </div>
                        </div>
                        <h4 class="text-2xl font-bold text-navy mb-1">Elena Rodriguez</h4>
                        <p class="text-brick font-bold uppercase tracking-wider text-sm">Head Barista</p>
                    </div>

                    {{-- Team Member 3 --}}
                    <div class="group reveal reveal-delay-2">
                        <div class="relative overflow-hidden rounded-[2.5rem] aspect-[4/5] mb-6 shadow-xl">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=800&auto=format&fit=crop" 
                                 alt="David Okoro" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-navy/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-8">
                                <p class="text-white/80 text-sm leading-relaxed">Sustainability expert focused on direct-trade relations and farm partnerships.</p>
                            </div>
                        </div>
                        <h4 class="text-2xl font-bold text-navy mb-1">David Okoro</h4>
                        <p class="text-brick font-bold uppercase tracking-wider text-sm">Sourcing Director</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
