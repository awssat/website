<div class="w-full min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4">
        {{-- Header --}}
        <header class="text-center mb-16 animate-on-scroll">
            <h1 class="text-5xl md:text-6xl font-bold text-gradient-primary mb-6">
                {{ $page->trans('portfolio.title') }}
            </h1>
            <p class="text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
                {{ $page->trans('portfolio.description') }}
            </p>
        </header>

        {{-- Filter Tabs --}}
        <div class="flex justify-center mb-12 animate-on-scroll" x-data="{ activeFilter: 'all' }">
            <div class="inline-flex rounded-xl bg-gray-100 dark:bg-gray-800 p-1 shadow-lg">
                <button @click="activeFilter = 'all'"
                        :class="activeFilter === 'all' ? 'bg-white dark:bg-gray-700 shadow-md' : ''"
                        class="px-6 py-3 rounded-lg font-semibold text-sm transition-all duration-200">
                    {{ $page->trans('portfolio.filter.all') }}
                </button>
                <button @click="activeFilter = 'prs'"
                        :class="activeFilter === 'prs' ? 'bg-white dark:bg-gray-700 shadow-md' : ''"
                        class="px-6 py-3 rounded-lg font-semibold text-sm transition-all duration-200">
                    {{ $page->trans('portfolio.filter.prs') }}
                </button>
                <button @click="activeFilter = 'projects'"
                        :class="activeFilter === 'projects' ? 'bg-white dark:bg-gray-700 shadow-md' : ''"
                        class="px-6 py-3 rounded-lg font-semibold text-sm transition-all duration-200">
                    {{ $page->trans('portfolio.filter.projects') }}
                </button>
            </div>
        </div>

        {{-- Portfolio Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" x-data="{ activeFilter: 'all' }">
            @foreach($pagination->items as $item)
                @if(str_ends_with($item->getFilename(), '.' . $page->locale))
                <div x-show="activeFilter === 'all' || (activeFilter === 'prs' && '{{ $item->type }}' === 'laravel-pr') || (activeFilter === 'projects' && '{{ $item->type }}' === 'project')"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform scale-90"
                     x-transition:enter-end="opacity-100 transform scale-100"
                     class="animate-on-scroll">
                    @include('_layouts.portfolio.partial.card', ['item' => $item])
                </div>
                @endif
            @endforeach
        </div>

    </div>
</div>
