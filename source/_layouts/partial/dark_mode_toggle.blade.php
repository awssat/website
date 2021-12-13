<div class="relative inline-block w-12 select-none" x-cloak x-data="{ toggle: darkMode() }"
    @click.prevent="toggle = darkMode(! toggle)">
    <div :class="{'translate-x-full': toggle}"
        class="absolute z-10 border-gray-700 block w-6 h-6 rounded-full bg-white border-2 cursor-pointer transition duration-100 transform"></div>

    <div
        class="overflow-hidden bg-gray-800 h-6 w-full base-theme-toggle-pill rounded-full cursor-pointer flex justify-between items-center p-px">
        {{-- feathericons --}}
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5  text-blue-300 fill-current" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
        </svg>
        {{-- material icons --}}
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5  text-yellow-400 fill-current" viewBox="0 0 24 24">
            <path d="M0 0h24v24H0z" fill="none" />
            <path
                d="M6.76 4.84l-1.8-1.79-1.41 1.41 1.79 1.79 1.42-1.41zM4 10.5H1v2h3v-2zm9-9.95h-2V3.5h2V.55zm7.45 3.91l-1.41-1.41-1.79 1.79 1.41 1.41 1.79-1.79zm-3.21 13.7l1.79 1.8 1.41-1.41-1.8-1.79-1.4 1.4zM20 10.5v2h3v-2h-3zm-8-5c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6zm-1 16.95h2V19.5h-2v2.95zm-7.45-3.91l1.41 1.41 1.79-1.8-1.41-1.41-1.79 1.8z" />
            </svg>
    </div>
    <input type="checkbox" class="hidden" aria-label="dark mode toggle">
</div>
