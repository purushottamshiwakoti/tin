@extends('backend::layouts.master')
@php
    $flight_deals = json_decode($flight->flight_deals);
    $faqs = json_decode($flight->faqs);
@endphp
{{-- @dd($faqs) --}}
@section('content')
    <div class="card">
        <div class="mx-2 my-3 d-flex  align-items-center">
            <span class="input-group-text" id="basic-addon1">Flight OverView Description:
            </span>
            <p class="ml-2 fs-3 mt-2"> {{ $flight->overview_description }}</p>
        </div>
        <div class="mx-2 my-3 d-flex  align-items-center">
            <span class="input-group-text" id="basic-addon1">Slug: </span>
            <p class="ml-2 fs-3 mt-2 text-center ">{{ $flight->slug }}</p>
        </div>
        <div class="mx-2 my-3 d-flex  align-items-center">
            <span class="input-group-text" id="basic-addon1">Banner Image: </span>
            <img src="" alt="img">
        </div>
        <div class="mx-2 my-3 d-flex  align-items-center">
            <span class="input-group-text" id="basic-addon1">Book Flight Descripton:
            </span>
            <p class="ml-2 fs-3 text-center mt-2 "> {{ $flight->book_flight_description }}</p>
        </div>
        @foreach ($flight_deals as $i => $f)
            <div>
                <h4 class="ml-2">Flight Detail {{ $i + 1 }}</h4>
            </div>
            <div class="mx-2 my-3 d-flex  align-items-center">
                <div class="card w-25">
                    <div class="d-flex mb-1">
                        <span class="input-group-text mt-2" id="basic-addon1">Airline name:</span>
                        <p class="ml-2 fs-3 text-center mt-2">{{ $f->airline_name }}</p>
                    </div>
                    <div class="mt-2 d-flex">
                        <span class="input-group-text" id="basic-addon1">Flight Date:</span>
                        <p class=" ml-2 mt-2">{{ $f->flight_date }}</p>
                    </div>
                    <div class="mt-2 d-flex">
                        <span class="input-group-text" id="basic-addon1">Duration:</span>
                        <p class="ml-2 mt-2 ">{{ $f->duration }} Hours</p>
                    </div>
                    <div class="mt-2 d-flex">
                        <span class="input-group-text" id="basic-addon1">Transits:</span>
                        <p class="ml-2 mt-2">{{ $f->transits }} Transits</p>
                    </div>
                    <div class="mt-2 d-flex">
                        <span class="input-group-text mb-2" id="basic-addon1">Cost:</span>
                        <p class="ml-2 mt-2">${{ $f->cost }}</p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    @foreach ($faqs as $i => $f)
        <div class="">
            <h4 class="mb-2">Faqs {{ $i + 1 }}</h4>
            <div class="card w-50  ">
                <div class="mt-2 d-flex">
                    <span class="input-group-text ml-3" id="basic-addon1">Question:</span>
                    <p class="ml-2 mt-2">{{ $f->question }}</p>
                </div>
                <div class="mt-2 mb-2 d-flex">
                    <span class="input-group-text ml-3" id="basic-addon1">Answer:</span>
                    <p class="ml-2 mt-2">{{ $f->answer }}</p>
                </div>
            </div>
        </div>
    @endforeach

    <div>
        <div class="mb-1 d-flex">
            <span class="input-group-text" id="basic-addon1">Category:</span>
            <p class="ml-3 mt-2">{{ $flight->category }}</p>

        </div>
    </div>
    <div>
        <div class="mb-1 d-flex">
            <span class="input-group-text" id="basic-addon1">Publish: </span>
            <p class="ml-3 mt-2">{{ $flight->publish }}</p>
        </div>
    </div>
@endsection
