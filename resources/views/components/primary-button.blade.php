<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-brick border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest hover:bg-coffee-700 focus:bg-coffee-700 active:bg-navy focus:outline-none focus:ring-2 focus:ring-brick focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg shadow-brick/20']) }}>
    {{ $slot }}
</button>
