<!DOCTYPE html>
<html lang="{{ session('language') ?? 'au' ?? str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8" />
    <meta name="application-name" content="{{ config('app.name') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ $title ?? config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Forum&family=Great+Vibes&display=swap">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen font-sans antialiased" style="background: #fff7ee !important;">

<style>
    [x-cloak] { display: none !important;}
    .cursive-font { font-family: 'Great Vibes', cursive; }
    .nice-font { font-family: 'Forum', serif; }
    html { scroll-behavior: smooth; }
</style>

<x-main with-nav full-width>
    <x-slot:content>
        {{ $slot }}
    </x-slot:content>

    <x-slot:footer @class('footer items-center p-4') @style(' background: #e5bda7')>
        <aside class="items-center grid-flow-col place-self-center" style="color: #353f4b">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
            </svg>
            <p>Copyright © {{ date('Y') }} - All right reserved</p>
        </aside>
    </x-slot:footer>
</x-main>

@livewire('notifications')

</body>
</html>
