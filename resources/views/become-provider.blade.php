<x-layout>
    <div class="container mx-auto px-4 py-12">
        <section class="max-w-4xl mx-auto">
            <div class="bg-gradient-to-br from-indigo-600 to-purple-700 rounded-3xl p-8 text-white shadow-2xl">
                <div class="text-center mb-8">
                    <h2 class="text-4xl font-extrabold mb-4">Become a Provider</h2>
                    <p class="text-indigo-200">Offer your services and connect with clients</p>

                    @if(session('success'))
                        <div class="mt-4 bg-indigo-700 text-white p-4 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>

                <form action="{{ route('providers.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div>
                        <label for="image" class="block text-sm font-medium text-indigo-200 mb-1">
                            Profile Picture
                        </label>
                        <input
                            type="file"
                            id="image"
                            name="image"
                            required
                            class="w-full px-4 py-2 rounded-lg bg-indigo-700 text-white border border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                        />
                    </div>
                    <div>
                        <label for="name" class="block text-sm font-medium text-indigo-200 mb-1">
                            Business/Service Name
                        </label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            required
                            class="w-full px-4 py-2 rounded-lg bg-indigo-700 text-white placeholder-indigo-300 border border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                            placeholder="e.g. John's Plumbing Services"
                        />
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-medium text-green-200 mb-1">
                            Service Description
                        </label>
                        <textarea
                            id="description"
                            name="description"
                            required
                            class="w-full px-4 py-2 rounded-lg bg-indigo-700 text-white placeholder-indigo-300 border border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                            placeholder="Describe your services in detail..."
                        ></textarea>
                    </div>
                    <div class="flex items-center">
                        <input
                            type="checkbox"
                            id="trustworthy"
                            name="trustworthy"
                            required
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-indigo-300 rounded"
                        />
                        <label for="trustworthy" class="ml-2 block text-sm text-indigo-200">
                            I confirm that I am a trustworthy provider and will offer services responsibly.
                        </label>
                    </div>
                    <div>
                        <button
                            type="submit"
                            class="w-full bg-white text-indigo-700 font-bold py-3 px-4 rounded-lg hover:bg-indigo-100 transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Okay
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</x-layout>
