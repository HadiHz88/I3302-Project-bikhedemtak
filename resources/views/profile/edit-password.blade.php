<x-layout>
    <div class="container mx-auto px-4 py-12">
        <section class="max-w-4xl mx-auto">
            <div class="bg-white rounded-3xl p-8 text-gray-800 shadow-2xl">
                <div class="text-center mb-8">
                    <h2 class="text-4xl font-extrabold mb-4">Update Password</h2>
                    <p class="text-gray-600">Keep your account secure with a strong password</p>

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

                <form method="POST" action="{{ route('profile.password.update') }}" class="space-y-6">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">
                            Current Password
                        </label>
                        <input
                            type="password"
                            id="current_password"
                            name="current_password"
                            required
                            class="w-full px-4 py-2 rounded-lg bg-gray-50 text-gray-800 placeholder-gray-400 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter your current password"
                        />
                    </div>

                    <div>
                        <label for="new_password" class="block text-sm font-medium text-gray-700 mb-1">
                            New Password
                        </label>
                        <input
                            type="password"
                            id="new_password"
                            name="new_password"
                            required
                            class="w-full px-4 py-2 rounded-lg bg-gray-50 text-gray-800 placeholder-gray-400 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter your new password"
                        />
                    </div>

                    <div>
                        <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                            Confirm New Password
                        </label>
                        <input
                            type="password"
                            id="new_password_confirmation"
                            name="new_password_confirmation"
                            required
                            class="w-full px-4 py-2 rounded-lg bg-gray-50 text-gray-800 placeholder-gray-400 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Confirm your new password"
                        />
                    </div>

                    <div>
                        <button
                            type="submit"
                            class="w-full bg-blue-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        >
                            Update Password
                        </button>
                    </div>

                    <div class="text-center text-sm text-gray-600">
                        <a href="{{ route('profile.show') }}" class="font-semibold text-blue-600 hover:text-blue-700">
                            Back to Profile
                        </a>
                    </div>
                </form>
            </div>
        </section>
    </div>
</x-layout>
