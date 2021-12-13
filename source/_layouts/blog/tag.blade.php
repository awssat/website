@extends('_layouts.blog.layout')
@section('title') Posts tagged under "{{ $page->title }}" — @parent @endsection

@section('blog_main')
    <div class="rounded-sm p-2 mt-3 mb-8 base-side-menu-ul">
        <h1>Posts tagged under "<strong>{{ $page->title }}</strong>"</h1>
    </div>


    @foreach ($page->postsOfTag($posts) as $post)
    <div class="w-full flex flex-col relative pb-5 mb-5 break-normal base-post-container border-b">
        <h2 class="text-xl md:text-3xl mb-4 font-bold"><a href="{{ $post->getUrl() }}"
                class="base-post-title">{{ $post->title }}</a></h2>
    </div>
    @endforeach

    <div class="mt-3 mb-8">
        {{-- $posts->links() --}}
    </div>
@endsection
