<div class="flex items-center gap-2 text-sm px-3 py-1 base-breadcrumbs rounded-lg">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
    </svg>
    <span class="font-semibold">{{ $page->locale === 'en' ? 'EN' : 'عر' }}</span>
    <span class="text-gray-400 dark-mode:text-gray-600">|</span>
    <a href="{{ url($page->getAlternateUrl()) }}"
       class="hover:text-primary-600 dark-mode:hover:text-primary-400 transition-colors duration-200"
       title="Switch to {{ $page->alternateLocale === 'en' ? 'English' : 'العربية' }}">
        {{ $page->alternateLocale === 'en' ? 'English' : 'العربية' }}
    </a>
</div>
