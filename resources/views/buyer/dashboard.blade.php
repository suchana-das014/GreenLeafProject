<x-app-layout>

    <div class="py-6 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- 🔍 SEARCH SECTION -->
            <div class="mb-8">
                <div class="bg-white p-5 rounded-2xl shadow-sm">
                    <form method="GET" action="#" class="flex flex-col sm:flex-row gap-4">

                        <!-- Search Input -->
                        <div class="flex-1">
                            <input
                                type="text"
                                name="search"
                                placeholder="Search plants, seeds, tools..."
                                class="w-full px-5 py-3 rounded-xl border border-gray-300
                                       focus:ring-2 focus:ring-green-400
                                       focus:border-green-400 transition"
                            >
                        </div>

                        <!-- Category Dropdown -->
                        <div class="w-full sm:w-56">
                            <select
                                class="w-full px-4 py-3 rounded-xl border border-gray-300
                                       focus:ring-2 focus:ring-green-400
                                       focus:border-green-400"
                            >
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

                        <!-- Search Button -->
                        <button
                            type="submit"
                            class="px-6 py-3 rounded-xl bg-green-600 text-white font-semibold
                                   hover:bg-green-700 transition"                      >
                            Search
                        </button>

                    </form>
                </div>
            </div>

            <!-- 👋 Welcome Section -->
            <div class="bg-white rounded-2xl shadow-sm p-6 mb-8">
                <h3 class="text-2xl font-bold text-green-700">
                    Welcome, {{ auth()->user()->name }} 🌿
                </h3>
                <p class="text-gray-600 mt-1">
                    Discover plants, track your orders, and grow with GreenLeaf.
                </p>
            </div>

            <!-- 🧩 Dashboard Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Indoor Plants -->
                <div class="bg-white rounded-xl p-6 shadow hover:shadow-md transition">
                    <h4 class="text-lg font-semibold text-green-600">🌱 Indoor Plants</h4>
                    <p class="text-sm text-gray-500 mt-2">
                        Perfect for home & office
                    </p>
                </div>

                <!-- Outdoor Plants -->
                <div class="bg-white rounded-xl p-6 shadow hover:shadow-md transition">
                    <h4 class="text-lg font-semibold text-green-600">🌳 Outdoor Plants</h4>
                    <p class="text-sm text-gray-500 mt-2">
                        For garden & balcony
                    </p>
                </div>

                <!-- Medicinal Plants -->
                <div class="bg-white rounded-xl p-6 shadow hover:shadow-md transition">
                    <h4 class="text-lg font-semibold text-green-600">🌼 Medicinal Plants</h4>
                    <p class="text-sm text-gray-500 mt-2">
                        Health & wellness plants
                    </p>
                </div>

                <!-- Flowering Plants -->
                <div class="bg-white rounded-xl p-6 shadow hover:shadow-md transition">
                    <h4 class="text-lg font-semibold text-green-600">🌸 Flowering Plants</h4>
                    <p class="text-sm text-gray-500 mt-2">
                        Colorful & decorative plants
                    </p>
                </div>
                 <!-- Bonsai Plants -->
<div class="bg-white rounded-xl p-6 shadow hover:shadow-md transition">
    <h4 class="text-lg font-semibold text-green-600">🌾 Bonsai Plants</h4>
    <p class="text-sm text-gray-500 mt-2">
        Elegant miniature trees for artistic décor
    </p>
</div>

<!-- Succulent Plants -->
<div class="bg-white rounded-xl p-6 shadow hover:shadow-md transition">
    <h4 class="text-lg font-semibold text-green-600">🌵 Succulent Plants</h4>
    <p class="text-sm text-gray-500 mt-2">
        Low-maintenance plants perfect for indoor spaces
    </p>
</div>

<!-- Gardening & Growing -->
<div class="bg-white rounded-xl p-6 shadow hover:shadow-md transition">
    <h4 class="text-lg font-semibold text-green-600">🌱 Gardening & Growing</h4>
    <p class="text-sm text-gray-500 mt-2">
        Tools, seeds, and essentials for healthy plant growth
    </p>
</div>


                <!-- Seeds -->
                <div class="bg-white rounded-xl p-6 shadow hover:shadow-md transition">
                    <h4 class="text-lg font-semibold text-green-600">🌾 Seeds</h4>
                    <p class="text-sm text-gray-500 mt-2">
                        Grow plants from scratch
                    </p>
                </div>
               

                <!-- Pots & Tools -->
                <div class="bg-white rounded-xl p-6 shadow hover:shadow-md transition">
                    <h4 class="text-lg font-semibold text-green-600">🪴 Pots & Tools</h4>
                    <p class="text-sm text-gray-500 mt-2">
                        Gardening essentials
                    </p>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>
