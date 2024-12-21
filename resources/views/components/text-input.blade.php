@props(['disabled' => false])

<input @disabled($disabled)
    {{ $attributes->merge(['class' => 'w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600']) }}>
