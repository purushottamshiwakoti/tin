@extends('website::layouts.master')

@section('content')
    @php
        $bookings = $customer->bookings;
        $lastBooking = $bookings->sortByDesc('id')->first();

        $hasBooking = ($lastBooking && $lastBooking->start_date>now())?true:false;
    @endphp
    <div class="container-fluid page-jumbo regionjumbo dashboard-banner">
        <div class="row">
            @if($hasBooking)
            <img data-src="{{ asset('ruploads/'.$lastBooking->trip->getFirstImage()) }}?w=1910&h=315&fit=crop" class="lazy">
            @else
                <img data-src="{{ public_asset('website/img/wishlist.jpg').pages_parallax() }}" class="lazy">
            @endif
        </div>
    </div>

    <div class="container-fluid paddingb packages dashboardbg" id="dashboardList">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding navpills-wrap">
                    <div class="user-dashboard">
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <a class="navbar-brand" href="#">Dashboard</a>
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#dashboard-menu-collapse" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="collapse navbar-collapse" id="dashboard-menu-collapse">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#my-dashboard" aria-controls="my-dashboard" role="tab" data-toggle="tab">
                                    <i class="zmdi zmdi-account"></i>&nbsp;Dashboard
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#myProfile" aria-controls="myProfile" role="tab" data-toggle="tab">
                                    <i class="zmdi zmdi-account"></i>&nbsp;Profile
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#myBooking" aria-controls="myBooking" role="tab" data-toggle="tab">
                                    <i class="zmdi zmdi-book"></i>&nbsp;Booking
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#account-summary" aria-controls="myReview" role="tab" data-toggle="tab">
                                    <i class="zmdi zmdi-file-text"></i>&nbsp;Account Summary
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#myReview" aria-controls="myReview" role="tab" data-toggle="tab">
                                    <i class="zmdi zmdi-star"></i>&nbsp;Reviews
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#wishlist" aria-controls="wishlist" role="tab" data-toggle="tab">
                                    <i class="fa fa-heart"></i>&nbsp;Wishlists
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">
                                    <i class="zmdi zmdi-settings"></i>&nbsp;Settings
                                </a>
                            </li>
                        </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- Tab panes -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                    <div class="user-dashboard">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="my-dashboard">
                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 p170 mydashboard">
                                    <div class="col-md-7 col-sm-12 col-lg-7 col-xs-12 name">
                                        <h1>Hi {{ $customer->name }} <br>
                                            Namaste & Welcome
                                        </h1>
                                        @if($hasBooking)
                                        <div class="trip">
                                            <img src="{{ asset('ruploads/'.$lastBooking->trip->getFirstImage()) }}?w=65&h=65&fit=crop">
                                            <p>{{ $lastBooking->trip_name }}<br>on <u>{{ $lastBooking->start_date->format('d M Y') }}</u></p>
                                        </div>
                                        <a href="#myBooking" class="btn btn-detail hvr-icon-wobble-horizontal showBooking">
                                            Retrieve Booking<i class="fa fa-arrow-right hvr-icon" aria-hidden="true"></i>
                                        </a>
                                            @endif
                                    </div>
                                    <div class="col-md-5 col-sm-12 col-lg-5 col-xs-5 email-address">
                                        <h2>{{ $customer->name }}</h2>
                                        <span>{{ $customer->email }}</span>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="myProfile">
                                <div class="profile">
                                    <form class="form-horizontal userForm" action="{{ route('website.user.update',['user'=>$customer->id]) }}" method="post" enctype="multipart/form-data">
                                    <div class="col-md-4 col-sm-12 col-lg-4 col-xs-4 top">
                                        <div class="d-flex">
                                        <div class="avatar">
                                            <div class="avatar-hold">
                                                <img id="preview" src="{{ $customer->getFirstImage()?asset('ruploads/'.$customer->getFirstImage()):public_asset('website/img/profile-user.png') }}?h=103&w=103&fit=crop" alt="{{ $customer->name }}">
                                            </div>
                                        </div>
                                        <div class="user-name">
                                            <h5>{{ $customer->name }}</h5>
                                            <a href="#" onclick="$('#changeImage').trigger('click')">
                                                <i class="fa fa-camera"></i> Change Image</a>
                                            <input onchange="readIMG(this)" id="changeImage" type="file" name="image" style="display: none">
                                        </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12 group">
                                            <button id="update" type="submit" name="update" class="btn btn-view">
                                                <i class="fa fa-check-circle"></i> Update</button>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-12 col-lg-8 col-xs-8 nopadding personal-info">


{{--                                    <div class="top">--}}
{{--                                        <div class="avatar">--}}
{{--                                            <div class="avatar-hold">--}}
{{--                                                <img id="preview" src="{{ $customer->getFirstImage()?asset('ruploads/'.$customer->getFirstImage()):public_asset('website/img/profile-user.png') }}?h=103&w=103&fit=crop" alt="{{ $customer->name }}">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="user-name">--}}
{{--                                            <h5>{{ $customer->name }}</h5>--}}
{{--                                            <a href="#" onclick="$('#changeImage').trigger('click')">--}}
{{--                                                <i class="fa fa-camera"></i> Change Image--}}
{{--                                            </a>--}}
{{--                                            <input onchange="readIMG(this)" id="changeImage" type="file" name="image" style="display: none">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    {{--<form class="form-horizontal" action="{{ route('website.user.update',['user'=>$customer->id]) }}" method="post" novalidate>--}}

                                        {!! csrf_field() !!}
                                        <input type="hidden" name="_method" value="PUT">
                                        <!-- Form Name -->
                                        <legend>Personal Information</legend>
                                        <div class="row">

                                            <div class="col-md-3 col-sm-6 col-xs-12 group">
                                                <label class="control-label" for="title">Title</label>
                                                <select class="form-control indexed" required name="title" >
                                                    <option value="Mr" {{ oldValue('title',$customer) == 'Mr'?'selected':'' }}>Mr</option>
                                                    <option value="Mrs" {{ oldValue('title',$customer) == 'Mrs'?'selected':'' }}>Mrs</option>
                                                    <option value="Ms" {{ oldValue('title',$customer) == 'Ms'?'selected':'' }}>Ms</option>
                                                </select>
                                                @if ($errors->has('title'))
                                                    <label id="title-error" class="error" for="title">{{ $errors->first('title') }}</label>
                                                @endif
                                            </div>
                                            <div class="clearfix"></div>

                                            <div class="col-md-6 col-sm-6 col-xs-12 group">
                                                <label class="control-label" for="firstName">First Name</label>
                                                <input id="firstName" name="first_name" type="text" placeholder="First Name" value="{{ oldValue('first_name',$customer) }}" class="form-control input-md" required>
                                                @if ($errors->has('first_name'))
                                                    <label id="title-error" class="error" for="title">{{ $errors->first('first_name') }}</label>
                                                @endif
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12 group">
                                                <label class="control-label" for="middleName">Middle Name</label>
                                                <input id="middleName" name="middle_name" type="text" class="form-control input-md" value="{{ oldValue('middle_name',$customer) }}">
                                                @if ($errors->has('middle_name'))
                                                    <label id="title-error" class="error" for="title">{{ $errors->first('middle_name') }}</label>
                                                @endif
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12 group">
                                                <label class="control-label" for="lastName">Last Name</label>
                                                <input id="lastName" name="last_name" type="text" placeholder="Last Name" value="{{ oldValue('last_name',$customer) }}" class="form-control input-md" required>
                                                @if ($errors->has('last_name'))
                                                    <label id="title-error" class="error" for="title">{{ $errors->first('last_name') }}</label>
                                                @endif
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12 group">
                                                <label class="control-label" for="email">Email Address</label>
                                                <input id="email" name="email" type="email" value="{{ oldValue('email',$customer) }}" required placeholder="name@example.com " class="form-control input-md">
                                                @if ($errors->has('email'))
                                                    <label id="title-error" class="error" for="title">{{ $errors->first('email') }}</label>
                                                @endif
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12 group">
                                                <label class="control-label">Date of birth</label>
                                                <div class="clearfix"></div>
                                                <div class="">
                                                    <input type="text" name="date_of_birth" value="{{ oldValue('date_of_birth',$customer) }}" required class="form-control dates indexed">
                                                    @if ($errors->has('date_of_birth'))
                                                        <label id="title-error" class="error" for="title">{{ $errors->first('date_of_birth') }}</label>
                                                    @endif
                                                </div>

                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12 group">
                                                <label class="control-label" for="nationality">Nationality</label>
                                                @include('website::partials.country-list',['name'=>'nationality','class'=>'form-control'])
                                                @if ($errors->has('nationality'))
                                                    <label id="title-error" class="error" for="title">{{ $errors->first('nationality') }}</label>
                                                @endif
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12 group">
                                                <label class="control-label" for="gender">Gender</label>
                                                <select class="form-control" required name="gender" id="">
                                                    <option value="male" {{ oldValue('gender',$customer) == 'male'?'selected':'' }}>Male</option>
                                                    <option value="female" {{ oldValue('gender',$customer) == 'female'?'selected':'' }}>Female</option>
                                                    <option value="other" {{ oldValue('gender',$customer) == 'other'?'selected':'' }}>Other</option>
                                                </select>
                                                @if ($errors->has('gender'))
                                                    <label id="title-error" class="error" for="title">{{ $errors->first('gender') }}</label>
                                                @endif
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12 group">
                                                <label class="control-label" for="addressLine">Address line</label>
                                                <input id="addressLine" name="address" value="{{ oldValue('address',$customer) }}" required type="text" placeholder="" class="form-control input-md">
                                                @if ($errors->has('address'))
                                                    <label id="title-error" class="error" for="title">{{ $errors->first('address') }}</label>
                                                @endif
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12 group">
                                                <label class="control-label" for="contactNumber">Contact number (mobile)</label>
                                                <input id="contactNumber" name="mobile_number" value="{{ oldValue('mobile_number',$customer) }}" type="text" placeholder="" class="form-control input-md" required>
                                                @if ($errors->has('mobile_number'))
                                                    <label id="title-error" class="error" for="title">{{ $errors->first('mobile_number') }}</label>
                                                @endif
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12 group">
                                                <label class="control-label" for="state">State/province</label>
                                                <input id="state" name="state" type="text" placeholder="" class="form-control input-md" value="{{ oldValue('state',$customer) }}" required>
                                                @if ($errors->has('state'))
                                                    <label id="title-error" class="error" for="title">{{ $errors->first('state') }}</label>
                                                @endif
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12 group">
                                                <label class="control-label" for="postalCode">Postal code</label>
                                                <input id="postalCode" name="zip_code" value="{{ oldValue('zip_code',$customer) }}" type="text" placeholder="" class="form-control input-md">
                                                @if ($errors->has('zip_code'))
                                                    <label id="title-error" class="error" for="title">{{ $errors->first('zip_code') }}</label>
                                                @endif
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12 group">
                                                <label class="control-label" for="country">Country</label>
                                                @include('website::partials.country-list',['name'=>'country','class'=>'form-control'])
                                                @if ($errors->has('country'))
                                                    <label id="title-error" class="error" for="title">{{ $errors->first('country') }}</label>
                                                @endif
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-xs-12 in-title">
                                                <h3>Change password</h3>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12 group">
                                                <label class="control-label" for="newPassword">New Password</label>
                                                <input id="newPassword" name="password" type="password" placeholder="" class="form-control input-md">
                                                @if ($errors->has('password'))
                                                    <label id="title-error" class="error" for="title">{{ $errors->first('password') }}</label>
                                                @endif
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 group">
                                                <label class="control-label" for="passwordRepeat">Confirm new password</label>
                                                <input id="passwordRepeat" name="password_confirmation" type="password" placeholder="" class="form-control input-md">
                                            </div>

                                            <!-- Button -->
                                            <div class="col-md-4 col-sm-6 col-xs-12 group">
                                                <button id="update" name="update" class="btn btn-view">
                                                    <i class="fa fa-check-circle"></i> Update</button>
                                            </div>
                                        </div>

                                    </div>
                                    </form>

                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="myBooking">
                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 p170 booking">
                                    <h3>Booking History</h3>
                                    @if($customer->bookings)
                                    @foreach($customer->bookings->sortByDesc('id') as $booking)
                                        @php
                                        $addOns = $booking->addOns;
                                        @endphp
                                            <div class="summary-wrapper dash-more-content">
                                                <div class="book-panel summary-wrap">
                                        <h6>Booked on : {{ $booking->created_at->format('d/m/Y') }} @if($booking->cancelled_at)
                                                <span style="margin-left: 32px;color: #ff0000;">CANCELLED</span>

                                            @endif</h6>

                                        <ul>
                                            <li>Trip Name
                                                <span>{{ $booking->trip_name }}</span>
                                            </li>
                                            <li>Departure Date
                                                <span>{{ $booking->start_date->format('d/m/Y') }}</span>
                                            </li>
                                            <li>Return Date
                                                <span>{{ $booking->finish_date->format('d/m/Y') }}</span>
                                            </li>

                                            <li>Pax Count
                                                <span>{{ $booking->passenger_count }}</span>
                                            </li>
                                            <hr>

                                            <li>Lead Traveller
                                                <span>{{ $booking->customer->name }}</span>
                                            </li>
                                            <li>Price
                                                <span>{{ $booking->total_price }}</span>
                                            </li>
                                            <li>
                                                Accommodation
                                                <span>{{ addon_value($addOns,'accommodation') }}</span>
                                            </li>
                                            <li>Flights
                                                <span>{{ addon_value($addOns,'flight') }}</span>
                                            </li>
                                            <hr>
                                            <div class="morecontent" style="display: none">
                                            <li>
                                                Airport Pickup
                                                <span>{{ addon_value($addOns,'pick_up') }}</span>
                                            </li>
                                            <li>
                                                Insurance
                                                <span>{{ addon_value($addOns,'insurance') }}</span>
                                            </li>
                                            <li>
                                                Extra Night Before
                                                <span>{{ addon_value($addOns,'extra_night_before') }}</span>
                                            </li>
                                            <li>
                                                Extra Night After
                                                <span>{{ addon_value($addOns,'extra_night_after') }}</span>
                                            </li>
                                            <hr>
                                            <li style="width:100%">
                                                Special Request
                                                <span>{{ $booking->special_request }}</span>
                                            </li>
                                            </div>
                                        </ul>
                                        <div class="cancel-table">
                                            <h6>Cancel Booking</h6>
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>CheckBox</th>
                                                    <th>Full Name</th>
                                                    <th>Email Address</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($booking->passengers as $passenger)
                                                <tr>
                                                    <td>@if(!$passenger->cancelled_at)<input class="check passengers_id" name="passengers[]" value="{{ $passenger->id }}" type="checkbox"/>@endif</td>
                                                    <td>{{ $passenger->name }}</td>
                                                    <td>{{ $passenger->email }}</td>
                                                </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <a href="{{ route('website.booking.cancel',['booking'=>$booking->id]) }}" class="btn btn-proceed cancel-booking" data-toggle="modal" data-target="#mycancelModal">
                                                <i class="fa fa-check-circle"></i> Proceed
                                            </a>
                                            <a href="#" class="btn btn-closetable">
                                                <i class="fa fa-times-circle"></i> Cancel
                                            </a>
                                        </div>
                                        <div class="cta">
                                            <a href="#"  class="btn btn-detail dash-more">
                                                <i class="fa fa-check-circle"></i> Show More
                                            </a>
                                            @if($booking->has_active_passengers)
                                            <a href="#" class="btn btn-cancel">
                                                <i class="fa fa-times-circle"></i> Cancel Booking
                                            </a>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                        @endforeach
                                        @endif

                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="account-summary">
                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 p170 account-summary">
                                    <h3>Account Summary</h3>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th>Date</th>
                                            <th>Trip Name</th>
                                            <th>Cost</th>
                                            <th>Invoice</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($customer->bookings)
                                        @foreach($customer->bookings->sortByDesc('id') as $booking)
                                            <tr>
                                                <td class="sn" data-title="S.N">{{ $booking->id }}</td>
                                                <td class="date" data-title="Date">{{ $booking->created_at->format('d/m/Y') }}</td>
                                                <td class="tripname" data-title="Tripname">{{ $booking->trip_name }}</td>
                                                <td class="cost" data-title="Cost">${{ $booking->total_price }}</td>
                                                <td class="invoice" data-title="Invoice">
                                                    <img src="{{ public_asset('website/img/invoice-pdf.jpg') }}">
                                                    <a href="{{ route('website.booking.invoice.download',$booking->id) }}" target="_blank">Download</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="myReview">
                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 p170 review">
                                    <h3>My reviews</h3>
{{--                                    @if($customer->review>0)--}}
                                    @foreach($customer->reviews as $review)
                                    <div class="my-review-holder">
                                        <a href="{{ route('website.trips.detail',['trip'=>$review->ratable->slug]) }}" class="review-tooltip">
                                            <i class="fa fa-eye"></i>
                                            <span>View in trip detail</span>
                                        </a>
                                        <div class="reviewer-info">
                                            <h2 class="name">{{ $customer->name }}</h2>
                                                @for($i=0;$i<$review->rating_value;$i++)
                                                <i class="fa fa-star"></i>
                                                @endfor
                                            <p class="date">Review on {{ $review->created_at->format('Y-m-d') }}</p>
                                        </div>
                                        <div class="review-on">
                                            <h4 class="title">{{ $review->title }}</h4>
                                            {!! html_entity_decode($review->review) !!}
                                        </div>
                                    </div>
                                        @endforeach
                                        {{--@endif--}}

                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="wishlist">
                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 p170 wishlist">
                                    <h3>Wishlists</h3>

                                    @foreach($wishlist as $wish)
                                        @php
                                        $trip = $wish->trip;
                                        @endphp
                                    <div class="wishdiv">
                                        <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12 tripname nopadding">
                                            <img data-src="{{ asset('ruploads/'.$trip->getFirstImage())}}?w=360&h=404&fit=crop" src="{{ public_asset('website/img/category-overlay.png') }}" alt="" class="lazy">
                                            <h2>{{ $trip->title }}<span> - {{ $trip->duration }}</span></h2>
                                            <h4>{{ append_currency($trip->price) }} <span>Starting price</span></h4>
                                            <div class="rating">
                                                @for($i=0;$i<$trip->average_rating;$i++)
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-12 col-lg-2 col-xs-12 difficulty nopadding text-center">
                                            <div class="difficulty{{$trip->difficulty}}"></div>
                                            <p>Difficulty</p>
                                        </div>
                                        <div class="col-md-2 col-sm-12 col-lg-2 col-xs-12 wish nopadding text-center">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-md-2 col-sm-12 col-lg-2 col-xs-12 nopadding viewtrip text-center">
                                            <a href="{{ route('website.trips.detail',['trip'=>$trip->slug]) }}">View Trip</a>
                                        </div>
                                    </div>
                                    <!-- wishdiv -->
                                   @endforeach

                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="settings">
                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 p170 setting">
                                    <label class="check-label">I Would like to Receive Offers Regular Update from Travel Adventure
                                        Nepal
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cancellation Modal -->
    <div class="modal fade" id="mycancelModal" tabindex="-1" role="dialog" aria-labelledby="mycancelModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Booking Cancellation</h4>
                    <p>Please specify the reason to cancel this booking. It would be really helpful for us to improve our service in future.</p>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="cancel-form">
                        {!! csrf_field() !!}
                        <input type="hidden" id="passenger_ids" name="passenger_ids" value="">
                        <textarea required class="form-control" name="customer_remarks" rows="7"></textarea>
                        <p><span>Note:</span> See our <a href="#">Cancellation Policy</a></p>
                        <button type="submit" class="btn btn-submit">Submit</button>
                        <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancel</button>
                    </form>

                </div>



            </div>
        </div>
    </div>
    <!-- cancellation Modal -->
@stop
@section('js')
{{--    <script src="{{ public_asset('website/js/parallax.min.js') }}" ></script>--}}
    <script >
        addLoadEvent(function () {
            var pathname = window.location.href;
            console.log(pathname);
            if(pathname.indexOf('#myBooking') >=0)
            {
                showBookingList();
                // $('body').scrollTo('.user-dashboard');
            }
            $('.showBooking').click(function () {
                showBookingList();
            });

            function showBookingList(){
                // console.log($("#dashboardList").offset().top);
                $(".nav-pills a[href$='#myBooking']").trigger('click');
                document.querySelector("#myBooking").scrollIntoView({
                    behavior: "smooth"
                });
            }


        $(document).ready(function () {
            $('.dates').datepicker({
                format:'yyyy-mm-dd',
            });
        });
        var custom_form_rules = {
            errorClass:'error redborder1',
            errorElement:"span",
            errorPlacement: function (error, element) {
                var el = element.parent();
                // error.appendTo(el);
            }
        };
        $('.cancel-table').hide();
            $('.btn-cancel').click(function(){
                $(this).parent().parent().find('.cancel-table').show();
            });
            $('.btn-closetable').click(function(){
                $('.cancel-table').hide();
        });
        $('.cancel-booking').click(function (e) {
            e.preventDefault();
            var chkArray = [];
            var parent_div = $(this).parent('.cancel-table');
            var checked_els = parent_div.find('.passengers_id:checked');
            if(checked_els.length<=0)
            {
                $('.passengers_id').css('border','1px solid red');
                return false;
            }
            checked_els.each(function(k,v) {
                chkArray.push($(this).val());
            });
            console.log(chkArray);

            // var passenger_id = parent_div.find('.passengers_id:checked').serialize();
            // console.log(passenger_id);
            $('#passenger_ids').val(chkArray.join(','));
            $('.cancel-form').attr('action',$(this).attr('href'));

        });
        $('.cancel-form').validate(custom_form_rules);
        $(".userForm").validate(custom_form_rules);
        })
    </script>
@stop