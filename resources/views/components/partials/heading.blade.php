<div class="relative overflow-hidden bg-gradient-to-r from-blue-600 to-blue-800 py-12 rounded-lg shadow-lg">
    <!-- Main Heading -->
    <h1 class="text-6xl font-bold text-white text-center mb-8">
        Hello {{ $slot }}
    </h1>

    <!-- Animated Text -->
    <div class="whitespace-nowrap overflow-hidden">
        <div class="animate-slide">
            <h1 class="text-4xl font-bold text-white inline-block">
                Ready to start working today? Or do you need some services? 🚀
            </h1>
            <h1 class="text-4xl font-bold text-white inline-block ml-8">
                Ready to start working today? Or do you need some services? 🚀
            </h1>
        </div>
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
        white-space: nowrap;
        animation: slide 10s linear infinite;
    }

    /* Add a smooth gradient overlay for a polished look */
    .relative::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to right, rgba(0, 0, 0, 0.2), transparent 20%, transparent 80%, rgba(0, 0, 0, 0.2));
        pointer-events: none;
    }
</style>
