@extends('website::layouts.master')
{{-- {{ dd('hello') }} --}}

{{-- {{ dd(auth()->user()->hasSubscribed()) }} --}}
@section('content')
    <section class="mt-80 breadcrumb-section with-text bg-white bg-img">
        <img src="{{ asset('ruploads/' . $page->getCoverImage()) . pages_parallax() }}" alt="image"
            style="object-fit: cover; width: 100vw; height: 60vh;">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12 breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.7899 6.73344L7.75241 0.699063L7.34772 0.294375C7.25551 0.202776 7.13082 0.151367 7.00085 0.151367C6.87087 0.151367 6.74618 0.202776 6.65397 0.294375L0.211783 6.73344C0.117301 6.82755 0.0426296 6.93964 -0.00782254 7.06309C-0.0582747 7.18653 -0.0834854 7.31884 -0.0819665 7.45219C-0.0757165 8.00219 0.382096 8.44125 0.932096 8.44125H1.59616V13.5303H12.4055V8.44125H13.0837C13.3508 8.44125 13.6024 8.33656 13.7915 8.1475C13.8846 8.05471 13.9583 7.94437 14.0085 7.82287C14.0586 7.70137 14.0842 7.57113 14.0837 7.43969C14.0837 7.17406 13.979 6.9225 13.7899 6.73344ZM7.87585 12.4053H6.12585V9.21781H7.87585V12.4053ZM11.2805 7.31625V12.4053H8.87585V8.84281C8.87585 8.4975 8.59616 8.21781 8.25085 8.21781H5.75085C5.40553 8.21781 5.12585 8.4975 5.12585 8.84281V12.4053H2.72116V7.31625H1.22116L7.00241 1.53969L7.36335 1.90063L12.7821 7.31625H11.2805Z"
                                                fill="white" />
                                        </svg>
                                        Home
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Flights</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- @dd($page)  --}}
    <section class="py-60 mb-60 flights-title-wrapper ">
        <div class="container">
            <div class="row">
                <h1>Get Flight Tickets</h1>
                {{-- <p>All adventurers with kids have a viable choice for family vacations in Nepal in the Foothills of the
                    Himalayas. Hence hoping to offer a fulfilling and instructive vacation focused on culture and adventure.
                </p> --}}
                {!! $page->page_description !!}
                <div class="col-md-3 d-flex col-sm-6 button">
                    {{-- <a href="{{ url('flights-detail', 'sss') }}" class="btn btn-custom btn-primary"> --}}
                    <a href="{{ settings()->get('home_offer_link') }}" data-bs-toggle="modal" data-bs-target="#flightModal"
                        class="btn btn-custom btn-primary ">
                        <span>Book Flight</span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.8757 1.03948L18.8574 1.0211C17.9206 0.130194 16.0497 1.71246 16.0497 1.71246L12.653 4.38663L9.07714 3.75288C9.593 3.00508 9.74839 2.26272 9.40447 1.9188C8.95901 1.47335 7.84526 1.8649 6.91691 2.79326C6.75453 2.95563 6.60903 3.12368 6.48111 3.2928L3.73545 2.80619L1.90658 4.36451L9.36176 7.7854L4.58225 13.5605L1.60545 13.0024L0.851562 13.7553L6.14173 19.0453L6.89445 18.2914L6.33636 15.3146L12.1115 10.5351L15.5324 17.9902L17.0907 16.1614L16.6041 13.4157C16.7733 13.2878 16.9413 13.1423 17.1037 12.9799C18.0321 12.0515 18.4236 10.9378 17.9782 10.4924C17.6342 10.1485 16.8918 10.3039 16.144 10.8197L15.5103 7.2439L18.1844 3.84715C18.1844 3.84715 19.7668 1.97627 18.8757 1.03948Z"
                                fill="white" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-60 top-destination flight-top-destination">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h5>Cheap Flights Ticket From Sydney
                    </h5>
                    {{-- <p>Family hiking and trekking vacations in Nepal can be customised to meet your needs, and we are
                        delighted
                        to take client suggestions into consideration.</p> --}}
                    {!! $page->other_description !!}
                </div>
                <div class="mt-40 top-destination-list-wrapper">
                    <div class="row">
                        @foreach ($top_destinations as $d)
                            {{-- @dd(asset('ruploads/' . $d->getCoverImage()) . pages_parallax()); --}}
                            <div class="col-lg-6">
                                <a href="{{ route('flight.detail', $d->slug) }}" class="top-destination-card-wrapper">

                                    <div class="image-wrapper">
                                        {{-- <img src="{{ asset('website/assets/img/package1.webp') }}"
                                            alt="top_destination_image"> --}}

                                        {{-- <img src="{{ asset('ruploads/' . $d->getCoverImage()) . pages_parallax() }}?w=360&h=404&fit=crop"
                                            alt="{{ $d->slug }}" style="width:360;height:404 "> --}}
                                        <img src="{{ asset('ruploads/' . $d->getCoverImage()) . pages_parallax() }}"
                                            alt="{{ $d->slug }}"
                                            style="object-fit: cover; width: 200px; height: 150px;">
                                    </div>
                                    <div class="right-info">
                                        <h6>{{ $d->from }} to {{ $d->to }}</h6>
                                        <p>Starting from <span>AUD {{ $d->starting_price }}</span></p>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                        {{ $top_destinations->links() }}
                    </div>
                </div>

            </div>

        </div>

    </section>

    <section class="best-selling-flights py-60 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h5>Find Best Deal On Your Flights
                    </h5>
                    {{-- <p>Family hiking and trekking vacations in Nepal can be customised to meet your needs, and we are
                        delighted to take client suggestions into consideration.</p> --}}
                    {!! $page->featured_content !!}
                </div>
                <div class="mt-40 top-destination-list-wrapper">
                    <div class="row">
                        @foreach ($top_selling as $t)
                            {{-- @dd($t) --}}
                            <div class="col-md-4 mb-4 package-card-wrapper">
                                <a href="{{ url('flights-detail', $t->slug) }}" class="package-card">
                                    <div class="img-div">
                                        {{-- <img src="{{ asset('website/assets/img/package3.webp') }}" alt=""> --}}
                                        <img src="{{ asset('ruploads/' . $t->getCoverImage()) . pages_parallax() }}?w=416&h=300&fit=crop"
                                            alt="{{ $t->slug }}"
                                            style="object-fit: contain; width: 416; height: 300;">
                                    </div>
                                    <div class="text-content">
                                        <h6>{{ $t->from }} to {{ $t->to }}</h6>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="price">Starting from <span>AUD {{ $t->starting_price }}</span></div>
                                            <button class="btn btn-custom btn-custom2 btn-primary">Book Now</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                        {{-- <div class="col-md-4 mb-4 package-card-wrapper">
                            <a href="{{ url('flights-detail', 'sss') }}" class="package-card">
                                <div class="img-div">
                                    <img src="{{ asset('website/assets/img/package3.webp') }}" alt="">
                                </div>
                                <div class="text-content">
                                    <h6>Sydney to Kathmandu</h6>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="price">Starting from <span>$350</span></div>
                                        <button class="btn btn-custom btn-custom2 btn-primary">Book Now</button>
                                    </div>
                                </div>
                            </a>
                        </div> --}}
                        {{-- <div class="col-md-4 mb-4 package-card-wrapper">
                            <a href="{{ url('flights-detail', 'sss') }}" class="package-card">
                                <div class="img-div">
                                    <img src="{{ asset('website/assets/img/package3.webp') }}" alt="">
                                </div>
                                <div class="text-content">
                                    <h6>Sydney to Kathmandu</h6>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="price">Starting from <span>$350</span></div>
                                        <button class="btn btn-custom btn-custom2 btn-primary">Book Now</button>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-4 package-card-wrapper">
                            <a href="{{ url('flights-detail', 'sss') }}" class="package-card">
                                <div class="img-div">
                                    <img src="{{ asset('website/assets/img/package3.webp') }}" alt="">
                                </div>
                                <div class="text-content">
                                    <h6>Sydney to Kathmandu</h6>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="price">Starting from <span>$350</span></div>
                                        <button class="btn btn-custom btn-custom2 btn-primary">Book Now</button>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-4 package-card-wrapper">
                            <a href="{{ url('flights-detail', 'sss') }}" class="package-card">
                                <div class="img-div">
                                    <img src="{{ asset('website/assets/img/package3.webp') }}" alt="">
                                </div>
                                <div class="text-content">
                                    <h6>Sydney to Kathmandu</h6>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="price">Starting from <span>$350</span></div>
                                        <button class="btn btn-custom btn-custom2 btn-primary">Book Now</button>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-4 package-card-wrapper">
                            <a href="{{ url('flights-detail', 'sss') }}" class="package-card">
                                <div class="img-div">
                                    <img src="{{ asset('website/assets/img/package3.webp') }}" alt="">
                                </div>
                                <div class="text-content">
                                    <h6>Sydney to Kathmandu</h6>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="price">Starting from <span>$350</span></div>
                                        <button class="btn btn-custom btn-custom2 btn-primary">Book Now</button>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-4 package-card-wrapper">
                            <a href="{{ url('flights-detail', 'sss') }}" class="package-card">
                                <div class="img-div">
                                    <img src="{{ asset('website/assets/img/package3.webp') }}" alt="">
                                </div>
                                <div class="text-content">
                                    <h6>Sydney to Kathmandu</h6>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="price">Starting from <span>$350</span></div>
                                        <button class="btn btn-custom btn-custom2 btn-primary">Book Now</button>
                                    </div>
                                </div>
                            </a>
                        </div> --}}
                    </div>
                    {{ $top_selling->links() }}

                </div>
            </div>
        </div>
    </section>

    <section class="query-banner mt-80 bg-primary">
        <div class="container">
            {{-- <div class="row">
                <div class="col-md-6 py-120 text-content">
                    <h2>We are always here to assist you with any queries you may have in mind.</h2>
                    <div class="d-sm-flex justify-content-between">
                        <div class="item">
                            <a class="d-flex align-items-center" href="tel:{{ settings()->get('contact_phone') }}">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.83203 7.5L9.9987 10.4167L14.1654 7.5" stroke="#FAA61A" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M1.66797 14.1665V5.83317C1.66797 5.39114 1.84356 4.96722 2.15612 4.65466C2.46868 4.3421 2.89261 4.1665 3.33464 4.1665H16.668C17.11 4.1665 17.5339 4.3421 17.8465 4.65466C18.159 4.96722 18.3346 5.39114 18.3346 5.83317V14.1665C18.3346 14.6085 18.159 15.0325 17.8465 15.345C17.5339 15.6576 17.11 15.8332 16.668 15.8332H3.33464C2.89261 15.8332 2.46868 15.6576 2.15612 15.345C1.84356 15.0325 1.66797 14.6085 1.66797 14.1665Z"
                                        stroke="#FAA61A" stroke-width="1.5" />
                                </svg>
                                {{ settings()->get('contact_phone') }}
                            </a>
                            <p>For General Inquiries</p>
                        </div>
                        <div class="item">
                            <a class="d-flex align-items-center" href="mailto:{{ settings()->get('contact_email') }}">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.83203 7.5L9.9987 10.4167L14.1654 7.5" stroke="#FAA61A" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M1.66797 14.1665V5.83317C1.66797 5.39114 1.84356 4.96722 2.15612 4.65466C2.46868 4.3421 2.89261 4.1665 3.33464 4.1665H16.668C17.11 4.1665 17.5339 4.3421 17.8465 4.65466C18.159 4.96722 18.3346 5.39114 18.3346 5.83317V14.1665C18.3346 14.6085 18.159 15.0325 17.8465 15.345C17.5339 15.6576 17.11 15.8332 16.668 15.8332H3.33464C2.89261 15.8332 2.46868 15.6576 2.15612 15.345C1.84356 15.0325 1.66797 14.6085 1.66797 14.1665Z"
                                        stroke="#FAA61A" stroke-width="1.5" />
                                </svg>
                                {{ settings()->get('contact_email') }}
                            </a>
                            <p>For General Inquiries</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 img-div">
                    <img src="{{ asset('website/assets/img/cuate.png') }}" alt="">
                </div>
            </div> --}}
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
                                                        <select class="js-example-basic-single form-control"
                                                            name="arrival" id="flightToValid">
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
                                                <div class="col-md-6 form-group with-icon white-bg"
                                                    id="returnDateWrapper">
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
                                                                    aria-label="" name="passengers[adults]"
                                                                    value="" id="anumber">
                                                                <p class="fieldRequirederror"></p>
                                                                <span class="input-group-addon plus"
                                                                    onclick="increaseValuea()"
                                                                    style="cursor: pointer">+</span>
                                                                <span class="input-group-addon minus"
                                                                    onclick="decreaseValuea()"
                                                                    style="cursor: pointer">-</span>

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
                                                                    onclick="increaseValuec()"
                                                                    style="cursor: pointer">+</span>
                                                                <span class="input-group-addon minus"
                                                                    onclick="decreaseValuec()"
                                                                    style="cursor: pointer">-</span>

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
                                                                    value="" name="passengers[infants]"
                                                                    id="inumber">
                                                                <span class="input-group-addon plus"
                                                                    onclick="increaseValuei()"
                                                                    style="cursor: pointer">+</span>
                                                                <span class="input-group-addon minus"
                                                                    onclick="decreaseValuei()"
                                                                    style="cursor: pointer">-</span>

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
                                                <p>These informations will be used to send you email with the flight details
                                                </p>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group col-12 col-md-6">
                                                    <label>First Name</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control forError"
                                                            name="first_name" placeholder="Enter your first name">
                                                        <p class="fieldRequired"></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-12 col-md-6">
                                                    <label>Last Name</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control forError"
                                                            name="last_name" placeholder="Enter your last name">
                                                        <p class="fieldRequired"></p>
                                                    </div>
                                                </div>
                                                <div class="form-group col-12 col-md-6">
                                                    <label>Email</label>
                                                    <div class="input-group">
                                                        <input type="email" class="form-control forError"
                                                            name="email" placeholder="Enter your email">
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
