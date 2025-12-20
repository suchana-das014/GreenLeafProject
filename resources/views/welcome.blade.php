<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GreenLeaf 🌿</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800">

<!-- NAVBAR -->
<nav class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-green-700">🌿 GreenLeaf</h1>
        <div class="space-x-4">
            <a href="/login"   class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Login</a>
           
            <a href="/register"
               class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                Register
            </a>
        </div>
    </div>
</nav>

<!-- HERO SECTION -->
<section class="bg-gradient-to-r from-green-100 to-emerald-100">
    <div class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-2 gap-10 items-center">
        <div>
            <h2 class="text-4xl font-bold mb-4 text-green-800">
                Bring Nature Home 🌱
            </h2>
            <p class="text-gray-600 mb-6">
                Discover indoor & outdoor plants, seeds, and gardening tools.
            </p>
            <a href="/register"
               class="inline-block px-6 py-3 bg-green-600 text-white rounded-xl shadow hover:bg-green-700 transition">
                Get Started
            </a>
        </div>

        <img src="https://images.unsplash.com/photo-1501004318641-b39e6451bec6"
             class="rounded-2xl shadow-lg" alt="Plants">
    </div>
</section>

<!-- CATEGORIES -->


<!-- FOOTER -->
<footer class="bg-white border-t py-6 text-center text-gray-500">
    © {{ date('Y') }} GreenLeaf. All rights reserved.
</footer>

</body>
</html>
