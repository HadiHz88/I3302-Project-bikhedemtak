<div class="min-h-screen flex flex-col">
    <x-partials.head />
    <x-partials.nav.navbar />

    <main class="mt-10 max-w-[986px] mx-auto flex-grow">
        <!-- Search Section -->
        <section class="mb-12">
            <h2 class="text-3xl font-bold text-center mb-6">Find Local Services Near You</h2>
            <div class="max-w-2xl mx-auto">
                <!-- Search Form -->
                <form action="{{ route('search') }}" method="GET" class="flex">
                    <input type="text" name="q" placeholder="Search for services..."
                        class="flex-grow px-4 py-2 rounded-l-lg border text-gray-800 border-gray-200 bg-white" />
                    <button type="submit"
                        class="px-4 py-2 rounded-r-lg bg-blue-500 text-white font-bold hover:bg-blue-600 focus:outline-none">
                        Search
                    </button>
                </form>
            </div>
        </section>

        <!-- Results Section -->
        <div class="space-y-6 flex-grow">
            @if($requests->isEmpty())
            <p class="text-center text-gray-600 last:mb-0 flex-grow">No results found for "{{ request('q') }}".</p>
            @else
            @foreach($requests as $service_request)

            <x-request-card-wide :service_request="$service_request" class="last:mb-0" />
            @endforeach

            <!-- Pagination Links -->
            @if($requests->hasPages())
            <div class="mt-8 flex justify-center last:mb-0">
                {{ $requests->links() }}
            </div>
            @endif
            @endif
        </div>
    </main>

    <x-partials.footer />
</div>
