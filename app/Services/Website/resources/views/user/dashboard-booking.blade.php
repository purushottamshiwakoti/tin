@extends('website::layouts.master')
@section('content')

@include('website::user.breadcrumb-section')

<section class="dashboard-content pt-40 pb-80 bg-light">
    <div class="container">
        <div class="row">
            @include('website::user.layouts.sidebar')
            <div class="col-md-9 content profile">
                {{-- <div class="content-box shadow-box">
                    <h4>My Bookings</h4>
                    <table>
                        <thead>
                            <th>S.N</th>
                            <th>Tour</th>
                            <th>passenger</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($bookingList as $b) 
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$b->trip_name}}</td>
                                <td>{{$b->passenger_count}}</td>
                                <td class="fw-bold">{{$b->price}}</td>
                                <td>{{$b->status}}</td>
                                <td class="action">
                                    <a href="#"><svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_205_2310)">
                                                <path d="M8.5013 9.83341C9.23768 9.83341 9.83464 9.23646 9.83464 8.50008C9.83464 7.7637 9.23768 7.16675 8.5013 7.16675C7.76492 7.16675 7.16797 7.7637 7.16797 8.50008C7.16797 9.23646 7.76492 9.83341 8.5013 9.83341Z" stroke="#0D8A0B" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M15.1654 8.49992C13.3874 11.6113 11.1654 13.1666 8.4987 13.1666C5.83203 13.1666 3.61003 11.6113 1.83203 8.49992C3.61003 5.38859 5.83203 3.83325 8.4987 3.83325C11.1654 3.83325 13.3874 5.38859 15.1654 8.49992Z" stroke="#0D8A0B" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_205_2310">
                                                    <rect width="16" height="16" fill="white" transform="translate(0.5 0.5)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        </br>
                                        View</a>
                                    <a href="#"><svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_205_2317)">
                                                <path d="M8.5 14.5C11.8137 14.5 14.5 11.8137 14.5 8.5C14.5 5.18629 11.8137 2.5 8.5 2.5C5.18629 2.5 2.5 5.18629 2.5 8.5C2.5 11.8137 5.18629 14.5 8.5 14.5Z" stroke="#FF3B53" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M6.5 8.5H10.5" stroke="#FF3B53" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_205_2317">
                                                    <rect width="16" height="16" fill="white" transform="translate(0.5 0.5)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        </br>Cancel</a>
                                </td>
                            </tr>
                            @endforeach                           
                        </tbody>
                    </table>
                </div> --}}

                @foreach($bookingList as $b) 
                @php
                $addOns = $b->addOns;
                @endphp
                <div class="content-box shadow-box booking-content-wrapper mb-4">
                    <h4>Booked on : {{ $b->created_at->format('d/m/Y') }}</h4>
                    <div class="row booking-content-info">
                        <div class="col-md-3 item-wrapper">
                            <span>Trip Name</span>
                            <p>{{ $b->trip_name }}</p>
                        </div>
                        <div class="col-md-3 item-wrapper">
                            <span>Departure Date</span>
                            <p>{{ $b->start_date->format('d/m/Y') }}</p>
                        </div>
                        <div class="col-md-3 item-wrapper">
                            <span>Return Date</span>
                            <p>{{ $b->finish_date->format('d/m/Y') }}</p>
                        </div>
                        <div class="col-md-3 item-wrapper">
                            <span>Pax count</span>
                            <p>{{ $b->passenger_count }}</p>
                        </div>
                    </div>
                    <div class="mt-3 booking-content-info more">
                        <div class="row">
                            <div class="col-md-3 item-wrapper">
                                <span>Lead Traveller</span>
                                <p>{{ $b->customer->name }}</p>
                            </div>
                            <div class="col-md-3 item-wrapper">
                                <span>Price</span>
                                <p>{{ $b->total_price }}</p>
                            </div>
                            <div class="col-md-3 item-wrapper">
                                <span>Accomodation</span>
                                <p>{{ addon_value($addOns,'accommodation') }}</p>
                            </div>
                            <div class="col-md-3 item-wrapper">
                                <span>Flights</span>
                                <p>{{ addon_value($addOns,'flight') }}</p>
                            </div>
                            <div class="col-md-3 item-wrapper">
                                <span>Airport Pickup</span>
                                <p>{{ addon_value($addOns,'pick_up') }}</p>
                            </div>
                            <div class="col-md-3 item-wrapper">
                                <span>Insurance</span>
                                <p>{{ addon_value($addOns,'insurance') }}</p>
                            </div>
                            <div class="col-md-3 item-wrapper">
                                <span>Extra Night Before</span>
                                <p>{{ addon_value($addOns,'extra_night_before') }}</p>
                            </div>
                            <div class="col-md-3 item-wrapper">
                                <span>Extra Night After</span>
                                <p>{{ addon_value($addOns,'extra_night_after') }}</p>
                            </div>
                            <div class="col-md-12 item-wrapper">
                                <span>Special Request</span>
                                <p>{{ $b->special_request }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="cancel-booking px-4 mb-4">
                        <table>
                            <thead>
                                <tr>
                                    <th>CheckBox</th>
                                    <th>Full Name</th>
                                    <th>Email Address</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($b->passengers as $passenger)
                                <tr>
                                    <td>@if(!$passenger->cancelled_at)<input type="checkbox" class="passenger_id" data-value="{{ $passenger->id }}" />@endif</td>
                                    <td>{{ $passenger->name }}</td>
                                    <td>{{ $passenger->email }}</td>
                                    <td>{{ $passenger->cancelled_at ? "Cancelled" : "Active" }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="btn-wrapper">
                            <div data-action="{{ route('website.booking.cancel',['booking'=>$b->id]) }}" class="btn btn-secondary text-white btn-custom fw-500" id="proceedModal"><span>Proceed</span></div>
                        </div>
                    </div>
                    <div class="button-wrapper mb-4">
                        <a class="btn btn-custom btn-primary ms-4 booking-show-more"><span>Show More</span></a>
                        <a class="ms-4 btn text-primary btn-transparent btn-custom bordered cancel-booking-btn"><span>Cancel Booking</span></a>
                    </div>
                </div>
            @endforeach

            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade booking-cancellation-modal" id="mycancelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <h2>Booking Cancellation</h2>
                <p>Please specify the reason to cancel this booking. It would be really helpful for us to improve our service in future.</p>
                <form action="" method="post" class="cancel-form">
                    {!! csrf_field() !!}
                    <input type="hidden" id="passenger_ids" name="passenger_ids" value="">
                    <div>
                        <textarea name="customer_remarks" name="" id="" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="note">
                        <b>Note:</b> See our <a href="#">Cancellation Policy</a>
                    </div>
                    <div class="btn-wrapper">
                        <button type="submit" class="btn btn-secondary btn-custom text-white fw-500"><span>Submit</span></button>
                        <div data-bs-dismiss="modal" class="btn ms-3 btn-primary btn-custom text-white fw-500"><span>Cancel</span></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</section>
@endsection


@section('js')
    <script>

        var passenger_ids = [];

        $('.passenger_id').on('click',function(e){
            var pass_id = $(this).data('value');
            if (passenger_ids.indexOf(pass_id) === -1) 
            {
                passenger_ids.push(pass_id);
            } else{
                passenger_ids.splice( $.inArray(pass_id, passenger_ids), 1 );
            }
        });

        $('#proceedModal').on('click',function(e){
            e.preventDefault();
            if(passenger_ids.length === 0)
            {
                alert('You must select passenger to proceed.');
                return false;
            }
            $('.cancel-form').attr('action',$(this).data('action'));
            $('#passenger_ids').val(passenger_ids);
            $('#mycancelModal').modal('show');
        })
    </script>
@endsection