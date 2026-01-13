<?php

use App\Helpers\PostStructuredData;
use App\Helpers\TranslationHelper;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;

return [
    'baseUrl' => 'http://localhost:8000',
    'production' => false,
    'siteName' => 'Awssat',
    'siteDescription' => 'An enthusiastic team that\'s eager to build and design beautiful web stuff.',
    'siteAuthor' => 'Awssat Devs',

    // Locale configuration
    'locales' => [
        'en' => [
            'name' => 'English',
            'dir' => 'ltr',
            'default' => true,
        ],
        'ar' => [
            'name' => 'العربية',
            'dir' => 'rtl',
            'default' => false,
        ],
    ],
    'defaultLocale' => 'en',

    // collections
    'collections' => [
        // Legacy collection (kept for backward compatibility during migration)
        'posts' => [
            'author' => 'Awssat Devs',
            'sort' => '-date',
            'path' => '/blog/{filename}',
            'extends' => '_layouts.blog.view',
            'section' => 'post_content',
            'tags' => [],
            'map' => function ($post) {
                $post->tags = collect($post->tags ?? [])->map(function ($tag) {
                    return Str::kebab($tag);
                })->toArray();
                return $post;
            },
        ],

        // English blog posts
        'posts_en' => [
            'author' => 'Awssat Devs',
            'sort' => '-date',
            'path' => '/en/blog/{filename}',
            'extends' => '_layouts.blog.view',
            'section' => 'post_content',
            'locale' => 'en',
            'tags' => [],
            'filter' => function ($item) {
                return Str::endsWith($item->getFilename(), '.en');
            },
            'map' => function ($post) {
                $post->locale = 'en';
                $post->alternateLocale = 'ar';
                $post->slug = Str::before($post->getFilename(), '.en');
                $post->tags = collect($post->tags ?? [])->map(function ($tag) {
                    return Str::kebab($tag);
                })->toArray();
                return $post;
            },
        ],

        // Arabic blog posts
        'posts_ar' => [
            'author' => 'Awssat Devs',
            'sort' => '-date',
            'path' => '/ar/blog/{filename}',
            'extends' => '_layouts.blog.view',
            'section' => 'post_content',
            'locale' => 'ar',
            'tags' => [],
            'filter' => function ($item) {
                return Str::endsWith($item->getFilename(), '.ar');
            },
            'map' => function ($post) {
                $post->locale = 'ar';
                $post->alternateLocale = 'en';
                $post->slug = Str::before($post->getFilename(), '.ar');
                $post->tags = collect($post->tags ?? [])->map(function ($tag) {
                    return Str::kebab($tag);
                })->toArray();
                return $post;
            },
        ],

        // English portfolio items
        'portfolio_en' => [
            'sort' => '-date',
            'path' => '/en/portfolio/{filename}',
            'extends' => '_layouts.portfolio.view',
            'section' => 'portfolio_content',
            'locale' => 'en',
            'filter' => function ($item) {
                return Str::endsWith($item->getFilename(), '.en');
            },
            'map' => function ($item) {
                $item->locale = 'en';
                $item->alternateLocale = 'ar';
                $item->slug = Str::before($item->getFilename(), '.en');
                return $item;
            },
        ],

        // Arabic portfolio items
        'portfolio_ar' => [
            'sort' => '-date',
            'path' => '/ar/portfolio/{filename}',
            'extends' => '_layouts.portfolio.view',
            'section' => 'portfolio_content',
            'locale' => 'ar',
            'filter' => function ($item) {
                return Str::endsWith($item->getFilename(), '.ar');
            },
            'map' => function ($item) {
                $item->locale = 'ar';
                $item->alternateLocale = 'en';
                $item->slug = Str::before($item->getFilename(), '.ar');
                return $item;
            },
        ],
    ],

    // helpers
    'getDate' => function ($page) {
        return Date::createFromFormat('U', $page->date);
    },
    'getUpdatedAt' => function ($page) {
        return !empty($page->updated_at) ? Date::createFromFormat('U', $page->updated_at) : null;
    },
    'getExternalDomain' => function ($page) {
        return parse_url($page->external_link, PHP_URL_HOST) ?? null;
    },
    'getCoverImage' => function ($page) {
        return $page->cover_image ?? url('/assets/images/covers/' . $page->getFilename() . '.png');
    },
    'getExcerpt' => function ($page, $length = 255) {
        if ($page->excerpt) {
            return $page->excerpt;
        }

        $content = preg_split('/<!-- more -->/m', $page->getContent(), 2);
        $cleaned = trim(
            strip_tags(
                preg_replace(['/<pre>[\w\W]*?<\/pre>/', '/<h\d>[\w\W]*?<\/h\d>/'], '', $content[0]),
                '<code>'
            )
        );

        if (count($content) > 1) {
            return $cleaned;
        }

        $truncated = mb_substr($cleaned, 0, $length);

        if (mb_substr_count($truncated, '<code>') > mb_substr_count($truncated, '</code>')) {
            $truncated .= '</code>';
        }

        return mb_strlen($cleaned) > $length
            ? preg_replace('/\s+?(\S+)?$/', '', $truncated) . '...'
            : $cleaned;
    },
    'isActive' => function ($page, $path) {
        return Str::endsWith(trimPath($page->getPath()), trimPath($path));
    },
    'isPath' => function ($page, $pattern) {
        return Str::is($pattern, trimPath($page->getPath()));
    },
    'getStructuredData' => function ($page) {
        return PostStructuredData::generate($page);
    },
    'getTagUrl' => function ($page, $tag) {
        return  url('/blog/tag/' . $tag);
    },
    'getTagColor' => function ($page, $tag, $noBox = false) {
        if (!in_array($tag, ['tweet', 'video', 'link', 'original'])) {
            $tag = 'default';
        }

        return "base-tag base-tag-{$tag}" . ($noBox ? ' base-tag-no-box' : '');
    },

    'postsOfTag' => function ($page, $allPosts) {
        return $allPosts->filter(function ($post) use ($page) {
            return $post->tags ? in_array($page->getFilename(), $post->tags, true) : false;
        });
    },

    // Translation helper
    'trans' => function ($page, $key) {
        $locale = $page->locale ?? 'en';
        return TranslationHelper::get($key, $locale);
    },

    // Get alternate language URL
    'getAlternateUrl' => function ($page) {
        $currentLocale = $page->locale ?? 'en';
        $altLocale = $currentLocale === 'en' ? 'ar' : 'en';
        $currentPath = $page->getPath();

        // Replace locale in path
        return str_replace("/{$currentLocale}/", "/{$altLocale}/", $currentPath);
    },

    // Get all portfolio items for current locale
    'allPortfolio' => function ($page) {
        $locale = $page->locale ?? 'en';
        $collectionName = "portfolio_{$locale}";
        return $page->{$collectionName} ?? collect();
    },

    // Get all posts for current locale
    'allPosts' => function ($page) {
        $locale = $page->locale ?? 'en';
        $collectionName = "posts_{$locale}";
        return $page->{$collectionName} ?? collect();
    },
];
