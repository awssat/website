{{-- Portfolio Card Component --}}
<article class="group relative bg-white dark:bg-gray-900 rounded-2xl overflow-hidden shadow-lg hover-lift transition-all duration-300 h-full flex flex-col">
    {{-- Gradient Border Overlay --}}
    <div class="absolute inset-0 rounded-2xl border-2 border-transparent bg-gradient-to-br from-primary-500 to-accent-500 opacity-0 group-hover:opacity-100 mask-border transition-opacity duration-300 pointer-events-none z-0" style="-webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0); -webkit-mask-composite: xor; mask-composite: exclude;"></div>
    
    {{-- Default Border --}}
    <div class="absolute inset-0 rounded-2xl border border-gray-200 dark:border-gray-800 group-hover:opacity-0 transition-opacity duration-300 pointer-events-none z-0"></div>

    {{-- Type Badge --}}
    <div class="absolute top-4 {{ $page->locale === 'ar' ? 'left-4' : 'right-4' }} z-10">
        @if($item->type === 'laravel-pr')
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-primary-100 text-primary-700 dark:bg-primary-900 dark:text-primary-300 shadow-sm">
                <svg class="w-3 h-3 {{ $page->locale === 'ar' ? 'ml-1' : 'mr-1' }}" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path>
                </svg>
                {{ $page->trans('portfolio.type.laravel_pr') }}
            </span>
        @else
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-accent-100 text-accent-700 dark:bg-accent-900 dark:text-accent-300 shadow-sm">
                <svg class="w-3 h-3 {{ $page->locale === 'ar' ? 'ml-1' : 'mr-1' }}" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 6a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 100 4v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2a2 2 0 100-4V6z"></path>
                </svg>
                {{ $page->trans('portfolio.type.project') }}
            </span>
        @endif
    </div>

    {{-- Card Content --}}
    <div class="p-6 relative z-10 flex flex-col flex-grow">
        {{-- Title --}}
        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-3 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
            <a href="{{ $item->getUrl() }}" class="hover:underline decoration-2 underline-offset-2 decoration-primary-500/30">
                {{ $item->title }}
            </a>
        </h3>

        {{-- Description --}}
        <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-3 flex-grow">
            {{ $item->description }}
        </p>

        {{-- Tech Stack --}}
        @if($item->tech_stack)
        <div class="flex flex-wrap gap-2 mb-6">
            @foreach($item->tech_stack as $tech)
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-gray-50 text-gray-700 dark:bg-gray-800 dark:text-gray-300 border border-gray-100 dark:border-gray-700">
                    {{ $tech }}
                </span>
            @endforeach
        </div>
        @endif

        {{-- Footer --}}
        <div class="flex items-center justify-between pt-4 border-t border-gray-100 dark:border-gray-800 mt-auto">
            {{-- Status/Stars --}}
            <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
                @if($item->type === 'laravel-pr' && $item->pr_status === 'merged')
                    <div class="flex items-center gap-1.5 px-2 py-1 rounded bg-green-50 dark:bg-green-900/30 text-green-700 dark:text-green-400">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="font-semibold text-xs">{{ $page->trans('portfolio.status.merged') }}</span>
                    </div>
                @elseif(isset($item->stars))
                    <div class="flex items-center gap-1.5 px-2 py-1 rounded bg-yellow-50 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <span class="font-bold text-xs">{{ $item->stars }}+</span>
                    </div>
                @endif
            </div>

            {{-- View Link --}}
            <a href="{{ $item->getUrl() }}" class="inline-flex items-center text-sm font-bold text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 transition-colors group-hover:translate-x-1">
                {{ $page->trans('common.read_more') }}
                <svg class="w-4 h-4 {{ $page->locale === 'ar' ? 'mr-1 rtl:mirror' : 'ml-1' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>
</article>
