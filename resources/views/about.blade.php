<x-layout>
    <!-- Hero Section -->
    <div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32 m-4 rounded-lg">
        <img
            src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&crop=focalpoint&fp-y=.8&w=2830&h=1500&q=80&blend=111827&sat=-100&exp=15&blend-mode=multiply"
            alt="" class="absolute inset-0 -z-10 size-full object-cover object-right md:object-center">
        <div class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl"
             aria-hidden="true">
            <div class="aspect-1097/845 w-[68.5625rem] bg-linear-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                 style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div
            class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu"
            aria-hidden="true">
            <div class="aspect-1097/845 w-[68.5625rem] bg-linear-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                 style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-5xl font-semibold tracking-tight text-white sm:text-7xl">Why Choose Us?</h2>
                <p class="mt-8 text-lg font-medium text-pretty text-gray-300 sm:text-xl/8">
                    At <span class="font-bold text-blue-400">bikhedemtak</span>, we connect you with trusted
                    professionals to meet your needs. Whether you're looking for a service provider or offering your
                    skills, we make it easy, reliable, and efficient.
                </p>
            </div>

            <!-- Stats Section -->
            <div class="mx-auto mt-10 max-w-2xl lg:mx-0 lg:max-w-none">
                <dl class="mt-16 grid grid-cols-1 gap-8 sm:mt-20 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="flex flex-col-reverse gap-1">
                        <dt class="text-base/7 text-gray-300">Users</dt>
                        <dd class="text-4xl font-semibold tracking-tight text-white">{{ $userCount }}</dd>
                    </div>
                    <div class="flex flex-col-reverse gap-1">
                        <dt class="text-base/7 text-gray-300">Providers</dt>
                        <dd class="text-4xl font-semibold tracking-tight text-white">{{ $providerCount }}</dd>
                    </div>
                    <div class="flex flex-col-reverse gap-1">
                        <dt class="text-base/7 text-gray-300">Requests</dt>
                        <dd class="text-4xl font-semibold tracking-tight text-white">{{ $serviceRequestCount }}</dd>
                    </div>
                    <div class="flex flex-col-reverse gap-1">
                        <dt class="text-base/7 text-gray-300">Happy Clients</dt>
                        <dd class="text-4xl font-semibold tracking-tight text-white">{{ $goodRatingCount }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <!-- Value Proposition Section -->
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">What We Offer</h2>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    Our platform is designed to make your life easier. Here's how we stand out:
                </p>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
                    <!-- Quality of Service -->
                    <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 text-gray-900">
                            <div
                                class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-blue-600">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            Quality of Service
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-gray-600">
                            We ensure every service provider on our platform meets high standards. Our rigorous vetting
                            process guarantees quality and reliability.
                        </dd>
                    </div>

                    <!-- Customer Satisfaction -->
                    <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 text-gray-900">
                            <div
                                class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-blue-600">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                                </svg>
                            </div>
                            Customer Satisfaction
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-gray-600">
                            We prioritize your satisfaction. With a 95% satisfaction rate, our platform is trusted by
                            thousands of happy clients.
                        </dd>
                    </div>

                    <!-- Easy to Use -->
                    <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 text-gray-900">
                            <div
                                class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-blue-600">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                                </svg>
                            </div>
                            Easy to Use
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-gray-600">
                            Our platform is designed with simplicity in mind. Post a request or offer your services in
                            just a few clicks.
                        </dd>
                    </div>

                    <!-- Secure and Reliable -->
                    <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 text-gray-900">
                            <div
                                class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-blue-600">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            Secure and Reliable
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-gray-600">
                            Your safety is our priority. We use advanced security measures to protect your data and
                            transactions.
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="bg-gray-50 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">What Our Clients Say</h2>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    Hear from our satisfied clients who have used our platform to find the perfect professionals.
                </p>
            </div>
            <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-8 lg:max-w-none lg:grid-cols-3">
                <!-- Testimonial 1 -->
                <div class="flex flex-col bg-white p-8 rounded-lg shadow-lg">
                    <p class="text-lg text-gray-600">
                        "bikhedemtak made it so easy to find a reliable plumber. I highly recommend this platform!"
                    </p>
                    <div class="mt-6 flex items-center">
                        <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/44.jpg"
                             alt="Testimonial 1">
                        <div class="ml-4">
                            <h3 class="text-sm font-semibold text-gray-900">Sarah Johnson</h3>
                            <p class="text-sm text-gray-500">Homeowner</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="flex flex-col bg-white p-8 rounded-lg shadow-lg">
                    <p class="text-lg text-gray-600">
                        "As a service provider, I've gained so many clients through bikhedemtak. It's a game-changer!"
                    </p>
                    <div class="mt-6 flex items-center">
                        <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/32.jpg"
                             alt="Testimonial 2">
                        <div class="ml-4">
                            <h3 class="text-sm font-semibold text-gray-900">Michael Smith</h3>
                            <p class="text-sm text-gray-500">Plumber</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="flex flex-col bg-white p-8 rounded-lg shadow-lg">
                    <p class="text-lg text-gray-600">
                        "The platform is user-friendly, and the support team is amazing. Highly recommend!"
                    </p>
                    <div class="mt-6 flex items-center">
                        <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/67.jpg"
                             alt="Testimonial 3">
                        <div class="ml-4">
                            <h3 class="text-sm font-semibold text-gray-900">Emily Davis</h3>
                            <p class="text-sm text-gray-500">Freelancer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call-to-Action Section -->
    <div class="bg-blue-600 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Ready to Get Started?</h2>
                <p class="mt-6 text-lg leading-8 text-blue-100">
                    Join thousands of satisfied users and providers today. Sign up now and experience the difference!
                </p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="/register"
                       class="rounded-md bg-white px-6 py-3 text-sm font-semibold text-blue-600 shadow-sm hover:bg-blue-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                        Sign Up Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
