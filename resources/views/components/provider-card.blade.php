@props(['provider'])

<div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col">
    <!-- Top Section -->
    <div class="p-6 flex-1">
        <!-- Provider Logo -->
        <div class="flex justify-center">
            <img class="h-24 w-24 rounded-full object-cover" src="{{ $provider->logo }}" alt="{{ $provider->name }}"/>
        </div>

        <!-- Provider Name -->
        <h3 class="mt-4 text-xl font-bold text-center">{{ $provider->name }}</h3>

        <!-- Truncated Description -->
        <p class="mt-2 text-sm text-gray-600 text-center">
            {{ Str::limit($provider->description, 15, '...') }}
        </p>
    </div>

    <!-- Bottom Section -->
    <div class="p-6">
        <!-- Rating -->
        <div class="flex justify-center">
            <span class="px-3 py-1 text-sm font-semibold bg-blue-100 text-blue-800 rounded-full">
                Rating: {{ $provider->rating }}
            </span>
        </div>

        <!-- View Profile Link -->
        <div class="mt-4 text-center">
            <a href="/provider/{{ $provider->id }}" class="text-blue-600 hover:text-blue-800">
                View Profile →
            </a>
        </div>
    </div>
</div>
