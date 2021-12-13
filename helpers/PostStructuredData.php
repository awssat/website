<?php

namespace App\Helpers;


class PostStructuredData
{
    public static function generate($post)
    {
        return json_encode([
            "@context" => "https://schema.org",
            "@type" => "NewsArticle",
            "mainEntityOfPage" => [
                "@type" => "WebPage",
                "@id" => $post->getUrl(),
            ],
            "headline" => $post->title,
            "image" => $post->getCoverImage(),
            // "description": "A most wonderful article",
            "speakable" => [
                "@type" => "SpeakableSpecification",
                "cssSelector" => [
                    "#article-title",
                    "#article-body",
                ]
            ],
            "datePublished" => $post->getDate()->toIso8601String(),
            "dateModified" => ($post->getUpdatedAt() ?? $post->getDate())->toIso8601String(),
            "author" => [
                "@type" => "Person",
                "name" => $post->author ?? 'Awssat Devs',
            ],
            "publisher" => [
                "@type" => "Organization",
                "name" => $post->siteName,
                "logo" => [
                    "@type" => "ImageObject",
                    "url" => url('/assets/images/logo.png'),
                ]
            ]
        ], JSON_UNESCAPED_SLASHES);
    }
}
