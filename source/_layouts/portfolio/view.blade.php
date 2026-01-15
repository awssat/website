@extends('_layouts.layout')

@section('title', $page->title . ' - ' . $page->siteName)

@section('main')
<div class="w-full">
    <article class="max-w-4xl mx-auto px-4 py-12">
        {{-- Back Button --}}
        <div class="mb-8">
            <a href="{{ url('/' . ($page->locale ?? 'en') . '/portfolio') }}" class="inline-flex items-center text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                <svg class="w-5 h-5 {{ $page->locale === 'ar' ? 'ml-2 rtl:mirror' : 'mr-2' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                {{ $page->trans('common.back') }}
            </a>
        </div>

        {{-- Header --}}
        <header class="mb-8 scroll-reveal">
            {{-- Type Badge --}}
            <div class="mb-4">
                @if($page->type === 'laravel-pr')
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-primary-100 text-primary-700 dark:bg-primary-900 dark:text-primary-300">
                        <svg class="w-4 h-4 {{ $page->locale === 'ar' ? 'ml-2' : 'mr-2' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path>
                        </svg>
                        {{ $page->trans('portfolio.type.laravel_pr') }} #{{ $page->pr_number ?? '' }}
                    </span>
                @else
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-accent-100 text-accent-700 dark:bg-accent-900 dark:text-accent-300">
                        <svg class="w-4 h-4 {{ $page->locale === 'ar' ? 'ml-2' : 'mr-2' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 6a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 100 4v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2a2 2 0 100-4V6z"></path>
                        </svg>
                        {{ $page->trans('portfolio.type.project') }}
                    </span>
                @endif
            </div>

            {{-- Title --}}
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-gray-100 mb-4">
                {{ $page->title }}
            </h1>

            {{-- Description --}}
            <p class="text-xl text-gray-600 dark:text-gray-400 mb-6">
                {{ $page->description }}
            </p>

            {{-- Meta Info --}}
            <div class="flex flex-wrap items-center gap-6 text-sm text-gray-500 dark:text-gray-400">
                {{-- Date --}}
                @if($page->date)
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span>{{ date('F Y', $page->date) }}</span>
                </div>
                @endif

                {{-- Status/Stars --}}
                @if($page->type === 'laravel-pr' && $page->pr_status === 'merged')
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-medium text-green-600 dark:text-green-400">{{ $page->trans('portfolio.status.merged') }}</span>
                </div>
                @elseif(isset($page->stars))
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <span class="font-medium">{{ $page->stars }}+ stars</span>
                </div>
                @endif

                {{-- Author --}}
                @if(isset($page->author))
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span>{{ $page->author }}</span>
                </div>
                @endif
            </div>
        </header>

        {{-- Tech Stack --}}
        @if($page->tech_stack)
        <div class="mb-8 scroll-reveal">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-3">{{ $page->trans('portfolio.tech_stack') }}</h2>
            <div class="flex flex-wrap gap-3">
                @foreach($page->tech_stack as $tech)
                    <span class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-300 border border-gray-200 dark:border-gray-700">
                        {{ $tech }}
                    </span>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Links --}}
        <div class="flex flex-wrap gap-4 mb-12 scroll-reveal">
            @if($page->github_url)
            <a href="{{ $page->github_url }}" target="_blank" rel="noopener" class="inline-flex items-center px-6 py-3 rounded-xl font-semibold text-white bg-gray-900 dark:bg-gray-700 hover:bg-gray-800 dark:hover:bg-gray-600 transition-all shadow-lg hover:shadow-xl">
                <svg class="w-5 h-5 {{ $page->locale === 'ar' ? 'ml-2' : 'mr-2' }}" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                </svg>
                {{ $page->trans('portfolio.view_on_github') }}
            </a>
            @endif

            @if(isset($page->demo_url) && $page->demo_url)
            <a href="{{ $page->demo_url }}" target="_blank" rel="noopener" class="inline-flex items-center px-6 py-3 rounded-xl font-semibold text-white bg-primary-600 hover:bg-primary-700 transition-all shadow-lg hover:shadow-xl">
                <svg class="w-5 h-5 {{ $page->locale === 'ar' ? 'ml-2' : 'mr-2' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                </svg>
                {{ $page->trans('portfolio.live_demo') }}
            </a>
            @endif
        </div>

        {{-- Content --}}
        <div class="prose prose-lg dark:prose-invert max-w-none scroll-reveal">
            @yield('portfolio_content')
        </div>
    </article>
</div>
@endsection
