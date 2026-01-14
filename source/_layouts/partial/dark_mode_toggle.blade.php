<button @click="darkMode = !darkMode"
        type="button"
        class="relative p-2 rounded-lg text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900 w-9 h-9 flex items-center justify-center"
        :title="darkMode ? 'Switch to Light Mode' : 'Switch to Dark Mode'"
        :aria-label="darkMode ? 'Switch to Light Mode' : 'Switch to Dark Mode'">

    {{-- Icon Container with Fixed Size --}}
    <div class="relative w-5 h-5">
        {{-- Sun Icon (Visible in Dark Mode) --}}
        <svg x-show="darkMode"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 rotate-90 scale-50"
             x-transition:enter-end="opacity-100 rotate-0 scale-100"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 rotate-0 scale-100"
             x-transition:leave-end="opacity-0 -rotate-90 scale-50"
             xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>

        {{-- Moon Icon (Visible in Light Mode) --}}
        <svg x-show="!darkMode"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -rotate-90 scale-50"
             x-transition:enter-end="opacity-100 rotate-0 scale-100"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 rotate-0 scale-100"
             x-transition:leave-end="opacity-0 rotate-90 scale-50"
             xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
        </svg>
    </div>
</button>