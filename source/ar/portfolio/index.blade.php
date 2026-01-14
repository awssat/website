---
pagination:
    collection: portfolio
    perPage: 100
---
@extends('_layouts.layout')

@php
    $page->locale = 'ar';
@endphp

@section('title', 'الأعمال - ' . $page->siteName)

@section('main')
@include('_layouts.partial.portfolio_content')
@endsection
