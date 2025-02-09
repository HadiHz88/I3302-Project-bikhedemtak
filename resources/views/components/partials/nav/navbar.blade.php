<nav class="bg-gradient-to-r from-blue-600 to-blue-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <button type="button"
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-blue-100 hover:bg-blue-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset"
                        aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                    <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex shrink-0 items-center">
                    <img class="h-8 w-auto" src="{{ asset('images/logo.jpeg') }}"
                         alt="Your Company">
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <!-- Updated nav-link component styles should be modified to use these colors -->
                        <x-partials.nav.nav-link href="#" :active="true">Home</x-partials.nav.nav-link>
                        <x-partials.nav.nav-link href="#" :active="false">Test 1</x-partials.nav.nav-link>
                        <x-partials.nav.nav-link href="#" :active="false">Test 2</x-partials.nav.nav-link>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <x-partials.nav.notification-button/>

                <div class="relative ml-3">
                    <div>
                        <x-partials.nav.profile-button
                            :img-src="asset('https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80')"/>
                    </div>
                    <div
                        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 ring-1 shadow-lg ring-black/5 focus:outline-hidden hidden"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50" role="menuitem" tabindex="-1"
                           id="user-menu-item-0">Your Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50" role="menuitem" tabindex="-1"
                           id="user-menu-item-1">Settings</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50" role="menuitem" tabindex="-1"
                           id="user-menu-item-2">Sign out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sm:hidden hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3">
            <x-partials.nav.mobile-nav-link href="#" :active="true">Home</x-partials.nav.mobile-nav-link>
            <x-partials.nav.mobile-nav-link href="#" :active="false">Test 1</x-partials.nav.mobile-nav-link>
            <x-partials.nav.mobile-nav-link href="#" :active="false">Test 2</x-partials.nav.mobile-nav-link>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const profileButton = document.getElementById('user-menu-button');
        const profileDropdown = profileButton.parentElement.nextElementSibling;
        const mobileButton = document.querySelector('[aria-controls="mobile-menu"]');
        const mobileMenu = document.getElementById('mobile-menu');

        profileButton.addEventListener('click', function (e) {
            e.stopPropagation();
            const isExpanded = profileButton.getAttribute('aria-expanded') === 'true';
            profileButton.setAttribute('aria-expanded', !isExpanded);
            profileDropdown.classList.toggle('hidden');
        });

        mobileButton.addEventListener('click', function () {
            const isExpanded = mobileButton.getAttribute('aria-expanded') === 'true';
            mobileButton.setAttribute('aria-expanded', !isExpanded);
            mobileMenu.classList.toggle('hidden');
        });

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
