@props(['service_request'])

<div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
    <div class="p-6">
        <div class="flex items-center justify-between">
            <div class="text-sm text-gray-500">{{ $service_request->user->name }}</div>
            <img
                src="{{ Str::startsWith($service_request->user->profile_pic, 'http') ? $service_request->user->profile_pic : asset('storage/' . $service_request->user->profile_pic) }}"
                alt="User Profile Pic"
                class="h-10 w-10 rounded-full"
            >
        </div>
        <h3 class="mt-4 text-xl font-bold text-gray-900">{{ $service_request->title }}</h3>
        <p class="mt-2 text-sm text-gray-600">{{ $service_request->salary }}</p>
        <div class="mt-4 flex flex-wrap gap-2">
            @foreach($service_request->tags as $tag)
                <x-tag :tag="$tag" size="small"/>
            @endforeach
        </div>
    </div>
</div>
