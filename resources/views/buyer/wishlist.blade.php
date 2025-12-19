<x-app-layout>
    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4">

            <h2 class="text-2xl font-bold text-green-700 mb-6">
                🤍 My Wishlist
            </h2>

            @if(count($plants) === 0)
                <p class="text-gray-500">Your wishlist is empty.</p>
            @else
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

                                <div class="mt-4 space-y-2">

                                    <form method="POST" action="{{ route('cart.add', $plant['name']) }}">
                                        @csrf
                                        <button class="w-full bg-green-600 text-white py-2 rounded-lg">
                                            Add to Cart
                                        </button>
                                    </form>

                                    <form method="POST" action="{{ route('wishlist.toggle', $plant['name']) }}">
                                        @csrf
                                        <button class="w-full border border-red-400 text-red-500 py-2 rounded-lg">
                                            Remove from Wishlist
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
