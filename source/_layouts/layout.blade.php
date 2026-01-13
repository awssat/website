<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>@section('title'){{ $page->siteName }}@show</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
@viteRefresh()
<link rel="stylesheet" href="{{ vite('source/_assets/css/app.css') }}">
<script defer type="module" src="{{ vite('source/_assets/js/app.js') }}"></script>
<link rel="home" href="{{ $page->baseUrl }}">
<link rel="icon" href="{{ url('/favicon.ico') }}">
<link href="{{ url('/blog/feed.atom') }}" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed">
@stack('head')
</head>
<body class="mx-auto max-w-5xl px-0 md:px-4 container antialiased">
@if (!$page->isPath(''))
    <header x-data="{ open: false }"
        class="w-full flex justify-between flex-col md:flex-row font-bold text-gray-700">
        <div
            class="base-logo-box flex items-center px-3 py-2 md:flex-col md:justify-between md:rounded-b border border-t-0 shadow-sm w-full md:w-40 font-bold">
            <a href="{{ $page->baseUrl }}" class="flex items-center w-full text-lg">
                <img src="{{ $page->baseUrl }}/assets/images/logo.png" class="w-10 mr-2" alt="Awssat"
                    aria-roledescription="Logo of Awssat">
                Awssat
            </a>


            <div
                class="md:block flex items-center base-breadcrumbs rounded-lg px-3 md:mt-1 md:w-full md:text-center">
                <button @click="open = true" class="flex items-center md:hidden focus:outline-none"
                    aria-label="Website Menu">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" x-show="!open"
                        x-transition
                        class="transition duration-100 transform -skew-y-12 ease-in-out fill-current w-8 h-8">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" x-show="open"
                        x-transition
                        class="transition duration-100 transform skew-y-12 fill-current w-8 h-8">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M3 18h13v-2H3v2zm0-5h10v-2H3v2zm0-7v2h13V6H3zm18 9.59L17.42 12 21 8.41 19.59 7l-5 5 5 5L21 15.59z" />
                    </svg>
                </button>
                @if ($page->isPath('blog*'))
                    <a class="w-full hidden md:block" href="{{ $page->baseUrl }}/blog">Blog</a>
                @elseif($page->isPath('opensource*'))
                    <a class="w-full hidden md:block" href="{{ $page->baseUrl }}/opensource">Open Source</a>
                @elseif($page->isPath('projects*'))
                    <a class="w-full hidden md:block" href="{{ $page->baseUrl }}/projects">Projects</a>
                @endif
            </div>

        </div>

        <div class="md:ml-1">
            @include('_layouts.partial.side_menu')
        </div>
    </header>
    <main class="flex justify-between h-full mt-4">
    @yield('main')

    </main>
    @else
    @yield('main')

    @endif
</body>
</html>
