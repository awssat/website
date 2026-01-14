<?php

namespace App\Listeners;

use App\Helpers\ModernCoverGenerator;
use TightenCo\Jigsaw\Jigsaw;

class GenerateCoverImages
{
    public function handle(Jigsaw $jigsaw)
    {
        $posts = $jigsaw->getCollection('posts');

        //TODO: do not generate cover images for not-changed posts. Must be done in a different way.
        $generator = new ModernCoverGenerator();

        $posts->each(function ($post) use ($jigsaw, $generator) {
            $generator->generate($post, $jigsaw->getDestinationPath());
        });
    }
}
