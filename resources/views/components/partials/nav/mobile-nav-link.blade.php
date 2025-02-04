@props(['href', 'active' => false])

<a href="{{ $href }}"
    @class([
        'block rounded-md px-3 py-2 text-base font-medium',
        'bg-gray-900 text-white' => $active,
        'text-gray-300 hover:bg-gray-700 hover:text-white' => !$active
    ])
    {{ $attributes }}>
    {{ $slot }}
</a>
