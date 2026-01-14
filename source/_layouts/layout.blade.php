<!DOCTYPE html>
<html lang="{{ $page->locale ?? 'en' }}" dir="{{ isset($page->locale) && $page->locale === 'ar' ? 'rtl' : 'ltr' }}" x-data="{ darkMode: $persist(false) }" :class="{ 'dark': darkMode }">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>@section('title'){{ $page->siteName }}@show</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
@viteRefresh()
<link rel="stylesheet" href="{{ vite('source/_assets/css/app.css') }}">
<script defer type="module" src="{{ vite('source/_assets/js/app.js') }}"></script>
<link rel="home" href="{{ $page->baseUrl }}">
<link rel="icon" href="{{ url('/favicon.ico') }}">
<link href="{{ url('/blog/feed.atom') }}" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed">
@if(isset($page->locale))
<link rel="alternate" hreflang="{{ $page->alternateLocale ?? 'ar' }}" href="{{ url($page->getAlternateUrl()) }}">
<link rel="alternate" hreflang="{{ $page->locale }}" href="{{ $page->getUrl() }}">
@endif
@stack('head')
</head>
<body class="antialiased bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen flex flex-col">
    {{-- Modern Header --}}
    <header x-data="{ mobileMenuOpen: false }" class="sticky top-0 z-50 bg-white/95 dark:bg-gray-800/95 backdrop-blur-md border-b border-gray-200 dark:border-gray-700 shadow-sm">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                {{-- Logo --}}
                <div class="flex items-center">
                    <a href="{{ $page->baseUrl }}" class="flex items-center space-x-2 group">
                        <img src="{{ $page->baseUrl }}/assets/images/logo.png" class="w-8 h-8 transition-transform group-hover:scale-110" alt="Awssat" aria-roledescription="Logo of Awssat">
                        <span class="text-xl font-bold text-gray-900 dark:text-white">Awssat</span>
                    </a>
                </div>

                {{-- Desktop Navigation --}}
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ $page->baseUrl }}/{{ ($page->locale ?? 'en') === 'ar' ? 'ar/' : '' }}portfolio"
                       class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors @if($page->isPath('*portfolio*')) text-primary-600 dark:text-primary-400 @endif">
                        {{ $page->trans('nav.portfolio') ?? 'Portfolio' }}
                    </a>
                    <a href="{{ $page->baseUrl }}/blog"
                       class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors @if($page->isPath('blog*')) text-primary-600 dark:text-primary-400 @endif">
                        {{ $page->trans('nav.blog') ?? 'Blog' }}
                    </a>
                    <a href="https://github.com/awssat" target="_blank" rel="noopener noreferrer"
                       class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors inline-flex items-center">
                        GitHub
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                    </a>

                    {{-- Dark Mode Toggle --}}
                    <div class="flex items-center">
                        @include('_layouts.partial.dark_mode_toggle')
                    </div>

                    {{-- Language Switcher --}}
                    <div class="flex items-center space-x-2">
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
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="md:hidden py-4 border-t border-gray-200 dark:border-gray-800">
                <div class="flex flex-col space-y-3">
                    <a href="{{ $page->baseUrl }}/{{ ($page->locale ?? 'en') === 'ar' ? 'ar/' : '' }}portfolio" class="px-3 py-2 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 @if($page->isPath('*portfolio*')) bg-gray-100 dark:bg-gray-800 text-primary-600 dark:text-primary-400 @endif">
                        {{ $page->trans('nav.portfolio') ?? 'Portfolio' }}
                    </a>
                    <a href="{{ $page->baseUrl }}/blog" class="px-3 py-2 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 @if($page->isPath('blog*')) bg-gray-100 dark:bg-gray-800 text-primary-600 dark:text-primary-400 @endif">
                        {{ $page->trans('nav.blog') ?? 'Blog' }}
                    </a>
                    <a href="https://github.com/awssat" target="_blank" rel="noopener noreferrer" class="px-3 py-2 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 inline-flex items-center">
                        GitHub
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                    </a>

                    {{-- Dark Mode Toggle --}}
                    <div class="px-3 py-2 flex items-center justify-center">
                        @include('_layouts.partial.dark_mode_toggle')
                    </div>

                    {{-- Language Switcher --}}
                    <div class="px-3 py-2">
                        @include('_layouts.partial.language_switcher')
                    </div>
                </div>
            </div>
        </nav>
    </header>

    {{-- Main Content --}}
    <main class="flex-1">
        @yield('main')
    </main>

    {{-- Footer --}}
    @include('_layouts.partial.footer')
</body>
</html>
