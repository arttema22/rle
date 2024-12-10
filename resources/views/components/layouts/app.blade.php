<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{ $title ?? 'Page Title' }}</title>
</head>

<body>
    <main class="m-2 xl:mx-auto max-w-6xl">

        @livewire('NavBar')

        {{ $slot }}
    </main>
</body>

</html>