{{-- Portfolio Card Component --}}
<article class="group relative bg-white dark-mode:bg-gray-900 rounded-2xl overflow-hidden shadow-lg hover-lift border border-gray-200 dark-mode:border-gray-800 transition-all duration-300">
    {{-- Type Badge --}}
    <div class="absolute top-4 {{ $page->locale === 'ar' ? 'left-4' : 'right-4' }} z-10">
        @if($item->type === 'laravel-pr')
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-primary-100 text-primary-700 dark-mode:bg-primary-900 dark-mode:text-primary-300">
                <svg class="w-3 h-3 {{ $page->locale === 'ar' ? 'ml-1' : 'mr-1' }}" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path>
                </svg>
                {{ $page->trans('portfolio.type.laravel_pr') }}
            </span>
        @else
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-accent-100 text-accent-700 dark-mode:bg-accent-900 dark-mode:text-accent-300">
                <svg class="w-3 h-3 {{ $page->locale === 'ar' ? 'ml-1' : 'mr-1' }}" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 6a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 100 4v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2a2 2 0 100-4V6z"></path>
                </svg>
                {{ $page->trans('portfolio.type.project') }}
            </span>
        @endif
    </div>

    {{-- Card Content --}}
    <div class="p-6">
        {{-- Title --}}
        <h3 class="text-xl font-bold text-gray-900 dark-mode:text-gray-100 mb-3 group-hover:text-primary-600 dark-mode:group-hover:text-primary-400 transition-colors">
            <a href="{{ $item->getUrl() }}" class="hover:underline">
                {{ $item->title }}
            </a>
        </h3>

        {{-- Description --}}
        <p class="text-gray-600 dark-mode:text-gray-400 mb-4 line-clamp-3">
            {{ $item->description }}
        </p>

        {{-- Tech Stack --}}
        @if($item->tech_stack)
        <div class="flex flex-wrap gap-2 mb-4">
            @foreach($item->tech_stack as $tech)
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-gray-100 text-gray-800 dark-mode:bg-gray-800 dark-mode:text-gray-300">
                    {{ $tech }}
                </span>
            @endforeach
        </div>
        @endif

        {{-- Footer --}}
        <div class="flex items-center justify-between pt-4 border-t border-gray-200 dark-mode:border-gray-800">
            {{-- Status/Stars --}}
            <div class="flex items-center gap-2 text-sm text-gray-500 dark-mode:text-gray-400">
                @if($item->type === 'laravel-pr' && $item->pr_status === 'merged')
                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-medium text-green-600 dark-mode:text-green-400">{{ $page->trans('portfolio.status.merged') }}</span>
                @elseif(isset($item->stars))
                    <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <span class="font-medium">{{ $item->stars }}+</span>
                @endif
            </div>

            {{-- View Link --}}
            <a href="{{ $item->getUrl() }}" class="inline-flex items-center text-sm font-semibold text-primary-600 dark-mode:text-primary-400 hover:text-primary-700 dark-mode:hover:text-primary-300 transition-colors">
                {{ $page->trans('common.read_more') }}
                <svg class="w-4 h-4 {{ $page->locale === 'ar' ? 'mr-1 rtl:mirror' : 'ml-1' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>
</article>
