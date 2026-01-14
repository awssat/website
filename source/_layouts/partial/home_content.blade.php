@php
    $locale = $page->locale ?? 'en';
@endphp

<div class="w-full overflow-hidden bg-gray-50 dark:bg-gray-950 transition-colors duration-500">
    {{-- Epic Hero Section --}}
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden gradient-mesh -mt-20 pt-20"
             x-data="{ x: 0, y: 0 }"
             @mousemove="x = $event.clientX; y = $event.clientY">
        
        {{-- Spotlight Effect (Reveals the pattern) --}}
        <div class="absolute inset-0 pointer-events-none z-0" 
             :style="`background: radial-gradient(circle 800px at ${x}px ${y}px, rgba(139, 92, 246, 0.15), transparent 70%);`">
        </div>

        {{-- Main Hero Logo (Central, Large, Nice Gradient) --}}
        <div class="absolute inset-0 flex items-center justify-center overflow-hidden pointer-events-none select-none z-0">
            <svg class="w-[600px] h-[600px] md:w-[900px] md:h-[900px] opacity-10 dark:opacity-5 animate-float-gentle" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
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
        <div class="relative z-10 text-center max-w-7xl mx-auto px-4 py-24 sm:py-32">
            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/50 dark:bg-gray-900/50 backdrop-blur-xl border border-primary-100 dark:border-primary-900/30 shadow-lg shadow-primary-500/10 mb-8 animate-on-scroll hover:scale-105 transition-transform duration-300 ring-1 ring-white/20">
                <span class="flex h-2 w-2 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                </span>
                <span class="text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wide">{{ $locale === 'ar' ? 'متاح لمشاريع جديدة' : 'Available for new projects' }}</span>
            </div>

            {{-- Main Headline --}}
            <h1 class="text-6xl sm:text-7xl lg:text-8xl font-bold mb-8 leading-tight animate-on-scroll delay-100 tracking-tight text-balance drop-shadow-2xl">
                <span class="block text-gray-900 dark:text-white">{{ $locale === 'ar' ? 'نبني' : 'We Build' }}</span>
                <span class="block text-transparent bg-clip-text bg-gradient-to-r from-primary-600 via-indigo-500 to-accent-500 animate-gradient-x pb-2 filter brightness-110">
                    {{ $locale === 'ar' ? 'تجارب ويب استثنائية' : 'Exceptional Web' }}
                </span>
                <span class="block text-gray-900 dark:text-white">{{ $locale === 'ar' ? '' : 'Experiences' }}</span>
            </h1>

            {{-- Subheadline --}}
            <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto mb-12 animate-on-scroll delay-200 leading-relaxed text-balance font-medium">
                @if($locale === 'ar')
                    هندسة Laravel متميزة. نصنع تطبيقات قوية وقابلة للتطوير مع <span class="font-bold text-primary-600 dark:text-primary-400 border-b-2 border-primary-500/20">6 مساهمات مدمجة</span> في الإطار الأساسي و <span class="font-bold text-accent-600 dark:text-accent-400 border-b-2 border-accent-500/20">2,200+ نجمة</span> على GitHub.
                @else
                    Elite Laravel engineering. We craft robust, scalable applications with <span class="font-bold text-primary-600 dark:text-primary-400 border-b-2 border-primary-500/20">6 merged PRs</span> to the framework core and <span class="font-bold text-accent-600 dark:text-accent-400 border-b-2 border-accent-500/20">2,200+ stars</span> on GitHub.
                @endif
            </p>

            {{-- CTA Buttons --}}
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center animate-on-scroll delay-300">
                <a href="{{ $page->baseUrl }}/{{ $locale === 'ar' ? 'ar/' : '' }}portfolio"
                   class="group relative px-8 py-4 bg-gray-900 dark:bg-white text-white dark:text-gray-900 rounded-full font-bold text-lg shadow-2xl hover:shadow-primary-500/30 transition-all duration-300 hover:-translate-y-1 overflow-hidden ring-4 ring-gray-900/5 dark:ring-white/5">
                    <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:animate-shimmer"></div>
                    <span class="relative flex items-center">
                        {{ $locale === 'ar' ? 'شاهد أعمالنا' : 'View Our Work' }}
                        <svg class="w-5 h-5 {{ $locale === 'ar' ? 'mr-2 group-hover:-translate-x-1' : 'ml-2 group-hover:translate-x-1' }} transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $locale === 'ar' ? 'M11 17l-5-5m0 0l5-5m-5 5h12' : 'M13 7l5 5m0 0l-5 5m5-5H6' }}"></path>
                        </svg>
                    </span>
                </a>
                <a href="#contact"
                   class="px-8 py-4 bg-white/50 dark:bg-gray-800/50 backdrop-blur-md text-gray-900 dark:text-white border border-gray-200 dark:border-gray-700 hover:border-primary-500 dark:hover:border-primary-500 rounded-full font-bold text-lg shadow-lg hover:shadow-xl transition-all duration-300 inline-flex items-center hover:-translate-y-1">
                    {{ $locale === 'ar' ? 'لنتحدث' : 'Let\'s Talk' }}
                </a>
            </div>

            {{-- Tech Stack Marquee --}}
            <div class="mt-24 w-full overflow-hidden animate-on-scroll delay-500 opacity-60 hover:opacity-100 transition-all duration-500 mask-border-fade">
                <div class="inline-flex w-max animate-marquee-smooth {{ $locale === 'ar' ? 'flex-row-reverse' : '' }}">
                    <div class="flex gap-16 px-8 py-4 text-gray-400 dark:text-gray-500 tracking-wide">
                        @include('_layouts.partial.tech_stack_items')
                    </div>
                    <div class="flex gap-16 px-8 py-4 text-gray-400 dark:text-gray-500 tracking-wide" aria-hidden="true">
                        @include('_layouts.partial.tech_stack_items')
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Bento Grid Section --}}
    <section class="py-24 px-4 bg-white/50 dark:bg-gray-900/50 backdrop-blur-xl border-t border-gray-200/50 dark:border-gray-800/50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 animate-on-scroll">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
                    {{ $locale === 'ar' ? 'لماذا تختار Awssat؟' : 'Why Choose Awssat?' }}
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto text-balance">
                    {{ $locale === 'ar' ? 'نحن لا نكتب الكود فقط - نساهم في الأدوات التي يستخدمها ملايين المطورين كل يوم.' : 'We don\'t just write code—we contribute to the tools millions of developers use every day.' }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 auto-rows-[300px]" x-data>
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
                                {{ $locale === 'ar' ? 'قمنا بدمج 6 طلبات سحب مهمة في إطار Laravel، لإصلاح الأخطاء في Eloquent و Routing و SQLite. نفهم الإطار من الداخل لأننا نساعد في بنائه.' : 'We\'ve merged 6 critical PRs to the Laravel framework, fixing bugs in Eloquent, Routing, and SQLite. We understand the framework inside out because we help build it.' }}
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
                                <p class="text-sm text-gray-400">{{ $locale === 'ar' ? 'عداد زيارات مدعوم بـ Redis لنماذج Eloquent.' : 'Redis-backed visits counter for Eloquent models.' }}</p>
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
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">{{ $locale === 'ar' ? 'مُختبر عمليًا' : 'Battle Tested' }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                            {{ $locale === 'ar' ? 'كود يتعامل مع ملايين الطلبات. نضع الأداء وقابلية التوسع في الأولوية منذ اليوم الأول.' : 'Code that handles millions of requests. We prioritize performance and scalability from day one.' }}
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
                <a href="{{ $page->baseUrl }}/{{ $locale === 'ar' ? 'ar/' : '' }}portfolio" class="hidden md:inline-flex items-center text-lg font-semibold text-primary-600 dark:text-primary-400 hover:text-primary-700 transition-colors">
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
                <a href="{{ $page->baseUrl }}/{{ $locale === 'ar' ? 'ar/' : '' }}portfolio" class="inline-flex items-center text-lg font-semibold text-primary-600 dark:text-primary-400 hover:text-primary-700 transition-colors">
                    {{ $locale === 'ar' ? 'عرض جميع المشاريع' : 'View all projects' }}
                    <svg class="w-5 h-5 {{ $locale === 'ar' ? 'mr-2 scale-x-[-1]' : 'ml-2' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    @endif

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
                <a href="/contact" class="px-8 py-4 bg-transparent border-2 border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white rounded-2xl font-bold text-lg hover:border-gray-300 dark:hover:border-gray-600 transition-all inline-flex items-center justify-center">
                    {{ $locale === 'ar' ? 'تواصل معنا' : 'Get In Touch' }}
                </a>
            </div>
        </div>
    </section>
</div>
