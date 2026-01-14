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

        {{-- Contact Form --}}
        <div class="mb-12 animate-on-scroll">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-3">
                    {{ $isArabic ? 'أرسل لنا رسالة' : 'Send Us a Message' }}
                </h2>
                <p class="text-gray-600 dark:text-gray-400">
                    {{ $isArabic ? 'املأ النموذج أدناه وسنعود إليك في أقرب وقت ممكن' : 'Fill out the form below and we\'ll get back to you as soon as possible' }}
                </p>
            </div>

            <form action="https://formspree.io/f/YOUR_FORM_ID" method="POST" class="bg-white dark:bg-gray-900 rounded-2xl p-6 sm:p-8 border border-gray-200 dark:border-gray-800 shadow-lg">
                {{-- Name Field --}}
                <div class="mb-6">
                    <label for="name" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">
                        {{ $isArabic ? 'الاسم' : 'Name' }} <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all"
                        placeholder="{{ $isArabic ? 'أدخل اسمك' : 'Enter your name' }}"
                    >
                </div>

                {{-- Email Field --}}
                <div class="mb-6">
                    <label for="email" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">
                        {{ $isArabic ? 'البريد الإلكتروني' : 'Email' }} <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all"
                        placeholder="{{ $isArabic ? 'أدخل بريدك الإلكتروني' : 'Enter your email' }}"
                    >
                </div>

                {{-- Project Type Field --}}
                <div class="mb-6">
                    <label for="project_type" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">
                        {{ $isArabic ? 'نوع المشروع' : 'Project Type' }}
                    </label>
                    <select
                        id="project_type"
                        name="project_type"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all"
                    >
                        @if($isArabic)
                            <option value="">اختر نوع المشروع</option>
                            <option value="web-app">تطبيق ويب</option>
                            <option value="api">تطوير API</option>
                            <option value="mobile">تطبيق موبايل</option>
                            <option value="audit">فحص كود / مراجعة أمنية</option>
                            <option value="consultation">استشارة تقنية</option>
                            <option value="other">أخرى</option>
                        @else
                            <option value="">Select project type</option>
                            <option value="web-app">Web Application</option>
                            <option value="api">API Development</option>
                            <option value="mobile">Mobile App</option>
                            <option value="audit">Code Audit / Security Review</option>
                            <option value="consultation">Technical Consultation</option>
                            <option value="other">Other</option>
                        @endif
                    </select>
                </div>

                {{-- Message Field --}}
                <div class="mb-6">
                    <label for="message" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">
                        {{ $isArabic ? 'الرسالة' : 'Message' }} <span class="text-red-500">*</span>
                    </label>
                    <textarea
                        id="message"
                        name="message"
                        required
                        rows="5"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all resize-y"
                        placeholder="{{ $isArabic ? 'أخبرنا عن مشروعك...' : 'Tell us about your project...' }}"
                    ></textarea>
                </div>

                {{-- Submit Button --}}
                <button
                    type="submit"
                    class="w-full bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-semibold py-4 px-6 rounded-lg transition-all duration-300 hover:shadow-xl hover:-translate-y-0.5 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-800 flex items-center justify-center gap-2 group"
                >
                    <span>{{ $isArabic ? 'إرسال الرسالة' : 'Send Message' }}</span>
                    <svg class="w-5 h-5 {{ $isArabic ? 'group-hover:-translate-x-1 rotate-180' : 'group-hover:translate-x-1' }} transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </button>

                {{-- Form Info Note --}}
                <p class="mt-4 text-xs text-center text-gray-500 dark:text-gray-400">
                    {{ $isArabic ? 'نحترم خصوصيتك. لن يتم مشاركة معلوماتك مع أي طرف ثالث.' : 'We respect your privacy. Your information will never be shared with third parties.' }}
                </p>
            </form>
        </div>

        {{-- FAQ Section --}}
        <div class="mb-12 animate-on-scroll">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-3">
                    {{ $isArabic ? 'الأسئلة الشائعة' : 'Frequently Asked Questions' }}
                </h2>
                <p class="text-gray-600 dark:text-gray-400">
                    {{ $isArabic ? 'إجابات على الأسئلة الأكثر شيوعًا حول خدماتنا' : 'Answers to the most common questions about our services' }}
                </p>
            </div>

            <div class="space-y-4" x-data="{ openFaq: null }">
                {{-- FAQ 1: Project Timeline --}}
                <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 overflow-hidden">
                    <button
                        @click="openFaq = openFaq === 1 ? null : 1"
                        class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors"
                    >
                        <span class="font-semibold text-gray-900 dark:text-white {{ $isArabic ? 'text-right flex-1 ml-4' : 'flex-1 mr-4' }}">
                            {{ $isArabic ? 'كم من الوقت يستغرق إكمال المشروع؟' : 'How long does it take to complete a project?' }}
                        </span>
                        <svg
                            class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform {{ $isArabic ? 'ml-auto' : 'mr-auto' }}"
                            :class="{ 'rotate-180': openFaq === 1 }"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div
                        x-show="openFaq === 1"
                        x-collapse
                        class="px-6 pb-4"
                    >
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                            @if($isArabic)
                                يعتمد الإطار الزمني على نطاق ومتطلبات المشروع. عادةً ما تستغرق المشاريع البسيطة 2-4 أسابيع، بينما التطبيقات الأكثر تعقيدًا قد تستغرق 8-16 أسبوعًا. سنقدم لك جدولاً زمنيًا مفصلاً بعد مناقشة متطلباتك.
                            @else
                                The timeline depends on the project scope and requirements. Typically, simple projects take 2-4 weeks, while more complex applications may take 8-16 weeks. We'll provide you with a detailed timeline after discussing your requirements.
                            @endif
                        </p>
                    </div>
                </div>

                {{-- FAQ 2: Types of Projects --}}
                <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 overflow-hidden">
                    <button
                        @click="openFaq = openFaq === 2 ? null : 2"
                        class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors"
                    >
                        <span class="font-semibold text-gray-900 dark:text-white {{ $isArabic ? 'text-right flex-1 ml-4' : 'flex-1 mr-4' }}">
                            {{ $isArabic ? 'ما أنواع المشاريع التي تقبلونها؟' : 'What types of projects do you accept?' }}
                        </span>
                        <svg
                            class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform {{ $isArabic ? 'ml-auto' : 'mr-auto' }}"
                            :class="{ 'rotate-180': openFaq === 2 }"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div
                        x-show="openFaq === 2"
                        x-collapse
                        class="px-6 pb-4"
                    >
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                            @if($isArabic)
                                نتخصص في تطوير تطبيقات Laravel، وتطوير الـ APIs، والتطبيقات الموبايل، وفحص الكود الأمني، والاستشارات التقنية. نعمل مع الشركات الناشئة والمؤسسات على حدٍ سواء، ونركز على المشاريع التي تتطلب جودة عالية وقابلية توسع.
                            @else
                                We specialize in Laravel application development, API development, mobile apps, code audits, and technical consultations. We work with both startups and enterprises, focusing on projects that require high quality and scalability.
                            @endif
                        </p>
                    </div>
                </div>

                {{-- FAQ 3: Pricing --}}
                <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 overflow-hidden">
                    <button
                        @click="openFaq = openFaq === 3 ? null : 3"
                        class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors"
                    >
                        <span class="font-semibold text-gray-900 dark:text-white {{ $isArabic ? 'text-right flex-1 ml-4' : 'flex-1 mr-4' }}">
                            {{ $isArabic ? 'كيف تحسبون تكلفة المشروع؟' : 'How do you calculate project costs?' }}
                        </span>
                        <svg
                            class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform {{ $isArabic ? 'ml-auto' : 'mr-auto' }}"
                            :class="{ 'rotate-180': openFaq === 3 }"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div
                        x-show="openFaq === 3"
                        x-collapse
                        class="px-6 pb-4"
                    >
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                            @if($isArabic)
                                نقدم أسعارًا ثابتة للمشاريع المحددة بوضوح، أو أسعارًا بالساعة للمشاريع الأكثر مرونة. بعد مناقشة متطلباتك، سنقدم عرض أسعار تفصيليًا يتضمن نطاق العمل والميزانية والجدول الزمني المقدر.
                            @else
                                We offer fixed-price quotes for well-defined projects or hourly rates for more flexible engagements. After discussing your requirements, we'll provide a detailed proposal including scope, budget, and estimated timeline.
                            @endif
                        </p>
                    </div>
                </div>

                {{-- FAQ 4: Development Process --}}
                <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 overflow-hidden">
                    <button
                        @click="openFaq = openFaq === 4 ? null : 4"
                        class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors"
                    >
                        <span class="font-semibold text-gray-900 dark:text-white {{ $isArabic ? 'text-right flex-1 ml-4' : 'flex-1 mr-4' }}">
                            {{ $isArabic ? 'كيف تسير عملية التطوير؟' : 'What does your development process look like?' }}
                        </span>
                        <svg
                            class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform {{ $isArabic ? 'ml-auto' : 'mr-auto' }}"
                            :class="{ 'rotate-180': openFaq === 4 }"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div
                        x-show="openFaq === 4"
                        x-collapse
                        class="px-6 pb-4"
                    >
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                            @if($isArabic)
                                نتبع نهجًا شفافًا ومتكررًا: (1) الاكتشاف - نفهم أهدافك التجارية والمتطلبات التقنية، (2) التصميم - نحدد المعمارية ونخطط الميزات، (3) البناء - تطوير متكرر مع تحديثات منتظمة، (4) الإطلاق والتوسع - نشر ومراقبة ودعم مستمر.
                            @else
                                We follow a transparent, iterative approach: (1) Discovery - Understanding your business goals and technical requirements, (2) Design - Defining architecture and planning features, (3) Build - Iterative development with regular updates, (4) Launch & Scale - Deployment, monitoring, and ongoing support.
                            @endif
                        </p>
                    </div>
                </div>

                {{-- FAQ 5: Post-Launch Support --}}
                <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 overflow-hidden">
                    <button
                        @click="openFaq = openFaq === 5 ? null : 5"
                        class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors"
                    >
                        <span class="font-semibold text-gray-900 dark:text-white {{ $isArabic ? 'text-right flex-1 ml-4' : 'flex-1 mr-4' }}">
                            {{ $isArabic ? 'هل تقدمون دعمًا بعد إطلاق المشروع؟' : 'Do you provide post-launch support?' }}
                        </span>
                        <svg
                            class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform {{ $isArabic ? 'ml-auto' : 'mr-auto' }}"
                            :class="{ 'rotate-180': openFaq === 5 }"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div
                        x-show="openFaq === 5"
                        x-collapse
                        class="px-6 pb-4"
                    >
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                            @if($isArabic)
                                نعم! نقدم فترة ضمان بعد الإطلاق لإصلاح أي أخطاء، بالإضافة إلى خطط صيانة ودعم مستمرة. سواء كنت بحاجة لإصلاحات سريعة أو تحديثات منتظمة أو ميزات جديدة، نحن هنا لدعم نجاح مشروعك على المدى الطويل.
                            @else
                                Yes! We provide a post-launch warranty period to fix any bugs, plus ongoing maintenance and support plans. Whether you need bug fixes, regular updates, or new features, we're here to support your project's long-term success.
                            @endif
                        </p>
                    </div>
                </div>

                {{-- FAQ 6: Communication --}}
                <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 overflow-hidden">
                    <button
                        @click="openFaq = openFaq === 6 ? null : 6"
                        class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors"
                    >
                        <span class="font-semibold text-gray-900 dark:text-white {{ $isArabic ? 'text-right flex-1 ml-4' : 'flex-1 mr-4' }}">
                            {{ $isArabic ? 'كيف نتواصل خلال المشروع؟' : 'How do we communicate during the project?' }}
                        </span>
                        <svg
                            class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform {{ $isArabic ? 'ml-auto' : 'mr-auto' }}"
                            :class="{ 'rotate-180': openFaq === 6 }"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div
                        x-show="openFaq === 6"
                        x-collapse
                        class="px-6 pb-4"
                    >
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                            @if($isArabic)
                                نؤمن بالتواصل الشفاف والمنتظم. نستخدم Slack أو Discord للمحادثات اليومية، وعقد اجتماعات أسبوعية للتحديثات، ونوفر الوصول إلى لوحات المشروع (مثل GitHub Projects) لتتبع التقدم في الوقت الفعلي.
                            @else
                                We believe in transparent, regular communication. We use Slack or Discord for daily conversations, hold weekly update meetings, and provide access to project boards (like GitHub Projects) for real-time progress tracking.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
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
