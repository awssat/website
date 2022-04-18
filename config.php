<?php

use App\Helpers\PostStructuredData;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;

return [
    'baseUrl' => 'http://localhost:8000',
    'production' => false,
    'siteName' => 'Awssat',
    'siteDescription' => 'An enthusiastic team that\'s eager to build and design beautiful web stuff.',
    'siteAuthor' => 'Awssat Devs',

    // collections
    'collections' => [
        'posts' => [
            'author' => 'Awssat Devs', // Default author, if not provided in a post
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
];
