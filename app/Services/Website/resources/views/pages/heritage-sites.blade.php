@extends('website::layouts.master')
@section('content')

    <section class="mt-80 breadcrumb-section with-text bg-white bg-img">
        <img src="{{ asset('ruploads/' . $page->getCoverImage()) . pages_parallax() }}" alt="heritage sites cover image">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12 breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.7899 6.73344L7.75241 0.699063L7.34772 0.294375C7.25551 0.202776 7.13082 0.151367 7.00085 0.151367C6.87087 0.151367 6.74618 0.202776 6.65397 0.294375L0.211783 6.73344C0.117301 6.82755 0.0426296 6.93964 -0.00782254 7.06309C-0.0582747 7.18653 -0.0834854 7.31884 -0.0819665 7.45219C-0.0757165 8.00219 0.382096 8.44125 0.932096 8.44125H1.59616V13.5303H12.4055V8.44125H13.0837C13.3508 8.44125 13.6024 8.33656 13.7915 8.1475C13.8846 8.05471 13.9583 7.94437 14.0085 7.82287C14.0586 7.70137 14.0842 7.57113 14.0837 7.43969C14.0837 7.17406 13.979 6.9225 13.7899 6.73344ZM7.87585 12.4053H6.12585V9.21781H7.87585V12.4053ZM11.2805 7.31625V12.4053H8.87585V8.84281C8.87585 8.4975 8.59616 8.21781 8.25085 8.21781H5.75085C5.40553 8.21781 5.12585 8.4975 5.12585 8.84281V12.4053H2.72116V7.31625H1.22116L7.00241 1.53969L7.36335 1.90063L12.7821 7.31625H11.2805Z"
                                                fill="white" />
                                        </svg>

                                        Home
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $page->page_title }}</li>
                            </ol>
                        </nav>
                        <div class="text-content">
                            <h1 class="font-64">{{ $page->page_title }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- sidebar links --}}


    <section class="blogs-wrapper py-60">
        <div class="container">
            <div class="row">
                <div class="col-md-9 content-wrapper ">
                    {!! $page->page_description !!}
                </div>
                <div class="col-md-3 blog-sidebar">
                    <div class="side-container mb-4">
                        <p>Quick Links</p>
                        <ul>
                            @foreach ($page->relatedPages as $page)
                                <li>
                                    <a href="{{ route('website.page', $page->slug) }}">{{ ucwords($page->page_title) }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    @php
        $data = $pageFeaturedTrips ? $pageFeaturedTrips : $featuredTrips;
    @endphp

    @if (count($data) > 0)
        {{-- related tours --}}
        <section class="py-100 bg-light featured-packages">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 mx-auto">
                        <div class="row">
                            <div class="col-12 section-heading mb-40">
                                <h2>Featured Packages</h2>
                                <span>Get up cloase and personal with Nepal's lush, UNESCO-listed nature reserve during this
                                    multi-day journey</span>
                            </div>
                        </div>

                        <div class="row">
                            @foreach ($data as $trip)
                                <div class="col-md-4 mb-4 package-card-wrapper">
                                    <a href="{{ route('website.trips.detail', $trip->slug) }}" class="package-card">
                                        <div class="img-div">
                                            <img src="{{ asset('ruploads/' . $trip->getFirstImage()) . pages_parallax() }}?w=402&h=300&fit=crop"
                                                alt="{{ $trip->slug }}">
                                        </div>
                                        <div class="text-content">
                                            <h6>{{ $trip->title }} </h6>
                                            <div class="info d-flex align-items-center">
                                                <div class="rating-wrapper me-3">
                                                    @for ($i = 0; $i < $trip->average_rating; $i++)
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-star" width="16"
                                                            height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="#FAA61A" fill="#FAA61A" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    @endfor
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-clock" width="16"
                                                        height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="#2c3e50" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <circle cx="12" cy="12" r="9" />
                                                        <polyline points="12 7 12 12 15 15" />
                                                    </svg>
                                                    <span class="ml-1">{{ $trip->duration }}</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div class="price">Starting from <span>${{ $trip->price }} </span></div>
                                                <svg class="favourite"
                                                    data-url="{{ route('website.trips.favourite.store') }}"
                                                    data-name="{{ $trip->title }}" data-trip="{{ $trip->id }}"
                                                    width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    {{-- <g clip-path="url(#clip0_236_1631)"> --}}
                                                    <g>
                                                        <path
                                                            d="M16.2501 11.31L10.0001 17.5L3.75009 11.31M3.75009 11.31C3.33784 10.9088 3.01312 10.4267 2.79638 9.89387C2.57963 9.36105 2.47556 8.78913 2.4907 8.21412C2.50585 7.6391 2.63989 7.07345 2.88439 6.55279C3.12888 6.03212 3.47853 5.56772 3.91133 5.18882C4.34412 4.80993 4.85068 4.52475 5.3991 4.35124C5.94752 4.17773 6.52593 4.11966 7.09789 4.18067C7.66986 4.24169 8.223 4.42047 8.72248 4.70576C9.22196 4.99105 9.65696 5.37667 10.0001 5.83834C10.3447 5.38002 10.7802 4.99777 11.2793 4.71551C11.7785 4.43325 12.3305 4.25705 12.9009 4.19794C13.4712 4.13883 14.0477 4.19809 14.5941 4.372C15.1405 4.54591 15.6451 4.83073 16.0764 5.20864C16.5077 5.58655 16.8563 6.04941 17.1004 6.56825C17.3446 7.08709 17.479 7.65074 17.4953 8.22393C17.5117 8.79712 17.4095 9.3675 17.1952 9.89938C16.9809 10.4313 16.6592 10.9132 16.2501 11.315"
                                                            stroke="black" stroke-opacity="0.1" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </g>
                                                    <defs>
                                                        {{-- <clipPath id="clip0_236_1631"> --}}
                                                        <clipPath>
                                                            <rect width="20" height="20" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            <div class="col-12 btn-wrapper d-flex justify-content-center">
                                <a href="{{ route('website.page', 'search') }}"
                                    class="btn text-primary btn-transparent btn-custom  bordered"><span>Explore
                                        More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@stop
