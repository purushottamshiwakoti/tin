@extends('backend::layouts.master')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ public_asset('admin/assets/css/print.css')}}" media="print">
@stop
@section('content')
    <div class="card printing">
        <div class="card-header">
            <div class="col-md-2 col-sm-12 col-lg-2 col2 logo">
                <img src="{{ public_asset('website/assets/img/logo.png') }}">
            </div>
            {{--<h5>{{ ucfirst($name) }} : {{ $dataObject->id }}</h5>--}}
            {{--<a href="{{ route('admin.'.$name.'.index') }}" class="btn waves-effect waves-light btn-info float-right"><i class="fas fa-plus"></i>View All</a>--}}

            {{--@php--}}
                {{--$showEdit = (!(isset($dataObject->settingOptions)) || optional($dataObject->settingOptions)->editable)?true:false;--}}
            {{--@endphp--}}
            {{--@if($dataObject->cancelled_at)--}}
                {{--Cancelled--}}
            {{--@endif--}}
            {{--@if($dataObject->cancel_requested_at && !$dataObject->cancelled_at)--}}
                {{--<a style="margin-right: 4px" href="{{ route('admin.'.$name.'.cancel',$dataObject->id) }}" class="btn waves-effect waves-light btn-warning float-right"><i class="fas fa-crosshairs"></i>Approve Cancellation</a>--}}
            {{--@endif--}}
            {{--@if($showEdit)--}}
                {{--<a style="margin-right: 4px" href="{{ route('admin.'.$name.'.edit',$dataObject->id) }}" class="btn waves-effect waves-light btn-warning float-right"><i class="fas fa-edit"></i>Edit</a>--}}
            {{--@endif--}}
            <div class="col-md-3 col-sm-12 col-lg-5 col5">
                <p>{{ setting('extras.company_name') }}</p>
                <p>Trip Code: {{ $dataObject->trip_code }}</p>
                <p>Trip Name: {{ $dataObject->trip_name }}</p>
                <p>Total Passengers: {{ $dataObject->passenger_count }}</p>
                <p>Special Request: {{ $dataObject->special_request }}</p>
                <p>Booking Status: {{ $dataObject->status }}</p>
                <p>Start Date: {{ $dataObject->start_date->format('d M Y') }}</p>
                <p>Finish Date: {{ optional($dataObject->finish_date)->format('d M Y') }}</p>
                <p>Total Cost: {{ $dataObject->total_price }}</p>
            </div>
            <div class="col-md3 col-sm-12 col-lg-5 col5">
                @php
                    $addOns = $dataObject->addOns;
                @endphp

<p>Room Type: {{ config('constants.accommodation_const.'.$addOns->where('title','accommodation')->pluck('key')->first()) }}</p>
<p>Flight: {{ config('constants.flight_const.'.$addOns->where('title','flight')->pluck('key')->first()) }}</p>
<p>Airport pickup: {{ config('constants.pick_up_const.'.$addOns->where('title','pick_up')->pluck('key')->first()) }}</p>
<p>Insurance: {{ config('constants.insurance_const.'.$addOns->where('title','insurance')->pluck('key')->first()) }}</p>
<p>Extra night before: {{ config('constants.extra_night_before_const.'.$addOns->where('title','extra_night_before')->pluck('key')->first()) }}</p>
<p>Extra night after: {{ config('constants.extra_night_after_const.'.$addOns->where('title','extra_night_after')->pluck('key')->first()) }}</p>
                {{-- <p>Room Type: {{ config('constants.accommodation_const.'.$addOns->where('title','accommodation')->pluck('key')->first()) }}</p>
                <p>Flight: {{ config('constants.flight_const.'.$addOns->where('title','flight')->pluck('key')->first()) }}</p>
                <p>Airport pickup: {{ config('constants.pick_up_const.'.$addOns->where('title','pick_up')->pluck('key')->first()) }}</p>
                <p>Insurance: {{ config('constants.insurance_const.'.$addOns->where('title','insurance')->pluck('key')->first()) }}</p>
                <p>Extra night before: {{ config('constants.extra_night_before_const.'.$addOns->where('title','extra_night_before')->pluck('key')->first()) }}</p>
                <p>Extra night after: {{ config('constants.extra_night_after_const.'.$addOns->where('title','extra_night_after')->pluck('key')->first()) }}</p> --}}
{{--                <p>Female: {{ $dataObject->passengers->where('gender','female')->count() }}</p>--}}
{{--                <p>Male: {{ $dataObject->passengers->where('gender','male')->count() }}</p>--}}
{{--                @php--}}
{{--                $other = $dataObject->passengers->where('gender','other')->count();--}}
{{--                @endphp--}}
{{--                @if($other)--}}
{{--                <p>Other: {{ $other }}</p>--}}
{{--                    @endif--}}
            </div>


            <div class="card-header-right">
                <ul class="list-unstyled card-option">

                    {{--<li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>--}}
                    <li onclick="myPrint()"><i class="feather icon-printer"></i></li>
                    <li><i class="feather icon-maximize full-card"></i></li>
                    <li><i class="feather icon-minus minimize-card"></i></li>
                    <li><i class="feather icon-refresh-cw reload-card"></i></li>
                    <li><i class="feather icon-trash close-card"></i></li>
                    <li><i class="feather icon-chevron-left open-card-option"></i></li>
                </ul>
            </div>

        </div>
        <div class="card-block table-border-style">
            {{-- <h2>Passengers</h2> --}}
            <h2>Booked by</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        {{-- <th>Title</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Date Of Birth</th> --}}
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Address</th>

                    </tr>
                    </thead>
                    <tbody>
{{--                    <tr>--}}
{{--                        <td scope="row">{{ $dataObject->id }} LEAD</td>--}}
{{--                        <td>{{ $dataObject->customer->title }}</td>--}}
{{--                        <td>{{ $dataObject->customer->first_name }}</td>--}}
{{--                        <td>{{ $dataObject->customer->middle_name }}</td>--}}
{{--                        <td>{{ $dataObject->customer->last_name }}</td>--}}
{{--                        <td>{{ $dataObject->customer->gender }}</td>--}}
{{--                        <td>{{ $dataObject->customer->age }}</td>--}}
{{--                        <td>{{ $dataObject->customer->email }}</td>--}}

{{--                    </tr>--}}
{{-- {{dd( $dataObject->customer)}} --}}
                    @php
                    $passengers = $dataObject->customer
                    @endphp
                    {{-- @foreach($passengers as $passenger)
                    <tr>

                        <td scope="row">{{ $passenger->id }}</td>
                        <td>{{ $passenger->title }}</td>
                        <td>{{ $passenger->first_name }}</td>
                        <td>{{ $passenger->middle_name }}</td>
                        <td>{{ $passenger->last_name }}</td>
                        <td>{{ $passenger->gender }}</td>
                        <td>{{ optional(\Carbon\Carbon::parse($passenger->date_of_birth))->format('d M Y') }}</td>
                        <td>{{ $passenger->email }}</td>
                        <td>{{ $passenger->mobile_number }}</td>
                        <td>{{ $passenger->address }}</td>

                    </tr>
                        @endforeach --}}

                       <td scope="row">{{ $dataObject->id }} </td>
                       <td>{{ $dataObject->customer->first_name }}</td>
                  
                       <td>{{ $dataObject->customer->email }}</td>
                       <td>{{ $dataObject->customer->mobile_number}}</td>
                       <td>{{ $dataObject->customer->address}}</td>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-block table-border-style">
            <h2>Passengers</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Date Of Birth</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Address</th>

                    </tr>
                    </thead>
                    <tbody>
{{--                    <tr>--}}
{{--                        <td scope="row">{{ $dataObject->id }} LEAD</td>--}}
{{--                        <td>{{ $dataObject->customer->title }}</td>--}}
{{--                        <td>{{ $dataObject->customer->first_name }}</td>--}}
{{--                        <td>{{ $dataObject->customer->middle_name }}</td>--}}
{{--                        <td>{{ $dataObject->customer->last_name }}</td>--}}
{{--                        <td>{{ $dataObject->customer->gender }}</td>--}}
{{--                        <td>{{ $dataObject->customer->age }}</td>--}}
{{--                        <td>{{ $dataObject->customer->email }}</td>--}}

{{--                    </tr>--}}

                    @php
                    $passengers = $dataObject->passengers
                    @endphp
                    @foreach($passengers as $passenger)
                    <tr>

                        <td scope="row">{{ $passenger->id }}</td>
                        <td>{{ $passenger->title }}</td>
                        <td>{{ $passenger->first_name }}</td>
                        <td>{{ $passenger->middle_name }}</td>
                        <td>{{ $passenger->last_name }}</td>
                        <td>{{ $passenger->gender }}</td>
                        <td>{{ optional(\Carbon\Carbon::parse($passenger->date_of_birth))->format('d M Y') }}</td>
                        <td>{{ $passenger->email }}</td>
                        <td>{{ $passenger->mobile_number }}</td>
                        <td>{{ $passenger->address }}</td>

                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <div class="card-block table-border-style">
            @if(!$dataObject->has_active_passengers)
                CANCELLED
            @endif
            @if($dataObject->onlyCancelRequestedPassengers->count())
            <h2>Cancel Requests</h2>
            <a href="{{ route('admin.bookings.cancel',['booking'=>$dataObject->id,'ids'=>$dataObject->cancelRequestedPassengers->pluck('id')]) }}"><button class="btn btn-mat waves-effect waves-light btn-success">Approve</button></a>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dataObject->onlyCancelRequestedPassengers as $passenger)
                    <tr>
                        <td scope="row">{{ $passenger->id }}</td>
                        <td>{{ $passenger->name }}</td>
                        <td>{{ $passenger->email }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <h2>Remarks</h2>
            @foreach($dataObject->cancelRequests as $cancelRequest)
                <p>{{ $cancelRequest->value }}</p><hr>
            @endforeach
                @endif
        </div>
    </div>
@stop
@section('javascript')
    <script >
        function myPrint(){
            window.print();
        }
    </script>
@stop
