<x-app-layout>
    <div class="p-6">
        
        <div class="flex gap-4">
            <a href="{{ route('seller.products.index') }}"
               class="bg-green-600 text-white px-4 py-2 rounded">
                My Products
            </a>

            <a href="{{ route('seller.orders.index') }}"
   class="px-5 py-3 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition">
   Orders
</a>

        </div>
    </div>
</x-app-layout>
