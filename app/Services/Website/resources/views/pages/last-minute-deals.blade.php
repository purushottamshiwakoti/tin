@extends('website::layouts.master')

@section('content')
    <div class="container-fluid page-jumbo contactjumbo regionjumbo">
        <div class="row">
            <img data-src="{{ asset('ruploads/' . $page->getCoverImage()) . pages_parallax() }}" class="jumbo-img lazy"
                alt="last minute deals cover image">
            <div class="overlay"></div>
        </div>
    </div>
    <div class="container-fluid paddingtb featured categorized lastminute text-center">
        <div class="container">
            <div class="row">
                <div class="backgroundtext text-center">
                    <h2>Date</h2>
                </div>
                <h1>{{ $page->page_title }}</h1>
                <h3>{{ strip_tags($page->caption) }}</h3>
                {!! $page->page_description !!}
            </div>
        </div>
    </div>
    <div class="container-fluid paddingtb bumper text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 mainwrap table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Departure Date</th>
                                <th scope="col">Trip Name</th>
                                <th scope="col">Number Of Days</th>
                                <th scope="col">Starting From (AUD)</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($hotDeals->take(5) as $hotDeal)
                                <tr>
                                    <td>{{ $hotDeal->start_date->format('Y M d') }}</td>
                                    <td>{{ $hotDeal->trip->title }}</td>
                                    <td>{{ $hotDeal->day_duration }}</td>
                                    <td>
                                        <p><del>${{ $hotDeal->price }}</del></p>${{ $hotDeal->lastminutedeal->deal_price }}
                                    </td>
                                    <td><a href="{{ route('website.trips.detail', ['trip' => $hotDeal->trip->slug]) }}">View
                                            Trip</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!--mainwrap-->
            </div>
        </div>
    </div>
@stop
@section('js')
    @yield('javascript')
@stop
