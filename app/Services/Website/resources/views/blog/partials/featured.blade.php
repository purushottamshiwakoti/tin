<div class="row">
    @foreach ($posts as $post)
        <div class="col-lg-3 col-md-3 col-sm-4 col-12 feature-wrap">
            <div class="row">
                <figure>
                    <img data-src="{{ asset('ruploads/' . $post->getFirstImage()) }}?w=476&h=532&fit=crop" class="lazy"
                        alt="{!! strip_tags($post->title) !!}">
                </figure>
                <div class="overlay-text">
                    <h2>{!! $post->title !!}</h2>
                    <p>{{ $post->created_at->format('d M Y') }}</p>
                    <a href="{{ route('website.blog.detail', ['post' => $post->slug]) }}" class="btn btn-wish">Read More</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
