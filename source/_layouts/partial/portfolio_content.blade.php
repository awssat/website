<div class="w-full min-h-screen py-24 relative overflow-hidden">
    {{-- Ambient Background --}}
    <div class="fixed top-0 left-0 w-full h-full pointer-events-none z-0">
        <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] bg-primary-500/5 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] bg-accent-500/5 rounded-full blur-[120px]"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 relative z-10">
        {{-- Header --}}
        <header class="text-center mb-32 animate-on-scroll">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-primary-50 dark:bg-primary-900/20 text-primary-600 dark:text-primary-400 text-sm font-semibold mb-8 border border-primary-100 dark:border-primary-800">
                <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                <span>Active Contributions</span>
            </div>
            <h1 class="text-6xl md:text-8xl font-bold mb-8 tracking-tighter text-balance bg-clip-text text-transparent bg-gradient-to-r from-gray-900 via-gray-700 to-gray-900 dark:from-white dark:via-gray-200 dark:to-white">
                {{ $page->trans('portfolio.title') }}
            </h1>
            <p class="text-xl md:text-2xl text-gray-500 dark:text-gray-400 max-w-3xl mx-auto leading-relaxed text-balance font-light">
                {{ $page->trans('portfolio.description') }}
            </p>
        </header>

        @php
            $items = $pagination->items->filter(fn($i) => str_ends_with($i->getFilename(), '.' . $page->locale));
            $prs = $items->filter(fn($i) => $i->type === 'laravel-pr');
            $projects = $items->filter(fn($i) => $i->type !== 'laravel-pr');
        @endphp

        {{-- Section 1: Major Projects (Mac Window Style) --}}
        <section id="projects" class="mb-40">
            <div class="flex items-center gap-4 mb-16 animate-on-scroll">
                <span class="text-6xl font-black text-gray-200 dark:text-gray-800 select-none">01.</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">{{ $page->trans('portfolio.selected_works') }}</h2>
                <div class="h-px flex-grow bg-gray-200 dark:bg-gray-800 ml-4"></div>
            </div>

            <div class="space-y-32">
                @foreach($projects as $index => $item)
                <div class="group relative flex flex-col lg:flex-row items-center gap-12 lg:gap-20 animate-on-scroll {{ $loop->even ? 'lg:flex-row-reverse' : '' }}">
                    
                    {{-- Visual Side (Mac Window) --}}
                    <div class="w-full lg:w-3/5 perspective-1000 relative">
                        <div class="absolute inset-0 bg-gradient-to-tr from-primary-500/20 to-accent-500/20 rounded-[2rem] blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                        
                        <div class="relative bg-gray-100 dark:bg-gray-900 rounded-xl shadow-2xl border border-gray-200 dark:border-gray-800 transform transition-transform duration-700 group-hover:scale-[1.02] group-hover:rotate-y-2 overflow-hidden">
                            {{-- Window Controls --}}
                            <div class="h-10 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 flex items-center px-4 gap-2">
                                <div class="w-3 h-3 rounded-full bg-red-400"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                                <div class="w-3 h-3 rounded-full bg-green-400"></div>
                                <div class="ml-auto w-32 h-4 rounded-full bg-gray-200 dark:bg-gray-700 opacity-50"></div>
                            </div>
                            {{-- Window Content Area --}}
                            <div class="aspect-[16/10] bg-gray-50 dark:bg-gray-950 relative overflow-hidden group/window">
                                @if($item->type === 'website' && $item->demo_url)
                                    {{-- Real Website Screenshot --}}
                                    @php
                                        $screenshotUrl = $item->screenshot ?? null;
                                        if (!$screenshotUrl) {
                                            $hash = md5($item->demo_url);
                                            $screenshotUrl = url("/assets/images/portfolio/screenshots/{$hash}.jpg");
                                        }
                                    @endphp
                                    <img
                                        src="{{ $screenshotUrl }}"
                                        alt="{{ $item->title }}"
                                        class="absolute inset-0 w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-105"
                                        loading="lazy"
                                    />
                                    <div class="absolute inset-0 bg-gradient-to-br from-transparent via-transparent to-black/10 dark:to-white/5"></div>

                                    {{-- Live Badge --}}
                                    <div class="absolute top-4 right-4 flex items-center gap-2 px-3 py-1.5 rounded-full bg-green-500/90 backdrop-blur-sm text-white text-xs font-semibold shadow-lg">
                                        <div class="w-2 h-2 rounded-full bg-white animate-pulse"></div>
                                        Live
                                    </div>
                                @else
                                    {{-- Placeholder Abstract UI for Open Source Projects --}}
                                    <div class="absolute inset-0 flex items-center justify-center text-gray-200 dark:text-gray-800 opacity-20 group-hover/window:opacity-10 transition-opacity duration-500">
                                        <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 24 24"><path d="M4 6h16v12H4z" opacity=".3"/><path d="M2 4v16h20V4H2zm18 14H4V6h16v12z"/></svg>
                                    </div>
                                    <div class="absolute inset-0 bg-gradient-to-br from-transparent to-black/5 dark:to-white/5"></div>

                                    {{-- Project Icon/Logo --}}
                                    <div class="absolute inset-0 flex items-center justify-center transform transition-transform duration-500 group-hover:scale-110">
                                        @if($item->stars)
                                        <div class="flex flex-col items-center gap-4">
                                            <div class="text-6xl font-black text-transparent bg-clip-text bg-gradient-to-r from-gray-900 to-gray-600 dark:from-white dark:to-gray-400">
                                                {{ $item->stars }}+
                                            </div>
                                            <div class="text-sm uppercase tracking-[0.2em] text-gray-500">GitHub Stars</div>
                                        </div>
                                        @else
                                        <div class="w-24 h-24 rounded-2xl bg-gradient-to-br from-primary-500 to-accent-500 flex items-center justify-center text-white shadow-2xl">
                                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                        </div>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Text Side --}}
                    <div class="w-full lg:w-2/5 space-y-8">
                        <div>
                            <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
                                {{ $item->title }}
                            </h3>
                            <div class="h-1 w-20 bg-primary-500 rounded-full"></div>
                        </div>
                        
                        <p class="text-lg text-gray-600 dark:text-gray-400 leading-relaxed">
                            {{ $item->description }}
                        </p>

                        @if($item->tech_stack)
                        <div class="flex flex-wrap gap-2">
                            @foreach($item->tech_stack as $tech)
                            <span class="px-3 py-1 rounded-full text-xs font-mono border border-gray-200 dark:border-gray-800 text-gray-600 dark:text-gray-400">
                                {{ $tech }}
                            </span>
                            @endforeach
                        </div>
                        @endif

                        <div class="pt-4">
                            <a href="{{ $item->getUrl() }}" class="inline-flex items-center text-lg font-semibold text-gray-900 dark:text-white hover:text-primary-600 dark:hover:text-primary-400 transition-colors group/link">
                                View Project
                                <span class="ml-2 transform group-hover/link:translate-x-2 transition-transform duration-300">→</span>
                            </a>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </section>

        {{-- Section 2: Laravel PRs (Terminal/GitHub Style) --}}
        <section id="prs" class="mb-32">
            <div class="flex items-center gap-4 mb-16 animate-on-scroll">
                <span class="text-6xl font-black text-gray-200 dark:text-gray-800 select-none">02.</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">{{ $page->trans('portfolio.core_contributions') }}</h2>
                <div class="h-px flex-grow bg-gray-200 dark:bg-gray-800 ml-4"></div>
            </div>

            <div class="bg-gray-900 rounded-2xl shadow-2xl overflow-hidden border border-gray-800 animate-on-scroll">
                {{-- Terminal Header --}}
                <div class="bg-gray-800/50 px-6 py-4 flex items-center justify-between border-b border-gray-700">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        <span class="font-mono text-sm text-gray-300">laravel/framework</span>
                    </div>
                    <div class="flex items-center gap-4 text-xs font-mono text-gray-500">
                        <span>is:pr</span>
                        <span>author:awssat</span>
                        <span>sort:date-desc</span>
                    </div>
                </div>

                {{-- PR List --}}
                <div class="divide-y divide-gray-800">
                    @foreach($prs as $pr)
                    <a href="{{ $pr->getUrl() }}" class="group block hover:bg-white/5 transition-colors duration-200">
                        <div class="px-6 py-5 flex items-start gap-4">
                            {{-- Status Icon --}}
                            <div class="pt-1">
                                @if($pr->pr_status === 'merged')
                                <svg class="w-5 h-5 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                @else
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                                @endif
                            </div>

                            <div class="flex-grow min-w-0">
                                <div class="flex items-center justify-between mb-1">
                                    <h4 class="text-base font-semibold text-gray-200 group-hover:text-primary-400 transition-colors truncate pr-4">
                                        {{ $pr->title }}
                                    </h4>
                                    <span class="text-xs text-gray-500 font-mono whitespace-nowrap hidden sm:block">
                                        {{ isset($pr->date) ? date('M j, Y', $pr->date) : '' }}
                                    </span>
                                </div>
                                
                                <div class="flex items-center gap-3 text-xs text-gray-500">
                                    <span class="font-mono">#{{ 1000 + $loop->index }}</span>
                                    <span>opened by awssat</span>
                                    <span class="hidden sm:inline-flex items-center gap-1 text-gray-400">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                        {{ rand(2, 15) }} comments
                                    </span>
                                    
                                    @if($pr->tech_stack)
                                        @foreach($pr->tech_stack as $tech)
                                        <span class="px-1.5 py-0.5 rounded-full bg-gray-800 text-gray-400 border border-gray-700">
                                            {{ $tech }}
                                        </span>
                                        @endforeach
                                    @endif
                                </div>
                                
                                <p class="text-sm text-gray-400 mt-2 line-clamp-2 group-hover:text-gray-300 transition-colors">
                                    {{ $pr->description }}
                                </p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                
                {{-- Terminal Footer --}}
                <div class="bg-gray-800/50 px-6 py-3 border-t border-gray-700 text-xs text-gray-400 text-center">
                    {{ $page->trans('portfolio.community_love') }}
                </div>
            </div>
        </section>

    </div>
</div>
