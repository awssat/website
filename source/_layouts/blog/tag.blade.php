@extends('_layouts.blog.layout')

@section('title') Posts tagged under "{{ $page->title }}" — @parent @endsection

@section('blog_main')
    {{-- Enhanced Tag Hero Header --}}
    <div class="relative mb-12 md:mb-16 animate-on-scroll px-4 sm:px-0">
        {{-- Background Decoration --}}
        <div class="absolute -top-8 -left-8 w-32 sm:w-48 md:w-64 h-32 sm:h-48 md:h-64 bg-primary-500/5 blur-3xl rounded-full pointer-events-none"></div>
        <div class="absolute -bottom-8 -right-8 w-24 sm:w-36 md:w-48 h-24 sm:h-36 md:h-48 bg-accent-500/5 blur-2xl rounded-full pointer-events-none"></div>

        <div class="relative">
            {{-- Breadcrumb / Badge --}}
            <div class="inline-flex items-center gap-2 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full bg-gradient-to-r from-primary-100 to-accent-100 dark:from-primary-900/50 dark:to-accent-900/50 border border-primary-200/50 dark:border-primary-800/50 text-primary-700 dark:text-primary-300 text-xs sm:text-sm font-semibold mb-4 sm:mb-6 shadow-lg">
                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                </svg>
                <span>Topic</span>
            </div>

            {{-- Tag Title --}}
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold text-gray-900 dark:text-white mb-4 sm:mb-6 tracking-tight">
                <span class="inline-block bg-gradient-to-r from-primary-600 via-primary-500 to-accent-500 bg-clip-text text-transparent">
                    #{{ $page->title }}
                </span>
            </h1>

            {{-- Description & Stats --}}
            <div class="flex flex-wrap items-center gap-4 mb-4 sm:mb-6">
                <p class="text-base sm:text-lg md:text-xl text-gray-600 dark:text-gray-400 leading-relaxed">
                    Exploring articles and tutorials about <span class="font-bold text-gray-900 dark:text-white">{{ $page->title }}</span>
                </p>
            </div>

            {{-- Post Count Badge --}}
            @php
                $postCount = count($page->postsOfTag($posts));
            @endphp
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 shadow-sm">
                <svg class="w-5 h-5 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
                <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">
                    {{ $postCount }} {{ $postCount === 1 ? 'Article' : 'Articles' }}
                </span>
            </div>
        </div>
    </div>

    {{-- Posts List --}}
    <div class="space-y-8 mb-12">
        @foreach ($page->postsOfTag($posts) as $post)
            @include('_layouts.blog.partial.post_inline')
        @endforeach
    </div>

    {{-- Empty State (if no posts) --}}
    @if(count($page->postsOfTag($posts)) === 0)
    <div class="text-center py-16">
        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gray-100 dark:bg-gray-800 mb-6">
            <svg class="w-10 h-10 text-gray-400 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">No articles yet</h3>
        <p class="text-gray-600 dark:text-gray-400 mb-6">
            We haven't published any articles under this topic yet. Check back soon!
        </p>
        <a href="{{ $page->localUrl('blog') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-xl transition-colors shadow-lg hover:shadow-xl">
            Browse All Articles
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
            </svg>
        </a>
    </div>
    @endif
@endsection