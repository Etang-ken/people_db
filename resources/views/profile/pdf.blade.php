<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->name }} — PDF Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Hide any potential download UI that might appear */
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        .pdf-container {
            width: 100vw;
            height: 100vh;
            border: none;
        }
        /* Prevent text selection to discourage copying */
        .no-select {
            user-select: none;
            -webkit-user-select: none;
        }
    </style>
</head>
<body class="bg-gray-900">
    {{-- Minimal header with just back button and title --}}
    <div class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-4 py-3" style="background:#328072;">
        <div class="flex items-center gap-3">
            <a href="{{ route('profile.show', $profile) }}"
               class="text-white/80 hover:text-white flex items-center gap-1.5 text-sm font-medium transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Profile
            </a>
        </div>
        <h1 class="text-white font-semibold text-sm truncate max-w-xs md:max-w-md">{{ $profile->name }}</h1>
        <div class="w-24"></div>{{-- Spacer for centering --}}
    </div>

    {{-- PDF Viewer - #toolbar=0 hides Chrome/Edge PDF toolbar (download, print buttons) --}}
    <iframe
        src="{{ route('profile.pdf.raw', $profile) }}#toolbar=0&navpanes=0&scrollbar=1"
        class="pdf-container"
        title="{{ $profile->name }} PDF Document"
        style="margin-top: 48px; height: calc(100vh - 48px);">
    </iframe>

    {{-- Fallback message if iframe doesn't load --}}
    <noscript>
        <div class="fixed inset-0 flex items-center justify-center bg-gray-100">
            <p class="text-gray-600">JavaScript is required to view this PDF securely.</p>
        </div>
    </noscript>
</body>
</html>
