@extends('website::layouts.master')
@section('header')
    @if (setting('extras.homepage_json_markup'))
        {!! setting('extras.homepage_json_markup') !!}
    @endif
@stop

@section('css')
    <style>
        .error-message {
            color: #cc0033;
            display: inline-block;
            font-size: 13px;
            line-height: 15px;
            margin: 5px 0 0;
        }

        body .select2-container {
            z-index: 9999 !important;
        }

        body .plus{
            cursor: pointer !important;
        }
        body .minus{
            cursor: pointer !important;
        }
    </style>
@endsection
@section('content')

    <section class="welcome-banner position-relative">
        <div class="owl-carousel owl-theme welcome-banner-carousel">
            @foreach ($sliders as $s)
                <div class="item">
                    <img src="{{ asset('ruploads/' . $s->getFirstImage()) }}" alt="{{ $s->slug }}">

                    <div class="welcome-text-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 content">
                                    <span>{{ $s->title }}</span>
                                    <h2>{{ $s->caption }}</h2>
                                    {{-- <p> --}}
                                    {!! $s->description !!}
                                    {{-- </p> --}}
                                    <form action="{{ route('website.page', 'search') }}">
                                        <input type="text" name="query"
                                            placeholder="Search package (e.g everest base camp)">
                                        <button class="search" type="submit"><svg width="17" height="16"
                                                viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M15.777 14.6511L12.8102 11.7067C13.9618 10.2699 14.5195 8.44635 14.3686 6.61085C14.2177 4.77535 13.3697 3.06745 11.999 1.83834C10.6283 0.609226 8.83899 -0.0476794 6.99908 0.00269722C5.15916 0.0530739 3.40846 0.806903 2.10695 2.10918C0.805447 3.41146 0.0520658 5.1632 0.00171905 7.00421C-0.0486277 8.84523 0.607887 10.6356 1.83627 12.0071C3.06465 13.3787 4.77154 14.2272 6.60595 14.3781C8.44036 14.5291 10.2629 13.9711 11.6987 12.8188L14.6415 15.7633C14.7158 15.8383 14.8042 15.8978 14.9017 15.9385C14.9991 15.9791 15.1036 16 15.2092 16C15.3148 16 15.4193 15.9791 15.5167 15.9385C15.6142 15.8978 15.7026 15.8383 15.777 15.7633C15.9211 15.6141 16.0017 15.4147 16.0017 15.2072C16.0017 14.9997 15.9211 14.8003 15.777 14.6511ZM7.21265 12.8188C6.10555 12.8188 5.02331 12.4903 4.10279 11.8749C3.18227 11.2595 2.46481 10.3847 2.04114 9.36129C1.61747 8.33786 1.50662 7.2117 1.72261 6.12523C1.93859 5.03875 2.47171 4.04076 3.25455 3.25746C4.03739 2.47416 5.03478 1.94072 6.12061 1.72461C7.20644 1.50849 8.33193 1.61941 9.35475 2.04333C10.3776 2.46725 11.2518 3.18514 11.8669 4.1062C12.4819 5.02727 12.8102 6.11015 12.8102 7.21791C12.8102 8.70337 12.2205 10.128 11.1707 11.1784C10.121 12.2287 8.69722 12.8188 7.21265 12.8188Z"
                                                    fill="white" />
                                            </svg>
                                            Search</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    <section class="py-100 featured-packages bg-light">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 mx-auto">
                    <div class="row">
                        <div class="col-12 section-heading mb-40">
                            <h1>{{ settings()->get('home_package_title') }}</h1>
                            <span>{{ settings()->get('home_package_subtitle') }}</span>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($featuredTrips->take('6') as $trip)
                            <div class="col-md-4 mb-4 package-card-wrapper">
                                <a href="{{ route('website.trips.detail', $trip->slug) }}" class="package-card">
                                    <div class="img-div">
                                        <img src="{{ asset('ruploads/' . $trip->getFirstImage()) . pages_parallax() }}?w=402&h=300&fit=crop"
                                            alt="{{ $trip->slug }}">
                                    </div>
                                    <div class="text-content">
                                        <h6> {{ $trip->title }} </h6>
                                        <div class="info d-flex align-items-center">
                                            @if ($trip->average_rating > 0)
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
                                            @endif

                                            <div class="d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-clock" width="16" height="16"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <circle cx="12" cy="12" r="9" />
                                                    <polyline points="12 7 12 12 15 15" />
                                                </svg>
                                                <span class="ml-1">{{ $trip->duration }} da</span>

                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="price">Starting from <span>AUD {{ $trip->price }} </span></div>

                                            <svg class="favourite" data-url="{{ route('website.trips.favourite.store') }}"
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
                                class="btn text-primary btn-transparent btn-custom  bordered"><span>Explore More</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-100 discover-nepal">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 mx-auto">
                    <div class="row">
                        <div class="col-12 section-heading mb-40">
                            <h2>{{ settings()->get('discover_nepal_title') }}</h2>
                            {{-- <p>{!! settings()->get('discover_nepal_subtitle') !!}</p> --}}
                            {!! settings()->get('discover_nepal_subtitle') !!}
                        </div>
                        <div class="owl-carousel owl-theme discover-nepal-carousel centered">

                            <div class="travel-card-wrapper item">
                                <a href="{{ route('destinations') }}" class="travel-card">
                                    <div class="img-div">
                                        <img src="{{ asset('website/assets/img/travel1.webp') }}"
                                            alt="Destination">
                                    </div>
                                    <p>Destination</p>
                                </a>
                            </div>
                            @foreach ($nepalActivity as $n)
                                <div class="travel-card-wrapper item">
                                    <a href="{{ route('website.activities.detail', $n->slug) }}" class="travel-card">
                                        <div class="img-div">
                                            <img src="{{ asset('ruploads/' . $n->getCoverImage()) . pages_parallax() }}?w=360&h=404&fit=crop"
                                                alt="{{ $n->title }}">
                                        </div>
                                        <p>{{ $n->title }}</p>
                                    </a>
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (count($hotDeals) > 0)
        <section class="travel-deals py-100 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-12 section-heading mb-40">
                        <h2>{{ settings()->get('fixed_departure_title') }}</h2>
                        {{-- <p> --}}
                        {!! settings()->get('fixed_departure_description') !!}
                        {{-- </p> --}}
                    </div>
                    @foreach ($hotDeals as $h)
                        @php
                            if (!$h->trip) {
                                continue;
                            }
                        @endphp
                        <div class="col-12 deals-wrapper mb-4">
                            <div class="row">
                                <div class="col-md-3 col-sm-6 title">
                                    <p>{{ $h->trip->title }}</p>

                                </div>
                                <div class="col-md-3 col-sm-6 date">
                                    <div>
                                        <p>{{ $h->trip->duration }} Days</p>
                                        <span>{{ $h->start_date->format('d M Y') }} -
                                            {{ $h->finish_date->format('d M Y') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-6 price">
                                    <div>
                                        @if (isset($h->lastminutedeal->deal_price))
                                            <p>AUD {{ $h->price }}</p>
                                            <span>AUD {{ $h->lastminutedeal->deal_price }}</span>
                                        @else
                                            @if (isset($h->trip->old_price))
                                                <p>AUD {{ $h->trip->old_price }}</p>
                                            @endif
                                            <span>AUD {{ $h->price }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-1 col-sm-6 stock">
                                    @if ($h->size > 0 || $h->size != null)
                                        <div>
                                            <p>({{ $h->size }} slots left)</p>
                                            <span>{{ strtoupper($h->availability) }}</span>
                                        </div>
                                    @else
                                        <p>( No slots left)</p>
                                        <span>NOT AVAILABLE</span>
                                    @endif
                                </div>
                                <div class="col-md-3 d-flex justify-content-end col-sm-6 button">
                                    @if ($h->size > 0 || $h->size != null)
                                        <a href="{{ route('website.book.init', ['trip' => $h->trip->slug, 'departure' => $h->id]) }}"
                                            class="btn btn-custom btn-primary">
                                            <span>
                                                Book Now
                                            </span>
                                        </a>
                                    @else
                                        <a href="javascript:void(0)" class="btn btn-custom btn-primary">
                                            <span>
                                                Booking Closed
                                            </span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-5 col-12 btn-wrapper d-flex justify-content-center">
                        <a href="{{ route('website.page', 'upcoming-trip') }}"
                            class="btn text-primary btn-transparent btn-custom  bordered"><span>Explore More
                                Deals</span></a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (!empty(settings()->get('home_offer_title')))
        {{-- <h2>{{ settings()->get('home_offer_title') }}</h2> --}}
        {{-- @dd((settings()->get('home_offer_title')))col-12 section-heading columned mb-40 --}}
        <div  class="info-banner position-relative">
            <img src="{{ asset('ruploads/' . settings()->get('home_offer_image')) }}"
                alt="{{ settings()->get('home_offer_title') }}">
            <div class="content-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 content position-relative">
                            <p>{{ settings()->get('home_offer_title') }}</p>
                            <span> {{ settings()->get('home_offer_subtitle') }}</span>
                            <a href="{{ settings()->get('home_offer_link') }}" data-bs-toggle="modal"
                                data-bs-target="#flightModal"
                                class="btn btn-custom btn-primary "><span>{{ settings()->get('home_offer_link_text') }}</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <section class="our-expression py-100">
        <div class="container">
            <div class="row">
                <div class="col-12 section-heading columned mb-40">
                    <div class="row">
                        <div class="col-md-8">
                            <h2>{{ settings()->get('featured_blog_title') }}</h2>
                            {!! settings()->get('featured_blog_description') !!}
                        </div>
                        <div class="col-md-4 d-flex justify-content-end align-items-center">
                            <a href="{{ route('website.blog.index') }}"
                                class="btn bg-white text-primary btn-transparent btn-custom  bordered"><span>View
                                    All</span></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($posts->take('2') as $p)
                        <div class="col-xl-6 mb-4 mb-xl-0 blog-card-wrapper">
                            <a href="{{ route('website.blog.detail', $p->slug) }}" class="blog-card">
                                <div class="img-div">
                                    <img src="{{ asset('ruploads/' . $p->getCoverImage()) . pages_parallax() }}?w=360&h=404&fit=crop"
                                        alt="{{ $p->title }}">
                                </div>
                                <div class="text-content">
                                    <p class="title">{{ $p->title }}</p>
                                    <p class="desc"> <?php echo substr(strip_tags($p->body), 0, 50); ?></p>
                                    <div>Keep Reading</div>
                                    <span><svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-calendar-minus" width="12"
                                            height="12" viewBox="0 0 24 24" stroke-width="1.5" stroke="#A5A5A5"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <rect x="4" y="5" width="16" height="16"
                                                rx="2" />
                                            <line x1="16" y1="3" x2="16" y2="7" />
                                            <line x1="8" y1="3" x2="8" y2="7" />
                                            <line x1="4" y1="11" x2="20" y2="11" />
                                            <line x1="10" y1="16" x2="14" y2="16" />
                                        </svg>{{ $p->created_at->format('d M Y') }}
                                    </span>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    @if (!empty(settings()->get('insta_photo_title')))
        <section class="insta-photos py-60">
            <div class="container mb-40">
                <div class="row">
                    <div class="col-12 heading">
                        <h2>
                            <img src="{{ asset('ruploads/' . settings()->get('insta_photo_image')) . '?w=100' }}"
                                alt="{{ settings()->get('insta_photo_title') }}">
                            {{ settings()->get('insta_photo_title') }}
                        </h2>
                        <p>{{ settings()->get('insta_photo_subtitle') }}</p>
                    </div>
                </div>
            </div>
            <div class="insta-wrapper d-sm-flex">
                <div class="insta-picture owl-carousel owl-theme">
                    @php
                        $details = settings()->get('insta_photo_details');
                        $array = json_decode($details);
                        
                    @endphp
                    @foreach ($array as $f)
                        @if (isset($f->title) && isset($f->link))
                            <a href="{{ $f->link }}" class="insta-card">
                                @if (!empty($f->image))
                                    <img src="{{ asset('ruploads/' . $f->image) . '?w=270&h=226' }}"
                                        alt="{{ $f->title }}">
                                @endif
                            </a>
                        @endif
                    @endforeach

                </div>
            </div>
        </section>
    @endif


    @include('website::partials.things-know', ['nepalPosts' => $nepalPosts])


    <!-- Subscription Modal -->
    <div class="modal fade" id="subscriptionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content position-relative ">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="header mb-4">
                        <img src="{{ asset('website/assets/img/subscription-logo.png') }}" alt="Subscription Logo">
                        <p>SUBSCRIBE NOW</p>
                        <span>Stay notified with us</span>
                    </div>
                    <form id="subscription" method="POST" action="{{ route('website.subscribe.post') }}">
                        {!! csrf_field() !!}
                        <span id="quote"></span>
                        <input type="hidden" name="subscribe_pop" value="1">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="first_name"
                                        placeholder="Enter your first name">
                                    <div class="error-message" id="first_name"></div>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="last_name"
                                        placeholder="Enter your last name">
                                    <div class="error-message" id="last_name"></div>

                                </div>
                            </div>
                            <div class="col-12 form-group">
                                <label>Email</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="email"
                                        placeholder="Enter your email">
                                    <div class="error-message" id="email"></div>

                                </div>
                            </div>
                            <div class="form-chec form-group">
                                <input class="form-check-input" type="checkbox" value="1" name="agree"
                                    id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    I agree the term & condition
                                </label>
                            </div>
                            <button type="submit" id="btnSubmit" class="btn btn-custom btn-primary"
                                style="display: inline-block;">SUBSCRIBE
                                <span class="spinner-border spinner-border-md" style="display:none"
                                    id="ajaxLoader1"></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Flight Modal-->
    <div id="flightModal" class="modal fade flightModalNew" role="dialog">
        <div class="modal-dialog flightModal">
            <div class="modal-content">
                <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="col-md-6 col-sm-12 col-lg-6 nopadding form">
                        <div class="col-md-12 col-sm-12 col-lg-12 nopadding">
                            <form class="row" action="{{ route('website.flight.book') }}" method="post"
                                id="flightForm">
                                @csrf
                                <div class="flightinfo">
                                    <div class="form-cont">
                                        <h5>Flight Information</h5>
                                        <div class="row" id="flightBook1">
                                            <div class="col-md-12 col-sm-12 col-lg-12 radiobutton">
                                                <label id="OneWayInput">One Way
                                                    <input type="radio" checked="checked" name="flight_type"
                                                        value="one_way">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label id="RoundWayInput">Round Way
                                                    <input type="radio" checked="checked" name="flight_type"
                                                        value="round_trip">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-6 form-group with-icon white-bg">
                                                <label>Flight From</label>
                                                <div class="input-group">
                                                    <svg width="32" height="32" viewBox="0 0 32 32"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M4.29285 15.8155C4.02797 15.919 3.91945 16.2356 4.06513 16.4799L5.81319 19.4108C6.06359 19.8306 6.58081 20.0079 7.0361 19.8299L23.9381 13.223C24.7279 12.9143 25.1179 12.0237 24.8092 11.234C24.4883 10.413 23.5436 10.0302 22.7417 10.3961L17.7432 12.6773L10.773 6.27125C10.4838 6.00546 10.0685 5.9276 9.70266 6.0706C9.08963 6.31023 8.85636 7.05604 9.22358 7.60227L13.6983 14.2584L6.85554 17.3571L4.72413 15.8669C4.59802 15.7787 4.43618 15.7594 4.29285 15.8155ZM25.6776 22.9521H5.14764V24.5313H25.6776V22.9521Z"
                                                            fill="#0084D4"></path>
                                                    </svg>
                                                    <select class="form-control" id="cityTown" name="departure">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group with-icon white-bg">
                                                <label>Flight to</label>
                                                <div class="input-group">
                                                    <svg width="32" height="32" viewBox="0 0 32 32"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M4.29285 15.8155C4.02797 15.919 3.91945 16.2356 4.06513 16.4799L5.81319 19.4108C6.06359 19.8306 6.58081 20.0079 7.0361 19.8299L23.9381 13.223C24.7279 12.9143 25.1179 12.0237 24.8092 11.234C24.4883 10.413 23.5436 10.0302 22.7417 10.3961L17.7432 12.6773L10.773 6.27125C10.4838 6.00546 10.0685 5.9276 9.70266 6.0706C9.08963 6.31023 8.85636 7.05604 9.22358 7.60227L13.6983 14.2584L6.85554 17.3571L4.72413 15.8669C4.59802 15.7787 4.43618 15.7594 4.29285 15.8155ZM25.6776 22.9521H5.14764V24.5313H25.6776V22.9521Z"
                                                            fill="#0084D4"></path>
                                                    </svg>
                                                    <select class="js-example-basic-single form-control" name="arrival"
                                                        id="flightToValid">
                                                        <option value="KTM">Kathmandu</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group with-icon white-bg">
                                                <label>Departure Date</label>
                                                <div class="input-group">
                                                    <svg width="32" height="32" viewBox="0 0 32 32"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M4.29285 15.8155C4.02797 15.919 3.91945 16.2356 4.06513 16.4799L5.81319 19.4108C6.06359 19.8306 6.58081 20.0079 7.0361 19.8299L23.9381 13.223C24.7279 12.9143 25.1179 12.0237 24.8092 11.234C24.4883 10.413 23.5436 10.0302 22.7417 10.3961L17.7432 12.6773L10.773 6.27125C10.4838 6.00546 10.0685 5.9276 9.70266 6.0706C9.08963 6.31023 8.85636 7.05604 9.22358 7.60227L13.6983 14.2584L6.85554 17.3571L4.72413 15.8669C4.59802 15.7787 4.43618 15.7594 4.29285 15.8155ZM25.6776 22.9521H5.14764V24.5313H25.6776V22.9521Z"
                                                            fill="#0084D4"></path>
                                                    </svg>
                                                    <input type="text"
                                                        class="form-control date-picker validationoneDate"
                                                        placeholder="Select Departure Date" name="departure_date"
                                                        id="departure" required>
                                                    <p class="fieldRequirederror"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group with-icon white-bg" id="returnDateWrapper">
                                                <label>Return Date</label>
                                                <div class="input-group">
                                                    <svg width="32" height="32" viewBox="0 0 32 32"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M4.29285 15.8155C4.02797 15.919 3.91945 16.2356 4.06513 16.4799L5.81319 19.4108C6.06359 19.8306 6.58081 20.0079 7.0361 19.8299L23.9381 13.223C24.7279 12.9143 25.1179 12.0237 24.8092 11.234C24.4883 10.413 23.5436 10.0302 22.7417 10.3961L17.7432 12.6773L10.773 6.27125C10.4838 6.00546 10.0685 5.9276 9.70266 6.0706C9.08963 6.31023 8.85636 7.05604 9.22358 7.60227L13.6983 14.2584L6.85554 17.3571L4.72413 15.8669C4.59802 15.7787 4.43618 15.7594 4.29285 15.8155ZM25.6776 22.9521H5.14764V24.5313H25.6776V22.9521Z"
                                                            fill="#0084D4"></path>
                                                    </svg>
                                                    <input type="text"
                                                        class="form-control date-picker validationoneDate"
                                                        placeholder="Select Return Date" name="return_date"
                                                        id="returnDate" required>
                                                    <p class="fieldRequirederror"></p>
                                                </div>
                                            </div>
                                            <div class="flexible">
                                                <span>My dates are flexible</span>
                                                <label>(+/- 3 days)
                                                    <input type="hidden" name="flexible_date" value="0">
                                                    <input type="checkbox" name="flexible_date" value="1"
                                                        checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6 col-sm-12 col-lg-6 description d-flex">
                                                <div class="row">
                                                    <div class="col-md-4 adults nopadding">
                                                        <div class="input-group">
                                                            {{-- <span class="input-group-addon adult"> --}}
                                                            <div class="input-group-addon adult">
                                                                <img src="{{ asset('website/assets/img/adult.png') }}"
                                                                    alt="Adult">
                                                            </div>
                                                            {{-- </span> --}}
                                                            <input type="number" class="form-control validateError"
                                                                aria-label="" name="passengers[adults]" value=""
                                                                id="anumber">
                                                            <p class="fieldRequirederror"></p>
                                                            <span class="input-group-addon plus"
                                                                onclick="increaseValuea()">+</span>
                                                            <span class="input-group-addon minus" 
                                                                onclick="decreaseValuea()">-</span>

                                                        </div>
                                                    </div>
                                                    <!--adults-->
                                                    <div class="col-md-4 children nopadding">
                                                        <div class="input-group">
                                                            {{-- <span class="input-group-addon child"> --}}
                                                            {{-- <div> --}}
                                                            <div class="input-group-addon child">
                                                                <img src="{{ asset('website/assets/img/infant.png') }}"
                                                                    alt="Infant">
                                                            </div>
                                                            {{-- </div> --}}
                                                            {{-- </span> --}}
                                                            <input type="number" class="form-control" aria-label=""
                                                                value="" name="passengers[children]"
                                                                id="cnumber">
                                                            <span class="input-group-addon plus" 
                                                                onclick="increaseValuec()">+</span>
                                                            <span class="input-group-addon minus"
                                                                onclick="decreaseValuec()">-</span>

                                                        </div>
                                                    </div>
                                                    <!--adults-->
                                                    <div class="col-md-4 infant nopadding">
                                                        <div class="input-group">
                                                            <span class="input-group-addon infants">
                                                                <img src="{{ asset('website/assets/img/child.png') }}"
                                                                    alt="Child">
                                                            </span>
                                                            <input type="number" class="form-control" aria-label=""
                                                                value="" name="passengers[infants]" id="inumber">
                                                            <span class="input-group-addon plus" 
                                                                onclick="increaseValuei()">+</span>
                                                            <span class="input-group-addon minus" 
                                                                onclick="decreaseValuei()">-</span>

                                                        </div>
                                                    </div>
                                                    <!--adults-->
                                                </div>
                                            </div>
                                            <button class="btn btn-custom btn-primary w-100" id="proceedbook">
                                                Proceed
                                                for Booking</button>
                                        </div>
                                    </div>
                                </div>
                                <!--flightInfo-->
                                <div class="perinfo">
                                    <div class="form-cont row">
                                        <div class="col-12 px-0">
                                            <h5>Personal Information</h5>
                                            <p>These informations will be used to send you email with the flight details</p>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group col-12 col-md-6">
                                                <label>First Name</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control forError" name="first_name"
                                                        placeholder="Enter your first name">
                                                    <p class="fieldRequired"></p>
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-6">
                                                <label>Last Name</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control forError" name="last_name"
                                                        placeholder="Enter your last name">
                                                    <p class="fieldRequired"></p>
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-6">
                                                <label>Email</label>
                                                <div class="input-group">
                                                    <input type="email" class="form-control forError" name="email"
                                                        placeholder="Enter your email">
                                                    <p class="fieldRequired"></p>
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-6">
                                                <label>Nationality</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control forError"
                                                        name="nationality" placeholder="Enter your nationality">
                                                    <p class="fieldRequired"></p>
                                                </div>
                                            </div>
                                            <div class="col-12 form-group">
                                                <label>Description</label>
                                                <div class="input-group forError">
                                                    <textarea class="form-control" name="message" cols="30" rows="10"></textarea>
                                                </div>
                                                <p class="fieldRequiredDescription"></p>
                                            </div>
                                            <div class="btn-wrapper" id="flightSubmit">
                                                <button class="btn btn-custom btn-primary w-100">
                                                    Submit</button>
                                            </div>
                                            <a id="previousform"
                                                class="text-center d-block text-primary btn-transparent btn-custom  bordered previous mt-4">Previous
                                                Form</a>
                                        </div>
                                    </div>
                                </div>
                                <!--perinfo-->
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-lg-6 formimage nopadding">
                        <img src="{{ asset('website/assets/img/flight-booking.jpg') }}" alt="Flight Booking">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--flightmodal-->
@endsection
@section('js')
    <script src="{{ asset('website/assets/js/locations.min.js') }}"></script>
    @auth
        <script>
            $(function() {
                var hasSubscribed = $.cookie('has_subscribed');

                if (!"{{ auth()->user()->hasSubscribed() }}") {
                    if (hasSubscribed == null) {
                        setTimeout(function() {
                            $('#subscriptionModal').modal('show');
                        }, 0);
                        $.cookie('has_subscribed', false, {
                            expires: 1
                        });
                    }
                }
            });
        </script>
    @endauth

    @guest
        <script>
            $(function() {
                var hasSubscribed = $.cookie('has_subscribed');

                if (hasSubscribed == null) {
                    setTimeout(function() {
                        $('#subscriptionModal').modal('show');
                    }, 0);
                    $.cookie('has_subscribed', false, {
                        expires: 1
                    });
                }
            });
        </script>
    @endguest


    <script>
        $('#flightModal').on('hidden.bs.modal', function() {
            $('.validationoneDate').val(null);
            $('.fieldRequirederror').html("");
        })

        $("#OneWayInput").click(function() {
            $('#returnDateWrapper').addClass('showReturnDate');
            $('#returnDate').attr('disabled', true);
        });

        $("#RoundWayInput").click(function() {
            $('#returnDateWrapper').removeClass('showReturnDate');
            $('#returnDate').attr('disabled', false);
        });

        let errorMessage = document.querySelector('.forError');
        let validationone = document.getElementsByClassName('validateError');
        let validationoneDate = document.getElementsByClassName('validationoneDate');

        function validation1() {
            var result = null;
            if (validationone[0].value > 0) {
                $('.validateError').removeClass('errorField')
                $('.fieldRequirederror').html("");
                result = true;
            } else {
                $(".perinfo").hide(500);
                $(".flightinfo").show(500);
                $('.validateError').addClass('errorField')
                $('.fieldRequirederror').html("Field is Required");
                result = false
            }

            if (validationoneDate[0].value) {
                $('.validationoneDate').removeClass('errorField')
                $('.fieldRequirederror').html("");
                if (result) {
                    result = true;
                }
            } else {
                $(".perinfo").hide(500);
                $(".flightinfo").show(500);
                $('.validationoneDate').addClass('errorField')
                $('.fieldRequirederror').html("Field is Required");
                result = false;
            }

            return result;
        }

        function validateForm() {
            if (errorMessage.value == "") {
                $('.forError').addClass('errorField')
                $('.fieldRequired').html("Required");
                $('.fieldRequiredDescription').html("Required");
                return false;
            } else {
                $('#flightForm').submit();
            }
        }
    </script>

    <script>
        addLoadEvent(function() {

            var locationData = [];
            $.each(locations, function(k, v) {
                locationData.push({
                    'id': k,
                    'text': k,
                    'data': v
                });
            });

            $("select#cityTown").select2({
                placeholder: "Select One",
                data: locationData,
                minimumInputLength: 2,
                dropdownParent: $("#cityTown").parent(),
                escapeMarkup: function(m) {
                    return m;
                },
            });
            if ($(window).width() <= 768) {
                $('#bootstrap-touch-slider').attr('data-interval', 4000);
            }

            $('.flight_type').on('change', function() {
                var flight_type = $(this).val();
                if (flight_type == 'round_trip') {
                    $('input[name=return_date]').prop('disabled', false);
                    $('input[name=return_date]').prop('required', true);
                } else {
                    $('input[name=return_date]').prop('disabled', true);
                    $('input[name=return_date]').prop('required', false);
                }
            });

        });
        var custom_form_rules = {
            errorClass: 'error',
            errorElement: "span",
            return_date: {
                required: '#round_trip:checked'
            },
            errorPlacement: function(error, element) {

                var el = element.parent().parent();
                error.appendTo(el);
            }

        };
    </script>


    <script>
        $(function() {
            $("#previousform").click(function() {
                $(".flightinfo").show(500);
                $(".perinfo").hide(500);
            });
            $("#proceedbook").click(function(e) {
                e.preventDefault();
                var result = validation1();
                if (result) {
                    $(".perinfo").show(500);
                    $(".flightinfo").hide(500);
                }
            });
            $("#flightSubmit").click(function(e) {
                e.preventDefault();
                validateForm();

            });
            $("#flightModal").on("show.bs.modal", function(e) {
                $(".flightinfo").show(500);
                $(".perinfo").hide(500);
            });
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
            $(".date-picker").flatpickr();
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script>
        jQuery(function() {
            $(document).ready(function() {
                $('.error-message').hide();
                $("#ajaxLoader1").hide();
                // $("#subscription").validate();
                $("#subscription").css("opacity", "1");
                $("#subscription").submit(function(e) {
                    e.preventDefault();




                    //  if ($(this).valid()) {


                    $("#ajaxLoader1").show();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    })
                    $.ajax({
                        url: "{{ route('website.subscribe.post') }}",
                        data: $(this).serialize(),
                        method: 'POST',
                        dataType: 'json',
                        beforeSend: function() {
                            $('.error-message').hide();
                        },
                        success: function(response) {
                            $('#subscription').trigger('reset');
                            $("#ajaxLoader1").hide();
                            $('#quote').html(
                                "<span style='color:#009ad1;'>Thank you for subscribing to our newsletter</span>"
                            );

                        },
                        error: function(xhr) {
                            var errorsArray = [];
                            var j = 0;
                            $.each(xhr.responseJSON.errors, function(key, value) {
                                $('#' + key).show();
                                $('#' + key).text(value);
                                errorsArray[j] = value;
                                j++;
                            });
                            $("#ajaxLoader1").hide();
                        }
                    });
                    return false;
                    //  } else {
                    //      return false;
                    //  }


                });
                return false;

            });



        });
    </script>

    <script>
        function increaseValuea() {
            var value = parseInt(document.getElementById("anumber").value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            document.getElementById("anumber").value = value;
        }

        function decreaseValuea() {
            var value = parseInt(document.getElementById("anumber").value, 10);
            value = isNaN(value) ? 0 : value;
            value < 1 ? (value = 1) : "";
            value--;
            document.getElementById("anumber").value = value;
        }

        function increaseValuec() {
            var value = parseInt(document.getElementById("cnumber").value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            document.getElementById("cnumber").value = value;
        }

        function decreaseValuec() {
            var value = parseInt(document.getElementById("cnumber").value, 10);
            value = isNaN(value) ? 0 : value;
            value < 1 ? (value = 1) : "";
            value--;
            document.getElementById("cnumber").value = value;
        }

        function increaseValuei() {
            var value = parseInt(document.getElementById("inumber").value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            document.getElementById("inumber").value = value;
        }

        function decreaseValuei() {
            var value = parseInt(document.getElementById("inumber").value, 10);
            value = isNaN(value) ? 0 : value;
            value < 1 ? (value = 1) : "";
            value--;
            document.getElementById("inumber").value = value;
        }
    </script>
@endsection
