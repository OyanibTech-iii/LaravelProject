    {{-- Contact Section --}}
    <section id="contact" class="py-32 bg-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20 reveal">
                <h2 class="text-xl font-bold text-brick mb-4 uppercase tracking-[0.2em]">Connect With Us</h2>
                <p class="text-4xl md:text-5xl font-extrabold text-navy">Visit Our Roastery</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
                {{-- Contact Form --}}
                <div class="bg-white p-10 md:p-16 rounded-[3rem] shadow-xl shadow-navy/5 reveal">
                    <form action="#" class="space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-navy/60 uppercase tracking-wider ml-1">Name</label>
                                <input type="text" placeholder="Fullname" 
                                    class="w-full bg-cream/50 border-none rounded-2xl px-6 py-4 focus:ring-2 focus:ring-brick/20 transition-all outline-none">
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-navy/60 uppercase tracking-wider ml-1">Email</label>
                                <input type="email" placeholder="working email" 
                                    class="w-full bg-cream/50 border-none rounded-2xl px-6 py-4 focus:ring-2 focus:ring-brick/20 transition-all outline-none">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-navy/60 uppercase tracking-wider ml-1">Message</label>
                            <textarea rows="5" placeholder="Tell us about your coffee preferences..." 
                                class="w-full bg-cream/50 border-none rounded-2xl px-6 py-4 focus:ring-2 focus:ring-brick/20 transition-all outline-none resize-none"></textarea>
                        </div>
                        <button type="submit" 
                            class="w-full bg-brick text-white font-bold py-5 rounded-2xl hover:bg-coffee-700 transition-all shadow-lg shadow-brick/20 text-lg">
                            Send Message
                        </button>
                    </form>
                </div>

                {{-- Map and Info --}}
                <div class="space-y-12 reveal reveal-delay-1">
                    <div class="overflow-hidden rounded-[3rem] shadow-2xl h-[400px] grayscale hover:grayscale-0 transition-all duration-700 border-8 border-white">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15714.47169018423!2d123.25686005!3d9.18956895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33ab703058977c0b%3A0x6b779435b6781938!2sDauin%2C%20Negros%20Oriental!5e0!3m2!1sen!2sph!4v1714000000000!5m2!1sen!2sph" 
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-brick/10 rounded-2xl flex items-center justify-center shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-brick" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-navy mb-1 text-lg">Our Location</h4>
                                <p class="text-navy/60 leading-relaxed">Coffee Lane, Dauin<br>Dumaguete City, PH 6217</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-brick/10 rounded-2xl flex items-center justify-center shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-brick" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-navy mb-1 text-lg">Contact Us</h4>
                                <p class="text-navy/60 leading-relaxed">icedcoffee@gmail.com<br>+63 912 345 6789</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
