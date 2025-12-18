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

    <body class="font-sans antialiased min-h-screen bg-white flex items-center justify-center">

       
        <div class="w-full sm:max-w-md flex flex-col items-center">
 
            <div class="mb-6">
                <a href="/" class="flex justify-center">
                    <x-application-logo />
                </a>
            </div>

         
            <div class="w-full px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>

        </div>

    </body>
</html>
