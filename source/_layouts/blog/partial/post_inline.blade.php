<div class="w-full flex flex-col relative pb-5 mb-10 break-normal base-post-container border-b">

    <h2 class="text-xl md:text-3xl mb-4 font-bold"><a href="{{ $post->getUrl() }}"
            class="base-post-title">{{ $post->title }}</a></h2>

    <aside class="flex justify-between flex-col md:flex-row text-xs mb-5">
        <div class="flex items-center mb-2 md:mb-0 base-post-aside-date">
            <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg"
                class="w-4 h-4 base-post-aside-icon fill-current mr-1" viewBox="0 0 24 24">
                <path d="M0 0h24v24H0z" fill="none" />
                <path
                    d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z" />
                <path d="M12.5 7H11v6l5.25 3.15.75-1.23-4.5-2.67z" />
            </svg>
            <span title="{{ $post->getDate()->toDayDateTimeString() }}">{{ $post->getDate()->format('F j, Y') }}</span>
            @if (!empty($post->updated_at) && $post->getUpdatedAt() > $post->getDate())
                | updated: <span title="{{ $post->getUpdatedAt()->toDayDateTimeString() }}">{{ $post->getUpdatedAt()->format('F j, Y') }}</span>
            @endif
        </div>
    </aside>
    <div class="lading-9 md:leading-10 font-sans text-lg md:text-xl base-post-body">{!! $post->getExcerpt(200) !!}</div>

    <div class="flex justify-between mt-4 text-sm">
        <a href="{{ $post->external_link ?? $post->getUrl() }}"
            {{ !empty($post->external_link) ? 'target="_tab"' : '' }} title="Read more on '{{ $post->title }}'"
            class="text-lg font-bold text-gray-800 base-post-read-more flex items-center  py-px px-1 rounded group">Read
            More
            @if (!empty($post->external)) <span class="px-1 text-sm font-normal">[{{ $post->getExternalDomain() }}]</span> @else &hellip; @endif
            <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                class="w-5 h-5 fill-current ml-1 transition transform  duration-500 group-hover:translate-x-4">
                @if (!empty($post->external_link))
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z" />
                @else
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z" />
                @endif
            </svg></a>
</div>
</div>
