<?php

namespace App\Listeners;

use App\Helpers\PostCoverGenerator;
use TightenCo\Jigsaw\Jigsaw;

class GenerateCoverImages
{
    public function handle(Jigsaw $jigsaw)
    {
        $posts = $jigsaw->getCollection('posts');

        //TODO: do not generate cover images for not-changed posts. Must be done in a different way.
        $posts->each(function ($post) use ($jigsaw) {
            PostCoverGenerator::generate($post, $jigsaw->getDestinationPath());
        });
    }
}
