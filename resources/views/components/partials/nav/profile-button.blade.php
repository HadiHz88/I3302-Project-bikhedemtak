@props(['imgSrc'])

<button type="button"
        class="relative flex rounded-full bg-blue-700 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-800"
        id="user-menu-button"
        aria-expanded="false"
        aria-haspopup="true">
    <span class="absolute -inset-1.5"></span>
    <span class="sr-only">Open user menu</span>
    <img class="h-8 w-8 rounded-full" src="{{ $imgSrc }}" alt="Profile image">
</button>
