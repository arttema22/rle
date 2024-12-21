@props(['value'])

<label {{ $attributes->merge(['class' => 'text-gray-800 text-sm mb-2 block']) }}>
    {{ $value ?? $slot }}
</label>
