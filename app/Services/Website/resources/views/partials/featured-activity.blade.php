@php
    $h = isset($h) ? $h : 400;
    $w = isset($w) ? $w : 414;
@endphp
<a href="{{ route('website.activities.detail', ['activity' => $activity->slug]) }}">
    <div class="explore-wrap hovereffect">
        <figure>
            <div class="explore-wrap-overlay"></div>
            <img data-src="{{ asset('ruploads/' . $activity->getFirstImage()) }}?w={{ $w }}&h={{ $h }}&fit=crop"
                alt="{{ $activity->title }}" class="lazy">
        </figure>
        <h4>{{ $activity->title }}</h4>
        <div class="overlay"></div>
    </div>
</a>
