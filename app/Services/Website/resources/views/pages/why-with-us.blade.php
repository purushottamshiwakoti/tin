@extends('website::layouts.master')
@section('content')

    <section class="mt-80 breadcrumb-section with-text bg-white bg-img">
        <img src="{{ asset('ruploads/' . $page->getCoverImage()) . pages_parallax() }}" alt="why with us">
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
                            <h6 class="text-white">Why travel with us ?
                                <span>Reasons</span>
                            </h6>
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
                <div class="col-md-9 content-wrapper ">
                    {!! $page->other_description !!}
                </div>
            </div>
        </div>
        </div>
    </section>

@stop

{{-- @section('js')
    <script  src="{{ public_asset('website/js/jaliswall.js?v1') }}" ></script>
    <script>addLoadEvent(function () {
            $('.wall').jaliswall({ item: '.wall-item' });
        })</script>
@stop --}}
