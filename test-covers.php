<?php

require __DIR__ . '/vendor/autoload.php';

use App\Helpers\ModernCoverGenerator;

// Mock post object
class MockPost {
    public $title;
    public $tags;
    public $date;

    public function __construct($title, $tags, $date) {
        $this->title = $title;
        $this->tags = $tags;
        $this->date = new DateTime($date);
    }

    public function getDate() {
        return $this->date;
    }

    public function getFilename() {
        return str_replace(' ', '-', strtolower($this->title));
    }
}

// Create test posts
$posts = [
    new MockPost('How to make faker uses multiple locales with Laravel model factories', ['php', 'laravel'], '2022-05-04'),
    new MockPost('Hello World', ['general'], '2021-12-14'),
    new MockPost('How to implement translations and routes into Inertia and Laravel', ['php', 'laravel'], '2022-04-18'),
];

$generator = new ModernCoverGenerator();
$destination = __DIR__;

echo "Generating test covers...\n\n";

foreach ($posts as $post) {
    echo "Generating: {$post->title}\n";
    echo "  Tags: " . implode(', ', $post->tags) . "\n";
    echo "  Date: {$post->date->format('Y-m-d')}\n";

    // Debug: Show composite seed calculation
    $tagString = implode(',', $post->tags);
    $dateString = $post->date->format('Y-m-d');
    $compositeString = $post->title . $tagString . $dateString;
    $compositeSeed = crc32($compositeString);

    echo "  Composite String: '$compositeString'\n";
    echo "  Composite Seed: $compositeSeed\n";
    echo "  Day of Year: {$post->date->format('z')}\n";
    $shift = ((int)$post->date->format('z') % 30) - 15;
    echo "  Color Shift: $shift\n";

    $result = $generator->generate($post, $destination);

    if ($result) {
        echo "  ✓ Generated: assets/images/covers/{$post->getFilename()}.png\n";
    } else {
        echo "  ✗ Failed to generate\n";
    }
    echo "\n";
}

echo "Done! Check assets/images/covers/ folder\n";
