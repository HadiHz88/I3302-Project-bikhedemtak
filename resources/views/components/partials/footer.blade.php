<footer class="bg-gradient-to-r from-blue-600 to-blue-800 shadow-lg mt-16">
    <div class="w-full max-w-screen-xl mx-auto p-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Logo and Branding -->
            <div class="flex flex-col items-center md:items-start">
                <a href="#" class="flex items-center space-x-3">
                    <img src="{{ asset('images/logo.png') }}" class="h-10" alt="bikhedemtak Logo" />
                    <span class="text-2xl font-bold text-white">bikhedemtak</span>
                </a>
                <p class="mt-4 text-sm text-blue-100 text-center md:text-left">
                    Connecting you with the best professionals for your needs.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="flex flex-col items-center md:items-start">
                <h3 class="text-lg font-semibold text-white mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="/about" class="text-blue-100 hover:text-white hover:underline transition-colors duration-200">About Us</a>
                    </li>
                    <li>
                        <a href="/services" class="text-blue-100 hover:text-white hover:underline transition-colors duration-200">Services</a>
                    </li>
                    <li>
                        <a href="/contact" class="text-blue-100 hover:text-white hover:underline transition-colors duration-200">Contact</a>
                    </li>
                </ul>
            </div>

            <!-- Social Media Links -->
            <div class="flex flex-col items-center md:items-start">
                <h3 class="text-lg font-semibold text-white mb-4">Follow Us</h3>
                <div class="flex space-x-4">
                    <a href="#" class="text-blue-100 hover:text-white transition-colors duration-200">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                        </svg>
                    </a>
                    <a href="#" class="text-blue-100 hover:text-white transition-colors duration-200">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                    <a href="#" class="text-blue-100 hover:text-white transition-colors duration-200">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <hr class="my-8 border-blue-500" />

        <!-- Copyright -->
        <div class="text-center text-sm text-blue-100">
            © 2025 <a href="#" class="hover:text-white hover:underline transition-colors duration-200">Hadi Hijazi, Hanine Khalil, Jana Kassab</a>. All Rights Reserved.
        </div>
    </div>
</footer>

@stack('scripts')
</body>
</html>
