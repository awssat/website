{{-- Scroll Controls: Vanilla JS (No Alpine) --}}
<button id="scroll-button"
        onclick="(window.pageYOffset > document.documentElement.scrollHeight / 2) ? scrollToTop() : scrollToBottom()"
        style="display: none;"
        class="fixed bottom-6 {{ ($page->locale ?? 'en') === 'ar' ? 'left-6' : 'right-6' }} z-40 p-2 group focus:outline-none"
        aria-label="{{ ($page->locale ?? 'en') === 'ar' ? 'التمرير' : 'Scroll' }}">
    {{-- Up Arrow --}}
    <svg id="scroll-up-arrow" style="display: none;"
         class="w-8 h-8 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 transform group-hover:-translate-y-1 transition-all duration-200 drop-shadow-md"
         fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 15l7-7 7 7"></path>
    </svg>
    {{-- Down Arrow --}}
    <svg id="scroll-down-arrow" style="display: block;"
         class="w-8 h-8 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 transform group-hover:translate-y-1 transition-all duration-200 drop-shadow-md"
         fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
    </svg>
</button>

{{-- Scroll Progress Indicator --}}
<div id="scroll-progress-container" style="display: none;" class="fixed top-0 left-0 w-full h-0.5 z-50 pointer-events-none">
    <div id="scroll-progress-bar" class="h-full bg-gradient-to-r from-primary-500 via-purple-500 to-accent-500" style="width: 0%;"></div>
</div>
