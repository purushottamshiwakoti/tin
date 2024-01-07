
@extends('website::layouts.master')
@section('content')

@include('website::user.breadcrumb-section')

<section class="dashboard-content pt-40 pb-80 bg-light">
    <div class="container">
        <div class="row">
            @include('website::user.layouts.sidebar')
            @if(auth()->user('customers')->bookings()->count()<=0)
            <div class="col-md-9 content no-data">
                <img src="{{ public_asset('website/assets/img/welcome-illus.png') }}" alt="">
                <h6>You haven’t subscribed to any packages yet.</h6>
                <a href="{{ route('website.home') }}" class="btn text-primary btn-transparent btn-custom  bordered"><span>Back to Homepage</span></a>
            </div>
            @else
            <div class="col-md-9 content no-data">
                <img src="{{ public_asset('website/assets/img/welcome-illus.png') }}" alt="">
                <h6>Hi, {{ auth()->user('customer')->name }} Namaste and Welcome</h6>
                <a href="{{ route('website.user.booking') }}" class="btn text-primary btn-transparent btn-custom  bordered"><span>Explore your Bookings</span></a>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection

