<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Pending — {{ $profile->name }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen">

    {{-- Top bar --}}
    <header style="background:#328072;">
        <div class="max-w-5xl mx-auto px-6 py-4 md:px-10 flex items-center gap-4">
            <a href="{{ route('profile.show', $profile) }}"
               class="text-white/70 hover:text-white flex items-center gap-1.5 text-sm font-medium transition shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Profile
            </a>
        </div>
    </header>

    {{-- Page header --}}
    <div style="background:#328072;" class="pb-12">
        <div class="max-w-5xl mx-auto px-6 md:px-10 pt-2 pb-8">
            <div class="flex items-center gap-5">
                <div class="w-16 h-16 rounded-full bg-white/20 flex items-center justify-center shrink-0">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-white">Request Already Pending</h1>
                    <p class="text-white/60 text-sm mt-0.5">A deletion request is already in progress</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Main content --}}
    <main class="max-w-5xl mx-auto px-6 md:px-10 -mt-6 pb-16">

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8 md:p-10">

                {{-- Info icon --}}
                <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>

                <div class="text-center max-w-lg mx-auto">
                    <h2 class="text-xl font-semibold text-gray-900 mb-3">
                        A deletion request is already pending for this profile.
                    </h2>

                    <p class="text-gray-600 mb-6">
                        You have already submitted a data deletion request for <strong style="color:#328072;">{{ $profile->name }}</strong>. Our team is currently reviewing your submission.
                    </p>

                    {{-- Status box --}}
                    <div class="bg-amber-50 border border-amber-200 rounded-xl p-5 mb-6">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></div>
                            <span class="font-medium text-amber-800">Pending Review</span>
                        </div>
                        <p class="text-amber-700 text-sm">
                            Processing time: <strong>4 business days</strong> from submission date.
                        </p>
                    </div>

                    {{-- What to expect --}}
                    <div class="text-left bg-gray-50 rounded-xl p-5 mb-6">
                        <h3 class="font-medium text-gray-800 mb-3">What happens next:</h3>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Our team reviews your submitted documents</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Verification of identity is completed</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Profile data is permanently deleted</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Confirmation email is sent to you</span>
                            </li>
                        </ul>
                    </div>

                    {{-- CTA --}}
                    <a href="{{ route('profile.show', $profile) }}"
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-white font-medium transition hover:opacity-90"
                       style="background:#328072;">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        Return to Profile
                    </a>
                </div>

            </div>

            {{-- Footer note --}}
            <div class="border-t border-gray-100 px-8 py-4 bg-gray-50">
                <p class="text-xs text-gray-500 text-center">
                    Need help? Contact <a href="mailto:support@peopledb.com" style="color:#328072;">support@peopledb.com</a> with your request details.
                </p>
            </div>
        </div>

    </main>

</body>
</html>
