<x-app-layout>
    <div class="max-w-3xl mx-auto py-8">
        <div class="bg-white shadow rounded-lg p-6">

            <h2 class="text-2xl font-bold mb-6">Add New Product</h2>

            <form action="{{ route('seller.products.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-4">
                @csrf

                <div>
                    <label class="font-semibold">Product Name</label>
                    <input type="text" name="name"
                           class="w-full border rounded px-3 py-2"
                           required>
                </div>

                <div>
                    <label class="font-semibold">Category</label>
                    <select name="category"
                            class="w-full border rounded px-3 py-2" required>
                        <option value="">Select category</option>
                        <option value="indoor">Indoor</option>
                        <option value="outdoor">Outdoor</option>
                        <option value="seed">Seed</option>
                        <option value="tool">Tool</option>
                    </select>
                </div>

                <div>
                    <label class="font-semibold">Price</label>
                    <input type="number" step="0.01" name="price"
                           class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="font-semibold">Stock</label>
                    <input type="number" name="stock"
                           class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="font-semibold">Description</label>
                    <textarea name="description"
                              class="w-full border rounded px-3 py-2"></textarea>
                </div>

                <div>
                    <label class="font-semibold">Product Image</label>
                    <input type="file" name="image"
                           class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="flex gap-4">
                    <button type="submit"
                            class="bg-green-600 text-white px-6 py-2 rounded">
                        Save Product
                    </button>

                    <a href="{{ route('seller.products.index') }}"
                       class="px-6 py-2 border rounded">
                        Cancel
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
