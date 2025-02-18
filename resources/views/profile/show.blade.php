<x-layout>
    <!-- Main Container -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden border">
        <!-- Profile Header -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-6 py-8">
            <h1 class="text-3xl font-bold text-white">
                {{ Str::of($user->name)->explode(' ')->first() }}'s Profile
            </h1>
            <p class="mt-2 text-blue-100">
                Manage your account information and settings.
            </p>
        </div>

        <!-- Profile Content -->
        <div class="px-6 py-8">
            <!-- Profile Picture Section -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Profile Picture</h2>
                <div class="flex items-center space-x-6">
                    <img src="{{ $user->profile_pic }}" alt="Profile Picture"
                         class="h-24 w-24 rounded-full object-cover border-4 border-white shadow-lg">
                    <div>
                        <a href="/profile/edit" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300 cursor-pointer">
                            Edit Your Information
                        </a>
                        <p class="mt-2 text-sm text-gray-500">Recommended size: 200x200 pixels.</p>
                    </div>
                </div>
            </div>

            <!-- Account Information Section -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Account Information</h2>
                <div class="space-y-4">
                    <div class="flex justify-between items-center border-b border-gray-200 pb-4">
                        <p class="text-gray-600">Full Name</p>
                        <p class="text-gray-900 font-medium">{{ $user->name }}</p>
                    </div>
                    <div class="flex justify-between items-center border-b border-gray-200 pb-4">
                        <p class="text-gray-600">Email Address</p>
                        <p class="text-gray-900 font-medium">{{ $user->email }}</p>
                    </div>
                    <div class="flex justify-between items-center border-b border-gray-200 pb-4">
                        <p class="text-gray-600">Phone Number</p>
                        <p class="text-gray-900 font-medium">{{ $user->phone ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <!-- Password Section -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Password</h2>
                <div class="flex justify-between items-center border-b border-gray-200 pb-4">
                    <p class="text-gray-600">********</p>
                    <a href="profile/password"
                       class="text-blue-600 hover:text-blue-800 underline">
                        Update Password
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
