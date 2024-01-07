@extends('website::layouts.master')
@section('content')
    @include('website::user.breadcrumb-section')

    <section class="dashboard-content pt-40 pb-80 bg-light">
        <div class="container">
            <div class="row">
                @include('website::user.layouts.sidebar')
                <div class="col-md-9 content profile">
                    <form action="" class="form-wrapper">
                        <div class="shadow-box">
                            <h4>Wishlist</h4>
                            <div class="row">

                                @forelse ($wishlist as $wish)
                                    @php
                                        $trip = $wish->trip;
                                    @endphp

                                    <div class="col-md-6 mb-4 package-card-wrapper">
                                        <div class="package-card">
                                            <div class="img-div">
                                                <a href="{{ route('website.trips.detail', ['trip' => $trip->slug]) }}"><img
                                                        data-src="{{ asset('ruploads/' . $trip->getFirstImage()) }}?w=360&h=404&fit=crop"
                                                        src="{{ asset('ruploads/' . $trip->getFirstImage()) }}?w=360&h=404&fit=crop"
                                                        class="lazy" alt=""> </a>
                                            </div>
                                            <div class="text-content">
                                                <a href="{{ route('website.trips.detail', ['trip' => $trip->slug]) }}">
                                                    <h6>{{ $trip->title }}</h6>
                                                </a>
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
                                                    <div class="price">Starting from
                                                        <span>{{ append_currency($trip->price) }}</span>
                                                    </div>
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="red"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        {{-- <g clip-path="url(#clip0_236_1631)"> --}}
                                                        <g >
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

                                                {{-- <div
                                                    class="col-md-2 col-sm-12 col-lg-2 col-xs-12 nopadding viewtrip text-center">
                                                    <a href="{{ route('website.trips.detail', ['trip' => $trip->slug]) }}">View
                                                        Trip</a>
                                                </div> --}}

                                            </div>
                                        </div>
                                    </div>


                                @empty
                                    <p>No items found</p>
                                @endforelse

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
