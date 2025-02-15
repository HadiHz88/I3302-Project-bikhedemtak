<x-layout>
    <!-- Main Container -->
    <div class="min-h-screen bg-gray-100 py-10">
        <!-- PROVIDER'S PROFILE Text -->
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-gray-800">PROVIDER'S PROFILE</h1>
        </div>

        <!-- Profile Card -->
        <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Profile Header Section -->
            <div class="p-8">
                <!-- Star and Rating Section -->
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <!-- Star Icon -->
                        <svg class="w-8 h-8 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <!-- Rating Value -->
                        <span class="text-gray-800 font-semibold text-xl ml-2">{{ $provider->rating }}/5</span>
                    </div>
                </div>

                <!-- Profile Photo and Name Section -->
                <div class="flex items-center space-x-6">
                    <!-- Profile Photo -->
                    <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-white shadow-lg">
                        <img src="{{ $provider->logo }}" alt="{{ $provider->name }}" class="w-full h-full object-cover">
                    </div>

                    <!-- Provider Name -->
                    <h2 class="text-4xl font-bold text-gray-800">{{ $provider->name }}</h2>
                </div>
            </div>

            <!-- Provider Information Section -->
            <div class="bg-gray-50 p-8">
                <!-- Provider Phone -->
                <div class="mb-6">
                    <p class="text-gray-600 text-lg">
                        <span class="font-semibold">Phone:</span> {{ $provider->phone }}
                    </p>
                </div>

                <!-- Provider Description -->
                <div class="mb-6">
                    <p class="text-gray-600 text-lg">
                        <span class="font-semibold">Description:</span> {{ $provider->description }}
                    </p>
                </div>
            </div>

            <!-- Rating and Reviews Section -->
            <div class="p-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Ratings & Reviews</h3>

                <!-- Star Selector for Rating -->
                <form action="{{ route('provider.rate', $provider->id) }}" method="POST">
                    @csrf
                    <div class="mb-8">
                        <p class="text-gray-600 text-lg mb-4">Rate this provider:</p>
                        <div class="flex space-x-1" id="star-rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <div class="relative w-8 h-8 cursor-pointer" data-full-value="{{ $i }}">
                                    <!-- Background/empty star -->
                                    <svg class="w-8 h-8 text-gray-300 absolute" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.364-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                    </svg>

                                    <!-- Half star container (left half) -->
                                    <div class="absolute w-4 h-8 overflow-hidden hover:half-star cursor-pointer"
                                         data-half-value="{{ $i - 0.5 }}">
                                        <svg class="w-8 h-8 text-gray-300 half-star-svg" fill="currentColor"
                                             viewBox="0 0 24 24">
                                            <path
                                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.364-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                        </svg>
                                    </div>

                                    <!-- Full star container -->
                                    <div class="absolute w-8 h-8 overflow-hidden hover:full-star cursor-pointer"
                                         data-full-value="{{ $i }}">
                                        <svg class="w-8 h-8 text-gray-300 full-star-svg" fill="currentColor"
                                             viewBox="0 0 24 24">
                                            <path
                                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.364-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                        </svg>
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <input type="hidden" name="rating" id="selected-rating" value="0">
                    </div>

                    <!-- Review Comment -->
                    <div class="mb-6">
                        <label for="review" class="block text-gray-600 text-lg mb-2">Leave a review:</label>
                        <textarea name="review" id="review" rows="4"
                                  class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                  placeholder="Write your review here..."></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                            class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                        Submit Rating
                    </button>
                </form>

                <!-- Recent Reviews -->
                <div class="mt-10">
                    <h4 class="text-xl font-semibold text-gray-800 mb-4">Recent Reviews</h4>
                    @if ($provider->ratings->isEmpty())
                        <p class="text-gray-600">No reviews yet. Be the first to review this provider!</p>
                    @else
                        @foreach ($provider->ratings as $rating)
                            <div class="mb-6">
                                <div class="flex items-center mb-2">
                                    <!-- Reviewer Name -->
                                    <p class="text-gray-800 font-semibold">{{ $rating->ratedBy->name }}</p>
                                    <!-- Review Rating -->
                                    <div class="flex items-center ml-4">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <div class="relative w-5 h-5">
                                                <!-- Background star -->
                                                <svg class="w-5 h-5 text-gray-300" fill="currentColor"
                                                     viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>

                                                <!-- Half star if needed -->
                                                @if ($rating->rating >= $i - 0.5 && $rating->rating < $i)
                                                    <div class="absolute top-0 left-0 w-2.5 h-5 overflow-hidden">
                                                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor"
                                                             viewBox="0 0 20 20">
                                                            <path
                                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                        </svg>
                                                    </div>
                                                @endif

                                                <!-- Full star if needed -->
                                                @if ($rating->rating >= $i)
                                                    <svg class="absolute top-0 left-0 w-5 h-5 text-yellow-400"
                                                         fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                @endif
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                                <!-- Review Comment -->
                                <p class="text-gray-600">{{ $rating->review }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Star Rating -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const starRating = document.getElementById('star-rating');
            const selectedRating = document.getElementById('selected-rating');
            let currentRating = 0;

            // Function to update stars based on selected rating
            function updateStars(rating) {
                const stars = starRating.querySelectorAll('.relative');

                stars.forEach((star, index) => {
                    const fullValue = parseInt(star.getAttribute('data-full-value'));
                    const halfStar = star.querySelector('.half-star-svg');
                    const fullStar = star.querySelector('.full-star-svg');

                    // Reset all stars first
                    halfStar.classList.remove('text-yellow-400');
                    halfStar.classList.add('text-gray-300');
                    fullStar.classList.remove('text-yellow-400');
                    fullStar.classList.add('text-gray-300');

                    // Check if we should color the half star or full star
                    if (rating >= fullValue) {
                        // Full star should be colored
                        fullStar.classList.remove('text-gray-300');
                        fullStar.classList.add('text-yellow-400');
                    } else if (rating >= fullValue - 0.5) {
                        // Half star should be colored
                        halfStar.classList.remove('text-gray-300');
                        halfStar.classList.add('text-yellow-400');
                    }
                });

                // Update the hidden input with the selected rating
                selectedRating.value = rating;
                currentRating = rating;
            }

            // Event delegation for clicking on stars
            starRating.addEventListener('click', function (event) {
                // Find the closest elements with data attributes
                const halfStarElement = event.target.closest('[data-half-value]');
                const fullStarElement = event.target.closest('[data-full-value]');

                if (halfStarElement) {
                    const halfStarRect = halfStarElement.getBoundingClientRect();
                    // If click is in the left half of the half-star element
                    if (event.clientX < halfStarRect.left + (halfStarRect.width / 2)) {
                        const rating = parseFloat(halfStarElement.getAttribute('data-half-value'));
                        updateStars(rating);
                        return;
                    }
                }

                if (fullStarElement) {
                    const rating = parseFloat(fullStarElement.getAttribute('data-full-value'));
                    updateStars(rating);
                }
            });

            // Add hover effects for half and full stars
            starRating.querySelectorAll('.relative').forEach(star => {
                const fullValue = parseFloat(star.getAttribute('data-full-value'));
                const halfStarContainer = star.querySelector('[data-half-value]');

                if (halfStarContainer) {
                    halfStarContainer.addEventListener('mousemove', (e) => {
                        if (!currentRating) {
                            const rect = halfStarContainer.getBoundingClientRect();
                            if (e.clientX < rect.left + (rect.width / 2)) {
                                // Hovering over left half (half star)
                                const halfValue = parseFloat(halfStarContainer.getAttribute('data-half-value'));
                                updateStars(halfValue);
                            } else {
                                // Hovering over right half (full star)
                                updateStars(fullValue);
                            }
                        }
                    });
                }

                star.addEventListener('mouseenter', () => {
                    if (!currentRating) {
                        updateStars(fullValue);
                    }
                });
            });

            // Reset on mouse leave if no rating selected
            starRating.addEventListener('mouseleave', () => {
                if (currentRating) {
                    updateStars(currentRating);
                } else {
                    updateStars(0);
                }
            });
        });
    </script>
</x-layout>
