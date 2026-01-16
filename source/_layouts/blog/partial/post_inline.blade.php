<article class="group relative bg-white dark:bg-gray-900 rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl border border-gray-200 dark:border-gray-800 transition-all duration-300 hover:-translate-y-1 mb-8 scroll-reveal">
    {{-- Gradient Border on Hover --}}
    <div class="absolute inset-0 rounded-3xl border-2 border-transparent bg-gradient-to-r from-primary-500 to-accent-500 opacity-0 group-hover:opacity-10 mask-border transition-opacity duration-300 pointer-events-none"></div>

    <div class="relative z-10 grid md:grid-cols-[280px_1fr] gap-6 p-6">
        {{-- Cover Image --}}
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900 aspect-[16/10] md:aspect-auto md:h-full shadow-inner">
            <img src="{{ $post->getCoverImage() }}"
                 alt="{{ $post->title }}"
                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                 loading="lazy">
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

            {{-- External Link Badge --}}
            @if(!empty($post->external_link))
            <div class="absolute top-3 right-3 bg-white dark:bg-gray-900 px-2.5 py-1 rounded-lg text-xs font-mono text-gray-600 dark:text-gray-400 shadow-lg">
                {{ $post->getExternalDomain() }}
            </div>
            @endif
        </div>

        {{-- Content --}}
        <div class="flex flex-col justify-between">
            {{-- Meta Header --}}
            <div>
                <div class="flex flex-wrap items-center gap-3 text-xs font-mono text-gray-500 dark:text-gray-400 mb-3">
                    <time datetime="{{ $post->getDate()->format('Y-m-d') }}" class="flex items-center gap-1.5 text-primary-600 dark:text-primary-400">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        {{ $post->getDate()->format('M j, Y') }}
                    </time>

                    @if($post->author)
                    <span class="w-1 h-1 rounded-full bg-gray-300 dark:bg-gray-700"></span>
                    <div class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                        @if($post->author_link)
                        <a href="{{ $post->author_link }}" class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors" target="_blank" rel="nofollow noopener">
                            {{ $post->author }}
                        </a>
                        @else
                        <span>{{ $post->author }}</span>
                        @endif
                    </div>
                    @endif

                    @if (!empty($post->updated_at) && $post->getUpdatedAt() > $post->getDate())
                        <span class="w-1 h-1 rounded-full bg-gray-300 dark:bg-gray-700"></span>
                        <span class="text-accent-600 dark:text-accent-400">Updated: {{ $post->getUpdatedAt()->format('M j, Y') }}</span>
                    @endif

                    <span class="w-1 h-1 rounded-full bg-gray-300 dark:bg-gray-700"></span>
                    <div class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path>
                        </svg>
                        <span>{{ $post->getReadingTime() }} min</span>
                    </div>
                </div>

                {{-- Title --}}
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors leading-tight line-clamp-2">
                    <a href="{{ $page->getPostUrl($post) }}" class="focus:outline-none">
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        {{ $post->title }}
                    </a>
                </h2>

                {{-- Excerpt --}}
                <div class="text-base text-gray-600 dark:text-gray-400 mb-4 leading-relaxed line-clamp-3">
                    {!! $post->getExcerpt(160) !!}
                </div>

                {{-- Tags --}}
                @if($post->tags)
                <div class="flex flex-wrap gap-2 mb-4">
                    @foreach(array_slice($post->tags, 0, 4) as $tag)
                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-primary-50 dark:hover:bg-primary-900/30 transition-colors">
                        {{ $tag }}
                    </span>
                    @endforeach
                </div>
                @endif
            </div>

            {{-- Read More CTA --}}
            <div class="flex items-center text-primary-600 dark:text-primary-400 font-semibold text-sm {{ $page->locale === 'ar' ? 'group-hover:-translate-x-2' : 'group-hover:translate-x-2' }} transition-transform duration-300 mt-2">
                {{ $page->trans('blog.read_article') }}
                <svg class="w-4 h-4 {{ $page->locale === 'ar' ? 'mr-2 rotate-180' : 'ml-2' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </div>
        </div>
    </div>
</article>