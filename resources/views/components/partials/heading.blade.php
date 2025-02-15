<div class="relative overflow-hidden bg-gradient-to-r from-blue-900 to-blue-400 py-8 rounded-lg shadow-lg">

    <h1 class="text-6xl font-bold text-white text-center mb-10">
        Hello {{ $slot }}
    </h1>

    <!-- Animated Text -->
    <div class="whitespace-nowrap animate-slide">
        <h1 class="text-4xl font-bold text-white inline-block">
            Ready to start working today? Or do you need some services? 🚀
        </h1>

        <h1 class="text-4xl font-bold text-white inline-block">
            Ready to start working today? Or do you need some services? 🚀
        </h1>
    </div>
</div>

<style>
    /* Keyframes for the sliding animation */
    @keyframes slide {
        0% {
            transform: translateX(0%);
        }
        100% {
            transform: translateX(-50%);
        }
    }

    /* Apply the animation to the text */
    .animate-slide {
        display: inline-block;
        animation: slide 15s linear infinite;
    }
</style>
