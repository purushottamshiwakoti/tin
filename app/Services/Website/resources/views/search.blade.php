@extends('website::layouts.master')

@section('content')

    <section class="breadcrumb-section with-text bg-white">
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
                            <li class="breadcrumb-item active" aria-current="page">Search</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-40 section-heading columned">
                    <div class="row">
                        <div class="col-md-8">
                            <h1>Search Keyword</h1>
                            <p>Our blog where we write much about our opinion and express ourself above everything.</p>
                        </div>
                        <div class="col-md-4 sort-by">
                            Sort By: <select class="select">
                                <option value="">Best Matches</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 filter-wrapper">
                    <div class="filter-content">
                        <div class="text-tertiary font-18 fw-600 mb-3">Filters</div>
                        <form class="">
                            <div class="form-group mb-4">
                                <label for="">Search</label>
                                <input type="text" name="query" class="form-control" placeholder="Enter the keyword"
                                    value="@if (request()->get('query') && !empty(request()->get('query'))) {{ request()->get('query') }} @endif">
                            </div>

                            <div class="wrapper mb-4">
                                <div class="form-group">
                                    <label for="">Activities</label>
                                    <div class="form-check form-group mb-2">
                                        <input class="form-check-input me-2" type="checkbox" value=""
                                            id="flexCheckChecked">
                                        <label class="form-check-label mb-0" for="flexCheckChecked">
                                            Trekking in Nepal
                                        </label>
                                    </div>
                                    <div class="form-check form-group mb-2">
                                        <input class="form-check-input me-2" type="checkbox" value=""
                                            id="flexCheckChecked1">
                                        <label class="form-check-label mb-0" for="flexCheckChecked1">
                                            Nepal Tours
                                        </label>
                                    </div>
                                    <div class="form-check form-group mb-2">
                                        <input class="form-check-input me-2" type="checkbox" value=""
                                            id="flexCheckChecked2">
                                        <label class="form-check-label mb-0" for="flexCheckChecked2">
                                            Day Tours in Nepal
                                        </label>
                                    </div>
                                    <div class="form-check form-group mb-2">
                                        <input class="form-check-input me-2" type="checkbox" value=""
                                            id="flexCheckChecked3">
                                        <label class="form-check-label mb-0" for="flexCheckChecked3">
                                            Short Break Holidays
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-container filter-item price range-slider mb-4">
                                <div class="heading mb-3">
                                    <span class="fw-500">Price</span>
                                </div>
                                <div class="content ">
                                    <div id="slider-range"></div>
                                    <div class="min-max-wrapper">
                                        <div class="min caption">
                                            <label for="">Min</label>
                                            <span id="slider-range-value1" type="number" value="0"></span>
                                        </div>
                                        <div class="min">
                                            <label for="">Max</label>
                                            <span id="slider-range-value2" type="number" value="0"></span>
                                        </div>
                                    </div>
                                    <input type="hidden" name="min-value" value="">
                                    <input type="hidden" name="max-value" value="">
                                </div>
                            </div>
                            <div class="filter-container filter-item duration price range-slider mb-4">
                                <div class="heading mb-3">
                                    <span class="fw-500">Duration</span>
                                </div>
                                <div class="content ">
                                    <div id="slider-duration"></div>
                                    <div class="min-max-wrapper">
                                        <div class="min caption">
                                            <label for="">Min</label>
                                            <span id="slider-duration-value1" type="number" value="0"></span>
                                        </div>
                                        <div class="min">
                                            <label for="">Max</label>
                                            <span id="slider-duration-value2" type="number" value="0"></span>
                                        </div>
                                    </div>
                                    <input type="hidden" name="min-value-duration" value="">
                                    <input type="hidden" name="max-value-duration" value="">

                                </div>
                            </div>
                            <button type="submit" class="btn btn-custom btn-primary w-100">Submit</button>
                        </form>
                        <div id="resetSearchFilter" class="text-center d-block mt-3 text-danger cursor-pointer">Clear all
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 search-results mt-5 mt-lg-0">
                    <div class="row">

                        @if (!empty(request()->get('query')))
                            <div class="col-12 tags-section">
                                <h6>Applied Filters</h6>
                                <div class="tags-wrapper">

                                    <div class="item">
                                        {{ request()->get('query') }}
                                        <div class="close">
                                            <svg width="12" height="13" viewBox="0 0 12 13" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.18031 9.68001L2.82031 3.32001" stroke="#2D71BC"
                                                    stroke-linecap="round" stroke-linejoin="bevel" />
                                                <path d="M9.18031 3.32001L2.82031 9.68001" stroke="#2D71BC"
                                                    stroke-linecap="round" stroke-linejoin="bevel" />
                                            </svg>
                                        </div>
                                    </div>



                                </div>


                            </div>
                        @endif

                        @if (count($trips) > 0)

                            @foreach ($trips as $trip)
                                <div class="col-md-6 mb-4 package-card-wrapper">
                                    <a href="{{ route('website.trips.detail', $trip->slug) }}" class="package-card">
                                        <div class="img-div">
                                            <img src="{{ asset('ruploads/' . $trip->getFirstImage()) . pages_parallax() }}"
                                                alt="{{ $trip->slug }}">

                                        </div>
                                        <div class="text-content">
                                            <h6> {{ $trip->title }}</h6>
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
                                                    <span class="ml-1">{{ $trip->duration }} Days</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div class="price">Starting from <span>${{ $trip->price }} </span></div>
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                        @else
                            <div class="col-md-12 col-sm-12 package-item float-left trips text-center">
                                <h3>No Result Founddddd</h3>
                                {{-- <a href="https://s9.gifyu.com/images/no_result.gif"></a> --}}
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('website::partials.things-know', ['nepalPosts' => $nepalPostsTour])



@endsection
@section('js')



@stop
