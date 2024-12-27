@props(['value'])

<label {{ $attributes->merge(['class' => 'text-gray-800 text-sm mb-2 ml-4 block']) }}>
    {{ $value ?? $slot }}
</label>
