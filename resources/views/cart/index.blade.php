<x-app-layout>
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Your Shopping Cart</h1>

    @if($cart && $cart->items->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200 text-left">
                <thead class="bg-green-100">
                    <tr>
                        <th class="p-3 border-b">Product</th>
                        <th class="p-3 border-b">Quantity</th>
                        <th class="p-3 border-b">Price</th>
                        <th class="p-3 border-b">Total</th>
                        <th class="p-3 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart->items as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 border-b flex items-center gap-3">
                                <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" class="w-16 h-16 object-cover rounded">
                                <span>{{ $item->product->name }}</span>
                            </td>

                            <td class="p-3 border-b">
                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center gap-2">
                                    @csrf
                                    <button type="submit" name="action" value="decrease" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">-</button>
                                    <span class="w-12 text-center">{{ $item->quantity }}</span>
                                    <button type="submit" name="action" value="increase" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">+</button>
                                </form>
                            </td>

                            <td class="p-3 border-b">${{ number_format($item->price, 2) }}</td>
                            <td class="p-3 border-b font-semibold">${{ number_format($item->price * $item->quantity, 2) }}</td>
                            <td class="p-3 border-b">
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                        Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex justify-between items-center">
            <div class="text-xl font-bold">
                Total: ${{ number_format($cart->items->sum(fn($item) => $item->price * $item->quantity), 2) }}
            </div>

            <a href="{{ route('checkout') }}" class="bg-green-600 text-white py-2 px-6 rounded-lg hover:bg-green-700">
                Proceed to Checkout
            </a>
        </div>
    @else
        <p class="text-gray-600">Your cart is empty. <a href="{{ route('plants.indoor') }}" class="text-green-600 underline">Shop now</a>.</p>
    @endif
</div>
</x-app-layout>
