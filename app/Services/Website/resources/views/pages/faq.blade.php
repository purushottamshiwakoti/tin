@extends('website::layouts.master')

@section('content')

    <section class="mt-80 breadcrumb-section with-text bg-white bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 breadcrumb-wrapper">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('website.home') }}">
                                    <svg width="14" height="15" viewBox="0 0 14 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_266_1654)">
                                            <path
                                                d="M13.7899 7.73344L7.75241 1.69906L7.34772 1.29438C7.25551 1.20278 7.13082 1.15137 7.00085 1.15137C6.87087 1.15137 6.74618 1.20278 6.65397 1.29438L0.211783 7.73344C0.117301 7.82755 0.0426296 7.93964 -0.00782254 8.06309C-0.0582747 8.18653 -0.0834854 8.31884 -0.0819665 8.45219C-0.0757165 9.00219 0.382096 9.44125 0.932096 9.44125H1.59616V14.5303H12.4055V9.44125H13.0837C13.3508 9.44125 13.6024 9.33656 13.7915 9.1475C13.8846 9.05471 13.9583 8.94437 14.0085 8.82287C14.0586 8.70137 14.0842 8.57113 14.0837 8.43969C14.0837 8.17406 13.979 7.9225 13.7899 7.73344ZM7.87585 13.4053H6.12585V10.2178H7.87585V13.4053ZM11.2805 8.31625V13.4053H8.87585V9.84281C8.87585 9.4975 8.59616 9.21781 8.25085 9.21781H5.75085C5.40553 9.21781 5.12585 9.4975 5.12585 9.84281V13.4053H2.72116V8.31625H1.22116L7.00241 2.53969L7.36335 2.90063L12.7821 8.31625H11.2805Z"
                                                fill="#899098" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_266_1654">
                                                <rect width="14" height="14" fill="white"
                                                    transform="translate(0 0.84375)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{-- <a href="{{ url()->current() }}">Faqs</a> --}}
                                Faqs
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="faq bg-light pb-80">
        <div class="container">
            <div class="row">
                <div class="col-12 section-heading mb-40">
                    <h1>{{ $page->caption }}</h1>
                    <p>
                        {!! $page->page_description !!}</p>
                </div>
            </div>
            <div class="accordion row accordion-flush" id="faq-accordion">
                @foreach ($faqs as $key => $faq)
                    <div class="col-xl-6 mb-4 accordion-wrapper">

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                <button class="accordion-button @if ($key != 0) collapsed @endif"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}"
                                    aria-expanded=" @if ($key == 0) true @else false @endif"
                                    aria-controls="collapse{{ $faq->id }}">
                                    {!! $faq->question !!}
                                </button>
                            </h2>
                            <div id="collapse{{ $faq->id }}"
                                class="accordion-collapse collapse @if ($key == 0) show @else @endif"
                                aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {!! $faq->answer !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@stop
