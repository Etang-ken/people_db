<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Email — {{ $profile->name }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen">

    {{-- Top bar --}}
    <header style="background:#328072;">
        <div class="max-w-5xl mx-auto px-6 py-4 md:px-10 flex items-center gap-4">
            <a href="{{ route('profile.clear-info.form', $profile) }}"
               class="text-white/70 hover:text-white flex items-center gap-1.5 text-sm font-medium transition shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Documents
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
                              d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-white">Confirm Your Email</h1>
                    <p class="text-white/60 text-sm mt-0.5">Final step: Provide contact email for updates</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Main content --}}
    <main class="max-w-5xl mx-auto px-6 md:px-10 -mt-6 pb-16">

        {{-- Progress indicator --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-green-700">Documents Uploaded</span>
                </div>
                <div class="hidden md:block flex-1 mx-4 h-1 bg-green-200 rounded-full">
                    <div class="w-full h-full bg-green-500 rounded-full"></div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center" style="background:#328072;">
                        <span class="text-white text-sm font-medium">2</span>
                    </div>
                    <span class="text-sm font-medium text-gray-900">Email Confirmation</span>
                </div>
            </div>
        </div>

        {{-- Success message for documents --}}
        <div class="bg-green-50 border border-green-200 rounded-2xl p-6 mb-6">
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="text-green-700 text-sm font-medium">All documents have been successfully uploaded and verified.</p>
            </div>
        </div>

        {{-- Email confirmation form --}}
        <form action="{{ route('profile.clear-info.confirm.submit', ['profile' => $profile, 'requestId' => $deletionRequest->id]) }}" method="POST" class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            @csrf

            <div class="p-6">
                <div class="flex items-start gap-4 mb-6">
                    <div class="w-12 h-12 rounded-xl flex items-center justify-center text-white shrink-0" style="background:#328072;">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-800 mb-1">Contact Email Address</h3>
                        <p class="text-gray-500 text-sm">Enter the email address where you would like to receive updates about your deletion request.</p>
                    </div>
                </div>

                <div class="space-y-4">
                    <div>
                        <label for="contact_email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                </svg>
                            </div>
                            <input type="email" name="contact_email" id="contact_email" required
                                   placeholder="your.email@example.com"
                                   class="w-full pl-12 pr-4 py-3 border border-gray-200 rounded-xl text-gray-800 placeholder-gray-400
                                          focus:outline-none focus:ring-2 focus:ring-[#328072] focus:border-transparent text-base transition">
                        </div>
                        @error('contact_email')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- What to expect --}}
                    <div class="bg-gray-50 rounded-xl p-5 mt-6">
                        <h4 class="font-medium text-gray-800 mb-3 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            What happens next?
                        </h4>
                        <ul class="space-y-3 text-sm text-gray-600">
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>A confirmation email will be sent to the address you provide</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Our team will review your documents and process your request within <strong>4 business days</strong></span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>You will receive email updates at each stage of the process</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Submit section --}}
            <div class="border-t border-gray-100 p-6 bg-gray-50">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div class="text-sm text-gray-500">
                        <p class="font-medium text-gray-700">Step 2 of 2: Email Confirmation</p>
                        <p class="text-xs mt-1">By submitting, you agree to our data processing terms.</p>
                    </div>
                    <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-white font-medium transition hover:opacity-90 w-full sm:w-auto justify-center"
                            style="background:#328072;">
                        <span>Submit Request</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </button>
                </div>
            </div>
        </form>

        {{-- Security notice --}}
        <div class="mt-6 flex items-start gap-3 text-sm text-gray-500">
            <svg class="w-5 h-5 text-gray-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
            </svg>
            <p>Your information is securely transmitted using industry-standard encryption. We only use your email to communicate about this deletion request.</p>
        </div>

    </main>

</body>
</html>
