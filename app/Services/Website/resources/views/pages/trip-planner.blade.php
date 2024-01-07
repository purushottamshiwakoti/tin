@extends('website::layouts.master')

@section('content')

<section class="trip-planner-banner bg-light1 py-80 trip-section">
    <div class="container">
        <div class="row">
            <div class="col-12 heading text-center">
                <h2>Trip Planner</h2>
                <span>Tell us your preferences, we will find and go lengths to make a customized trip for your
                    taste.</span>
            </div>
        </div>
    </div>
</section>

<section class="trip-planner pb-80 trip-section">
    <div class="container">
        <div class="row">            
            <div class="col-lg-12">
                <div class="trip-planner-box" id="trip-planner-box">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="planner-step">
                                <ul class="list-unstyled d-flex justify-content-center" id="progressbar">
                                    <li class="active ">
                                        <span class="circle">1</span>
                                        <span class="fw-600">Who</span>  
                                    </li>
                                    <li class="">
                                        <span class="circle">2</span>
                                        <span class="fw-600">When </span> 
                                    </li>
                                    <li class="">
                                        <span class="circle">3</span>
                                        <span class="fw-600">Where </span> 
                                    </li>
                                    <li class="">
                                        <span class="circle">4</span>
                                        <span class="fw-600">Preferences </span> 
                                    </li>
                                    <li class="">
                                        <span class="circle">5</span>
                                        <span class="fw-600">Budget </span> 
                                    </li>
                                    <li class="">
                                        <span class="circle">6</span>
                                        <span class="fw-600">Basic info </span> 
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <form id="trip-plan-form" method="post" onsubmit="return false" novalidate>
                                {!! csrf_field() !!}
                                <span id="quotemsg4"></span>
                            <fieldset class="step-1">
                                <div class="row">
                                    <div class="col-xl-10 mx-auto">
                                        <div class="row ">
                                            <div class="col-12 text-center mb-3">
                                                <h5 class="text-primary">Who Are You Going To Be Travelling With?</h5>
                                            </div>
                                        </div>
                                        <div class="row mb-60 travelling-with">
                                            <div class="family form-check col-md-3">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Family
                                                    <input class="form-check-input travelling" type="radio"
                                                        value="Family" name="travelling" id="exampleRadios1">
                                                    <span class="tick-mark"></span>
                                                </label>
                                            </div>
                                            <div class="friends form-check col-md-3">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    Friends
                                                    <input class="form-check-input travelling" type="radio"
                                                        value="Friends" name="travelling" id="exampleRadios2">
                                                    <span class="tick-mark"></span>
                                                </label>
                                            </div>
                                            <div class="multiple groups form-check col-md-3">
                                                <label class="form-check-label" for="exampleRadios3">
                                                    Multiple groups
                                                    <input class="form-check-input travelling" type="radio"
                                                        value="Multiple groups" name="travelling" id="exampleRadios3" required>
                                                    <span class="tick-mark"></span>
                                                </label>
                                            </div>
                                            <div class="others form-check col-md-3">
                                                <label class="form-check-label" for="exampleRadios4">
                                                    Others
                                                    <input class="form-check-input travelling" type="radio"
                                                        value="Others" name="travelling" id="exampleRadios4">
                                                    <span class="tick-mark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <h5 class="text-primary">Please select the total number of Travellers</h5>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 mx-auto mt-3 form-group">
                                                <div class="input-group total-travellers js-select-special" >
                                                    <input type="text" class="form-control" value="0" id="info"   name="passenger_count" required
                                                        spellcheck="false" readonly="readonly">
                                                </div>
                                                {{-- <div class="traveller-dropdown-select">
                                                    <div class="traveller adult-container d-flex">
                                                        <h6>Adult</h6>
                                                        <div class="control adult d-flex align-items-center">
                                                            <span class="btn minus disabled"><i
                                                                    class="far fa-minus"></i></span>
                                                            <span class="adult-count count">1</span>
                                                            <span class="btn plus">
                                                                <i class="far fa-plus"></i>
                                                            </span>
                                                        </div>
                                                        <input type="hidden"  name="adult_present" id="adult_present"/>
                                                    </div>

                                                    <div class="traveller children-container d-flex">
                                                        <h6>Children <span>(0-11)</span></h6>
                                                        <div class="control child d-flex align-items-center">
                                                            <span class="btn minus disabled"><i
                                                                    class="far fa-minus"></i></span>
                                                            <span class="child-count count">0</span>
                                                            <span class="btn plus"><i class="far fa-plus"></i></span>
                                                        </div>
                                                        <input type="hidden"  name="children_present" id="children_present"/>

                                                    </div>

                                                    <div class="traveller infant-container d-flex">
                                                        <h6>Infant <span>(12-16)</span></h6>
                                                        </h6>
                                                        <div class="control infant d-flex align-items-center">


                                                            <span class="btn minus disabled"><i
                                                                    class="far fa-minus"></i></span>
                                                            </span><span class="infant-count count">0</span>
                                                            <span class="btn plus"><i class="far fa-plus"></i>
                                                        </div>
                                                        <input type="hidden"  name="infant_present" id="infant_present"/>

                                                    </div>
                                                </div> --}}
                                                <div class="traveller-dropdown-select position-absolute">
                                                    <div class="traveller adult-container d-flex">
                                                        <h6>Adult</h6>
                                                        <div class="control adult d-flex align-items-center">
                                                            <span class="adult-one-way btn minus disabled"><i
                                                                    class="far fa-minus"></i></span>
                                                            <span id="adult-count-flight-one-way"
                                                                class="adult-count count">1</span>
                                                            <span class="adult-one-way btn plus">
                                                                <i class="far fa-plus"></i>
                                                            </span>
                                                        </div>
                                                        <input type="hidden"  name="adult_present" id="adult_present"/>

                                                    </div>
        
                                                    <div class="traveller children-container d-flex">
                                                        <h6>Children <span>(0-11)</span></h6>
                                                        <div class="control child d-flex align-items-center">
                                                            <span class="child-one-way btn minus disabled"><i
                                                                    class="far fa-minus"></i></span>
                                                            <span id="child-count-flight-one-way"
                                                                class="child-count count">0</span>
                                                            <span class="child-one-way btn plus"><i
                                                                    class="far fa-plus"></i></span>
                                                        </div>
                                                        <input type="hidden"  name="children_present" id="children_present"/>

                                                    </div>
        
                                                    <div class="traveller infant-container d-flex">
                                                        <h6>Infant <span>(12-16)</span></h6>
                                                        </h6>
                                                        <div class="control infant d-flex align-items-center">
        
        
                                                            <span class="infant-one-way btn minus disabled"><i
                                                                    class="far fa-minus"></i></span>
                                                            </span><span id="infant-count-flight-one-way"
                                                                class="infant-count count">0</span>
                                                            <span class="infant-one-way btn plus"><i class="far fa-plus"></i>
                                                        </div>
                                                        <input type="hidden"  name="infant_present" id="infant_present"/>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="btn-wrapper text-right">
                                    <button class="btn btn-lg btn-primary next">Next</button>
                                </div>
                            </fieldset>
                            <fieldset class="step-2">
                                <div class="row">
                                    <div class="col-xl-10 mx-auto text-center">
                                        <h5 class="text-primary mb-2">Select Date of Arrival or Departure</h5>
                                        <p>This date may consist of whole of your vacation, i.e. the larger the time
                                            frame the more trip options we can provide</p>
                                        <div class="row mt-5 justify-content-center">
                                            <div class="col-md-4 mb-4 mb-md-0 date-field-wrapper">
                                                <label for=""> Earliest Departure Date</label>
                                                <div class="input-field-wrapper">

                                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10 5.77778C10 5.34822 10.5858 5 11 5C11.4142 5 12 5.34822 12 5.77778V7.33333H10V5.77778Z"
                                                            fill="#605E2B" />
                                                        <path
                                                            d="M20 5.77778C20 5.34822 20.5858 5 21 5C21.4142 5 22 5.34822 22 5.77778V7.33333H20V5.77778Z"
                                                            fill="#605E2B" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M10 7.33333H7.75C7.33579 7.33333 7 7.68156 7 8.11111V25.2222C7 25.6518 7.33579 26 7.75 26H24.25C24.6642 26 25 25.6518 25 25.2222V8.11111C25 7.68156 24.6642 7.33333 24.25 7.33333H22H20H12H10ZM23.5 12H8.5V24.4444H23.5V12Z"
                                                            fill="#605E2B" />
                                                        <path
                                                            d="M10 15.5C10 14.6716 10.6716 14 11.5 14V14C12.3284 14 13 14.6716 13 15.5V15.5C13 16.3284 12.3284 17 11.5 17V17C10.6716 17 10 16.3284 10 15.5V15.5Z"
                                                            fill="#605E2B" />
                                                        <path
                                                            d="M22 18.5C22 17.6716 21.3284 17 20.5 17V17C19.6716 17 19 17.6716 19 18.5V18.5C19 19.3284 19.6716 20 20.5 20V20C21.3284 20 22 19.3284 22 18.5V18.5Z"
                                                            fill="#605E2B" />
                                                    </svg>
                                                    <input type="text" class="date  start-date flatpickr-input"  id="start-date" name="start_date"
                                                    value="{{old('start_date')}}"
                                                   
                                                        placeholder="Departure Date" required />
                                                </div>
                                            </div>
                                            <div class="col-md-4 date-field-wrapper">
                                                <label for="">Earliest Arrival Date</label>
                                                <div class="input-field-wrapper">
                                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10 5.77778C10 5.34822 10.5858 5 11 5C11.4142 5 12 5.34822 12 5.77778V7.33333H10V5.77778Z"
                                                            fill="#605E2B" />
                                                        <path
                                                            d="M20 5.77778C20 5.34822 20.5858 5 21 5C21.4142 5 22 5.34822 22 5.77778V7.33333H20V5.77778Z"
                                                            fill="#605E2B" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M10 7.33333H7.75C7.33579 7.33333 7 7.68156 7 8.11111V25.2222C7 25.6518 7.33579 26 7.75 26H24.25C24.6642 26 25 25.6518 25 25.2222V8.11111C25 7.68156 24.6642 7.33333 24.25 7.33333H22H20H12H10ZM23.5 12H8.5V24.4444H23.5V12Z"
                                                            fill="#605E2B" />
                                                        <path
                                                            d="M10 15.5C10 14.6716 10.6716 14 11.5 14V14C12.3284 14 13 14.6716 13 15.5V15.5C13 16.3284 12.3284 17 11.5 17V17C10.6716 17 10 16.3284 10 15.5V15.5Z"
                                                            fill="#605E2B" />
                                                        <path
                                                            d="M22 18.5C22 17.6716 21.3284 17 20.5 17V17C19.6716 17 19 17.6716 19 18.5V18.5C19 19.3284 19.6716 20 20.5 20V20C21.3284 20 22 19.3284 22 18.5V18.5Z"
                                                            fill="#605E2B" />
                                                    </svg>
                                                    <input type="text" class="date  end-date flatpickr-input"  id="end-date" name="end_date"
                                                    value="{{old('end_date')}}"
                                                        placeholder="Arrival Date" required />
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-wrapper text-right">
                                    <button class="btn btn-lg btn-back previous">Back</button>
                                    <button class="btn btn-lg btn-primary next">Next</button>
                                </div>
                            </fieldset>
                            <fieldset class="step-3">
                                <div class="row heading">
                                    <div class="col-12 text-center">
                                        <h5 class="text-primary mb-3">Select Destination</h5>
                                        <p>Below are all the destinations Doko Tour offer.</p>
                                    </div>
                                </div>
                                <div class="row mt-4 destinations">
                                    @foreach($destinations as $d)

                                    <div class="form-check col-6 col-lg-3 col-md-4 col-sm-6 img-radio">
                                        <label class="form-check-label checkbox-label" for="defaultCheck1">
                                            <img src="{{asset('ruploads/'.$d->getCoverImage()).pages_parallax()}}" alt="{{$d->slug}}">

                                            <h6>{{$d->title}}</h6>
                                            <input class="form-check-input travelling " type="radio" value="{{$d->title}}"
                                                name="destination" id="exampleRadios1" required>
                                            <span class="tick-mark"></span>
                                        </label>
                                    </div>
                                    @endforeach                                

                                </div>
                                <div class="btn-wrapper text-right">
                                    <button class="btn btn-lg btn-back previous">Back</button>
                                    <button class="btn btn-lg btn-primary next">Next</button>
                                </div>                                
                            </fieldset>
                            <fieldset class="step-4">                                
                                <div id="preferences">
                                    <div class="row heading">
                                        <div class="col-12 text-center">
                                            <h5 class="text-primary mb-3">Select Activities Preferences</h5>
                                            <p>Below are all the destinations Doko Tour offer.</p>
                                        </div>
                                    </div>
                                    <div class="row mt-4 activities-preferences">
                                        @foreach($activity_lists as $k=>$a) 
                                        <div class="form-check col-lg-3 col-md-4 col-sm-6 checkbox-type-1">
                                            <label class="form-check-label checkbox-label" for="defaultCheck{{$k+1}}">
                                                <input class="form-check-input travelling actBtn" type="checkbox"
                                                    value="{{$a->slug}}" name="activities[]" id="exampleRadios1" required>
                                                <div class="activity-card">
                                                    <h6>{{$a->title}}</h6>
                                                    <span>{{$a->getTripCountAttribute()}} Packages</span>
                                                </div>
                                            </label>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                                <span class="spinner-border spinner-border-md text-primary mb-4"
                                id="loader3" style="display: none;"></span>
                                <div class="col-lg-12 required tripresultsact required all-act" data-name="interested" id="showTrip"></div>

                             
                                <div class="btn-wrapper text-right">
                                    <button class="btn btn-lg btn-back previous">Back</button>
                                    <button class="btn btn-lg btn-primary next">Next</button>
                                </div>
                                <div class="row mt-4 activities-preferences">

                                </div>
                            </fieldset>
                            <fieldset class="step-5">
                                <div class="row">
                                    <div class="col-xl-10 mx-auto">
                                        <div class="row mb-4">
                                            <div class="col-12 text-center mb-3">
                                                <h4>Budget Optimization</h4>
                                                <span>We want you to have the best value trip for your budget. So please
                                                    fill out the below informations.</span>
                                            </div>
                                        </div>
                                        <div class="row mb-60 travelling-with">
                                            <div class="family form-check col-md-3">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    I want the best facillities available
                                                    <input class="form-check-input travelling" type="radio"
                                                        value="I want the best facillities available" name="budget_optimization" id="exampleRadios1" required>
                                                    <span class="tick-mark"></span>
                                                </label>
                                            </div>
                                            <div class="friends form-check col-md-3">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    I care more for the activities than the luxury
                                                    <input class="form-check-input travelling" type="radio"
                                                        value="I care more for the activities than the luxury" name="budget_optimization" id="exampleRadios2">
                                                    <span class="tick-mark"></span>
                                                </label>
                                            </div>
                                            <div class="multiple groups form-check col-md-3">
                                                <label class="form-check-label" for="exampleRadios3">
                                                    I am on a limited budget range
                                                    <input class="form-check-input travelling" type="radio"
                                                        value="I am on a limited budget range" name="budget_optimization" id="exampleRadios3">
                                                    <span class="tick-mark"></span>
                                                </label>
                                            </div>
                                            <div class="others form-check col-md-3">
                                                <label class="form-check-label" for="exampleRadios4">
                                                    I'll decide later
                                                    <input class="form-check-input travelling" type="radio"
                                                        value="I'll decide later" name="budget_optimization" id="exampleRadios4">
                                                    <span class="tick-mark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <h5>Budget Range</h5>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 mx-auto mt-3 content range">
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
                                                <input type="hidden" name="min-value-price"  id ="min-value-price" value="">
                                                <input type="hidden" name="max-value-price"  id ="max-value-price" value="">
                                                <input type="hidden" id="budget_range" name="budget_range" value=""/>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="btn-wrapper text-right">
                                    <button class="btn btn-lg btn-back previous">Back</button>
                                    <button class="btn btn-lg btn-primary next">Next</button>
                                </div>
                            </fieldset>
                            <fieldset class="step-6">
                                <div class="row">
                                    <div class="col-xl-10 mx-auto">
                                        <div class="row mb-4">
                                            <div class="col-12 text-center mb-3">
                                                <h4>Basic Information</h4>
                                            </div>
                                        
                                            {{-- <form action="" class="row"> --}}
                                            <div class="col-md-4 mb-4 form-group">
                                                <div class="input-group">
                                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="16" cy="11" r="4" fill="#605E2B" />
                                                        <path
                                                            d="M10 24C8.89543 24 7.97435 23.0907 8.24685 22.0202C9.12788 18.5595 12.265 16 16 16C19.735 16 22.8721 18.5595 23.7531 22.0202C24.0257 23.0907 23.1046 24 22 24H10Z"
                                                            fill="#605E2B" />
                                                    </svg>

                                                    <input type="text" class="form-control"  value="{{old('full_name')}}" name="full_name" placeholder="Full Name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4 form-group">
                                                <div class="input-group">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-mail" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <rect x="3" y="5" width="18" height="14" rx="2" />
                                                        <polyline points="3 7 12 13 21 7" />
                                                    </svg>


                                                    <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4 form-group">
                                                <div class="input-group">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-pennant" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="#2c3e50" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <line x1="8" y1="21" x2="12" y2="21" />
                                                        <line x1="10" y1="21" x2="10" y2="3" />
                                                        <path d="M10 4l9 4l-9 4" />
                                                    </svg>

                                                    <input type="text" class="form-control"  value="{{old('nationality')}}" name="nationality" placeholder="Nationality" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4 form-group">
                                                <div class="input-group">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone-call" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#605E2B
                                                    ;" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                      <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                                                      <path d="M15 7a2 2 0 0 1 2 2" />
                                                      <path d="M15 3a6 6 0 0 1 6 6" />
                                                    </svg>

                                                    <input type="text" class="form-control"  value="{{old('phone_number')}}" name="phone_number" placeholder="Phone Number" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4 form-group">
                                                <div class="input-group">
                                                    <select class=" sort js-example-basic-single" name="state" id="" required>
                                                        <option value="Have you visited Nepal prior?">Have you visited Nepal prior?</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <h6 class="mb-4 mt-4">How Did Your Hear About Us?</h6>
                                                <div class="row travelling-with px-3">
                                                    <div class="family form-check col-md-3">
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            Google
                                                            <input class="form-check-input travelling" type="checkbox"
                                                                value="google" name="about_us[]" id="exampleRadios1" required>
                                                            <span class="tick-mark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="friends form-check col-md-3">
                                                        <label class="form-check-label" for="exampleRadios2">
                                                            Facebook
                                                            <input class="form-check-input travelling" type="checkbox"
                                                                value="facebook" name="about_us[]" id="exampleRadios2">
                                                            <span class="tick-mark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="multiple groups form-check col-md-3">
                                                        <label class="form-check-label" for="exampleRadios3">
                                                            Twitter
                                                            <input class="form-check-input travelling" type="checkbox"
                                                                value="twitter" name="about_us[]"
                                                                id="exampleRadios3">
                                                            <span class="tick-mark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="others form-check col-md-3">
                                                        <label class="form-check-label" for="exampleRadios4">
                                                            Friends
                                                            <input class="form-check-input travelling" type="checkbox"
                                                                value="friends" name="about_us[]" id="exampleRadios4">
                                                            <span class="tick-mark"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <h6 class="mb-4 mt-4">Guide Preferences :</h6>
                                                <div class="row mb-60 travelling-with px-3">
                                                    <div class="family form-check col-md-3">
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            General Guide
                                                            <input class="form-check-input travelling" type="checkbox"
                                                                value="General Guide" name="guide[]" id="exampleRadios1" required>
                                                            <span class="tick-mark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="friends form-check col-md-3">
                                                        <label class="form-check-label" for="exampleRadios2">
                                                            French Guide
                                                            <input class="form-check-input travelling" type="checkbox"
                                                                value="French Guide" name="guide[]" id="exampleRadios2">
                                                            <span class="tick-mark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="multiple groups form-check col-md-3">
                                                        <label class="form-check-label" for="exampleRadios3">
                                                            German Guide
                                                            <input class="form-check-input travelling" type="checkbox"
                                                                value="Greman Guide" name="guide[]"
                                                                id="exampleRadios3">
                                                            <span class="tick-mark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="others form-check col-md-3">
                                                        <label class="form-check-label" for="exampleRadios4">
                                                            Chinese Guide
                                                            <input class="form-check-input travelling" type="checkbox"
                                                                value="Chinse Guide" name="guide[]" id="exampleRadios4">
                                                            <span class="tick-mark"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 form-group">
                                                <h6 class="mb-4">Any Further Queries Or Suggestions ?
                                                </h6>
                                                <textarea name="description" id="" cols="30" rows="10" required></textarea>
                                            </div>
                                        </div>
                                        {{-- </form> --}}
                                    </div>
                                </div>
                                <div class="btn-wrapper text-right">
                                    {{-- <button class="btn btn-lg btn-back previous">Back</button>
                                    <button class="btn btn-lg btn-primary next">Next</button> --}}
                                    
                                        <button class="btn btn-lg btn-back previous">Back</button>
                                        <button  type="submit" class="btnSubmit btn btn-lg btn-primary">Book now
                                            <span class="spinner-border spinner-border-md"
                                            id="ajaxLoader"></span>
                                        </button>
                                  
                                </div>
                            </fieldset>
                            {{-- <fieldset class="step-7">
                                <div class="btn-wrapper text-right">
                                    <button class="btn btn-lg btn-back previous">Back</button>
                                    <button  type="submit" class="btnSubmit btn btn-lg btn-primary">Book now
                                        <span class="spinner-border spinner-border-md"
                                        id="ajaxLoader"></span>
                                    </button>
                                </div>
                            </fieldset> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

  <!-- BOOKING BANNER -->
<section class="thank-you-banner contains-banner" id="returnMessage" style="display: none">
    <img src="{{ public_asset('website/img/booking2.jpg')}}" class="banner-img" alt="">
    <div class="thank-you-message position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="message-wrapper text-center">
                        <img src="{{ public_asset('website/img/thank1.png')}}" class="thank1" alt="">
                        <img src="{{ public_asset('website/img/thank2.png')}}" class="thank2" alt="">
                        <div class="row">
                            <div class="col-lg-7 mx-auto">
                                <div class="section-heading">
                                    <h1>Thank you for Booking with <span>Doko Tours</span></h1>
                                    <p>Our team will get back to you shortly after regarding your booking details and
                                        placements.
                                        We'll be with you throughout your Journey</p>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('website.home')}}" class="btn btn-primary btn-lg">go back to homepage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- BOOKING BANNER END-->




    @include('website::partials.newletter') 


@stop
@section('js')


<script  
src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>



<script  >

jQuery(function () {
$(document).ready(function () {
    
   
    $(".error").text('');
    $("#ajaxLoader").hide();
    $("#trip-plan-form").validate();
    $("#trip-plan-form").css("opacity", "1");
    $('#returnMessage').hide();
    $("#trip-plan-form").submit(function (e) {
        // e.preventDefault();
        
        var pricemin= $('#slider-range-value1').text().match(/\d/g).join('');
        var pricemax= $('#slider-range-value2').text().match(/\d/g).join('');

                       
        $('#min-value-price').val(pricemin);
        $('#max-value-price').val(pricemax);


        if ($(this).valid()) {
          
             //Set Number of Travellers
            $("#adult_present").val($(".adult-count").text());
            $("#children_present").val($(".child-count").text());
            $("#infant_present").val($(".infant-count").text());

            //Set BudgetRange
                $("#budget_range").val($('#max-value-price').val() + '-' + $('#min-value-price').val());

            $("#ajaxLoader").show();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })
            $.ajax({
                url:"{{route('website.travel-style.request.post')}}" ,
                data: $(this).serialize(),
                method: 'POST',
                dataType: 'text',
                success: function (response) {
            //         alert('here');
            // return false;    
       
                    console.log(response)
                    $('#returnMessage').show();
                    $('.trip-section').hide();
                    $("#ajaxLoader").hide();
                    // $('#quotemsg4').html("<span style='color:#009ad1;'>Successfull Store</span>");
                    var targeOffsetTop = $('#returnMessage').offset().top-200;
                            $('html, body').animate({
                                scrollTop: targeOffsetTop,
                            });
                },
                error: function (response) {
                    

                    $("#ajaxLoader").hide();
                            $("#trip-plan-form").css("opacity", "1");
                            $("#btnSubmit").removeAttr('disabled');
                            $('#quotemsg4').html("<span style='color:red;'>Something Went Wrong!!</span>");
                        
                    console.log(response);

                },
            });
            return false;
        } else {
            console.log('error');
            return false;
        }


    });

     //get trip by activity
    
    $(document).on('change', '.actBtn', function () {
       

            $('#showTrip').hide();
            $('.next').prop('disabled',true);
            var a = [];

            $('.actBtn:checkbox:checked').each(function (k) {
                a[k] = this.value;

            });
            $('#loader3').show();
            $.ajax({
                url: "{{route('ajax.plantrips')}}",
                method: 'get',
                data: {
                    // 'destination': d,
                    'activity': a
                },
                dataType: 'text',
                beforeSend: function () {
                    $('.tripresultsact').html('');
                    $('#loader3').show();
                },
             
                success: function (response) {
                    // console.log(response);
                    $('#showTrip').show();
                    $('#loader3').hide();
                    $('.next').prop('disabled',false);
                    $('#loader').hide();
                    $('.tripresultsact').html(response);
                    var targeOffsetTop = $('.all-act').offset().top-100;
                    $('html, body').animate({
                        scrollTop: targeOffsetTop,
                    });
                }
            });

        });

            //end trip get by activity

    return false;

});



});




</script>
@stop
