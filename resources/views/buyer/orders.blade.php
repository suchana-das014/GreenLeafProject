<x-app-layout>
    <div class="py-6 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-6 flex items-center justify-between">
                <h2 class="text-2xl font-bold text-gray-800">📦 My Orders</h2>

                <a href="{{ route('cart.index') }}"
                   class="px-4 py-2 rounded-xl bg-green-600 text-white hover:bg-green-700 transition">
                    View Cart
                </a>
            </div>

            {{-- Success Message --}}
            @if (session('success'))
                <div class="mb-4 p-4 rounded-xl bg-green-100 text-green-800 border border-green-200">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Orders --}}
            @if ($orders->isEmpty())
                <div class="bg-white p-8 rounded-2xl shadow-sm text-center">
                    <p class="text-gray-600 text-lg">No orders found yet.</p>
                    <a href="{{ url('/') }}"
                       class="inline-block mt-4 px-5 py-2 rounded-xl bg-green-600 text-white hover:bg-green-700 transition">
                        Continue Shopping
                    </a>
                </div>
            @else
                <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead class="bg-gray-100 text-gray-700">
                                <tr>
                                    <th class="px-5 py-3 text-left">Product</th>
                                    <th class="px-5 py-3 text-left">Name</th>
                                    <th class="px-5 py-3 text-left">Qty</th>
                                    <th class="px-5 py-3 text-left">Price</th>
                                    <th class="px-5 py-3 text-left">Total</th>
                                    <th class="px-5 py-3 text-left">Date</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y">
                                @foreach ($orders as $order)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-5 py-4">
                                            @if ($order->product && $order->product->image)
                                                <img
                                                    src="{{ asset('storage/' . $order->product->image) }}"
                                                    class="w-14 h-14 rounded-xl object-cover border"
                                                    alt="Product"
                                                >
                                            @else
                                                <div class="w-14 h-14 rounded-xl bg-gray-200 flex items-center justify-center text-gray-500">
                                                    N/A
                                                </div>
                                            @endif
                                        </td>

                                        <td class="px-5 py-4 font-medium text-gray-800">
                                            {{ $order->product->name ?? 'Deleted Product' }}
                                        </td>

                                        <td class="px-5 py-4 text-gray-700">
                                            {{ $order->quantity }}
                                        </td>

                                        <td class="px-5 py-4 text-gray-700">
                                            ৳{{ number_format($order->price, 2) }}
                                        </td>

                                        <td class="px-5 py-4 font-semibold text-gray-900">
                                            ৳{{ number_format($order->price * $order->quantity, 2) }}
                                        </td>

                                        <td class="px-5 py-4 text-gray-600">
                                            {{ optional($order->created_at)->format('d M Y, h:i A') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
