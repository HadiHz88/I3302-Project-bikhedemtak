@props(['href', 'active' => false])

<a href="{{ $href }}"
    @class([
        'rounded-md px-3 py-2 text-sm font-medium',
        'bg-blue-950 text-white' => $active,
        'text-gray-300 hover:bg-blue-700 hover:text-white' => !$active
    ])
    {{ $attributes }}>
    {{ $slot }}
</a>
