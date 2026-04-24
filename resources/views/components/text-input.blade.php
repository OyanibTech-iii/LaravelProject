@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-gray-50/50 border-gray-200 focus:border-brick focus:ring-brick rounded-xl shadow-sm transition-all duration-200 text-sm']) }}>
