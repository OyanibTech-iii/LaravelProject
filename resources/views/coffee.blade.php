<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

@include('partials.landing.head')

<body class="bg-cream text-navy font-sans antialiased">
    @include('partials.landing.navbar')
    
    @include('partials.landing.hero')

    @include('partials.landing.features')

    @include('partials.landing.about')

    @include('partials.landing.stats')

    @include('partials.landing.menu', ['products' => $products])

    @include('partials.landing.gallery')

    @include('partials.landing.testimonials')

    @include('partials.landing.contact')

    @include('partials.landing.footer')

    @include('partials.landing.scripts')
</body>

</html>
