<x-layout>

    <!-- Hero Section -->
    <x-partials.heading>{{ \Illuminate\Support\Facades\Auth::check() ? auth()->user()->name : 'Guest' }}</x-partials.heading>

    <!-- CTA -->
    <section class="my-16 max-w-4xl mx-auto">
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-2xl p-8 text-white shadow-xl">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold mb-4">Ready to Get Started?</h2>
                <p class="text-lg text-blue-100 max-w-2xl mx-auto">
                    Whether you're looking for services or want to offer your expertise,
                    we've got you covered. Join our community today!
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-6 justify-center items-stretch">
                <div class="w-full sm:w-1/2 max-w-xs">
                    <div class="bg-white rounded-xl p-6 text-center h-full flex flex-col">
                        <div class="mb-4">
                            <svg class="w-12 h-12 mx-auto text-blue-600" fill="none" stroke="currentColor"
                            <svg class="w-12 h-12 mx-auto text-blue-600" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Need a Service?</h3>
                        <p class="text-gray-600 mb-4 flex-grow">Post your request and get matched with qualified
                            providers in your area.</p>
                        <div>
                            <a href="{{ route('service-requests.create') }}"
                               class="inline-block bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition duration-300">
                                Post a Request
                            </a>
                        </div>
                    </div>
                </div>

                <?php
                $showBecomeAProvider = true;
                if (auth()->check() && auth()->user()->provider) {
                    $showBecomeAProvider = false;
                }
                ?>

                <div class="w-full sm:w-1/2 max-w-xs {{ $showBecomeAProvider ? '' : 'hidden' }}">
                    <div class="bg-white rounded-xl p-6 text-center h-full flex flex-col">
                        <div class="mb-4">
                            <svg class="w-12 h-12 mx-auto text-blue-600" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Become a Provider</h3>
                        <p class="text-gray-600 mb-4 flex-grow">Share your skills and start earning by joining our
                            network.</p>
                        <div>
                            <a href="/become"
                               class="inline-block bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition duration-300">
                                Join as Provider
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="bg-white py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-6">Up For Some Work?</h2>
            <div class="max-w-2xl mx-auto">
                <form action="{{ route('search') }}" method="GET" class="flex">
                    <input type="text" name="q" placeholder="Search for service requests..."
                           value="{{ request('q') }}"
                           class="flex-grow px-4 py-2 rounded-l-lg border-t border-b border-l text-gray-800 border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                    <button type="submit"
                            class="px-4 py-2 rounded-r-lg bg-blue-600 text-white font-bold hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Search
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Popular Tags Section -->
    <section class="bg-gray-50 py-12">
        @php
            // Ensure $popularTags is an array and not empty
            $popularTags = $popularTags ?? [];

            // Convert the Collection to an array
            $popularTagsArray = $popularTags->toArray();

            if (!empty($popularTagsArray)) {
               // Calculate tags per row (for 2 rows, divide total by 2)
               $tagsPerRow = ceil(count($popularTagsArray) / 2);
               // Split tags into rows
               $rows = array_chunk($popularTagsArray, $tagsPerRow);
               // Calculate duration based on tags per row
               $duration = $tagsPerRow * 2;
            } else {
               $rows = [];
               $duration = 0;
            }
        @endphp

        <style>
            @keyframes scroll {
                0% {
                    transform: translateX(0);
                }
                100% {
                    transform: translateX(-50%);
                }
            }

            .auto-scroll-container {
                overflow: hidden;
                position: relative;
                width: 100%;
            }

            .auto-scroll-container::before,
            .auto-scroll-container::after {
                content: "";
                position: absolute;
                top: 0;
                width: 100px;
                height: 100%;
                z-index: 2;
                pointer-events: none;
            }

            .auto-scroll-container::before {
                left: 0;
                background: linear-gradient(to right,
                rgba(255, 255, 255, 1) 0%,
                rgba(255, 255, 255, 0) 100%
                );
            }

            .auto-scroll-container::after {
                right: 0;
                background: linear-gradient(to left,
                rgba(255, 255, 255, 1) 0%,
                rgba(255, 255, 255, 0) 100%
                );
            }

            .rows-container {
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
            }

            .auto-scroll {
                display: inline-flex;
                gap: 2px;
                white-space: nowrap;
                width: max-content;
                position: relative;
                padding: 0.5rem 100px;
            }

            /* Alternate animation direction for second row */
            .auto-scroll.forward {
                animation: scroll {{ $duration }}s linear infinite;
            }

            .auto-scroll.reverse {
                animation: scroll {{ $duration }}s linear infinite reverse;
            }

            .auto-scroll-content {
                display: flex;
                gap: 2px;
                padding-right: 2px;
            }

            .auto-scroll:hover {
                animation-play-state: paused;
            }
        </style>
        <div class="container mx-auto px-4">
            <h3 class="text-2xl font-semibold text-center mb-6">Popular Tags</h3>
            <div class="flex flex-wrap justify-center gap-2">
                @foreach($rows as $index => $rowTags)
                    <div class="auto-scroll-container">
                        <div class="auto-scroll {{ $index % 2 == 0 ? 'forward' : 'reverse' }}">
                            <!-- Original content -->
                            <div class="auto-scroll-content">
                                @foreach ($rowTags as $tag)
                                    <a href="{{ route('search', ['q' => $tag['name']]) }}"
                                       class="px-3 py-1 bg-gray-200 text-gray-800 rounded-full hover:bg-gray-300 transition duration-300">
                                        {{ $tag['name'] }}
                                    </a>
                                @endforeach
                            </div>
                            <!-- Cloned content for seamless loop -->
                            <div class="auto-scroll-content">
                                @foreach ($rowTags as $tag)
                                    <a href="{{ route('search', ['q' => $tag['name']]) }}"
                                       class="px-3 py-1 bg-gray-200 text-gray-800 rounded-full hover:bg-gray-300 transition duration-300">
                                        {{ $tag['name'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Service Requests Section -->
    <section class="bg-white py-12">
        <div class="container mx-auto px-4">
            <h3 class="text-2xl font-semibold text-center mb-6">Featured Service Requests</h3>
            <div class="grid lg:grid-cols-3 gap-8">
                @foreach($featuredRequests as $service_request)
                    <x-request-card :service_request="$service_request"/>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Recent Service Requests Section -->
    <section class="bg-gray-50 py-12">
        <div class="container mx-auto px-4">
            <h3 class="text-2xl font-semibold text-center mb-6">Recent Service Requests</h3>
            <div class="space-y-6">
                @foreach($service_requests as $service_request)
                    <x-request-card-wide :service_request="$service_request"/>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Service Providers Near You Section -->
    <section class="bg-white py-12">
        <div class="container mx-auto px-4">
            <h3 class="text-2xl font-semibold text-center mb-6">Service Providers Near You</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($providers as $provider)
                    <x-provider-card :provider="$provider"/>
                @endforeach
            </div>
        </div>
    </section>
</x-layout>
