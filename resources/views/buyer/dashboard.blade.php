<x-app-layout>  

    <div class="py-6 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- 🔍 SEARCH SECTION -->
            <div class="mb-8">
                <div class="bg-white p-5 rounded-2xl shadow-sm">
                    <form method="GET" action="#" class="flex flex-col sm:flex-row gap-4">

                        <div class="flex-1">
                            <input
                                type="text"
                                name="search"
                                placeholder="Search plants, seeds, tools..."
                                class="w-full px-5 py-3 rounded-xl border border-gray-300
                                       focus:ring-2 focus:ring-green-400 focus:border-green-400 transition"
                            >
                        </div>

                        <div class="w-full sm:w-56">
                            <select class="w-full px-4 py-3 rounded-xl border border-gray-300
                                           focus:ring-2 focus:ring-green-400 focus:border-green-400">
                                <option value="">All Categories</option>
                                <option>Indoor Plants</option>
                                <option>Outdoor Plants</option>
                                <option>Flowering Plants</option>
                                <option>Medicinal Plants</option>
                                <option>Succulent Plants</option>
                                <option>Bonsai Plants</option>
                                <option>Gardening & Growing</option>
                                <option>Seeds</option>
                                <option>Pots & Tools</option>
                            </select>
                        </div>

                        <button
                            type="submit"
                            class="px-6 py-3 rounded-xl bg-green-600 text-white font-semibold
                                   hover:bg-green-700 transition">
                            Search
                        </button>

                    </form>
                </div>
            </div>

            <!-- 👋 WELCOME -->
            <div class="bg-white rounded-2xl shadow-sm p-6 mb-8">
                <h3 class="text-2xl font-bold text-green-700">
                    Welcome, {{ auth()->user()->name }} 🌿
                </h3>
                <p class="text-gray-600 mt-1">
                    Discover plants, track your orders, and grow with GreenLeaf.
                </p>
            </div>

            <!-- 🧩 DASHBOARD CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <a href="{{ route('plants.indoor') }}" class="block bg-white rounded-xl p-6 shadow hover:shadow-md transition">
                    <h4 class="text-lg font-semibold text-green-600">🌿 Indoor Plants</h4>
                    <p class="text-sm text-gray-500 mt-2">Perfect for home & office</p>
                </a>

                <a href="{{ route('plants.outdoor') }}" class="block bg-white rounded-xl p-6 shadow hover:shadow-md transition">
                    <h4 class="text-lg font-semibold text-green-600">🌳 Outdoor Plants</h4>
                    <p class="text-sm text-gray-500 mt-2">Perfect for garden spaces</p>
                </a>

                <div class="bg-white rounded-xl p-6 shadow">
                    <h4 class="text-lg font-semibold text-green-600">🌼 Medicinal Plants</h4>
                    <p class="text-sm text-gray-500 mt-2">Health & wellness plants</p>
                </div>
            </div>

            <!-- 🌿 FEATURED PRODUCTS -->
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">
                    Featured Products
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

                    @forelse ($products as $product)
                        <div class="bg-white rounded-2xl shadow p-4">

                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                class="w-full h-48 object-cover rounded-xl"
                                alt="{{ $product->name }}"
                            >

                            <h3 class="mt-3 font-semibold text-lg">
                                {{ $product->name }}
                            </h3>

                            <p class="text-green-600 font-bold">
                                ৳{{ number_format($product->price, 2) }}
                            </p>

                            <!-- ACTION BUTTONS -->
                            <div class="mt-4 flex gap-2">

                                <!-- ✅ BUY NOW -->
                                <form action="{{ route('buy.now', $product->id) }}" method="POST">
                                    @csrf
                                    <button class="px-4 py-2 bg-green-600 text-white rounded-lg">
                                        Buy Now
                                    </button>
                                </form>

                                <!-- ADD TO CART -->
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                                        Add to Cart
                                    </button>
                                </form>

                                <!-- ❤️ WISHLIST (FIXED) -->
                                <form action="{{ route('wishlist.toggle', $product->id) }}" method="POST">
                                    @csrf
                                    <button
                                        class="px-3 py-2 border border-red-400 rounded-lg
                                               text-red-500 hover:bg-red-100">
                                        ❤️
                                    </button>
                                </form>

                            </div>

                        </div>
                    @empty
                        <p class="text-gray-500">No products available.</p>
                    @endforelse

                </div>
            </div>

        </div>
    </div>

</x-app-layout>
