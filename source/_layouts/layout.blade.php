<!DOCTYPE html>
<html lang="{{ $page->locale ?? 'en' }}" dir="{{ isset($page->locale) && $page->locale === 'ar' ? 'rtl' : 'ltr' }}" class="no-js" x-data="{ darkMode: $persist(false) }" :class="{ 'dark': darkMode }">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<script>document.documentElement.classList.remove('no-js')</script>
<meta name="author" content="{{ $page->siteAuthor }}">
<meta name="google" content="notranslate">
<meta name="robots" content="index, follow">
<meta name="applicable-device" content="pc, mobile">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="{{ $page->siteName }}">
<meta name="theme-color" content="#8b5cf6" media="(prefers-color-scheme: light)">
<meta name="theme-color" content="#1f2937" media="(prefers-color-scheme: dark)">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

{{-- Page-specific meta tags (overrideable) --}}
@yield('seo-meta')

{{-- Default fallback meta tags (only if page doesn't define seo-meta section) --}}
@sectionMissing('seo-meta')
    @include('_layouts.partial.meta_tags_default')
@endif

<title>@section('title'){{ $page->siteName }}@show</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&family=Inter:wght@300;400;500;600;700;800;900&family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
@viteRefresh()
<link rel="stylesheet" href="{{ vite('source/_assets/css/app.css') }}">
<script type="module" src="{{ vite('source/_assets/js/app.js') }}"></script>
<link rel="home" href="{{ $page->baseUrl }}">
<link rel="icon" href="{{ url('/favicon.ico') }}">
<link href="{{ url('/blog/feed.atom') }}" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed">
@if(isset($page->locale))
<link rel="alternate" hreflang="{{ $page->alternateLocale ?? 'ar' }}" href="{{ url($page->getAlternateUrl()) }}">
<link rel="alternate" hreflang="{{ $page->locale }}" href="{{ $page->getUrl() }}">
@endif
@stack('head')
</head>
<body class="antialiased bg-gray-50 dark:bg-gray-950 text-gray-900 dark:text-gray-100 min-h-screen flex flex-col">
    {{-- Modern Floating Header --}}
    <header x-data="{ mobileMenuOpen: false, scrolled: false }"
            @scroll.window="scrolled = (window.pageYOffset > 20)"
            @click.away="mobileMenuOpen = false"
            class="fixed top-0 w-full z-50 py-3 md:py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-6 lg:px-8 transition-[padding] duration-300"
             :class="{ 'md:px-4 lg:px-6': scrolled }">
            <div class="relative mx-auto transition-[background-color,box-shadow,max-width,padding,border-color] duration-300 ease-out bg-white/95 dark:bg-gray-900/95 shadow-md rounded-2xl max-w-6xl px-4 sm:px-6 py-2 border border-gray-200/50 dark:border-gray-800/50 md:bg-transparent md:shadow-none md:border-transparent"
                 :class="{
                    '!bg-white/95 dark:!bg-gray-900/95 !shadow-lg !max-w-5xl !px-6 !border-gray-200/70 dark:!border-gray-700/70': scrolled
                 }">
                <div class="flex justify-between items-center h-10 sm:h-12">
                    {{-- Logo --}}
                    <div class="flex items-center">
                        <a href="{{ $page->baseUrl }}" class="flex items-center space-x-2 group">
                            <img src="{{ $page->baseUrl }}/assets/images/logo.png" class="w-7 h-7 sm:w-8 sm:h-8 transition-transform duration-500 group-hover:rotate-12" alt="Awssat" aria-roledescription="Logo of Awssat">
                            <span class="text-lg sm:text-xl font-bold tracking-tight text-gray-900 dark:text-white"
                                  :class="{ 'text-base sm:text-lg': scrolled }">Awssat</span>
                        </a>
                    </div>

                    {{-- Desktop Navigation --}}
                    <div class="hidden md:flex items-center space-x-1">
                        <a href="{{ $page->baseUrl }}/{{ ($page->locale ?? 'en') === 'ar' ? 'ar/' : '' }}portfolio"
                           class="relative px-3 py-1.5 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors group">
                            <span>{{ $page->trans('nav.portfolio') ?? 'Portfolio' }}</span>
                            <span class="absolute inset-x-0 bottom-0 h-0.5 bg-primary-500 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
                        </a>
                        <a href="{{ $page->baseUrl }}/blog"
                           class="relative px-3 py-1.5 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors group">
                            <span>{{ $page->trans('nav.blog') ?? 'Blog' }}</span>
                            <span class="absolute inset-x-0 bottom-0 h-0.5 bg-primary-500 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
                        </a>
                        <a href="https://github.com/awssat" target="_blank" rel="noopener noreferrer"
                           class="relative px-3 py-1.5 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors group inline-flex items-center">
                            <span>GitHub</span>
                            <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                            <span class="absolute inset-x-0 bottom-0 h-0.5 bg-primary-500 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
                        </a>

                        <div class="h-6 w-px bg-gray-200 dark:bg-gray-700 mx-4" :class="{ 'opacity-0': !scrolled }"></div>

                        {{-- Dark Mode Toggle --}}
                        <div class="flex items-center">
                            @include('_layouts.partial.dark_mode_toggle')
                        </div>

                        {{-- Language Switcher --}}
                        <div class="flex items-center space-x-2 ml-4">
                            @include('_layouts.partial.language_switcher')
                        </div>
                    </div>

                    {{-- Mobile menu button --}}
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none" aria-label="Toggle menu">
                        <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                {{-- Mobile Menu --}}
                <div x-show="mobileMenuOpen"
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 translate-y-[-8px]"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 translate-y-[-8px]"
                     @click.stop
                     class="md:hidden mt-4 pt-4 border-t border-gray-200 dark:border-gray-800 relative z-50">
                    <div class="flex flex-col space-y-1">
                        {{-- Navigation Links --}}
                        <a href="{{ $page->baseUrl }}/{{ ($page->locale ?? 'en') === 'ar' ? 'ar/' : '' }}portfolio"
                           @click="mobileMenuOpen = false"
                           class="px-4 py-3 rounded-xl text-base font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors @if($page->isPath('*portfolio*')) bg-gray-100 dark:bg-gray-800 text-primary-600 dark:text-primary-400 @endif">
                            {{ $page->trans('nav.portfolio') ?? 'Portfolio' }}
                        </a>
                        <a href="{{ $page->baseUrl }}/blog"
                           @click="mobileMenuOpen = false"
                           class="px-4 py-3 rounded-xl text-base font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors @if($page->isPath('blog*')) bg-gray-100 dark:bg-gray-800 text-primary-600 dark:text-primary-400 @endif">
                            {{ $page->trans('nav.blog') ?? 'Blog' }}
                        </a>
                        <a href="https://github.com/awssat" target="_blank" rel="noopener noreferrer"
                           @click="mobileMenuOpen = false"
                           class="px-4 py-3 rounded-xl text-base font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors inline-flex items-center">
                            GitHub
                            <svg class="w-5 h-5 ml-1.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </a>

                        {{-- Divider --}}
                        <div class="h-px bg-gray-200 dark:bg-gray-800 my-2"></div>

                        {{-- Settings Section --}}
                        <div class="px-4 py-2">
                            <div class="flex items-center justify-between gap-4">
                                {{-- Dark Mode Toggle --}}
                                <div class="flex items-center">
                                    @include('_layouts.partial.dark_mode_toggle')
                                </div>

                                {{-- Language Switcher --}}
                                <div class="flex items-center">
                                    @include('_layouts.partial.language_switcher')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- Main Content --}}
    @php
        $currentPath = $page->getPath();
        $isHomePage = in_array($currentPath, ['/', '/ar', '', 'ar']) || $currentPath === null;
    @endphp
    <main class="flex-1 {{ $isHomePage ? '' : 'pt-20' }}">
        @yield('main')
    </main>

    {{-- Footer --}}
    @include('_layouts.partial.footer')
</body>
</html>
