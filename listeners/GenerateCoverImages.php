<?php

namespace App\Listeners;

use App\Helpers\ModernCoverGenerator;
use Illuminate\Support\Str;
use TightenCo\Jigsaw\Jigsaw;

class GenerateCoverImages
{
    public function handle(Jigsaw $jigsaw)
    {
        // Use posts_en collection to generate covers (avoid duplicates from ar versions)
        // Both locales share the same cover image based on slug
        $postsEn = $jigsaw->getCollection('posts_en');
        $posts = $jigsaw->getCollection('posts');

        // Prefer posts_en, fall back to posts, filter to only .en files if using legacy
        $collection = $postsEn && $postsEn->count() > 0 ? $postsEn : $posts;

        if (!$collection || $collection->count() === 0) {
            echo "No posts found for cover generation\n";
            return;
        }

        $generator = new ModernCoverGenerator();
        $generatedSlugs = [];

        $collection->each(function ($post) use ($jigsaw, $generator, &$generatedSlugs) {
            $filename = $post->getFilename();

            // Skip Arabic versions (only generate from English to avoid duplicates)
            if (Str::endsWith($filename, '.ar')) {
                return;
            }

            // Get slug without locale suffix
            $slug = $post->slug ?? Str::before($filename, '.en');
            $slug = preg_replace('/\.(en|ar)$/', '', $slug); // Extra safety

            // Skip if already generated for this slug
            if (in_array($slug, $generatedSlugs)) {
                return;
            }

            $generatedSlugs[] = $slug;
            echo "Generating cover for: {$slug}\n";
            $generator->generate($post, $jigsaw->getDestinationPath(), $slug);
        });
    }
}
