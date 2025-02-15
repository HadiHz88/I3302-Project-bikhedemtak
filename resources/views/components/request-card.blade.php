@props(['service_request'])
<x-panel class="flex flex-col text-center ">
    <div class="self-start text-sm">{{ $service_request->user->name  }}</div>

    <div class="py-8">
        <h3 class="group-hover:text-blue-800 text-xl font-bold transition-colors duration-300">
            {{ $service_request->title }}
        </h3>
        <p class="text-sm mt-4">{{ $service_request->salary }}</p>
    </div>

    <div class="flex justify-between items-center mt-auto">
        <div>
            @foreach($service_request->tags as $tag)
                <x-tag :tag="$tag" size="small"/>
            @endforeach

        </div>

        <img
            src="{{ Str::startsWith($service_request->user->profile_pic, 'http') ? $service_request->user->profile_pic : asset('storage/' . $service_request->user->profile_pic) }}"
            alt="User Profile Pic"
            class="rounded-xl"
            width="48"
        >
    </div>
</x-panel>
