<script>
    // Handle form submission - disable button and show loader
    document.getElementById('search-form').addEventListener('submit', function() {
        const btn = document.getElementById('search-btn');
        const btnText = document.getElementById('search-btn-text');
        const btnLoader = document.getElementById('search-btn-loader');

        btn.disabled = true;
        btnText.classList.add('hidden');
        btnLoader.classList.remove('hidden');
    });

    // Scroll to results if they exist on page load
    @if($results !== null)
    document.addEventListener('DOMContentLoaded', function() {
        const resultsSection = document.getElementById('results-section');
        if (resultsSection) {
            resultsSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
    @endif

    function setSearchType(type) {
        document.getElementById('search-type').value = type;
        document.getElementById('search-query').value = '';

        ['name','phone','email'].forEach(t => {
            const tab = document.getElementById('tab-' + t);
            if (t === type) {
                tab.classList.remove('border-transparent','text-gray-400');
                tab.classList.add('border-[#328072]','text-[#328072]','bg-[#f0f9f6]');
            } else {
                tab.classList.remove('border-[#328072]','text-[#328072]','bg-[#f0f9f6]');
                tab.classList.add('border-transparent','text-gray-400');
            }
        });

        const placeholders = { name: 'e.g. John Doe', phone: 'e.g. (818) 444-3214', email: 'e.g. john@example.com' };
        document.getElementById('search-query').placeholder = placeholders[type];
    }

    function toggleFilters() {
        const el = document.getElementById('filters');
        el.classList.toggle('hidden');
        el.classList.toggle('grid');
    }

    function scrollToSearch() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
        // Focus on search input after scroll
        setTimeout(() => {
            document.getElementById('search-query').focus();
        }, 500);
    }
</script>
