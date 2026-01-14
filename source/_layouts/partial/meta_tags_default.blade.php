@php
    // Determine page type and set defaults
    $pageType = 'website';
    $pageTitle = $page->title ?? $page->siteName;
    $fullTitle = isset($page->title) ? $page->title . ' — ' . $page->siteName : $page->siteName;
    $pageDescription = $page->description ?? $page->siteDescription ?? 'Expert Laravel development, open source contributions, and web engineering excellence.';
    $pageUrl = $page->getUrl();
    $pageImage = null;
    $pageAuthor = $page->author ?? $page->siteAuthor ?? 'Awssat';
    $pageLocale = $page->locale ?? 'en';
    $twitterCard = 'summary_large_image';

    // Determine if this is a blog post
    $isPost = isset($page->date) && !empty($page->date) && strpos($page->getPath(), 'blog') !== false;

    // Set page-specific metadata
    if ($isPost) {
        $pageType = 'article';
        $pageImage = $page->getCoverImage();

        // Generate excerpt if no description provided
        if (!isset($page->description) || empty($page->description)) {
            $pageDescription = $page->getExcerpt(160);
            $pageDescription = strip_tags($pageDescription);
        }
    } elseif (isset($page->type) && in_array($page->type, ['website', 'package', 'laravel-package'])) {
        // Portfolio item
        $pageType = 'website';
        $pageImage = $page->getScreenshot();
    } else {
        // Regular page (home, portfolio index, blog index, etc.)
        $pageImage = url('/assets/images/og-default.jpg'); // Default OG image
    }

    // Fallback for image
    if (empty($pageImage)) {
        $pageImage = url('/assets/images/og-default.jpg');
    }

    // Clean description
    $pageDescription = trim(strip_tags($pageDescription));
    if (strlen($pageDescription) > 200) {
        $pageDescription = mb_substr($pageDescription, 0, 197) . '...';
    }

    // Get publish and modified dates for articles
    $publishedTime = $isPost ? $page->getDate()?->toIso8601String() : null;
    $modifiedTime = $isPost && !empty($page->updated_at) ? $page->getUpdatedAt()?->toIso8601String() : null;

    // Twitter handle
    $twitterHandle = '@awssat';
@endphp

{{-- Basic Meta Tags --}}
<meta name="description" content="{{ $pageDescription }}">
@if($isPost && !empty($page->tags))
<meta name="keywords" content="{{ implode(', ', $page->tags) }}">
@endif
<link rel="canonical" href="{{ $pageUrl }}">

{{-- Open Graph / Facebook / WhatsApp / LinkedIn / Bluesky --}}
<meta property="og:type" content="{{ $pageType }}">
<meta property="og:site_name" content="{{ $page->siteName }}">
<meta property="og:url" content="{{ $pageUrl }}">
<meta property="og:title" content="{{ $pageTitle }}">
<meta property="og:description" content="{{ $pageDescription }}">
<meta property="og:image" content="{{ $pageImage }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ $pageTitle }}">
<meta property="og:locale" content="{{ $pageLocale === 'ar' ? 'ar_AR' : 'en_US' }}">
@if(isset($page->alternateLocale))
<meta property="og:locale:alternate" content="{{ $page->alternateLocale === 'ar' ? 'ar_AR' : 'en_US' }}">
@endif

{{-- Article-specific Open Graph tags --}}
@if($pageType === 'article')
<meta property="article:published_time" content="{{ $publishedTime }}">
@if($modifiedTime)
<meta property="article:modified_time" content="{{ $modifiedTime }}">
@endif
<meta property="article:author" content="{{ $page->author ?? $page->siteAuthor }}">
@if(!empty($page->tags))
@foreach($page->tags as $tag)
<meta property="article:tag" content="{{ $tag }}">
@endforeach
@endif
<meta property="article:section" content="Technology">
@endif

{{-- Twitter / X Card Tags --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@awssat">
<meta name="twitter:creator" content="@awssat">
<meta name="twitter:title" content="{{ $pageTitle }}">
<meta name="twitter:description" content="{{ $pageDescription }}">
<meta name="twitter:image" content="{{ $pageImage }}">
<meta name="twitter:image:alt" content="{{ $pageTitle }}">
