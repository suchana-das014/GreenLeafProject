<x-app-layout>
    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4">

            <h2 class="text-2xl font-bold text-green-700 mb-6">
                🌳 Outdoor Plants
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($plants as $plant)

                    <div class="bg-white rounded-2xl shadow hover:shadow-lg transition">

                        <img
                            src="{{ asset('images/plants/' . $plant['image']) }}"
                            alt="{{ $plant['name'] }}"
                            class="w-full h-48 object-cover rounded-t-2xl"
                        >

                        <div class="p-4">
                            <h3 class="text-lg font-semibold">
                                {{ $plant['name'] }}
                            </h3>

                            <p class="text-green-600 font-bold">
                                ৳ {{ $plant['price'] }}
                            </p>

                            <div class="mt-4 space-y-3">

                                <form method="POST" action="{{ route('cart.add', $plant['name']) }}">
                                    @csrf
                                    <button class="w-full bg-green-600 text-white py-2 rounded-lg">
                                        Add to Cart
                                    </button>
                                </form>

                                <div class="flex gap-3">
                                    <form method="POST" action="{{ route('buy.now', $plant['name']) }}" class="w-1/2">
                                        @csrf
                                        <button class="w-full border border-green-600 text-green-600 py-2 rounded-lg">
                                            Buy Now
                                        </button>
                                    </form>

                                    <form method="POST" action="{{ route('wishlist.toggle', $plant['name']) }}" class="w-1/2">
                                        @csrf
                                        <button class="w-full border border-gray-300 py-2 rounded-lg">
                                            Wishlist
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>

                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>