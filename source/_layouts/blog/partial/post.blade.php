{{-- Hero Section with Cover Image --}}
<div class="relative w-full mb-12 -mt-8">
    {{-- Cover Image - Full width, no container --}}
    <div class="relative w-full">
        <div class="relative aspect-[40/21] overflow-hidden">
            <img src="{{ $page->getCoverImage() }}"
                 alt="{{ $page->title }}"
                 class="w-full h-full object-cover object-center"
                 loading="eager">

            {{-- Subtle vignette effect --}}
            <div class="absolute inset-0 bg-gradient-to-t from-white/10 via-transparent to-transparent dark:from-black/10"></div>
        </div>

        {{-- Floating Date Badge - Bottom Right --}}
        <div class="absolute bottom-6 right-6">
            <div class="inline-flex items-center gap-2.5 px-5 py-3 rounded-2xl bg-white/90 dark:bg-gray-900/90 backdrop-blur-md shadow-2xl border border-gray-200/50 dark:border-gray-700/50">
                <svg class="w-5 h-5 text-primary-600 dark:text-primary-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                </svg>
                <time datetime="{{ $page->getDate()->toIso8601String() }}" class="text-sm font-bold text-gray-900 dark:text-white">
                    {{ $page->getDate()->format('F j, Y') }}
                </time>
            </div>
        </div>
    </div>
</div>

<div class="p-8 md:p-12">
    {{-- Header --}}
    <header class="mb-10">
        <h1 id="article-title" class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white leading-tight mb-6 text-balance">
            {{ $page->title }}
        </h1>

        {{-- Enhanced Meta Information --}}
        <div class="flex flex-wrap items-center gap-4 text-sm mb-6 pb-6 border-b border-gray-200 dark:border-gray-800">
            {{-- Author --}}
            <div class="flex items-center gap-2.5">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-gradient-to-br from-primary-500 to-accent-500 text-white font-bold text-sm shadow-lg">
                    {{ strtoupper(substr($page->author ?? 'A', 0, 1)) }}
                </div>
                <div>
                    @if ($page->author_link !== null)
                    <a href="{{ $page->author_link }}" class="font-semibold text-gray-900 dark:text-white hover:text-primary-600 dark:hover:text-primary-400 transition-colors block"
                       target="_blank" rel="nofollow noopener noreferrer" title="external page of {{ $page->author }}">
                        {{ $page->author }}
                    </a>
                    @else
                    <span class="font-semibold text-gray-900 dark:text-white block">{{ $page->author }}</span>
                    @endif
                    <span class="text-xs text-gray-500 dark:text-gray-400">Author</span>
                </div>
            </div>

            <span class="text-gray-300 dark:text-gray-700">|</span>

            {{-- Date Info --}}
            <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                </svg>
                <span>Published {{ $page->getDate()->diffForHumans() }}</span>
            </div>

            @if (!empty($page->updated_at) && $page->getUpdatedAt() > $page->getDate())
            <span class="text-gray-300 dark:text-gray-700">|</span>
            <div class="flex items-center gap-2 text-accent-600 dark:text-accent-400">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z"></path>
                </svg>
                <span>Updated {{ $page->getUpdatedAt()->diffForHumans() }}</span>
            </div>
            @endif
        </div>

        {{-- Tags --}}
        @if ($page->tags)
        <div class="flex flex-wrap gap-2">
            @foreach ($page->tags as $tag)
            <a href="{{ $page->getTagUrl($tag) }}"
               class="group inline-flex items-center px-4 py-2 rounded-xl text-sm font-semibold bg-gradient-to-br from-gray-100 to-gray-50 dark:from-gray-800 dark:to-gray-900 text-gray-700 dark:text-gray-300 hover:from-primary-100 hover:to-primary-50 dark:hover:from-primary-900 dark:hover:to-primary-800 hover:text-primary-700 dark:hover:text-primary-300 border border-gray-200 dark:border-gray-700 hover:border-primary-300 dark:hover:border-primary-700 transition-all hover:scale-105 shadow-sm hover:shadow-md">
                @if (in_array($tag, ['tweet', 'link', 'video', 'original']))
                <svg class="w-4 h-4 fill-current mr-2 opacity-60 group-hover:opacity-100 transition-opacity" viewBox="0 0 24 24">
                    @if ($tag == 'tweet')
                    <path d="M23.643 4.937c-.835.37-1.732.62-2.675.733a4.67 4.67 0 0 0 2.048-2.578 9.3 9.3 0 0 1-2.958 1.13 4.66 4.66 0 0 0-7.938 4.25 13.229 13.229 0 0 1-9.602-4.868c-.4.69-.63 1.49-.63 2.342A4.66 4.66 0 0 0 3.96 9.824a4.647 4.647 0 0 1-2.11-.583v.06a4.66 4.66 0 0 0 3.737 4.568 4.692 4.692 0 0 1-2.104.08 4.661 4.661 0 0 0 4.352 3.234 9.348 9.348 0 0 1-5.786 1.995 9.5 9.5 0 0 1-1.112-.065a13.175 13.175 0 0 0 7.14 2.093c8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602a9.47 9.47 0 0 0 2.323-2.41z"></path>
                    @elseif($tag == 'link')
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z" />
                    @elseif($tag == 'video')
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path d="M18 4l2 4h-3l-2-4h-2l2 4h-3l-2-4H8l2 4H7L5 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V4h-4z" />
                    @elseif($tag == 'original')
                    <path d="M23,12l-2.44-2.79l0.34-3.69l-3.61-0.82L15.4,1.5L12,2.96L8.6,1.5L6.71,4.69L3.1,5.5L3.44,9.2L1,12l2.44,2.79l-0.34,3.7 l3.61,0.82L8.6,22.5l3.4-1.47l3.4,1.46l1.89-3.19l3.61-0.82l-0.34-3.69L23,12z M10.09,16.72l-3.8-3.81l1.48-1.48l2.32,2.33 l5.85-5.87l1.48,1.48L10.09,16.72z" />
                    @else
                    <path d="M17.63 5.84C17.27 5.33 16.67 5 16 5L5 5.01C3.9 5.01 3 5.9 3 7v10c0 1.1.9 1.99 2 1.99L16 19c.67 0 1.27-.33 1.63-.84L22 12l-4.37-6.16z" />
                    @endif
                </svg>
                @endif
                {{ $tag }}
            </a>
            @endforeach
        </div>
        @endif
    </header>

    {{-- Article Body --}}
    <section id="article-body" class="prose prose-lg md:prose-xl dark:prose-invert max-w-none
        prose-headings:font-bold prose-headings:text-gray-900 dark:prose-headings:text-white
        prose-p:text-gray-700 dark:prose-p:text-gray-300 prose-p:leading-relaxed
        prose-a:text-primary-600 dark:prose-a:text-primary-400 prose-a:no-underline hover:prose-a:underline
        prose-strong:text-gray-900 dark:prose-strong:text-white prose-strong:font-semibold
        prose-code:text-primary-600 dark:prose-code:text-primary-400 prose-code:bg-gray-100 dark:prose-code:bg-gray-800 prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded
        prose-pre:bg-gray-900 dark:prose-pre:bg-gray-950 prose-pre:border prose-pre:border-gray-800
        prose-img:rounded-xl prose-img:shadow-lg
        prose-blockquote:border-l-4 prose-blockquote:border-primary-500 prose-blockquote:bg-gray-50 dark:prose-blockquote:bg-gray-800 prose-blockquote:py-1 prose-blockquote:px-4 prose-blockquote:rounded-r-lg
        prose-ul:list-disc prose-ol:list-decimal
        prose-li:text-gray-700 dark:prose-li:text-gray-300
        base-post-body">
        @yield('post_content')
    </section>

    {{-- Footer --}}
    <footer class="mt-12 pt-8 border-t border-gray-200 dark:border-gray-800">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <a href="https://github.com/awssat/website/tree/master/source/_posts/{{ $page->getFilename() }}.md"
               target="_blank" rel="nofollow noopener noreferrer"
               class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg font-medium text-sm transition-all hover:scale-105">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                </svg>
                Improve this post on GitHub
            </a>
        </div>
    </footer>
</div>
