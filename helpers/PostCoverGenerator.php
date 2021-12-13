<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class PostCoverGenerator
{
    public static function generate($post, $destination)
    {
        $imageManager = new ImageManager(array('driver' => 'gd'));
        $img = $imageManager->make(public_path('assets/images/cover.png'));

        /**
         * An open-source font from Adobe, distributed under the SIL Open Font License.
         */
        $fontPath = public_path('assets/images/SourceSansPro-SemiBold.ttf');

        if (Str::length($post->title) >= 28) {
            $texts = explode('|:|', wordwrap($post->title, 28, '|:|'));
        } else {
            $texts = [$post->title];
        }

        if (count($texts) > 5) {
            $texts = array_slice($texts, 0, 5);
            $texts[4] = mb_substr($texts[4], 0, -3) . '...';
        }

        $i = (5 - count($texts)) * 50;

        foreach ($texts as $text) {
            $img->text(
                $text,
                90,
                120 + $i,
                function ($font) use ($fontPath) {
                    $font->file($fontPath);
                    $font->size(70);
                    $font->color('#4931A5');
                }
            );

            $i = $i + 80;
        }

        //author + date
        $img->text(($post->author ?? 'Awssat Devs') . ' . ' . ($post->getDate() ?? Date::now())->format('d M Y'),
            90,
            520,
            function ($font) use ($fontPath) {
                $font->file($fontPath);
                $font->size(35);
                $font->color('#7352d6');
            }
        );

        $i = 0;
        foreach ($post->tags as $tag) {
            if (file_exists(public_path("assets/images/tags/" . Str::lower($tag) . ".png"))) {
                $img->insert(public_path("assets/images/tags/" . Str::lower($tag) . ".png"), 'top-left', 70 + $i, 60);
                $i = $i + 70;
            }
        }

        if (file_put_contents($destination . '/assets/images/covers/' . $post->getFilename() . '.png', $img->encode('png'))) {
            return $destination . '/assets/images/covers/' . $post->getFilename() . '.png';
        }

        return false;
    }
}
