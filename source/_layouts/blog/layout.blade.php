@extends('_layouts.layout')


@section('main')
<div class="w-full mx-auto flex mt-8 p-4 md:p-0">
    <div class="w-full x">
        @yield('blog_main')

    </div>
    <div class="w-1/5 hidden lg:block pl-4 border-l base-left-side-container ml-4">
        <nav role="navigation" class="w-full base-left-side-nav p-3 rounded">
            <div class="text-center font-bold base-left-side-nav-title rounded mb-2">Tags</div>
            @foreach ($tags as $tag)
            <a href="{{ $page->getTagUrl($tag->filename) }}" title="all posts under {{ $tag->title }}"
                class="flex items-center justify-start hover:underline pb-1 @if ($page->isActive($tag->filename)) font-bold -ml-3 @endif">
                <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0  24 24"
                    class="w-4 h-4 fill-current mr-1">
                    @if ($tag->filename == 'tweet')
                    <path
                        d="M23.643 4.937c-.835.37-1.732.62-2.675.733a4.67 4.67 0 0 0 2.048-2.578 9.3 9.3 0 0 1-2.958 1.13 4.66 4.66 0 0 0-7.938 4.25 13.229 13.229 0 0 1-9.602-4.868c-.4.69-.63 1.49-.63 2.342A4.66 4.66 0 0 0 3.96 9.824a4.647 4.647 0 0 1-2.11-.583v.06a4.66 4.66 0 0 0 3.737 4.568 4.692 4.692 0 0 1-2.104.08 4.661 4.661 0 0 0 4.352 3.234 9.348 9.348 0 0 1-5.786 1.995 9.5 9.5 0 0 1-1.112-.065 13.175 13.175 0 0 0 7.14 2.093c8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602a9.47 9.47 0 0 0 2.323-2.41z">
                    </path>
                    @elseif($tag->filename == 'link')
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z" />
                    @elseif($tag->filename == 'video')
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M18 4l2 4h-3l-2-4h-2l2 4h-3l-2-4H8l2 4H7L5 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V4h-4z" />
                    @elseif($tag->filename == 'original')
                    <g>
                        <rect fill="none" height="24" width="24" />
                    </g>
                    <g>
                        <path
                            d="M23,12l-2.44-2.79l0.34-3.69l-3.61-0.82L15.4,1.5L12,2.96L8.6,1.5L6.71,4.69L3.1,5.5L3.44,9.2L1,12l2.44,2.79l-0.34,3.7 l3.61,0.82L8.6,22.5l3.4-1.47l3.4,1.46l1.89-3.19l3.61-0.82l-0.34-3.69L23,12z M10.09,16.72l-3.8-3.81l1.48-1.48l2.32,2.33 l5.85-5.87l1.48,1.48L10.09,16.72z" />
                    </g>
                    @else
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M17.63 5.84C17.27 5.33 16.67 5 16 5L5 5.01C3.9 5.01 3 5.9 3 7v10c0 1.1.9 1.99 2 1.99L16 19c.67 0 1.27-.33 1.63-.84L22 12l-4.37-6.16z" />
                    @endif
                </svg>{{ $tag->title }}</a>
            @endforeach
        </nav>

        {{-- --}}
    </div>
</div>
@stop