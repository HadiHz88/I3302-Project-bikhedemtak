<x-layout>
    <div class="container mx-auto px-4 py-12">
        <section class="max-w-4xl mx-auto">
            <div class="bg-white rounded-3xl p-8 text-gray-800 shadow-2xl">
                <div class="text-center mb-8">
                    <h2 class="text-4xl font-extrabold mb-4">Post a Service Request</h2>
                    <p class="text-gray-600">Find the perfect professional for your needs</p>

                    @if(session('success'))
                        <div class="mt-4 bg-blue-100 text-blue-800 p-4 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mt-4 bg-red-100 text-red-800 p-4 rounded-lg">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <form action="{{ route('service-requests.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                                Title
                            </label>
                            <input
                                type="text"
                                id="title"
                                name="title"
                                required
                                value="{{ old('title') }}"
                                class="w-full px-4 py-2 rounded-lg bg-gray-50 text-gray-800 placeholder-gray-400 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="e.g. Tutor Needed"
                            />
                        </div>
                        <div>
                            <label for="salary" class="block text-sm font-medium text-gray-700 mb-1">
                                Salary
                            </label>
                            <input
                                type="text"
                                id="salary"
                                name="salary"
                                required
                                value="{{ old('salary') }}"
                                class="w-full px-4 py-2 rounded-lg bg-gray-50 text-gray-800 placeholder-gray-400 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="e.g. $50-$100 per hour"
                            />
                        </div>
                    </div>
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700 mb-1">
                            Location
                        </label>
                        <input
                            type="text"
                            id="location"
                            name="location"
                            required
                            value="{{ old('location') }}"
                            class="w-full px-4 py-2 rounded-lg bg-gray-50 text-gray-800 placeholder-gray-400 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g. Beirut, Mount Lebanon,..."
                        />
                    </div>
                    <div>
                        <label for="schedule" class="block text-sm font-medium text-gray-700 mb-1">
                            Schedule Date and Time
                        </label>
                        <input
                            type="datetime-local"
                            id="schedule"
                            name="schedule"
                            required
                            value="{{ old('schedule') }}"
                            class="w-full px-4 py-2 rounded-lg bg-gray-50 text-gray-800 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        />
                    </div>
                    <div>
                        <label for="tag_ids" class="block text-sm font-medium text-gray-700 mb-1">
                            Select Tags
                        </label>
                        <select
                            id="tag_ids"
                            name="tag_ids[]"
                            multiple
                            class="select2 w-full px-4 py-2 rounded-lg bg-gray-50 text-gray-800 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            data-placeholder="Search and select tags..."
                        >
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tag_ids', [])) ? 'selected' : '' }}>
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button
                            type="submit"
                            class="w-full bg-blue-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        >
                            Post Request
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <style>
            .select2-container--default .select2-selection--multiple {
                background-color: #f9fafb; /* Light gray background */
                border-color: #d1d5db; /* Gray border */
            }
            .select2-container--default .select2-selection--multiple .select2-selection__choice {
                background-color: #3b82f6; /* Blue background for selected tags */
                border-color: #3b82f6; /* Blue border for selected tags */
                color: white; /* White text for selected tags */
            }
            .select2-dropdown {
                background-color: #ffffff; /* White background for dropdown */
                border-color: #d1d5db; /* Gray border */
            }
            .select2-search__field {
                color: #374151; /* Gray text for search input */
            }
            .select2-results__option {
                color: #374151; /* Gray text for dropdown options */
            }
            .select2-container--default .select2-results__option--highlighted[aria-selected] {
                background-color: #3b82f6; /* Blue background for highlighted option */
                color: white; /* White text for highlighted option */
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.select2').select2({
                    theme: 'default',
                    width: '100%'
                });
            });
        </script>
    @endpush
</x-layout>
