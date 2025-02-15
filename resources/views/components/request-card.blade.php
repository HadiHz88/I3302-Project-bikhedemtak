@props(['service_request'])


<x-panel class="flex flex-col text-center ">
    <div class="self-start text-sm">{{ $service_request->provider->name  }}</div>

    <div class="py-8">
        <h3 class="group-hover:text-blue-800 text-xl font-bold transition-colors duration-300">
            {{ $service_request->title }}
        </h3>
        <p class="text-sm mt-4">{{ $service_request->salary }}</p>
    </div>

    <div class="flex justify-between items-center mt-auto">
        <div>
            @foreach($service_request->tags as $tag)
            <x-tag :tag="$tag" size="small" />
            @endforeach

        </div>

        <x-provider-logo :provider="$service_request->provider" :width="42" />
    </div>
</x-panel>
