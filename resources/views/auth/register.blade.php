<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mt-4">
            <p class="block text-sm font-medium text-gray-700 mb-3">Register as</p>

            <div class="grid grid-cols-2 gap-4">
                <!-- Buyer -->
                <div class="cursor-pointer" onclick="document.getElementById('buyer').checked = true; updateSelection()">
                    <input type="radio" id="buyer" name="role" value="buyer" class="hidden" checked>
                    <div class="border-2 border-gray-300 rounded-lg p-4 text-center transition-all hover:border-gray-400 buyer-box"
                        id="buyer-box" style="border-color: #16a34a; background-color: #4ade80;">
                        <h3 class="font-semibold">Buyer</h3>
                        <p class="text-sm text-gray-500">Shop products</p>
                    </div>
                </div>

                <!-- Seller -->
                <div class="cursor-pointer" onclick="document.getElementById('seller').checked = true; updateSelection()">
                    <input type="radio" id="seller" name="role" value="seller" class="hidden">
                    <div class="border-2 border-gray-300 rounded-lg p-4 text-center transition-all hover:border-gray-400 seller-box"
                        id="seller-box" style="border-color: #d1d5db; background-color: transparent;">
                        <h3 class="font-semibold">Seller</h3>
                        <p class="text-sm text-gray-500">Sell products</p>
                    </div>
                </div>
            </div>

            @error('role')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <script>
            function updateSelection() {
                const buyerBox = document.getElementById('buyer-box');
                const sellerBox = document.getElementById('seller-box');
                const buyerInput = document.getElementById('buyer');
                const sellerInput = document.getElementById('seller');

                if (buyerInput.checked) {
                    buyerBox.style.borderColor = '#16a34a';
                    buyerBox.style.backgroundColor = '#4ade80';
                    sellerBox.style.borderColor = '#d1d5db';
                    sellerBox.style.backgroundColor = 'transparent';
                } else {
                    sellerBox.style.borderColor = '#16a34a';
                    sellerBox.style.backgroundColor = '#4ade80';
                    buyerBox.style.borderColor = '#d1d5db';
                    buyerBox.style.backgroundColor = 'transparent';
                }
            }
            
            // Initialize on page load
            document.addEventListener('DOMContentLoaded', function() {
                updateSelection();
            });
        </script>


        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
