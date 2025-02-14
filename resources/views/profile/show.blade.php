<x-layout>

    <div class="bg-white overflow-hidden shadow rounded-lg border">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                {{ Str::of($user->name)->explode(' ')->first() }} Profile
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                This is Your account information.
            </p>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
            <dl class="sm:divide-y sm:divide-gray-200">
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Full name
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $user->name }}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Email address
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $user->email }}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Phone number
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $user->phone ?? 'N/A' }}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Profile picture
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <img src="{{ $user->profile_pic }}" alt="Profile picture"
                             class="h-8 w-8 rounded-full">
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Password
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ '********' }}
                    </dd>
                </div>
            </dl>
        </div>

        {{--        Button to edit the profile--}}
        <div class="bg-gray-50 px-4 py-4 sm:px-6">
            <div class="text-right sm:px-6">
                <a href="{{ route('profile.edit') }}"
                   class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Edit
                </a>
            </div>
        </div>
    </div>
</x-layout>
