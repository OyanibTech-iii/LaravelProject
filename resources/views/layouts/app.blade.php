<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'IcedCoffee') }}</title>

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
        showLogoutModal: false,
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

        <div class="min-h-screen bg-gray-100">
            <!-- Sidebar -->
            <aside class="fixed inset-y-0 left-0 z-50 w-64 bg-navy text-white hidden md:flex flex-col overflow-y-auto shadow-2xl">
                <div class="p-6">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 mb-10 group">
                        <img src="{{ asset('assets/images/inverted.png') }}" alt="IcedCoffee Logo" class="h-10 w-auto object-contain transition-transform group-hover:scale-110">
                        <span class="text-xl font-bold tracking-tight text-white">IcedCoffee</span>
                    </a>

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
                        <a href="{{ route('suppliers.index') }}" 
                           @click.prevent="loadPage($el.href)"
                           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors text-sm"
                           :class="activeUrl.includes('{{ route('suppliers.index') }}') ? 'bg-brick' : 'hover:bg-white/10'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m-1 4h1m5-8h1m-1 4h1m-1 4h1" />
                            </svg>
                            Suppliers
                        </a>
                        <a href="{{ route('orders.index') }}" 
                           @click.prevent="loadPage($el.href)"
                           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors text-sm"
                           :class="activeUrl.includes('{{ route('orders.index') }}') ? 'bg-brick' : 'hover:bg-white/10'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                            Orders
                        </a>
                        <a href="{{ route('categories.index') }}" 
                           @click.prevent="loadPage($el.href)"
                           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors text-sm"
                           :class="activeUrl.includes('{{ route('categories.index') }}') ? 'bg-brick' : 'hover:bg-white/10'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                            Categories
                        </a>
                        <a href="{{ route('sessions.index') }}" 
                           @click.prevent="loadPage($el.href)"
                           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors text-sm"
                           :class="activeUrl.includes('{{ route('sessions.index') }}') ? 'bg-brick' : 'hover:bg-white/10'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Sessions
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
                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <button type="button" @click="showLogoutModal = true" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-red-500/20 text-red-400 transition-colors text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Log Out
                        </button>
                    </form>
                </div>
            </aside>

            <div class="md:pl-64 flex flex-col min-h-screen">
                <!-- Top Navbar (Mobile only toggle or context info) -->
                <header class="bg-white border-b border-gray-200 md:hidden">
                    <div class="px-4 py-4 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('assets/images/logotransparent.png') }}" alt="Logo" class="w-8 h-auto object-contain">
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

        <!-- Logout Confirmation Modal -->
        <div x-show="showLogoutModal" 
             class="fixed inset-0 z-[100] overflow-y-auto" 
             aria-labelledby="modal-title" role="dialog" aria-modal="true"
             x-cloak>
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Background overlay -->
                <div x-show="showLogoutModal" 
                     x-transition:enter="ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     @click="showLogoutModal = false"
                     class="fixed inset-0 bg-navy/60 backdrop-blur-sm transition-opacity" aria-hidden="true"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <!-- Modal panel -->
                <div x-show="showLogoutModal" 
                     x-transition:enter="ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave="ease-in duration-200"
                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     class="inline-block align-bottom bg-white rounded-[2.5rem] text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full p-8">
                    
                    <div class="text-center">
                        <h3 class="text-2xl font-black text-navy mb-2" id="modal-title">Ready to leave?</h3>
                        <p class="text-gray-500 font-medium mb-10">Are you sure you want to log out of your account? You will need to log back in to access your dashboard.</p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <button type="button" 
                                @click="showLogoutModal = false"
                                class="flex-1 px-6 py-4 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold rounded-2xl transition-colors">
                            Stay Logged In
                        </button>
                        <button type="button" 
                                @click="document.getElementById('logout-form').submit()"
                                class="flex-1 px-6 py-4 bg-red-500 hover:bg-red-600 text-white font-bold rounded-2xl shadow-lg shadow-red-500/30 transition-all">
                            Yes, Log Out
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
