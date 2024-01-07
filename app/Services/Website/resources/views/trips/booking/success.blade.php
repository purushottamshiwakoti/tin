@extends('website::layouts.master')

@section('content')
  

<section class="purchase pb-80 mt-100 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="purchase-box" id="purchase-box">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="planner-step">
                                <ul class="list-unstyled d-flex justify-content-center" id="progressbar">
                                    <li class="active">
                                        <span class="circle">1</span>
                                        <span class="fw-600">Travel Information</span>
                                    </li>
                                    <li class="active">
                                        <span class="circle">2</span>
                                        <span class="fw-600">Options/Arrangements</span>
                                    </li>
                                    <li class="active">
                                        <span class="circle">3</span>
                                        <span class="fw-600">Payment Information</span>
                                    </li>
                                    <li class="active">
                                        <span class="circle">4</span>
                                        <span class="fw-600">Booking Completed</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                          
                           


                            <fieldset class="step-4 steps">
                                
                                <div class="row dashboard-content">
                                    <div class="col-md-6 mx-auto content no-data">
                                        <img src="{{ asset('website/assets/img/check-mark.png') }}" alt="">
                                        <h6>Thank you for your Booking</h6>
                                        <p>You should receive a confirmation email shortly in your inbox and one of our
                                            human representatives. We will get back to you.</p>
                                            <div class="btn-div d-flex flex-column">
                                                <a href="{{ route('website.dashboard') }}" class="text-primary mb-4 fw-600"><span>Go to Dashboard</span></a>
                                        <a href="{{route('website.home')}}" class="btn text-primary btn-transparent btn-custom  bordered"><span>Back to home</span></a>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  
@stop