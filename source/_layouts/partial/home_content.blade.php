@php
    $locale = $page->locale ?? 'en';
@endphp

<div class="w-full overflow-hidden bg-gray-50 dark:bg-gray-950 text-gray-800 dark:text-gray-200 transition-theme" x-data="{ scrollY: 0 }" @scroll.window="scrollY = window.scrollY">
    
    {{-- Decorative Background Elements --}}
    <section class="relative min-h-[calc(100vh-5rem)] sm:min-h-screen flex items-center justify-center overflow-x-hidden gradient-mesh -mt-20 pt-20"
             x-data="{ x: 0, y: 0 }"
             @mousemove="x = $event.clientX; y = $event.clientY">

        {{-- Spotlight Effect (Reveals the pattern) --}}
        <div class="absolute inset-0 pointer-events-none z-0 hidden sm:block"
             :style="`background: radial-gradient(circle 800px at ${x}px ${y}px, rgba(139, 92, 246, 0.15), transparent 70%);`">
        </div>

        {{-- Main Hero Logo (Central, Large, Nice Gradient) --}}
        <div class="absolute inset-0 flex items-center justify-center overflow-hidden pointer-events-none select-none z-0">
            <svg class="w-[280px] h-[280px] sm:w-[500px] sm:h-[500px] md:w-[700px] md:h-[700px] lg:w-[900px] lg:h-[900px] opacity-10 dark:opacity-5 animate-float-gentle" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="heroGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color: #8b5cf6" />   {{-- Purple --}}
                        <stop offset="50%" style="stop-color: #3b82f6" />   {{-- Blue --}}
                        <stop offset="100%" style="stop-color: #06b6d4" />  {{-- Cyan --}}
                    </linearGradient>
                    <filter id="glow" x="-20%" y="-20%" width="140%" height="140%">
                        <feGaussianBlur stdDeviation="3" result="coloredBlur"/>
                        <feMerge>
                            <feMergeNode in="coloredBlur"/>
                            <feMergeNode in="SourceGraphic"/>
                        </feMerge>
                    </filter>
                </defs>
                <g filter="url(#glow)">
                    <path d="M29.855 0.001A30 30 0 0 0 0 30.001a30 30 0 0 0 29.855 30 30 30 0 0 0 30.145-30A30 30 0 0 0 29.855 0.001zm0.24 7.42a22.58 22.58 0 0 1 22.485 22.58 22.58 22.58 0 0 1-45.158 0 22.58 22.58 0 0 1 22.673-22.58z" fill="url(#heroGradient)"/>
                    <path d="M29.835 11.906a18.1 18.1 0 0 0-17.932 18.096 18.1 18.1 0 0 0 36.194 0 18.1 18.1 0 0 0-18.262-18.096zm-0.014 7.553a10.54 10.54 0 0 1 10.725 10.543 10.54 10.54 0 0 1-21.09 0 10.54 10.54 0 0 1 10.365-10.543z" fill="url(#heroGradient)"/>
                </g>
            </svg>
        </div>

        {{-- Hero Content --}}
        <div class="relative z-10 text-center w-full max-w-7xl mx-auto px-4 sm:px-6 py-12 sm:py-20 md:py-28">
            {{-- Badge --}}
            <div class="inline-flex items-center gap-1.5 sm:gap-2 px-3 sm:px-4 py-2 rounded-full bg-white/50 dark:bg-gray-900/50 backdrop-blur-xl border border-primary-100 dark:border-primary-900/30 shadow-lg shadow-primary-500/10 mb-5 sm:mb-6 md:mb-8 animate-on-scroll hover:scale-105 transition-transform duration-300 ring-1 ring-white/20">
                <span class="flex h-2 w-2 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                </span>
                <span class="text-xs sm:text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wide">{{ $locale === 'ar' ? 'متاح لمشاريع جديدة' : 'Available for new projects' }}</span>
            </div>

            {{-- Main Headline --}}
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold mb-4 sm:mb-5 md:mb-6 lg:mb-8 leading-tight animate-on-scroll delay-100 tracking-tight text-balance drop-shadow-2xl">
                <span class="block text-gray-900 dark:text-white mb-1 sm:mb-2">{{ $locale === 'ar' ? 'نبني' : 'We Build' }}</span>
                <span class="block text-transparent bg-clip-text bg-gradient-to-r from-primary-600 via-indigo-500 to-accent-500 animate-gradient-x pb-1 md:pb-2 filter brightness-110 mb-1 sm:mb-2">
                    {{ $locale === 'ar' ? 'تجارب ويب استثنائية' : 'Exceptional Web' }}
                </span>
                <span class="block text-gray-900 dark:text-white">{{ $locale === 'ar' ? '' : 'Experiences' }}</span>
            </h1>

            {{-- Subheadline --}}
            <p class="text-sm sm:text-base md:text-lg lg:text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto mb-6 sm:mb-8 md:mb-10 animate-on-scroll delay-200 leading-relaxed text-balance font-medium">
                @if($locale === 'ar')
                    تطوير Laravel بمستوى عالمي. نصنع تطبيقات قوية وقابلة للتطوير مع <span class="font-bold text-primary-600 dark:text-primary-400 border-b-2 border-primary-500/20">6 تحديثات جوهرية</span> في قلب الإطار و <span class="font-bold text-accent-600 dark:text-accent-400 border-b-2 border-accent-500/20">2,200+ نجمة</span> على GitHub.
                @else
                    Elite Laravel engineering. We craft robust, scalable applications with <span class="font-bold text-primary-600 dark:text-primary-400 border-b-2 border-primary-500/20">6 merged PRs</span> to the framework core and <span class="font-bold text-accent-600 dark:text-accent-400 border-b-2 border-accent-500/20">2,200+ stars</span> on GitHub.
                @endif
            </p>

            {{-- CTA Buttons --}}
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 md:gap-6 justify-center items-stretch sm:items-center animate-on-scroll delay-300 max-w-lg mx-auto">
                <a href="{{ $page->localUrl('portfolio') }}"
                   class="group relative px-5 sm:px-6 md:px-7 py-3 sm:py-3.5 md:py-4 bg-gray-900 dark:bg-white text-white dark:text-gray-900 rounded-full font-bold text-sm sm:text-base md:text-lg shadow-2xl hover:shadow-primary-500/30 transition-all duration-300 hover:-translate-y-1 overflow-hidden ring-4 ring-gray-900/5 dark:ring-white/5 text-center whitespace-nowrap">
                    <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:animate-shimmer"></div>
                    <span class="relative flex items-center justify-center gap-2">
                        {{ $locale === 'ar' ? 'شاهد أعمالنا' : 'View Our Work' }}
                        <svg class="w-4 h-4 md:w-5 md:h-5 {{ $locale === 'ar' ? 'group-hover:-translate-x-1' : 'group-hover:translate-x-1' }} transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $locale === 'ar' ? 'M11 17l-5-5m0 0l5-5m-5 5h12' : 'M13 7l5 5m0 0l-5 5m5-5H6' }}"></path>
                        </svg>
                    </span>
                </a>
                <a href="#contact"
                   class="px-5 sm:px-6 md:px-7 py-3 sm:py-3.5 md:py-4 bg-white/50 dark:bg-gray-800/50 backdrop-blur-md text-gray-900 dark:text-white border border-gray-200 dark:border-gray-700 hover:border-primary-500 dark:hover:border-primary-500 rounded-full font-bold text-sm sm:text-base md:text-lg shadow-lg hover:shadow-xl transition-all duration-300 inline-flex items-center justify-center hover:-translate-y-1 text-center whitespace-nowrap">
                    {{ $locale === 'ar' ? 'لنتحدث' : 'Let\'s Talk' }}
                </a>
            </div>

            {{-- Tech Stack Marquee --}}
            <div class="mt-10 sm:mt-14 md:mt-20 w-full overflow-hidden animate-on-scroll delay-500 opacity-60 hover:opacity-100 transition-all duration-500 mask-border-fade -mx-4 sm:mx-0">
                <div class="inline-flex w-max animate-marquee-smooth {{ $locale === 'ar' ? 'flex-row-reverse' : '' }}">
                    <div class="flex gap-6 sm:gap-8 md:gap-12 px-4 sm:px-6 py-2 sm:py-3 text-gray-400 dark:text-gray-500 tracking-wide text-xs sm:text-sm md:text-base whitespace-nowrap">
                        @include('_layouts.partial.tech_stack_items')
                    </div>
                    <div class="flex gap-6 sm:gap-8 md:gap-12 px-4 sm:px-6 py-2 sm:py-3 text-gray-400 dark:text-gray-500 tracking-wide text-xs sm:text-sm md:text-base whitespace-nowrap" aria-hidden="true">
                        @include('_layouts.partial.tech_stack_items')
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Bento Grid Section --}}
    <section class="py-12 sm:py-16 md:py-20 lg:py-24 px-4 sm:px-6 bg-white/50 dark:bg-gray-900/50 backdrop-blur-xl border-t border-gray-200/50 dark:border-gray-800/50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12 md:mb-16 animate-on-scroll">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4 md:mb-6 tracking-tight px-4">
                    {{ $locale === 'ar' ? 'لماذا تختار Awssat؟' : 'Why Choose Awssat?' }}
                </h2>
                <p class="text-base sm:text-lg md:text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto text-balance px-4">
                    {{ $locale === 'ar' ? 'نحن لا نكتب الكود فقط - نساهم في الأدوات التي يستخدمها ملايين المطورين كل يوم.' : 'We don\'t just write code—we contribute to the tools millions of developers use every day.' }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6 auto-rows-auto md:grid-rows-[repeat(2,minmax(300px,auto))]" x-data>
                {{-- Card 1: Large Span --}}
                <div class="md:col-span-2 group relative bg-white dark:bg-gray-900 rounded-3xl p-8 overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-100 dark:border-gray-800 animate-on-scroll"
                     @mousemove="$el.style.setProperty('--x', $event.clientX - $el.getBoundingClientRect().left); $el.style.setProperty('--y', $event.clientY - $el.getBoundingClientRect().top)">
                    <div class="absolute inset-0 bg-gradient-to-br from-primary-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity duration-500"
                         style="background: radial-gradient(600px circle at var(--x)px var(--y)px, rgba(139, 92, 246, 0.1), transparent 40%);"></div>
                    
                    <div class="relative z-10 h-full flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 bg-primary-50 dark:bg-primary-900/20 rounded-2xl flex items-center justify-center mb-6 ring-1 ring-primary-100 dark:ring-primary-800">
                                <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">{{ $locale === 'ar' ? 'مساهم أساسي في Laravel' : 'Laravel Core Contributor' }}</h3>
                            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-md leading-relaxed">
                                {{ $locale === 'ar' ? 'ساهمنا بـ 6 تحديثات جوهرية في قلب إطار عمل Laravel لإصلاح الأخطاء في Eloquent و Routing و SQLite. نفهم الإطار من الداخل لأننا نساعد في بنائه.' : 'We\'ve merged 6 critical PRs to the Laravel framework, fixing bugs in Eloquent, Routing, and SQLite. We understand the framework inside out because we help build it.' }}
                            </p>
                        </div>
                        <div class="flex items-center gap-4 mt-8">
                            <div class="flex -space-x-3">
                                <img class="w-10 h-10 rounded-full border-2 border-white dark:border-gray-900 shadow-md transform hover:scale-110 transition-transform" src="https://github.com/taylorotwell.png" alt="Taylor Otwell">
                                <img class="w-10 h-10 rounded-full border-2 border-white dark:border-gray-900 shadow-md transform hover:scale-110 transition-transform" src="https://github.com/driesvints.png" alt="Dries Vints">
                                <img class="w-10 h-10 rounded-full border-2 border-white dark:border-gray-900 shadow-md transform hover:scale-110 transition-transform" src="https://github.com/awssat.png" alt="Awssat">
                            </div>
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $locale === 'ar' ? 'نتعاون مع الأفضل' : 'Collaborating with the best' }}</span>
                        </div>
                    </div>
                </div>

                {{-- Card 2: Tall --}}
                <div class="md:row-span-2 group relative bg-gray-900 text-white rounded-3xl p-8 overflow-hidden shadow-xl animate-on-scroll delay-100"
                     @mousemove="$el.style.setProperty('--x', $event.clientX - $el.getBoundingClientRect().left); $el.style.setProperty('--y', $event.clientY - $el.getBoundingClientRect().top)">
                    <div class="absolute inset-0 bg-gradient-to-br from-gray-800 to-black"></div>
                    <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(#4f46e5 1px, transparent 1px); background-size: 24px 24px;"></div>
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity duration-500"
                         style="background: radial-gradient(500px circle at var(--x)px var(--y)px, rgba(255, 255, 255, 0.1), transparent 40%);">
                    </div>
                    
                    <div class="relative z-10 h-full flex flex-col">
                        <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center mb-6 backdrop-blur-sm border border-white/10">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-bold mb-4">{{ $locale === 'ar' ? 'مفتوح المصدر' : 'Open Source' }}</h3>
                        <div class="flex items-baseline gap-2 mb-2">
                            <span class="text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-orange-500">2.2k</span>
                            <span class="text-xl text-gray-400">{{ $locale === 'ar' ? 'نجمة' : 'Stars' }}</span>
                        </div>
                        <p class="text-gray-400 mb-8 leading-relaxed">
                            {{ $locale === 'ar' ? 'مبتكرو Tailwindo (1.1k★) و Laravel Visits (975★).' : 'Creators of Tailwindo (1.1k★) and Laravel Visits (975★).' }}
                        </p>
                        
                        <div class="mt-auto space-y-4">
                            <div class="p-4 bg-white/5 rounded-2xl backdrop-blur-sm border border-white/10 hover:bg-white/10 transition-colors cursor-pointer">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="font-bold text-yellow-200">Tailwindo</span>
                                    <span class="text-xs bg-yellow-500/20 text-yellow-300 px-2 py-1 rounded">1.1k ★</span>
                                </div>
                                <p class="text-sm text-gray-400">{{ $locale === 'ar' ? 'تحويل Bootstrap إلى Tailwind CSS فورًا.' : 'Convert Bootstrap to Tailwind CSS instantly.' }}</p>
                            </div>
                            <div class="p-4 bg-white/5 rounded-2xl backdrop-blur-sm border border-white/10 hover:bg-white/10 transition-colors cursor-pointer">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="font-bold text-yellow-200">Laravel Visits</span>
                                    <span class="text-xs bg-yellow-500/20 text-yellow-300 px-2 py-1 rounded">975 ★</span>
                                </div>
                                <p class="text-sm text-gray-400">{{ $locale === 'ar' ? 'عداد زيارات مدعوم بـ Redis لـ Models في Eloquent.' : 'Redis-backed visits counter for Eloquent models.' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card 3: Standard --}}
                <div class="group relative bg-white dark:bg-gray-900 rounded-3xl p-8 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-100 dark:border-gray-800 animate-on-scroll delay-200"
                     @mousemove="$el.style.setProperty('--x', $event.clientX - $el.getBoundingClientRect().left); $el.style.setProperty('--y', $event.clientY - $el.getBoundingClientRect().top)">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity duration-500"
                         style="background: radial-gradient(500px circle at var(--x)px var(--y)px, rgba(34, 197, 94, 0.1), transparent 40%);"></div>
                    
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-green-50 dark:bg-green-900/20 rounded-2xl flex items-center justify-center mb-6 ring-1 ring-green-100 dark:ring-green-800">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">{{ $locale === 'ar' ? 'أداء مثبت تحت الضغط' : 'Battle Tested' }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                            {{ $locale === 'ar' ? 'برمجيات صممت لتتحمل ملايين الطلبات بكفاءة عالية. نضع الأداء وقابلية التوسع في الأولوية منذ اليوم الأول.' : 'Code that handles millions of requests. We prioritize performance and scalability from day one.' }}
                        </p>
                    </div>
                </div>

                {{-- Card 4: Standard --}}
                <div class="group relative bg-white dark:bg-gray-900 rounded-3xl p-8 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-100 dark:border-gray-800 animate-on-scroll delay-300"
                     @mousemove="$el.style.setProperty('--x', $event.clientX - $el.getBoundingClientRect().left); $el.style.setProperty('--y', $event.clientY - $el.getBoundingClientRect().top)">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity duration-500"
                         style="background: radial-gradient(500px circle at var(--x)px var(--y)px, rgba(168, 85, 247, 0.1), transparent 40%);"></div>
                    
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-purple-50 dark:bg-purple-900/20 rounded-2xl flex items-center justify-center mb-6 ring-1 ring-purple-100 dark:ring-purple-800">
                            <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">{{ $locale === 'ar' ? 'تقنيات حديثة' : 'Modern Stack' }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                            {{ $locale === 'ar' ? 'نبقى في طليعة تقنيات TALL stack (Tailwind, Alpine, Laravel, Livewire) و Vue/Inertia.' : 'We stay on the bleeding edge of the TALL stack (Tailwind, Alpine, Laravel, Livewire) and Vue/Inertia.' }}
                        </p>
                    </div>
                </div>

                {{-- Card 5: Security & AI Verification - Full Width --}}
                <div class="md:col-span-3 group relative bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 dark:from-gray-950 dark:via-gray-900 dark:to-gray-950 text-white rounded-3xl p-8 overflow-hidden shadow-xl animate-on-scroll delay-400 border border-gray-700 dark:border-gray-800"
                     @mousemove="$el.style.setProperty('--x', $event.clientX - $el.getBoundingClientRect().left); $el.style.setProperty('--y', $event.clientY - $el.getBoundingClientRect().top)">
                    <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(#22c55e 1px, transparent 1px); background-size: 24px 24px;"></div>
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity duration-500"
                         style="background: radial-gradient(600px circle at var(--x)px var(--y)px, rgba(34, 197, 94, 0.15), transparent 40%);">
                    </div>

                    <div class="relative z-10 grid md:grid-cols-[auto,1fr] gap-8 items-center">
                        <div class="flex items-center justify-center">
                            <div class="w-16 h-16 bg-green-500/10 rounded-2xl flex items-center justify-center backdrop-blur-sm border border-green-500/20 relative">
                                <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                <div class="absolute -top-1 -right-1 w-6 h-6 bg-purple-500/20 rounded-full flex items-center justify-center border border-purple-400/30">
                                    <svg class="w-3 h-3 text-purple-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                {{ $locale === 'ar' ? 'فحص الكود ومراجعة الذكاء الاصطناعي' : 'Code Audits & AI Verification' }}
                            </h3>
                            <p class="text-gray-300 leading-relaxed text-lg mb-4">
                                @if($locale === 'ar')
                                    هل تعتمد على الذكاء الاصطناعي في البرمجة (Vibe-Coding) وتخشى من الثغرات الخفية؟ نحن متخصصون في الفحص العميق للكود. نقوم بمراجعة ما كتبه الـ AI، إصلاح الأخطاء المنطقية، وسد الثغرات الأمنية لضمان أن مشروعك ليس مجرد "فكرة جميلة" بل نظام آمن وجاهز للإطلاق.
                                @else
                                    Complex bugs? Unsure about your AI-generated code? We specialize in deep-dive auditing. We validate "vibe-coded" features, trace hidden logic errors, patch vulnerabilities, and ensure your rapid prototypes are actually production-secure.
                                @endif
                            </p>
                            <div class="flex flex-wrap gap-3">
                                <span class="px-3 py-1 bg-green-500/20 text-green-300 rounded-full text-sm border border-green-500/30">{{ $locale === 'ar' ? 'فحص أمني' : 'Security Audit' }}</span>
                                <span class="px-3 py-1 bg-purple-500/20 text-purple-300 rounded-full text-sm border border-purple-500/30">{{ $locale === 'ar' ? 'مراجعة AI' : 'AI Review' }}</span>
                                <span class="px-3 py-1 bg-blue-500/20 text-blue-300 rounded-full text-sm border border-blue-500/30">{{ $locale === 'ar' ? 'إصلاح الثغرات' : 'Vulnerability Patching' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Extended Capabilities Section --}}
    <section class="py-24 px-4 bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 animate-on-scroll">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
                    {{ $locale === 'ar' ? 'خدماتنا الشاملة' : 'Our Full-Stack Expertise' }}
                </h2>
                <p class="text-lg sm:text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
                    {{ $locale === 'ar' ? 'نتجاوز تطوير الويب لتقديم حلول تقنية متكاملة تغطي كافة احتياجات عملك الرقمي.' : 'Beyond web development. We deliver end-to-end technology solutions that power your digital business.' }}
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 animate-on-scroll">
                {{-- Mobile & Systems Engineering --}}
                <div class="group relative bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-950/20 dark:to-indigo-950/20 rounded-3xl p-8 overflow-hidden border border-blue-100 dark:border-blue-900/30 hover:shadow-2xl transition-all duration-500">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-500/10 rounded-full blur-3xl"></div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-blue-600 dark:bg-blue-500 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-blue-500/30">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">
                            {{ $locale === 'ar' ? 'تطوير تطبيقات الجوال والأنظمة' : 'Mobile & Systems Engineering' }}
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                            @if($locale === 'ar')
                                لا نكتفي بالويب؛ نبني تطبيقات جوال (Mobile Apps) متقنة باستخدام Flutter و Swift. كما نمتلك خبرة عميقة في لغات Rust و Python و Java لبناء أدوات وأنظمة خلفية عالية الأداء.
                            @else
                                Beyond Web. We craft high-performance mobile apps and systems using Flutter, Swift, Rust, and Python.
                            @endif
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 rounded-full text-sm font-medium">Flutter</span>
                            <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 rounded-full text-sm font-medium">Swift</span>
                            <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 rounded-full text-sm font-medium">Rust</span>
                            <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 rounded-full text-sm font-medium">Python</span>
                        </div>
                    </div>
                </div>

                {{-- Backend Architecture & Database --}}
                <div class="group relative bg-gradient-to-br from-emerald-50 to-teal-50 dark:from-emerald-950/20 dark:to-teal-950/20 rounded-3xl p-8 overflow-hidden border border-emerald-100 dark:border-emerald-900/30 hover:shadow-2xl transition-all duration-500">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/10 rounded-full blur-3xl"></div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-emerald-600 dark:bg-emerald-500 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-emerald-500/30">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">
                            {{ $locale === 'ar' ? 'هندسة البيانات والـ APIs' : 'Backend Architecture & Database Optimization' }}
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                            @if($locale === 'ar')
                                نحن خبراء في تصميم معماريات البرمجيات (Software Architecture) المعقدة. نقوم ببناء وتحسين قواعد البيانات (Databases) لتتحمل ضغط العمل الهائل، ونصمم واجهات برمجية (APIs) صلبة تضمن تدفق البيانات بسلاسة واستقرار.
                            @else
                                Scale & Resilience. We architect complex APIs and optimize database schemas to handle massive data pressure without breaking.
                            @endif
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 rounded-full text-sm font-medium">{{ $locale === 'ar' ? 'معماريات' : 'Architecture' }}</span>
                            <span class="px-3 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 rounded-full text-sm font-medium">APIs</span>
                            <span class="px-3 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 rounded-full text-sm font-medium">{{ $locale === 'ar' ? 'قواعد بيانات' : 'Databases' }}</span>
                        </div>
                    </div>
                </div>

                {{-- Data Intelligence & AI --}}
                <div class="group relative bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-950/20 dark:to-pink-950/20 rounded-3xl p-8 overflow-hidden border border-purple-100 dark:border-purple-900/30 hover:shadow-2xl transition-all duration-500">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-purple-500/10 rounded-full blur-3xl"></div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-purple-600 dark:bg-purple-500 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-purple-500/30">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">
                            {{ $locale === 'ar' ? 'تحليل البيانات والذكاء الاصطناعي' : 'Data Intelligence & AI Solutions' }}
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                            @if($locale === 'ar')
                                بياناتك هي ثروتك. نساعدك في تحليل بياناتك الضخمة برمجياً لتحقيق أهداف عملك الاستراتيجية. كما نقوم بدمج حلول الذكاء الاصطناعي (AI) في صلب نظامك وتطبيقاتك لرفع إنتاجية فريقك وتحسين تجربة عميلك.
                            @else
                                Unlock Your Data. We programmatically analyze your business data to achieve strategic goals. We integrate AI into your existing apps to maximize success for your team and customers.
                            @endif
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 rounded-full text-sm font-medium">{{ $locale === 'ar' ? 'تحليلات' : 'Analytics' }}</span>
                            <span class="px-3 py-1 bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 rounded-full text-sm font-medium">AI</span>
                            <span class="px-3 py-1 bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 rounded-full text-sm font-medium">{{ $locale === 'ar' ? 'بيانات ضخمة' : 'Big Data' }}</span>
                        </div>
                    </div>
                </div>

                {{-- Government Compliance --}}
                <div class="group relative bg-gradient-to-br from-amber-50 to-orange-50 dark:from-amber-950/20 dark:to-orange-950/20 rounded-3xl p-8 overflow-hidden border border-amber-100 dark:border-amber-900/30 hover:shadow-2xl transition-all duration-500">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-amber-500/10 rounded-full blur-3xl"></div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-amber-600 dark:bg-amber-500 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-amber-500/30">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">
                            {{ $locale === 'ar' ? 'الامتثال الحكومي والتحول الرقمي' : 'Government Compliance & Digital Transformation' }}
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                            @if($locale === 'ar')
                                نضمن توافق أنظمتكم بالكامل مع <strong>المعايير الأساسية للتحول الرقمي</strong> وتشريعات <strong>هيئة الحكومة الرقمية</strong>. نمتلك الخبرة لبناء وتطوير وإدارة البوابات والتطبيقات الحكومية وشبه الحكومية، مع الالتزام التام بضوابط الأمن السيبراني ولوائح استضافة البيانات المحلية.
                            @else
                                Compliance & Standards. We specialize in upgrading and building platforms that strictly adhere to the Digital Government Authority (DGA) standards and local regulations.
                            @endif
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300 rounded-full text-sm font-medium">{{ $locale === 'ar' ? 'امتثال' : 'Compliance' }}</span>
                            <span class="px-3 py-1 bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300 rounded-full text-sm font-medium">DGA</span>
                            <span class="px-3 py-1 bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300 rounded-full text-sm font-medium">{{ $locale === 'ar' ? 'أمن سيبراني' : 'Cybersecurity' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- How We Work Process Section --}}
    <section class="py-24 px-4 bg-gradient-to-br from-gray-50 via-white to-gray-50 dark:from-gray-950 dark:via-gray-900 dark:to-gray-950 border-y border-gray-200 dark:border-gray-800">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 animate-on-scroll">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
                    {{ $locale === 'ar' ? 'كيف نعمل' : 'How We Work' }}
                </h2>
                <p class="text-lg sm:text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
                    {{ $locale === 'ar' ? 'عملية منظمة ومرنة تضمن نجاح مشروعك من البداية إلى الإطلاق.' : 'A structured yet flexible process that ensures your project succeeds from start to launch.' }}
                </p>
            </div>

            <div class="grid md:grid-cols-4 gap-8 relative">
                {{-- Connecting Line (Desktop Only) --}}
                <div class="hidden md:block absolute top-16 left-0 right-0 h-0.5 bg-gradient-to-r from-primary-200 via-primary-500 to-accent-500 dark:from-primary-900 dark:via-primary-700 dark:to-accent-700" style="width: calc(100% - 8rem); margin-left: 4rem;"></div>

                {{-- Step 1: Discovery --}}
                <div class="relative animate-on-scroll">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-primary-500 to-primary-600 flex items-center justify-center text-white text-2xl font-bold shadow-lg shadow-primary-500/30 relative z-10 mb-6">
                            1
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">
                            {{ $locale === 'ar' ? 'الاستكشاف' : 'Discovery' }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                            {{ $locale === 'ar' ? 'نفهم رؤيتك، أهدافك، وتحدياتك بعمق من خلال جلسات نقاش مفصلة.' : 'We deeply understand your vision, goals, and challenges through detailed discussion sessions.' }}
                        </p>
                    </div>
                </div>

                {{-- Step 2: Design --}}
                <div class="relative animate-on-scroll delay-100">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-indigo-500 to-indigo-600 flex items-center justify-center text-white text-2xl font-bold shadow-lg shadow-indigo-500/30 relative z-10 mb-6">
                            2
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">
                            {{ $locale === 'ar' ? 'التصميم' : 'Design' }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                            {{ $locale === 'ar' ? 'نرسم خارطة طريق تقنية واضحة ونصمم واجهات مستخدم جذابة وسهلة الاستخدام.' : 'We map out a clear technical roadmap and design attractive, user-friendly interfaces.' }}
                        </p>
                    </div>
                </div>

                {{-- Step 3: Build --}}
                <div class="relative animate-on-scroll delay-200">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center text-white text-2xl font-bold shadow-lg shadow-blue-500/30 relative z-10 mb-6">
                            3
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">
                            {{ $locale === 'ar' ? 'البناء' : 'Build' }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                            {{ $locale === 'ar' ? 'نبرمج بدقة عالية مع اختبارات مستمرة لضمان الجودة والأداء الأمثل.' : 'We code with high precision with continuous testing to ensure quality and optimal performance.' }}
                        </p>
                    </div>
                </div>

                {{-- Step 4: Launch & Scale --}}
                <div class="relative animate-on-scroll delay-300">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-accent-500 to-accent-600 flex items-center justify-center text-white text-2xl font-bold shadow-lg shadow-accent-500/30 relative z-10 mb-6">
                            4
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">
                            {{ $locale === 'ar' ? 'الإطلاق والتطوير' : 'Launch & Scale' }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                            {{ $locale === 'ar' ? 'نطلق المشروع بثقة ونبقى معك لتطويره ودعمه على المدى الطويل.' : 'We launch confidently and stay with you for long-term development and support.' }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Additional Info --}}
            <div class="mt-16 text-center animate-on-scroll delay-400">
                <div class="inline-flex items-center gap-2 px-6 py-3 bg-primary-50 dark:bg-primary-900/20 rounded-full border border-primary-200 dark:border-primary-800">
                    <svg class="w-5 h-5 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    <span class="text-primary-700 dark:text-primary-300 font-semibold">
                        {{ $locale === 'ar' ? 'نعمل بمنهجية Agile مع تحديثات أسبوعية' : 'We work Agile with weekly updates' }}
                    </span>
                </div>
            </div>
        </div>
    </section>

    {{-- Featured Projects Showcase --}}
    @if(isset($page->portfolio_en) && $page->portfolio_en->count() > 0)
    <section class="py-24 px-4 bg-gray-50 dark:bg-gray-950">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 animate-on-scroll">
                <div class="max-w-2xl">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
                        {{ $locale === 'ar' ? 'أعمال مختارة' : 'Selected Works' }}
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-400">
                        {{ $locale === 'ar' ? 'مجموعة من المشاريع التي أحدثنا فيها تأثيرًا كبيرًا.' : 'A collection of projects where we\'ve made a significant impact.' }}
                    </p>
                </div>
                <a href="{{ $page->localUrl('portfolio') }}" class="hidden md:inline-flex items-center text-lg font-semibold text-primary-600 dark:text-primary-400 hover:text-primary-700 transition-colors">
                    {{ $locale === 'ar' ? 'عرض جميع المشاريع' : 'View all projects' }}
                    <svg class="w-5 h-5 {{ $locale === 'ar' ? 'mr-2 scale-x-[-1]' : 'ml-2' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
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

            <div class="mt-12 text-center md:hidden">
                <a href="{{ $page->localUrl('portfolio') }}" class="inline-flex items-center text-lg font-semibold text-primary-600 dark:text-primary-400 hover:text-primary-700 transition-colors">
                    {{ $locale === 'ar' ? 'عرض جميع المشاريع' : 'View all projects' }}
                    <svg class="w-5 h-5 {{ $locale === 'ar' ? 'mr-2 scale-x-[-1]' : 'ml-2' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    @endif

    {{-- Trusted By / Social Proof Section --}}
    <section class="py-20 px-4 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12 animate-on-scroll">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    {{ $locale === 'ar' ? 'موثوق به من قبل المطورين حول العالم' : 'Trusted by Developers Worldwide' }}
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400">
                    {{ $locale === 'ar' ? 'أدواتنا مفتوحة المصدر تُستخدم من قبل آلاف المطورين يومياً' : 'Our open-source tools are used by thousands of developers daily' }}
                </p>
            </div>

            {{-- GitHub Stats Grid --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16 animate-on-scroll">
                <div class="text-center p-6 bg-gray-50 dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700">
                    <div class="text-4xl font-bold text-primary-600 dark:text-primary-400 mb-2">2.2k+</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400 font-medium">{{ $locale === 'ar' ? 'نجمة على GitHub' : 'GitHub Stars' }}</div>
                </div>
                <div class="text-center p-6 bg-gray-50 dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700">
                    <div class="text-4xl font-bold text-indigo-600 dark:text-indigo-400 mb-2">6</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400 font-medium">{{ $locale === 'ar' ? 'مساهمة في Laravel' : 'Laravel PRs' }}</div>
                </div>
                <div class="text-center p-6 bg-gray-50 dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700">
                    <div class="text-4xl font-bold text-accent-600 dark:text-accent-400 mb-2">150+</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400 font-medium">{{ $locale === 'ar' ? 'تفريعة' : 'Forks' }}</div>
                </div>
                <div class="text-center p-6 bg-gray-50 dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700">
                    <div class="text-4xl font-bold text-green-600 dark:text-green-400 mb-2">10+</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400 font-medium">{{ $locale === 'ar' ? 'مشاريع نشطة' : 'Active Projects' }}</div>
                </div>
            </div>

            {{-- Tech Stack Badges Marquee --}}
            <div class="animate-on-scroll">
                <p class="text-center text-sm uppercase tracking-wider text-gray-500 dark:text-gray-400 font-semibold mb-8">
                    {{ $locale === 'ar' ? 'التقنيات التي نتقنها' : 'Technologies We Master' }}
                </p>
                <div class="relative overflow-hidden py-4 mask-border-fade">
                    <div class="flex animate-marquee-smooth">
                        <div class="flex gap-8 px-4">
                            <span class="px-6 py-3 bg-white dark:bg-gray-800 rounded-full text-sm font-semibold text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 whitespace-nowrap shadow-sm">Laravel</span>
                            <span class="px-6 py-3 bg-white dark:bg-gray-800 rounded-full text-sm font-semibold text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 whitespace-nowrap shadow-sm">PHP</span>
                            <span class="px-6 py-3 bg-white dark:bg-gray-800 rounded-full text-sm font-semibold text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 whitespace-nowrap shadow-sm">Vue.js</span>
                            <span class="px-6 py-3 bg-white dark:bg-gray-800 rounded-full text-sm font-semibold text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 whitespace-nowrap shadow-sm">Alpine.js</span>
                            <span class="px-6 py-3 bg-white dark:bg-gray-800 rounded-full text-sm font-semibold text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 whitespace-nowrap shadow-sm">Tailwind CSS</span>
                            <span class="px-6 py-3 bg-white dark:bg-gray-800 rounded-full text-sm font-semibold text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 whitespace-nowrap shadow-sm">Livewire</span>
                            <span class="px-6 py-3 bg-white dark:bg-gray-800 rounded-full text-sm font-semibold text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 whitespace-nowrap shadow-sm">Inertia.js</span>
                            <span class="px-6 py-3 bg-white dark:bg-gray-800 rounded-full text-sm font-semibold text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 whitespace-nowrap shadow-sm">MySQL</span>
                            <span class="px-6 py-3 bg-white dark:bg-gray-800 rounded-full text-sm font-semibold text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 whitespace-nowrap shadow-sm">Redis</span>
                            <span class="px-6 py-3 bg-white dark:bg-gray-800 rounded-full text-sm font-semibold text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 whitespace-nowrap shadow-sm">PostgreSQL</span>
                            <span class="px-6 py-3 bg-white dark:bg-gray-800 rounded-full text-sm font-semibold text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 whitespace-nowrap shadow-sm">Docker</span>
                            <span class="px-6 py-3 bg-white dark:bg-gray-800 rounded-full text-sm font-semibold text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 whitespace-nowrap shadow-sm">AWS</span>
                        </div>
                        <div class="flex gap-8 px-4" aria-hidden="true">
                            <span class="px-6 py-3 bg-white dark:bg-gray-800 rounded-full text-sm font-semibold text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 whitespace-nowrap shadow-sm">Laravel</span>
                            <span class="px-6 py-3 bg-white dark:bg-gray-800 rounded-full text-sm font-semibold text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 whitespace-nowrap shadow-sm">PHP</span>
                            <span class="px-6 py-3 bg-white dark:bg-gray-800 rounded-full text-sm font-semibold text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 whitespace-nowrap shadow-sm">Vue.js</span>
                            <span class="px-6 py-3 bg-white dark:bg-gray-800 rounded-full text-sm font-semibold text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 whitespace-nowrap shadow-sm">Alpine.js</span>
                            <span class="px-6 py-3 bg-white dark:bg-gray-800 rounded-full text-sm font-semibold text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 whitespace-nowrap shadow-sm">Tailwind CSS</span>
                            <span class="px-6 py-3 bg-white dark:bg-gray-800 rounded-full text-sm font-semibold text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 whitespace-nowrap shadow-sm">Livewire</span>
                            <span class="px-6 py-3 bg-white dark:bg-gray-800 rounded-full text-sm font-semibold text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 whitespace-nowrap shadow-sm">Inertia.js</span>
                            <span class="px-6 py-3 bg-white dark:bg-gray-800 rounded-full text-sm font-semibold text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 whitespace-nowrap shadow-sm">MySQL</span>
                            <span class="px-6 py-3 bg-white dark:bg-gray-800 rounded-full text-sm font-semibold text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 whitespace-nowrap shadow-sm">Redis</span>
                            <span class="px-6 py-3 bg-white dark:bg-gray-800 rounded-full text-sm font-semibold text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 whitespace-nowrap shadow-sm">PostgreSQL</span>
                            <span class="px-6 py-3 bg-white dark:bg-gray-800 rounded-full text-sm font-semibold text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 whitespace-nowrap shadow-sm">Docker</span>
                            <span class="px-6 py-3 bg-white dark:bg-gray-800 rounded-full text-sm font-semibold text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 whitespace-nowrap shadow-sm">AWS</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Philosophy Section --}}
    <section class="py-24 px-4 bg-gradient-to-br from-gray-50 via-white to-primary-50/30 dark:from-gray-900 dark:via-gray-950 dark:to-primary-900/10 border-y border-gray-200 dark:border-gray-800">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16 animate-on-scroll">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
                    {{ $locale === 'ar' ? 'فلسفتنا في العمل' : 'Our Philosophy' }}
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto text-balance">
                    {{ $locale === 'ar' ? 'نؤمن بالبرمجة الواعية والتطوير المستدام. كل سطر كود نكتبه يعكس التزامنا بالجودة والأداء والأمان.' : 'We believe in conscious coding and sustainable development. Every line of code we write reflects our commitment to quality, performance, and security.' }}
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 mb-12">
                {{-- Philosophy Card 1: Code Quality --}}
                <div class="group relative bg-white dark:bg-gray-900 rounded-3xl p-8 border border-gray-200 dark:border-gray-800 hover:border-primary-300 dark:hover:border-primary-700 transition-all duration-300 hover:shadow-2xl animate-on-scroll">
                    <div class="absolute inset-0 bg-gradient-to-br from-primary-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity rounded-3xl"></div>
                    <div class="relative">
                        <div class="flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-primary-500 to-primary-600 text-white mb-6 group-hover:scale-110 transition-transform shadow-lg">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            {{ $locale === 'ar' ? 'الجودة أولاً' : 'Quality First' }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-4">
                            @if($locale === 'ar')
                                لا نكتفي بـ "يعمل". نسعى للكود النظيف والمختبر والموثق جيدًا. كل PR نرسله لـ Laravel يمر بمعايير صارمة - نطبق نفس المعايير على مشاريعنا.
                            @else
                                We don't settle for "it works". We strive for clean, tested, well-documented code. Every PR we submit to Laravel passes rigorous standards — we apply the same rigor to our projects.
                            @endif
                        </p>
                        <div class="flex items-center gap-2 text-sm text-primary-600 dark:text-primary-400 font-semibold">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $locale === 'ar' ? 'الكود النظيف هو الكود السريع' : 'Clean code is fast code' }}
                        </div>
                    </div>
                </div>

                {{-- Philosophy Card 2: Pragmatism --}}
                <div class="group relative bg-white dark:bg-gray-900 rounded-3xl p-8 border border-gray-200 dark:border-gray-800 hover:border-accent-300 dark:hover:border-accent-700 transition-all duration-300 hover:shadow-2xl animate-on-scroll delay-100">
                    <div class="absolute inset-0 bg-gradient-to-br from-accent-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity rounded-3xl"></div>
                    <div class="relative">
                        <div class="flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-accent-500 to-accent-600 text-white mb-6 group-hover:scale-110 transition-transform shadow-lg">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            {{ $locale === 'ar' ? 'البراغماتية والبساطة' : 'Pragmatism Over Perfection' }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-4">
                            @if($locale === 'ar')
                                نحن ضد الهندسة الزائدة. نبني ما تحتاجه الآن، وليس ما قد تحتاجه "ربما" لاحقًا. كل تجريد له سبب، كل dependency لها قيمة.
                            @else
                                We're against over-engineering. We build what you need now, not what you "might" need later. Every abstraction has a purpose, every dependency has value.
                            @endif
                        </p>
                        <div class="flex items-center gap-2 text-sm text-accent-600 dark:text-accent-400 font-semibold">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $locale === 'ar' ? 'البساطة هي الأساس' : 'Simplicity scales' }}
                        </div>
                    </div>
                </div>

                {{-- Philosophy Card 3: Open Source --}}
                <div class="group relative bg-white dark:bg-gray-900 rounded-3xl p-8 border border-gray-200 dark:border-gray-800 hover:border-purple-300 dark:hover:border-purple-700 transition-all duration-300 hover:shadow-2xl animate-on-scroll delay-200">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity rounded-3xl"></div>
                    <div class="relative">
                        <div class="flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-purple-500 to-purple-600 text-white mb-6 group-hover:scale-110 transition-transform shadow-lg">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            {{ $locale === 'ar' ? 'نعيد للمجتمع' : 'We Give Back' }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-4">
                            @if($locale === 'ar')
                                نحن جزء من مجتمع المصدر المفتوح. 6 تحديثات في قلب Laravel، 2200+ نجمة على GitHub، وعشرات الحزم المستخدمة في آلاف المشاريع. نأخذ، ونعطي.
                            @else
                                We're part of the open source community. 6 core Laravel contributions, 2,200+ GitHub stars, and dozens of packages used in thousands of projects. We take, and we give back.
                            @endif
                        </p>
                        <div class="flex items-center gap-2 text-sm text-purple-600 dark:text-purple-400 font-semibold">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $locale === 'ar' ? 'نرتقي معًا' : 'Rising tides lift all boats' }}
                        </div>
                    </div>
                </div>

                {{-- Philosophy Card 4: Security --}}
                <div class="group relative bg-white dark:bg-gray-900 rounded-3xl p-8 border border-gray-200 dark:border-gray-800 hover:border-red-300 dark:hover:border-red-700 transition-all duration-300 hover:shadow-2xl animate-on-scroll delay-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-red-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity rounded-3xl"></div>
                    <div class="relative">
                        <div class="flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-red-500 to-red-600 text-white mb-6 group-hover:scale-110 transition-transform shadow-lg">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            {{ $locale === 'ar' ? 'الأمان من البداية' : 'Security by Design' }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-4">
                            @if($locale === 'ar')
                                الأمان ليس إضافة لاحقة. نفكر في OWASP Top 10، SQL injection، XSS، CSRF من اليوم الأول. نفحص كود الـ AI، ونراجع الـ dependencies، ونختبر الثغرات.
                            @else
                                Security isn't an afterthought. We think about OWASP Top 10, SQL injection, XSS, CSRF from day one. We audit AI-generated code, review dependencies, and test for vulnerabilities.
                            @endif
                        </p>
                        <div class="flex items-center gap-2 text-sm text-red-600 dark:text-red-400 font-semibold">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $locale === 'ar' ? 'الأمان ليس اختياريًا' : 'Trust is earned, not assumed' }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bottom Quote --}}
            <div class="text-center max-w-3xl mx-auto animate-on-scroll delay-400">
                <blockquote class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-4 italic">
                    "{{ $locale === 'ar' ? 'نحن لا نبني برمجيات فقط. نبني حلولاً تدوم.' : 'We don\'t just build software. We build solutions that last.' }}"
                </blockquote>
                <p class="text-gray-600 dark:text-gray-400">
                    {{ $locale === 'ar' ? '— فريق Awssat' : '— The Awssat Team' }}
                </p>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section id="contact" class="relative py-32 px-4 overflow-hidden border-t border-gray-200 dark:border-gray-800">
        <div class="absolute inset-0 bg-white dark:bg-gray-950"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-primary-900/5 to-purple-900/5"></div>
        
        <div class="relative max-w-4xl mx-auto text-center z-10">
            <h2 class="text-4xl md:text-6xl font-bold text-gray-900 dark:text-white mb-8 animate-on-scroll tracking-tight">
                {{ $locale === 'ar' ? 'هل أنت مستعد لتوسيع رؤيتك؟' : 'Ready to scale your vision?' }}
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-400 mb-12 animate-on-scroll delay-100 max-w-2xl mx-auto text-balance">
                {{ $locale === 'ar' ? 'انضم إلى الشركات التي تثق بنا في بنيتها التحتية وتطبيقاتها الأكثر أهمية.' : 'Join the companies that trust us with their most critical infrastructure and applications.' }}
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center animate-on-scroll delay-200">
                <a href="https://github.com/awssat" target="_blank" class="px-8 py-4 bg-gray-900 dark:bg-white text-white dark:text-gray-950 rounded-2xl font-bold text-lg shadow-xl hover:shadow-2xl hover:scale-105 transition-all inline-flex items-center justify-center">
                    <svg class="w-6 h-6 {{ $locale === 'ar' ? 'ml-2' : 'mr-2' }}" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                    </svg>
                    {{ $locale === 'ar' ? 'عرض ملف GitHub' : 'View GitHub Profile' }}
                </a>
                <a href="{{ $page->localUrl('contact') }}" class="px-8 py-4 bg-transparent border-2 border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white rounded-2xl font-bold text-lg hover:border-gray-300 dark:hover:border-gray-600 transition-all inline-flex items-center justify-center">
                    {{ $locale === 'ar' ? 'تواصل معنا' : 'Get In Touch' }}
                </a>
            </div>
        </div>
    </section>
</div>
