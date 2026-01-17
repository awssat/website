@php
    // Get current locale
    $currentLocale = $page->locale ?? 'en';

    // Get current path - try multiple sources
    $currentPath = $page->getPath() ?? $page->_meta['path'] ?? '/';

    // Normalize path (remove leading slash for easier manipulation)
    $normalizedPath = ltrim($currentPath, '/');

    // Generate language toggle URLs
    if ($currentLocale === 'ar') {
        // On Arabic page - generate English equivalent
        // Check if it's the homepage or a subpage
        if ($normalizedPath === 'ar' || $normalizedPath === '') {
            // Arabic homepage -> English homepage
            $enUrl = '/';
            $arUrl = '/ar';
        } else {
            // Arabic subpage -> remove 'ar/' prefix
            $enPath = str_starts_with($normalizedPath, 'ar/') ? substr($normalizedPath, 3) : $normalizedPath;
            $enUrl = '/' . $enPath;
            $arUrl = '/' . $normalizedPath;
        }
    } else {
        // On English page - generate Arabic equivalent
        if ($normalizedPath === '' || $normalizedPath === '/') {
            // English homepage -> Arabic homepage
            $enUrl = '/';
            $arUrl = '/ar';
        } else {
            // English subpage -> add 'ar/' prefix
            $enUrl = '/' . $normalizedPath;
            $arUrl = '/ar/' . $normalizedPath;
        }
    }
@endphp

<div class="inline-flex items-center gap-1 bg-gray-100 dark:bg-gray-800 rounded-lg p-1">
    <a href="{{ url($enUrl) }}"
       class="px-3 py-1.5 rounded-md text-sm font-medium transition-colors {{ $currentLocale === 'en' ? 'bg-white dark:bg-gray-700 text-gray-900 dark:text-white shadow-sm' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white' }}"
       title="English">
        EN
    </a>
    <a href="{{ url($arUrl) }}"
       class="px-3 py-1.5 rounded-md text-sm font-medium transition-colors {{ $currentLocale === 'ar' ? 'bg-white dark:bg-gray-700 text-gray-900 dark:text-white shadow-sm' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white' }}"
       title="العربية">
        عربي
    </a>
</div>
