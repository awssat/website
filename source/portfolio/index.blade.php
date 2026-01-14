---
pagination:
    collection: portfolio
    perPage: 100
---
@extends('_layouts.layout')

@php
    $page->locale = 'en';
@endphp

@section('title', 'Portfolio - ' . $page->siteName)

@section('main')
@include('_layouts.partial.portfolio_content')
@endsection
