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

        // English blog posts (default, no locale prefix)
        'posts_en' => [
            'author' => 'Awssat Devs',
            'sort' => '-date',
            'path' => '/blog/{filename}',
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

        // Base portfolio collection (loads all portfolio items)
        'portfolio' => [
            'sort' => '-date',
            'path' => '/portfolio/{filename}',
            'extends' => '_layouts.portfolio.view',
        ],

        // English portfolio items (default, no locale prefix)
        'portfolio_en' => [
            'sort' => '-date',
            'path' => '/portfolio/{filename}',
            'extends' => '_layouts.portfolio.view',

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
    'getScreenshot' => function ($page) {
        // If custom screenshot provided, use it
        if (!empty($page->screenshot)) {
            return $page->screenshot;
        }

        // For websites, generate screenshot path from demo_url
        if ($page->type === 'website' && !empty($page->demo_url)) {
            $hash = md5($page->demo_url);
            return url("/assets/images/portfolio/screenshots/{$hash}.jpg");
        }

        // Fallback to placeholder or custom cover
        return $page->cover_image ?? url('/assets/images/portfolio/placeholder.jpg');
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
        return collect($page->portfolio ?? [])->filter(function ($item) use ($locale) {
            return Str::endsWith($item->getFilename(), ".{$locale}");
        });
    },

    // Get all posts for current locale
    'allPosts' => function ($page) {
        $locale = $page->locale ?? 'en';
        $collectionName = "posts_{$locale}";
        return $page->{$collectionName} ?? collect();
    },

    // Calculate reading time in minutes
    'getReadingTime' => function ($page) {
        $content = $page->getContent();

        // Strip HTML tags and decode entities
        $text = strip_tags($content);
        $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');

        // Count words
        $wordCount = str_word_count($text);

        // Average reading speed is 200 words per minute
        $minutes = ceil($wordCount / 200);

        // Return at least 1 minute
        return max(1, $minutes);
    },

    // Extract table of contents from post content
    'getTableOfContents' => function ($page) {
        $content = $page->getContent();

        // Suppress warnings from loadHTML
        libxml_use_internal_errors(true);

        $dom = new DOMDocument();
        $dom->loadHTML('<?xml encoding="UTF-8">' . $content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        libxml_clear_errors();

        $headings = [];
        $xpath = new DOMXPath($dom);

        // Find all h2, h3, h4 headings
        $nodes = $xpath->query('//h2|//h3|//h4');

        foreach ($nodes as $node) {
            $text = trim($node->textContent);
            $level = (int) substr($node->nodeName, 1);

            // Generate ID from text if not present
            $id = $node->getAttribute('id');
            if (empty($id)) {
                $id = Str::slug($text);
                $node->setAttribute('id', $id);
            }

            $headings[] = [
                'level' => $level,
                'text' => $text,
                'id' => $id,
            ];
        }

        return $headings;
    },

    // Get processed content with heading IDs for TOC
    'getContentWithHeadingIds' => function ($page) {
        $content = $page->getContent();

        // Suppress warnings from loadHTML
        libxml_use_internal_errors(true);

        $dom = new DOMDocument();
        $dom->loadHTML('<?xml encoding="UTF-8">' . mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        libxml_clear_errors();

        $xpath = new DOMXPath($dom);
        $nodes = $xpath->query('//h2|//h3|//h4');

        foreach ($nodes as $node) {
            $text = trim($node->textContent);
            $id = $node->getAttribute('id');

            // Generate ID if not present
            if (empty($id)) {
                $id = Str::slug($text);
                $node->setAttribute('id', $id);
            }
        }

        // Return the HTML with IDs added
        $html = $dom->saveHTML();

        // Clean up the <?xml encoding tag that was added
        $html = preg_replace('/<\?xml[^>]+\?>/', '', $html);

        return $html;
    },

    // Generate locale-aware URL
    'localUrl' => function ($page, $path = '/') {
        $locale = $page->locale ?? 'en';

        // Remove leading slash if present
        $path = ltrim($path, '/');

        // For English (default locale), return path without locale prefix
        if ($locale === 'en') {
            return url($path ? "/{$path}" : '/');
        }

        // For other locales, prepend the locale
        return url($path ? "/{$locale}/{$path}" : "/{$locale}");
    },

    // Get related posts based on shared tags
    'getRelatedPosts' => function ($page, $limit = 3) {
        // Get current post's tags
        $currentTags = $page->tags ?? [];
        if (empty($currentTags)) {
            return collect();
        }

        // Get all posts in the same locale
        $locale = $page->locale ?? 'en';
        $collectionName = "posts_{$locale}";
        $allPosts = $page->{$collectionName} ?? collect();

        // Calculate similarity score for each post
        $scored = $allPosts
            ->filter(function ($post) use ($page) {
                // Exclude current post
                return $post->getFilename() !== $page->getFilename();
            })
            ->map(function ($post) use ($currentTags) {
                $postTags = $post->tags ?? [];

                // Count shared tags
                $sharedTags = count(array_intersect($currentTags, $postTags));

                // Add score to post
                $post->similarityScore = $sharedTags;

                return $post;
            })
            ->filter(function ($post) {
                // Only include posts with at least 1 shared tag
                return $post->similarityScore > 0;
            })
            ->sortByDesc('similarityScore') // Sort by similarity score
            ->take($limit);

        return $scored;
    },
];
