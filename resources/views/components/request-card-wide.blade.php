@props(['service_request'])

<x-panel class="w-full flex gap-x-6">
    <div>
        <x-provider-logo :provider="$service_request->provider" />
    </div>

    <div class="flex-1 flex flex-col">
        <a href="#"
            class="self-start text-sm text-gray-400 transition-colors duration-300">{{ $service_request->provider->name }}</a>

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