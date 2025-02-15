<x-partials.head />

<x-partials.nav.navbar />

<main class="p-10">

    <x-partials.heading>{{ \Illuminate\Support\Facades\Auth::check() ? auth()->user()->name : 'Guest' }}</x-partials.heading>

    {{ $slot }}
</main>

<x-partials.footer />
