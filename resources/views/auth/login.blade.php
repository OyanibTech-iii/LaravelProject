<x-guest-layout>
    <x-slot name="sideImage">
        <img src="{{ asset('assets/images/coffee banner.jfif') }}" alt="Login Banner" class="absolute inset-0 w-full h-full object-cover">
    </x-slot>

    <div class="mb-8 text-center reveal">
        <h2 class="text-2xl font-black text-navy">Welcome Back!</h2>
        <p class="text-sm text-gray-500 mt-2">Log in to manage your coffee orders and stats.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div class="reveal reveal-delay-1">
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="yourworkingemail@gmail.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="reveal reveal-delay-2" x-data="{ show: false }">
            <div class="flex justify-between items-center">
                <x-input-label for="password" :value="__('Password')" />
                <button type="button" @click="show = !show" class="text-xs font-extrabold text-brick uppercase tracking-widest hover:text-navy transition-colors focus:outline-none">
                    <span x-show="!show">Show</span>
                    <span x-show="show">Hide</span>
                </button>
            </div>
            <x-text-input id="password" class="block mt-1 w-full"
                            x-bind:type="show ? 'text' : 'password'"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between reveal reveal-delay-3">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded-lg border-gray-300 text-brick shadow-sm focus:ring-brick cursor-pointer" name="remember">
                <span class="ms-2 text-sm text-gray-600 font-medium">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-xs font-bold text-brick hover:text-navy transition-colors rounded-md focus:outline-none" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <div class="reveal reveal-delay-3">
            <x-primary-button class="w-full justify-center py-4 text-base tracking-wide">
                {{ __('Log in to Dashboard') }}
            </x-primary-button>
        </div>

        <div class="text-center reveal reveal-delay-3">
            <p class="text-sm text-gray-600">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-brick font-bold hover:text-navy transition-colors">Create one now</a>
            </p>
        </div>
    </form>
</x-guest-layout>
