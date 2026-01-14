@extends('_layouts.layout')

@section('main')
<div class="w-full min-h-screen py-24 relative overflow-hidden">
    {{-- Background Ambience --}}
    <div class="fixed top-0 right-0 w-[500px] h-[500px] bg-primary-500/5 blur-[100px] rounded-full pointer-events-none z-0"></div>
    <div class="fixed bottom-0 left-0 w-[500px] h-[500px] bg-accent-500/5 blur-[100px] rounded-full pointer-events-none z-0"></div>

    <div class="max-w-7xl mx-auto px-4 flex flex-col lg:flex-row gap-12 relative z-10">
        {{-- Main Content --}}
        <div class="flex-1 w-full lg:w-3/4">
            @yield('blog_main')
        </div>

        {{-- Sidebar --}}
        <aside class="w-full lg:w-1/4">
            <div class="lg:sticky lg:top-32 space-y-6">
                {{-- About Widget - Enhanced Design --}}
                <div class="relative bg-gradient-to-br from-white via-white to-primary-50/30 dark:from-gray-900 dark:via-gray-900 dark:to-primary-900/20 rounded-3xl p-6 shadow-xl border border-gray-200 dark:border-gray-800 backdrop-blur-xl animate-on-scroll overflow-hidden">
                    {{-- Decorative Background Elements --}}
                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary-500/5 blur-3xl rounded-full"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-accent-500/5 blur-2xl rounded-full"></div>

                    <div class="relative">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="relative">
                                <img src="/assets/images/logo.png" class="w-12 h-12 transition-transform hover:rotate-12 duration-300" alt="Awssat Logo">
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white dark:border-gray-900 animate-pulse"></div>
                            </div>
                            <div>
                                <span class="font-bold text-xl text-gray-900 dark:text-white block">Awssat</span>
                                <span class="text-xs text-gray-500 dark:text-gray-400 font-medium">Engineering Blog</span>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed mb-4">
                            Building <span class="font-semibold text-primary-600 dark:text-primary-400">robust web apps</span>, contributing to <span class="font-semibold text-accent-600 dark:text-accent-400">open source</span>, and sharing Laravel expertise.
                        </p>

                        {{-- Quick Stats --}}
                        <div class="grid grid-cols-2 gap-3 pt-4 border-t border-gray-200 dark:border-gray-800">
                            <div class="text-center p-2 rounded-lg bg-gray-50 dark:bg-gray-800/50">
                                <div class="text-lg font-bold text-primary-600 dark:text-primary-400">2.2K+</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">GitHub Stars</div>
                            </div>
                            <div class="text-center p-2 rounded-lg bg-gray-50 dark:bg-gray-800/50">
                                <div class="text-lg font-bold text-accent-600 dark:text-accent-400">6</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">Laravel PRs</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tags Section - Enhanced with Floating Effect --}}
                <nav role="navigation" class="bg-white/90 dark:bg-gray-900/90 rounded-3xl p-6 shadow-xl border border-gray-200 dark:border-gray-800 backdrop-blur-xl animate-on-scroll delay-100 hover:shadow-2xl transition-shadow duration-300">
                    <h3 class="text-sm font-bold text-gray-900 dark:text-white mb-5 uppercase tracking-wider flex items-center">
                        <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-primary-100 dark:bg-primary-900/30 mr-3">
                            <svg class="w-4 h-4 text-primary-600 dark:text-primary-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        Explore Topics
                    </h3>
                    <div class="flex flex-col gap-2">
                        @foreach ($tags as $tag)
                        <a href="{{ $page->getTagUrl($tag->filename) }}"
                           title="Browse {{ $tag->title }}"
                           class="group flex items-center justify-between px-4 py-3 rounded-xl transition-all duration-200
                                  @if ($page->isActive($tag->filename))
                                      bg-gradient-to-r from-primary-600 to-primary-700 text-white shadow-lg shadow-primary-500/30 transform scale-[1.02]
                                  @else
                                      bg-gray-50 dark:bg-gray-800/50 text-gray-700 dark:text-gray-300 hover:bg-primary-50 dark:hover:bg-primary-900/20 hover:text-primary-600 dark:hover:text-primary-400 hover:scale-[1.02] hover:shadow-md
                                  @endif">
                            <span class="text-sm font-semibold">{{ $tag->title }}</span>
                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        @endforeach
                    </div>
                </nav>

                {{-- RSS Feed - Enhanced Design --}}
                <a href="/blog/feed.atom"
                   class="group relative flex items-center justify-center p-5 rounded-2xl bg-gradient-to-br from-orange-500/10 via-orange-500/5 to-red-500/10 border border-orange-200/50 dark:border-orange-900/30 text-orange-600 dark:text-orange-400 hover:scale-[1.02] hover:shadow-xl transition-all duration-300 overflow-hidden">
                    {{-- Animated Background --}}
                    <div class="absolute inset-0 bg-gradient-to-r from-orange-500/0 via-orange-500/10 to-orange-500/0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>

                    <div class="relative flex items-center gap-3">
                        <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-orange-100 dark:bg-orange-900/30 group-hover:rotate-12 transition-transform duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 5c7.18 0 13 5.82 13 13M6 11a7 7 0 017 7m-6 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                            </svg>
                        </div>
                        <div class="text-left">
                            <div class="text-sm font-bold">Subscribe via RSS</div>
                            <div class="text-xs text-orange-500/80 dark:text-orange-400/80">Never miss an update</div>
                        </div>
                    </div>
                </a>
            </div>
        </aside>
    </div>
</div>
@stop
