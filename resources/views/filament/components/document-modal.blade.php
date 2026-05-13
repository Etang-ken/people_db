<div class="space-y-6">
    <div class="bg-amber-50 border border-amber-200 rounded-lg p-4">
        <div class="flex items-start gap-3">
            <svg class="w-5 h-5 text-amber-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <div>
                <h4 class="font-medium text-amber-900">Verification Documents</h4>
                <p class="text-sm text-amber-800 mt-1">Review all submitted documents carefully before approving the deletion request.</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        {{-- ID Front --}}
        <div class="border rounded-lg overflow-hidden bg-gray-50">
            <div class="px-4 py-2 bg-gray-100 border-b">
                <h5 class="font-medium text-gray-700 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3 3 0 00-3 3m12-6h.01"/>
                    </svg>
                    ID Front
                </h5>
            </div>
            <div class="relative aspect-[4/3] overflow-hidden">
                <img src="{{ $record->id_front_url }}"
                     alt="ID Front"
                     class="w-full h-full object-contain bg-gray-100">
            </div>
            <div class="p-3 bg-white border-t flex justify-end">
                <a href="{{ $record->id_front_url }}" target="_blank"
                   class="text-sm font-medium text-primary-600 hover:text-primary-500 flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                    Open Full Size
                </a>
            </div>
        </div>

        {{-- ID Back --}}
        <div class="border rounded-lg overflow-hidden bg-gray-50">
            <div class="px-4 py-2 bg-gray-100 border-b">
                <h5 class="font-medium text-gray-700 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    ID Back
                </h5>
            </div>
            <div class="relative aspect-[4/3] overflow-hidden">
                <img src="{{ $record->id_back_url }}"
                     alt="ID Back"
                     class="w-full h-full object-contain bg-gray-100">
            </div>
            <div class="p-3 bg-white border-t flex justify-end">
                <a href="{{ $record->id_back_url }}" target="_blank"
                   class="text-sm font-medium text-primary-600 hover:text-primary-500 flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                    Open Full Size
                </a>
            </div>
        </div>

        {{-- Selfie --}}
        <div class="border rounded-lg overflow-hidden bg-gray-50">
            <div class="px-4 py-2 bg-gray-100 border-b">
                <h5 class="font-medium text-gray-700 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Selfie with ID
                </h5>
            </div>
            <div class="relative aspect-[4/3] overflow-hidden">
                <img src="{{ $record->selfie_url }}"
                     alt="Selfie with ID"
                     class="w-full h-full object-contain bg-gray-100">
            </div>
            <div class="p-3 bg-white border-t flex justify-end">
                <a href="{{ $record->selfie_url }}" target="_blank"
                   class="text-sm font-medium text-primary-600 hover:text-primary-500 flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                    Open Full Size
                </a>
            </div>
        </div>

        {{-- SSN Card --}}
        <div class="border rounded-lg overflow-hidden bg-gray-50">
            <div class="px-4 py-2 bg-gray-100 border-b">
                <h5 class="font-medium text-gray-700 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/>
                    </svg>
                    SSN / Tax ID Card
                </h5>
            </div>
            <div class="relative aspect-[4/3] overflow-hidden">
                <img src="{{ $record->ssn_card_url }}"
                     alt="SSN Card"
                     class="w-full h-full object-contain bg-gray-100">
            </div>
            <div class="p-3 bg-white border-t flex justify-end">
                <a href="{{ $record->ssn_card_url }}" target="_blank"
                   class="text-sm font-medium text-primary-600 hover:text-primary-500 flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                    Open Full Size
                </a>
            </div>
        </div>
    </div>

    {{-- Request Details --}}
    <div class="border rounded-lg p-4 bg-gray-50">
        <h5 class="font-medium text-gray-700 mb-3">Request Details</h5>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
            <div>
                <span class="text-gray-500">Profile:</span>
                <p class="font-medium text-gray-900">{{ $record->userProfile->name }}</p>
            </div>
            <div>
                <span class="text-gray-500">Contact Email:</span>
                <p class="font-medium text-gray-900">{{ $record->contact_email }}</p>
            </div>
            <div>
                <span class="text-gray-500">Submitted:</span>
                <p class="font-medium text-gray-900">{{ $record->created_at->format('M d, Y H:i') }}</p>
            </div>
            <div>
                <span class="text-gray-500">Status:</span>
                <p class="font-medium">
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                        @match($record->status)
                            @case('pending') bg-amber-100 text-amber-800 @break
                            @case('processing') bg-blue-100 text-blue-800 @break
                            @case('completed') bg-green-100 text-green-800 @break
                            @case('rejected') bg-red-100 text-red-800 @break
                        @endmatch">
                        {{ ucfirst($record->status) }}
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>
