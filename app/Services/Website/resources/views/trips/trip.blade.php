@extends('website::layouts.master')

@section('content')

    <div class="viewDateMobile">
        <a href="#dates" class="btn btn-custom btn-primary"><svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_236_2022)">
                    <path
                        d="M10.4997 11.6667C11.4201 11.6667 12.1663 10.9205 12.1663 9.99999C12.1663 9.07952 11.4201 8.33333 10.4997 8.33333C9.5792 8.33333 8.83301 9.07952 8.83301 9.99999C8.83301 10.9205 9.5792 11.6667 10.4997 11.6667Z"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M18.8337 10C16.6112 13.8892 13.8337 15.8333 10.5003 15.8333C7.16699 15.8333 4.38949 13.8892 2.16699 10C4.38949 6.11084 7.16699 4.16667 10.5003 4.16667C13.8337 4.16667 16.6112 6.11084 18.8337 10Z"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </g>
                <defs>
                    <clipPath id="clip0_236_2022">
                        <rect width="20" height="20" fill="white" transform="translate(0.5)" />
                    </clipPath>
                </defs>
            </svg>
            View Dates
        </a>
    </div>

    <section class="print-welcome-page py-40">
        <div class="container">
            <div class="row">
                <div class="col-12 logo-wrapper">
                    <img src="{{ asset('website/assets/img/logo.png') }}" alt="logo">
                </div>

            </div>
        </div>
    </section>



    @if (count($trip->gallery) > 0)

        <section class="welcome-banner-wrapper position-relative gallery-slider mt-80">
            <div class="slider-for">
                @foreach ($trip->gallery as $g)
                    <div class="img-div">
                        <img src="{{ asset('ruploads/' . $g->media->file_name) }}" alt="{{ $g->media->file_name }}">
                    </div>
                @endforeach
            </div>
            <div class="arrow-wrapper">
                <div class="prev">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="28"
                        height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#05133A" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <polyline points="15 6 9 12 15 18" />
                    </svg>
                </div>
                <div class="next">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right"
                        width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#05133A" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <polyline points="9 6 15 12 9 18" />
                    </svg>
                </div>
            </div>
            @if (count($trip->gallery) > 1)

                <div class="slider-nav">

                    @foreach ($trip->gallery as $g)
                        <div class="img-div">
                            <img src="{{ asset('ruploads/' . $g->media->file_name) }}" alt="{{ $g->media->file_name }}">
                        </div>
                    @endforeach

                </div>
            @endif
        </section>
    @else
        <section class="only-banner">
            <img src="{{ asset('website/assets/img/welcome2.jpg') }}" alt="Welcome">
        </section>
    @endif

    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 breadcrumb-wrapper">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                @php
                                    $homeRoute = url()->to('/');
                                @endphp
                             
                                <a href="{{ $homeRoute }}">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.7899 6.73344L7.75241 0.699063L7.34772 0.294375C7.25551 0.202776 7.13082 0.151367 7.00085 0.151367C6.87087 0.151367 6.74618 0.202776 6.65397 0.294375L0.211783 6.73344C0.117301 6.82755 0.0426296 6.93964 -0.00782254 7.06309C-0.0582747 7.18653 -0.0834854 7.31884 -0.0819665 7.45219C-0.0757165 8.00219 0.382096 8.44125 0.932096 8.44125H1.59616V13.5303H12.4055V8.44125H13.0837C13.3508 8.44125 13.6024 8.33656 13.7915 8.1475C13.8846 8.05471 13.9583 7.94437 14.0085 7.82287C14.0586 7.70137 14.0842 7.57113 14.0837 7.43969C14.0837 7.17406 13.979 6.9225 13.7899 6.73344ZM7.87585 12.4053H6.12585V9.21781H7.87585V12.4053ZM11.2805 7.31625V12.4053H8.87585V8.84281C8.87585 8.4975 8.59616 8.21781 8.25085 8.21781H5.75085C5.40553 8.21781 5.12585 8.4975 5.12585 8.84281V12.4053H2.72116V7.31625H1.22116L7.00241 1.53969L7.36335 1.90063L12.7821 7.31625H11.2805Z"
                                            fill="white" />
                                    </svg>

                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $trip->title }}</li>
                        </ol>
                    </nav>
                    {{-- <div class="text-content">
                    <h2 class="font-64">{{ $page->page_title }}</h2>
                    <i>{{ $page->caption }}</i>
                </div> --}}
                </div>
            </div>
        </div>
    </div>

    <section class="detail-content py-60">
        <div class="container">
            <div class="row">
                <div class="col-md-8 detail-wrapper">
                    <div class="header d-flex align-items-center justify-content-between">
                        <div class="content">
                            <p>{{ settings()->get('tour_details_caption') }}</p>
                            <h1>{{ $trip->title }}</h1>
                            <div class="review d-flex align-items-center">
                                <div class="review-wrapper">
                                    <svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.31579 0L8.26737 3.94953L12.6316 4.58675L9.47369 7.65931L10.2189 12L6.31579 9.94953L2.41263 12L3.1579 7.65931L0 4.58675L4.36421 3.94953L6.31579 0Z"
                                            fill="#FAA61A" />
                                    </svg>
                                    <svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.31579 0L8.26737 3.94953L12.6316 4.58675L9.47369 7.65931L10.2189 12L6.31579 9.94953L2.41263 12L3.1579 7.65931L0 4.58675L4.36421 3.94953L6.31579 0Z"
                                            fill="#FAA61A" />
                                    </svg>

                                    <svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.31579 0L8.26737 3.94953L12.6316 4.58675L9.47369 7.65931L10.2189 12L6.31579 9.94953L2.41263 12L3.1579 7.65931L0 4.58675L4.36421 3.94953L6.31579 0Z"
                                            fill="#FAA61A" />
                                    </svg>


                                </div>
                                <a href="#reviews" class="font-12 fw-500 text-primary">Write a Review</a>
                            </div>
                        </div>
                        <div class="difficulty-img">
                            <div class="difficulty{{ $trip->difficulty }}"></div>
                        </div>
                    </div>
                    <div class="feature-wrapper">
                        @foreach ($trip->extraValues as $extraValue)
                            <div class="item col-4">
                                <img src="{{ public_asset("icons/trip/$extraValue->key.png") }}"
                                    alt="{{ $extraValue->value }}">
                                {{ $extraValue->value }}
                            </div>
                        @endforeach
                    </div>
                    <div class="detail-navbar mb-40">
                        <ul>
                            <li class="active"><a href="#overview">Overview</a></li>
                            <li><a href="#highlights">Highlights</a></li>
                            <li><a href="#things-to-know">Things to know</a></li>
                            <li><a href="#includes">Includes</a></li>
                            <li><a href="#excludes">Excludes</a></li>
                            <li><a href="#reviews">Reviews</a></li>
                        </ul>
                    </div>
                    @if (!empty($trip->overview))
                        <div class="content-wrapper nav-content overview" id="overview">
                            <div class="header">
                                <h5>Overview</h5>
                                <p>{!! $trip->overview !!} </p>

                            </div>

                        </div>
                    @endif
                    @if (!empty($trip->itinerary->short_description))
                        <div class="content-wrapper nav-content  " id="highlights">
                            <div class="header">
                                <h5>Highlights</h5>
                            </div>
                            <ul class="blue-tick custom-list">
                                {!! $trip->itinerary->short_description !!}
                            </ul>
                        </div>
                    @endif
                    @if (!empty($trip->itinerary->key_points))
                        <div class="content-wrapper nav-content things-to-know" id="things-to-know">
                            <div class="header">
                                <h5>Things to Know</h5>
                            </div>
                            <ul class="blue-tick custom-list">
                                {!! $trip->itinerary->key_points !!}
                            </ul>
                        </div>
                    @endif
                    @if (!empty($trip->itinerary))

                        <div class="content-wrapper nav-content itineries" id="itineries">
                            <div class="header d-flex justify-content-between align-items-center">
                                <div>Itinerary</div>
                                <div class="font-14 text-primary-variant view-all-accordion cursor-pointer">View All</div>
                            </div>
                            <div class="accordion itinery" id="accordionExample">
                                @foreach ($trip->itinerary->full_description as $key => $itinerary_desc)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{ $key + 1 }}">
                                            <button data-days="{{ $key + 1 }}" class="accordion-button"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $key + 1 }}" aria-expanded="true"
                                                aria-controls="collapse{{ $key + 1 }}">
                                                <span>Day {{ $itinerary_desc->days }}</span>{{ $itinerary_desc->title }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $key + 1 }}" class="accordion-collapse collapse show"
                                            aria-labelledby="heading{{ $key + 1 }}"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                {!! $itinerary_desc->description !!}

                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>


                        </div>
                    @endif
                    @if (!empty($trip->itinerary->price_include))
                        <div class="content-wrapper nav-content includes" id="includes">
                            <div class="header">
                                <h5>Included Services</h5>
                            </div>

                            <ul class="green-tick custom-list">
                                {!! $trip->itinerary->price_include !!}
                            </ul>
                        </div>
                    @endif


                    @if (!empty($trip->itinerary->price_include))
                        <div class="content-wrapper nav-content excludes" id="excludes">
                            <div class="header">
                                <h5>Excluded Services</h5>
                            </div>
                            <ul class="red-tick custom-list">
                                {!! $trip->itinerary->price_exclude !!}
                            </ul>
                        </div>
                    @endif


                </div>
                <div class="col-md-4 detail-sidebar">
                    <div class="content-wrapper">
                        <div class="header">
                            <div class="left-content">Trip Code: <span>{{ $trip->trip_code }}</span></div>
                            <div class="right-content">
                                <a onclick="window.print()">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_236_2016)">
                                            <path
                                                d="M17 17H19C19.5304 17 20.0391 16.7893 20.4142 16.4142C20.7893 16.0391 21 15.5304 21 15V11C21 10.4696 20.7893 9.96086 20.4142 9.58579C20.0391 9.21071 19.5304 9 19 9H5C4.46957 9 3.96086 9.21071 3.58579 9.58579C3.21071 9.96086 3 10.4696 3 11V15C3 15.5304 3.21071 16.0391 3.58579 16.4142C3.96086 16.7893 4.46957 17 5 17H7"
                                                stroke="#2D71BC" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M17 9V5C17 4.46957 16.7893 3.96086 16.4142 3.58579C16.0391 3.21071 15.5304 3 15 3H9C8.46957 3 7.96086 3.21071 7.58579 3.58579C7.21071 3.96086 7 4.46957 7 5V9"
                                                stroke="#2D71BC" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M15 13H9C7.89543 13 7 13.8954 7 15V19C7 20.1046 7.89543 21 9 21H15C16.1046 21 17 20.1046 17 19V15C17 13.8954 16.1046 13 15 13Z"
                                                stroke="#2D71BC" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_236_2016">
                                                <rect width="24" height="24" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                                <a href="#">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_236_2009)">
                                            <path
                                                d="M6 15C7.65685 15 9 13.6569 9 12C9 10.3431 7.65685 9 6 9C4.34315 9 3 10.3431 3 12C3 13.6569 4.34315 15 6 15Z"
                                                stroke="#2D71BC" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M18 9C19.6569 9 21 7.65685 21 6C21 4.34315 19.6569 3 18 3C16.3431 3 15 4.34315 15 6C15 7.65685 16.3431 9 18 9Z"
                                                stroke="#2D71BC" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M18 21C19.6569 21 21 19.6569 21 18C21 16.3431 19.6569 15 18 15C16.3431 15 15 16.3431 15 18C15 19.6569 16.3431 21 18 21Z"
                                                stroke="#2D71BC" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M8.7002 10.7L15.3002 7.29999" stroke="#2D71BC" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M8.7002 13.3L15.3002 16.7" stroke="#2D71BC" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_236_2009">
                                                <rect width="24" height="24" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>

                                </a>
                                <div class=“addthis_inline_share_toolbox”></div>

                            </div>
                        </div>
                        <div class="title">
                            <p>{{ $trip->duration }} Days Starting from</p>
                            <div class="head">AUD {{ $trip->price }} @if ($trip->old_price)
                                    <span>AUD{{ $trip->old_price - $trip->price }} less <br> than usual</span>
                                @else
                                    <span>Best price<br> guarenteed</span>
                                @endif
                            </div>
                        </div>
                        <div class="list-content">

                            {!! $trip->alternate_overview !!}

                        </div>
                        <div class="btn-wrapper">
                            <a href="#dates" class="btn btn-custom btn-primary"><svg width="21" height="20"
                                    viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_236_2022)">
                                        <path
                                            d="M10.4997 11.6667C11.4201 11.6667 12.1663 10.9205 12.1663 9.99999C12.1663 9.07952 11.4201 8.33333 10.4997 8.33333C9.5792 8.33333 8.83301 9.07952 8.83301 9.99999C8.83301 10.9205 9.5792 11.6667 10.4997 11.6667Z"
                                            stroke="white" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M18.8337 10C16.6112 13.8892 13.8337 15.8333 10.5003 15.8333C7.16699 15.8333 4.38949 13.8892 2.16699 10C4.38949 6.11084 7.16699 4.16667 10.5003 4.16667C13.8337 4.16667 16.6112 6.11084 18.8337 10Z"
                                            stroke="white" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_236_2022">
                                            <rect width="20" height="20" fill="white"
                                                transform="translate(0.5)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                View Dates</a>
                            <a href="#" data-url="{{ route('website.trips.favourite.store') }}"
                                data-name="{{ $trip->title }}" data-trip="{{ $trip->id }}"
                                class="btn mt-3 text-secondary btn-transparent btn-custom  bordered favourite">
                                <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_236_2028)">
                                        <path
                                            d="M16.7501 11.31L10.5001 17.5L4.25009 11.31M4.25009 11.31C3.83784 10.9088 3.51312 10.4267 3.29638 9.89387C3.07963 9.36105 2.97556 8.78913 2.9907 8.21412C3.00585 7.6391 3.13989 7.07345 3.38439 6.55279C3.62888 6.03212 3.97853 5.56772 4.41133 5.18882C4.84412 4.80993 5.35068 4.52475 5.8991 4.35124C6.44752 4.17773 7.02593 4.11966 7.59789 4.18067C8.16986 4.24169 8.723 4.42047 9.22248 4.70576C9.72196 4.99105 10.157 5.37667 10.5001 5.83834C10.8447 5.38002 11.2802 4.99777 11.7793 4.71551C12.2785 4.43325 12.8305 4.25705 13.4009 4.19794C13.9712 4.13883 14.5477 4.19809 15.0941 4.372C15.6405 4.54591 16.1451 4.83073 16.5764 5.20864C17.0077 5.58655 17.3563 6.04941 17.6004 6.56825C17.8446 7.08709 17.979 7.65074 17.9953 8.22393C18.0117 8.79712 17.9095 9.3675 17.6952 9.89938C17.4809 10.4313 17.1592 10.9132 16.7501 11.315"
                                            stroke="#FAA61A" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_236_2028">
                                            <rect width="20" height="20" fill="white"
                                                transform="translate(0.5)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span id="wishText">
                                    Add to wishlist
                                </span>
                            </a>

                            <div class="review">
                                <div class="review-wrapper">
                                    @php
                                        $whole = floor($averageRating);
                                        $decimal = fmod($averageRating, 1);
                                        if ($decimal > 0.5) {
                                            $whole++;
                                        }
                                    @endphp
                                    @for ($i = 0; $i < $whole; $i++)
                                        <svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.31579 0L8.26737 3.94953L12.6316 4.58675L9.47369 7.65931L10.2189 12L6.31579 9.94953L2.41263 12L3.1579 7.65931L0 4.58675L4.36421 3.94953L6.31579 0Z"
                                                fill="#FAA61A" />
                                        </svg>
                                    @endfor
                                    @if ($decimal <= 0.5 && $decimal > 0)
                                        <svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.31579 6.16908e-06L8.26737 3.94953L12.6316 4.58676L9.47369 7.65931L10.2189 12L6.31579 9.94953L2.41263 12L3.1579 7.65931L0 4.58676L4.36421 3.94953L6.31579 6.16908e-06Z"
                                                fill="#FAA61A" />
                                            <path
                                                d="M6.31579 6.16908e-06L8.26737 3.94953L12.6316 4.58676L9.47369 7.65931L10.2189 12L6.31579 9.94953V6.16908e-06Z"
                                                fill="#E9F0F4" />
                                        </svg>
                                    @endif
                                </div>
                                <span>Based on {{ $trip->ratings()->count() }} Reviews</span>
                            </div>

                        </div>
                        <div class="note">
                            <a href="{{ route('website.trips.note', ['trip' => $trip->slug]) }}">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_236_2003)">
                                        <path
                                            d="M9.99967 11.6667C10.9201 11.6667 11.6663 10.9205 11.6663 10C11.6663 9.07954 10.9201 8.33334 9.99967 8.33334C9.0792 8.33334 8.33301 9.07954 8.33301 10C8.33301 10.9205 9.0792 11.6667 9.99967 11.6667Z"
                                            stroke="#2D71BC" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M18.3337 9.99999C16.1112 13.8892 13.3337 15.8333 10.0003 15.8333C6.66699 15.8333 3.88949 13.8892 1.66699 9.99999C3.88949 6.11082 6.66699 4.16666 10.0003 4.16666C13.3337 4.16666 16.1112 6.11082 18.3337 9.99999Z"
                                            stroke="#2D71BC" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_236_2003">
                                            <rect width="20" height="20" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                View Trip Notes
                            </a>
                            <p>Includes all the particulars about this trip, including kit lists and practical information.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="info-with-table bg-light py-60 mb-40">
        <div class="container">
            <div class="row">
                <div class="col-md-8 " id="dates">
                    <div class="row">
                        <div class="col-12 section-heading">
                            <h2>Dates & Availability</h2>
                            <p>Get some jaw dropping offers and deals with us. We guarantee the best price</p>
                        </div>
                        <div class="table-wrapper table-responsive">
                            @if ($trip->has_departure)

                                <table id="fixedDepartureTable">
                                    <thead>
                                        <tr>
                                            <td class="start-date">Start Date</td>
                                            <td class="end-date">End Date</td>
                                            <td class="price">Price</td>
                                            <td class="availability">Availability</td>
                                            <td class="actions">Actions</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($trip->activeFixedDepartures->take(4) as $active)
                                            <tr class="showLess">
                                                <td class="start-date">{{ $active->start_date->format('d M Y') }}</td>
                                                <td class="end-date">{{ $active->finish_date->format('d M Y') }}</td>
                                                <td class="price">${{ $active->price }}</td>
                                                <td class="availability">{{ strtoupper($active->availability) }}</td>
                                                <td>
                                                    <a href="{{ route('website.book.init', ['trip' => $active->trip->slug, 'departure' => $active->id]) }}"
                                                        class="btn btn-custom btn-primary">
                                                        Book Now</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                        @foreach ($trip->activeFixedDepartures as $active)
                                            <tr class="showMore" style="display:none;">
                                                <td class="start-date">{{ $active->start_date->format('d M Y') }}</td>
                                                <td class="end-date">{{ $active->finish_date->format('d M Y') }}</td>
                                                <td class="price">${{ $active->price }}</td>
                                                <td class="availability">{{ strtoupper($active->availability) }}</td>
                                                <td>
                                                    <a href="{{ route('website.book.init', ['trip' => $active->trip->slug, 'departure' => $active->id]) }}"
                                                        class="btn btn-custom btn-primary">
                                                        Book Now</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="no-data-table">
                                    <svg width="40" height="41" viewBox="0 0 40 41" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.075 29.4165L10.4813 36.2227L13.8875 29.4165C13.9905 29.2091 14.1491 29.0345 14.3455 28.912C14.5419 28.7895 14.7685 28.724 15 28.7227H35.625C36.288 28.7227 36.9239 28.4593 37.3928 27.9905C37.8616 27.5216 38.125 26.8857 38.125 26.2227V7.4727C38.125 6.80966 37.8616 6.17378 37.3928 5.70493C36.9239 5.23609 36.288 4.9727 35.625 4.9727H4.375C3.71196 4.9727 3.07607 5.23609 2.60723 5.70493C2.13839 6.17378 1.875 6.80966 1.875 7.4727V26.2227C1.875 26.8857 2.13839 27.5216 2.60723 27.9905C3.07607 28.4593 3.71196 28.7227 4.375 28.7227H5.95625C6.1888 28.7228 6.41671 28.7878 6.61435 28.9104C6.81198 29.0329 6.97151 29.2082 7.075 29.4165Z"
                                            fill="#F9C33D"></path>
                                        <path
                                            d="M38.125 26.2227C38.125 26.8857 37.8616 27.5216 37.3928 27.9905C36.9239 28.4593 36.288 28.7227 35.625 28.7227H15C14.7674 28.7228 14.5395 28.7878 14.3419 28.9104C14.1443 29.0329 13.9847 29.2082 13.8812 29.4165L10.4813 36.2227L7.075 29.4165C6.97151 29.2082 6.81198 29.0329 6.61435 28.9104C6.41671 28.7878 6.1888 28.7228 5.95625 28.7227H4.375C3.71196 28.7227 3.07607 28.4593 2.60723 27.9905C2.13839 27.5216 1.875 26.8857 1.875 26.2227V7.4727C1.875 6.80966 2.13839 6.17378 2.60723 5.70493C3.07607 5.23609 3.71196 4.9727 4.375 4.9727H8.125V21.2227C8.125 22.5488 8.65178 23.8206 9.58947 24.7582C10.5271 25.6959 11.7989 26.2227 13.125 26.2227H38.125Z"
                                            fill="#F7A83E"></path>
                                        <path
                                            d="M19.9996 19.3477C19.5092 19.3263 19.0446 19.1219 18.6975 18.7748C18.3504 18.4277 18.146 17.9631 18.1246 17.4727L17.4996 11.2227C17.3371 9.56645 18.4996 8.0977 19.9996 8.0977C21.4871 8.0977 22.6496 9.5477 22.4996 11.2227L21.8746 17.4727C21.8531 17.9631 21.6487 18.4277 21.3016 18.7748C20.9545 19.1219 20.49 19.3263 19.9996 19.3477Z"
                                            fill="white"></path>
                                        <path
                                            d="M20 25.5977C21.0355 25.5977 21.875 24.7582 21.875 23.7227C21.875 22.6872 21.0355 21.8477 20 21.8477C18.9645 21.8477 18.125 22.6872 18.125 23.7227C18.125 24.7582 18.9645 25.5977 20 25.5977Z"
                                            fill="white"></path>
                                    </svg>
                                    <h3>Data Not Found</h3>
                                    <a href="{{ route('website.page', 'contact') }}">Contact Us</a>
                                </div>

                            @endif

                            @if ($trip->has_departure)
                                <div class="fdButton">
                                    <button class="btn btn-sm btn-success viewAll">Explore more deals</button>
                                    <button class="btn btn-sm btn-success viewLess" style="display: none">View less
                                        deals</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="reviews" id="reviews">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row comment-section nav-content reviews">
                        <div class="col-12 mb-4 header d-flex justify-content-between align-items-center">
                            <h2>Reviews</h2>
                        </div>
                        @foreach ($trip->publishedRatings as $rating)
                            <div class="col-md-12 mb-4 review-card-wrapper">
                                <div class="review-card">
                                    <div class="header mb-3">
                                        @if (!empty($rating->getFirstImage()))
                                            <div class="img-div">
                                                <img src="{{ asset('ruploads/' . $rating->getFirstImage()) }}?w=78&h=78&fit=crop"
                                                    class="img-responsive"
                                                    alt="{{ $rating->getNameAttribute('dummy') }}">
                                            </div>
                                        @else
                                            <div class="img-div">
                                                <img src="{{ \Avatar::create($rating->getNameAttribute('dummy'))->toBase64() }}"
                                                    alt="{{ $rating->getNameAttribute('dummy') }}">
                                            </div>
                                        @endif
                                        <div class="info">
                                            <p>{{ $rating->full_name }}</p>
                                            <div class="rating-wrapper">
                                                @for ($i = 0; $i < $rating->rating_value; $i++)
                                                    <img src="{{ public_asset('website/assets/img/rating-star.svg') }}"
                                                        alt="star">
                                                @endfor

                                            </div>
                                        </div>
                                        <div>Wrote a review on {{ $rating->created_at->format('d M Y') }}</div>
                                    </div>
                                    {!! $rating->review !!}

                                </div>
                            </div>
                        @endforeach

                        <div class="col-12">
                            <div class="form-wrapper">
                                <h2 class="font-40 text-tertiary mb-4">Post a review</h2>
                                <p>Your overall rating of this trip.</p>
                                <form action="{{ route('website.review.post', $trip->id) }}" method="POST"
                                    id="reviewForm" novalidate>
                                    {{ csrf_field() }}
                                    <input type="hidden" class="form-control" name="title" value="review">
                                    @auth('customer')
                                        <input type="hidden" name="full_name"
                                            value="{{ auth()->user('customer')->first_name . ' ' . auth()->user('customer')->last_name }}">
                                        <input type="hidden" name="email" value="{{ auth()->user('customer')->email }}">
                                    @endauth
                                    <div class="row">

                                        <div class="post-rating">
                                            <ul class="rate-area">
                                                <input type="radio" id="5-star" name="rating" value="5"
                                                    required @if (old('rating') == 5) checked @endif />
                                                <label for="5-star" title="Amazing"></label>
                                                <input type="radio" id="4-star" name="rating" value="4"
                                                    required @if (old('rating') == 4) checked @endif />
                                                <label for="4-star" title="Good"></label>
                                                <input type="radio" id="3-star" name="rating" value="3"
                                                    required @if (old('rating') == 3) checked @endif />
                                                <label for="3-star" title="Average"></label>
                                                <input type="radio" id="2-star" name="rating" value="2"
                                                    required @if (old('rating') == 2) checked @endif />
                                                <label for="2-star" title="Not Good"></label>
                                                <input type="radio" id="1-star" name="rating" value="1"
                                                    required @if (old('rating') == 1) checked @endif />
                                                <label for="1-star" title="Bad"></label>
                                            </ul>
                                            <label id="rating-error" class="error" for="rating"></label>
                                        </div>
                                        @guest
                                            <div class="col-md-6 form-group with-icon white-bg">
                                                <div class="input-group @if ($errors->first('full_name')) after-error @endif">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_400_1864)">
                                                            <path
                                                                d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                                                                stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z"
                                                                stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M6.16797 18.849C6.41548 18.0252 6.92194 17.3032 7.61222 16.79C8.30249 16.2768 9.13982 15.9997 9.99997 16H14C14.8612 15.9997 15.6996 16.2774 16.3904 16.7918C17.0811 17.3062 17.5874 18.0298 17.834 18.855"
                                                                stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_400_1864">
                                                                <rect width="24" height="24" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>

                                                    <input type="text" class="form-control"
                                                        value="{{ old('full_name') }}" name="full_name" required title
                                                        placeholder="Full Name *">
                                                    @if ($errors->has('full_name'))
                                                        <label class="error">{{ $errors->first('full_name') }}</label>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group with-icon white-bg">
                                                <div class="input-group @if ($errors->first('email')) after-error @endif">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_400_1874)">
                                                            <path
                                                                d="M19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5Z"
                                                                stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path d="M3 7L12 13L21 7" stroke="#0084D4" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_400_1874">
                                                                <rect width="24" height="24" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>

                                                    <input type="email" class="form-control" value="{{ old('email') }}"
                                                        name="email" required placeholder="Email Address *">
                                                    @if ($errors->has('email'))
                                                        <label class="error">{{ $errors->first('email') }}</label>
                                                    @endif
                                                </div>
                                            </div>
                                        @endguest
                                        <div class="col-12 form-group">
                                            <div class="input-group @if ($errors->first('review')) after-error @endif">
                                                <textarea placeholder="Enter your review *" name="review" required id="" cols="30" rows="10"
                                                    class="form-control">{{ old('review') }}</textarea>
                                                @if ($errors->has('review'))
                                                    <label
                                                        class="error textarea-error
                                                ">{{ $errors->first('review') }}</label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault" required>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    I agree to the <a
                                                        href="{{ route('website.page', 'term-condition') }}">Terms and
                                                        Conditions</a> and <a
                                                        href="{{ route('website.page', 'policies') }}">Privacy Policy</a>
                                                    of Travel Adventure Nepal.<span>*</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="btn-wrapper my-4">
                                            <button type="submit" class="btn btn-custom btn-primary"><span>Submit
                                                    Review</span></button>
                                        </div>
                                    </div>
                                </form>
                                {{-- <form action="#" id="reviewForm" method="post" action="">
                                <div class="row">
                                    <div class="post-rating">
                                        <ul class="rate-area">
                                            <input type="radio" class="starChecked" id="5-star" name="rating" value="5"
                                                required />
                                            <label for="5-star" title="Amazing"></label>
                                            <input type="radio" class="starChecked" id="4-star" name="rating" value="4"
                                                required />
                                            <label for="4-star" title="Good"></label>
                                            <input type="radio" class="starChecked" id="3-star" name="rating" value="3"
                                                required />
                                            <label for="3-star" title="Average"></label>
                                            <input type="radio" class="starChecked" id="2-star" name="rating" value="2"
                                                required />
                                            <label for="2-star" title="Not Good"></label>
                                            <input type="radio" class="starChecked" id="1-star" name="rating" value="1"
                                                required />
                                            <label for="1-star" title="Bad"></label>
                                        </ul>
                                    </div>
                                    <label id="rating-error" class="error" for="rating"></label>
                                    <div class="col-md-6 form-group with-icon white-bg">
                                        <div class="input-group">
                                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M4.29285 15.8155C4.02797 15.919 3.91945 16.2356 4.06513 16.4799L5.81319 19.4108C6.06359 19.8306 6.58081 20.0079 7.0361 19.8299L23.9381 13.223C24.7279 12.9143 25.1179 12.0237 24.8092 11.234C24.4883 10.413 23.5436 10.0302 22.7417 10.3961L17.7432 12.6773L10.773 6.27125C10.4838 6.00546 10.0685 5.9276 9.70266 6.0706C9.08963 6.31023 8.85636 7.05604 9.22358 7.60227L13.6983 14.2584L6.85554 17.3571L4.72413 15.8669C4.59802 15.7787 4.43618 15.7594 4.29285 15.8155ZM25.6776 22.9521H5.14764V24.5313H25.6776V22.9521Z"
                                                    fill="#0084D4" />
                                            </svg>
                                            <input type="text" class="form-control" placeholder="Full Name"
                                                name="full_name" required />
                                        </div>
                                        <label id="fullName" class="error" for="full_name"></label>
                                    </div>
                                    <div class="col-md-6 form-group with-icon white-bg">
                                        <div class="input-group">
                                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M4.29285 15.8155C4.02797 15.919 3.91945 16.2356 4.06513 16.4799L5.81319 19.4108C6.06359 19.8306 6.58081 20.0079 7.0361 19.8299L23.9381 13.223C24.7279 12.9143 25.1179 12.0237 24.8092 11.234C24.4883 10.413 23.5436 10.0302 22.7417 10.3961L17.7432 12.6773L10.773 6.27125C10.4838 6.00546 10.0685 5.9276 9.70266 6.0706C9.08963 6.31023 8.85636 7.05604 9.22358 7.60227L13.6983 14.2584L6.85554 17.3571L4.72413 15.8669C4.59802 15.7787 4.43618 15.7594 4.29285 15.8155ZM25.6776 22.9521H5.14764V24.5313H25.6776V22.9521Z"
                                                    fill="#0084D4" />
                                            </svg>

                                            <input type="email" class="form-control" placeholder="Email Address"
                                                name="email" required />
                                        </div>
                                        <label id="email" class="error" for="email"></label>
                                    </div>
                                    <div class="col-12 form-group">
                                        <div class="input-group">
                                            <textarea placeholder="Enter your review" name="reviewdescription" id=""
                                                cols="30" rows="10" class="form-control" required></textarea>
                                        </div>
                                        <label id="reviewdescription" class="error" for="reviewdescription"></label>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault" name="check" required>
                                            <label class="form-check-label">
                                                I agree to the <a href="#">Terms and Conditions</a> and <a
                                                    href="#">Privacy Policy</a> of Travel Adventure Nepal.<span>*</span>
                                            </label>
                                        </div>
                                    </div>
                                    <label id="check" class="error" for="check"></label>
                                    <div class="btn-wrapper my-4">
                                        <button type="submit" class="btn btn-custom btn-primary"><span>Submit
                                                Review</span></button>
                                    </div>
                                </div>
                            </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('website::partials.query-banner')
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            $('.viewAll').on('click', function() {
                $('.showMore').show();
                $('.showLess').hide();
                $(this).hide();
                $('.viewLess').show()
            });

            $('.viewLess').on('click', function() {
                $('.showMore').hide();
                $('.showLess').show();
                $(this).hide();
                $('.viewAll').show();
                var elmnt = document.getElementById("fixedDepartureTable");
                elmnt.scrollIntoView();

            });


            if ("{{ $errors->any() }}") {
                var elmnt = document.getElementById("reviewForm");
                elmnt.scrollIntoView();
            }

            var fav_trips = $.cookie('fav_trips');
            fav_trips = fav_trips ? JSON.parse(fav_trips) : [];
            var tourId = "{{ $trip->id }}";
            var tripIds = [];
            $.each(fav_trips, function(k, v) {
                tripIds.push(v.id);
            });

            if (tripIds.includes(tourId)) {
                $('.favourite').find('svg').attr('fill', '#F95B5B');
                $('#wishText').text('Added to wishlist');
            }

        });
    </script>
@stop
