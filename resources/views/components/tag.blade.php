@props(['tag', 'size' => 'base'])

@php

$classes = "bg-blue-50 hover:bg-blue-100 rounded-xl font-bold transition-colors duration-300 text-blue-700";

if ($size === 'base') {
$classes .= " px-5 py-1 text-sm";
}

if ($size === 'small') {
$classes .= " px-3 py-1 text-xs";
}
@endphp

<a href="/tags/{{ strtolower($tag->name) }}" class="{{ $classes }}">
    {{ ucwords($tag->name) }}
</a>