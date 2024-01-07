@extends('website::layouts.master')

@section('content')
    <section class="breadcrumb-section">
        <img src="{{ asset('ruploads/' . $page->getCoverImage()) }}?w=1680&h=408&fit=crop" alt="contact">
        <div class="container position-relative h-100">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('website.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Countries</li>
                    </ol>
                </nav>
                <div class="col-10   text-content">
                    <h1>{{ $page->page_title }}</h1>
                    <span>{{ $page->caption }}</span>
                </div>
            </div>
        </div>
    </section>

    <section class="countries-listings py-80">
        <div class="container">
            <div class="row">
                <div class="col-12 page-heading">
                    <h2>{{ $page->page_title }}</h2>
                    <span>{!! $page->page_description !!} </span>
                </div>
                @foreach ($countries as $c)
                    <div class="col-xl-3 col-lg-4 col-md-6 country-card-wrapper">
                        <div class="country-card">
                            <div class="overlay"></div>
                            <img src="{{ asset('ruploads/' . $c->getFirstImage()) }}" alt="{{ $c->slug }}">
                            <div class="name">
                                <h4>{{ $c->title }}</h4>
                            </div>
                            <div class="info">
                                <div class="">
                                    <h4>{{ $c->title }}</h4>
                                    <p>{{ $c->caption }}</p>
                                </div>
                                <a href="{{ route('website.destination', $c->slug) }}" class="view-btn">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    @include('website::partials.newletter')
@endsection
