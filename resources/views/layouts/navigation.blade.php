<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Left side -->
            <div class="flex items-center">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('buyer.dashboard') }}" class="flex items-center">
                        <x-application-logo class="block h-10 w-auto" />
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="hidden sm:flex sm:items-center sm:space-x-10 sm:ml-12">

                    @auth
                        @if(auth()->user()->role === 'buyer')

                            <x-nav-link
                                :href="route('buyer.dashboard')"
                                :active="request()->routeIs('buyer.dashboard')">
                                Home
                            </x-nav-link>

                            <x-nav-link
                                :href="route('wishlist.index')"
                                :active="request()->routeIs('wishlist.index')">
                                Wishlist
                            </x-nav-link>

                            <x-nav-link
                                :href="route('buyer.orders')"
                                :active="request()->routeIs('buyer.orders')">
                                My Orders
                            </x-nav-link>

                        @elseif(auth()->user()->role === 'seller')

                            <x-nav-link
                                :href="route('seller.products.index')"
                                :active="request()->routeIs('seller.products.*')">
                                My Products
                            </x-nav-link>

                        @endif
                    @endauth

                </div>
            </div>

            <!-- Right side -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 text-sm font-medium
                                       rounded-md text-gray-600 bg-white
                                       hover:text-green-600 transition"
                            >
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293
                                                 a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4
                                                 a1 1 0 010-1.414z"
                                              clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                Profile
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link
                                    :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Log Out
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth

                @guest
                    <x-nav-link :href="route('login')">Login</x-nav-link>
                    <x-nav-link :href="route('register')">Register</x-nav-link>
                @endguest

            </div>

            <!-- Mobile Hamburger -->
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md
                               text-gray-500 hover:text-green-600 hover:bg-gray-100
                               transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }"
                              class="inline-flex" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }"
                              class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">

        <div class="pt-2 pb-3 space-y-1">
            @auth
                @if(auth()->user()->role === 'buyer')
                    <x-responsive-nav-link
                        :href="route('buyer.dashboard')"
                        :active="request()->routeIs('buyer.dashboard')">
                        Home
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('wishlist.index')">
                        Wishlist
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('buyer.orders')">
                        My Orders
                    </x-responsive-nav-link>

                @elseif(auth()->user()->role === 'seller')
                    <x-responsive-nav-link :href="route('seller.products.index')">
                        My Products
                    </x-responsive-nav-link>
                @endif
            @endauth

            @guest
                <x-responsive-nav-link :href="route('login')">Login</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')">Register</x-responsive-nav-link>
            @endguest
        </div>

        @auth
            <!-- Mobile Profile -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="font-medium text-sm text-gray-500">
                        {{ Auth::user()->email }}
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        Profile
                    </x-responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link
                            :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            Log Out
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth

    </div>
</nav>
