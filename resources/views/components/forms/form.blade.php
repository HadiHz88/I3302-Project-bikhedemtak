<form {{ $attributes->merge(['class' => 'max-w-2xl mx-auto space-y-6', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}>
    @if ($attributes->get('method', 'GET') !== 'GET')
        @csrf
        @method($attributes->get('method'))
    @endif

    {{ $slot }}
</form>
