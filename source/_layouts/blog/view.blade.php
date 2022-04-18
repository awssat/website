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

@section('main')
<div class="w-full mx-auto max-w-5xl flex flex-col p-4 md:p-0">
@include('_layouts.blog.partial.post')
</div>
@stop
