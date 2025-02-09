<x-layout>
    <x-page-heading>Results</x-page-heading>

    <div class="space-y-6">
        @foreach($requests as $request)
        <x-request-card-wide :$request />
        @endforeach
    </div>
</x-layout>