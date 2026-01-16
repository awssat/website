---
pagination:
    collection: posts
    perPage: 10
---
@extends('_layouts.blog.layout')

@php
    $page->locale = 'ar';
@endphp

@section('title'){{ $page->trans('blog.title') }} — @parent @endsection

@section('blog_main')
@include('_layouts.partial.blog_content')
@stop
