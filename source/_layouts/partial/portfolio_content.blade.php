<div class="w-full min-h-screen py-24 relative overflow-hidden">
    {{-- Background Glow --}}
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-[500px] bg-primary-500/10 blur-[120px] rounded-full pointer-events-none z-0"></div>

    <div class="max-w-7xl mx-auto px-4 relative z-10">
        {{-- Header --}}
        <header class="text-center mb-20 animate-on-scroll">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary-100/50 dark:bg-primary-900/30 text-primary-600 dark:text-primary-400 text-sm font-semibold mb-6">
                <span>Our Work</span>
            </div>
            <h1 class="text-5xl md:text-7xl font-bold mb-6 tracking-tight text-balance">
                <span class="block text-gray-900 dark:text-white">{{ $page->trans('portfolio.title') }}</span>
            </h1>
            <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto leading-relaxed text-balance">
                {{ $page->trans('portfolio.description') }}
            </p>
        </header>

        {{-- Filter Tabs --}}
        <div class="flex justify-center mb-16 animate-on-scroll delay-100" x-data="{ activeFilter: 'all' }">
            <div class="inline-flex rounded-full bg-white/80 dark:bg-gray-900/80 p-1.5 shadow-xl border border-gray-200 dark:border-gray-800 backdrop-blur-xl">
                <button @click="activeFilter = 'all'"
                        :class="activeFilter === 'all' ? 'bg-primary-600 text-white shadow-lg' : 'text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400'"
                        class="px-6 py-2.5 rounded-full font-medium text-sm transition-all duration-300">
                    {{ $page->trans('portfolio.filter.all') }}
                </button>
                <button @click="activeFilter = 'prs'"
                        :class="activeFilter === 'prs' ? 'bg-primary-600 text-white shadow-lg' : 'text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400'"
                        class="px-6 py-2.5 rounded-full font-medium text-sm transition-all duration-300">
                    {{ $page->trans('portfolio.filter.prs') }}
                </button>
                <button @click="activeFilter = 'projects'"
                        :class="activeFilter === 'projects' ? 'bg-primary-600 text-white shadow-lg' : 'text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400'"
                        class="px-6 py-2.5 rounded-full font-medium text-sm transition-all duration-300">
                    {{ $page->trans('portfolio.filter.projects') }}
                </button>
            </div>
        </div>

        {{-- Portfolio Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" x-data="{ activeFilter: 'all' }">
            @foreach($pagination->items as $item)
                @if(str_ends_with($item->getFilename(), '.' . $page->locale))
                <div x-show="activeFilter === 'all' || (activeFilter === 'prs' && '{{ $item->type }}' === 'laravel-pr') || (activeFilter === 'projects' && '{{ $item->type }}' === 'project')"
                     x-transition:enter="transition ease-out duration-500"
                     x-transition:enter-start="opacity-0 transform scale-95 translate-y-4"
                     x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                     class="animate-on-scroll h-full">
                    @include('_layouts.portfolio.partial.card', ['item' => $item])
                </div>
                @endif
            @endforeach
        </div>

        {{-- Pagination (if needed in future, currently 100 items per page so likely not) --}}
    </div>
</div>