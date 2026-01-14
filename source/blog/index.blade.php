---
title: Blog
description: Insights, tutorials, and updates from the Awssat team.
pagination:
    collection: posts
    perPage: 10
---
@extends('_layouts.blog.layout')

@section('title'){{'Blog'}} — @parent @endsection

@section('blog_main')

{{-- Blog Hero Header --}}
<div class="mb-16 animate-on-scroll">
    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary-100/50 dark:bg-primary-900/30 text-primary-600 dark:text-primary-400 text-sm font-semibold mb-6">
        <span>The Blog</span>
    </div>
    <h1 class="text-5xl md:text-6xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight text-balance">
        Insights on <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-accent-500">Modern Web Development</span>
    </h1>
    <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl leading-relaxed">
        Deep dives into Laravel, Vue.js, and open source engineering. We share what we learn building at scale.
    </p>
</div>

{{-- Featured Post (First Item) --}}
@if($pagination->currentPage == 1 && $pagination->items->count() > 0)
    @php $featured = $pagination->items->shift(); @endphp
    <div class="mb-16 animate-on-scroll">
        <h3 class="text-sm font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-6 flex items-center">
            <span class="w-2 h-2 rounded-full bg-accent-500 mr-2 animate-pulse"></span>
            Featured Article
        </h3>
        <article class="group relative grid md:grid-cols-2 gap-8 bg-white dark:bg-gray-900 rounded-3xl p-8 shadow-xl hover:shadow-2xl border border-gray-200 dark:border-gray-800 transition-all duration-300 overflow-hidden">
            {{-- Gradient Border Effect --}}
            <div class="absolute inset-0 rounded-3xl border-2 border-transparent bg-gradient-to-r from-primary-500 to-accent-500 opacity-0 group-hover:opacity-20 mask-border transition-opacity duration-500"></div>

            {{-- Cover Image --}}
            <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900 aspect-video md:aspect-auto shadow-inner">
                <img src="{{ $featured->getCoverImage() }}"
                     alt="{{ $featured->title }}"
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                     loading="eager">
                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>

            <div class="flex flex-col justify-center relative z-10">
                {{-- Meta Information --}}
                <div class="flex flex-wrap items-center gap-3 text-xs font-mono mb-4">
                    <time datetime="{{ $featured->getDate()->format('Y-m-d') }}" class="text-primary-600 dark:text-primary-400">
                        {{ $featured->getDate()->format('M j, Y') }}
                    </time>
                    <span class="w-1 h-1 rounded-full bg-gray-300 dark:bg-gray-700"></span>
                    @if($featured->author)
                    <div class="flex items-center gap-1.5 text-gray-600 dark:text-gray-400">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                        @if($featured->author_link)
                        <a href="{{ $featured->author_link }}" class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors" target="_blank" rel="nofollow noopener">
                            {{ $featured->author }}
                        </a>
                        @else
                        <span>{{ $featured->author }}</span>
                        @endif
                    </div>
                    @endif
                </div>

                {{-- Title --}}
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors leading-tight">
                    <a href="{{ $featured->getUrl() }}">
                        <span class="absolute inset-0"></span>
                        {{ $featured->title }}
                    </a>
                </h2>

                {{-- Excerpt --}}
                <div class="text-lg text-gray-600 dark:text-gray-400 mb-6 line-clamp-3 leading-relaxed">
                    {!! $featured->getExcerpt(180) !!}
                </div>

                {{-- Tags --}}
                @if($featured->tags)
                <div class="flex flex-wrap gap-2 mb-6">
                    @foreach(array_slice($featured->tags, 0, 3) as $tag)
                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300">
                        {{ $tag }}
                    </span>
                    @endforeach
                </div>
                @endif

                {{-- Read More CTA --}}
                <div class="flex items-center text-primary-600 dark:text-primary-400 font-bold group-hover:translate-x-2 transition-transform">
                    Read Article
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </div>
            </div>
        </article>
    </div>
@endif

{{-- Recent Posts Grid --}}
<div class="mb-12">
    <h3 class="text-sm font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-6">Recent Articles</h3>
    <div class="grid gap-8">
        @foreach ($pagination->items as $post)
            @include('_layouts.blog.partial.post_inline') 
        @endforeach
    </div>
</div>

{{-- Modern Pagination --}}
@if ($pagination->pages->count() > 1)
<nav class="flex justify-center my-16 animate-on-scroll">
    <div class="inline-flex items-center p-1 rounded-full bg-white/80 dark:bg-gray-900/80 shadow-xl border border-gray-200 dark:border-gray-800 backdrop-blur-xl">
        {{-- Previous Link --}}
        @if ($previous = $pagination->previous)
        <a href="{{ $previous }}" 
           class="w-10 h-10 flex items-center justify-center rounded-full text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-primary-600 transition-all duration-200"
           title="Previous Page">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        @else
        <span class="w-10 h-10 flex items-center justify-center rounded-full text-gray-300 dark:text-gray-700 cursor-not-allowed">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </span>
        @endif

        {{-- Page Numbers --}}
        <div class="flex items-center px-2 space-x-1">
            @foreach ($pagination->pages as $pageNumber => $path)
                <a href="{{ $path }}" 
                   class="w-8 h-8 flex items-center justify-center rounded-full text-sm font-medium transition-all duration-200 {{ $pagination->currentPage == $pageNumber ? 'bg-primary-600 text-white shadow-lg scale-110' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                    {{ $pageNumber }}
                </a>
            @endforeach
        </div>

        {{-- Next Link --}}
        @if ($next = $pagination->next)
        <a href="{{ $next }}" 
           class="w-10 h-10 flex items-center justify-center rounded-full text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-primary-600 transition-all duration-200"
           title="Next Page">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
        @else
        <span class="w-10 h-10 flex items-center justify-center rounded-full text-gray-300 dark:text-gray-700 cursor-not-allowed">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </span>
        @endif
    </div>
</nav>
@endif
@stop