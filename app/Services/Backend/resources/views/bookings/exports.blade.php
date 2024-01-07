<table>
    <thead>
    <tr>
        <th>Booking id</th>
        {{-- <th>Trip Code</th> --}}
        <th>Trip Title</th>
        <th>Total Price</th>
        {{-- <th>Title</th> --}}
        {{-- <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Age</th> --}}
        <th>Name</th>
        <th>Email</th>
        <th>Moblie</th>
        <th>Address</th>
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
    @foreach($bookings as $booking)
        {{-- @foreach($booking->passengers as $key=>$passenger)
        <tr>
            @if($key == 0)
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
                <td>{{ $passenger->address }}</td>
                @php
                    $addOns = collect($booking->add_ons);
                @endphp
                @if($key == 0)
                    <td rowspan="{{ $booking->passenger_count }}">{{ config('constants.accommodation_const.'.$addOns->where('title','accommodation')->pluck('key')->first()) }}</td>
                    <td rowspan="{{ $booking->passenger_count }}">{{ config('constants.flight_const.'.$addOns->where('title','flight')->pluck('key')->first()) }}</td>
                    <td rowspan="{{ $booking->passenger_count }}">{{ config('constants.pick_up_const.'.$addOns->where('title','pick_up')->pluck('key')->first()) }}</td>
                    <td rowspan="{{ $booking->passenger_count }}">{{ config('constants.insurance_const.'.$addOns->where('title','insurance')->pluck('key')->first()) }}</td>
                    <td rowspan="{{ $booking->passenger_count }}">{{ config('constants.extra_night_before_const.'.$addOns->where('title','extra_night_before')->pluck('key')->first()) }}</td>
                    <td rowspan="{{ $booking->passenger_count }}">{{ config('constants.extra_night_after_const.'.$addOns->where('title','extra_night_after')->pluck('key')->first()) }}</td>
                @endif

        </tr>
        @endforeach --}}
        {{-- {{dd($bookings)}} --}}
        <tr>
            <td> {{$booking->id}}</td>
            @if(!empty($booking->trip))
            <td> {{$booking->trip->title}}</td>
            @endif
            @if(!empty($booking->customer))
            <td> {{$booking->customer->full_name}}</td>
            <td> {{$booking->customer->email}}</td>
            <td> {{$booking->customer->mobile_number}}</td>
            <td> {{$booking->customer->address}}</td>
            @endif
        </tr>

    @endforeach
    </tbody>
</table>