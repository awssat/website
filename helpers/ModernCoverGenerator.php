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

    // Tag-based visual themes with SVG logos
    private const TAG_THEMES = [
        'laravel' => [
            'colors' => [
                ['#FF2D20', '#FB923C'], // Laravel red-orange
                ['#FF0844', '#FFB199'], // Alternative pink-orange
                ['#E41E3F', '#FC6471'], // Deep red-coral
            ],
            'svg' => 'laravel',
        ],
        'php' => [
            'colors' => [
                ['#777BB4', '#AEB9F5'], // PHP purple-lavender
                ['#8892BF', '#B4A0FF'], // Alternative purple
                ['#6366F1', '#A78BFA'], // Indigo-purple
            ],
            'svg' => 'php',
        ],
        'vue' => [
            'colors' => [
                ['#42B883', '#35495E'], // Vue green-dark
                ['#34D399', '#10B981'], // Emerald
                ['#2DD4BF', '#14B8A6'], // Teal
            ],
            'svg' => 'vue',
        ],
        'tailwind' => [
            'colors' => [
                ['#06B6D4', '#3B82F6'], // Tailwind cyan-blue
                ['#0EA5E9', '#6366F1'], // Sky-indigo
                ['#14B8A6', '#8B5CF6'], // Teal-purple
            ],
            'svg' => 'tailwind',
        ],
        'alpine' => [
            'colors' => [
                ['#8BC0D0', '#77C1D2'], // Alpine light blue
                ['#66D9EF', '#84CFDC'], // Cyan
                ['#6366F1', '#06B6D4'], // Indigo-cyan
            ],
            'svg' => 'alpine',
        ],
        'livewire' => [
            'colors' => [
                ['#FB70A9', '#E11D74'], // Livewire pink
                ['#F472B6', '#EC4899'], // Pink
                ['#E879F9', '#D946EF'], // Fuchsia
            ],
            'svg' => 'livewire',
        ],
        'javascript' => [
            'colors' => [
                ['#F7DF1E', '#F59E0B'], // JS yellow-amber
                ['#FCD34D', '#FBBF24'], // Yellow-gold
                ['#FACC15', '#F59E0B'], // Yellow-amber
            ],
            'svg' => 'code',
        ],
    ];

    // Default theme
    private const DEFAULT_THEME = [
        'colors' => [
            ['#8B5CF6', '#7C3AED'], // Purple
            ['#7C3AED', '#06B6D4'], // Purple-cyan
            ['#6366F1', '#8B5CF6'], // Indigo-purple
        ],
        'svg' => null,
    ];

    public function __construct()
    {
        $this->imageManager = new ImageManager(new Driver());
    }

    public function generate($post, $destination): bool
    {
        // Get theme based on post tags
        $theme = $this->getTagTheme($post->tags ?? []);

        // Create composite seed from title + tags + date for true uniqueness
        $tagString = implode(',', $post->tags ?? []);
        $dateString = $post->getDate()->format('Y-m-d');
        $compositeSeed = crc32($post->title . $tagString . $dateString);
        mt_srand($compositeSeed);

        // Pick gradient variation influenced by all factors
        $gradientIndex = $compositeSeed % count($theme['colors']);
        $colors = $theme['colors'][$gradientIndex];

        // Debug output
        echo "  Theme SVG: " . ($theme['svg'] ?? 'none') . "\n";
        echo "  Gradient Index: $gradientIndex / " . count($theme['colors']) . "\n";
        echo "  Original Colors: " . implode(' → ', $colors) . "\n";

        // Slightly modify colors based on date for uniqueness
        $colors = $this->tweakColorsBasedOnDate($colors, $post->getDate());

        echo "  Tweaked Colors: " . implode(' → ', $colors) . "\n";

        // Create base image with smooth gradient
        $img = $this->createSmoothGradient($colors, $compositeSeed);

        // Add noise texture for depth
        $this->addNoiseTexture($img, $compositeSeed);

        // Add smooth geometric shapes (NO PNG logos - they're pixelated)
        $this->addSmoothGeometricShapes($img, $colors, $compositeSeed);

        // Save the image
        if (!is_dir($destination . '/assets/images/covers')) {
            @mkdir($destination . '/assets/images/covers/', 0777, true);
        }

        $result = file_put_contents(
            $destination . '/assets/images/covers/' . $post->getFilename() . '.png',
            $img->toPng()
        );

        return $result !== false;
    }

    private function tweakColorsBasedOnDate(array $colors, \DateTime $date): array
    {
        // Slightly shift hue/saturation based on date to make each post unique
        $dayOfYear = (int)$date->format('z'); // 0-365
        $shift = ($dayOfYear % 30) - 15; // -15 to +15

        $tweaked = [];
        foreach ($colors as $color) {
            $rgb = $this->hexToRgb($color);

            // Shift each channel slightly
            $r = max(0, min(255, $rgb[0] + $shift));
            $g = max(0, min(255, $rgb[1] + $shift));
            $b = max(0, min(255, $rgb[2] + $shift));

            $tweaked[] = sprintf('#%02x%02x%02x', $r, $g, $b);
        }

        return $tweaked;
    }

    private function getTagTheme(array $tags): array
    {
        foreach ($tags as $tag) {
            $tagLower = Str::lower($tag);
            if (isset(self::TAG_THEMES[$tagLower])) {
                return self::TAG_THEMES[$tagLower];
            }
        }
        return self::DEFAULT_THEME;
    }

    private function createSmoothGradient(array $colors, int $seed): \Intervention\Image\Interfaces\ImageInterface
    {
        // Create base image
        $img = $this->imageManager->create($this->width, $this->height);

        // Determine gradient type based on seed
        $types = ['radial', 'diagonal', 'horizontal', 'vertical', 'double-radial'];
        $type = $types[$seed % count($types)];

        [$color1, $color2] = $colors;

        switch ($type) {
            case 'radial':
                $this->createRadialGradient($img, $color1, $color2, $seed);
                break;
            case 'diagonal':
                $this->createDiagonalGradient($img, $color1, $color2);
                break;
            case 'horizontal':
                $this->createHorizontalGradient($img, $color1, $color2);
                break;
            case 'vertical':
                $this->createVerticalGradient($img, $color1, $color2);
                break;
            case 'double-radial':
                $this->createDoubleRadialGradient($img, $color1, $color2, $seed);
                break;
        }

        return $img;
    }

    private function createRadialGradient($img, string $color1, string $color2, int $seed): void
    {
        // Center point varies based on seed
        $positions = [
            [0.5, 0.5],  // center
            [0.3, 0.3],  // top-left
            [0.7, 0.3],  // top-right
            [0.3, 0.7],  // bottom-left
            [0.7, 0.7],  // bottom-right
        ];

        $pos = $positions[$seed % count($positions)];
        $centerX = (int)($this->width * $pos[0]);
        $centerY = (int)($this->height * $pos[1]);

        $rgb1 = $this->hexToRgb($color1);
        $rgb2 = $this->hexToRgb($color2);

        $maxRadius = (int)sqrt($this->width * $this->width + $this->height * $this->height);
        $steps = 400; // Increased for ultra-smooth gradients

        for ($i = 0; $i <= $steps; $i++) {
            $progress = $i / $steps;
            $radius = (int)($maxRadius * $progress);

            $r = (int)($rgb2[0] + ($rgb1[0] - $rgb2[0]) * (1 - $progress));
            $g = (int)($rgb2[1] + ($rgb1[1] - $rgb2[1]) * (1 - $progress));
            $b = (int)($rgb2[2] + ($rgb1[2] - $rgb2[2]) * (1 - $progress));

            $color = sprintf('#%02x%02x%02x', $r, $g, $b);

            // Draw filled circle
            $img->drawCircle($centerX, $centerY, function ($circle) use ($radius, $color) {
                $circle->radius($radius);
                $circle->background($color);
            });
        }
    }

    private function createDoubleRadialGradient($img, string $color1, string $color2, int $seed): void
    {
        // Two radial gradients blending
        $positions = [
            [[0.2, 0.3], [0.8, 0.7]],
            [[0.3, 0.5], [0.7, 0.5]],
            [[0.5, 0.2], [0.5, 0.8]],
        ];

        [$pos1, $pos2] = $positions[$seed % count($positions)];

        $rgb1 = $this->hexToRgb($color1);
        $rgb2 = $this->hexToRgb($color2);

        // Fill with color2 first
        $img->fill($color2);

        // Draw first radial
        $maxRadius = (int)($this->width * 0.7);
        $steps = 300;
        $centerX1 = (int)($this->width * $pos1[0]);
        $centerY1 = (int)($this->height * $pos1[1]);

        for ($i = 0; $i <= $steps; $i++) {
            $progress = $i / $steps;
            $radius = (int)($maxRadius * (1 - $progress));

            $r = (int)($rgb1[0] + ($rgb2[0] - $rgb1[0]) * $progress);
            $g = (int)($rgb1[1] + ($rgb2[1] - $rgb1[1]) * $progress);
            $b = (int)($rgb1[2] + ($rgb2[2] - $rgb1[2]) * $progress);

            $alpha = (int)((1 - $progress * 0.5) * 255);
            $color = sprintf('#%02x%02x%02x%02x', $r, $g, $b, $alpha);

            $img->drawCircle($centerX1, $centerY1, function ($circle) use ($radius, $color) {
                $circle->radius($radius);
                $circle->background($color);
            });
        }

        // Draw second radial
        $centerX2 = (int)($this->width * $pos2[0]);
        $centerY2 = (int)($this->height * $pos2[1]);

        for ($i = 0; $i <= $steps; $i++) {
            $progress = $i / $steps;
            $radius = (int)($maxRadius * 0.8 * (1 - $progress));

            $r = (int)($rgb1[0] + ($rgb2[0] - $rgb1[0]) * $progress * 0.7);
            $g = (int)($rgb1[1] + ($rgb2[1] - $rgb1[1]) * $progress * 0.7);
            $b = (int)($rgb1[2] + ($rgb2[2] - $rgb1[2]) * $progress * 0.7);

            $alpha = (int)((1 - $progress * 0.7) * 255);
            $color = sprintf('#%02x%02x%02x%02x', $r, $g, $b, $alpha);

            $img->drawCircle($centerX2, $centerY2, function ($circle) use ($radius, $color) {
                $circle->radius($radius);
                $circle->background($color);
            });
        }
    }

    private function createDiagonalGradient($img, string $color1, string $color2): void
    {
        $rgb1 = $this->hexToRgb($color1);
        $rgb2 = $this->hexToRgb($color2);
        $steps = 400;

        for ($i = 0; $i < $steps; $i++) {
            $progress = $i / $steps;

            $r = (int)($rgb1[0] + ($rgb2[0] - $rgb1[0]) * $progress);
            $g = (int)($rgb1[1] + ($rgb2[1] - $rgb1[1]) * $progress);
            $b = (int)($rgb1[2] + ($rgb2[2] - $rgb1[2]) * $progress);

            $color = sprintf('#%02x%02x%02x', $r, $g, $b);

            $x = (int)(($this->width / $steps) * $i);
            $y = (int)(($this->height / $steps) * $i);
            $size = (int)ceil((max($this->width, $this->height) / $steps) * 2);

            $img->drawRectangle($x - $size, $y - $size, function ($rect) use ($size, $color) {
                $rect->size($size * 3, $size * 3);
                $rect->background($color);
            });
        }
    }

    private function createHorizontalGradient($img, string $color1, string $color2): void
    {
        $rgb1 = $this->hexToRgb($color1);
        $rgb2 = $this->hexToRgb($color2);
        $steps = 400;

        for ($i = 0; $i < $steps; $i++) {
            $progress = $i / $steps;

            $r = (int)($rgb1[0] + ($rgb2[0] - $rgb1[0]) * $progress);
            $g = (int)($rgb1[1] + ($rgb2[1] - $rgb1[1]) * $progress);
            $b = (int)($rgb1[2] + ($rgb2[2] - $rgb1[2]) * $progress);

            $color = sprintf('#%02x%02x%02x', $r, $g, $b);
            $x = (int)(($this->width / $steps) * $i);
            $width = (int)ceil($this->width / $steps) + 1;

            $img->drawRectangle($x, 0, function ($rect) use ($width, $color) {
                $rect->size($width, $this->height);
                $rect->background($color);
            });
        }
    }

    private function createVerticalGradient($img, string $color1, string $color2): void
    {
        $rgb1 = $this->hexToRgb($color1);
        $rgb2 = $this->hexToRgb($color2);
        $steps = 400;

        for ($i = 0; $i < $steps; $i++) {
            $progress = $i / $steps;

            $r = (int)($rgb1[0] + ($rgb2[0] - $rgb1[0]) * $progress);
            $g = (int)($rgb1[1] + ($rgb2[1] - $rgb1[1]) * $progress);
            $b = (int)($rgb1[2] + ($rgb2[2] - $rgb1[2]) * $progress);

            $color = sprintf('#%02x%02x%02x', $r, $g, $b);
            $y = (int)(($this->height / $steps) * $i);
            $height = (int)ceil($this->height / $steps) + 1;

            $img->drawRectangle(0, $y, function ($rect) use ($height, $color) {
                $rect->size($this->width, $height);
                $rect->background($color);
            });
        }
    }

    private function addNoiseTexture($img, int $seed): void
    {
        // Add subtle noise for texture
        $intensity = 5 + ($seed % 5); // 5-10

        for ($i = 0; $i < 5000; $i++) {
            $x = mt_rand(0, $this->width - 1);
            $y = mt_rand(0, $this->height - 1);

            $brightness = mt_rand(-$intensity, $intensity);
            $alpha = mt_rand(2, 8);

            if ($brightness > 0) {
                $color = sprintf('#ffffff%02x', $alpha);
            } else {
                $color = sprintf('#000000%02x', $alpha);
            }

            $img->drawCircle($x, $y, function ($circle) use ($color) {
                $circle->radius(1);
                $circle->background($color);
            });
        }
    }

    private function addSVGLogo($img, string $svgName, int $seed): void
    {
        // Prepare to load and composite SVG
        // For now, we'll use existing PNG logos if they exist
        $logoPath = __DIR__ . "/../source/assets/images/tags/" . $svgName . ".png";

        if (!file_exists($logoPath)) {
            return;
        }

        try {
            // Load logo
            $logo = $this->imageManager->read($logoPath);

            // Much smaller sizes for subtle watermark (200-280px)
            $scales = [200, 220, 240, 260, 280];
            $targetSize = $scales[$seed % count($scales)];

            // Resize logo proportionally
            $logo->scale($targetSize, $targetSize);

            // Position in corners or edges for subtlety
            $positions = [
                ['bottom-right', -60, -60],  // bottom-right corner
                ['bottom-left', 60, -60],    // bottom-left corner
                ['top-right', -60, 60],      // top-right corner
                ['center', 200, 100],        // off-center right
                ['center', -200, 100],       // off-center left
            ];

            $position = $positions[$seed % count($positions)];

            // Create extremely subtle watermark effect
            // Apply greyscale first to desaturate
            $logo->greyscale();

            // Brighten heavily to create barely-visible watermark
            $logo->brightness(90);

            // Reduce contrast heavily to blend into background
            $logo->contrast(-70);

            // Place logo
            $img->place($logo, $position[0], $position[1], $position[2]);

        } catch (\Exception $e) {
            // Silently fail if logo can't be loaded
        }
    }

    private function addSmoothGeometricShapes($img, array $colors, int $seed): void
    {
        // Add 4-6 smooth geometric shapes (circles and rounded rectangles)
        $numShapes = 4 + ($seed % 3);

        [$color1, $color2] = $colors;
        $rgb1 = $this->hexToRgb($color1);
        $rgb2 = $this->hexToRgb($color2);

        $positions = [
            [0.15, 0.20], [0.85, 0.20],
            [0.15, 0.80], [0.85, 0.80],
            [0.30, 0.40], [0.70, 0.40],
            [0.30, 0.60], [0.70, 0.60],
            [0.50, 0.30], [0.50, 0.70],
        ];

        for ($i = 0; $i < $numShapes; $i++) {
            $pos = $positions[($seed + $i) % count($positions)];
            $x = (int)($this->width * $pos[0]);
            $y = (int)($this->height * $pos[1]);

            // Alternate between colors
            $rgb = ($i % 2 === 0) ? $rgb1 : $rgb2;

            // Vary opacity more (15-35%)
            $alpha = 15 + (($seed + $i) % 20);

            $color = sprintf('#%02x%02x%02x%02x', $rgb[0], $rgb[1], $rgb[2], (int)($alpha * 255 / 100));

            // Alternate between circles and rounded rectangles
            if ($i % 3 === 0) {
                // Draw smooth circle
                $sizes = [250, 300, 350, 400, 450];
                $radius = $sizes[($seed + $i) % count($sizes)];

                $img->drawCircle($x, $y, function ($circle) use ($radius, $color) {
                    $circle->radius($radius);
                    $circle->background($color);
                    $circle->border($color, 0);
                });
            } else {
                // Draw smooth rounded rectangle
                $widths = [300, 350, 400, 450, 500];
                $heights = [200, 250, 300, 350, 400];
                $width = $widths[($seed + $i) % count($widths)];
                $height = $heights[($seed + $i * 2) % count($heights)];

                $x1 = $x - (int)($width / 2);
                $y1 = $y - (int)($height / 2);

                $img->drawRectangle($x1, $y1, function ($rectangle) use ($width, $height, $color) {
                    $rectangle->size($width, $height);
                    $rectangle->background($color);
                    $rectangle->border($color, 0);
                });
            }
        }
    }

    private function hexToRgb(string $hex): array
    {
        $hex = ltrim($hex, '#');

        if (strlen($hex) === 3) {
            $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
        }

        return [
            hexdec(substr($hex, 0, 2)),
            hexdec(substr($hex, 2, 2)),
            hexdec(substr($hex, 4, 2))
        ];
    }
}
