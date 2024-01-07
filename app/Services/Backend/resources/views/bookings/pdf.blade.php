<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            font-size: 13px !important;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead th {
            text-align: left;
        }

        /*table{border: 1px solid #333;}*/
        table thead th,
        table tbody tr td {
            border: 1px solid #f7f7f7;
        }

        .table-responsive {
            border-top: 2px solid #000000;
            clear: both;
        }

        .column {
            float: left;
            width: 33%;
        }

        .row:after {
            /*content: "";*/
            /*clear: both;*/
        }

        p {
            line-height: 0.5em;
        }
    </style>
    {{-- <link rel="stylesheet" type="text/css" href="{{ public_asset('admin/assets/css/style.css')}}"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ public_asset('admin/assets/css/print.css')}}"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ public_asset('admin/bower_components/bootstrap/css/bootstrap.min.css')}}"> --}}
</head>

<body>
    {{-- <button onclick="myPrint()">Print</button> --}}
    {{-- <div id="pcoded" class="pcoded"> --}}
    {{-- <div class="pcoded-container navbar-wrapper"> --}}
    {{-- <div class="pcoded-main-container"> --}}
    {{-- <div class="pcoded-wrapper"> --}}
    {{-- <div class="pcoded-content"> --}}
    {{-- <div class="pcoded-inner-content"> --}}
    {{-- <!-- Main-body start --> --}}
    {{-- <div class="main-body"> --}}
    {{-- <div class="page-wrapper"> --}}
    {{-- <div class="page-body"> --}}
    <div class="container-fluid">
        <div class="">
            <div class="row">
                {{-- <div class="card printing"> --}}
                {{-- <div class="card-header"> --}}
                <div class="column">
                    <img src="{{ public_asset('website/img/logo.png') }}">
                </div>
                <div class="column">
                    {{-- <p>{{ setting('extras.company_name') }}</p> --}}
                    <p>{{ settings()->get('site_name') }}</p>
                    @php
                        $allData = collect($bookings);
                        if (request()->get('from')) {
                            $from = request()->get('from');
                            $to = request()->has('from') ? request()->get('to') : now();
                        } else {
                            $from = $allData->min('created_at');
                            $to = $allData->max('created_at');
                        }
                        $counts = $allData->map(function ($item) {
                            $passengers = collect($item->passengers);
                            $counts = collect();
                            $counts->male = $passengers->where('gender', 'male')->count();
                            $counts->female = $passengers->where('gender', 'female')->count();
                            return $counts;
                        });
                    @endphp
                    {{-- <p>Trip Code: TA-EBC Everest Base Camp</p> --}}
                    <p>Start Date: {{ \Carbon\Carbon::parse($from)->format('Y M d') }}</p>
                    <p>Finish Date: {{ \Carbon\Carbon::parse($to)->format('Y M d') }}</p>
                </div>
                {{-- <div class="column">
                                                    <p>Female: {{ $counts->sum('female') }}</p>
                                                    <p>Male: {{ $counts->sum('male') }}</p>
                                                </div> --}}

            </div>


            {{-- </div> --}}
            <div class="table-responsive" style="">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Booking id</th>
                            {{-- <th>Trip Code</th> --}}
                            <th>Trip title</th>
                            <th>Total Price</th>
                            <th>Name</th>
                            {{-- <th>Title</th> --}}
                            {{-- <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Gender</th>
                                                        <th>Age</th> --}}
                            <th>Email</th>
                            <th>Moblie</th>
                            {{-- <th>Address</th> --}}
                            {{-- <th>Room Type</th>
                                                        <th>Accommodation</th>
                                                        <th>Flight</th>
                                                        <th>Airport pickup</th>
                                                        <th>Insurance</th>
                                                        <th>Extra night before</th>
                                                        <th>Extra night after</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->id }}</td>
                                @if(!empty($booking->trip))

                                <td>{{ $booking->trip->title }}</td>
                                @endif
                                <td>{{ $booking->total_price }}</td>
                                @if (!empty($booking->customer))
                                    <td>{{ $booking->customer->full_name }}</td>
                                    <td>{{ $booking->customer->email }}</td>
                                    <td>{{ $booking->customer->mobile_number }}</td>
                                @endif
                            </tr>
                            {{-- @foreach ($booking->passengers as $key => $passenger)
                                                            <tr>
                                                                @if ($key == 0)
                                                                    <td rowspan="{{ $booking->passenger_count }}">{{ $booking->id }}</td>
                                                                    <td rowspan="{{ $booking->passenger_count }}">{{ optional($booking->departure)->trip_code }}</td>
                                                                    <td rowspan="{{ $booking->passenger_count }}">{{ $booking->total_price }}</td>
                                                                @endif
                                                                <td>{{ $passenger->title }}</td>
                                                                <td>{{ $passenger->first_name }}</td>
                                                                <td>{{ $passenger->last_name }}</td>
                                                                <td>{{ $passenger->gender }}</td>
                                                                @php
                                                                    try{
                                                                        $age = \Carbon\Carbon::parse($passenger->date_of_birth)->diffInYears();
                                                                    }catch (Exception $e)
                                                                    {
                                                                        $age = '-';
                                                                    }

                                                                @endphp
                                                                <td>{{ $age }}</td>
                                                                <td>{{ $passenger->email }}</td>
                                                                <td>{{ $passenger->mobile_number }}</td>
                                                                @php
                                                                    $addOns = collect($booking->add_ons);
                                                                @endphp
                                                                @if ($key == 0)
                                                                    <td rowspan="{{ $booking->passenger_count }}">{{ config('constants.accommodation_const.'.$addOns->where('title','accommodation')->pluck('key')->first()) }}</td>
                                                                    <td rowspan="{{ $booking->passenger_count }}">{{ config('constants.flight_const.'.$addOns->where('title','flight')->pluck('key')->first()) }}</td>
                                                                    <td rowspan="{{ $booking->passenger_count }}">{{ config('constants.pick_up_const.'.$addOns->where('title','pick_up')->pluck('key')->first()) }}</td>
                                                                    <td rowspan="{{ $booking->passenger_count }}">{{ config('constants.insurance_const.'.$addOns->where('title','insurance')->pluck('key')->first()) }}</td>
                                                                    <td rowspan="{{ $booking->passenger_count }}">{{ config('constants.extra_night_before_const.'.$addOns->where('title','extra_night_before')->pluck('key')->first()) }}</td>
                                                                    <td rowspan="{{ $booking->passenger_count }}">{{ config('constants.extra_night_after_const.'.$addOns->where('title','extra_night_after')->pluck('key')->first()) }}</td>
                                                                @endif

                                                            </tr>
                                                        @endforeach --}}
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- </div> --}}
        </div>
    </div>

    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}

</body>

</html>
