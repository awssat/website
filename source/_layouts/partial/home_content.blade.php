@php
    $locale = $page->locale ?? 'en';
@endphp

<div class="w-full overflow-hidden bg-gray-50 dark:bg-gray-950 text-gray-800 dark:text-gray-200 transition-theme">
{{-- Epic Hero Section --}}
<section class="relative min-h-[calc(100vh-5rem)] sm:min-h-screen flex items-center justify-center overflow-x-hidden gradient-mesh overflow-hidden pt-20">




    <!--{{-- Interactive Grid Background --}}
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdHRlcm4gaWQ9ImEiIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTTAgNDBoNDBWMEgwIiBmaWxsPSJub25lIi8+PHBhdGggZD0iTTAgNDBoMVYwaC0xeiIgZmlsbD0icmdiYSgwLDAsMCwwLjAzKSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNhKSIvPjwvc3ZnPg==')] dark:bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdHRlcm4gaWQ9ImEiIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTTAgNDBoNDBWMEgwIiBmaWxsPSJub25lIi8+PHBhdGggZD0iTTAgNDBoMVYwaC0xeiIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjAzKSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNhKSIvPjwvc3ZnPg==')] opacity-[0.4] z-0"></div>-->



    {{-- Dynamic Background --}}
    <div class="absolute inset-0 z-0">
        {{-- Base Gradient --}}
        <div class="absolute inset-0 bg-gray-50 dark:bg-[#030712]"></div>

        {{-- Animated Orbs --}}
        <div class="absolute top-[-20%] left-[-10%] w-[500px] h-[500px] rounded-full bg-purple-500/20 blur-[60px] mix-blend-multiply dark:mix-blend-screen animate-blob motion-reduce:animate-none motion-reduce:opacity-30"></div>
        <div class="absolute top-[-10%] right-[-10%] w-[500px] h-[500px] rounded-full bg-cyan-500/20 blur-[60px] mix-blend-multiply dark:mix-blend-screen animate-blob animation-delay-2000 motion-reduce:animate-none motion-reduce:opacity-30"></div>


        <div class="absolute inset-0" style="background-image: radial-gradient(rgba(120, 119, 198, 0.3) 1px, transparent 1px); background-size: 40px 40px; opacity: 0.1;"></div>
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
                <filter id="glow" x="-10%" y="-10%" width="120%" height="120%">
                    <feGaussianBlur stdDeviation="1.5" result="coloredBlur"/>
                    <feMerge>
                        <feMergeNode in="coloredBlur"/>
                        <feMergeNode in="SourceGraphic"/>
                    </feMerge>
                </filter>
            </defs>
            <g filter="url(#glow)" style="will-change: auto;">
                <path d="M29.855 0.001A30 30 0 0 0 0 30.001a30 30 0 0 0 29.855 30 30 30 0 0 0 30.145-30A30 30 0 0 0 29.855 0.001zm0.24 7.42a22.58 22.58 0 0 1 22.485 22.58 22.58 22.58 0 0 1-45.158 0 22.58 22.58 0 0 1 22.673-22.58z" fill="url(#heroGradient)"/>
                <path d="M29.835 11.906a18.1 18.1 0 0 0-17.932 18.096 18.1 18.1 0 0 0 36.194 0 18.1 18.1 0 0 0-18.262-18.096zm-0.014 7.553a10.54 10.54 0 0 1 10.725 10.543 10.54 10.54 0 0 1-21.09 0 10.54 10.54 0 0 1 10.365-10.543z" fill="url(#heroGradient)"/>
            </g>
        </svg>
    </div>

    <!--{{-- Spotlight Effect --}}
    <div class="absolute inset-0 z-0 pointer-events-none transition-opacity duration-500"
         :style="`background: radial-gradient(600px circle at ${mouseX}px ${mouseY}px, rgba(139, 92, 246, 0.1), transparent 40%); opacity: 0.8;`">
    </div>-->

    {{-- Hero Content --}}
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 flex flex-col items-center text-center">


            {{-- Animated Badge --}}
            <div class="inline-flex items-center gap-2 px-4 py-2 mb-8 rounded-full bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border border-gray-200 dark:border-gray-800 shadow-sm hover:shadow-md transition-all duration-300 animate-fade-in-up">
                <span class="relative flex w-2.5 h-2.5">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-green-500"></span>
                </span>
                <span class="text-sm font-medium bg-clip-text text-transparent bg-gradient-to-r from-gray-900 to-gray-600 dark:from-white dark:to-gray-400">
                    {{ $locale === 'ar' ? 'متاح لمشاريع جديدة' : 'Available for new projects' }}
                </span>
            </div>

            {{-- Hero Title --}}
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-black tracking-tight mb-6 animate-fade-in-up delay-100 drop-shadow-sm">
                <span class="block text-gray-900 dark:text-white mb-2">{{ $locale === 'ar' ? 'نبني' : 'We Build' }}</span>
                <span class="block text-transparent bg-clip-text bg-gradient-to-r from-primary-600 via-purple-600 to-accent-500 animate-gradient-x pb-4">
                    {{ $locale === 'ar' ? 'تجارب ويب استثنائية' : 'Exceptional Web' }}
                </span>
                <span class="block text-gray-900 dark:text-white">{{ $locale === 'ar' ? '' : 'Experiences' }}</span>
            </h1>

            {{-- Hero Description --}}
            <p class="max-w-2xl mx-auto text-lg md:text-xl text-gray-600 dark:text-gray-400 leading-relaxed mb-10 animate-fade-in-up delay-200 text-balance">
                @if($locale === 'ar')
                    تطوير Laravel بمستوى عالمي. نصنع تطبيقات قوية وقابلة للتطوير مع <span class="font-bold text-primary-600 dark:text-primary-400 border-b-2 border-primary-500/20 hover:border-primary-500 transition-colors">6 تحديثات جوهرية</span> في قلب الإطار و <span class="font-bold text-accent-600 dark:text-accent-400 border-b-2 border-accent-500/20 hover:border-accent-500 transition-colors">2,200+ نجمة</span> على GitHub.
                @else
                    Elite Laravel engineering. We craft robust, scalable applications with <span class="font-bold text-primary-600 dark:text-primary-400 border-b-2 border-primary-500/20 hover:border-primary-500 transition-colors">6 merged PRs</span> to the framework core and <span class="font-bold text-accent-600 dark:text-accent-400 border-b-2 border-accent-500/20 hover:border-accent-500 transition-colors">2,200+ stars</span> on GitHub.
                @endif
            </p>

            {{-- CTA Buttons --}}
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-fade-in-up delay-300">
                <a href="{{ $page->localUrl('portfolio') }}" class="group relative px-8 py-4 bg-gray-900 dark:bg-white text-white dark:text-gray-900 rounded-full font-bold text-lg shadow-xl shadow-primary-500/20 hover:shadow-primary-500/40 hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                    <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:animate-shimmer"></div>
                    <span class="relative flex items-center gap-2">
                        {{ $locale === 'ar' ? 'شاهد أعمالنا' : 'View Our Work' }}
                        <svg class="w-5 h-5 transition-transform group-hover:translate-x-1 {{ $locale === 'ar' ? 'rotate-180 group-hover:-translate-x-1' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </span>
                </a>
                <a href="#contact" class="group px-8 py-4 bg-white dark:bg-gray-800 text-gray-900 dark:text-white border border-gray-200 dark:border-gray-700 rounded-full font-bold text-lg shadow-lg hover:shadow-xl hover:border-primary-500 dark:hover:border-primary-500 hover:-translate-y-1 transition-all duration-300">
                    <span class="flex items-center gap-2">
                        {{ $locale === 'ar' ? 'لنتحدث' : 'Let\'s Talk' }}
                        <span class="text-xl group-hover:rotate-12 transition-transform">👋</span>
                    </span>
                </a>
            </div>

            {{-- Tech Stack Marquee --}}
            <div class="mt-24 w-full overflow-hidden opacity-60 hover:opacity-100 transition-opacity duration-500 mask-border-fade">
                <div class="inline-flex w-max animate-marquee-smooth hover:[animation-play-state:paused] {{ $locale === 'ar' ? 'flex-row-reverse' : '' }}">
                    <div class="flex gap-12 px-6">
                         @include('_layouts.partial.tech_stack_items')
                    </div>
                    <div class="flex gap-12 px-6" aria-hidden="true">
                         @include('_layouts.partial.tech_stack_items')
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- The Authority Grid (Story-driven Bento) --}}
    <section class="py-32 px-4 relative z-10 bg-white/60 dark:bg-gray-900/60 backdrop-blur-xl border-t border-gray-200/50 dark:border-gray-800/50">
        <div class="container mx-auto max-w-7xl">
            <div class="text-center mb-24 animate-on-scroll">
                <h2 class="text-4xl md:text-6xl font-black mb-6 tracking-tight bg-clip-text text-transparent bg-gradient-to-b from-gray-900 to-gray-600 dark:from-white dark:to-gray-400">
                    {{ $locale === 'ar' ? 'نحن لا نستخدم الأدوات فقط.' : 'We don\'t just use the tools.' }}<br>
                    <span class="text-primary-600 dark:text-primary-400">{{ $locale === 'ar' ? 'نحن نبنيها.' : 'We build them.' }}</span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto text-balance">
                    {{ $locale === 'ar' ? 'خبرة تقنية عميقة في قلب المصدر المفتوح.' : 'Deep technical expertise right at the open-source core.' }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 auto-rows-[minmax(300px,auto)]">

                {{-- Card 1: Laravel Core (Impact) --}}
                <div class="md:col-span-2 group relative bg-gray-50 dark:bg-gray-800 rounded-[2rem] p-8 md:p-12 overflow-hidden border border-gray-200 dark:border-gray-700 transition-all duration-500 hover:shadow-2xl hover:border-primary-500/30 animate-on-scroll" data-animation="slide-right">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-primary-500/10 rounded-full blur-[80px] -mr-16 -mt-16 transition-all group-hover:bg-primary-500/20"></div>

                    <div class="relative z-10 h-full flex flex-col justify-between">
                        <div>
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-12 h-12 bg-white dark:bg-gray-700 rounded-xl flex items-center justify-center shadow-sm">
                                    <svg class="w-6 h-6 text-[#F05340]" viewBox="0 0 24 24"><path d="M12 2L2.5 5.5L4.5 16.5L12 22L19.5 16.5L21.5 5.5L12 2Z"></svg>
                                </div>
                                <span class="px-3 py-1 rounded-full bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-300 text-xs font-bold uppercase tracking-wider">
                                    {{ $locale === 'ar' ? 'مساهم رسمي' : 'Official Contributor' }}
                                </span>
                            </div>

                            <h3 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4 leading-tight">
                                {{ $locale === 'ar' ? 'تأثير مباشر في نواة Laravel' : 'Direct Impact on Laravel Core' }}
                            </h3>
                            <p class="text-lg text-gray-600 dark:text-gray-400 leading-relaxed max-w-lg">
                                {{ $locale === 'ar' ? 'عندما واجهنا حدود الإطار، لم نلتف حولها. قمنا بحلها، وأرسلنا الحل للجميع. 6 تحديثات في قلب الإطار يستخدمها الملايين.' : 'When we hit the framework\'s limits, we didn\'t work around them. We fixed them, and shipped the code to everyone. 6 core PRs used by millions.' }}
                            </p>
                        </div>

                        {{-- Micro-interaction: PR Merged --}}
                        <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700 flex items-center gap-4">
                            <div class="flex -space-x-3">
                                <img class="w-10 h-10 rounded-full border-2 border-white dark:border-gray-800" src="https://github.com/taylorotwell.png" alt="Taylor Otwell">
                                <img class="w-10 h-10 rounded-full border-2 border-white dark:border-gray-800" src="https://github.com/awssat.png" alt="Awssat">
                            </div>
                            <div class="flex items-center text-sm font-mono text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20 px-3 py-1.5 rounded-md">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                PR Merged
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card 2: Open Source (Stats) --}}
                <div class="group relative bg-gray-900 text-white rounded-[2rem] p-8 md:p-12 overflow-hidden shadow-2xl flex flex-col justify-between animate-on-scroll delay-100" data-animation="scale">
                    <div class="absolute inset-0 bg-gradient-to-br from-gray-800 to-black"></div>
                    <div class="absolute inset-0 opacity-20 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4zKSIvPjwvc3ZnPg==')]"></div>

                    <div class="relative z-10">
                        <h3 class="text-xl font-bold text-gray-400 mb-2 uppercase tracking-widest">{{ $locale === 'ar' ? 'المجتمع' : 'Community' }}</h3>
                        <div class="flex items-baseline gap-2 mb-8">
                            <span class="text-6xl md:text-7xl font-black text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-500">2.2k</span>
                            <span class="text-xl text-gray-400 font-bold">★</span>
                        </div>
                        <p class="text-gray-400 text-sm leading-relaxed mb-8">
                            {{ $locale === 'ar' ? 'أدواتنا (Tailwindo, Laravel Visits) تشغل آلاف المشاريع حول العالم.' : 'Our tools (Tailwindo, Laravel Visits) power thousands of projects globally.' }}
                        </p>
                    </div>

                    <div class="relative z-10 grid grid-cols-2 gap-4">
                        <div class="p-3 bg-white/5 rounded-xl border border-white/10 text-center">
                            <div class="text-xs text-gray-400 mb-1">Downloads</div>
                            <div class="font-bold font-mono">500k+</div>
                        </div>
                        <div class="p-3 bg-white/5 rounded-xl border border-white/10 text-center">
                            <div class="text-xs text-gray-400 mb-1">Forks</div>
                            <div class="font-bold font-mono">150+</div>
                        </div>
                    </div>
                </div>

                {{-- Card 3: AI Code Cleanup (Full Width Feature) --}}
                <div class="md:col-span-3 group relative bg-black rounded-[2rem] p-8 md:p-12 overflow-hidden border border-gray-800 animate-on-scroll delay-200" data-animation="fade">
                    {{-- Background: Chaos to Order Gradient --}}
                    <div class="absolute inset-0 bg-gradient-to-r from-red-900/10 via-gray-900 to-emerald-900/10"></div>

                    {{-- Background Pattern: Tiny Dots --}}
                    <div class="absolute inset-0 opacity-20 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4zKSIvPjwvc3ZnPg==')] [mask-image:linear-gradient(to_right,rgba(0,0,0,0.8),transparent)]"></div>

                    <div class="relative z-10 flex flex-col md:flex-row items-center gap-10">
                        <div class="flex-1 order-2 md:order-1">
                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-purple-500/10 text-purple-400 text-xs font-bold uppercase tracking-wider mb-6 border border-purple-500/20">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                                {{ $locale === 'ar' ? 'نظافة برمجية' : 'Code Hygiene' }}
                            </div>
                            <h3 class="text-3xl md:text-4xl font-bold text-white mb-4">
                                {{ $locale === 'ar' ? 'تصحيح وتنظيف كود الذكاء الاصطناعي' : 'AI Code Cleanup & Verification' }}
                            </h3>
                            <p class="text-lg text-gray-400 leading-relaxed max-w-2xl text-balance">
                                {{ $locale === 'ar' ? 'الاعتماد على "Vibe Coding" سريع، لكنه ينتج كوداً مليئاً بالثغرات والأخطاء المنطقية. نحن نتدخل لتنظيف الفوضى: نصلح الكود السيء (Garbage Code)، نسد الثغرات الأمنية، ونحول مخرجات الـ AI الهشة إلى نظام هندسي متين.' : 'Vibe coding is fast, but often produces "garbage code" with hidden security holes and bad logic. We step in to clean the mess: auditing your AI-generated codebase, fixing code smells, and turning fragile prototypes into production-grade systems.' }}
                            </p>
                        </div>

                        {{-- Visual: Chaos to Order (Code Lines Edition) --}}
                        <div class="w-full md:w-auto flex-shrink-0 relative order-1 md:order-2">
                            <div class="relative w-72 h-56 bg-gray-950 rounded-xl border border-gray-800 shadow-2xl flex overflow-hidden">
                                {{-- Code Container --}}
                                <div class="absolute inset-0 p-6 flex gap-4">
                                    {{-- Line Numbers --}}
                                    <div class="flex flex-col gap-2 pt-1 text-[10px] text-gray-700 font-mono text-right select-none">
                                        <div>01</div><div>02</div><div>03</div><div>04</div><div>05</div><div>06</div><div>07</div><div>08</div>
                                    </div>

                                    {{-- Code Lines --}}
                                    <div class="flex-1 flex flex-col gap-2 pt-1.5 relative">
                                        {{-- Bad Code (Left Side) --}}
                                        <div class="absolute inset-0 flex flex-col gap-2 transition-opacity duration-300">
                                            {{-- Line 1 --}}
                                            <div class="flex gap-2 items-center">
                                                <div class="h-1.5 w-8 bg-red-500/50 rounded-full"></div>
                                                <div class="h-1.5 w-12 bg-gray-600 rounded-full"></div>
                                            </div>
                                            {{-- Line 2 (Erratic Indent) --}}
                                            <div class="flex gap-2 items-center ml-8">
                                                <div class="h-1.5 w-16 bg-orange-500/50 rounded-full"></div>
                                            </div>
                                            {{-- Line 3 (Error) --}}
                                            <div class="flex gap-2 items-center ml-2">
                                                <div class="h-1.5 w-6 bg-red-500 rounded-full animate-pulse"></div>
                                                <div class="h-1.5 w-10 bg-gray-600 rounded-full"></div>
                                            </div>
                                            {{-- Line 4 --}}
                                            <div class="flex gap-2 items-center ml-4">
                                                <div class="h-1.5 w-20 bg-gray-600 rounded-full"></div>
                                            </div>
                                            {{-- Line 5 (Messy) --}}
                                            <div class="flex gap-2 items-center">
                                                <div class="h-1.5 w-12 bg-orange-500/50 rounded-full"></div>
                                                <div class="h-1.5 w-4 bg-red-500/50 rounded-full"></div>
                                            </div>
                                        </div>

                                        {{-- The Scanner Beam --}}
                                        <div class="absolute inset-y-0 w-1 bg-purple-500 shadow-[0_0_20px_rgba(168,85,247,0.8)] z-20 animate-[scan_3s_ease-in-out_infinite]"></div>

                                        {{-- Clean Code (Right Side - Revealed by Scanner) --}}
                                        <div class="absolute inset-0 flex flex-col gap-2 overflow-hidden animate-[reveal_3s_ease-in-out_infinite]">
                                            {{-- Line 1 --}}
                                            <div class="flex gap-2 items-center">
                                                <div class="h-1.5 w-8 bg-purple-400 rounded-full"></div>
                                                <div class="h-1.5 w-12 bg-white/50 rounded-full"></div>
                                            </div>
                                            {{-- Line 2 (Perfect Indent) --}}
                                            <div class="flex gap-2 items-center ml-4">
                                                <div class="h-1.5 w-16 bg-blue-400 rounded-full"></div>
                                            </div>
                                            {{-- Line 3 --}}
                                            <div class="flex gap-2 items-center ml-4">
                                                <div class="h-1.5 w-6 bg-emerald-400 rounded-full"></div>
                                                <div class="h-1.5 w-10 bg-white/50 rounded-full"></div>
                                            </div>
                                            {{-- Line 4 --}}
                                            <div class="flex gap-2 items-center ml-4">
                                                <div class="h-1.5 w-20 bg-white/30 rounded-full"></div>
                                            </div>
                                            {{-- Line 5 --}}
                                            <div class="flex gap-2 items-center">
                                                <div class="h-1.5 w-12 bg-purple-400 rounded-full"></div>
                                                <div class="h-1.5 w-4 bg-white/50 rounded-full"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <style>
                                    @keyframes scan {
                                        0%, 100% { left: 0%; opacity: 0; }
                                        10% { opacity: 1; }
                                        90% { opacity: 1; }
                                        100% { left: 100%; opacity: 0; }
                                    }
                                    @keyframes reveal {
                                        0%, 100% { clip-path: inset(0 100% 0 0); }
                                        100% { clip-path: inset(0 0 0 0); }
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

        {{-- Services: Alternating Feature Sections --}}

        <section class="py-32 px-4 bg-gray-50 dark:bg-gray-950 border-t border-gray-200 dark:border-gray-800">

            <div class="container mx-auto max-w-7xl space-y-32">



                {{-- Service 1: Mobile --}}

                <div class="flex flex-col md:flex-row items-center gap-12 md:gap-20 group animate-on-scroll">

                    <div class="w-full md:w-1/2 order-2 md:order-1">

                        <div class="relative rounded-[2.5rem] overflow-hidden shadow-2xl border border-gray-100 dark:border-gray-800 bg-gray-50 dark:bg-gray-900 aspect-[4/3] group-hover:scale-[1.02] transition-transform duration-500 flex items-center justify-center">

                            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-blue-500/5 via-transparent to-transparent"></div>



                                                    {{-- CSS Phone Mockup --}}



                                                    <div class="relative w-52 h-[90%] bg-gray-900 rounded-[2.5rem] border-[4px] border-gray-800 shadow-2xl transform rotate-[-6deg] group-hover:rotate-0 transition-all duration-700 ease-out z-10 ring-1 ring-white/10">



                                                        {{-- Buttons --}}



                                                        <div class="absolute top-24 -left-[6px] w-1 h-8 bg-gray-700 rounded-l-md shadow-inner"></div>



                                                        <div class="absolute top-36 -left-[6px] w-1 h-8 bg-gray-700 rounded-l-md shadow-inner"></div>



                                                        <div class="absolute top-28 -right-[6px] w-1 h-12 bg-gray-700 rounded-r-md shadow-inner"></div>







                                                        {{-- Notch --}}



                                                        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-20 h-6 bg-black rounded-b-2xl z-20 flex justify-center items-center">



                                                            <div class="w-12 h-1 bg-gray-800 rounded-full"></div>



                                                        </div>







                                                        {{-- Screen --}}

                                                        {{-- Screen --}}



                                                        <div class="absolute inset-1 bg-gray-900 rounded-[2rem] overflow-hidden border border-gray-800 flex flex-col overflow-hidden">



                                                            {{-- Status Bar --}}



                                                            <div class="flex-none flex justify-between items-center px-5 pt-2 text-[8px] font-mono text-gray-400">


                                                            {{-- Status Bar --}}


                                                                <span>9:41</span>



                                                                <div class="flex gap-1">



                                                                    <div class="w-2.5 h-1.5 bg-gray-600 rounded-sm"></div>



                                                                    <div class="w-2.5 h-1.5 bg-gray-600 rounded-sm"></div>



                                                                    <div class="w-3 h-1.5 bg-white rounded-sm"></div>



                                                                </div>



                                                            </div>







                                                            {{-- App Content: Analytics Dashboard --}}


                                                            <div class="flex-1 overflow-hidden p-4 pt-6 space-y-4">



                                                                {{-- Header --}}



                                                                <div class="flex justify-between items-center">



                                                                    <div class="flex items-center gap-2">



                                                                        <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-blue-500 to-cyan-400 p-0.5">



                                                                            <div class="w-full h-full bg-gray-900 rounded-full flex items-center justify-center text-[10px] font-bold text-white">AW</div>



                                                                        </div>



                                                                        <div class="space-y-0.5">



                                                                            <div class="w-16 h-2 bg-gray-700 rounded-full"></div>



                                                                            <div class="w-10 h-1.5 bg-gray-800 rounded-full"></div>



                                                                        </div>



                                                                    </div>



                                                                    <div class="w-8 h-8 rounded-full bg-gray-800 border border-gray-700 flex items-center justify-center hover:bg-gray-700 transition-colors">



                                                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>



                                                                    </div>



                                                                </div>







                                                                {{-- Main Card --}}



                                                                <div class="p-4 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-700 text-white shadow-lg shadow-blue-500/20 relative overflow-hidden group/card">



                                                                    <div class="absolute inset-0 bg-white/5 opacity-0 group-hover/card:opacity-100 transition-opacity"></div>



                                                                    <div class="flex justify-between items-start mb-4 relative z-10">



                                                                        <div class="space-y-1">



                                                                            <div class="text-[10px] text-blue-200">Total Visits</div>



                                                                            <div class="text-xl font-bold">2.4M</div>



                                                                        </div>



                                                                        <div class="text-[10px] bg-white/20 px-2 py-0.5 rounded-full flex items-center gap-1">



                                                                            <svg class="w-2 h-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>



                                                                            +12%



                                                                        </div>



                                                                    </div>



                                                                    {{-- Graph Line --}}



                                                                    <div class="h-8 w-full flex items-end justify-between gap-1">



                                                                        <div class="w-full bg-white/20 rounded-t-sm h-[40%]"></div>



                                                                        <div class="w-full bg-white/20 rounded-t-sm h-[60%]"></div>



                                                                        <div class="w-full bg-white/20 rounded-t-sm h-[50%]"></div>



                                                                        <div class="w-full bg-white/20 rounded-t-sm h-[80%]"></div>



                                                                        <div class="w-full bg-white/40 rounded-t-sm h-[65%]"></div>



                                                                        <div class="w-full bg-white rounded-t-sm h-[90%]"></div>



                                                                    </div>



                                                                </div>







                                                                {{-- Recent List --}}



                                                                <div class="space-y-2.5">



                                                                    <div class="flex justify-between items-end">



                                                                        <div class="text-[10px] font-bold text-gray-500 tracking-wider uppercase">Live Activity</div>



                                                                        <div class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></div>



                                                                    </div>







                                                                    @foreach(range(1, 3) as $i)



                                                                    <div class="flex items-center gap-3 p-2 rounded-xl bg-gray-800/50 border border-gray-800/50 hover:bg-gray-800 transition-colors cursor-pointer">



                                                                        <div class="w-8 h-8 rounded-full bg-gray-700/50 flex items-center justify-center">



                                                                            <div class="w-4 h-4 rounded-full bg-indigo-500/20 border border-indigo-500/50"></div>



                                                                        </div>



                                                                        <div class="flex-1 space-y-1.5">



                                                                            <div class="w-16 h-1.5 bg-gray-700 rounded-full"></div>



                                                                            <div class="w-10 h-1 bg-gray-800 rounded-full"></div>



                                                                        </div>



                                                                        <div class="text-[9px] text-gray-500 font-mono">2m</div>



                                                                    </div>



                                                                    @endforeach



                                                                </div>



                                                            </div>







                                                            {{-- Bottom Nav --}}


                                                            <div class="flex-none absolute bottom-0 left-0 right-0 rounded-b-[2rem] overflow-hidden h-8 bg-gray-900/90 backdrop-blur-md border-t border-gray-800 flex justify-around items-center px-6">



                                                                <div class="w-10 h-10 flex items-center justify-center text-blue-500 relative">



                                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/></svg>



                                                                    <div class="absolute -top-1 w-full h-0.5 bg-blue-500 shadow-[0_0_10px_#3b82f6]"></div>



                                                                </div>



                                                                <div class="w-10 h-10 flex items-center justify-center text-gray-600 hover:text-gray-400 transition-colors">



                                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>



                                                                </div>



                                                                <div class="w-10 h-10 flex items-center justify-center text-gray-600 hover:text-gray-400 transition-colors">



                                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>



                                                                </div>



                                                            </div>




                                                        </div>



                                                    </div>



                            {{-- Background Abstract Elements --}}

                            <div class="absolute top-10 left-10 w-16 h-16 bg-blue-500/10 rounded-full blur-xl animate-float-gentle"></div>

                            <div class="absolute bottom-10 right-10 w-24 h-24 bg-indigo-500/10 rounded-full blur-xl animate-float-gentle" style="animation-delay: 2s"></div>

                        </div>

                    </div>

                    <div class="w-full md:w-1/2 order-1 md:order-2">

                        <span class="text-blue-600 dark:text-blue-400 font-bold tracking-widest uppercase text-sm mb-4 block">{{ $locale === 'ar' ? 'تطبيقات الجوال' : 'Mobile Engineering' }}</span>

                        <h3 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6 leading-tight">

                            {{ $locale === 'ar' ? 'أداء حقيقي. بدون مساومة.' : 'Native Performance. Zero Compromise.' }}

                        </h3>

                        <p class="text-xl text-gray-600 dark:text-gray-400 leading-relaxed mb-8">

                            {{ $locale === 'ar' ? 'نستخدم Flutter و Swift لبناء تطبيقات تشعرك بالخفة والسرعة. 60 إطار في الثانية، تجربة مستخدم سلسة، وكود نظيف قابل للصيانة.' : 'We use Flutter and Swift to build apps that feel fluid and fast. 60fps animations, seamless UX, and maintainable clean code.' }}

                        </p>

                        <ul class="space-y-3">

                            <li class="flex items-center gap-3 text-gray-700 dark:text-gray-300">

                                <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>

                                <span>Cross-platform efficiency (Flutter)</span>

                            </li>

                            <li class="flex items-center gap-3 text-gray-700 dark:text-gray-300">

                                <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>

                                <span>Native power (Swift/Kotlin)</span>

                            </li>

                        </ul>

                    </div>

                </div>



                {{-- Service 2: Backend (Reversed) --}}

                <div class="flex flex-col md:flex-row items-center gap-12 md:gap-20 group animate-on-scroll">

                    <div class="w-full md:w-1/2 order-1">

                        <span class="text-emerald-600 dark:text-emerald-400 font-bold tracking-widest uppercase text-sm mb-4 block">{{ $locale === 'ar' ? 'البنية التحتية' : 'Backend Architecture' }}</span>

                        <h3 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6 leading-tight">

                            {{ $locale === 'ar' ? 'معماريات قابلة للتوسع.' : 'Architectures That Scale.' }}

                        </h3>

                        <p class="text-xl text-gray-600 dark:text-gray-400 leading-relaxed mb-8">

                            {{ $locale === 'ar' ? 'من الـ Microservices المعقدة إلى الـ Monoliths القوية. نصمم قواعد بيانات و APIs تتحمل ضغط الملايين دون أن تنهار.' : 'From complex Microservices to robust Monoliths. We design databases and APIs that handle millions of requests without breaking.' }}

                        </p>

                        <ul class="space-y-3">

                            <li class="flex items-center gap-3 text-gray-700 dark:text-gray-300">

                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>

                                <span>High-load optimization (Redis/SQL)</span>

                            </li>

                            <li class="flex items-center gap-3 text-gray-700 dark:text-gray-300">

                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>

                                <span>Secure API Design</span>

                            </li>

                        </ul>

                    </div>

                    <div class="w-full md:w-1/2 order-2">

                        <div class="relative rounded-[2.5rem] overflow-hidden shadow-2xl border border-gray-100 dark:border-gray-800 bg-gray-50 dark:bg-gray-900 aspect-[4/3] group-hover:scale-[1.02] transition-transform duration-500 flex items-center justify-center">

                            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-emerald-500/5 via-transparent to-transparent"></div>



                            {{-- Server Network Visualization --}}

                            <div class="relative z-10 w-full h-full flex items-center justify-center">

                                {{-- Central Core --}}

                                <div class="relative w-24 h-24 bg-gray-900 rounded-2xl border border-emerald-500/30 flex items-center justify-center shadow-lg shadow-emerald-500/20 z-20">

                                    <div class="absolute inset-0 bg-emerald-500/10 animate-pulse rounded-2xl"></div>

                                    <svg class="w-12 h-12 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                        <!-- Top Server Unit -->
                                        <rect x="6" y="8" width="36" height="10" rx="2" stroke-width="2" fill="currentColor" opacity="0.15"/>
                                        <rect x="6" y="8" width="36" height="10" rx="2" stroke-width="2"/>
                                        <line x1="10" y1="13" x2="24" y2="13" stroke-width="1.5" stroke-linecap="round"/>
                                        <circle cx="38" cy="13" r="1.5" fill="currentColor" opacity="0.8"/>
                                        <circle cx="34" cy="13" r="1.5" fill="currentColor" opacity="0.5"/>

                                        <!-- Middle Server Unit -->
                                        <rect x="6" y="20" width="36" height="10" rx="2" stroke-width="2" fill="currentColor" opacity="0.2"/>
                                        <rect x="6" y="20" width="36" height="10" rx="2" stroke-width="2"/>
                                        <line x1="10" y1="25" x2="28" y2="25" stroke-width="1.5" stroke-linecap="round"/>
                                        <circle cx="38" cy="25" r="1.5" fill="#10b981" class="animate-pulse"/>
                                        <circle cx="34" cy="25" r="1.5" fill="currentColor" opacity="0.5"/>

                                        <!-- Bottom Server Unit -->
                                        <rect x="6" y="32" width="36" height="10" rx="2" stroke-width="2" fill="currentColor" opacity="0.15"/>
                                        <rect x="6" y="32" width="36" height="10" rx="2" stroke-width="2"/>
                                        <line x1="10" y1="37" x2="26" y2="37" stroke-width="1.5" stroke-linecap="round"/>
                                        <circle cx="38" cy="37" r="1.5" fill="currentColor" opacity="0.8"/>
                                        <circle cx="34" cy="37" r="1.5" fill="currentColor" opacity="0.5"/>
                                    </svg>



                                    {{-- Connecting Lines --}}

                                    <div class="absolute top-1/2 left-full w-12 h-0.5 bg-gradient-to-r from-emerald-500/50 to-transparent"></div>

                                    <div class="absolute top-1/2 right-full w-12 h-0.5 bg-gradient-to-l from-emerald-500/50 to-transparent"></div>

                                    <div class="absolute left-1/2 bottom-full w-0.5 h-12 bg-gradient-to-t from-emerald-500/50 to-transparent"></div>

                                </div>



                                {{-- Satellite Nodes --}}

                                <div class="absolute top-1/4 left-1/4 w-12 h-12 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 flex items-center justify-center shadow-sm animate-float-gentle" style="animation-delay: 0.5s">

                                    <span class="text-xs font-mono font-bold text-gray-500">API</span>

                                </div>

                                <div class="absolute bottom-1/3 right-1/4 w-12 h-12 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 flex items-center justify-center shadow-sm animate-float-gentle" style="animation-delay: 1.5s">

                                    <span class="text-xs font-mono font-bold text-gray-500">DB</span>

                                </div>

                                <div class="absolute top-1/3 right-1/4 w-16 h-12 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 flex items-center justify-center shadow-sm animate-float-gentle" style="animation-delay: 0.8s">
                                    <span class="text-xs font-mono font-bold text-gray-500">Backend</span>
                                </div>

                                <div class="absolute bottom-1/4 left-1/4 w-14 h-12 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 flex items-center justify-center shadow-sm animate-float-gentle" style="animation-delay: 1.2s">
                                    <span class="text-xs font-mono font-bold text-gray-500">Client</span>
                                </div>

                                <div class="absolute bottom-1/5 left-1/2 w-14 h-12 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 flex items-center justify-center shadow-sm animate-float-gentle" style="animation-delay: 2s">
                                    <span class="text-xs font-mono font-bold text-gray-500">Mobile</span>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- Service 3: Compliance --}}

                 <div class="flex flex-col md:flex-row items-center gap-12 md:gap-20 group animate-on-scroll">

                    <div class="w-full md:w-1/2 order-2 md:order-1">

                        <div class="relative rounded-[2.5rem] overflow-hidden shadow-2xl border border-gray-100 dark:border-gray-800 bg-gray-50 dark:bg-gray-900 aspect-[4/3] group-hover:scale-[1.02] transition-transform duration-500 flex items-center justify-center">

                            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-amber-500/5 via-transparent to-transparent"></div>



                            {{-- Shield Visualization --}}

                            <div class="relative z-10 w-48 h-56">

                                {{-- Shield Base --}}

                                <div class="absolute inset-0 bg-gradient-to-b from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900 border border-white/20 dark:border-gray-700 rounded-[2rem] shadow-xl" style="clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);"></div>



                                {{-- Inner Lock/Emblem --}}

                                <div class="absolute inset-0 flex items-center justify-center">

                                    <div class="w-20 h-20 bg-amber-500/10 rounded-full flex items-center justify-center backdrop-blur-sm border border-amber-500/20">

                                        <svg class="w-10 h-10 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>

                                    </div>

                                </div>



                                {{-- Floating Badges --}}

                                <div class="absolute -top-4 -right-4 bg-white dark:bg-gray-800 px-3 py-1.5 rounded-lg border border-gray-200 dark:border-gray-700 shadow-lg flex items-center gap-2 animate-float-gentle">

                                    <span class="w-2 h-2 rounded-full bg-green-500"></span>

                                    <span class="text-[10px] font-bold text-gray-600 dark:text-gray-300">DGA Compliant</span>

                                </div>

                                 <div class="absolute -bottom-2 -left-4 bg-white dark:bg-gray-800 px-3 py-1.5 rounded-lg border border-gray-200 dark:border-gray-700 shadow-lg flex items-center gap-2 animate-float-gentle" style="animation-delay: 1.5s">

                                    <svg class="w-3 h-3 text-amber-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2.166 10.3c.624 2.207 2.2 4.072 4.298 4.976a1 1 0 00.772 0c2.098-.904 3.674-2.77 4.298-4.976A15.56 15.56 0 0010 3.99v6.31h7.834c0 2.253-.357 4.417-1.012 6.433-.624 2.207-2.2 4.072-4.298 4.976a1 1 0 01-.772 0 6.08 6.08 0 01-4.298-4.976 15.56 15.56 0 01-1.012-6.433H2.166z" clip-rule="evenodd"></path></svg>

                                    <span class="text-[10px] font-bold text-gray-600 dark:text-gray-300">NCA Secure</span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="w-full md:w-1/2 order-1 md:order-2">

                        <span class="text-amber-600 dark:text-amber-400 font-bold tracking-widest uppercase text-sm mb-4 block">{{ $locale === 'ar' ? 'الامتثال' : 'Government Compliance' }}</span>

                        <h3 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6 leading-tight">

                            {{ $locale === 'ar' ? 'مبني للمملكة.' : 'Built for the Kingdom.' }}

                        </h3>

                        <p class="text-xl text-gray-600 dark:text-gray-400 leading-relaxed mb-8">

                            {{ $locale === 'ar' ? 'نحن متخصصون في بناء منصات تتوافق بدقة مع معايير هيئة الحكومة الرقمية (DGA) ولوائح البيانات المحلية.' : 'We specialize in building platforms that strictly adhere to Digital Government Authority (DGA) standards and local data regulations.' }}

                        </p>

                        <ul class="space-y-3">

                            <li class="flex items-center gap-3 text-gray-700 dark:text-gray-300">

                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>

                                <span>Cybersecurity Essential Compliance</span>

                            </li>

                            <li class="flex items-center gap-3 text-gray-700 dark:text-gray-300">

                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>

                                <span>Local Data Hosting Ready</span>

                            </li>

                        </ul>

                    </div>

                </div>

            </div>

        </section>

    {{-- The Manifesto (Big Bold Type) --}}
    <section class="py-32 px-4 bg-gray-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTMwIDMwaDMwdjMwSDMweiIgZmlsbD0iI2ZmZiIvPjxwYXRoIGQ9Ik0wIDBoMzB2MzBIMHoiIGZpbGw9IiNmZmYiLz48L2c+PC9zdmc+')] opacity-5"></div>

        <div class="container mx-auto max-w-5xl text-center relative z-10">
            <h2 class="text-xs font-bold tracking-[0.3em] uppercase text-gray-500 mb-12">{{ $locale === 'ar' ? 'مبادئنا' : 'Our Manifesto' }}</h2>

            <div class="space-y-16 md:space-y-24">
                <p class="text-4xl md:text-6xl lg:text-7xl font-black leading-tight animate-on-scroll">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-gray-500 to-gray-700">01.</span><br>
                    {{ $locale === 'ar' ? 'نحن نرفض الكود العشوائي.' : 'We reject spaghetti code.' }}
                </p>

                <p class="text-4xl md:text-6xl lg:text-7xl font-black leading-tight animate-on-scroll delay-100">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-gray-500 to-gray-700">02.</span><br>
                    {{ $locale === 'ar' ? 'نحن لا نخمن. نحن نختبر.' : 'We don\'t guess. We test.' }}
                </p>

                <p class="text-4xl md:text-6xl lg:text-7xl font-black leading-tight animate-on-scroll delay-200">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-gray-500 to-gray-700">03.</span><br>
                    {{ $locale === 'ar' ? 'الأمان هو الأساس، وليس إضافة.' : 'Security is the foundation.' }}
                </p>
            </div>
        </div>
    </section>

    {{-- Process: Vertical Timeline --}}
    <section class="py-32 px-4 bg-white dark:bg-gray-950">
        <div class="container mx-auto max-w-4xl">
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    {{ $locale === 'ar' ? 'شفافية كاملة.' : 'No Black Boxes.' }}
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-400">
                    {{ $locale === 'ar' ? 'تحديثات أسبوعية. التزامات يومية. أنت ترى ما نراه.' : 'Weekly sprints. Daily commits. You see what we see.' }}
                </p>
            </div>

            <div class="relative">
                {{-- Vertical Line --}}
                <div class="absolute left-8 md:left-1/2 top-0 bottom-0 w-px bg-gray-200 dark:bg-gray-800 md:-ml-px"></div>

                @php
                    $steps = [
                        ['title' => $locale === 'ar' ? 'الاستكشاف' : 'Discovery', 'desc' => $locale === 'ar' ? 'لا نبدأ أي سطر كود قبل أن نفهم عملك.' : 'We write zero code until we understand your business.', 'icon' => '🔍'],
                        ['title' => $locale === 'ar' ? 'البناء' : 'Build', 'desc' => $locale === 'ar' ? 'تطوير بنظام Agile. ديمو كل أسبوع.' : 'Agile development. You get a demo every week.', 'icon' => '⚙️'],
                        ['title' => $locale === 'ar' ? 'الإطلاق' : 'Launch', 'desc' => $locale === 'ar' ? 'نشر آمن وبدون توقف للخدمة.' : 'Zero-downtime deployment. Production ready.', 'icon' => '🚀'],
                    ];
                @endphp

                @foreach($steps as $index => $step)
                <div class="relative flex items-center gap-8 md:gap-0 mb-16 last:mb-0 group {{ $loop->even ? 'md:flex-row-reverse' : '' }}">
                    {{-- Icon Bubble --}}
                    <div class="absolute left-0 md:left-1/2 w-16 h-16 rounded-full bg-white dark:bg-gray-900 border-4 border-gray-100 dark:border-gray-800 flex items-center justify-center text-2xl shadow-lg z-10 md:-translate-x-1/2 group-hover:border-primary-500 transition-colors duration-300">
                        {{ $step['icon'] }}
                    </div>

                    {{-- Content --}}
                    <div class="pl-24 md:pl-0 w-full md:w-1/2 {{ $loop->even ? 'md:pr-24 text-right' : 'md:pl-24' }}">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ $step['title'] }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-lg">{{ $step['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Featured Projects (Immersive Cards) --}}
    @if(isset($page->portfolio_en) && $page->portfolio_en->count() > 0)
    <section class="py-32 px-4 bg-gray-50 dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800">
        <div class="container mx-auto max-w-7xl">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
                <div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                        {{ $locale === 'ar' ? 'أعمال مختارة' : 'Selected Works' }}
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-400">
                        {{ $locale === 'ar' ? 'نتائج حقيقية، وليس مجرد تصاميم.' : 'Real results, not just mockups.' }}
                    </p>
                </div>
                <a href="{{ $page->localUrl('portfolio') }}" class="group inline-flex items-center text-lg font-semibold text-primary-600 dark:text-primary-400 hover:text-primary-700 transition-colors">
                    {{ $locale === 'ar' ? 'عرض جميع المشاريع' : 'View all projects' }}
                    <svg class="w-5 h-5 {{ $locale === 'ar' ? 'mr-2 rotate-180 group-hover:-translate-x-1' : 'ml-2 group-hover:translate-x-1' }} transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($page->portfolio_en->where('featured', true)->take(3) as $item)
                    <a href="{{ $page->localUrl('portfolio') }}" class="group relative block h-[400px] rounded-[2rem] overflow-hidden shadow-xl transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                        {{-- Background Image --}}
                        @php
                            $screenshotUrl = $item->screenshot ?? null;
                            if (!$screenshotUrl && $item->demo_url) {
                                $hash = md5($item->demo_url);
                                $screenshotUrl = url("/assets/images/portfolio/screenshots/{$hash}.jpg");
                            }
                        @endphp

                        @if($screenshotUrl)
                             <img src="{{ $screenshotUrl }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="{{ $item->title }}" loading="lazy">
                        @else
                            <div class="absolute inset-0 bg-gradient-to-br from-gray-800 to-gray-900"></div>
                        @endif

                        {{-- Gradient Overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>

                        {{-- Content --}}
                        <div class="absolute bottom-0 left-0 w-full p-8 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                            <h3 class="text-2xl font-bold text-white mb-2">{{ $item->title }}</h3>
                            <p class="text-gray-300 line-clamp-2 mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">
                                {{ $item->description }}
                            </p>

                            @if($item->tech_stack)
                            <div class="flex flex-wrap gap-2">
                                @foreach(array_slice($item->tech_stack, 0, 3) as $tech)
                                <span class="px-2 py-1 rounded-md bg-white/20 text-white text-xs backdrop-blur-sm">
                                    {{ $tech }}
                                </span>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Call to Action Section --}}
    <section id="contact" class="py-32 px-4 bg-gradient-to-br from-primary-900 to-gray-900 relative overflow-hidden text-center text-white">
        {{-- Animated Background Shapes --}}
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
            <div class="absolute top-[-20%] left-[-10%] w-[60%] h-[60%] rounded-full bg-primary-600/20 blur-[100px] animate-float-gentle"></div>
            <div class="absolute bottom-[-20%] right-[-10%] w-[60%] h-[60%] rounded-full bg-accent-600/20 blur-[100px] animate-float-gentle" style="animation-delay: 2s;"></div>
        </div>

        <div class="container mx-auto max-w-4xl relative z-10 animate-on-scroll">
            <h2 class="text-5xl md:text-6xl font-black mb-8 tracking-tight">
                {{ $locale === 'ar' ? 'جاهز لتوسيع رؤيتك؟' : 'Ready to scale your vision?' }}
            </h2>
            <p class="text-xl md:text-2xl text-primary-100 mb-12 max-w-2xl mx-auto leading-relaxed">
                {{ $locale === 'ar' ? 'انضم إلى الشركات التي تثق بنا في بنيتها التحتية وتطبيقاتها الأكثر أهمية.' : 'Join the companies that trust us with their most critical infrastructure and applications.' }}
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="https://github.com/awssat" target="_blank" class="px-8 py-4 bg-white text-gray-900 rounded-full font-bold text-lg shadow-2xl hover:scale-105 transition-transform flex items-center justify-center gap-2">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    {{ $locale === 'ar' ? 'GitHub' : 'GitHub' }}
                </a>
                <a href="{{ $page->localUrl('contact') }}" class="px-8 py-4 bg-transparent border-2 border-white/20 text-white rounded-full font-bold text-lg hover:bg-white/10 transition-colors flex items-center justify-center">
                    {{ $locale === 'ar' ? 'تواصل معنا' : 'Get In Touch' }}
                </a>
            </div>
        </div>
    </section>

</div>
