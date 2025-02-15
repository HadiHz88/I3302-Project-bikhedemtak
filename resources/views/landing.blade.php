<x-layout>
    <x-partials.heading>{{ \Illuminate\Support\Facades\Auth::check() ? auth()->user()->name : 'Guest' }}</x-partials.heading>
    <div class="container mx-auto px-4 py-8">
        {{--        Get Started --}}
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
                            <p class="text-gray-600 mb-4 flex-grow">Share your skills and start earning by
                                joining
                                our
                                network.</p>
                            <div>
                                <a href="{{ route('providers.create') }}"
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
        <section class="mb-12">
            <h2 class="text-3xl font-bold text-center mb-6">Up For Some Work?</h2>
            <div class="max-w-2xl mx-auto">

                <!-- Search Form -->
                <form action="{{ route('search') }}" method="GET" class="flex">
                    <!-- Search Input -->
                    <input type="text" name="q" placeholder="Search for services requests..."
                           value="{{ request('q') }}"
                           class="flex-grow px-4 py-2 rounded-l-lg border-t border-b border-l text-gray-800 border-gray-200 bg-white"/>

                    <!-- Submit Button -->
                    <button type="submit"
                            class="px-4 py-2 rounded-r-lg bg-blue-500 text-white font-bold hover:bg-blue-600 focus:outline-none focus:shadow-outline">
                        Search
                    </button>
                </form>

            </div>
        </section>

        <!-- Quick Tag Selection -->
        <section class="mb-12">
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

            <h3 class="text-2xl font-semibold mb-4">Popular Tags</h3>
            <div class="rows-container">
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
        </section>

        <section class="mb-12 pt-10">
            <h3 class="text-2xl font-semibold mb-4">Featured Service Requests</h3>
            <div class="grid lg:grid-cols-3 gap-8 mt-6">
                @foreach($featuredRequests as $service_request)
                    <x-request-card :service_request="$service_request"/>
                @endforeach
            </div>
        </section>

        <section class="mb-12">
            <h3 class="text-2xl font-semibold mb-4">Recent Service Requests</h3>
            <div class="mt-6 space-y-6">
                @foreach($service_requests as $service_request)
                    <x-request-card-wide :service_request="$service_request"/>
                @endforeach
            </div>
        </section>


        <!-- Near-Me Profiles Showcase -->
        <section class="mb-12">
            <h3 class="text-2xl font-semibold mb-4">Service Providers Near You</h3>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($providers as $provider)
                    <div class="m-10 max-w-sm">
                        <div class="rounded-lg border bg-white px-4 pt-8 pb-10 shadow-lg">
                            <div class="relative mx-auto w-36 rounded-full">
                                <img class="mx-auto h-auto w-full rounded-full" src="{{ $provider->logo }}"
                                     alt="provider logo"/>
                            </div>
                            <h1 class="my-1 text-center text-xl font-bold leading-8 text-gray-900">{{$provider->name}}</h1>
                            <h3 class="font-lg text-semibold text-center leading-6 text-gray-600">{{$provider->user->name}}</h3>
                            <p class="text-center text-sm leading-6 text-gray-500 hover:text-gray-600">{{$provider->description}}</p>
                            <ul class="mt-3 divide-y rounded bg-gray-100 py-2 px-3 text-gray-600 shadow-sm hover:text-gray-700 hover:shadow">
                                <li class="flex items-center py-3 text-sm">
                                    <span>Rating</span>
                                        <?php
                                        $rating = $provider->rating;
                                        $color = '';
                                        if ($rating > 4) {
                                            $color = 'bg-green-200 text-green-700';
                                        } elseif ($rating > 3) {
                                            $color = 'bg-yellow-200 text-yellow-700';
                                        } elseif ($rating > 2) {
                                            $color = 'bg-blue-200 text-blue-700';
                                        } elseif ($rating > 1) {
                                            $color = 'bg-red-200 text-red-700';
                                        } else {
                                            $color = 'bg-gray-200 text-gray-700';
                                        }
                                        ?>
                                    <span class="ml-auto"><span
                                            class="rounded-full py-1 px-2 text-xs font-medium {{$color}}">{{$rating}}</span></span>
                                </li>
                                <li class="flex items-center py-3 text-sm">
                                    <span>See More</span>
                                    <span class="ml-auto text-blue-500"><a href="/provider/{{$provider->id}}}">click here!</a> </span>
                                </li>
                            </ul>
                        </div>
                    </div>

                @endforeach
            </div>
        </section>
    </div>


</x-layout>
