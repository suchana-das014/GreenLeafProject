<x-app-layout>
    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-6">

            <h2 class="text-2xl font-bold text-gray-800 mb-6">📦 Pending Orders</h2>

            @if($orders->isEmpty())
                <div class="bg-white p-6 rounded-xl shadow text-gray-500">
                    No pending orders yet.
                </div>
            @else
                <div class="bg-white rounded-xl shadow overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-gray-100 text-left">
                            <tr>
                                <th class="p-4">Product</th>
                                <th class="p-4">Buyer</th>
                                <th class="p-4">Qty</th>
                                <th class="p-4">Price</th>
                                <th class="p-4">Status</th>
                                <th class="p-4">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr class="border-t">
                                    <td class="p-4 font-semibold">{{ $order->product->name ?? 'N/A' }}</td>
                                    <td class="p-4">{{ $order->buyer->name ?? 'Buyer' }}</td>
                                    <td class="p-4">{{ $order->quantity }}</td>
                                    <td class="p-4">৳ {{ number_format($order->price, 2) }}</td>
                                    <td class="p-4">
                                        <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="p-4 text-gray-500">{{ $order->created_at->format('d M, Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
