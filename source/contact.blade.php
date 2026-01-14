---
title: Contact
description: Get in touch with Awssat. Connect with us on Twitter, GitHub, Discord, or via email for inquiries about Laravel development and open source projects.
---
@extends('_layouts.layout')

@php
    $page->locale = 'en';
@endphp

@section('title', 'Contact - ' . $page->siteName)

@section('seo-meta')
    <meta name="description" content="Get in touch with Awssat. Connect with us on Twitter, GitHub, Discord, or via email for inquiries about Laravel development and open source projects.">
    <link rel="canonical" href="{{ $page->getUrl() }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $page->siteName }}">
    <meta property="og:url" content="{{ $page->getUrl() }}">
    <meta property="og:title" content="Contact - {{ $page->siteName }}">
    <meta property="og:description" content="Get in touch with Awssat. Connect with us on Twitter, GitHub, Discord, or via email.">
    <meta property="og:image" content="{{ url('/assets/images/og-default.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="en_US">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@awssat">
    <meta name="twitter:title" content="Contact - {{ $page->siteName }}">
    <meta name="twitter:description" content="Get in touch with Awssat. Connect with us on Twitter, GitHub, Discord, or via email.">
    <meta name="twitter:image" content="{{ url('/assets/images/og-default.jpg') }}">
@endsection

@section('main')
@include('_layouts.partial.contact_content')
@endsection
