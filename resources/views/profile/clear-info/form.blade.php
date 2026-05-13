<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clear My Information — {{ $profile->name }}</title>
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
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-white">Clear My Information</h1>
                    <p class="text-white/60 text-sm mt-0.5">Submit documents to verify your identity</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Main content --}}
    <main class="max-w-5xl mx-auto px-6 md:px-10 -mt-6 pb-16">

        {{-- Instructions card --}}
        <div class="bg-amber-50 border border-amber-200 rounded-2xl p-6 mb-6">
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="font-semibold text-amber-900 mb-1">Important Instructions</h2>
                    <p class="text-amber-800 text-sm leading-relaxed">
                        To protect your privacy and prevent unauthorized deletions, we require you to submit the following documents for identity verification.
                        All documents must be clear, legible, and show all four corners. We accept JPG and PNG formats (max 10MB per file).
                    </p>
                </div>
            </div>
        </div>

        @if(session('error'))
            <div class="bg-red-50 border border-red-200 rounded-2xl p-6 mb-6">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-red-700 text-sm font-medium">{{ session('error') }}</p>
                </div>
            </div>
        @endif

        {{-- Upload form --}}
        <form action="{{ route('profile.clear-info.documents', $profile) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- Document 1: ID Front --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center text-white shrink-0" style="background:#328072;">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3 3 0 00-3 3m12-6h.01"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-800 mb-1">Front of ID</h3>
                            <p class="text-gray-500 text-sm mb-4">Upload a clear photo of the front of your government-issued ID (Driver's License, Passport, or National ID).</p>

                            <div class="space-y-3">
                                {{-- ID Card Guide Preview --}}
                                <div class="bg-gray-100 rounded-lg p-4 mb-3">
                                    <div class="flex items-center gap-3 mb-2">
                                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                        </div>
                                        <div class="text-sm">
                                            <p class="font-medium text-gray-800">Position your ID card</p>
                                            <p class="text-gray-500 text-xs">Fit your ID within the rectangle when taking photo</p>
                                        </div>
                                    </div>
                                    {{-- ID Card Rectangle Guide --}}
                                    <div class="relative mx-auto" style="max-width: 320px;">
                                        <div class="border-2 border-dashed border-blue-400 rounded-lg p-4 bg-white/50">
                                            <div class="aspect-[1.586/1] bg-gradient-to-br from-blue-50 to-white rounded border-2 border-blue-300 relative flex items-center justify-center">
                                                {{-- Corner markers --}}
                                                <div class="absolute top-0 left-0 w-4 h-4 border-t-2 border-l-2 border-blue-500 -mt-1 -ml-1"></div>
                                                <div class="absolute top-0 right-0 w-4 h-4 border-t-2 border-r-2 border-blue-500 -mt-1 -mr-1"></div>
                                                <div class="absolute bottom-0 left-0 w-4 h-4 border-b-2 border-l-2 border-blue-500 -mb-1 -ml-1"></div>
                                                <div class="absolute bottom-0 right-0 w-4 h-4 border-b-2 border-r-2 border-blue-500 -mb-1 -mr-1"></div>
                                                <div class="text-center">
                                                    <svg class="w-8 h-8 text-blue-300 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0"/>
                                                    </svg>
                                                    <p class="text-xs text-blue-400">ID Card Area</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-col sm:flex-row gap-3">
                                    <button type="button" onclick="openCamera('id_front', 'id')"
                                            class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg bg-blue-50 text-blue-700 font-medium text-sm hover:bg-blue-100 transition border border-blue-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        Take Photo
                                    </button>
                                    <label class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg bg-gray-50 text-gray-700 font-medium text-sm hover:bg-gray-100 transition border border-gray-200 cursor-pointer">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                        </svg>
                                        Upload File
                                        <input type="file" name="id_front" id="id_front" accept="image/jpeg,image/png,image/jpg" required
                                               class="hidden" onchange="handleFileSelect(this, 'id_front')">
                                    </label>
                                </div>

                                {{-- Preview --}}
                                <div id="id_front_preview" class="hidden mt-3">
                                    <div class="relative rounded-lg overflow-hidden border border-gray-200" style="max-width: 200px;">
                                        <img id="id_front_preview_img" class="w-full h-auto object-cover" alt="ID Front Preview">
                                        <button type="button" onclick="clearPreview('id_front')" class="absolute top-1 right-1 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs hover:bg-red-600">
                                            ×
                                        </button>
                                    </div>
                                    <p class="text-xs text-green-600 mt-1 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        Image captured successfully
                                    </p>
                                </div>
                            </div>
                            @error('id_front')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Document 2: ID Back --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center text-white shrink-0" style="background:#328072;">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-800 mb-1">Back of ID</h3>
                            <p class="text-gray-500 text-sm mb-4">Upload a clear photo of the back of your ID showing any barcodes or additional information.</p>

                            <div class="space-y-3">
                                {{-- ID Card Guide Preview --}}
                                <div class="bg-gray-100 rounded-lg p-4 mb-3">
                                    <div class="flex items-center gap-3 mb-2">
                                        <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center">
                                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                        </div>
                                        <div class="text-sm">
                                            <p class="font-medium text-gray-800">Position your ID card</p>
                                            <p class="text-gray-500 text-xs">Fit your ID within the rectangle when taking photo</p>
                                        </div>
                                    </div>
                                    {{-- ID Card Rectangle Guide --}}
                                    <div class="relative mx-auto" style="max-width: 320px;">
                                        <div class="border-2 border-dashed border-purple-400 rounded-lg p-4 bg-white/50">
                                            <div class="aspect-[1.586/1] bg-gradient-to-br from-purple-50 to-white rounded border-2 border-purple-300 relative flex items-center justify-center">
                                                {{-- Corner markers --}}
                                                <div class="absolute top-0 left-0 w-4 h-4 border-t-2 border-l-2 border-purple-500 -mt-1 -ml-1"></div>
                                                <div class="absolute top-0 right-0 w-4 h-4 border-t-2 border-r-2 border-purple-500 -mt-1 -mr-1"></div>
                                                <div class="absolute bottom-0 left-0 w-4 h-4 border-b-2 border-l-2 border-purple-500 -mb-1 -ml-1"></div>
                                                <div class="absolute bottom-0 right-0 w-4 h-4 border-b-2 border-r-2 border-purple-500 -mb-1 -mr-1"></div>
                                                <div class="text-center">
                                                    <svg class="w-8 h-8 text-purple-300 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                    </svg>
                                                    <p class="text-xs text-purple-400">ID Card Area</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-col sm:flex-row gap-3">
                                    <button type="button" onclick="openCamera('id_back', 'id')"
                                            class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg bg-purple-50 text-purple-700 font-medium text-sm hover:bg-purple-100 transition border border-purple-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        Take Photo
                                    </button>
                                    <label class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg bg-gray-50 text-gray-700 font-medium text-sm hover:bg-gray-100 transition border border-gray-200 cursor-pointer">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                        </svg>
                                        Upload File
                                        <input type="file" name="id_back" id="id_back" accept="image/jpeg,image/png,image/jpg" required
                                               class="hidden" onchange="handleFileSelect(this, 'id_back')">
                                    </label>
                                </div>

                                {{-- Preview --}}
                                <div id="id_back_preview" class="hidden mt-3">
                                    <div class="relative rounded-lg overflow-hidden border border-gray-200" style="max-width: 200px;">
                                        <img id="id_back_preview_img" class="w-full h-auto object-cover" alt="ID Back Preview">
                                        <button type="button" onclick="clearPreview('id_back')" class="absolute top-1 right-1 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs hover:bg-red-600">
                                            ×
                                        </button>
                                    </div>
                                    <p class="text-xs text-green-600 mt-1 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        Image captured successfully
                                    </p>
                                </div>
                            </div>
                            @error('id_back')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Document 3: Selfie with ID --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center text-white shrink-0" style="background:#328072;">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-800 mb-1">Selfie Holding ID</h3>
                            <p class="text-gray-500 text-sm mb-4">Take a selfie holding your ID next to your face. Your face and the ID must both be clearly visible (similar to KYC verification).</p>

                            <div class="space-y-3">
                                {{-- Face Guide Preview --}}
                                <div class="bg-blue-50 rounded-lg p-4">
                                    <div class="flex items-center gap-3 mb-2">
                                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                        </div>
                                        <div class="text-sm">
                                            <p class="font-medium text-gray-800">Position your face and ID</p>
                                            <p class="text-gray-500 text-xs">Hold ID next to your face, both clearly visible</p>
                                        </div>
                                    </div>
                                    {{-- Face positioning guide --}}
                                    <div class="relative mx-auto" style="max-width: 280px;">
                                        <div class="aspect-square bg-gradient-to-b from-blue-100 to-white rounded-full border-2 border-dashed border-blue-400 relative flex items-center justify-center">
                                            {{-- Face outline --}}
                                            <div class="absolute w-20 h-24 border-2 border-blue-300 rounded-full"></div>
                                            {{-- ID card position indicator --}}
                                            <div class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-16 border-2 border-blue-300 rounded bg-blue-50/50 flex items-center justify-center">
                                                <span class="text-[8px] text-blue-400">ID</span>
                                            </div>
                                            <div class="text-center z-10">
                                                <svg class="w-8 h-8 text-blue-300 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                </svg>
                                                <p class="text-[10px] text-blue-400">Face + ID</p>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-blue-700 text-xs mt-2 text-center">Ensure both your face and the ID are in focus and well-lit</p>
                                </div>

                                <div class="flex flex-col sm:flex-row gap-3">
                                    <button type="button" onclick="openCamera('selfie', 'selfie')"
                                            class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg bg-blue-50 text-blue-700 font-medium text-sm hover:bg-blue-100 transition border border-blue-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        Take Selfie
                                    </button>
                                    <label class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg bg-gray-50 text-gray-700 font-medium text-sm hover:bg-gray-100 transition border border-gray-200 cursor-pointer">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                        </svg>
                                        Upload File
                                        <input type="file" name="selfie" id="selfie" accept="image/jpeg,image/png,image/jpg" required
                                               class="hidden" onchange="handleFileSelect(this, 'selfie')">
                                    </label>
                                </div>

                                {{-- Preview --}}
                                <div id="selfie_preview" class="hidden mt-3">
                                    <div class="relative rounded-lg overflow-hidden border border-gray-200" style="max-width: 200px;">
                                        <img id="selfie_preview_img" class="w-full h-auto object-cover" alt="Selfie Preview">
                                        <button type="button" onclick="clearPreview('selfie')" class="absolute top-1 right-1 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs hover:bg-red-600">
                                            ×
                                        </button>
                                    </div>
                                    <p class="text-xs text-green-600 mt-1 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        Selfie captured successfully
                                    </p>
                                </div>
                            </div>
                            @error('selfie')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Document 4: SSN Card --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center text-white shrink-0" style="background:#328072;">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-800 mb-1">SSN Card or Tax ID</h3>
                            <p class="text-gray-500 text-sm mb-4">Upload a clear photo of your Social Security card or Tax Identification Document.</p>

                            <div class="space-y-3">
                                {{-- SSN Card Guide Preview --}}
                                <div class="bg-amber-50 rounded-lg p-4">
                                    <div class="flex items-center gap-3 mb-2">
                                        <div class="w-8 h-8 rounded-full bg-amber-100 flex items-center justify-center">
                                            <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/>
                                            </svg>
                                        </div>
                                        <div class="text-sm">
                                            <p class="font-medium text-gray-800">Position your SSN card</p>
                                            <p class="text-gray-500 text-xs">Fit card within the rectangle when taking photo</p>
                                        </div>
                                    </div>
                                    {{-- SSN Card Rectangle Guide --}}
                                    <div class="relative mx-auto" style="max-width: 280px;">
                                        <div class="border-2 border-dashed border-amber-400 rounded-lg p-4 bg-white/50">
                                            <div class="aspect-[1.6/1] bg-gradient-to-br from-amber-50 to-white rounded border-2 border-amber-300 relative flex items-center justify-center">
                                                {{-- Corner markers --}}
                                                <div class="absolute top-0 left-0 w-4 h-4 border-t-2 border-l-2 border-amber-500 -mt-1 -ml-1"></div>
                                                <div class="absolute top-0 right-0 w-4 h-4 border-t-2 border-r-2 border-amber-500 -mt-1 -mr-1"></div>
                                                <div class="absolute bottom-0 left-0 w-4 h-4 border-b-2 border-l-2 border-amber-500 -mb-1 -ml-1"></div>
                                                <div class="absolute bottom-0 right-0 w-4 h-4 border-b-2 border-r-2 border-amber-500 -mb-1 -mr-1"></div>
                                                <div class="text-center">
                                                    <svg class="w-8 h-8 text-amber-300 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/>
                                                    </svg>
                                                    <p class="text-xs text-amber-400">SSN Card Area</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-amber-700 text-xs mt-2 text-center">Your documents are securely encrypted and will only be used for identity verification</p>
                                </div>

                                <div class="flex flex-col sm:flex-row gap-3">
                                    <button type="button" onclick="openCamera('ssn_card', 'card')"
                                            class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg bg-amber-50 text-amber-700 font-medium text-sm hover:bg-amber-100 transition border border-amber-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        Take Photo
                                    </button>
                                    <label class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg bg-gray-50 text-gray-700 font-medium text-sm hover:bg-gray-100 transition border border-gray-200 cursor-pointer">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                        </svg>
                                        Upload File
                                        <input type="file" name="ssn_card" id="ssn_card" accept="image/jpeg,image/png,image/jpg" required
                                               class="hidden" onchange="handleFileSelect(this, 'ssn_card')">
                                    </label>
                                </div>

                                {{-- Preview --}}
                                <div id="ssn_card_preview" class="hidden mt-3">
                                    <div class="relative rounded-lg overflow-hidden border border-gray-200" style="max-width: 200px;">
                                        <img id="ssn_card_preview_img" class="w-full h-auto object-cover" alt="SSN Card Preview">
                                        <button type="button" onclick="clearPreview('ssn_card')" class="absolute top-1 right-1 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs hover:bg-red-600">
                                            ×
                                        </button>
                                    </div>
                                    <p class="text-xs text-green-600 mt-1 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        SSN Card captured successfully
                                    </p>
                                </div>
                            </div>
                            @error('ssn_card')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Submit button --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-500">
                        <p>Step 1 of 2: Document Upload</p>
                    </div>
                    <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-white font-medium transition hover:opacity-90"
                            style="background:#328072;">
                        <span>Continue to Confirmation</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                </div>
            </div>

        </form>

        {{-- Trust indicators --}}
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="flex items-center gap-3 text-sm text-gray-500">
                <svg class="w-5 h-5 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                <span>SSL Encrypted</span>
            </div>
            <div class="flex items-center gap-3 text-sm text-gray-500">
                <svg class="w-5 h-5 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
                <span>Secure Document Storage</span>
            </div>
            <div class="flex items-center gap-3 text-sm text-gray-500">
                <svg class="w-5 h-5 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                </svg>
                <span>Verified Process</span>
            </div>
        </div>

    </main>

    {{-- Camera Modal --}}
    <div id="cameraModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" onclick="closeCamera()"></div>
        <div class="absolute inset-4 md:inset-10 bg-white rounded-2xl overflow-hidden flex flex-col">
            {{-- Header --}}
            <div class="flex items-center justify-between px-6 py-4 border-b">
                <div>
                    <h3 id="cameraTitle" class="font-semibold text-gray-800">Take Photo</h3>
                    <p id="cameraSubtitle" class="text-sm text-gray-500">Position your document in the frame</p>
                </div>
                <button type="button" onclick="closeCamera()" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center hover:bg-gray-200">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Camera View --}}
            <div class="flex-1 relative bg-black flex items-center justify-center overflow-hidden">
                <video id="cameraVideo" autoplay playsinline class="w-full h-full object-cover"></video>
                <canvas id="cameraCanvas" class="hidden"></canvas>

                {{-- Overlay Guide --}}
                <div id="idOverlay" class="absolute inset-0 pointer-events-none flex items-center justify-center">
                    <div class="relative">
                        {{-- ID Card Rectangle --}}
                        <div class="w-72 md:w-96 aspect-[1.586/1] border-2 border-white/80 rounded-lg relative">
                            {{-- Corner markers --}}
                            <div class="absolute -top-1 -left-1 w-6 h-6 border-t-4 border-l-4 border-green-400"></div>
                            <div class="absolute -top-1 -right-1 w-6 h-6 border-t-4 border-r-4 border-green-400"></div>
                            <div class="absolute -bottom-1 -left-1 w-6 h-6 border-b-4 border-l-4 border-green-400"></div>
                            <div class="absolute -bottom-1 -right-1 w-6 h-6 border-b-4 border-r-4 border-green-400"></div>

                            {{-- Instruction text --}}
                            <div class="absolute -top-8 left-0 right-0 text-center">
                                <p class="text-white text-sm font-medium bg-black/50 px-3 py-1 rounded-full inline-block">
                                    Fit ID card inside the rectangle
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Selfie Overlay --}}
                <div id="selfieOverlay" class="absolute inset-0 pointer-events-none hidden flex items-center justify-center">
                    <div class="relative">
                        {{-- Face circle guide --}}
                        <div class="w-64 h-64 md:w-80 md:h-80 border-2 border-white/80 rounded-full relative">
                            {{-- Crosshair --}}
                            <div class="absolute top-1/2 left-0 right-0 h-px bg-white/30"></div>
                            <div class="absolute left-1/2 top-0 bottom-0 w-px bg-white/30"></div>

                            {{-- ID position indicator --}}
                            <div class="absolute -right-4 top-1/2 -translate-y-1/2 w-16 h-20 border-2 border-white/60 rounded bg-white/10 flex items-center justify-center">
                                <span class="text-white/80 text-xs">ID</span>
                            </div>
                        </div>
                        <div class="absolute -top-8 left-0 right-0 text-center">
                            <p class="text-white text-sm font-medium bg-black/50 px-3 py-1 rounded-full inline-block">
                                Face in circle, ID on the side
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Card Overlay --}}
                <div id="cardOverlay" class="absolute inset-0 pointer-events-none hidden flex items-center justify-center">
                    <div class="relative">
                        <div class="w-72 md:w-80 aspect-[1.6/1] border-2 border-white/80 rounded-lg relative">
                            <div class="absolute -top-1 -left-1 w-6 h-6 border-t-4 border-l-4 border-amber-400"></div>
                            <div class="absolute -top-1 -right-1 w-6 h-6 border-t-4 border-r-4 border-amber-400"></div>
                            <div class="absolute -bottom-1 -left-1 w-6 h-6 border-b-4 border-l-4 border-amber-400"></div>
                            <div class="absolute -bottom-1 -right-1 w-6 h-6 border-b-4 border-r-4 border-amber-400"></div>
                        </div>
                        <div class="absolute -top-8 left-0 right-0 text-center">
                            <p class="text-white text-sm font-medium bg-black/50 px-3 py-1 rounded-full inline-block">
                                Fit card inside the rectangle
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Controls --}}
            <div class="px-6 py-4 border-t bg-gray-50">
                <div class="flex items-center justify-center gap-4">
                    <button type="button" onclick="closeCamera()" class="px-6 py-2.5 rounded-lg border border-gray-300 text-gray-700 font-medium hover:bg-gray-100">
                        Cancel
                    </button>
                    <button type="button" onclick="capturePhoto()" class="w-16 h-16 rounded-full border-4 border-white shadow-lg flex items-center justify-center" style="background:#328072;">
                        <div class="w-12 h-12 rounded-full border-2 border-white"></div>
                    </button>
                    <div class="w-24"></div>{{-- Spacer for balance --}}
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentStream = null;
        let currentField = null;
        let currentType = null;

        function openCamera(field, type) {
            currentField = field;
            currentType = type;

            const modal = document.getElementById('cameraModal');
            const video = document.getElementById('cameraVideo');
            const title = document.getElementById('cameraTitle');
            const subtitle = document.getElementById('cameraSubtitle');

            // Set titles based on type
            const titles = {
                'id_front': 'Front of ID',
                'id_back': 'Back of ID',
                'selfie': 'Selfie with ID',
                'ssn_card': 'SSN Card'
            };
            title.textContent = titles[field] || 'Take Photo';
            subtitle.textContent = type === 'selfie'
                ? 'Position your face in the circle, hold ID to the side'
                : 'Fit your document inside the green rectangle';

            // Show appropriate overlay
            document.getElementById('idOverlay').classList.toggle('hidden', type !== 'id');
            document.getElementById('selfieOverlay').classList.toggle('hidden', type !== 'selfie');
            document.getElementById('cardOverlay').classList.toggle('hidden', type !== 'card');

            modal.classList.remove('hidden');

            // Start camera
            navigator.mediaDevices.getUserMedia({
                video: {
                    facingMode: type === 'selfie' ? 'user' : 'environment',
                    width: { ideal: 1920 },
                    height: { ideal: 1080 }
                }
            }).then(stream => {
                currentStream = stream;
                video.srcObject = stream;
            }).catch(err => {
                console.error('Camera error:', err);
                alert('Unable to access camera. Please use file upload instead.');
                closeCamera();
            });
        }

        function closeCamera() {
            const modal = document.getElementById('cameraModal');
            const video = document.getElementById('cameraVideo');

            if (currentStream) {
                currentStream.getTracks().forEach(track => track.stop());
                currentStream = null;
            }

            video.srcObject = null;
            modal.classList.add('hidden');
        }

        function capturePhoto() {
            const video = document.getElementById('cameraVideo');
            const canvas = document.getElementById('cameraCanvas');

            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;

            const ctx = canvas.getContext('2d');
            ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

            // Convert to blob
            canvas.toBlob(blob => {
                const file = new File([blob], `${currentField}_${Date.now()}.jpg`, { type: 'image/jpeg' });

                // Create DataTransfer to simulate file input
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);

                // Store in hidden input
                const input = document.getElementById(currentField);
                input.files = dataTransfer.files;

                // Show preview
                const previewDiv = document.getElementById(`${currentField}_preview`);
                const previewImg = document.getElementById(`${currentField}_preview_img`);
                previewImg.src = URL.createObjectURL(blob);
                previewDiv.classList.remove('hidden');

                closeCamera();
            }, 'image/jpeg', 0.9);
        }

        function handleFileSelect(input, field) {
            if (input.files && input.files[0]) {
                const file = input.files[0];

                // Copy to hidden input
                const hiddenInput = document.getElementById(field);
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                hiddenInput.files = dataTransfer.files;

                // Show preview
                const previewDiv = document.getElementById(`${field}_preview`);
                const previewImg = document.getElementById(`${field}_preview_img`);
                previewImg.src = URL.createObjectURL(file);
                previewDiv.classList.remove('hidden');
            }
        }

        function clearPreview(field) {
            const input = document.getElementById(field);
            const previewDiv = document.getElementById(`${field}_preview`);
            const previewImg = document.getElementById(`${field}_preview_img`);

            // Create new file input to clear it properly
            const newInput = document.createElement('input');
            newInput.type = 'file';
            newInput.name = field;
            newInput.id = field;
            newInput.accept = 'image/jpeg,image/png,image/jpg';
            newInput.required = true;
            newInput.className = 'hidden';
            newInput.onchange = function() { handleFileSelect(this, field); };

            input.parentNode.replaceChild(newInput, input);

            previewImg.src = '';
            previewDiv.classList.add('hidden');
        }

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const fields = ['id_front', 'id_back', 'selfie', 'ssn_card'];
            let valid = true;

            fields.forEach(field => {
                const input = document.getElementById(field);
                if (!input.files || input.files.length === 0) {
                    valid = false;
                }
            });

            if (!valid) {
                e.preventDefault();
                alert('Please capture or upload all required documents.');
            }
        });
    </script>

</body>
</html>
