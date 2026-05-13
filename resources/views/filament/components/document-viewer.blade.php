<div class="document-viewer">
    <div class="border rounded-lg overflow-hidden bg-gray-50">
        <div class="relative aspect-[4/3] overflow-hidden">
            <img src="{{ $url }}"
                 alt="Document"
                 class="w-full h-full object-contain cursor-pointer hover:scale-105 transition-transform"
                 onclick="window.open('{{ $url }}', '_blank')">
        </div>
        <div class="p-3 bg-white border-t flex items-center justify-between">
            <span class="text-sm text-gray-600">{{ $label ?? 'Document' }}</span>
            <a href="{{ $url }}" target="_blank"
               class="text-sm font-medium text-primary-600 hover:text-primary-500 flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                View Full Size
            </a>
        </div>
    </div>
</div>
