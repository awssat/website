---
permalink: 404.html
---
@extends('_layouts.layout')

@section('main')
<div class="flex flex-col items-center justify-center w-full opensource-doc-body md:px-4 px-12 h-screen -mt-32">
    <p class="font-black leading-loose text-2xl md:text-3xl">
         Page not found, but it's ok.
    </p>
    <p class="text-right w-full text-md text-gray-600">
    &mdash; also called 404 error page.
    </p>

    <p class="mt-12 font-bold md:text-2xl text-xl border-t pt-4">
    If you are looking for a specific blog post, then it's ok because we use tags to make it easy for you to find any post, or just use Google (site:awssat.com your keyword).
    </p>
    <p class="mt-5 font-bold md:text-2xl text-xl border-t pt-4">
    If you are looking for documenations of our packages, then go to the Github page of that package and you will find it there.
    </p>
    </div>
@endsection
