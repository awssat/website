<?php

namespace App\Listeners;

use Illuminate\Support\Str;
use TightenCo\Jigsaw\Jigsaw;
use TightenCo\Jigsaw\Loaders\DataLoader;
use TightenCo\Jigsaw\Loaders\CollectionRemoteItemLoader;


/**
 * Based on a workaround by @camuthig, @see https://github.com/camuthig/jigsaw-blog-default-categories
 */
class GenerateTagsCollection
{
    public function handle(Jigsaw $jigsaw)
    {
        $defaultTagCollections = $this->getDefaultTagPages($jigsaw);

        if (empty($defaultTagCollections)) {
            return;
        }

        $this->reloadWithDefaultTags($jigsaw, $defaultTagCollections);
    }

    /**
     * @param Jigsaw $jigsaw
     *
     * @return array
     */
    private function getDefaultTagPages(Jigsaw $jigsaw)
    {
        $posts = $jigsaw->getCollection('posts') ?? collect();
        $collections = [];
        $locales = ['en', 'ar'];

        foreach ($locales as $locale) {
            // Filter posts by locale
            $localePosts = $posts->filter(function ($p) use ($locale) {
                return Str::endsWith($p->getFilename(), ".{$locale}");
            });

            // Extract tags from locale-specific posts
            $items = $localePosts
                ->map(function ($p) {
                    return $p->tags;
                })
                ->filter()
                ->flatten()
                ->unique()
                ->map(function (string $tag) use ($locale) {
                    return [
                        'extends' => '_layouts.blog.tag',
                        'filename' => $tag,
                        'title' => Str::title(str_replace(['-', '_'], ' ', $tag)),
                        'locale' => $locale,
                    ];
                });

            if ($items->isNotEmpty()) {
                // Set path based on locale
                $path = $locale === 'en' ? '/blog/tag/{filename}' : "/{$locale}/blog/tag/{filename}";
                $collections["tags_{$locale}"] = [
                    'path' => $path,
                    'items' => $items
                ];
            }
        }

        return $collections;
    }

    /**
     * @param Jigsaw $jigsaw
     * @param array $defaultTagCollections
     */
    private function reloadWithDefaultTags(Jigsaw $jigsaw, array $defaultTagCollections)
    {
        /** @var DataLoader $dataLoader */
        $dataLoader = $jigsaw->app->get(DataLoader::class);
        /** @var CollectionRemoteItemLoader $remoteItemLoader */
        $remoteItemLoader = $jigsaw->app->get(CollectionRemoteItemLoader::class);

        // Register both locale-specific tag collections
        foreach ($defaultTagCollections as $collectionName => $collection) {
            $jigsaw->app->config['collections'][$collectionName] = $collection;
        }

        $siteData = $dataLoader->loadSiteData($jigsaw->app->config);

        $remoteItemLoader->write($siteData->collections, $jigsaw->getSourcePath());

        $collectionData = $dataLoader->loadCollectionData($siteData, $jigsaw->getSourcePath());
        $jigsaw->getSiteData()->addCollectionData($collectionData);
    }
}
