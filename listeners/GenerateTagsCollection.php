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
        $defaultTagCollection = $this->getDefaultTagPages($jigsaw);

        if (!$defaultTagCollection) {
            return;
        }

        $this->reloadWithDefaultTags($jigsaw, $defaultTagCollection);
    }

    /**
     * @param Jigsaw $jigsaw
     *
     * @return array|null
     */
    private function getDefaultTagPages(Jigsaw $jigsaw)
    {
        $posts = $jigsaw->getCollection('posts') ?? collect();

        $items = $posts
            ->map(function ($p) {
                return $p->tags;
            })
            ->filter()
            ->flatten()
            ->unique()
            ->map(function (string $tag) {
                return [
                    'extends' => '_layouts.blog.tag',
                    'filename' => $tag,
                    'title' => Str::title(str_replace(['-', '_'], ' ', $tag)),
                ];
            });

        if ($items->isEmpty()) {
            return null;
        }

        return [
            'path' => '/blog/tag/{filename}',
            'items' => $items
        ];
    }

    /**
     * @param Jigsaw $jigsaw
     * @param array $defaultTagCollection
     */
    private function reloadWithDefaultTags(Jigsaw $jigsaw, array $defaultTagCollection)
    {
        /** @var DataLoader $dataLoader */
        $dataLoader = $jigsaw->app->get(DataLoader::class);
        /** @var CollectionRemoteItemLoader $remoteItemLoader */
        $remoteItemLoader = $jigsaw->app->get(CollectionRemoteItemLoader::class);

        $jigsaw->app->config['collections']['tags'] = $defaultTagCollection;

        $siteData = $dataLoader->loadSiteData($jigsaw->app->config);

        $remoteItemLoader->write($siteData->collections, $jigsaw->getSourcePath());

        $collectionData = $dataLoader->loadCollectionData($siteData, $jigsaw->getSourcePath());
        $jigsaw->getSiteData()->addCollectionData($collectionData);
    }
}
