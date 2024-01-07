@extends('website::layouts.master')
@section('content')
    @php
        $flight_deals = json_decode($flight->flight_deals);
        $faqs = json_decode($flight->faqs);
    @endphp
    {{-- {{ dd($similar_packages) }} --}}
    {{-- {{ dd($flight->getCoverImage()) }} --}}
    {{-- {{ dd(settings()->get('contact_phone')) }} --}}
    {{-- {{ dd($flight->getCoverImage()) }} --}}
    <section class="mt-80 breadcrumb-section flights-detail-banner with-text bg-white bg-img">
        {{-- <img src="{{ asset('website/assets/img/breadcrumb-img.jpg') }}" alt=""> --}}
        {{-- <img src="{{ asset('ruploads/' . $flight->coverImage()) . pages_parallax() }}" alt=""> --}}
        {{-- <img src="{{ asset('ruploads/' . $flight->getCoverImage()) . pages_parallax() }}" alt="{{ $flight->slug }}"
            style="object-fit: fill;" class="jumbo-img"> --}}
        <div
            style="height: 80vh; width: 100%; background-image: url('{{ asset('ruploads/' . $flight->getCoverImage()) . pages_parallax() }}'); background-size: cover; background-repeat: no-repeat; ">

            {{-- <img src="{{ asset('ruploads/' . $flight->getCoverImage()) . pages_parallax() }}" alt="{{ $flight->slug }}"
                style="width: 100vw; "> --}}
        </div>
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
                                <li class="breadcrumb-item " aria-current="page">
                                    <a href="{{ url('/flights') }}">Flights</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $flight->slug }}</li>

                            </ol>
                        </nav>
                        {{-- {{ dd($flight) }} --}}
                        <div class="text-content">
                            <h2>{{ $flight->from }} to {{ $flight->to }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="viewDateMobile">
        <a href="#dates" class="btn btn-custom btn-primary"><svg width="21" height="20" viewBox="0 0 21 20"
                fill="none" xmlns="http://www.w3.org/2000/svg">
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

    <section class="detail-content flight-detail-content py-60">
        <div class="container">
            <div class="row">
                <div class="col-md-8 detail-wrapper">
                    <div class="content-wrapper nav-content overview" id="overview">
                        <div class="header">
                            <h2>Flight Overview</h2>
                        </div>
                        {{-- <p>All adventurers with kids have a viable choice for family vacations in Nepal in the Foothills of
                            the Himalayas. Hence hoping to offer a fulfilling and instructive vacation focused on culture
                            and adventure. </p> --}}
                        {!! $flight->overview_description !!}
                    </div>
                    <div class="info-with-table flights-detail-table pt-40  pb-60 mb-40">
                        <div class="px-0 container">
                            <div class="row">
                                <div class="col-12 section-heading">
                                    {{-- {{ dd($flight) }} --}}
                                    <h4>{{ $flight->flight_deals_title }}</h4>
                                    {!! $flight->flight_deals_description !!}
                                </div>
                                <div class="table-wrapper table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <td class="airlines">Airlines</td>
                                                <td class="flight-date">Flight Date</td>
                                                <td class="duration">Duration</td>
                                                <td class="transits">Transits</td>
                                                <td class="cost">Cost</td>
                                                <td class="transits">Actions</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($departure as $d)
                                                {{-- @dd($d) --}}
                                                <tr>
                                                    <td class="airlines">{{ $d->airline_name }}</td>
                                                    @php
                                                        $converted_date = \Carbon\Carbon::createFromFormat('Y-m-d', $d->start_date)->format('d -m Y');
                                                    @endphp
                                                    <td class="flight-date">{{ $converted_date }}</td>
                                                    <td class="duration">{{ $d->duration }} hrs</td>
                                                    <td class="transits">{{ $d->transits }}</td>
                                                    <td class="cost">AUD {{ $d->price }}</td>
                                                    <td class="transits">
                                                        <a href="{{ settings()->get('home_offer_link') }}"
                                                            departure-date={{ $d->start_date }} class="departure-date"
                                                            data-bs-toggle="modal" data-bs-target="#flightModal">Book
                                                            Now</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            {{-- <tr>
                                                <td class="airlines">Emirates</td>
                                                <td class="flight-date">27 Jul 2023</td>
                                                <td class="duration">27 hrs</td>
                                                <td class="transits">2</td>
                                                <td class="cost">$2695</td>
                                                <td class="transits"><a href="#">Book Now</a></td>
                                            </tr>
                                            <tr>
                                                <td class="airlines">Emirates</td>
                                                <td class="flight-date">27 Jul 2023</td>
                                                <td class="duration">27 hrs</td>
                                                <td class="transits">2</td>
                                                <td class="cost">$2695</td>
                                                <td class="transits"><a href="#">Book Now</a></td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                    <div class="col-12 btn-wrapper py-40 d-flex justify-content-center">
                                        <a href="{{ route('website.page', 'upcoming-trip') }}"
                                            class="btn text-primary btn-transparent btn-custom  bordered"><span>Explore More
                                                Flights</span></a>
                                    </div>
                                </div>
                                {{-- <div class="no-data-table">
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
                                    <h3>Flights Not Found</h3>
                                    <a href="{{ url('pages/contact') }}">Contact Us</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="faq pb-80">
                        <div class="container p-0">
                            <div class="row">
                                <div class="col-12 section-heading mb-40">
                                    <h2>Frequently Asked Questions (FAQ's)</h2>

                                </div>
                            </div>
                            <div class="accordion row accordion-flush" id="faq-accordion">
                                @foreach ($faqs as $i => $f)
                                    <div class="col-12 mb-4 accordion-wrapper">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading{{ $i }}">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse{{ $i }}" aria-expanded="true"
                                                    aria-controls="collapse{{ $i }}">
                                                    {{ $f->question }}
                                                </button>
                                            </h2>
                                            <div id="collapse{{ $i }}" class="accordion-collapse collapse show"
                                                aria-labelledby="heading{{ $i }}"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    {{ $f->answer }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- <div class="col-12 mb-4 accordion-wrapper">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                Do I need any vaccinations?
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <strong>This is the second item's accordion body.</strong> It is hidden by
                                                default,
                                                until the collapse plugin adds the appropriate classes that we use to style
                                                each
                                                element. These classes control the overall appearance, as well as the
                                                showing and hiding
                                                via CSS transitions. You can modify any of this with custom CSS or
                                                overriding our
                                                default variables. It's also worth noting that just about any HTML can go
                                                within the
                                                <code>.accordion-body</code>, though the transition does limit overflow.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-4 accordion-wrapper">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                Can I wash my clothes during the tour?
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <strong>This is the third item's accordion body.</strong> It is hidden by
                                                default, until
                                                the collapse plugin adds the appropriate classes that we use to style each
                                                element.
                                                These classes control the overall appearance, as well as the showing and
                                                hiding via CSS
                                                transitions. You can modify any of this with custom CSS or overriding our
                                                default
                                                variables. It's also worth noting that just about any HTML can go within the
                                                <code>.accordion-body</code>, though the transition does limit overflow.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-4 accordion-wrapper">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFour">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                aria-expanded="false" aria-controls="collapseFour">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse"
                                            aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <strong>This is the third item's accordion body.</strong> It is hidden by
                                                default, until
                                                the collapse plugin adds the appropriate classes that we use to style each
                                                element.
                                                These classes control the overall appearance, as well as the showing and
                                                hiding via CSS
                                                transitions. You can modify any of this with custom CSS or overriding our
                                                default
                                                variables. It's also worth noting that just about any HTML can go within the
                                                <code>.accordion-body</code>, though the transition does limit overflow.
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 detail-sidebar">
                    <div class="content-wrapper">
                        <div class="title">
                            <h5>Book Flight</h5>
                        </div>
                        <div class="list-content">
                            <ul class="custom-list green-list">
                                {!! $flight->book_flight_description !!}
                                {{-- <li> Best Price Guarantee</li> --}}
                                {{-- <li>Hassle-Free Booking</li>
                                <li>No Booking or Credit Card Fees</li>
                                <li>Team of highly experienced Experts</li>
                                <li>Your Happiness Guaranteed</li> --}}
                            </ul>
                        </div>
                        <div class="btn-wrapper">
                            {{-- <div class="btn btn-custom btn-primary w-100 position-relative">
                                <input type="date" id="flights-date-pick">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1091_3270)">
                                        <path
                                            d="M17.845 1.2552H16.2344V0.585938C16.2344 0.262344 15.972 0 15.6484 0C15.3248 0 15.0625 0.262344 15.0625 0.585938V1.2552H12.4688V0.585938C12.4688 0.262344 12.2064 0 11.8828 0C11.5592 0 11.2969 0.262344 11.2969 0.585938V1.2552H8.70312V0.585938C8.70312 0.262344 8.44078 0 8.11719 0C7.79359 0 7.53125 0.262344 7.53125 0.585938V1.2552H4.9375V0.585938C4.9375 0.262344 4.67516 0 4.35156 0C4.02797 0 3.76562 0.262344 3.76562 0.585938V1.2552H2.15492C0.966719 1.2552 0 2.22188 0 3.41016V17.845C0 19.0333 0.966719 20 2.15492 20H17.845C19.0332 20 20 19.0333 20 17.845V3.41016C20 2.22188 19.0332 1.2552 17.845 1.2552ZM2.15492 2.42707H3.76562V3.09637C3.76562 3.41996 4.02797 3.6823 4.35156 3.6823C4.67516 3.6823 4.9375 3.41996 4.9375 3.09637V2.42707H7.53117V3.09637C7.53117 3.41996 7.79352 3.6823 8.11711 3.6823C8.4407 3.6823 8.70305 3.41996 8.70305 3.09637V2.42707H11.2968V3.09637C11.2968 3.41996 11.5591 3.6823 11.8827 3.6823C12.2063 3.6823 12.4687 3.41996 12.4687 3.09637V2.42707H15.0624V3.09637C15.0624 3.41996 15.3248 3.6823 15.6484 3.6823C15.972 3.6823 16.2343 3.41996 16.2343 3.09637V2.42707H17.8449C18.3871 2.42707 18.8281 2.86809 18.8281 3.41016V5.02082H1.17188V3.41016C1.17188 2.86809 1.61289 2.42707 2.15492 2.42707ZM17.845 18.8281H2.15492C1.61289 18.8281 1.17188 18.3871 1.17188 17.845V6.1927H18.8281V17.845C18.8281 18.3871 18.3871 18.8281 17.845 18.8281Z"
                                            fill="white" />
                                        <path
                                            d="M5.92059 8.15918H3.41016C3.08656 8.15918 2.82422 8.42152 2.82422 8.74512V11.2555C2.82422 11.5791 3.08656 11.8414 3.41016 11.8414H5.92062C6.24422 11.8414 6.50656 11.5791 6.50656 11.2555V8.74512C6.50652 8.42152 6.24422 8.15918 5.92059 8.15918ZM5.33465 10.6696H3.99605V9.33105H5.33465V10.6696Z"
                                            fill="white" />
                                        <path
                                            d="M16.5905 8.15918H14.0801C13.7565 8.15918 13.4941 8.42152 13.4941 8.74512V11.2555C13.4941 11.5791 13.7565 11.8414 14.0801 11.8414H16.5905C16.9141 11.8414 17.1764 11.5791 17.1764 11.2555V8.74512C17.1764 8.42152 16.9141 8.15918 16.5905 8.15918ZM16.0045 10.6696H14.666V9.33105H16.0045V10.6696Z"
                                            fill="white" />
                                        <path
                                            d="M5.92059 13.1797H3.41016C3.08656 13.1797 2.82422 13.442 2.82422 13.7656V16.276C2.82422 16.5996 3.08656 16.862 3.41016 16.862H5.92062C6.24422 16.862 6.50656 16.5996 6.50656 16.276V13.7656C6.50652 13.442 6.24422 13.1797 5.92059 13.1797ZM5.33465 15.6901H3.99605V14.3516H5.33465V15.6901Z"
                                            fill="white" />
                                        <path
                                            d="M16.5905 13.1797H14.0801C13.7565 13.1797 13.4941 13.442 13.4941 13.7656V16.276C13.4941 16.5996 13.7565 16.862 14.0801 16.862H16.5905C16.9141 16.862 17.1764 16.5996 17.1764 16.276V13.7656C17.1764 13.442 16.9141 13.1797 16.5905 13.1797ZM16.0045 15.6901H14.666V14.3516H16.0045V15.6901Z"
                                            fill="white" />
                                        <path
                                            d="M11.2546 13.1797H8.74414C8.42055 13.1797 8.1582 13.442 8.1582 13.7656V16.276C8.1582 16.5996 8.42055 16.862 8.74414 16.862H11.2546C11.5782 16.862 11.8405 16.5996 11.8405 16.276V13.7656C11.8405 13.442 11.5782 13.1797 11.2546 13.1797ZM10.6687 15.6901H9.33008V14.3516H10.6687V15.6901Z"
                                            fill="white" />
                                        <path
                                            d="M10.9163 8.69799L9.55557 10.0588L9.08229 9.58549C8.8535 9.35666 8.48248 9.35666 8.25365 9.58549C8.02482 9.81432 8.02482 10.1853 8.25365 10.4141L9.14127 11.3017C9.25115 11.4116 9.40018 11.4734 9.55557 11.4734C9.711 11.4734 9.86002 11.4116 9.9699 11.3017L11.7449 9.52662C11.9737 9.29779 11.9737 8.92682 11.7449 8.69799C11.5161 8.46916 11.1451 8.46916 10.9163 8.69799Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1091_3270">
                                            <rect width="20" height="20" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>  
                                Select Dates
                            </div> --}}
                            <a href="{{ url('pages/contact') }}"
                                class="btn mt-3 text-secondary btn-transparent btn-custom  bordered">
                                <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1091_3279)">
                                        <path
                                            d="M16.3054 12.3897C15.896 11.9633 15.4021 11.7354 14.8787 11.7354C14.3595 11.7354 13.8614 11.9591 13.4351 12.3855L12.1012 13.7151C11.9914 13.656 11.8817 13.6011 11.7761 13.5463C11.6242 13.4703 11.4807 13.3985 11.3583 13.3225C10.1088 12.529 8.97331 11.4948 7.88426 10.1567C7.35662 9.48975 7.00204 8.92834 6.74455 8.35849C7.09069 8.0419 7.41149 7.71265 7.72386 7.39607C7.84205 7.27787 7.96024 7.15546 8.07843 7.03727C8.96487 6.15083 8.96487 5.00268 8.07843 4.11624L6.92606 2.96387C6.79521 2.83302 6.66013 2.69794 6.5335 2.56287C6.28023 2.30115 6.0143 2.031 5.73992 1.77773C5.33047 1.3725 4.84082 1.15723 4.32584 1.15723C3.81086 1.15723 3.31277 1.3725 2.89066 1.77773C2.88644 1.78195 2.88644 1.78195 2.88221 1.78618L1.44703 3.23403C0.906722 3.77433 0.598579 4.43283 0.531041 5.19685C0.429734 6.42943 0.792752 7.57758 1.07135 8.32894C1.75517 10.1736 2.77669 11.8831 4.30052 13.7151C6.14937 15.9228 8.37391 17.6661 10.915 18.8944C11.8859 19.3545 13.1818 19.8991 14.6296 19.9919C14.7183 19.9962 14.8111 20.0004 14.8956 20.0004C15.8707 20.0004 16.6896 19.65 17.3312 18.9535C17.3354 18.9451 17.3438 18.9409 17.348 18.9324C17.5675 18.6665 17.8208 18.4259 18.0867 18.1684C18.2683 17.9953 18.454 17.8138 18.6355 17.6239C19.0534 17.1891 19.2729 16.6826 19.2729 16.1634C19.2729 15.6399 19.0492 15.1376 18.6228 14.7155L16.3054 12.3897ZM17.8166 16.8345C17.8124 16.8345 17.8124 16.8387 17.8166 16.8345C17.652 17.0118 17.4831 17.1722 17.3016 17.3495C17.0272 17.6112 16.7486 17.8856 16.4869 18.1937C16.0606 18.6496 15.5583 18.8649 14.8998 18.8649C14.8365 18.8649 14.7689 18.8649 14.7056 18.8607C13.4519 18.7805 12.2869 18.2908 11.4131 17.8729C9.02397 16.7163 6.92606 15.0743 5.18273 12.9933C3.74333 11.2584 2.78091 9.65438 2.14352 7.93215C1.75095 6.88109 1.60743 6.06219 1.67075 5.28972C1.71296 4.79585 1.90291 4.3864 2.25327 4.03604L3.69267 2.59663C3.89951 2.40246 4.11901 2.29693 4.33429 2.29693C4.60022 2.29693 4.8155 2.45734 4.95057 2.59241C4.95479 2.59663 4.95901 2.60086 4.96323 2.60508C5.22072 2.84568 5.46555 3.09473 5.72304 3.36066C5.85389 3.49574 5.98897 3.63081 6.12405 3.77011L7.27642 4.92248C7.72386 5.36992 7.72386 5.78359 7.27642 6.23103C7.154 6.35345 7.03581 6.47586 6.9134 6.59405C6.55882 6.95707 6.22113 7.29476 5.85389 7.62401C5.84545 7.63245 5.83701 7.63667 5.83279 7.64511C5.46977 8.00813 5.53731 8.36271 5.61329 8.60331C5.61751 8.61598 5.62173 8.62864 5.62595 8.6413C5.92565 9.36734 6.34777 10.0512 6.98938 10.8658L6.9936 10.8701C8.15864 12.3052 9.38699 13.4239 10.742 14.2807C10.915 14.3905 11.0923 14.4791 11.2612 14.5636C11.4131 14.6395 11.5566 14.7113 11.6791 14.7873C11.6959 14.7957 11.7128 14.8084 11.7297 14.8168C11.8732 14.8886 12.0083 14.9224 12.1476 14.9224C12.498 14.9224 12.7175 14.7029 12.7892 14.6311L14.2329 13.1875C14.3764 13.0439 14.6043 12.8709 14.8702 12.8709C15.132 12.8709 15.3472 13.0355 15.4781 13.179C15.4823 13.1832 15.4823 13.1832 15.4865 13.1875L17.8124 15.5133C18.2472 15.9439 18.2472 16.3871 17.8166 16.8345Z"
                                            fill="#FAA61A" />
                                        <path
                                            d="M11.307 4.7574C12.4129 4.94313 13.4175 5.46656 14.2195 6.26857C15.0216 7.07059 15.5408 8.07522 15.7307 9.18116C15.7771 9.45975 16.0177 9.65392 16.2921 9.65392C16.3259 9.65392 16.3554 9.6497 16.3892 9.64548C16.7016 9.59483 16.9084 9.29935 16.8577 8.98698C16.6298 7.64888 15.9966 6.42897 15.03 5.46233C14.0634 4.49569 12.8434 3.86252 11.5053 3.63458C11.193 3.58393 10.9017 3.79076 10.8468 4.09891C10.792 4.40705 10.9946 4.70675 11.307 4.7574Z"
                                            fill="#FAA61A" />
                                        <path
                                            d="M20.4756 8.82242C20.1 6.61899 19.0616 4.61395 17.466 3.01836C15.8704 1.42277 13.8653 0.384369 11.6619 0.00868772C11.3538 -0.0461871 11.0625 0.16487 11.0076 0.473013C10.957 0.785377 11.1638 1.07664 11.4762 1.13151C13.4432 1.46498 15.2372 2.39785 16.6639 3.82037C18.0907 5.24712 19.0193 7.0411 19.3528 9.00815C19.3992 9.28675 19.6398 9.48092 19.9142 9.48092C19.948 9.48092 19.9775 9.4767 20.0113 9.47248C20.3195 9.42604 20.5305 9.13056 20.4756 8.82242Z"
                                            fill="#FAA61A" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1091_3279">
                                            <rect width="20" height="20" fill="white"
                                                transform="translate(0.5)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                Enquire us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light py-60 similar-packages similar-flight ">
        <div class="container">
            <div class="row">
                <div class="mb-40 col-lg-8">
                    <h5>Other Similar Packages</h5>
                    <p>Family hiking and trekking vacations in Nepal can be customised to meet your needs, and we are
                        delighted
                        to take client suggestions into consideration.</p>
                </div>
                <div class="similar-packages-carousel owl-carousel owl-theme">
                    {{-- {{ dd($similar_packages) }} --}}
                    @foreach ($similar_packages as $s)
                        {{-- {{ dd($s) }} --}}
                        <div class="item">
                            <div class="package-card-wrapper">
                                {{-- <a href="{{ route('flights-detail', $s->slug) }}" class="package-card"> --}}
                                <a href="{{ route('flight.detail', $s->slug) }}" class="package-card">

                                    <div class="img-div">
                                        <img src="{{ asset('ruploads/' . $s->getCoverImage()) . pages_parallax() }}?w=416&h=300&fit=crop"
                                            alt="{{ $s->slug }}">
                                    </div>
                                    <div class="text-content">
                                        <h6>{{ $s->from }} to {{ $s->to }}</h6>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="price">Starting from <span>AUD {{ $s->starting_price }}</span></div>
                                            <button class="btn btn-custom btn-custom2 btn-primary">Book Now</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    {{-- <section class="query-banner mt-80 bg-primary">
        <div class="container" style="background-color: #2D71BC">
            <div class="row">
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
            </div>
        </div>
    </section> --}}


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
                                                        <option value="KTM">{{ $flight->from }}</option>

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
                                                        {{-- <option value="KTM">Kathmandu</option> --}}
                                                        <option value="KTM">{{ $flight->to }}</option>

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
                                                                value="" name="passengers[infants]" id="inumber">
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
            $('.departure-date').click(function(e) {
                e.preventDefault();
                var departureDate = $(this).attr('departure-date');
                $('#departure').val(departureDate);

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
