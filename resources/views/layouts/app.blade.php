<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
       <!-- 🌿 FOOTER -->
<footer class="py-16  bg-transparent">
    <!-- FOOTER CARD -->
    <div
        class="max-w-7xl mx-auto rounded-3xl bg-green-50 shadow-xl px-12 py-12"
    >
        <!-- TOP CONTENT -->
        <div class="grid grid-cols-2  md:grid-cols-[1fr_1.5fr] gap-10">

            <!-- LEFT : LOGO + ADDRESS -->
<div class="space-y-6 ml-10">
    <!-- LOGO -->
    <div class="flex items-center gap-3">
        <img
            src="{{ asset('images/leafLogo.jpg') }}"
            alt="GreenLeaf Logo"
            class="h-10 w-10 object-contain"
        />
        <span class="text-2xl font-semibold text-green-700">
            Green<span class="text-green-500">Leaf</span>
        </span>
    </div>

    <!-- CONTACT -->
    <ul class="space-y-2 mt-6 text-sm text-gray-700">
        <li class="flex items-center gap-2">📍 Sylhet, Bangladesh</li>
        <li class="flex items-center gap-2">📧 support@greenleaf.com</li>
        <li class="flex items-center gap-2">📞 +880 013 654 23111</li>
    </ul>
</div>

            <!-- RIGHT : QUICK LINKS + CATEGORIES -->
            <div class="grid grid-cols-2 gap-20">

                <!-- QUICK LINKS -->
                <div>
                    <h4 class="text-sm font-semibold text-gray-800 mb-4 uppercase tracking-wide">
                        Quick Links
                    </h4>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li><a href="#" class="hover:text-green-600 transition">Home</a></li>
                        <li><a href="#" class="hover:text-green-600 transition">Wishlist</a></li>
                        <li><a href="#" class="hover:text-green-600 transition">My Orders</a></li>
                        <li><a href="#" class="hover:text-green-600 transition">Profile</a></li>
                    </ul>
                </div>

                <!-- CATEGORIES -->
                <div>
                    <h4 class="text-sm font-semibold text-gray-800 mb-4 uppercase tracking-wide">
                        Categories
                    </h4>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li class="hover:text-green-600 cursor-pointer">Indoor Plants</li>
                        <li class="hover:text-green-600 cursor-pointer">Outdoor Plants</li>
                        <li class="hover:text-green-600 cursor-pointer">Medicinal Plants</li>
                        <li class="hover:text-green-600 cursor-pointer">Seeds</li>
                        <li class="hover:text-green-600 cursor-pointer">Pots & Tools</li>
                    </ul>
                </div>

            </div>
        </div>

        <!-- FOOTER MESSAGE -->
        <div class="mt-10 pt-6 border-t border-green-200 text-center">
            <p class="text-sm text-gray-600">
                © {{ date('Y') }} GreenLeaf. All rights reserved.
            </p>
        </div>
    </div>
</footer>



    </body>
</html>
