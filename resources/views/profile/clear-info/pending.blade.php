<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Deletion Requests — {{ $profile->name }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen">

    @php
        $pendingRequest = $deletionRequests->firstWhere('status', 'pending') || $deletionRequests->firstWhere('status', 'processing');
        $hasPending = $profile->hasPendingDeletionRequest();
        $rejectedRequests = $deletionRequests->where('status', 'rejected');
    @endphp

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
                    @if($hasPending)
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    @else
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                    @endif
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-white">
                        @if($hasPending)
                            Request In Progress
                        @else
                            Deletion Request History
                        @endif
                    </h1>
                    <p class="text-white/60 text-sm mt-0.5">
                        @if($hasPending)
                            A deletion request is currently being processed
                        @else
                            View the status of your data deletion requests
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Main content --}}
    <main class="max-w-5xl mx-auto px-6 md:px-10 -mt-6 pb-16 space-y-6">

        {{-- Current Status Card (if pending/processing) --}}
        @if($hasPending)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8 md:p-10">
                <div class="flex items-start gap-4 mb-6">
                    <div class="w-12 h-12 rounded-full bg-amber-100 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900">Request Under Review</h2>
                        <p class="text-gray-600 mt-1">
                            Your deletion request for <strong style="color:#328072;">{{ $profile->name }}</strong> is currently being processed.
                        </p>
                    </div>
                </div>

                <div class="bg-amber-50 border border-amber-200 rounded-xl p-5 mb-6">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></div>
                        <span class="font-medium text-amber-800">
                            {{ $deletionRequests->firstWhere('status', 'processing') ? 'Processing' : 'Pending Review' }}
                        </span>
                    </div>
                    <p class="text-amber-700 text-sm">
                        Processing time: <strong>4 business days</strong> from submission date.
                    </p>
                </div>

                <div class="text-left bg-gray-50 rounded-xl p-5">
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
            </div>
        </div>
        @endif

        {{-- Submit New Request Button (if no pending request) --}}
        @if(!$hasPending)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 md:p-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div>
                    <h3 class="font-semibold text-gray-900">Submit a New Request</h3>
                    <p class="text-gray-500 text-sm mt-1">If your previous request was rejected, you can submit a new one with corrected documents.</p>
                </div>
                <a href="{{ route('profile.clear-info.form', $profile) }}?new=1"
                   class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-white font-medium transition hover:opacity-90 shrink-0"
                   style="background:#dc2626;">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    New Deletion Request
                </a>
            </div>
        </div>
        @endif

        {{-- Request History Table --}}
        @if($deletionRequests->isNotEmpty())
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 md:p-8">
                <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center gap-3">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Request History
                </h2>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-left py-3 px-4 font-medium text-gray-700 text-sm">Date Submitted</th>
                                <th class="text-left py-3 px-4 font-medium text-gray-700 text-sm">Status</th>
                                <th class="text-left py-3 px-4 font-medium text-gray-700 text-sm">Processed Date</th>
                                <th class="text-left py-3 px-4 font-medium text-gray-700 text-sm">Notes / Rejection Reason</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($deletionRequests as $request)
                            <tr class="hover:bg-gray-50">
                                <td class="py-4 px-4 text-sm text-gray-900">
                                    {{ $request->created_at->format('M d, Y') }}
                                    <span class="text-gray-400 text-xs block">{{ $request->created_at->format('H:i') }}</span>
                                </td>
                                <td class="py-4 px-4">
                                    @php
                                        $statusConfig = [
                                            'pending' => ['bg-amber-100 text-amber-800', 'Pending'],
                                            'processing' => ['bg-blue-100 text-blue-800', 'Processing'],
                                            'completed' => ['bg-green-100 text-green-800', 'Completed'],
                                            'rejected' => ['bg-red-100 text-red-800', 'Rejected'],
                                        ];
                                        [$classes, $label] = $statusConfig[$request->status] ?? ['bg-gray-100 text-gray-800', ucfirst($request->status)];
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $classes }}">
                                        {{ $label }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-sm text-gray-600">
                                    @if($request->processed_at)
                                        {{ $request->processed_at->format('M d, Y') }}
                                        <span class="text-gray-400 text-xs block">{{ $request->processed_at->format('H:i') }}</span>
                                    @else
                                        <span class="text-gray-400">—</span>
                                    @endif
                                </td>
                                <td class="py-4 px-4 text-sm">
                                    @if($request->status === 'rejected' && $request->rejection_reason)
                                        <div class="bg-red-50 border border-red-100 rounded-lg p-3">
                                            <p class="text-red-800 text-sm font-medium mb-1">Rejection Reason:</p>
                                            <p class="text-red-700 text-sm">{{ $request->rejection_reason }}</p>
                                        </div>
                                    @elseif($request->admin_notes)
                                        <p class="text-gray-600">{{ $request->admin_notes }}</p>
                                    @else
                                        <span class="text-gray-400">—</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif

        {{-- Rejected Requests Summary (if any) --}}
        @if($rejectedRequests->isNotEmpty())
        <div class="bg-red-50 border border-red-200 rounded-2xl p-6 md:p-8">
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-red-900 mb-2">Rejected Requests</h3>
                    <p class="text-red-700 text-sm mb-4">
                        You have {{ $rejectedRequests->count() }} rejected request(s). Please review the rejection reasons above and submit a new request with corrected documents.
                    </p>
                    <div class="space-y-2">
                        @foreach($rejectedRequests as $rejected)
                            @if($rejected->rejection_reason)
                            <div class="flex items-start gap-2 text-sm">
                                <span class="text-red-400 mt-0.5">•</span>
                                <span class="text-red-800">
                                    <strong>{{ $rejected->created_at->format('M d, Y') }}:</strong>
                                    {{ Str::limit($rejected->rejection_reason, 100) }}
                                </span>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif

        {{-- Footer --}}
        <div class="bg-gray-100 rounded-xl px-8 py-4">
            <p class="text-xs text-gray-500 text-center">
                Need help? Contact <a href="mailto:support@peopledb.com" style="color:#328072;">support@peopledb.com</a> with your request details.
            </p>
        </div>

    </main>

</body>
</html>
