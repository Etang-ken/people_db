{{-- Hero: full-screen, background image set via inline style so Blade renders correctly --}}
<div class="relative min-h-screen flex flex-col"
     style="background-image: url('{{ asset('assets/images/people.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

    {{-- Dark overlay --}}
    <div class="absolute inset-0" style="background: rgba(0,0,0,0.55);"></div>

    {{-- Navbar --}}
    <nav class="relative z-10 flex items-center justify-between px-6 md:px-14 py-5">
        <div class="flex items-center gap-2">
            <div class="w-9 h-9 rounded-lg flex items-center justify-center" style="background:#328072;">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
            <span class="text-white font-bold text-xl tracking-tight">People Db</span>
        </div>
    </nav>

    {{-- Hero content --}}
    <div class="relative z-10 flex-1 flex items-center justify-center px-4 py-10">
        <div class="w-full max-w-3xl">
            <div class="text-center mb-10">
                <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-tight mb-3">
                    Find People Fast &amp; Free!
                </h1>
                <p class="text-gray-300 text-lg">Find a person by name, phone number, or email address.</p>
            </div>

            {{-- Search card --}}
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">

                {{-- Tabs --}}
                <div class="flex border-b border-gray-100">
                    <button onclick="setSearchType('name')" id="tab-name"
                            class="tab-btn flex-1 py-4 text-sm font-semibold flex items-center justify-center gap-2 border-b-2 transition-colors
                                   {{ $type === 'name' ? 'border-[#328072] text-[#328072] bg-[#f0f9f6]' : 'border-transparent text-gray-400 hover:text-gray-600' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        NAME
                    </button>
                    <button onclick="setSearchType('phone')" id="tab-phone"
                            class="tab-btn flex-1 py-4 text-sm font-semibold flex items-center justify-center gap-2 border-b-2 transition-colors
                                   {{ $type === 'phone' ? 'border-[#328072] text-[#328072] bg-[#f0f9f6]' : 'border-transparent text-gray-400 hover:text-gray-600' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        PHONE
                    </button>
                    <button onclick="setSearchType('email')" id="tab-email"
                            class="tab-btn flex-1 py-4 text-sm font-semibold flex items-center justify-center gap-2 border-b-2 transition-colors
                                   {{ $type === 'email' ? 'border-[#328072] text-[#328072] bg-[#f0f9f6]' : 'border-transparent text-gray-400 hover:text-gray-600' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        EMAIL
                    </button>
                </div>

                {{-- Form --}}
                <form action="{{ route('search.index') }}" method="GET" id="search-form" class="p-6 md:p-8">
                    <input type="hidden" name="type" id="search-type" value="{{ $type }}">

                    <div class="relative mb-4">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                            @if($type === 'name')
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            @elseif($type === 'phone')
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            @else
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            @endif
                        </div>
                        <input type="text" name="query" id="search-query"
                               value="{{ $query }}"
                               placeholder="{{ $type === 'name' ? 'e.g. John Doe' : ($type === 'phone' ? 'e.g. (818) 444-3214' : 'e.g. john@example.com') }}"
                               required
                               class="w-full pl-11 pr-4 py-3.5 border border-gray-200 rounded-xl text-gray-800 placeholder-gray-400
                                      focus:outline-none focus:ring-2 focus:ring-[#328072] focus:border-transparent text-base transition">
                    </div>

                    {{-- Advanced Filters toggle --}}
                    <div class="mb-5">
                        <button type="button" onclick="toggleFilters()"
                                class="text-sm font-medium flex items-center gap-1.5" style="color:#328072;">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.553.894l-4 2A1 1 0 017 21v-7.586L3.293 6.707A1 1 0 013 6V4z"/>
                            </svg>
                            Advanced Filters
                        </button>
                        <div id="filters" class="hidden mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                            <div>
                                <label class="block text-xs font-medium text-gray-500 mb-1 uppercase tracking-wide">Location</label>
                                <select name="location" class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#328072]">
                                    <option value="">All Locations</option>
                                    @foreach($locations as $loc)
                                        <option value="{{ $loc }}" {{ $location === $loc ? 'selected' : '' }}>{{ $loc }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 mb-1 uppercase tracking-wide">Created From</label>
                                <input type="date" name="created_from" value="{{ $createdFrom }}"
                                       class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#328072]">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 mb-1 uppercase tracking-wide">Created To</label>
                                <input type="date" name="created_to" value="{{ $createdTo }}"
                                       class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#328072]">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 mb-1 uppercase tracking-wide">Updated From</label>
                                <input type="date" name="updated_from" value="{{ $updatedFrom }}"
                                       class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#328072]">
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit" id="search-btn"
                                class="flex-1 text-white font-semibold py-3.5 rounded-xl flex items-center justify-center gap-2 text-sm tracking-wide transition-opacity hover:opacity-90 disabled:opacity-70 disabled:cursor-not-allowed"
                                style="background:#328072;">
                            <span id="search-btn-text" class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                                FREE SEARCH
                            </span>
                            <span id="search-btn-loader" class="hidden flex items-center gap-2">
                                <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Searching...
                            </span>
                        </button>
                        @if($query)
                            <a href="{{ route('search.index') }}"
                               class="px-5 py-3.5 border border-gray-200 text-gray-500 rounded-xl hover:bg-gray-50 text-sm font-medium transition">
                                Clear
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
