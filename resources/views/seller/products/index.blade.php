<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Page Header -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">
                    My Products
                </h2>

                <a href="#"
                   class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">
                    + Add Product
                </a>
            </div>

            <!-- Products Table -->
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <table class="min-w-full border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Image</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Name</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Category</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Price</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Stock</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Status</th>
                            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-600">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        @forelse ($products as $product)
                            <tr>
                                <td class="px-6 py-4">
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}"
                                             class="h-12 w-12 object-cover rounded">
                                    @else
                                        <span class="text-gray-400">No Image</span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 font-medium text-gray-800">
                                    {{ $product->name }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ ucfirst($product->category) }}
                                </td>

                                <td class="px-6 py-4">
                                    ৳{{ number_format($product->price, 2) }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $product->stock }}
                                </td>

                                <td class="px-6 py-4">
                                    @if($product->is_active)
                                        <span class="text-green-600 font-semibold">Active</span>
                                    @else
                                        <span class="text-red-500 font-semibold">Inactive</span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-right">
                                    <span class="text-gray-400 text-sm">
                                        Edit | Delete
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-6 text-center text-gray-500">
                                    No products added yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
