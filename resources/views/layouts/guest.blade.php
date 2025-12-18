<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'GreenLeaf') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased min-h-screen 
                 bg-gradient-to-br from-green-50 via-white to-green-100
                 flex items-center justify-center">

        <!-- WRAPPER -->
        <div class="w-full sm:max-w-md flex flex-col items-center px-4">

            <!-- LOGO ABOVE CARD -->
            <div class="mb-8">
                <a href="/" class="flex justify-center">
                    <x-application-logo />
                </a>
            </div>

            <!-- MODERN AUTH CARD -->
            <div
                class="w-full
                       px-10 py-10
                       rounded-3xl
                       bg-white/95 backdrop-blur
                       shadow-[0_25px_60px_rgba(0,0,0,0.12)]
                       border border-gray-200"
            >
                {{ $slot }}
            </div>

        </div>

    </body>
</html>
