<footer class="bg-gray-50 dark:bg-gray-950 border-t border-gray-200 dark:border-gray-800 mt-auto">
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="grid md:grid-cols-3 gap-8">
            {{-- Brand Column --}}
            <div class="space-y-4">
                <div class="flex items-center space-x-2">
                    <img src="{{ $page->baseUrl }}/assets/images/logo.png" class="w-8 h-8" alt="Awssat" aria-roledescription="Logo of Awssat">
                    <span class="text-xl font-bold text-gray-900 dark:text-white">Awssat</span>
                </div>
                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                    {{ $page->trans('footer.tagline') ?? 'Building exceptional web experiences with Laravel and modern technologies.' }}
                </p>
                <div class="flex items-center space-x-4">
                    <a href="https://github.com/awssat" target="_blank" rel="noopener noreferrer"
                       class="text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors"
                       aria-label="GitHub">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                    </a>
                    <a href="https://x.com/awssat_dev" target="_blank" rel="noopener noreferrer"
                       class="text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors"
                       aria-label="Twitter">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.643 4.937c-.835.37-1.732.62-2.675.733a4.67 4.67 0 0 0 2.048-2.578 9.3 9.3 0 0 1-2.958 1.13 4.66 4.66 0 0 0-7.938 4.25 13.229 13.229 0 0 1-9.602-4.868c-.4.69-.63 1.49-.63 2.342A4.66 4.66 0 0 0 3.96 9.824a4.647 4.647 0 0 1-2.11-.583v.06a4.66 4.66 0 0 0 3.737 4.568 4.692 4.692 0 0 1-2.104.08 4.661 4.661 0 0 0 4.352 3.234 9.348 9.348 0 0 1-5.786 1.995 9.5 9.5 0 0 1-1.112-.065 13.175 13.175 0 0 0 7.14 2.093c8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602a9.47 9.47 0 0 0 2.323-2.41z"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Quick Links Column --}}
            <div class="space-y-4">
                <h3 class="text-sm font-bold text-gray-900 dark:text-white uppercase tracking-wider">
                    {{ $page->trans('footer.quick_links') ?? 'Quick Links' }}
                </h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ $page->localUrl('portfolio') }}"
                           class="text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors text-sm">
                            {{ $page->trans('nav.portfolio') ?? 'Portfolio' }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ $page->localUrl('blog') }}"
                           class="text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors text-sm">
                            {{ $page->trans('nav.blog') ?? 'Blog' }}
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/awssat" target="_blank" rel="noopener noreferrer"
                           class="text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors text-sm">
                            {{ $page->trans('nav.github') ?? 'GitHub' }}
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Resources Column --}}
            <div class="space-y-4">
                <h3 class="text-sm font-bold text-gray-900 dark:text-white uppercase tracking-wider">
                    {{ $page->trans('footer.resources') ?? 'Resources' }}
                </h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ url('/blog/feed.atom') }}"
                           class="text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors text-sm">
                            {{ $page->trans('footer.rss_feed') ?? 'RSS Feed' }}
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/awssat/website" target="_blank" rel="noopener noreferrer"
                           class="text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors text-sm">
                            {{ $page->trans('footer.source_code') ?? 'Source Code' }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Bottom Bar --}}
        <div class="mt-12 pt-8 border-t border-gray-200 dark:border-gray-800 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-center md:text-left">
                <p class="text-gray-600 dark:text-gray-400 text-sm">
                    &copy; {{ date('Y') }} Awssat. {{ $page->trans('footer.rights') ?? 'All rights reserved.' }}
                </p>
                <p class="text-gray-500 dark:text-gray-500 text-xs mt-1">
                    Made with <span class="text-red-500">❤️</span> using <a href="https://laravel.com" class="hover:text-primary-500 transition-colors">Laravel</a> & <a href="https://jigsaw.tighten.co" class="hover:text-primary-500 transition-colors">Jigsaw</a>
                </p>
            </div>
            <div class="flex items-center gap-4">
                @include('_layouts.partial.dark_mode_toggle')
                @if(isset($page->locale))
                    @include('_layouts.partial.language_switcher')
                @endif
            </div>
        </div>
    </div>
</footer>
