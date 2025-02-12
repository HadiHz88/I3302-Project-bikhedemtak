<x-layout>
    <div class="container mx-auto px-4 py-12">
        <section class="max-w-4xl mx-auto">
            <div class="bg-gradient-to-br from-indigo-600 to-purple-700 rounded-3xl p-8 text-white shadow-2xl">
                <div class="text-center mb-8">
                    <h2 class="text-4xl font-extrabold mb-4">Post a Service Request</h2>
                    <p class="text-indigo-200">Find the perfect professional for your needs</p>

                    @if(session('success'))
                        <div class="mt-4 bg-green-500 text-white p-4 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>

                <form action="{{ url('/jobs') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="title" class="block text-sm font-medium text-indigo-200 mb-1">
                                Title
                            </label>
                            <input
                                type="text"
                                id="title"
                                name="title"
                                required
                                class="w-full px-4 py-2 rounded-lg bg-indigo-700 text-white placeholder-indigo-300 border border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                                placeholder="e.g. Tutor Needed"
                            />
                        </div>
                        <div>
                            <label for="salary" class="block text-sm font-medium text-indigo-200 mb-1">
                                Salary
                            </label>
                            <input
                                type="text"
                                id="salary"
                                name="salary"
                                required
                                class="w-full px-4 py-2 rounded-lg bg-indigo-700 text-white placeholder-indigo-300 border border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                                placeholder="e.g. $50-$100 per hour"
                            />
                        </div>
                    </div>
                    <div>
                        <label for="location" class="block text-sm font-medium text-indigo-200 mb-1">
                            Location
                        </label>
                        <input
                            type="text"
                            id="location"
                            name="location"
                            required
                            class="w-full px-4 py-2 rounded-lg bg-indigo-700 text-white placeholder-indigo-300 border border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                            placeholder="e.g. Beirut,Mount Lebanon,.."
                        />
                    </div>
                    <div>
                        <label for="schedule" class="block text-sm font-medium text-indigo-200 mb-1">
                            Schedule
                        </label>
                        <select
                            id="schedule"
                            name="schedule"
                            required
                            class="w-full px-4 py-2 rounded-lg bg-indigo-700 text-white border border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                        >
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                        </select>
                    </div>
                    <div>
                        <label for="tags" class="block text-sm font-medium text-indigo-200 mb-1">
                            Tags (comma-separated)
                        </label>
                        <input
                            type="text"
                            id="tags"
                            name="tags"
                            class="w-full px-4 py-2 rounded-lg bg-indigo-700 text-white placeholder-indigo-300 border border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                            placeholder="e.g. Tutor, Electrician,.."
                        />
                    </div>
                    <div class="flex items-center">
                        <input
                            type="checkbox"
                            id="featured"
                            name="featured"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-indigo-300 rounded"
                        />
                        <label for="featured" class="ml-2 block text-sm text-indigo-200">
                            Feature this request
                        </label>
                    </div>
                    <div>
                        <button
                            type="submit"
                            class="w-full bg-white text-indigo-700 font-bold py-3 px-4 rounded-lg hover:bg-indigo-100 transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Post Request
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</x-layout>
