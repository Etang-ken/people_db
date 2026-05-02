<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->name }} — People Db</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen">

    {{-- Top bar --}}
    <header style="background:#328072;">
        <div class="max-w-5xl mx-auto px-6 py-4 md:px-10 flex items-center gap-4">
            <a href="{{ route('search.index') }}"
               class="text-white/70 hover:text-white flex items-center gap-1.5 text-sm font-medium transition shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Search
            </a>
        </div>
    </header>

    {{-- Profile hero --}}
    <div style="background:#328072;" class="pb-16">
        <div class="max-w-5xl mx-auto px-6 md:px-10 pt-2 pb-8">
            <div class="flex items-center gap-5">
                <div class="w-16 h-16 rounded-full bg-white/20 flex items-center justify-center shrink-0">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-white">{{ $profile->name }}</h1>
                    <p class="text-white/60 text-sm mt-0.5">Profile #{{ $profile->id }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Cards --}}
    <main class="max-w-5xl mx-auto px-6 md:px-10 -mt-8 pb-16 space-y-5">

        {{-- Email + Phone row --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

            {{-- Emails --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="flex items-center gap-3 px-6 py-4 border-b border-gray-50">
                    <span class="w-8 h-8 rounded-lg flex items-center justify-center text-white shrink-0" style="background:#328072;">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </span>
                    <h2 class="font-semibold text-gray-800">Email Addresses</h2>
                    @if(!empty($profile->payload['emails']))
                        <span class="ml-auto text-xs font-semibold px-2 py-0.5 rounded-full text-white" style="background:#328072;">
                            {{ count($profile->payload['emails']) }}
                        </span>
                    @endif
                </div>
                <div class="p-6">
                    @if(!empty($profile->payload['emails']))
                        <div class="divide-y divide-gray-50">
                            @foreach($profile->payload['emails'] as $email)
                                <div class="py-3 first:pt-0 last:pb-0">
                                    <p class="text-gray-800 font-medium text-sm">{{ $email['email'] ?? '—' }}</p>
                                    <p class="text-xs text-gray-400 mt-0.5">
                                        @if(!empty($email['start_date'])) From {{ $email['start_date'] }} @endif
                                        @if(!empty($email['end_date'])) &ndash; {{ $email['end_date'] }} @endif
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-sm text-gray-400 italic">No email addresses on record</p>
                    @endif
                </div>
            </div>

            {{-- Phone Numbers --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="flex items-center gap-3 px-6 py-4 border-b border-gray-50">
                    <span class="w-8 h-8 rounded-lg flex items-center justify-center text-white shrink-0" style="background:#328072;">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </span>
                    <h2 class="font-semibold text-gray-800">Phone Numbers</h2>
                    @if(!empty($profile->payload['phone_numbers']))
                        <span class="ml-auto text-xs font-semibold px-2 py-0.5 rounded-full text-white" style="background:#328072;">
                            {{ count($profile->payload['phone_numbers']) }}
                        </span>
                    @endif
                </div>
                <div class="p-6">
                    @if(!empty($profile->payload['phone_numbers']))
                        <div class="divide-y divide-gray-50">
                            @foreach($profile->payload['phone_numbers'] as $phone)
                                <div class="py-3 first:pt-0 last:pb-0">
                                    <p class="text-gray-800 font-medium text-sm">
                                        {{ $phone['number'] ?? '—' }}
                                        @if(!empty($phone['extension']))
                                            <span class="text-xs text-gray-400 font-normal ml-1">ext. {{ $phone['extension'] }}</span>
                                        @endif
                                    </p>
                                    <p class="text-xs text-gray-400 mt-0.5">
                                        @if(!empty($phone['start_date'])) From {{ $phone['start_date'] }} @endif
                                        @if(!empty($phone['end_date'])) &ndash; {{ $phone['end_date'] }} @endif
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-sm text-gray-400 italic">No phone numbers on record</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- Addresses --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="flex items-center gap-3 px-6 py-4 border-b border-gray-50">
                <span class="w-8 h-8 rounded-lg flex items-center justify-center text-white shrink-0" style="background:#328072;">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </span>
                <h2 class="font-semibold text-gray-800">Addresses</h2>
                @if(!empty($profile->payload['addresses']))
                    <span class="ml-auto text-xs font-semibold px-2 py-0.5 rounded-full text-white" style="background:#328072;">
                        {{ count($profile->payload['addresses']) }}
                    </span>
                @endif
            </div>
            <div class="p-6">
                @if(!empty($profile->payload['addresses']))
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach($profile->payload['addresses'] as $address)
                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                <p class="text-gray-800 font-medium text-sm">{{ $address['address'] ?? '—' }}</p>
                                @if(!empty($address['location']))
                                    <p class="text-xs mt-1" style="color:#328072;">{{ $address['location'] }}</p>
                                @endif
                                <p class="text-xs text-gray-400 mt-1">
                                    @if(!empty($address['start_date'])) From {{ $address['start_date'] }} @endif
                                    @if(!empty($address['end_date'])) &ndash; {{ $address['end_date'] }} @endif
                                </p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-400 italic">No addresses on record</p>
                @endif
            </div>
        </div>

        {{-- VSN / Other IDs --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="flex items-center gap-3 px-6 py-4 border-b border-gray-50">
                <span class="w-8 h-8 rounded-lg flex items-center justify-center text-white shrink-0" style="background:#328072;">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3 3 0 00-3 3m12-6h.01"/>
                    </svg>
                </span>
                <h2 class="font-semibold text-gray-800">VSN / Other IDs</h2>
                @if(!empty($profile->payload['vsn_numbers']))
                    <span class="ml-auto text-xs font-semibold px-2 py-0.5 rounded-full text-white" style="background:#328072;">
                        {{ count($profile->payload['vsn_numbers']) }}
                    </span>
                @endif
            </div>
            <div class="p-6">
                @if(!empty($profile->payload['vsn_numbers']))
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($profile->payload['vsn_numbers'] as $vsn)
                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                <p class="text-gray-800 font-mono font-semibold text-sm">{{ $vsn['vsn'] ?? '—' }}</p>
                                <p class="text-xs text-gray-400 mt-1">
                                    @if(!empty($vsn['start_date'])) From {{ $vsn['start_date'] }} @endif
                                    @if(!empty($vsn['end_date'])) &ndash; {{ $vsn['end_date'] }} @endif
                                </p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-400 italic">No VSN numbers on record</p>
                @endif
            </div>
        </div>

        {{-- Meta footer --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 px-6 py-4">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-3">Profile Information</p>
            <div class="flex flex-wrap gap-x-8 gap-y-2 text-sm text-gray-500">
                <span><span class="text-gray-400">Created:</span> {{ $profile->created_at->format('M d, Y \a\t H:i') }}</span>
                <span><span class="text-gray-400">Updated:</span> {{ $profile->updated_at->format('M d, Y \a\t H:i') }}</span>
            </div>
        </div>

    </main>
</body>
</html>
