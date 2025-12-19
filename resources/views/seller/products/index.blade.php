<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Page Header -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">
                    My Products
                </h2>

                <a href="{{ route('seller.products.create') }}"
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
                            <tr class="hover:bg-gray-50">

                                <!-- Image -->
                                <td class="px-6 py-4">
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}"
                                             alt="{{ $product->name }}"
                                             class="h-12 w-12 object-cover rounded border">
                                    @else
                                        <span class="text-gray-400 text-sm">No Image</span>
                                    @endif
                                </td>

                                <!-- Name -->
                                <td class="px-6 py-4 font-medium text-gray-800">
                                    {{ $product->name }}
                                </td>

                                <!-- Category -->
                                <td class="px-6 py-4 text-gray-700">
                                    {{ ucfirst($product->category) }}
                                </td>

                                <!-- Price -->
                                <td class="px-6 py-4 text-gray-700">
                                    ৳{{ number_format($product->price, 2) }}
                                </td>

                                <!-- Stock -->
                                <td class="px-6 py-4">
                                    @if($product->stock > 0)
                                        <span class="font-semibold text-gray-700">
                                            {{ $product->stock }}
                                        </span>
                                    @else
                                        <span class="text-red-500 font-semibold">
                                            Out of stock
                                        </span>
                                    @endif
                                </td>

                                <!-- Status -->
                                <td class="px-6 py-4">
                                    @if($product->is_active)
                                        <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">
                                            Active
                                        </span>
                                    @else
                                        <span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded">
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                <!-- Actions (Placeholder) -->
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('seller.products.edit', $product->id) }}"
                                       class="text-blue-600 hover:underline">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-10 text-center text-gray-500">
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
