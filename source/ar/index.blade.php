@extends('_layouts.layout')

@php
    $page->locale = 'ar';
@endphp

@section('title', $page->siteName . ' - نبني مستقبل الويب')

@section('main')
@include('_layouts.partial.home_content')
@endsection
