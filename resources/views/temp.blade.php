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
