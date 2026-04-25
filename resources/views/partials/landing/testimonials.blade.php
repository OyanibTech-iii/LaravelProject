{{-- Testimonials Section --}}
<section id="testimonials" class="py-32 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-16">
        <div class="mb-6 reveal">
            <svg class="w-16 h-16 text-brick/20 mx-auto" fill="currentColor" viewBox="0 0 24 24">
                <path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H16.017C15.4647 8 15.017 8.44772 15.017 9V12C15.017 12.5523 14.5693 13 14.017 13H11.017V21H14.017ZM5.01705 21L5.01705 18C5.01705 16.8954 5.91243 16 7.01705 16H10.0171C10.5693 16 11.0171 15.5523 11.0171 15V9C11.0171 8.44772 10.5693 8 10.0171 8H7.01705C6.46477 8 6.01705 8.44772 6.01705 9V12C6.01705 12.5523 5.56933 13 5.01705 13H2.01705V21H5.01705Z" />
            </svg>
        </div>
        <h2 class="text-xl font-bold text-brick mb-4 uppercase tracking-[0.2em] reveal">Testimonials</h2>
        <p class="text-4xl md:text-5xl font-extrabold text-navy tracking-tight reveal reveal-delay-1">Voices of Our Coffee Community</p>
    </div>

    @php
        $testimonialsRow1 = [
            ['name' => 'James Santos', 'role' => 'Food Critic', 'text' => 'The best cold brew I\'ve ever had. Truly a gem for our local community.', 'image' => 'https://i.pravatar.cc/150?u=james'],
            ['name' => 'Maria Rivera', 'role' => 'Graphic Designer', 'text' => 'My daily morning ritual. The atmosphere and staff make it perfect.', 'image' => 'https://i.pravatar.cc/150?u=maria'],
            ['name' => 'John Doe', 'role' => 'Tech Lead', 'text' => 'Exquisite taste and great workspace. Highly recommended!', 'image' => 'https://i.pravatar.cc/150?u=john'],
            ['name' => 'Sarah Smith', 'role' => 'Student', 'text' => 'The matcha here is out of this world. My favorite study spot.', 'image' => 'https://i.pravatar.cc/150?u=sarah'],
            ['name' => 'Robert Fox', 'role' => 'Entrepreneur', 'text' => 'Exceptional service and the roasts are consistently perfect.', 'image' => 'https://i.pravatar.cc/150?u=robert'],
        ];

        $testimonialsRow2 = [
            ['name' => 'Ana Garcia', 'role' => 'Artist', 'text' => 'A beautiful space with even more beautiful coffee. Love the vibe.', 'image' => 'https://i.pravatar.cc/150?u=ana'],
            ['name' => 'Kevin Lee', 'role' => 'Photographer', 'text' => 'Every cup is a piece of art. Sourcing is definitely top-tier.', 'image' => 'https://i.pravatar.cc/150?u=kevin'],
            ['name' => 'Lisa Wang', 'role' => 'Blogger', 'text' => 'I travel 30 minutes just for their signature iced lattes. Worth it!', 'image' => 'https://i.pravatar.cc/150?u=lisa'],
            ['name' => 'Tom Harris', 'role' => 'Writer', 'text' => 'The perfect place for inspiration. The aroma alone wakes up my creativity.', 'image' => 'https://i.pravatar.cc/150?u=tom'],
            ['name' => 'Emma Davis', 'role' => 'Chef', 'text' => 'As a chef, I appreciate the complexity of their flavor profiles.', 'image' => 'https://i.pravatar.cc/150?u=emma'],
        ];
    @endphp

    {{-- First Marquee Row --}}
    <div class="relative flex overflow-x-hidden mb-8">
        <div class="flex animate-marquee whitespace-nowrap">
            @foreach(array_merge($testimonialsRow1, $testimonialsRow1) as $t)
                <div class="mx-4 inline-block w-[400px] whitespace-normal">
                    <div class="p-8 rounded-[2.5rem] bg-cream border border-navy/5 shadow-sm h-full flex flex-col justify-between">
                        <p class="text-lg text-navy/80 italic leading-relaxed mb-6">"{{ $t['text'] }}"</p>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 overflow-hidden rounded-full shadow-md border-2 border-white">
                                <img src="{{ $t['image'] }}" alt="{{ $t['name'] }}" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="font-bold text-navy text-sm">{{ $t['name'] }}</h4>
                                <p class="text-xs text-navy/50">{{ $t['role'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Second Marquee Row --}}
    <div class="relative flex overflow-x-hidden">
        <div class="flex animate-marquee-reverse whitespace-nowrap">
            @foreach(array_merge($testimonialsRow2, $testimonialsRow2) as $t)
                <div class="mx-4 inline-block w-[400px] whitespace-normal">
                    <div class="p-8 rounded-[2.5rem] bg-cream border border-navy/5 shadow-sm h-full flex flex-col justify-between">
                        <p class="text-lg text-navy/80 italic leading-relaxed mb-6">"{{ $t['text'] }}"</p>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 overflow-hidden rounded-full shadow-md border-2 border-white">
                                <img src="{{ $t['image'] }}" alt="{{ $t['name'] }}" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="font-bold text-navy text-sm">{{ $t['name'] }}</h4>
                                <p class="text-xs text-navy/50">{{ $t['role'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
