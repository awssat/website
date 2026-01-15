{{-- Scroll Controls: Smart Direction-Based Navigation --}}
<div x-data="scrollControls()"
     @scroll.window="updateScrollPosition()"
     x-init="updateScrollPosition()"
     class="scroll-controls">

    {{-- Single Smart Scroll Button (changes based on scroll position & direction) --}}
    <button x-show="showButton"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-2"
            @click="handleScroll()"
            class="fixed bottom-6 {{ ($page->locale ?? 'en') === 'ar' ? 'left-6' : 'right-6' }} z-40 p-2 transition-all duration-200 group focus:outline-none"
            :aria-label="scrollDirection === 'up' ? '{{ ($page->locale ?? 'en') === 'ar' ? 'العودة للأعلى' : 'Scroll to top' }}' : '{{ ($page->locale ?? 'en') === 'ar' ? 'الذهاب للأسفل' : 'Scroll to bottom' }}'">
        {{-- Up Arrow --}}
        <svg x-show="scrollDirection === 'up'"
             class="w-8 h-8 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 transform group-hover:-translate-y-1 transition-all duration-200 drop-shadow-md"
             fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 15l7-7 7 7"></path>
        </svg>
        {{-- Down Arrow --}}
        <svg x-show="scrollDirection === 'down'"
             class="w-8 h-8 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 transform group-hover:translate-y-1 transition-all duration-200 drop-shadow-md"
             fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>

    {{-- Scroll Progress Indicator --}}
    <div x-show="scrollProgress > 5"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed top-0 left-0 w-full h-0.5 z-50 pointer-events-none">
        <div class="h-full bg-gradient-to-r from-primary-500 via-purple-500 to-accent-500 transition-all duration-150 ease-out"
             :style="`width: ${scrollProgress}%`"></div>
    </div>
</div>

<script>
function scrollControls() {
    return {
        showButton: false,
        scrollDirection: 'down', // 'up' or 'down'
        scrollProgress: 0,
        lastScrollTop: 0,
        _skipCounter: 0,

        updateScrollPosition() {
            // Manual throttle: Skip 2 out of 3 calls (66% reduction)
            this._skipCounter++;
            if (this._skipCounter % 3 !== 0) return;

            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            // Skip if scroll change is tiny (< 5px)
            if (Math.abs(scrollTop - this.lastScrollTop) < 5) return;

            const scrollHeight = document.documentElement.scrollHeight;
            const clientHeight = document.documentElement.clientHeight;
            const maxScroll = scrollHeight - clientHeight;

            // Calculate scroll progress percentage (round to reduce updates)
            const newProgress = maxScroll > 0 ? Math.round((scrollTop / maxScroll) * 100) : 0;

            // Only update if changed significantly
            if (Math.abs(newProgress - this.scrollProgress) >= 1) {
                this.scrollProgress = newProgress;
            }

            // Determine scroll direction
            const isScrollingDown = scrollTop > this.lastScrollTop;
            const isScrollingUp = scrollTop < this.lastScrollTop;

            const isAtTop = scrollTop < 100;
            const isAtBottom = this.scrollProgress > 95;
            const isInMiddle = !isAtTop && !isAtBottom;

            // Only update direction if it actually changed
            let newDirection = this.scrollDirection;
            if (isAtTop) {
                newDirection = 'down';
                this.showButton = true;
            } else if (isAtBottom) {
                newDirection = 'up';
                this.showButton = true;
            } else if (isInMiddle) {
                this.showButton = true;
                if (isScrollingDown) {
                    newDirection = 'down';
                } else if (isScrollingUp) {
                    newDirection = 'up';
                }
            }

            // Only trigger reactivity if direction actually changed
            if (newDirection !== this.scrollDirection) {
                this.scrollDirection = newDirection;
            }

            this.lastScrollTop = scrollTop;
        },

        handleScroll() {
            if (this.scrollDirection === 'up') {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            } else {
                window.scrollTo({ top: document.documentElement.scrollHeight, behavior: 'smooth' });
            }
        }
    }
}
</script>
