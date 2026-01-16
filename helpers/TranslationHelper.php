<?php

namespace App\Helpers;

class TranslationHelper
{
    private static $translations = [
        'en' => [
            // Navigation
            'nav.blog' => 'Blog',
            'nav.portfolio' => 'Portfolio',
            'nav.opensource' => 'Open Source',
            'nav.projects' => 'Projects',
            'nav.contact' => 'Contact',

            // Home page
            'home.title' => 'Awssat',
            'home.subtitle' => 'Building the Future of Web',
            'home.description' => 'An enthusiastic team that\'s eager to build and design beautiful web stuff.',
            'home.cta' => 'View Our Work',
            'home.featured_work' => 'Featured Work',
            'home.recent_posts' => 'Recent Blog Posts',
            'home.scroll_down' => 'Scroll Down',

            // Portfolio
            'portfolio.title' => 'Our Work',
            'portfolio.description' => 'A showcase of our contributions and projects',
            'portfolio.selected_works' => 'Selected Works',
            'portfolio.core_contributions' => 'Core Contributions',
            'portfolio.community_love' => 'Built with ❤️ for Laravel and the amazing community',
            'portfolio.filter.all' => 'All',
            'portfolio.filter.prs' => 'Laravel PRs',
            'portfolio.filter.projects' => 'Projects',
            'portfolio.view_on_github' => 'View on GitHub',
            'portfolio.live_demo' => 'Live Demo',
            'portfolio.tech_stack' => 'Tech Stack',
            'portfolio.status.merged' => 'Merged',
            'portfolio.status.open' => 'Open',
            'portfolio.status.closed' => 'Closed',
            'portfolio.type.laravel_pr' => 'Laravel PR',
            'portfolio.type.project' => 'Project',

            // Blog
            'blog.title' => 'Blog',
            'blog.the_blog' => 'The Blog',
            'blog.hero_title' => 'Insights on',
            'blog.hero_highlight' => 'Modern Web Development',
            'blog.hero_description' => 'Deep dives into Laravel, Vue.js, and open source engineering. We share what we learn building at scale.',
            'blog.featured_article' => 'Featured Article',
            'blog.recent_articles' => 'Recent Articles',
            'blog.read_article' => 'Read Article',
            'blog.read_more' => 'Read More',
            'blog.published_on' => 'Published on',
            'blog.updated_on' => 'Updated on',
            'blog.by' => 'by',
            'blog.tags' => 'Tags',
            'blog.related_posts' => 'Related Posts',
            'blog.all_posts' => 'All Posts',
            'blog.previous_page' => 'Previous Page',
            'blog.next_page' => 'Next Page',
            'blog.engineering_blog' => 'Engineering Blog',
            'blog.sidebar_description' => 'Building robust web apps, contributing to open source, and sharing Laravel expertise.',
            'blog.github_stars' => 'GitHub Stars',
            'blog.laravel_prs' => 'Laravel PRs',
            'blog.explore_topics' => 'Explore Topics',
            'blog.subscribe_rss' => 'Subscribe via RSS',
            'blog.never_miss_update' => 'Never miss an update',
            'blog.author' => 'Author',
            'blog.min_read' => 'min read',
            'blog.table_of_contents' => 'Table of Contents',
            'blog.shared_tag' => 'shared tag',
            'blog.shared_tags' => 'shared tags',
            'blog.improve_on_github' => 'Improve this post on GitHub',

            // Common
            'common.read_more' => 'Read More',
            'common.learn_more' => 'Learn More',
            'common.view_all' => 'View All',
            'common.back' => 'Back',
            'common.home' => 'Home',
            'common.loading' => 'Loading...',
            'common.error' => 'Error',
            'common.close' => 'Close',

            // Footer
            'footer.copyright' => 'All rights reserved',
            'footer.made_with' => 'Made with',
            'footer.in' => 'in',
            'footer.tagline' => 'Building exceptional web experiences with Laravel and modern technologies.',
            'footer.quick_links' => 'Quick Links',
            'footer.resources' => 'Resources',
            'footer.rights' => 'All rights reserved.',
            'footer.rss_feed' => 'RSS Feed',
            'footer.source_code' => 'Source Code',
            'nav.github' => 'GitHub',

            // Language
            'language.en' => 'English',
            'language.ar' => 'العربية',
        ],
        'ar' => [
            // Navigation
            'nav.blog' => 'المدونة',
            'nav.portfolio' => 'الأعمال',
            'nav.opensource' => 'المصادر المفتوحة',
            'nav.projects' => 'المشاريع',
            'nav.contact' => 'تواصل معنا',

            // Home page
            'home.title' => 'اوسط',
            'home.subtitle' => 'نبني مستقبل الويب',
            'home.description' => 'فريق شغوف يبدع في تصميم وبناء تطبيقات ويب عصرية.',
            'home.cta' => 'شاهد أعمالنا',
            'home.featured_work' => 'أعمال مميزة',
            'home.recent_posts' => 'أحدث المقالات',
            'home.scroll_down' => 'انتقل للأسفل',

            // Portfolio
            'portfolio.title' => 'أعمالنا',
            'portfolio.description' => 'عرض لمساهماتنا ومشاريعنا',
            'portfolio.selected_works' => 'أعمال مختارة',
            'portfolio.core_contributions' => 'مساهمات أساسية',
            'portfolio.community_love' => 'صنعناه بكل ❤️ لمجتمع Laravel',
            'portfolio.filter.all' => 'الكل',
            'portfolio.filter.prs' => 'مساهمات Laravel',
            'portfolio.filter.projects' => 'المشاريع',
            'portfolio.view_on_github' => 'عرض في GitHub',
            'portfolio.live_demo' => 'عرض مباشر',
            'portfolio.tech_stack' => 'التقنيات المستخدمة',
            'portfolio.status.merged' => 'مدمج',
            'portfolio.status.open' => 'مفتوح',
            'portfolio.status.closed' => 'مغلق',
            'portfolio.type.laravel_pr' => 'طلب Laravel',
            'portfolio.type.project' => 'مشروع',

            // Blog
            'blog.title' => 'المدونة',
            'blog.the_blog' => 'المدونة',
            'blog.hero_title' => 'مقالات في',
            'blog.hero_highlight' => 'تطوير الويب الحديث',
            'blog.hero_description' => 'اعرف أكثر عن Laravel و Vue.js وهندسة المصادر المفتوحة. نشارككم ما نتعلمه أثناء تطويرنا للمشاريع.',
            'blog.featured_article' => 'مقال مميز',
            'blog.recent_articles' => 'أحدث المقالات',
            'blog.read_article' => 'اقرأ المقال',
            'blog.read_more' => 'اقرأ المزيد',
            'blog.published_on' => 'نُشر في',
            'blog.updated_on' => 'حُدّث في',
            'blog.by' => 'بواسطة',
            'blog.tags' => 'الوسوم',
            'blog.related_posts' => 'مقالات ذات صلة',
            'blog.all_posts' => 'جميع المقالات',
            'blog.previous_page' => 'الصفحة السابقة',
            'blog.next_page' => 'الصفحة التالية',
            'blog.engineering_blog' => 'مدونة هندسية',
            'blog.sidebar_description' => 'نبني تطبيقات ويب متطورة ونساهم في المصادر المفتوحة، ونشارك خبراتنا في Laravel.',
            'blog.github_stars' => 'نجوم GitHub',
            'blog.laravel_prs' => 'مساهمات Laravel',
            'blog.explore_topics' => 'المواضيع',
            'blog.subscribe_rss' => 'اشترك عبر RSS',
            'blog.never_miss_update' => 'لا تفوت أي تحديث',
            'blog.author' => 'الكاتب',
            'blog.min_read' => 'دقيقة قراءة',
            'blog.table_of_contents' => 'فهرس المحتويات',
            'blog.shared_tag' => 'وسم مشترك',
            'blog.shared_tags' => 'وسوم مشتركة',
            'blog.improve_on_github' => 'حسّن هذا المقال على GitHub',

            // Common
            'common.read_more' => 'اقرأ المزيد',
            'common.learn_more' => 'اعرف المزيد',
            'common.view_all' => 'عرض الكل',
            'common.back' => 'رجوع',
            'common.home' => 'الرئيسية',
            'common.loading' => 'جاري التحميل...',
            'common.error' => 'خطأ',
            'common.close' => 'إغلاق',

            // Footer
            'footer.copyright' => 'جميع الحقوق محفوظة',
            'footer.made_with' => 'صُنع بـ',
            'footer.in' => 'في',
            'footer.tagline' => 'نبني تجارب ويب استثنائية باستخدام Laravel والتقنيات الحديثة.',
            'footer.quick_links' => 'روابط سريعة',
            'footer.resources' => 'الموارد',
            'footer.rights' => 'جميع الحقوق محفوظة.',
            'footer.rss_feed' => 'تغذية RSS',
            'footer.source_code' => 'الكود المصدري',
            'nav.github' => 'GitHub',

            // Language
            'language.en' => 'English',
            'language.ar' => 'العربية',
        ],
    ];

    /**
     * Get a translation by key for a specific locale
     */
    public static function get(string $key, string $locale = 'en'): string
    {
        return self::$translations[$locale][$key] ?? $key;
    }

    /**
     * Get all translations for a specific locale
     */
    public static function getAll(string $locale = 'en'): array
    {
        return self::$translations[$locale] ?? [];
    }

    /**
     * Check if a translation exists
     */
    public static function has(string $key, string $locale = 'en'): bool
    {
        return isset(self::$translations[$locale][$key]);
    }
}
