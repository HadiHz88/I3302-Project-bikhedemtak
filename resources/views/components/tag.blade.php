@props(['tag'])

@php
    // Base styles - keeping padding consistent and constraining size
    $classes = "inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold
                bg-blue-100 text-blue-800 hover:bg-blue-200 hover:text-blue-900
                transition-colors duration-300 whitespace-nowrap";
@endphp

<a href="/tags/{{ strtolower($tag->name) }}" class="{{ $classes }}">
    {{ ucwords($tag->name) }}
</a>
