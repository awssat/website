@php
    $locale = $page->locale ?? 'en';
    $isArabic = $locale === 'ar';
@endphp

<div class="w-full min-h-screen py-24 relative overflow-hidden bg-gray-50 dark:bg-gray-950">
    {{-- Background Decoration --}}
    <div class="fixed top-0 right-0 w-[500px] h-[500px] bg-primary-500/5 blur-[100px] rounded-full pointer-events-none"></div>
    <div class="fixed bottom-0 left-0 w-[500px] h-[500px] bg-accent-500/5 blur-[100px] rounded-full pointer-events-none"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 relative z-10">
        {{-- Header --}}
        <div class="text-center mb-12 md:mb-16 animate-on-scroll">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-100/50 dark:bg-primary-900/30 text-primary-600 dark:text-primary-400 text-sm font-semibold mb-6">
                <span class="flex h-2 w-2 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-primary-500"></span>
                </span>
                {{ $isArabic ? 'لنتواصل' : 'Let\'s Connect' }}
            </div>

            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
                {{ $isArabic ? 'تواصل' : 'Get in' }} <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-accent-500">{{ $isArabic ? 'معنا' : 'Touch' }}</span>
            </h1>

            <p class="text-lg sm:text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto leading-relaxed">
                @if($isArabic)
                    سواء كان لديك مشروع في ذهنك، أو تريد مناقشة تطوير Laravel، أو مجرد إلقاء التحية — يسعدنا التواصل معك.
                @else
                    Whether you have a project in mind, want to discuss Laravel development, or just say hello — we'd love to hear from you.
                @endif
            </p>
        </div>

        {{-- Contact Methods Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 mb-12">
            {{-- Email --}}
            <a href="mailto:hello@awssat.com"
               class="group relative bg-white dark:bg-gray-900 rounded-2xl p-6 sm:p-8 border border-gray-200 dark:border-gray-800 hover:border-primary-300 dark:hover:border-primary-700 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-primary-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>

                <div class="relative">
                    <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-gradient-to-br from-primary-500 to-primary-600 text-white mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $isArabic ? 'البريد الإلكتروني' : 'Email' }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-3 text-sm">{{ $isArabic ? 'راسلنا في أي وقت' : 'Drop us a line anytime' }}</p>
                    <div class="flex items-center text-primary-600 dark:text-primary-400 font-medium group-hover:gap-2 transition-all">
                        <span class="font-mono text-sm sm:text-base">hello@awssat.com</span>
                        <svg class="w-5 h-5 {{ $isArabic ? 'mr-2 group-hover:-translate-x-1' : 'ml-2 group-hover:translate-x-1' }} transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $isArabic ? 'M11 17l-5-5m0 0l5-5m-5 5h12' : 'M13 7l5 5m0 0l-5 5m5-5H6' }}"></path>
                        </svg>
                    </div>
                </div>
            </a>

            {{-- Twitter/X --}}
            <a href="https://x.com/awssat_dev" target="_blank" rel="noopener noreferrer"
               class="group relative bg-white dark:bg-gray-900 rounded-2xl p-6 sm:p-8 border border-gray-200 dark:border-gray-800 hover:border-blue-300 dark:hover:border-blue-700 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>

                <div class="relative">
                    <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-gradient-to-br from-blue-400 to-blue-500 text-white mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                        </svg>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $isArabic ? 'تويتر / X' : 'Twitter / X' }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-3 text-sm">{{ $isArabic ? 'تابعنا للحصول على التحديثات' : 'Follow for updates & tips' }}</p>
                    <div class="flex items-center text-blue-600 dark:text-blue-400 font-medium group-hover:gap-2 transition-all">
                        <span class="font-mono text-sm sm:text-base">@awssat_dev</span>
                        <svg class="w-5 h-5 {{ $isArabic ? 'mr-2 group-hover:-translate-x-1' : 'ml-2 group-hover:translate-x-1' }} transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $isArabic ? 'M11 17l-5-5m0 0l5-5m-5 5h12' : 'M13 7l5 5m0 0l-5 5m5-5H6' }}"></path>
                        </svg>
                    </div>
                </div>
            </a>

            {{-- GitHub --}}
            <a href="https://github.com/awssat" target="_blank" rel="noopener noreferrer"
               class="group relative bg-white dark:bg-gray-900 rounded-2xl p-6 sm:p-8 border border-gray-200 dark:border-gray-800 hover:border-gray-400 dark:hover:border-gray-600 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-gray-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>

                <div class="relative">
                    <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-gradient-to-br from-gray-700 to-gray-800 text-white mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">GitHub</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-3 text-sm">{{ $isArabic ? 'تابع مشاريعنا مفتوحة المصدر' : 'Check out our open source work' }}</p>
                    <div class="flex items-center text-gray-700 dark:text-gray-300 font-medium group-hover:gap-2 transition-all">
                        <span class="font-mono text-sm sm:text-base">github.com/awssat</span>
                        <svg class="w-5 h-5 {{ $isArabic ? 'mr-2 group-hover:-translate-x-1' : 'ml-2 group-hover:translate-x-1' }} transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $isArabic ? 'M11 17l-5-5m0 0l5-5m-5 5h12' : 'M13 7l5 5m0 0l-5 5m5-5H6' }}"></path>
                        </svg>
                    </div>
                </div>
            </a>

            {{-- Discord --}}
            <a href="https://discord.gg/awssat" target="_blank" rel="noopener noreferrer"
               class="group relative bg-white dark:bg-gray-900 rounded-2xl p-6 sm:p-8 border border-gray-200 dark:border-gray-800 hover:border-indigo-300 dark:hover:border-indigo-700 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>

                <div class="relative">
                    <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-500 to-indigo-600 text-white mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515a.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0a12.64 12.64 0 0 0-.617-1.25a.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057a19.9 19.9 0 0 0 5.993 3.03a.078.078 0 0 0 .084-.028a14.09 14.09 0 0 0 1.226-1.994a.076.076 0 0 0-.041-.106a13.107 13.107 0 0 1-1.872-.892a.077.077 0 0 1-.008-.128a10.2 10.2 0 0 0 .372-.292a.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127a12.299 12.299 0 0 1-1.873.892a.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028a19.839 19.839 0 0 0 6.002-3.03a.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.956-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.955-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.946 2.418-2.157 2.418z"/>
                        </svg>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Discord</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-3 text-sm">{{ $isArabic ? 'انضم إلى مجتمعنا' : 'Join our community' }}</p>
                    <div class="flex items-center text-indigo-600 dark:text-indigo-400 font-medium group-hover:gap-2 transition-all">
                        <span class="font-mono text-sm sm:text-base">discord.gg/awssat</span>
                        <svg class="w-5 h-5 {{ $isArabic ? 'mr-2 group-hover:-translate-x-1' : 'ml-2 group-hover:translate-x-1' }} transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $isArabic ? 'M11 17l-5-5m0 0l5-5m-5 5h12' : 'M13 7l5 5m0 0l-5 5m5-5H6' }}"></path>
                        </svg>
                    </div>
                </div>
            </a>
        </div>

        {{-- Additional Info --}}
        <div class="bg-gradient-to-br from-primary-50 to-accent-50 dark:from-primary-900/20 dark:to-accent-900/20 rounded-2xl p-6 sm:p-8 border border-primary-200 dark:border-primary-800 text-center animate-on-scroll">
            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                <span class="font-semibold text-gray-900 dark:text-white">{{ $isArabic ? 'تبحث عن خبرة في Laravel؟' : 'Looking for Laravel expertise?' }}</span><br>
                @if($isArabic)
                    نحن متخصصون في بناء تطبيقات قوية وقابلة للتطوير مع <span class="text-primary-600 dark:text-primary-400 font-semibold">6 طلبات دمج</span> في Laravel الأساسي و <span class="text-accent-600 dark:text-accent-400 font-semibold">أكثر من 2,200 نجمة</span> على GitHub. لنبني معًا شيئًا مذهلاً.
                @else
                    We specialize in building robust, scalable applications with <span class="text-primary-600 dark:text-primary-400 font-semibold">6 merged PRs</span> to the Laravel core and <span class="text-accent-600 dark:text-accent-400 font-semibold">2,200+ GitHub stars</span>. Let's build something amazing together.
                @endif
            </p>
        </div>
    </div>
</div>
