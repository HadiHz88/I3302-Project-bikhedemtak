<nav class="bg-gradient-to-r from-blue-600 to-blue-800 shadow-lg">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Logo and Left Side Links -->
            <div class="flex items-center">
                <!-- Mobile Menu Button -->
                <div class="flex sm:hidden">
                    <button type="button"
                            class="inline-flex items-center justify-center rounded-md p-2 text-blue-100 hover:bg-blue-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white"
                            aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                        </svg>
                    </button>
                </div>

                <!-- Logo -->
                <div class="flex shrink-0 items-center">
                    <img class="h-8 w-auto" src="{{ asset('images/logo.png') }}" alt="Your Company">
                </div>

                <!-- Desktop Links -->
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <x-partials.nav.nav-link href="/" :active="request()->is('/')">Home</x-partials.nav.nav-link>
                        <x-partials.nav.nav-link href="/about" :active="request()->is('about')">About Us</x-partials.nav.nav-link>
                    </div>
                </div>
            </div>

            <!-- Right Side Links (Auth/Profile or Guest Links) -->
            <div class="flex items-center">
                @auth
                    <!-- Logout Button -->
                    <x-partials.nav.logout-button class="hidden sm:block"/>

                    <!-- Profile Dropdown -->
                    <div class="relative ml-3">
                        <x-partials.nav.profile-button :img-src="Auth::user()->profile_pic"/>

                        <!-- Dropdown Menu -->
                        <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none hidden"
                             role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50" role="menuitem" tabindex="-1">
                                Your Profile
                            </a>
                        </div>
                    </div>
                @endauth

                @guest
                    <!-- Guest Links -->
                    <div class="hidden sm:flex space-x-4">
                        <x-partials.nav.nav-link href="/login" :active="request()->is('login')">Login</x-partials.nav.nav-link>
                        <x-partials.nav.nav-link href="/register" :active="request()->is('register')">Register</x-partials.nav.nav-link>
                    </div>
                @endguest
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="sm:hidden hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3">
            <x-partials.nav.mobile-nav-link href="/" :active="request()->is('/')">Home</x-partials.nav.mobile-nav-link>
            <x-partials.nav.mobile-nav-link href="/about" :active="request()->is('about')">About Us</x-partials.nav.mobile-nav-link>

            @auth
                <x-partials.nav.mobile-nav-link href="/profile" :active="request()->is('profile')">Profile</x-partials.nav.mobile-nav-link>
                <x-partials.nav.mobile-nav-link href="/logout" :active="false">Logout</x-partials.nav.mobile-nav-link>
            @endauth

            @guest
                <x-partials.nav.mobile-nav-link href="/login" :active="request()->is('login')">Login</x-partials.nav.mobile-nav-link>
                <x-partials.nav.mobile-nav-link href="/register" :active="request()->is('register')">Register</x-partials.nav.mobile-nav-link>
            @endguest
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const profileButton = document.getElementById('user-menu-button');
        const profileDropdown = profileButton.nextElementSibling;
        const mobileButton = document.querySelector('[aria-controls="mobile-menu"]');
        const mobileMenu = document.getElementById('mobile-menu');

        // Toggle Profile Dropdown
        profileButton.addEventListener('click', function (e) {
            e.stopPropagation();
            const isExpanded = profileButton.getAttribute('aria-expanded') === 'true';
            profileButton.setAttribute('aria-expanded', !isExpanded);
            profileDropdown.classList.toggle('hidden');
        });

        // Toggle Mobile Menu
        mobileButton.addEventListener('click', function () {
            const isExpanded = mobileButton.getAttribute('aria-expanded') === 'true';
            mobileButton.setAttribute('aria-expanded', !isExpanded);
            mobileMenu.classList.toggle('hidden');
        });

        // Close Dropdowns on Click Outside
        document.addEventListener('click', function (e) {
            if (!profileDropdown.contains(e.target) && !profileButton.contains(e.target)) {
                profileDropdown.classList.add('hidden');
                profileButton.setAttribute('aria-expanded', 'false');
            }
            if (!mobileMenu.contains(e.target) && !mobileButton.contains(e.target)) {
                mobileMenu.classList.add('hidden');
                mobileButton.setAttribute('aria-expanded', 'false');
            }
        });
    });
</script>
