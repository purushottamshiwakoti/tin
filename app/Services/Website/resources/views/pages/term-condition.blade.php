@extends('website::layouts.master')
@section('content')
    <section class="country-detail welcome p-0">
        <img src="{{ asset('ruploads/' . $page->getCoverImage()) . pages_parallax() }}" class="jumbo-img">

        <div class="container text-content my-40">
            <h1 class="font-40">{{ $page->title }}</h1>
        </div>
    </section>

    <section class="country-detail terms-condition-page">
        <div class="container">
            <div class="row">

                {!! $page->page_description !!}
            </div>
        </div>
    </section>

@stop
