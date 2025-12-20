<x-app-layout>
    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4">

            <h2 class="text-2xl font-bold text-green-700 mb-6">
                🤍 My Wishlist
            </h2>

            @if ($wishlists->isEmpty())
                <p class="text-gray-500">Your wishlist is empty.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

                    @foreach ($wishlists as $wishlist)
                        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition">

                            <img
                                src="{{ asset('storage/' . $wishlist->product->image) }}"
                                alt="{{ $wishlist->product->name }}"
                                class="w-full h-48 object-cover rounded-t-2xl"
                            >

                            <div class="p-4">
                                <h3 class="text-lg font-semibold">
                                    {{ $wishlist->product->name }}
                                </h3>

                                <p class="text-green-600 font-bold">
                                    ৳ {{ number_format($wishlist->product->price, 2) }}
                                </p>

                                <form
                                    action="{{ route('wishlist.destroy', $wishlist->id) }}"
                                    method="POST"
                                    class="mt-3"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button class="w-full bg-red-100 text-red-600 py-2 rounded-lg hover:bg-red-200">
                                        ❌ Remove from Wishlist
                                    </button>
                                </form>
                            </div>

                        </div>
                    @endforeach

                </div>
            @endif

        </div>
    </div>
</x-app-layout>
