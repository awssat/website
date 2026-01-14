@php
    $locale = $page->locale ?? 'en';
@endphp

<div class="w-full overflow-hidden">
    {{-- Epic Hero Section --}}
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden gradient-mesh">
        {{-- Animated Background Elements --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 {{ $locale === 'ar' ? 'right-10' : 'left-10' }} w-96 h-96 bg-primary-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-float"></div>
            <div class="absolute top-40 {{ $locale === 'ar' ? 'left-20' : 'right-20' }} w-[500px] h-[500px] bg-accent-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-float-slow"></div>
            <div class="absolute -bottom-20 {{ $locale === 'ar' ? 'right-1/3' : 'left-1/3' }} w-80 h-80 bg-primary-400 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-float-fast"></div>
        </div>

        {{-- Hero Content --}}
        <div class="relative z-10 text-center max-w-6xl mx-auto px-4 py-20">
            {{-- Logo with Animation --}}
            <div class="mb-8 flex justify-center animate-on-scroll">
                <div class="relative">
                    <div class="absolute inset-0 bg-primary-500 rounded-full filter blur-2xl opacity-20 animate-pulse"></div>
                    <svg class="relative w-40 h-40 text-primary-600 dark:text-primary-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60">
                        <g class="logo-svg-group">
                            <g class="logo-svg-colored fill-current">
                                <path class="logo-svg-outer" stroke-width="2"
                                    d="M 29.855469,0.00126721 A 29.999999,29.999999 0 0 0 1.5914255e-7,30.001266 30,30 0 0 0 60,30.001266 29.999999,29.999999 0 0 0 29.855469,0.00126721 Z m 0.240234,7.41992139 a 22.579908,22.579908 0 0 1 22.484375,22.5800774 22.579908,22.579908 0 0 1 -45.1582024,0 A 22.579908,22.579908 0 0 1 30.095703,7.4211886 Z" />
                                <path class="logo-svg-inner" stroke-width="2"
                                    d="m 29.834961,11.906314 a 18.096309,18.096309 0 0 0 -17.93164,18.095703 18.09668,18.09668 0 0 0 36.193359,0 18.096309,18.096309 0 0 0 -18.261719,-18.095703 z m -0.01367,7.552735 a 10.544895,10.544895 0 0 1 10.724609,10.542968 10.544922,10.544922 0 0 1 -21.089844,0 10.544895,10.544895 0 0 1 10.365235,-10.542968 z" />
                            </g>
                        </g>
                    </svg>
                </div>
            </div>

            {{-- Main Headline --}}
            <h1 class="text-6xl md:text-7xl lg:text-8xl font-bold mb-6 leading-tight animate-on-scroll delay-100">
                <span class="block text-gray-900 dark:text-white">{{ $locale === 'ar' ? 'نبني' : 'We Build' }}</span>
                <span class="block text-gradient-primary">{{ $locale === 'ar' ? 'تجارب ويب استثنائية' : 'Exceptional Web' }}</span>
                <span class="block text-gray-900 dark:text-white">{{ $locale === 'ar' ? '' : 'Experiences' }}</span>
            </h1>

            {{-- Subheadline --}}
            <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto mb-8 animate-on-scroll delay-200">
                Expert Laravel developers with <span class="font-semibold text-primary-600 dark:text-primary-400">6 merged PRs</span> to Laravel framework and <span class="font-semibold text-accent-600 dark:text-accent-400">2,200+ stars</span> on open source projects
            </p>

            {{-- Social Proof Badges --}}
            <div class="flex flex-wrap justify-center gap-6 mb-12 animate-on-scroll delay-300">
                <div class="flex items-center gap-2 px-6 py-3 bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700">
                    <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-semibold text-gray-900 dark:text-white">6 Laravel PRs Merged</span>
                </div>
                <div class="flex items-center gap-2 px-6 py-3 bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700">
                    <svg class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <span class="font-semibold text-gray-900 dark:text-white">2,200+ GitHub Stars</span>
                </div>
                <div class="flex items-center gap-2 px-6 py-3 bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700">
                    <svg class="w-6 h-6 text-primary-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-semibold text-gray-900 dark:text-white">Open Source Leaders</span>
                </div>
            </div>

            {{-- CTA Buttons --}}
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center animate-on-scroll delay-400">
                <a href="{{ $page->baseUrl }}/{{ $locale === 'ar' ? 'ar/' : '' }}portfolio"
                   class="magnetic-button group px-8 py-4 bg-primary-600 hover:bg-primary-700 text-white rounded-2xl font-semibold text-lg shadow-2xl hover:shadow-glow transition-all duration-300 inline-flex items-center"
                   x-data="magneticButton()"
                   @mousemove="handleMouseMove"
                   @mouseleave="handleMouseLeave">
                    View Our Work
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
                <a href="#contact"
                   class="px-8 py-4 bg-white dark:bg-gray-800 text-gray-900 dark:text-white border-2 border-gray-300 dark:border-gray-600 hover:border-primary-500 dark:hover:border-primary-500 rounded-2xl font-semibold text-lg shadow-lg hover:shadow-xl transition-all duration-300 inline-flex items-center">
                    Let's Talk
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </a>
            </div>

            {{-- Language Selector --}}
            <div class="mt-12 flex justify-center gap-4 text-sm animate-on-scroll delay-500">
                <a href="/" class="px-4 py-2 rounded-lg bg-primary-100 text-primary-700 dark:bg-primary-900 dark:text-primary-300 font-semibold">English</a>
                <a href="/ar/" class="px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-400 font-semibold transition-colors">العربية</a>
            </div>
        </div>

        {{-- Scroll Indicator --}}
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 bounce">
            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    {{-- What We Do Section --}}
    <section class="py-24 px-4 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 animate-on-scroll">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                    Why Choose Awssat?
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
                    We don't just write code—we contribute to the tools millions of developers use
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                {{-- Laravel Core Contributor --}}
                <div class="relative group animate-on-scroll" x-data="tiltCard()" @mousemove="handleMouseMove" @mouseleave="handleMouseLeave">
                    <div class="absolute inset-0 bg-gradient-to-br from-primary-500 to-primary-600 rounded-3xl opacity-0 group-hover:opacity-10 transition-opacity"></div>
                    <div class="relative p-8 bg-gray-50 dark:bg-gray-700 rounded-3xl border-2 border-gray-200 dark:border-gray-600 hover:border-primary-500 dark:hover:border-primary-500 transition-all">
                        <div class="w-16 h-16 bg-primary-100 dark:bg-primary-900 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-primary-600 dark:text-primary-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Laravel Core Contributor</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            6 merged PRs to Laravel framework fixing critical bugs in Eloquent, routing, and SQLite. Trusted by the Laravel core team.
                        </p>
                        <a href="{{ $page->baseUrl }}/{{ $locale === 'ar' ? 'ar/' : '' }}portfolio" class="text-primary-600 dark:text-primary-400 font-semibold inline-flex items-center group">
                            See contributions
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Open Source Leaders --}}
                <div class="relative group animate-on-scroll" x-data="tiltCard()" @mousemove="handleMouseMove" @mouseleave="handleMouseLeave">
                    <div class="absolute inset-0 bg-gradient-to-br from-accent-500 to-accent-600 rounded-3xl opacity-0 group-hover:opacity-10 transition-opacity"></div>
                    <div class="relative p-8 bg-gray-50 dark:bg-gray-700 rounded-3xl border-2 border-gray-200 dark:border-gray-600 hover:border-accent-500 dark:hover:border-accent-500 transition-all">
                        <div class="w-16 h-16 bg-accent-100 dark:bg-accent-900 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-accent-600 dark:text-accent-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Open Source Leaders</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            2,200+ GitHub stars across projects like Tailwindo (1.1k★) and Laravel Visits (975★). Used by thousands of developers worldwide.
                        </p>
                        <a href="https://github.com/awssat" target="_blank" class="text-accent-600 dark:text-accent-400 font-semibold inline-flex items-center group">
                            View on GitHub
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Production Ready --}}
                <div class="relative group animate-on-scroll" x-data="tiltCard()" @mousemove="handleMouseMove" @mouseleave="handleMouseLeave">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-500 to-green-600 rounded-3xl opacity-0 group-hover:opacity-10 transition-opacity"></div>
                    <div class="relative p-8 bg-gray-50 dark:bg-gray-700 rounded-3xl border-2 border-gray-200 dark:border-gray-600 hover:border-green-500 dark:hover:border-green-500 transition-all">
                        <div class="w-16 h-16 bg-green-100 dark:bg-green-900 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Battle-Tested Code</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Our code runs in production for thousands of users. We write clean, maintainable, and performant solutions.
                        </p>
                        <span class="text-green-600 dark:text-green-400 font-semibold">Production quality guaranteed</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Featured Projects Showcase --}}
    @if(isset($page->portfolio_en) && $page->portfolio_en->count() > 0)
    <section class="py-24 px-4 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 animate-on-scroll">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                    Our Impact
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-400">
                    Real contributions that power the Laravel ecosystem
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($page->portfolio_en->where('featured', true)->take(6) as $item)
                    <div class="perspective-container animate-on-scroll"
                         x-data="tiltCard()"
                         @mousemove="handleMouseMove"
                         @mouseleave="handleMouseLeave">
                        @include('_layouts.portfolio.partial.card', ['item' => $item])
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-12 animate-on-scroll">
                <a href="{{ $page->baseUrl }}/{{ $locale === 'ar' ? 'ar/' : '' }}portfolio" class="inline-flex items-center px-8 py-4 bg-primary-600 hover:bg-primary-700 text-white rounded-2xl font-semibold text-lg shadow-xl hover:shadow-2xl transition-all">
                    View All Work
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    @endif

    {{-- CTA Section --}}
    <section id="contact" class="py-24 px-4 bg-gradient-to-br from-primary-600 to-primary-800 text-white">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6 animate-on-scroll">
                Ready to Build Something Amazing?
            </h2>
            <p class="text-xl mb-12 opacity-90 animate-on-scroll delay-100">
                Let's discuss your project and see how we can help you succeed
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center animate-on-scroll delay-200">
                <a href="https://github.com/awssat" target="_blank" class="px-8 py-4 bg-white text-primary-600 rounded-2xl font-semibold text-lg shadow-xl hover:shadow-2xl hover:scale-105 transition-all inline-flex items-center justify-center">
                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                    </svg>
                    View GitHub
                </a>
                <a href="/contact" class="px-8 py-4 bg-transparent border-2 border-white text-white rounded-2xl font-semibold text-lg hover:bg-white hover:text-primary-600 transition-all inline-flex items-center justify-center">
                    Get In Touch
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
</div>
