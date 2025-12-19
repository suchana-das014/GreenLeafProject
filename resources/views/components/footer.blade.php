<footer class="bg-white border-t border-gray-200 mt-16">
    <div class="max-w-7xl mx-auto px-6 py-10">

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

            <!-- Brand -->
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <x-application-logo class="h-8 w-auto" />
                </div>
                <p class="text-sm text-gray-500">
                    GreenLeaf is your trusted marketplace for plants, seeds,
                    and gardening essentials.
                </p>
            </div>

            <!-- Links -->
            <div>
                <h4 class="font-semibold text-gray-800 mb-3">Quick Links</h4>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li><a href="#" class="hover:text-green-600">Home</a></li>
                    <li><a href="#" class="hover:text-green-600">Wishlist</a></li>
                    <li><a href="#" class="hover:text-green-600">My Orders</a></li>
                </ul>
            </div>

            <!-- Categories -->
            <div>
                <h4 class="font-semibold text-gray-800 mb-3">Categories</h4>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li>Indoor Plants</li>
                    <li>Outdoor Plants</li>
                    <li>Medicinal Plants</li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="font-semibold text-gray-800 mb-3">Contact</h4>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li>support@greenleaf.com</li>
                    <li>+880 1XXX-XXXXXX</li>
                    <li>Sylhet, Bangladesh</li>
                </ul>
            </div>

        </div>

        <div class="border-t border-gray-200 mt-8 pt-4 text-center text-sm text-gray-500">
            © {{ date('Y') }} GreenLeaf. All rights reserved.
        </div>

    </div>
</footer>
