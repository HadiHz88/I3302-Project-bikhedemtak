@props(['provider', 'width' => 90])

@if ($provider && $provider->logo)
<img src="{{ asset('storage/' . $provider->logo) }}" alt="Provider Logo" class="rounded-xl" width="{{ $width }}">
@else
<p>No logo available.</p>
@endif
