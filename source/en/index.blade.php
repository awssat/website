@extends('_layouts.layout')

@php
    $page->locale = 'en';
@endphp

@section('title', $page->siteName . ' - Building the Future of Web')

@section('main')
<div class="w-full overflow-hidden gradient-mesh">
    {{-- Hero Section --}}
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden px-4">
        {{-- Floating Geometric Shapes --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-primary-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float"></div>
            <div class="absolute top-40 right-20 w-96 h-96 bg-accent-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float-slow"></div>
            <div class="absolute -bottom-32 left-1/3 w-80 h-80 bg-primary-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float-fast"></div>
        </div>

        {{-- Content --}}
        <div class="relative z-10 text-center max-w-5xl mx-auto">
            {{-- Logo Animation --}}
            <div class="mb-8 flex justify-center">
                <div class="w-32 h-32 flex justify-center items-center">
                    <svg class="w-full h-full text-primary-600 dark-mode:text-primary-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60" version="1.1">
                        <g class="logo-svg-group">
                            <g class="logo-svg-colored fill-current">
                                <path class="logo-svg-outer animate-on-scroll" stroke-width="2"
                                    d="M 29.855469,0.00126721 A 29.999999,29.999999 0 0 0 1.5914255e-7,30.001266 30,30 0 0 0 60,30.001266 29.999999,29.999999 0 0 0 29.855469,0.00126721 Z m 0.240234,7.41992139 a 22.579908,22.579908 0 0 1 22.484375,22.5800774 22.579908,22.579908 0 0 1 -45.1582024,0 A 22.579908,22.579908 0 0 1 30.095703,7.4211886 Z" />
                                <path class="logo-svg-inner animate-on-scroll delay-200" stroke-width="2"
                                    d="m 29.834961,11.906314 a 18.096309,18.096309 0 0 0 -17.93164,18.095703 18.09668,18.09668 0 0 0 36.193359,0 18.096309,18.096309 0 0 0 -18.261719,-18.095703 z m -0.01367,7.552735 a 10.544895,10.544895 0 0 1 10.724609,10.542968 10.544922,10.544922 0 0 1 -21.089844,0 10.544895,10.544895 0 0 1 10.365235,-10.542968 z" />
                            </g>
                        </g>
                    </svg>
                </div>
            </div>

            {{-- Title --}}
            <h1 class="text-6xl md:text-7xl lg:text-8xl font-bold mb-6 animate-on-scroll">
                <span class="text-gradient-primary">{{ $page->trans('home.title') }}</span>
            </h1>

            {{-- Subtitle --}}
            <p class="text-2xl md:text-3xl font-semibold text-gray-700 dark-mode:text-gray-300 mb-4 animate-on-scroll delay-200">
                {{ $page->trans('home.subtitle') }}
            </p>

            {{-- Description --}}
            <p class="text-lg md:text-xl text-gray-600 dark-mode:text-gray-400 max-w-2xl mx-auto mb-12 animate-on-scroll delay-300">
                {{ $page->trans('home.description') }}
            </p>

            {{-- CTA Button --}}
            <div class="animate-on-scroll delay-400">
                <a href="{{ url('/en/portfolio') }}"
                   class="magnetic-button inline-block px-8 py-4 bg-primary-600 hover:bg-primary-700 text-white rounded-2xl font-semibold text-lg shadow-2xl hover:shadow-glow transition-all duration-300"
                   x-data="magneticButton()"
                   @mousemove="handleMouseMove"
                   @mouseleave="handleMouseLeave">
                    {{ $page->trans('home.cta') }}
                    <svg class="inline-block w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>

            {{-- Navigation Menu --}}
            <div class="mt-16 animate-on-scroll delay-500">
                @include('_layouts.partial.side_menu', ['isHome' => true])
            </div>
        </div>

        {{-- Scroll Indicator --}}
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 bounce">
            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    {{-- Featured Work Section --}}
    <section class="py-24 px-4 bg-white dark-mode:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 animate-on-scroll">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark-mode:text-gray-100 mb-4">
                    {{ $page->trans('home.featured_work') }}
                </h2>
                <p class="text-lg text-gray-600 dark-mode:text-gray-400">
                    {{ $page->trans('portfolio.description') }}
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if(isset($page->portfolio_en))
                    @foreach($page->portfolio_en->where('featured', true)->take(6) as $item)
                        <div class="perspective-container animate-on-scroll"
                             x-data="tiltCard()"
                             @mousemove="handleMouseMove"
                             @mouseleave="handleMouseLeave"
                             x-intersect="$el.classList.add('stagger-item')">
                            @include('_layouts.portfolio.partial.card', ['item' => $item])
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="text-center mt-12 animate-on-scroll">
                <a href="{{ url('/en/portfolio') }}" class="inline-flex items-center px-6 py-3 rounded-xl font-semibold text-primary-600 dark-mode:text-primary-400 hover:text-primary-700 dark-mode:hover:text-primary-300 transition-colors">
                    {{ $page->trans('common.view_all') }}
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Recent Blog Posts --}}
    @if(isset($page->posts_en) && $page->posts_en->count() > 0)
    <section class="py-24 px-4 bg-gray-50 dark-mode:bg-gray-950">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 animate-on-scroll">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark-mode:text-gray-100 mb-4">
                    {{ $page->trans('home.recent_posts') }}
                </h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($page->posts_en->take(3) as $post)
                    <article class="bg-white dark-mode:bg-gray-900 rounded-2xl overflow-hidden shadow-lg hover-lift animate-on-scroll">
                        <div class="p-6">
                            <time class="text-sm text-gray-500 dark-mode:text-gray-400">
                                {{ date('F j, Y', $post->date) }}
                            </time>
                            <h3 class="text-xl font-bold text-gray-900 dark-mode:text-gray-100 mt-2 mb-3">
                                <a href="{{ $post->getUrl() }}" class="hover:text-primary-600 dark-mode:hover:text-primary-400 transition-colors">
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <p class="text-gray-600 dark-mode:text-gray-400 mb-4 line-clamp-3">
                                {{ $post->getExcerpt(150) }}
                            </p>
                            <a href="{{ $post->getUrl() }}" class="inline-flex items-center text-sm font-semibold text-primary-600 dark-mode:text-primary-400 hover:text-primary-700 dark-mode:hover:text-primary-300 transition-colors">
                                {{ $page->trans('blog.read_more') }}
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif
</div>
@endsection
