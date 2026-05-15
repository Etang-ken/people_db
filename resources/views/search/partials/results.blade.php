@if($results !== null)
<div id="results-section" class="max-w-3xl mx-auto px-4 py-10">
    <p class="text-sm text-gray-500 mb-5">
        Showing <span class="font-semibold text-gray-800">{{ $results->total() }}</span> result{{ $results->total() !== 1 ? 's' : '' }}
    </p>

    @forelse($results as $profile)
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition p-5 mb-4 flex items-start justify-between gap-4">
            <div class="flex-1 min-w-0">
                <a href="{{ route('profile.show', $profile) }}"
                   class="text-lg font-semibold text-gray-900 hover:underline" style="color:#1a1a1a;">
                    {{ $profile->name }}
                </a>

                <div class="mt-2 space-y-1">
                    @if($profile->primary_email)
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                            <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span class="truncate">{{ $profile->primary_email }}</span>
                        </div>
                    @endif
                    @if($profile->primary_phone)
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                            <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span>{{ $profile->primary_phone }}</span>
                        </div>
                    @endif
                    @if(!empty($profile->all_locations))
                        <div class="flex items-center gap-2 text-sm text-gray-400">
                            <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>{{ implode(', ', array_slice($profile->all_locations, 0, 2)) }}{{ count($profile->all_locations) > 2 ? ' +'.( count($profile->all_locations)-2).' more' : '' }}</span>
                        </div>
                    @endif
                </div>
            </div>
            <a href="{{ route('profile.show', $profile) }}"
               class="shrink-0 text-sm font-semibold px-4 py-2 rounded-lg border transition"
               style="color:#328072; border-color:#328072;">
                View Details
            </a>
        </div>
    @empty
        <div class="text-center py-16 text-gray-400">
            <svg class="w-12 h-12 mx-auto mb-3 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <p class="font-medium text-gray-500">No results found</p>
            <p class="text-sm mt-1">Try different keywords or filters</p>
        </div>
    @endforelse

    @if($results->hasPages())
        <div class="mt-6">{{ $results->links() }}</div>
    @endif
</div>
@endif
