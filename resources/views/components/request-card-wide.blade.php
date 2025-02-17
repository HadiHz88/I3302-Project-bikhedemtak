@props(['service_request'])

<div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
    <div class="p-6 flex gap-6">
        <!-- User Profile Picture -->
        <div>
            <img
                src="{{ Str::startsWith($service_request->user->profile_pic, 'http') ? $service_request->user->profile_pic : asset('storage/' . $service_request->user->profile_pic) }}"
                alt="User Profile Pic"
                class="h-16 w-16 rounded-full"
            >
        </div>

        <!-- Service Request Details -->
        <div class="flex-1">
            <a href="#" class="text-sm text-gray-500 hover:text-blue-600">{{ $service_request->user->name }}</a>
            <h3 class="mt-2 text-xl font-bold text-gray-900">{{ $service_request->title }}</h3>
            <p class="mt-2 text-sm text-gray-600">{{ $service_request->salary }}</p>
            <div class="mt-4 flex flex-wrap gap-2">
                @foreach($service_request->tags as $tag)
                    <x-tag :tag="$tag" />
                @endforeach
            </div>
        </div>
    </div>
</div>
