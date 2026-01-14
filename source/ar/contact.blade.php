---
title: اتصل بنا
description: تواصل مع Awssat عبر تويتر، GitHub، Discord، أو البريد الإلكتروني للاستفسار عن تطوير Laravel ومشاريع المصادر المفتوحة.
---
@extends('_layouts.layout')

@php
    $page->locale = 'ar';
@endphp

@section('title', 'اتصل بنا - ' . $page->siteName)

@section('seo-meta')
    <meta name="description" content="تواصل مع Awssat عبر تويتر، GitHub، Discord، أو البريد الإلكتروني للاستفسار عن تطوير Laravel ومشاريع المصادر المفتوحة.">
    <link rel="canonical" href="{{ $page->getUrl() }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $page->siteName }}">
    <meta property="og:url" content="{{ $page->getUrl() }}">
    <meta property="og:title" content="اتصل بنا - {{ $page->siteName }}">
    <meta property="og:description" content="تواصل مع Awssat عبر تويتر، GitHub، Discord، أو البريد الإلكتروني.">
    <meta property="og:image" content="{{ url('/assets/images/og-default.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="ar_AR">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@awssat">
    <meta name="twitter:title" content="اتصل بنا - {{ $page->siteName }}">
    <meta name="twitter:description" content="تواصل مع Awssat عبر تويتر، GitHub، Discord، أو البريد الإلكتروني.">
    <meta name="twitter:image" content="{{ url('/assets/images/og-default.jpg') }}">
@endsection

@section('main')
@include('_layouts.partial.contact_content')
@endsection
