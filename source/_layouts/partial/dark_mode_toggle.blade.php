<button @click="darkMode = !darkMode" type="button" class="relative inline-flex flex-shrink-0 h-7 transition-all duration-300 ease-in-out border-2 border-primary-500/30 rounded-full cursor-pointer bg-gray-200 dark:bg-gray-700 w-14 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 hover:border-primary-500/50" role="switch" :aria-checked="darkMode">
    <span class="sr-only">Dark Mode Toggle</span>
    <span class="relative inline-block w-5 h-5 m-0.5 transition-all duration-500 ease-in-out transform rounded-full shadow-md"
          :class="darkMode ? 'translate-x-7' : 'translate-x-0'"
          style="background: linear-gradient(to right, #e2df4e, #b0951e);">
        <!-- Sun Icon -->
        <span class="absolute inset-0 flex items-center justify-center w-full h-full transition-all duration-500"
              :class="darkMode ? 'opacity-0' : 'opacity-100'" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path>
            </svg>
        </span>
        <!-- Moon Icon -->
        <span class="absolute inset-0 flex items-center justify-center w-full h-full transition-all duration-500"
              :class="darkMode ? 'opacity-100' : 'opacity-0'" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path>
            </svg>
        </span>
    </span>
</button>
