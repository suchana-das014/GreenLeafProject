<x-app-layout>
    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4">

            <h2 class="text-2xl font-bold text-green-700 mb-6">
                🌿 Outdoor Plants
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

                @forelse ($products as $product)

                    <div class="bg-white rounded-2xl shadow hover:shadow-lg transition">

                        {{-- Product Image --}}
                        <img src="{{ asset('storage/' . $product->image) }}"
                             alt="{{ $product->name }}"
                             class="w-full h-48 object-cover rounded-t-2xl">

                        <div class="p-4">
                            <h3 class="text-lg font-semibold">
                                {{ $product->name }}
                            </h3>

                            <p class="text-green-600 font-bold">
                                ৳ {{ number_format($product->price, 2) }}
                            </p>

                            <div class="mt-4 space-y-3">

                                {{-- Add to Cart --}}
                                <form method="POST" action="{{ route('cart.add', $product->id) }}">
                                    @csrf
                                    <button
                                        class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">
                                        Add to Cart
                                    </button>
                                </form>

                                <div class="flex gap-3">

                                    {{-- Buy Now --}}
                                    <form method="POST"
                                          action="{{ route('buy.now', $product->id) }}"
                                          class="w-1/2">
                                        @csrf
                                        <button
                                            class="w-full border border-green-600 text-green-600 py-2 rounded-lg">
                                            Buy Now
                                        </button>
                                    </form>

                                    {{-- Wishlist --}}
                                    <form method="POST"
                                          action="{{ route('wishlist.toggle', $product->id) }}"
                                          class="w-1/2">
                                        @csrf
                                        <button
                                            class="w-full border border-gray-300 py-2 rounded-lg">
                                            Wishlist
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <p class="text-gray-500 col-span-3 text-center">
                        No outdoor plants available right now.
                    </p>
                @endforelse

            </div>

        </div>
    </div>
</x-app-layout>
