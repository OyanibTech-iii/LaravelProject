<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body class="font-sans antialiased" x-data="{ 
        activeUrl: window.location.href,
        loading: false,
        async loadPage(url, pushState = true) {
            if (url === this.activeUrl && pushState) return;
            this.loading = true;
            try {
                const response = await fetch(url);
                const html = await response.text();
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                
                // Update Main Content
                const newMain = doc.querySelector('main');
                if (newMain) {
                    const mainElement = document.querySelector('main');
                    mainElement.innerHTML = newMain.innerHTML;
                    
                    // Re-execute scripts
                    const scripts = newMain.querySelectorAll('script');
                    scripts.forEach(oldScript => {
                        const newScript = document.createElement('script');
                        Array.from(oldScript.attributes).forEach(attr => newScript.setAttribute(attr.name, attr.value));
                        newScript.textContent = oldScript.textContent;
                        mainElement.appendChild(newScript);
                    });
                }

                // Update Header
                const newHeader = doc.querySelector('header.bg-white.shadow-sm');
                const currentHeader = document.querySelector('header.bg-white.shadow-sm');
                if (newHeader && currentHeader) {
                    currentHeader.innerHTML = newHeader.innerHTML;
                } else if (newHeader && !currentHeader) {
                    const headerContainer = document.createElement('header');
                    headerContainer.className = 'bg-white shadow-sm z-10';
                    headerContainer.innerHTML = newHeader.innerHTML;
                    document.querySelector('main').parentElement.insertBefore(headerContainer, document.querySelector('main'));
                } else if (!newHeader && currentHeader) {
                    currentHeader.remove();
                }

                if (pushState) {
                    window.history.pushState({}, '', url);
                }
                this.activeUrl = url;
                window.scrollTo(0, 0);

                // Initialize any new scripts or components here if needed
                this.bindForms();

            } catch (error) {
                console.error('Failed to load page:', error);
                if (pushState) window.location.href = url;
            } finally {
                this.loading = false;
            }
        },
        bindForms() {
            document.querySelectorAll('main form:not([data-native])').forEach(form => {
                form.onsubmit = async (e) => {
                    e.preventDefault();
                    this.loading = true;
                    try {
                        const formData = new FormData(form);
                        const response = await fetch(form.action, {
                            method: form.method,
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'text/html'
                            }
                        });
                        
                        if (response.redirected) {
                            await this.loadPage(response.url);
                        } else {
                            const html = await response.text();
                            const parser = new DOMParser();
                            const doc = parser.parseFromString(html, 'text/html');
                            const newMain = doc.querySelector('main');
                            if (newMain) {
                                document.querySelector('main').innerHTML = newMain.innerHTML;
                                this.bindForms();
                            }
                        }
                    } catch (error) {
                        console.error('Form submission failed:', error);
                    } finally {
                        this.loading = false;
                    }
                };
            });
        }
    }" @popstate.window="loadPage(window.location.href, false)" x-init="bindForms()">
        <!-- Loading Bar -->
        <div x-show="loading" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             class="fixed top-0 left-0 w-full h-1 bg-brick z-50">
            <div class="h-full bg-white/30 animate-pulse"></div>
        </div>

        <div class="min-h-screen bg-gray-100 flex">
            <!-- Sidebar -->
            <aside class="w-64 bg-navy text-white min-h-screen flex-shrink-0 hidden md:flex flex-col">
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-10">
                        <div class="w-8 h-8 bg-brick rounded-full flex items-center justify-center text-white font-bold">C</div>
                        <span class="text-xl font-bold tracking-tight">IcedCoffee</span>
                    </div>

                    <nav class="space-y-2">
                        <a href="{{ route('dashboard') }}" 
                           @click.prevent="loadPage($el.href)"
                           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors text-sm"
                           :class="activeUrl.includes('{{ route('dashboard') }}') ? 'bg-brick' : 'hover:bg-white/10'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a11 11 0 0022 0V10M9 21h6" />
                            </svg>
                            Dashboard
                        </a>
                        <a href="{{ route('products.index') }}" 
                           @click.prevent="loadPage($el.href)"
                           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors text-sm"
                           :class="activeUrl.includes('{{ route('products.index') }}') ? 'bg-brick' : 'hover:bg-white/10'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            Products
                        </a>
                        <a href="{{ route('customers.index') }}" 
                           @click.prevent="loadPage($el.href)"
                           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors text-sm"
                           :class="activeUrl.includes('{{ route('customers.index') }}') ? 'bg-brick' : 'hover:bg-white/10'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            Customers
                        </a>
                        <div class="pt-4 mt-4 border-t border-white/10">
                            <p class="px-4 mb-2 text-xs font-bold text-gray-400 uppercase tracking-widest">Lab Tools</p>
                            <a href="{{ route('query-lab') }}" 
                               @click.prevent="loadPage($el.href)"
                               class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors text-sm"
                               :class="activeUrl.includes('{{ route('query-lab') }}') ? 'bg-brick' : 'hover:bg-white/10'">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a2 2 0 00-1.96 1.414l-.722 2.166a2 2 0 00.547 2.136l1.64 1.64a2 2 0 002.828 0l2.387-2.387a2 2 0 000-2.828l-1.311-1.311z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                DBMS Lab
                            </a>

                            <!-- Lab Sub-options -->
                            <div x-show="activeUrl.includes('{{ route('query-lab') }}')" 
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 -translate-y-2"
                                 x-transition:enter-end="opacity-100 translate-y-0"
                                 class="mt-2 ml-4 space-y-1 border-l-2 border-white/5 pl-4">
                                @php
                                    $labOptions = [
                                        'Selection & Projection',
                                        'Cartesian Product',
                                        'UNION Operation',
                                        'DIFFERENCE Operation'
                                    ];
                                @endphp
                                @foreach($labOptions as $idx => $label)
                                    <a href="{{ route('query-lab', ['scenario' => $idx]) }}"
                                       @click.prevent="loadPage($el.href)"
                                       class="block py-2 text-xs transition-colors hover:text-white"
                                       :class="activeUrl.includes('scenario={{ $idx }}') || (activeUrl.endsWith('query-lab') && {{ $idx }} === 0) ? 'text-brick font-bold' : 'text-gray-400'">
                                        {{ $label }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </nav>
                </div>
                
                <div class="mt-auto p-6 border-t border-white/10">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-red-500/20 text-red-400 transition-colors text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Log Out
                        </button>
                    </form>
                </div>
            </aside>

            <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
                <!-- Top Navbar (Mobile only toggle or context info) -->
                <header class="bg-white border-b border-gray-200 md:hidden">
                    <div class="px-4 py-4 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-brick rounded-full flex items-center justify-center text-white font-bold">C</div>
                            <span class="text-xl font-bold text-navy tracking-tight">IcedCoffee</span>
                        </div>
                        <button class="text-navy">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                            </svg>
                        </button>
                    </div>
                </header>

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white shadow-sm z-10">
                        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="flex-1 overflow-y-auto bg-gray-50">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
