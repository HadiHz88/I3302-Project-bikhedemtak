<x-layout>
    <div class="container mx-auto px-4 py-12">
        <section class="max-w-4xl mx-auto">
            <div class="bg-white rounded-3xl p-8 text-gray-800 shadow-2xl">
                <div class="text-center mb-8">
                    <h2 class="text-4xl font-extrabold mb-4">Update Profile</h2>
                    <p class="text-gray-600">Update your profile information and picture.</p>

                    @if(session('success'))
                        <div class="mt-4 bg-blue-100 text-blue-800 p-4 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mt-4 bg-red-100 text-red-800 p-4 rounded-lg">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data"
                      class="space-y-6">
                    @csrf
                    @method('PATCH')

                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name', $user->name) }}"
                            required
                            class="w-full px-4 py-2 rounded-lg bg-gray-50 text-gray-800 placeholder-gray-400 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter your full name"
                        />
                    </div>

                    <!-- Profile Picture Field -->
                    <div>
                        <label for="profile_pic" class="block text-sm font-medium text-gray-700 mb-1">Profile
                            Picture</label>
                        <input
                            type="file"
                            id="profile_pic"
                            name="profile_pic"
                            accept="image/*"
                            class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300 cursor-pointer"/>
                        <div class="mt-4">
                            <img src="{{ $user->profile_pic }}" alt="Current Profile Picture"
                                 class="h-24 w-24 rounded-full object-cover">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button
                            type="submit"
                            class="w-full bg-blue-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        >
                            Update Profile
                        </button>
                    </div>

                    <div class="text-center text-sm text-gray-600">
                        <a href="{{ route('profile.show') }}" class="font-semibold text-blue-600 hover:text-blue-700">Back
                            to Profile</a>
                    </div>
                </form>
            </div>
        </section>
    </div>
</x-layout>
