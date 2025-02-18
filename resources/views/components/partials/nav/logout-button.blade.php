@props(['href' => route('logout'), 'active' => false])

<form action="{{ $href }}" method="POST" class="inline">
    @csrf
    @method('DELETE')
    <button type="submit"
        @class([
            'rounded-md px-3 py-2 text-sm font-medium transition-colors duration-200',
            'bg-blue-700 text-white' => $active,
            'text-blue-100 hover:bg-blue-700 hover:text-white' => !$active
        ])
        {{ $attributes }}>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
            <polyline points="16 17 21 12 16 7"/>
            <line x1="21" y1="12" x2="9" y2="12"/>
        </svg>
    </button>
</form>
