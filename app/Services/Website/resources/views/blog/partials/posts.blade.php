<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 no-gutter blog-list">
    <!-- LATEST POST -->
    @if (isset($posts[0]))
        @php
            $firstPost = $posts[0];
        @endphp
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 latest-blog">
            <div class="row">
                <div class="blog-title">
                    <h2>
                        <a
                            href="{{ route('website.blog.detail', ['post' => $firstPost->slug]) }}">{!! $firstPost->title !!}</a>
                    </h2>
                    <ul>
                        <li>
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            {{ $firstPost->created_at->format('d M Y') }}
                        </li>
                        <li>
                            <i class="fa fa-user" aria-hidden="true"></i> By {{ $firstPost->author_name }}
                        </li>
                        <li>
                            <i class="fa fa-comment" aria-hidden="true"></i> <span class="disqus-comment-count"
                                data-disqus-identifier="{{ $firstPost->slug }}"></span>
                        </li>
                    </ul>
                </div>
                <figure>
                    <a href="{{ route('website.blog.detail', ['post' => $firstPost->slug]) }}">
                        <img src="{{ asset('ruploads/' . $firstPost->getFirstImage()) }}?w=786&h=365&fit=crop"
                            alt="{!! strip_tags($firstPost->title) !!}">
                    </a>
                </figure>
                {!! html_entity_decode($firstPost->excerpt) !!}
                <div class="blog-cta">
                    <a href="{{ route('website.blog.detail', ['post' => $firstPost->slug]) }}" class="btn btn-view">
                        <i class="fa fa-eye"></i> Continue Reading</a>
                </div>
            </div>
        </div>
    @endif
    <!-- BLOG  LIST -->
    <!-- FIRST -->
    @if (count($posts) > 1)
        @php
            $posts->forget(0);
        @endphp
        @foreach ($posts as $post)
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="blog-list-wrap">
                        <div class="blog-img">
                            <figure>
                                <a href="{{ route('website.blog.detail', ['post' => $post->slug]) }}">
                                    <img src="{{ asset('ruploads/' . $post->getFirstImage()) }}?w=262&h=202&fit=crop"
                                        alt="{!! strip_tags($post->title) !!}">
                                </a>
                            </figure>
                        </div>
                        <div class="blog-text">
                            <a href="{{ route('website.blog.detail', ['post' => $post->slug]) }}">
                                <h2>{!! $post->title !!}</h2>
                            </a>
                            <ul>
                                <li>{{ $post->created_at->format('d M Y') }}</li>
                                <li>
                                    <a href="#">By
                                        <span>{{ $post->author_name }}</span>
                                    </a>
                                </li>
                            </ul>
                            <p>{{ str_limit(strip_tags(html_entity_decode($post->excerpt)), 250) }}</p>
                            <p>
                                <a href="{{ route('website.blog.detail', ['post' => $post->slug]) }}"
                                    class="btn btn-post">Read More</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    @endif

</div>
