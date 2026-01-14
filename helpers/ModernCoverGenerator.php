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

    // SVG logos for each tech tag
    private const SVG_LOGOS = [
        'laravel' => '<svg viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M41 9.88889L33 5.44444L25 9.88889M41 9.88889L33 14.3333M41 9.88889V18.7778L33 23.2222M25 9.88889V18.7778M25 9.88889L33 14.3333M25 18.7778L33 23.2222M25 18.7778L9 27.6667M33 23.2222V32.1111L17 41M33 23.2222V14.3333M33 23.2222L17 32.1111M9 27.6667L17 32.1111M9 27.6667V9.88889M1 5.44444L9 1L17 5.44444M1 5.44444V32.1111L17 41M1 5.44444L9 9.88889M17 41V32.1111M9 9.88889L17 5.44444M17 5.44444V23.2222" stroke="white" stroke-width="1.5" opacity="0.85"/></svg>',

        'vue' => '<svg viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg"><path fill="white" opacity="0.5" d="M78.8,10L64,35.4L49.2,10H0l64,110l64-110C128,10,78.8,10,78.8,10z"/><path fill="white" opacity="0.9" d="M78.8,10L64,35.4L49.2,10H25.6L64,76l38.4-66H78.8z"/></svg>',

        'php' => '<svg viewBox="0 0 711 384" xmlns="http://www.w3.org/2000/svg"><ellipse cx="360" cy="192" rx="330" ry="180" fill="white" opacity="0.12"/><g opacity="0.9" fill="white"><path d="M161.73 145.31c12.07 0 21.07 2.22 26.77 6.61 5.64 4.34 9.53 11.86 11.57 22.35 1.9 9.81 1.18 16.65-2.15 20.35-3.41 3.77-10.77 5.69-21.89 5.69h-19.28l-11.69-55h16.67zm-63.06-67.75a3.27 3.27 0 0 0-2.31 1.09c-.57.69-.8 1.6-.63 2.48l27.33 145.75a3.27 3.27 0 0 0 3.12 2.43h61.05c19.19 0 33.47-5.21 42.45-15.49 9.02-10.33 11.81-24.77 8.28-42.92-1.44-7.39-3.91-14.26-7.34-20.41-3.44-6.15-7.98-11.85-13.51-16.93-6.62-8.19-14.1-12.68-22.24-15.32-7-2.61-17.28-3.93-29.55-3.93h-24.72l-7.06-36.32a3.27 3.27 0 0 0-2.94-2.43h-31.75z" transform="matrix(1.25,0,0,-1.25,-4.4,394.3)"/><path d="M311.58 116.31a3.27 3.27 0 0 0-2.31 1.09c-.57.69-.8 1.6-.63 2.48l12.53 64.49c1.19 6.13.9 10.53-.83 12.39-1.06 1.14-4.23 3.04-13.61 3.04h-22.71l-15.76-81.07a3.27 3.27 0 0 0-2.95-2.43h-31.5a3.27 3.27 0 0 0-2.31 1.09c-.57.69-.8 1.6-.63 2.48l28.33 145.75a3.27 3.27 0 0 0 2.94 2.43h31.5a3.27 3.27 0 0 0 2.32-1.09c.57-.69.8-1.6.63-2.48L286.87 229h24.42c18.61 0 31.22-3.28 38.57-10.03 7.49-6.88 9.83-17.89 6.95-32.72l-13.18-67.82a3.27 3.27 0 0 0-2.95-2.43l-32-.69z" transform="matrix(1.25,0,0,-1.25,-4.4,394.3)"/><path d="M409.55 145.31c12.07 0 21.07 2.22 26.77 6.61 5.64 4.34 9.53 11.86 11.57 22.35 1.9 9.81 1.18 16.65-2.15 20.35-3.41 3.77-10.77 5.69-21.89 5.69h-19.28l-10.69-55h16.67zm-63.06-67.75a3.27 3.27 0 0 0-2.31 1.09c-.57.69-.8 1.6-.63 2.48l28.33 145.75a3.27 3.27 0 0 0 3.12 2.43h61.05c19.19 0 33.47-5.21 42.45-15.49 9.02-10.33 11.81-24.77 8.28-42.92-1.44-7.39-3.91-14.26-7.34-20.41-3.44-6.15-7.98-11.85-13.51-16.93-6.62-8.19-14.1-12.68-22.24-15.32-7-2.61-17.28-3.93-29.55-3.93h-24.72l-7.06-36.32a3.27 3.27 0 0 0-2.95-2.43h-31.75z" transform="matrix(1.25,0,0,-1.25,-4.4,394.3)"/></g></svg>',

        'javascript' => '<svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><rect fill="white" opacity="0.9" width="256" height="256"/><path fill="#black" opacity="0.8" d="M67.312 213.932l19.59-11.856c3.78 6.701 7.218 12.371 15.465 12.371 7.905 0 12.89-3.092 12.89-15.12v-81.798h24.057v82.138c0 24.917-14.606 36.259-35.916 36.259-19.245 0-30.416-9.967-36.087-21.996M152.381 211.354l19.588-11.341c5.157 8.421 11.859 14.607 23.715 14.607 9.969 0 16.325-4.984 16.325-11.858 0-8.248-6.53-11.17-17.528-15.98l-6.013-2.58c-17.357-7.387-28.87-16.667-28.87-36.257 0-18.044 13.747-31.792 35.228-31.792 15.294 0 26.292 5.328 34.196 19.247l-18.732 12.03c-4.125-7.389-8.591-10.31-15.465-10.31-7.046 0-11.514 4.468-11.514 10.31 0 7.217 4.468 10.14 14.778 14.608l6.014 2.577c20.45 8.765 31.963 17.7 31.963 37.804 0 21.654-17.012 33.51-39.867 33.51-22.339 0-36.774-10.654-43.819-24.574"/></svg>',
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

        // Add tech logo if post has matching tags
        $this->addTechLogo($img, $post->tags ?? [], $seed);

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

    private function addTechLogo($img, array $tags, int $seed): void
    {
        // Find first matching tag that has a logo
        $logoTag = null;
        foreach ($tags as $tag) {
            $tagLower = strtolower($tag);
            if (isset(self::SVG_LOGOS[$tagLower])) {
                $logoTag = $tagLower;
                break;
            }
        }

        if (!$logoTag) {
            return; // No logo found
        }

        // Create temp directory if needed
        $tempDir = sys_get_temp_dir() . '/cover-logos';
        if (!is_dir($tempDir)) {
            @mkdir($tempDir, 0777, true);
        }

        // Save SVG to temp file
        $svgPath = $tempDir . '/' . $logoTag . '.svg';
        $pngPath = $tempDir . '/' . $logoTag . '-hires.png';

        file_put_contents($svgPath, self::SVG_LOGOS[$logoTag]);

        // Convert SVG to high-res PNG (800x800) using rsvg-convert for smoothness
        $cmd = sprintf(
            'rsvg-convert -w 800 -h 800 %s -o %s 2>&1',
            escapeshellarg($svgPath),
            escapeshellarg($pngPath)
        );

        exec($cmd, $output, $returnCode);

        if ($returnCode !== 0 || !file_exists($pngPath)) {
            return; // Conversion failed
        }

        // Load the high-res PNG
        try {
            $logo = $this->imageManager->read($pngPath);

            // Scale logo to desired size on cover (250-350px)
            $logoSizes = [250, 280, 300, 320, 350];
            $logoSize = $logoSizes[$seed % count($logoSizes)];
            $logo->scale($logoSize, $logoSize);

            // Position logo (bottom-right, bottom-left, center, etc.)
            $positions = [
                ['bottom-right', -60, -60],
                ['bottom-left', 60, -60],
                ['center', 200, 150],
                ['center', -200, 150],
                ['center', 0, -100],
            ];

            $position = $positions[$seed % count($positions)];

            // Apply subtle opacity by converting to grayscale and reducing opacity
            $logo->greyscale();

            // Place the logo
            $img->place($logo, $position[0], $position[1], $position[2]);

            // Cleanup temp files
            @unlink($pngPath);
            @unlink($svgPath);
        } catch (\Exception $e) {
            // Silently fail if logo can't be loaded
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
