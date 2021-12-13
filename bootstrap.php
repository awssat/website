<?php
// @var $container \Illuminate\Container\Container
// @var $events \TightenCo\Jigsaw\Events\EventBus


// $events->beforeBuild(App\Listeners\...::class);
// $events->afterCollections(App\Listeners\...::class);

$events->afterCollections(App\Listeners\GenerateTagsCollection::class);
$events->afterBuild(App\Listeners\GenerateSitemap::class);
$events->afterBuild(App\Listeners\GenerateCoverImages::class);
