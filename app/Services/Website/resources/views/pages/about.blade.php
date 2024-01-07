@extends('website::layouts.master')
@section('content')

    <section class="mt-80 breadcrumb-section with-text bg-white bg-img">
        <img src="{{ asset('ruploads/' . $page->getCoverImage()) . pages_parallax() }}" alt="about">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12 breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('website.home') }}">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.7899 6.73344L7.75241 0.699063L7.34772 0.294375C7.25551 0.202776 7.13082 0.151367 7.00085 0.151367C6.87087 0.151367 6.74618 0.202776 6.65397 0.294375L0.211783 6.73344C0.117301 6.82755 0.0426296 6.93964 -0.00782254 7.06309C-0.0582747 7.18653 -0.0834854 7.31884 -0.0819665 7.45219C-0.0757165 8.00219 0.382096 8.44125 0.932096 8.44125H1.59616V13.5303H12.4055V8.44125H13.0837C13.3508 8.44125 13.6024 8.33656 13.7915 8.1475C13.8846 8.05471 13.9583 7.94437 14.0085 7.82287C14.0586 7.70137 14.0842 7.57113 14.0837 7.43969C14.0837 7.17406 13.979 6.9225 13.7899 6.73344ZM7.87585 12.4053H6.12585V9.21781H7.87585V12.4053ZM11.2805 7.31625V12.4053H8.87585V8.84281C8.87585 8.4975 8.59616 8.21781 8.25085 8.21781H5.75085C5.40553 8.21781 5.12585 8.4975 5.12585 8.84281V12.4053H2.72116V7.31625H1.22116L7.00241 1.53969L7.36335 1.90063L12.7821 7.31625H11.2805Z"
                                                fill="white" />
                                        </svg>

                                        Home
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">About</li>
                            </ol>
                        </nav>
                        <div class="text-content">
                            <h2> {{ $page->title }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about text-content-wrapper py-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 mx-auto">
                    <div class="row">
                        <div class="col-12 text-content">
                            <h1> {{ $page->caption }}</h1>
                            <p> {!! $page->page_description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about expertise py-100">
        <div class="container">
            <div class="row">
                <div class="col-md-6 card-wrapper">
                    <h4>Our Expertise</h4>
                    {!! $page->other_description !!}
                </div>
                <div class="col-md-7 img-div">
                    <img src="{{ asset('ruploads/' . $page->getFirstImage()) . pages_parallax() }}" alt="about">
                </div>
            </div>
        </div>
    </section>

    @if (!empty(settings()->get('why_us_title')))

        <section class="py-100 about travel">
            <div class="container">
                <div class="row">
                    <div class="col-12 section-heading mb-40">
                        <h2>{{ settings()->get('why_us_title') }}</h2>
                        <p>{{ settings()->get('why_us_subtitle') }}</p>
                    </div>
                    @php
                        $details = settings()->get('why_us_details');
                        $array = json_decode($details);
                        
                    @endphp
                    @foreach ($array as $f)
                        @if (isset($f->title) && isset($f->description))
                            <div class="col-md-4 mb-4 about-travel-card-wrapper">
                                <a href="#" class="card-wrapper">
                                    <div class="text-end closeTravelContent">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x"
                                            width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="#05133A" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </div>
                                    @if (!empty($f->image))
                                        <img src="{{ asset('ruploads/' . $f->image) }}" alt="why us">
                                    @endif

                                    <h6>{{ $f->title }}</h6>
                                    <p>{{ $f->description }}</p>
                                    <button class="paragraphButton">View More</button>
                                </a>
                            </div>
                        @endif
                    @endforeach


                </div>
            </div>
        </section>
    @endif

    @if (!empty(settings()->get('about_features_title')))
        <section class="about img-text-banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 text-content py-100">
                        <h2>{{ settings()->get('about_features_title') }}</h2>
                        <p>{{ settings()->get('about_features_subtitle') }}</p>
                        {!! settings()->get('about_features_description') !!}
                    </div>
                    <div class="col-md-5 img-div">
                        <img src="{{ asset('ruploads/' . settings()->get('about_features_image')) }}"
                            alt="{{ settings()->get('about_features_title') }}">

                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (count($teams)>0)

        <section class="py-60 teams">
            <div class="container">
                <div class="row">
                    <div class="col-12 heading-section mb-40">
                        <h2>Meet your travel guides</h2>
                        <p>Our blog where we write much about our opinion and express ourself above everything.</p>
                    </div>
                    <div class="col-12 owl-carousel owl-theme teams-carousel centered full-width">
                        @foreach ($teams as $t)
                            <div class="item travel-card-wrapper type-two team">
                                <div class="travel-card">
                                    <div class="img-div">
                                        <img src="{{ asset('ruploads/' . $t->getFirstImage()) . pages_parallax() }}"
                                            alt="{{ $t->name }}">
                                    </div>
                                    <p>{{ $t->name }}</p>
                                    <span>{{ $t->position }}</span>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
    @endif

    @include('website::partials.query-banner')

@stop
