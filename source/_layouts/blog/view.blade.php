@extends('_layouts.blog.layout')

@section('title'){{ $page->title ?? '--' }} — @parent @endsection

@section('seo-meta')
    @php
        $pageTitle = $page->title;
        $pageDescription = $page->description ?? $page->getExcerpt(160);
        $pageDescription = trim(strip_tags($pageDescription));
        if (strlen($pageDescription) > 200) {
            $pageDescription = mb_substr($pageDescription, 0, 197) . '...';
        }
        $pageUrl = $page->getUrl();
        $pageImage = $page->getCoverImage();
        $publishedTime = $page->getDate()?->toIso8601String();
        $modifiedTime = !empty($page->updated_at) ? $page->getUpdatedAt()?->toIso8601String() : null;
        $pageLocale = $page->locale ?? 'en';
    @endphp

    {{-- Basic Meta Tags --}}
    <meta name="description" content="{{ $pageDescription }}">
    @if(!empty($page->tags))
    <meta name="keywords" content="{{ implode(', ', $page->tags) }}">
    @endif
    <link rel="canonical" href="{{ $pageUrl }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="article">
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

    {{-- Article-specific Open Graph --}}
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

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@awssat">
    <meta name="twitter:creator" content="@awssat">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $pageDescription }}">
    <meta name="twitter:image" content="{{ $pageImage }}">
    <meta name="twitter:image:alt" content="{{ $pageTitle }}">

    {{-- Structured Data for SEO --}}
    <script type="application/ld+json">{!! $page->getStructuredData() !!}</script>
@endsection

@section('blog_main')
<article class="bg-white dark:bg-gray-900 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-800 overflow-hidden">
    @include('_layouts.blog.partial.post')
</article>
@stop
