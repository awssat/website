---
title: Blog
description: The list of blog posts for the site
pagination:
    collection: posts
    perPage: 4
---
@extends('_layouts.blog.layout')

@section('title'){{'Blog'}} — @parent @endsection

@section('blog_main')

@foreach ($pagination->items as $post)
    @include('_layouts.blog.partial.post_inline') 
@endforeach

{{-- TODO: fix links previous if currrent: >2 --}}
@if ($pagination->pages->count() > 1)
<nav class="flex my-8">
    @if ($previous = $pagination->previous)
    <a href="{{ $previous }}" title="Previous Page"
        class="bg-gray-200 hover:bg-gray-400 text-blue-700 rounded mr-3 px-5 py-3 flex items-center">
        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
            <path d="M8.388,10.049l4.76-4.873c0.303-0.31,0.297-0.804-0.012-1.105c-0.309-0.304-0.803-0.293-1.105,0.012L6.726,9.516c-0.303,0.31-0.296,0.805,0.012,1.105l5.433,5.307c0.152,0.148,0.35,0.223,0.547,0.223c0.203,0,0.406-0.08,0.559-0.236c0.303-0.309,0.295-0.803-0.012-1.104L8.388,10.049z"></path>
        </svg>
    </a>
    @endif

    @foreach ($pagination->pages as $pageNumber => $path)
    <a href="{{ $path }}" title="Go to Page {{ $pageNumber }}"
        class="rounded mr-3 px-5 py-3 {{ $pagination->currentPage == $pageNumber ? 'bg-gray-600 text-blue-200' : 'bg-gray-100 text-blue-700 hover:bg-gray-400 ' }}">{{
        $pageNumber }}</a>
    @endforeach

    @if ($next = $pagination->next)
    <a href="{{ $next }}" title="Next Page"
        class="bg-gray-200 hover:bg-gray-400 text-blue-700 font-bold rounded mr-3 px-5 py-3 flex items-center">
        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
            <path  d="M11.611,10.049l-4.76-4.873c-0.303-0.31-0.297-0.804,0.012-1.105c0.309-0.304,0.803-0.293,1.105,0.012l5.306,5.433c0.304,0.31,0.296,0.805-0.012,1.105L7.83,15.928c-0.152,0.148-0.35,0.223-0.547,0.223c-0.203,0-0.406-0.08-0.559-0.236c-0.303-0.309-0.295-0.803,0.012-1.104L11.611,10.049z"></path>
        </svg>
    </a>
    @endif
</nav>
@endif
@stop