<x-app-layout>
    <div class="py-8">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow">

            <h2 class="text-2xl font-bold mb-6">Checkout</h2>

            @if($cart && $cart->items->count())
                <table class="w-full border mb-6">
                    <thead class="bg-green-100">
                        <tr>
                            <th class="p-3 text-left">Product</th>
                            <th class="p-3">Qty</th>
                            <th class="p-3">Price</th>
                            <th class="p-3">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $grandTotal = 0; @endphp

                        @foreach($cart->items as $item)
                            @php
                                $total = $item->quantity * $item->product->price;
                                $grandTotal += $total;
                            @endphp
                            <tr class="border-t">
                                <td class="p-3">{{ $item->product->name }}</td>
                                <td class="p-3 text-center">{{ $item->quantity }}</td>
                                <td class="p-3 text-center">${{ $item->product->price }}</td>
                                <td class="p-3 text-center font-semibold">${{ $total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold">
                        Total: ${{ $grandTotal }}
                    </h3>

                    <form method="POST" action="{{ route('order.confirm') }}">
                        @csrf
                        <button class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700">
                            Confirm Order
                        </button>
                    </form>
                </div>
            @else
                <p>Your cart is empty.</p>
            @endif

        </div>
    </div>
</x-app-layout>
