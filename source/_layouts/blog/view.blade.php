@extends('_layouts.blog.layout')
@push('head')
<meta property="og:title" content="{{ $page->title }}">

<meta property="og:image" content="{{ $page->getCoverImage() }}">
<meta property="twitter:image:src" content="{{ $page->getCoverImage() }}">
<meta property="og:image:width" content="1128">
<meta property="og:image:height" content="600">

@if (!empty($page->description))
<meta name="description" content="{{ $page->description }}">
<meta property="og:description" content="{{ $page->description }}">
@endif
<meta property="og:url" content="{{ $page->getUrl() }}">
<meta property="og:type" content="article">
<script type="application/ld+json">{!! $page->getStructuredData() !!}</script>
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:widgets:new-embed-design" content="on">
<meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
@endpush

@section('title'){{ $page->title ?? '--' }} — @parent @endsection

@section('blog_main')
<article class="bg-white dark:bg-gray-900 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-800 overflow-hidden animate-on-scroll">
    @include('_layouts.blog.partial.post')
</article>
@stop
