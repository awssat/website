<div class="inline-flex items-center gap-1 bg-gray-100 dark:bg-gray-800 rounded-lg p-1">
    <a href="{{ url('/') }}"
       class="px-3 py-1.5 rounded-md text-sm font-medium transition-colors {{ ($page->locale ?? 'en') === 'en' ? 'bg-white dark:bg-gray-700 text-gray-900 dark:text-white shadow-sm' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white' }}"
       title="English">
        EN
    </a>
    <a href="{{ url('/ar') }}"
       class="px-3 py-1.5 rounded-md text-sm font-medium transition-colors {{ ($page->locale ?? 'en') === 'ar' ? 'bg-white dark:bg-gray-700 text-gray-900 dark:text-white shadow-sm' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white' }}"
       title="العربية">
        عر
    </a>
</div>
