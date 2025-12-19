<x-app-layout>
    <div class="max-w-3xl mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Edit Product</h2>

        <form action="{{ route('seller.products.update', $product->id) }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-4">

            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <label class="font-semibold">Product Name</label>
                <input type="text" name="name"
                       value="{{ old('name', $product->name) }}"
                       class="w-full border rounded px-3 py-2">
            </div>

            <!-- Category -->
            <div>
                <label class="font-semibold">Category</label>
                <select name="category" class="w-full border rounded px-3 py-2">
                    @foreach(['indoor','outdoor','seed','tool'] as $cat)
                        <option value="{{ $cat }}"
                            {{ $product->category == $cat ? 'selected' : '' }}>
                            {{ ucfirst($cat) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Price -->
            <div>
                <label class="font-semibold">Price</label>
                <input type="number" step="0.01" name="price"
                       value="{{ $product->price }}"
                       class="w-full border rounded px-3 py-2">
            </div>

            <!-- Stock -->
            <div>
                <label class="font-semibold">Stock</label>
                <input type="number" name="stock"
                       value="{{ $product->stock }}"
                       class="w-full border rounded px-3 py-2">
            </div>

            <!-- Description -->
            <div>
                <label class="font-semibold">Description</label>
                <textarea name="description"
                          class="w-full border rounded px-3 py-2">{{ $product->description }}</textarea>
            </div>

            <!-- Image -->
            <div>
                <label class="font-semibold">Product Image</label>
                <input type="file" name="image" class="w-full border rounded px-3 py-2">

                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}"
                         class="h-20 mt-2 rounded">
                @endif
            </div>

            <!-- Buttons -->
            <div class="flex gap-4">
                <button type="submit"
                        class="bg-green-600 text-white px-6 py-2 rounded">
                    Update Product
                </button>

                <a href="{{ route('seller.products.index') }}"
                   class="px-6 py-2 border rounded">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
