@extends('website::layouts.master')
@section('content')
    <section class="mt-80 breadcrumb-section with-text bg-white bg-img">
        <img src="{{ asset('website/assets/img/breadcrumb-banner-2.jpg') }}" alt="">
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
                                <li class="breadcrumb-item active" aria-current="page">Activities</li>
                            </ol>
                        </nav>
                        <div class="text-content">
                            <h2 class="font-64">Activities</h2>
                            <span class="fst-italic">Activities</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blogs-wrapper activities-wrapper py-60">
        <div class="container">
            <div class="row">
                <div class="col-md-9 content-wrapper ">
                    <div class="text-content">
                        <p>
                            When it comes to Nepal, there’s no doubt the best way to see it is via rugged trails, trekked on
                            your own two feet. An intriguing nation of snowy mountain peaks, remote monasteries, colourful
                            communities and jungle wildlife. When you spend time with the locals, hiking through spectacular
                            villages and rugged mountain passes, you soon begin to uncover the extraordinary in the
                            everyday.
                        </p>
                        <div class="region-available">
                            <h3>Trekking Regions</h3>
                            <p>Family hiking and trekking vacations in Nepal can be customised to meet your needs, and we
                                are delighted to take client suggestions into consideration.</p>
                            <div class="regions-carousel owl-carousel owl-theme">
                                @foreach ($activity as $a)
                                    <div class="item">
                                        <a href="{{ url('/activities/' . $a->slug) }}" class="regions-card-wrapper">
                                            <div class="image-wrapper">
                                                {{-- <img src="{{ asset('website/assets/img/everest.png') }}" alt=""> --}}

                                                <div class="img-div">
                                                    <img src="{{ asset('ruploads/' . $a->getCoverImage()) . pages_parallax() }}"
                                                        alt="{{ $a->getCoverImage() }}">
                                                </div>


                                            </div>
                                            <div class="title-wrapper">
                                                <h5>{{ $a->title }}</h5>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <img src="{{ asset('website/assets/img/blog-detail1.webp') }}" alt="">
                        <p>
                            Taking in Kathmandu, Pokhara, Chitwan, Poon Hill and more, this 13 day package has all the
                            makings of a life-changing adventure. Explore the historic city of Kathmandu on tour, taking in
                            impressive sights such as Patan Durbar Square and Swayambhunath Stupa, and admire the changing
                            landscape on a tourist bus to Pokhara. From here, journey to Nayapul and begin a five day trek
                            through the stunning Himalayan foothills. Pass through small villages and settlements, admiring
                            colourful rhododendron forests and snow-capped peaks, witness a dazzling sunrise over the
                            mountains from Poon Hill, and see elephants bathing in Chitwan. Includes return international
                            flights, 11 nights accommodation, 27 meals, professional mountain guides, porters, national park
                            fees and more. If you’ve ever longed to experience the unique wonders of Nepal, this is an
                            adventure you do not want to miss!
                        </p>
                        <div class="d-flex justify-content-between">

                        </div>
                        <p>
                            When it comes to Nepal, there’s no doubt the best way to see it is via rugged trails, trekked on
                            your own two feet. An intriguing nation of snowy mountain peaks, remote monasteries, colourful
                            communities and jungle wildlife. When you spend time with the locals, hiking through spectacular
                            villages and rugged mountain passes, you soon begin to uncover the extraordinary in the
                            everyday.
                        </p>
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
                            @foreach ($activity as $a)
                                <li><a href="{{ url($a->slug) }}">
                                        {{ $a->title }}
                                    </a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
