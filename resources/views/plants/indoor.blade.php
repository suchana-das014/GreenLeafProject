<x-app-layout>
    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4">

            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-green-700">🌿 Indoor Plants</h2>

                <a href="{{ route('cart.index') }}"
                   class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800">
                    🛒 View Cart
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

                @forelse ($products as $product)
                    <div class="bg-white rounded-2xl shadow hover:shadow-lg transition">

                        <img src="{{ asset('storage/' . $product->image) }}"
                             class="w-full h-48 object-cover rounded-t-2xl">

                        <div class="p-4">
                            <h3 class="text-lg font-semibold">{{ $product->name }}</h3>

                            <p class="text-green-600 font-bold">
                                ৳ {{ number_format($product->price, 2) }}
                            </p>

                            <div class="mt-4 space-y-3">

                                {{-- Add to Cart --}}
                                <form method="POST" action="{{ route('cart.add', $product) }}">
                                    @csrf
                                    <button class="w-full bg-green-600 text-white py-2 rounded-lg">
                                        Add to Cart
                                    </button>
                                </form>

                                <div class="flex gap-3">

                                    {{-- Buy Now --}}
                                    <form method="POST"
                                          action="{{ route('buy.now', $product) }}"
                                          class="w-1/2">
                                        @csrf
                                        <button class="w-full border border-green-600 text-green-600 py-2 rounded-lg">
                                            Buy Now
                                        </button>
                                    </form>

                                    {{-- Wishlist --}}
                                    <form method="POST"
                                          action="{{ route('wishlist.toggle', $product) }}"
                                          class="w-1/2">
                                        @csrf
                                        <button class="w-full border border-gray-300 py-2 rounded-lg">
                                            Wishlist
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 col-span-3 text-center">
                        No indoor plants available right now.
                    </p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
