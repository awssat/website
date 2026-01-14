<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ModernCoverGenerator
{
    private ImageManager $imageManager;
    private int $width = 1200;
    private int $height = 630;

    // Vibrant, high-contrast palettes for abstract art
    private const PALETTES = [
        ['#4F46E5', '#EC4899', '#8B5CF6'], // Indigo-Pink-Purple
        ['#06B6D4', '#3B82F6', '#6366F1'], // Cyan-Blue-Indigo
        ['#10B981', '#3B82F6', '#6366F1'], // Emerald-Blue-Indigo
        ['#F59E0B', '#EF4444', '#EC4899'], // Amber-Red-Pink
        ['#8B5CF6', '#10B981', '#06B6D4'], // Purple-Emerald-Cyan
        ['#EC4899', '#F59E0B', '#8B5CF6'], // Pink-Amber-Purple
    ];

    public function __construct()
    {
        $this->imageManager = new ImageManager(new Driver());
    }

    public function generate($post, $destination): bool
    {
        // Generate a deterministic seed from the post title
        $seed = crc32($post->title . $post->getDate()->format('Y-m-d'));
        mt_srand($seed);

        // Pick a palette based on the seed
        $palette = self::PALETTES[$seed % count(self::PALETTES)];

        // Create smooth multi-step gradient as base
        $img = $this->createSmoothGradient($palette, $seed);

        // Add organic flowing shapes with proper blending
        $this->addFlowingShapes($img, $palette, $seed);

        // Save
        if (!is_dir($destination . '/assets/images/covers')) {
            @mkdir($destination . '/assets/images/covers/', 0777, true);
        }

        $result = file_put_contents(
            $destination . '/assets/images/covers/' . $post->getFilename() . '.png',
            $img->toPng()
        );

        return $result !== false;
    }

    private function createSmoothGradient(array $palette, int $seed): mixed
    {
        // Create canvas
        $img = $this->imageManager->create($this->width, $this->height);

        // Pick gradient direction based on seed
        $directions = ['diagonal', 'horizontal', 'vertical', 'radial'];
        $direction = $directions[$seed % count($directions)];

        // Pick 2-3 colors from palette
        $color1 = $palette[0];
        $color2 = $palette[1];
        $color3 = $palette[2];

        // Convert hex to RGB
        $rgb1 = $this->hexToRgb($color1);
        $rgb2 = $this->hexToRgb($color2);
        $rgb3 = $this->hexToRgb($color3);

        $steps = 300; // Smooth gradient steps

        switch ($direction) {
            case 'diagonal':
                // Diagonal multi-color gradient
                for ($i = 0; $i <= $steps; $i++) {
                    $progress = $i / $steps;

                    // Blend through all 3 colors
                    if ($progress < 0.5) {
                        $p = $progress * 2;
                        $r = (int)($rgb1[0] + ($rgb2[0] - $rgb1[0]) * $p);
                        $g = (int)($rgb1[1] + ($rgb2[1] - $rgb1[1]) * $p);
                        $b = (int)($rgb1[2] + ($rgb2[2] - $rgb1[2]) * $p);
                    } else {
                        $p = ($progress - 0.5) * 2;
                        $r = (int)($rgb2[0] + ($rgb3[0] - $rgb2[0]) * $p);
                        $g = (int)($rgb2[1] + ($rgb3[1] - $rgb2[1]) * $p);
                        $b = (int)($rgb2[2] + ($rgb3[2] - $rgb2[2]) * $p);
                    }

                    $color = sprintf('#%02x%02x%02x', $r, $g, $b);

                    // Draw diagonal strip
                    $x1 = (int)(($this->width + $this->height) * $progress);
                    $x2 = $x1 + 10;

                    $img->drawRectangle(0, 0, function ($rect) use ($x1, $x2, $color) {
                        $rect->size($this->width + $this->height, $this->width + $this->height);
                        $rect->background($color);
                    });
                }
                $img->rotate(-45);
                break;

            case 'radial':
                // Radial gradient from center
                $centerX = (int)($this->width / 2);
                $centerY = (int)($this->height / 2);
                $maxRadius = (int)sqrt($this->width * $this->width + $this->height * $this->height);

                for ($i = $steps; $i >= 0; $i--) {
                    $progress = $i / $steps;

                    if ($progress < 0.5) {
                        $p = $progress * 2;
                        $r = (int)($rgb1[0] + ($rgb2[0] - $rgb1[0]) * $p);
                        $g = (int)($rgb1[1] + ($rgb2[1] - $rgb1[1]) * $p);
                        $b = (int)($rgb1[2] + ($rgb2[2] - $rgb1[2]) * $p);
                    } else {
                        $p = ($progress - 0.5) * 2;
                        $r = (int)($rgb2[0] + ($rgb3[0] - $rgb2[0]) * $p);
                        $g = (int)($rgb2[1] + ($rgb3[1] - $rgb2[1]) * $p);
                        $b = (int)($rgb2[2] + ($rgb3[2] - $rgb2[2]) * $p);
                    }

                    $color = sprintf('#%02x%02x%02x', $r, $g, $b);
                    $radius = (int)($maxRadius * $progress);

                    $img->drawCircle($centerX, $centerY, function ($circle) use ($radius, $color) {
                        $circle->radius($radius);
                        $circle->background($color);
                        $circle->border($color, 0);
                    });
                }
                break;

            default:
                // Linear gradient (horizontal or vertical)
                $isHorizontal = $direction === 'horizontal';
                $dimension = $isHorizontal ? $this->width : $this->height;

                for ($i = 0; $i <= $steps; $i++) {
                    $progress = $i / $steps;

                    if ($progress < 0.5) {
                        $p = $progress * 2;
                        $r = (int)($rgb1[0] + ($rgb2[0] - $rgb1[0]) * $p);
                        $g = (int)($rgb1[1] + ($rgb2[1] - $rgb1[1]) * $p);
                        $b = (int)($rgb1[2] + ($rgb2[2] - $rgb1[2]) * $p);
                    } else {
                        $p = ($progress - 0.5) * 2;
                        $r = (int)($rgb2[0] + ($rgb3[0] - $rgb2[0]) * $p);
                        $g = (int)($rgb2[1] + ($rgb3[1] - $rgb2[1]) * $p);
                        $b = (int)($rgb2[2] + ($rgb3[2] - $rgb2[2]) * $p);
                    }

                    $color = sprintf('#%02x%02x%02x', $r, $g, $b);
                    $pos = (int)($dimension * $progress);
                    $stripSize = (int)($dimension / $steps) + 2;

                    if ($isHorizontal) {
                        $img->drawRectangle($pos, 0, function ($rect) use ($stripSize, $color) {
                            $rect->size($stripSize, $this->height);
                            $rect->background($color);
                            $rect->border($color, 0);
                        });
                    } else {
                        $img->drawRectangle(0, $pos, function ($rect) use ($stripSize, $color) {
                            $rect->size($this->width, $stripSize);
                            $rect->background($color);
                            $rect->border($color, 0);
                        });
                    }
                }
        }

        return $img;
    }

    private function addFlowingShapes($img, array $palette, int $seed): void
    {
        // Add 3-5 large organic shapes with varying opacity
        $numShapes = 3 + ($seed % 3);

        for ($i = 0; $i < $numShapes; $i++) {
            $color = $palette[mt_rand(0, count($palette) - 1)];
            $rgb = $this->hexToRgb($color);

            // Vary brightness
            $brightness = mt_rand(-30, 40);
            $rgb = [
                max(0, min(255, $rgb[0] + $brightness)),
                max(0, min(255, $rgb[1] + $brightness)),
                max(0, min(255, $rgb[2] + $brightness)),
            ];

            // Random position
            $x = mt_rand(-200, $this->width + 200);
            $y = mt_rand(-200, $this->height + 200);

            // Varying sizes and opacity
            $radius = mt_rand(200, 500);
            $alpha = mt_rand(15, 35); // 15-35% opacity

            $colorWithAlpha = sprintf('#%02x%02x%02x%02x', $rgb[0], $rgb[1], $rgb[2], (int)($alpha * 255 / 100));

            // Mix circles and ellipses
            if (mt_rand(0, 1) === 0) {
                $img->drawCircle($x, $y, function ($circle) use ($radius, $colorWithAlpha) {
                    $circle->radius($radius);
                    $circle->background($colorWithAlpha);
                    $circle->border($colorWithAlpha, 0);
                });
            } else {
                $width = $radius + mt_rand(-100, 100);
                $height = $radius + mt_rand(-100, 100);

                $img->drawEllipse($x, $y, function ($ellipse) use ($width, $height, $colorWithAlpha) {
                    $ellipse->size($width, $height);
                    $ellipse->background($colorWithAlpha);
                    $ellipse->border($colorWithAlpha, 0);
                });
            }
        }
    }

    private function hexToRgb(string $hex): array
    {
        $hex = ltrim($hex, '#');
        return [
            hexdec(substr($hex, 0, 2)),
            hexdec(substr($hex, 2, 2)),
            hexdec(substr($hex, 4, 2)),
        ];
    }
}
