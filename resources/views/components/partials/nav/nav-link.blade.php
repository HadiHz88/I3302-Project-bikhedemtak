@props(['href', 'active' => false])

<a href="{{ $href }}"
    @class([
        'rounded-md px-3 py-2 text-sm font-medium transition-colors duration-200',
        'bg-blue-700 text-white' => $active,
        'text-blue-100 hover:bg-blue-700 hover:text-white' => !$active
    ])
    {{ $attributes }}>
    {{ $slot }}
</a>
