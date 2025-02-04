@props(['imgSrc'])

<button type="button"
        class="relative flex rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden"
        id="user-menu-button"
        aria-expanded="false"
        aria-haspopup="true">
    <span class="absolute -inset-1.5"></span>
    <span class="sr-only">Open user menu</span>
    <img class="size-8 rounded-full"
         src="{{ $imgSrc }}"
         alt="Profile image">
</button>
