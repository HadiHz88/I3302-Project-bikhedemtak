<x-layout>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Profile</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Include Tailwind CSS -->
    <!-- Add a star icon (you can use an icon library like Heroicons or FontAwesome) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- PROVIDER'S PROFILE Text -->
    <div class="flex justify-center mt-10">
        <h1 class="text-4xl font-bold text-gray-800">PROVIDER'S PROFILE</h1>
    </div>

    <!-- Main Container -->
    <div class="container mx-auto mt-6 p-4">
        <!-- Larger Container -->
        <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden p-8">
            <!-- Star, Profile Photo, and Name Section -->
            <div class="flex items-start">
                <!-- Star Section (Top-Left) -->
                <div class="flex flex-col items-center mr-6">
                    <i class="fas fa-star text-yellow-400 text-3xl"></i> <!-- Star Icon -->
                    <span class="text-gray-800 font-semibold mt-2 text-lg">{{ $provider->rating }}/5</span> <!-- Rating Value -->
                </div>

                <!-- Profile Photo and Name -->
                <div class="flex items-center">
                    <!-- Profile Photo -->
                    <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-white shadow-lg">
                        <img src="{{ asset('storage/' . $provider->logo) }}" alt="{{ $provider->name }}" class="w-full h-full object-cover">
                    </div>

                    <!-- Provider Name -->
                    <h2 class="text-3xl font-bold text-gray-800 ml-6">{{ $provider->name }}</h2>
                </div>
            </div>

            <!-- Provider Information Section -->
            <div class="mt-8">
                <!-- Provider Phone -->
                <div class="bg-gray-200 p-6 rounded-lg mb-6">
                    <p class="text-gray-600 text-lg">
                        <span class="font-semibold">Phone:</span> {{ $provider->phone }}
                    </p>
                </div>

                <!-- Provider Description -->
                <div class="bg-gray-200 p-6 rounded-lg mb-6">
                    <p class="text-gray-600 text-lg">
                        <span class="font-semibold">Description:</span> {{ $provider->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
</x-layout>