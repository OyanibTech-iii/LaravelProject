<x-guest-layout>
    <x-slot name="sideLeft">true</x-slot>
    <x-slot name="sideImage">
        <img src="{{ asset('assets/images/coffee banner.jfif') }}" alt="Register Banner" class="absolute inset-0 w-full h-full object-cover">
    </x-slot>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div class="reveal reveal-delay-1">
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="John Doe" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="reveal reveal-delay-2">
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="hello@icedcoffee.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="reveal reveal-delay-3" x-data="{ show: false }">
            <div class="flex justify-between items-center">
                <x-input-label for="password" :value="__('Create Password')" />
                <button type="button" @click="show = !show" class="text-xs font-extrabold text-brick uppercase tracking-widest hover:text-navy transition-colors focus:outline-none">
                    <span x-show="!show">Show</span>
                    <span x-show="show">Hide</span>
                </button>
            </div>
            <x-text-input id="password" class="block mt-1 w-full"
                            x-bind:type="show ? 'text' : 'password'"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="reveal reveal-delay-4" x-data="{ show: false }">
            <div class="flex justify-between items-center">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <button type="button" @click="show = !show" class="text-xs font-extrabold text-brick uppercase tracking-widest hover:text-navy transition-colors focus:outline-none">
                    <span x-show="!show">Show</span>
                    <span x-show="show">Hide</span>
                </button>
            </div>
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            x-bind:type="show ? 'text' : 'password'"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="reveal reveal-delay-4">
            <x-primary-button class="w-full justify-center py-4 text-base tracking-wide">
                {{ __('Create Account') }}
            </x-primary-button>
        </div>

        <div class="text-center reveal reveal-delay-4">
            <p class="text-sm text-gray-600">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-brick font-bold hover:text-navy transition-colors">Sign in here</a>
            </p>
        </div>
    </form>
</x-guest-layout>
