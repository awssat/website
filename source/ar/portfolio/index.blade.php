@extends('_layouts.layout')

@php
    $page->locale = 'ar';
@endphp

@section('title', 'الأعمال - ' . $page->siteName)

@section('main')
<div class="w-full min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4">
        {{-- Header --}}
        <header class="text-center mb-16 animate-on-scroll">
            <h1 class="text-5xl md:text-6xl font-bold text-gradient-primary mb-6">
                {{ $page->trans('portfolio.title') }}
            </h1>
            <p class="text-xl text-gray-600 dark-mode:text-gray-400 max-w-3xl mx-auto">
                {{ $page->trans('portfolio.description') }}
            </p>
        </header>

        {{-- Filter Tabs --}}
        <div class="flex justify-center mb-12 animate-on-scroll" x-data="{ activeFilter: 'all' }">
            <div class="inline-flex rounded-xl bg-gray-100 dark-mode:bg-gray-800 p-1 shadow-lg">
                <button @click="activeFilter = 'all'"
                        :class="activeFilter === 'all' ? 'bg-white dark-mode:bg-gray-700 shadow-md' : ''"
                        class="px-6 py-3 rounded-lg font-semibold text-sm transition-all duration-200">
                    {{ $page->trans('portfolio.filter.all') }}
                </button>
                <button @click="activeFilter = 'prs'"
                        :class="activeFilter === 'prs' ? 'bg-white dark-mode:bg-gray-700 shadow-md' : ''"
                        class="px-6 py-3 rounded-lg font-semibold text-sm transition-all duration-200">
                    {{ $page->trans('portfolio.filter.prs') }}
                </button>
                <button @click="activeFilter = 'projects'"
                        :class="activeFilter === 'projects' ? 'bg-white dark-mode:bg-gray-700 shadow-md' : ''"
                        class="px-6 py-3 rounded-lg font-semibold text-sm transition-all duration-200">
                    {{ $page->trans('portfolio.filter.projects') }}
                </button>
            </div>
        </div>

        {{-- Portfolio Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" x-data="{ activeFilter: 'all' }">
            @foreach($page->allPortfolio()->sortByDesc('date') as $item)
                <div x-show="activeFilter === 'all' || (activeFilter === 'prs' && '{{ $item->type }}' === 'laravel-pr') || (activeFilter === 'projects' && '{{ $item->type }}' === 'project')"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform scale-90"
                     x-transition:enter-end="opacity-100 transform scale-100"
                     class="animate-on-scroll">
                    @include('_layouts.portfolio.partial.card', ['item' => $item])
                </div>
            @endforeach
        </div>

        {{-- Empty State --}}
        <div x-show="activeFilter !== 'all' && ![...document.querySelectorAll('[x-show]')].some(el => el.style.display !== 'none' && el !== $el)"
             class="text-center py-20">
            <svg class="w-24 h-24 mx-auto text-gray-300 dark-mode:text-gray-700 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
            </svg>
            <p class="text-gray-500 dark-mode:text-gray-400 text-lg">لا توجد عناصر في هذا التصنيف</p>
        </div>
    </div>
</div>
@endsection
