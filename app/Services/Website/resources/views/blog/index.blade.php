@extends('website::layouts.master')
@section('content')
    <div class="container-fluid page-jumbo regionjumbo">
        <div class="row">
            @if (isset($page))
                <img src="{{ asset('ruploads/' . $page->getCoverImage()) . pages_parallax() }}" class="jumbo-img">
                <div class="overlay"></div>
                <div class="jumbo-txt">
                    <h1>{{ $page->caption }}</h1>
                    <hr>

                </div>
            @else
                @if (isset($category))
                    <img src="{{ asset('ruploads/' . $category->getCoverImage()) . pages_parallax() }}" class="jumbo-img">
                @else
                    <img src="{{ public_asset('website/img/everest3.jpg') }}" class="jumbo-img">
                @endif
                <div class="overlay"></div>
                <div class="jumbo-txt">
                    @if (isset($category))
                        <h1>{{ $category->title }}</h1>
                    @else
                        <h1>{{ ucwords($page_title) }}</h1>
                    @endif
                    <hr>

                </div>
            @endif
        </div>
    </div>
    @if (isset($featured))
    @endif
    <div class="container-fluid paddingtb">
        <div class="container">

            @include('website::blog.partials.posts', ['posts' => $posts])

            @include('website::blog.partials.right-sidebar')
        </div>
    </div>
    @include('website::partials.insta-feed')


@stop
