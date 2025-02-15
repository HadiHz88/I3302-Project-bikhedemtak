@props(['service_request'])

<x-panel class="w-full flex gap-x-6">
    <div>
        <img
            src="{{ Str::startsWith($service_request->user->profile_pic, 'http') ? $service_request->user->profile_pic : asset('storage/' . $service_request->user->profile_pic) }}"
            alt="User Profile Pic"
            class="rounded-xl"
            width="90"
        >
    </div>

    <div class="flex-1 flex flex-col">
        <a href="#"
            class="self-start text-sm text-gray-400 transition-colors duration-300">{{ $service_request->user->name }}</a>

        <h3 class="font-bold text-xl mt-3 group-hover:text-blue-800">

            {{ $service_request->title }}

        </h3>

        <p class="text-sm text-gray-400 mt-auto">{{ $service_request->salary }}</p>
    </div>

    <div>
        @foreach($service_request->tags as $tag)
        <x-tag :$tag />
        @endforeach
    </div>
</x-panel>
