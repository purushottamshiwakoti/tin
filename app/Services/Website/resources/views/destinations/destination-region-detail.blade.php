@extends('website::layouts.master')
@section('content')
    {{-- <div class="container-fluid page-jumbo all-jumbo regionjumbo">
        <div class="row">
            <img src="{{ asset('ruploads/' . $region->getCoverImage()) . pages_parallax() }}" class="jumbo-img"
                alt=""banner image">
            <div class="overlay"></div>
            <div class="jumbo-txt">
                <h1>{{ ucfirst($region->title) }}</h1>
                <hr>

            </div>
        </div>
    </div> --}}
    <section class="mt-80 breadcrumb-section with-text bg-white bg-img">
        <img src="{{ asset('ruploads/' . $region->getCoverImage()) . pages_parallax() }}" class="jumbo-img"
            alt="{{ $region->getCoverImage() }}">
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
                                <li class="breadcrumb-item active" style="text-transform: capitalize">
                                    <a href="{{ url('/destinations') }}">
                                        Destinations
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" style="text-transform: capitalize">
                                    <a href="{{ url('/destinations/' . $country) }}">
                                        Nepal
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" style="text-transform: capitalize">
                                    <a href="{{ url('/destinations/' . $country . '/' . $activity) }}">
                                        Trekking
                                    </a>
                                </li>

                                <li class="breadcrumb-item active" aria-current="page">{{ $region->title }}</li>
                            </ol>
                        </nav>
                        <div class="text-content">
                            <h2 class="font-64">{{ $region->title }}</h2>
                            <span class="fst-italic">{{ $region->title }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <div class="container-fluid paddingtb text-center">
        <div class="container">
            <div class="row">
                <div class="activity-desc">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <h3>{{ $region->caption }}</h3>
                        {!! html_entity_decode($region->description) !!}
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="container-fluid paddingb packages">
        <div class="container">
            <div class="row">

                <div class="packages-thumb-wrap">
                    @include('website::partials.trips', ['data' => $region->trips])
                </div>
            </div>
        </div>
    </div> --}}

    <section class="blogs-wrapper regions-wrapper py-60">
        <div class="container">
            <div class="row">
                <div class="col-md-9 content-wrapper ">
                    <div class="text-content">
                        {!! $region->description !!}
                        <div class="region-available">
                            <h3>{{ $region->title }} Packages</h3>
                            <p>Family hiking and trekking vacations in Nepal can be customised to meet your needs, and we
                                are delighted to take client suggestions into consideration.</p>
                            <div class="regions-package-list">
                                <div class="container p-0">
                                    <div class="row">
                                        {{-- @dd($region) --}}
                                        @foreach ($region->trips as $t)
                                            <div class="col-md-6 mb-4 package-card-wrapper">
                                                <a href="{{ url($t->slug) }}" class="package-card">
                                                    <div class="img-div">
                                                        @if (count($t->gallery) > 0)
                                                            @foreach ($t->gallery as $g)
                                                                <div class="img-div">
                                                                    <img src="{{ asset('ruploads/' . $g->media->file_name) }}"
                                                                        alt="{{ $g->media->file_name }}">
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <img src="{{ asset('website/assets/img/welcome2.jpg') }}"
                                                                alt="Welcome">
                                                        @endif
                                                    </div>
                                                    <div class="text-content">
                                                        <h6>{{ $t->title }}</h6>
                                                        <div class="info d-flex align-items-center">
                                                            <div class="rating-wrapper me-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-star" width="16"
                                                                    height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="#FAA61A" fill="#FAA61A" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                    </path>
                                                                    <path
                                                                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                                                    </path>
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-star" width="16"
                                                                    height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="#FAA61A" fill="#FAA61A" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                    </path>
                                                                    <path
                                                                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                                                    </path>
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-star" width="16"
                                                                    height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="#FAA61A" fill="#FAA61A" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                    </path>
                                                                    <path
                                                                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                                                    </path>
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-star" width="16"
                                                                    height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="#FAA61A" fill="#FAA61A"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none">
                                                                    </path>
                                                                    <path
                                                                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-clock"
                                                                    width="16" height="16" viewBox="0 0 24 24"
                                                                    stroke-width="1.5" stroke="#2c3e50" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none">
                                                                    </path>
                                                                    <circle cx="12" cy="12" r="9">
                                                                    </circle>
                                                                    <polyline points="12 7 12 12 15 15"></polyline>
                                                                </svg>
                                                                <span class="ml-1">{{ $t->duration }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="price">Starting from
                                                                <span>${{ $t->price }}</span>
                                                            </div>
                                                            <svg width="20" height="20" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_236_1631)">
                                                                    <path
                                                                        d="M16.2501 11.31L10.0001 17.5L3.75009 11.31M3.75009 11.31C3.33784 10.9088 3.01312 10.4267 2.79638 9.89387C2.57963 9.36105 2.47556 8.78913 2.4907 8.21412C2.50585 7.6391 2.63989 7.07345 2.88439 6.55279C3.12888 6.03212 3.47853 5.56772 3.91133 5.18882C4.34412 4.80993 4.85068 4.52475 5.3991 4.35124C5.94752 4.17773 6.52593 4.11966 7.09789 4.18067C7.66986 4.24169 8.223 4.42047 8.72248 4.70576C9.22196 4.99105 9.65696 5.37667 10.0001 5.83834C10.3447 5.38002 10.7802 4.99777 11.2793 4.71551C11.7785 4.43325 12.3305 4.25705 12.9009 4.19794C13.4712 4.13883 14.0477 4.19809 14.5941 4.372C15.1405 4.54591 15.6451 4.83073 16.0764 5.20864C16.5077 5.58655 16.8563 6.04941 17.1004 6.56825C17.3446 7.08709 17.479 7.65074 17.4953 8.22393C17.5117 8.79712 17.4095 9.3675 17.1952 9.89938C16.9809 10.4313 16.6592 10.9132 16.2501 11.315"
                                                                        stroke="black" stroke-opacity="0.1"
                                                                        stroke-width="1.5" stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_236_1631">
                                                                        <rect width="20" height="20"
                                                                            fill="white">
                                                                        </rect>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>

                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach

                                    </div>

                                </div>
                                {{-- <img src="{{ asset('website/assets/img/blog-detail1.webp') }}" alt="image">

                                <p>
                                    Taking in Kathmandu, Pokhara, Chitwan, Poon Hill and more, this 13 day package has all
                                    the
                                    makings of a life-changing adventure. Explore the historic city of Kathmandu on tour,
                                    taking in
                                    impressive sights such as Patan Durbar Square and Swayambhunath Stupa, and admire the
                                    changing
                                    landscape on a tourist bus to Pokhara. From here, journey to Nayapul and begin a five
                                    day trek
                                    through the stunning Himalayan foothills. Pass through small villages and settlements,
                                    admiring
                                    colourful rhododendron forests and snow-capped peaks, witness a dazzling sunrise over
                                    the
                                    mountains from Poon Hill, and see elephants bathing in Chitwan. Includes return
                                    international
                                    flights, 11 nights accommodation, 27 meals, professional mountain guides, porters,
                                    national park
                                    fees and more. If you’ve ever longed to experience the unique wonders of Nepal, this is
                                    an
                                    adventure you do not want to miss!
                                </p>
                                <div class="d-flex justify-content-between">

                                </div>
                                <p>
                                    When it comes to Nepal, there’s no doubt the best way to see it is via rugged trails,
                                    trekked on
                                    your own two feet. An intriguing nation of snowy mountain peaks, remote monasteries,
                                    colourful
                                    communities and jungle wildlife. When you spend time with the locals, hiking through
                                    spectacular
                                    villages and rugged mountain passes, you soon begin to uncover the extraordinary in the
                                    everyday.
                                </p> --}}
                                {!! $region->description1 !!}
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">

                        </div>

                    </div>
                    <div class="faq pb-80">
                        <div class="container p-0">
                            <div class="row">
                                <div class="col-12 section-heading mb-40">
                                    <h2>Frequently Asked Questions (FAQ's)</h2>
                                    <p>Travel Adventure Nepal is an independent and responsible Australian based Tour
                                        operator specializing trekking and tour programs to the famous destinations of
                                        Nepal. </p>
                                </div>
                            </div>
                            <div class="accordion row accordion-flush" id="faq-accordion">
                                @foreach ($faqs as $i => $f)
                                    <div class="col-12 mb-4 accordion-wrapper">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading{{ $i }}">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse{{ $i }}" aria-expanded="false"
                                                    aria-controls="collapse{{ $i }}">
                                                    {{ $f->question }}
                                                </button>
                                            </h2>
                                            <div id="collapse{{ $i }}" class="accordion-collapse collapse"
                                                aria-labelledby="heading{{ $i }}"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    {!! $f->answer !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 blog-sidebar">
                    <div class="side-container mb-4">
                        <p>Quick Links</p>
                        <ul>
                            @foreach ($region->trips as $a)
                                <li>
                                    <a href="{{ url($a->slug) }}">

                                        {{ $a->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- @include('website::partials.help-me') --}}
@stop
@section('js')
    {{--    <script src="{{ public_asset('website/js/parallax.min.js') }}"></script> --}}
@stop
