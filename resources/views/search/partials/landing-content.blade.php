{{-- Mission Section --}}
<section class="bg-white py-20 md:py-28">
    <div class="max-w-4xl mx-auto px-6 md:px-10 text-center">
        <span class="text-sm font-semibold tracking-widest uppercase mb-4 block" style="color:#328072;">Our Mission</span>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Connecting People, Respecting Privacy</h2>
        <p class="text-lg text-gray-600 leading-relaxed mb-8">
            People Db was built on a simple belief: finding information about individuals should be straightforward,
            transparent, and respectful. We've created a comprehensive directory that bridges the gap between public
            information accessibility and personal data control—giving you the power to find who you're looking for
            while ensuring everyone has control over their digital footprint.
        </p>
        <div class="w-24 h-1 mx-auto rounded-full" style="background:#328072;"></div>
    </div>
</section>

{{-- Feature Cards Section --}}
<section class="py-20 md:py-24 relative"
         style="background-image: url('{{ asset('assets/images/people.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
    <div class="absolute inset-0" style="background: rgba(0,0,0,0.65); backdrop-filter: blur(2px);"></div>

    <div class="relative z-10 max-w-6xl mx-auto px-6 md:px-10">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Powerful Search Capabilities</h2>
            <p class="text-gray-300 text-lg max-w-2xl mx-auto">Multiple ways to find the information you need, designed for speed and precision.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            {{-- Feature 1 --}}
            <div class="bg-white/95 backdrop-blur-sm rounded-2xl p-8 text-center shadow-xl hover:shadow-2xl transition-shadow">
                <div class="w-16 h-16 rounded-full mx-auto mb-6 flex items-center justify-center" style="background:#f0f9f6;">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color:#328072;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Identity Search</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Search by full name to uncover comprehensive contact details, addresses, and verified information about individuals across our extensive database.
                </p>
            </div>

            {{-- Feature 2 --}}
            <div class="bg-white/95 backdrop-blur-sm rounded-2xl p-8 text-center shadow-xl hover:shadow-2xl transition-shadow">
                <div class="w-16 h-16 rounded-full mx-auto mb-6 flex items-center justify-center" style="background:#f0f9f6;">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color:#328072;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Reverse Lookup</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Have a phone number or email? Instantly identify the person behind it. Our reverse lookup connects dots others miss.
                </p>
            </div>

            {{-- Feature 3 --}}
            <div class="bg-white/95 backdrop-blur-sm rounded-2xl p-8 text-center shadow-xl hover:shadow-2xl transition-shadow">
                <div class="w-16 h-16 rounded-full mx-auto mb-6 flex items-center justify-center" style="background:#f0f9f6;">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color:#328072;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Location Intelligence</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Discover who resides at any address—current occupants and historical residents. Perfect for verifying connections or tracing lineage.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- Privacy & Control Section --}}
<section class="py-20 md:py-28 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6 md:px-10">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-sm font-semibold tracking-widest uppercase mb-4 block" style="color:#328072;">Your Data, Your Rights</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Complete Control Over Your Information</h2>
                <p class="text-gray-600 leading-relaxed mb-6">
                    We believe in transparency and user empowerment. Unlike other platforms, People Db gives you full control over your personal data.
                    Our streamlined "Clear My Information" process allows verified individuals to request permanent removal of their records with just a few steps.
                </p>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full flex items-center justify-center shrink-0 mt-0.5" style="background:#328072;">
                            <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span class="text-gray-700">Simple identity verification process</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full flex items-center justify-center shrink-0 mt-0.5" style="background:#328072;">
                            <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span class="text-gray-700">4-business-day processing guarantee</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full flex items-center justify-center shrink-0 mt-0.5" style="background:#328072;">
                            <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span class="text-gray-700">Permanent deletion with confirmation</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full flex items-center justify-center shrink-0 mt-0.5" style="background:#328072;">
                            <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span class="text-gray-700">24/7 support for data concerns</span>
                    </li>
                </ul>
            </div>
            <div class="relative">
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:#fef2f2;">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Privacy First</h3>
                            <p class="text-sm text-gray-500">Your security is our priority</p>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm leading-relaxed mb-6">
                        Every data deletion request undergoes rigorous verification to ensure only authorized individuals can remove information.
                        We employ bank-level encryption for all document uploads and maintain strict confidentiality throughout the process.
                    </p>
                    <div class="flex items-center gap-2 text-sm" style="color:#328072;">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        <span class="font-medium">SOC 2 Type II Compliant</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Stats Section --}}
<section class="py-16 md:py-20 relative"
         style="background-image: url('{{ asset('assets/images/people.jpg') }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0" style="background: rgba(50,128,114,0.85);"></div>

    <div class="relative z-10 max-w-6xl mx-auto px-6 md:px-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-12 text-center">
            <div>
                <div class="text-4xl md:text-5xl font-bold text-white mb-2">250M+</div>
                <div class="text-white/80 text-sm uppercase tracking-wider">Records Cataloged</div>
            </div>
            <div>
                <div class="text-4xl md:text-5xl font-bold text-white mb-2">98%</div>
                <div class="text-white/80 text-sm uppercase tracking-wider">Search Accuracy</div>
            </div>
            <div>
                <div class="text-4xl md:text-5xl font-bold text-white mb-2">50K+</div>
                <div class="text-white/80 text-sm uppercase tracking-wider">Daily Searches</div>
            </div>
            <div>
                <div class="text-4xl md:text-5xl font-bold text-white mb-2">&lt;2s</div>
                <div class="text-white/80 text-sm uppercase tracking-wider">Average Response</div>
            </div>
        </div>
    </div>
</section>

{{-- CTA Section --}}
<section class="py-20 md:py-28 relative"
         style="background-image: url('{{ asset('assets/images/people.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
    <div class="absolute inset-0" style="background: rgba(0,0,0,0.6); backdrop-filter: blur(3px);"></div>

    <div class="relative z-10 max-w-3xl mx-auto px-6 md:px-10 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to Find What You're Looking For?</h2>
        <p class="text-gray-300 text-lg mb-8 max-w-xl mx-auto">
            Join millions who trust People Db for fast, accurate, and respectful people search.
            Start your search now—completely free.
        </p>
        <button onclick="scrollToSearch()"
                class="inline-flex items-center gap-2 px-8 py-4 rounded-xl text-white font-semibold text-lg transition hover:opacity-90 shadow-lg"
                style="background:#328072;">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            SEARCH NOW FOR FREE
        </button>
        <p class="text-white/60 text-sm mt-4">No registration required • Instant results • 100% Free</p>
    </div>
</section>

{{-- Simple Footer --}}
<footer class="bg-gray-900 text-white py-12">
    <div class="max-w-6xl mx-auto px-6 md:px-10 text-center">
        <button onclick="scrollToSearch()"
                class="inline-flex items-center gap-2 text-gray-400 hover:text-white transition mb-8">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
            </svg>
            <span class="text-sm font-medium">Back to Search</span>
        </button>
        <div class="border-t border-gray-800 pt-8">
            <p class="text-sm text-gray-500">&copy; {{ date('Y') }} People Db. All rights reserved.</p>
        </div>
    </div>
</footer>
