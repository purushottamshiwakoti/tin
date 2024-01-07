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
                                        <li class="active ">
                                            <span class="circle">1</span>
                                            <span class="fw-600">Travel Information</span>
                                        </li>
                                        <li class="">
                                            <span class="circle">2</span>
                                            <span class="fw-600">Options/Arrangements</span>
                                        </li>
                                        <li class="">
                                            <span class="circle">3</span>
                                            <span class="fw-600">Payment Information</span>
                                        </li>
                                        <li class="">
                                            <span class="circle">4</span>
                                            <span class="fw-600">Booking Completed</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-12">

                                <fieldset class="step-1 steps">
                                    @if (isset($booking))
                                        <form
                                            action="{{ route('website.booking.update-session', ['booking' => Crypt::encrypt($booking->id)]) }}"
                                            method="post" novalidate>
                                            <input type="hidden" name="_method" value="PUT">
                                        @else
                                            <form
                                                action="{{ route('website.book.into-session', ['trip' => $trip->slug, 'departure' => $departure->id ? $departure->id : 'new', 'start_date' => $departure->start_date->format('Y-m-d')]) }}"
                                                method="post" novalidate>
                                    @endif
                                    {!! csrf_field() !!}
                                    <div class="row">
                                        <div class="col-md-8">
                                            @php
                                                $passengers = json_decode(json_encode(old('passengers')));
                                                if (!$passengers) {
                                                    $passengers = optional($booking)->passengers;
                                                }
                                                $passengers = $passengers ? $passengers : [1];
                                            @endphp
                                            @foreach ($passengers as $key => $passenger)
                                                <div class="form-wrapper person-info-box shadow-box mb-40" id="book-form">
                                                    <div class="row book-form">
                                                        <h1 class="d-flex justify-content-between">Traveller Information
                                                            <span style="{{ $key == 0 ? 'display:none;' : '' }}"
                                                                class="cursor-pointer removePersonInfoBox remove-passenger"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-x" width="32"
                                                                    height="32" viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <line x1="18" y1="6" x2="6"
                                                                        y2="18" />
                                                                    <line x1="6" y1="6" x2="18"
                                                                        y2="18" />
                                                                </svg></span>
                                                        </h1>

                                                        <div class="col-md-6 form-group with-icon white-bg">
                                                            <label for="">Title (required)</label>
                                                            <div class="input-group">
                                                                <select class=" indexed" required
                                                                    name="passengers[{{ $key }}][title]"
                                                                    id="passengers_{{ $key }}_title"
                                                                    style="
                                                            width: 100%;
                                                            height: 39px;
                                                            border: none;
                                                            outline: none;
                                                        ">
                                                                    <option value="Mr."
                                                                        {{ oldValue('title', $passenger) == 'Mr.' ? 'selected' : '' }}>
                                                                        Mr.</option>
                                                                    <option value="Mrs."
                                                                        {{ oldValue('title', $passenger) == 'Mrs.' ? 'selected' : '' }}>
                                                                        Mrs.</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 form-group with-icon white-bg">
                                                            <input type="hidden" class="is_lead"
                                                                name="passengers[{{ $key }}][is_lead]"
                                                                value="1">

                                                            <label for="">First Name (required)</label>
                                                            <div class="input-group">
                                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(#clip0_400_1864)">
                                                                        <path
                                                                            d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                                                                            stroke="#0084D4" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z"
                                                                            stroke="#0084D4" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M6.16797 18.849C6.41548 18.0252 6.92194 17.3032 7.61222 16.79C8.30249 16.2768 9.13982 15.9997 9.99997 16H14C14.8612 15.9997 15.6996 16.2774 16.3904 16.7918C17.0811 17.3062 17.5874 18.0298 17.834 18.855"
                                                                            stroke="#0084D4" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0_400_1864">
                                                                            <rect width="24" height="24"
                                                                                fill="white" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                                <input id="passengers_{{ $key }}_first_name"
                                                                    required
                                                                    value="{{ oldValue('first_name', $passenger) }}"
                                                                    name="passengers[{{ $key }}][first_name]"
                                                                    type="text" class="form-control indexed">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 form-group with-icon white-bg">
                                                            <label for="">Last Name (required)</label>
                                                            <div class="input-group">
                                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(#clip0_400_1864)">
                                                                        <path
                                                                            d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                                                                            stroke="#0084D4" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z"
                                                                            stroke="#0084D4" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M6.16797 18.849C6.41548 18.0252 6.92194 17.3032 7.61222 16.79C8.30249 16.2768 9.13982 15.9997 9.99997 16H14C14.8612 15.9997 15.6996 16.2774 16.3904 16.7918C17.0811 17.3062 17.5874 18.0298 17.834 18.855"
                                                                            stroke="#0084D4" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0_400_1864">
                                                                            <rect width="24" height="24"
                                                                                fill="white" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                                <input id="passengers_{{ $key }}_last_name"
                                                                    value="{{ oldValue('last_name', $passenger) }}"
                                                                    required
                                                                    name="passengers[{{ $key }}][last_name]"
                                                                    type="text" class="form-control indexed ">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 form-group with-icon white-bg">
                                                            <label for="">Email (required)</label>
                                                            <div class="input-group">
                                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(#clip0_400_1874)">
                                                                        <path
                                                                            d="M19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5Z"
                                                                            stroke="#0084D4" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M3 7L12 13L21 7" stroke="#0084D4"
                                                                            stroke-width="1.5" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0_400_1874">
                                                                            <rect width="24" height="24"
                                                                                fill="white" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                                <input id="passengers_{{ $key }}_email" required
                                                                    name="passengers[{{ $key }}][email]"
                                                                    value="{{ oldValue('email', $passenger) }}"
                                                                    type="email" class="form-control indexed">

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 form-group with-icon white-bg">
                                                            <label for="">Phone (required)</label>
                                                            <div class="input-group">
                                                                <svg width="19" height="19" viewBox="0 0 19 19"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M3 1H7L9 6L6.5 7.5C7.57096 9.67153 9.32847 11.429 11.5 12.5L13 10L18 12V16C18 16.5304 17.7893 17.0391 17.4142 17.4142C17.0391 17.7893 16.5304 18 16 18C12.0993 17.763 8.42015 16.1065 5.65683 13.3432C2.8935 10.5798 1.23705 6.90074 1 3C1 2.46957 1.21071 1.96086 1.58579 1.58579C1.96086 1.21071 2.46957 1 3 1"
                                                                        stroke="#0084D4" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                                <input id="passengers_{{ $key }}_mobile_number"
                                                                    value="{{ oldValue('mobile_number', $passenger) }}"
                                                                    name="passengers[{{ $key }}][mobile_number]"
                                                                    type="text" class="form-control indexed " required>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 form-group with-icon white-bg">
                                                            <label for="">Date of Birth (required)</label>
                                                            <div class="input-group">
                                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(#clip0_400_1888)">
                                                                        <path
                                                                            d="M18 5H6C4.89543 5 4 5.89543 4 7V19C4 20.1046 4.89543 21 6 21H18C19.1046 21 20 20.1046 20 19V7C20 5.89543 19.1046 5 18 5Z"
                                                                            stroke="#0084D4" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M16 3V7" stroke="#0084D4"
                                                                            stroke-width="1.5" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M8 3V7" stroke="#0084D4"
                                                                            stroke-width="1.5" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M4 11H20" stroke="#0084D4"
                                                                            stroke-width="1.5" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M10 16H14" stroke="#0084D4"
                                                                            stroke-width="1.5" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0_400_1888">
                                                                            <rect width="24" height="24"
                                                                                fill="white" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                                <input type="date"
                                                                    id="passengers_{{ $key }}_date_of_birth"
                                                                    name="passengers[{{ $key }}][date_of_birth]"
                                                                    value="{{ oldValue('date_of_birth', $passenger) }}"
                                                                    required class="form-control dates indexed">

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 form-group with-icon white-bg">
                                                            <label for="">Gender (required)</label>
                                                            <div class="input-group">
                                                                <select class="indexed" required
                                                                    name="passengers[{{ $key }}][gender]"
                                                                    id="passengers_{{ $key }}_gender"
                                                                    style="
                                                            width: 100%;
                                                            height: 39px;
                                                            border: none;
                                                            outline: none;
                                                        ">
                                                                    <option value="male"
                                                                        {{ oldValue('gender', $passenger) == 'male' ? 'selected' : '' }}>
                                                                        Male</option>
                                                                    <option value="female"
                                                                        {{ oldValue('gender', $passenger) == 'female' ? 'selected' : '' }}>
                                                                        Female</option>
                                                                    <option value="other"
                                                                        {{ oldValue('gender', $passenger) == 'other' ? 'selected' : '' }}>
                                                                        Other</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 form-group with-icon white-bg">
                                                            <label for="">Country (required)</label>
                                                            <div class="input-group">
                                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(#clip0_400_1895)">
                                                                        <path
                                                                            d="M12 14C13.6569 14 15 12.6569 15 11C15 9.34315 13.6569 8 12 8C10.3431 8 9 9.34315 9 11C9 12.6569 10.3431 14 12 14Z"
                                                                            stroke="#0084D4" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M17.657 16.657L13.414 20.9C13.039 21.2746 12.5306 21.4851 12.0005 21.4851C11.4704 21.4851 10.962 21.2746 10.587 20.9L6.343 16.657C5.22422 15.5382 4.46234 14.1127 4.15369 12.5609C3.84504 11.009 4.00349 9.40053 4.60901 7.93874C5.21452 6.47696 6.2399 5.22755 7.55548 4.34852C8.87107 3.46949 10.4178 3.00031 12 3.00031C13.5822 3.00031 15.1289 3.46949 16.4445 4.34852C17.7601 5.22755 18.7855 6.47696 19.391 7.93874C19.9965 9.40053 20.155 11.009 19.8463 12.5609C19.5377 14.1127 18.7758 15.5382 17.657 16.657V16.657Z"
                                                                            stroke="#0084D4" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0_400_1895">
                                                                            <rect width="24" height="24"
                                                                                fill="white" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                                @include('website::partials.country-list', [
                                                                    'class' => 'form-control indexed',
                                                                    'required' => 'required',
                                                                    'name' => 'passengers[' . $key . '][country]',
                                                                    'selectId' =>
                                                                        'passengers_' . $key . '_country',
                                                                    'value' => oldValue('country', $passenger),
                                                                ])
                                                            </div>
                                                        </div>

                                                        {{-- <div class="col-md-6 form-group with-icon white-bg">
                                                        <label for="">Nationality (required)</label>
                                                        <div class="input-group">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_400_1895)">
                                                                <path
                                                                    d="M12 14C13.6569 14 15 12.6569 15 11C15 9.34315 13.6569 8 12 8C10.3431 8 9 9.34315 9 11C9 12.6569 10.3431 14 12 14Z"
                                                                    stroke="#0084D4" stroke-width="1.5"
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path
                                                                    d="M17.657 16.657L13.414 20.9C13.039 21.2746 12.5306 21.4851 12.0005 21.4851C11.4704 21.4851 10.962 21.2746 10.587 20.9L6.343 16.657C5.22422 15.5382 4.46234 14.1127 4.15369 12.5609C3.84504 11.009 4.00349 9.40053 4.60901 7.93874C5.21452 6.47696 6.2399 5.22755 7.55548 4.34852C8.87107 3.46949 10.4178 3.00031 12 3.00031C13.5822 3.00031 15.1289 3.46949 16.4445 4.34852C17.7601 5.22755 18.7855 6.47696 19.391 7.93874C19.9965 9.40053 20.155 11.009 19.8463 12.5609C19.5377 14.1127 18.7758 15.5382 17.657 16.657V16.657Z"
                                                                    stroke="#0084D4" stroke-width="1.5"
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_400_1895">
                                                                    <rect width="24" height="24" fill="white" />
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                            <input id="passengers_{{$key}}_nationality" required value="{{ oldValue('nationality',$passenger) }}" name="passengers[{{ $key }}][nationality]" type="text"
                                                             class="form-control indexed">
                                                        </div>
                                                    </div> --}}

                                                        <div class="col-md-6 form-group with-icon white-bg">
                                                            <label for="">State (required)</label>
                                                            <div class="input-group">
                                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(#clip0_400_1895)">
                                                                        <path
                                                                            d="M12 14C13.6569 14 15 12.6569 15 11C15 9.34315 13.6569 8 12 8C10.3431 8 9 9.34315 9 11C9 12.6569 10.3431 14 12 14Z"
                                                                            stroke="#0084D4" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M17.657 16.657L13.414 20.9C13.039 21.2746 12.5306 21.4851 12.0005 21.4851C11.4704 21.4851 10.962 21.2746 10.587 20.9L6.343 16.657C5.22422 15.5382 4.46234 14.1127 4.15369 12.5609C3.84504 11.009 4.00349 9.40053 4.60901 7.93874C5.21452 6.47696 6.2399 5.22755 7.55548 4.34852C8.87107 3.46949 10.4178 3.00031 12 3.00031C13.5822 3.00031 15.1289 3.46949 16.4445 4.34852C17.7601 5.22755 18.7855 6.47696 19.391 7.93874C19.9965 9.40053 20.155 11.009 19.8463 12.5609C19.5377 14.1127 18.7758 15.5382 17.657 16.657V16.657Z"
                                                                            stroke="#0084D4" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0_400_1895">
                                                                            <rect width="24" height="24"
                                                                                fill="white" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                                <input id="passengers_{{ $key }}_state" required
                                                                    value="{{ oldValue('state', $passenger) }}"
                                                                    name="passengers[{{ $key }}][state]"
                                                                    type="text" class="form-control indexed">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 form-group with-icon white-bg">
                                                            <label for="">Zip Code (required)</label>
                                                            <div class="input-group">
                                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(#clip0_400_1895)">
                                                                        <path
                                                                            d="M12 14C13.6569 14 15 12.6569 15 11C15 9.34315 13.6569 8 12 8C10.3431 8 9 9.34315 9 11C9 12.6569 10.3431 14 12 14Z"
                                                                            stroke="#0084D4" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M17.657 16.657L13.414 20.9C13.039 21.2746 12.5306 21.4851 12.0005 21.4851C11.4704 21.4851 10.962 21.2746 10.587 20.9L6.343 16.657C5.22422 15.5382 4.46234 14.1127 4.15369 12.5609C3.84504 11.009 4.00349 9.40053 4.60901 7.93874C5.21452 6.47696 6.2399 5.22755 7.55548 4.34852C8.87107 3.46949 10.4178 3.00031 12 3.00031C13.5822 3.00031 15.1289 3.46949 16.4445 4.34852C17.7601 5.22755 18.7855 6.47696 19.391 7.93874C19.9965 9.40053 20.155 11.009 19.8463 12.5609C19.5377 14.1127 18.7758 15.5382 17.657 16.657V16.657Z"
                                                                            stroke="#0084D4" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0_400_1895">
                                                                            <rect width="24" height="24"
                                                                                fill="white" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                                <input id="passengers_{{ $key }}_zip_code"
                                                                    required
                                                                    value="{{ oldValue('zip_code', $passenger) }}"
                                                                    name="passengers[{{ $key }}][zip_code]"
                                                                    type="text" class="form-control indexed">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 form-group with-icon white-bg">
                                                            <label for="">Address (required)</label>
                                                            <div class="input-group">
                                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(#clip0_400_1895)">
                                                                        <path
                                                                            d="M12 14C13.6569 14 15 12.6569 15 11C15 9.34315 13.6569 8 12 8C10.3431 8 9 9.34315 9 11C9 12.6569 10.3431 14 12 14Z"
                                                                            stroke="#0084D4" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M17.657 16.657L13.414 20.9C13.039 21.2746 12.5306 21.4851 12.0005 21.4851C11.4704 21.4851 10.962 21.2746 10.587 20.9L6.343 16.657C5.22422 15.5382 4.46234 14.1127 4.15369 12.5609C3.84504 11.009 4.00349 9.40053 4.60901 7.93874C5.21452 6.47696 6.2399 5.22755 7.55548 4.34852C8.87107 3.46949 10.4178 3.00031 12 3.00031C13.5822 3.00031 15.1289 3.46949 16.4445 4.34852C17.7601 5.22755 18.7855 6.47696 19.391 7.93874C19.9965 9.40053 20.155 11.009 19.8463 12.5609C19.5377 14.1127 18.7758 15.5382 17.657 16.657V16.657Z"
                                                                            stroke="#0084D4" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0_400_1895">
                                                                            <rect width="24" height="24"
                                                                                fill="white" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                                {{-- <input type="text" class="form-control" placeholder="Enter your address"> --}}
                                                                <input id="passengers_{{ $key }}_address"
                                                                    required value="{{ oldValue('address', $passenger) }}"
                                                                    name="passengers[{{ $key }}][address]"
                                                                    type="text" class="form-control indexed ">

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            @endforeach

                                            <div class="next-book-form"></div>

                                            <div
                                                class="banner-box p-4 shadow-box d-sm-flex justify-content-between align-items-center">
                                                <p class="font-18 fw-600 text-tertiary">If your planning to travell with a
                                                    friend, you can add them as well.</p>
                                                <button
                                                    class="btn text-primary btn-transparent btn-custom  bordered add-book-form"><span><svg
                                                            width="25" height="24" viewBox="0 0 25 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_89_1331)">
                                                                <path d="M12.5 5V19" stroke="#2D71BC" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M5.5 12H19.5" stroke="#2D71BC"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_89_1331">
                                                                    <rect width="24" height="24" fill="white"
                                                                        transform="translate(0.5)" />
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                        Add another person</span></button>
                                            </div>


                                            <div class="info-box bg-secondary-light mt-40">
                                                <div class="header"><svg width="40" height="41"
                                                        viewBox="0 0 40 41" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M7.075 29.4165L10.4813 36.2227L13.8875 29.4165C13.9905 29.2091 14.1491 29.0345 14.3455 28.912C14.5419 28.7895 14.7685 28.724 15 28.7227H35.625C36.288 28.7227 36.9239 28.4593 37.3928 27.9905C37.8616 27.5216 38.125 26.8857 38.125 26.2227V7.4727C38.125 6.80966 37.8616 6.17378 37.3928 5.70493C36.9239 5.23609 36.288 4.9727 35.625 4.9727H4.375C3.71196 4.9727 3.07607 5.23609 2.60723 5.70493C2.13839 6.17378 1.875 6.80966 1.875 7.4727V26.2227C1.875 26.8857 2.13839 27.5216 2.60723 27.9905C3.07607 28.4593 3.71196 28.7227 4.375 28.7227H5.95625C6.1888 28.7228 6.41671 28.7878 6.61435 28.9104C6.81198 29.0329 6.97151 29.2082 7.075 29.4165Z"
                                                            fill="#F9C33D" />
                                                        <path
                                                            d="M38.125 26.2227C38.125 26.8857 37.8616 27.5216 37.3928 27.9905C36.9239 28.4593 36.288 28.7227 35.625 28.7227H15C14.7674 28.7228 14.5395 28.7878 14.3419 28.9104C14.1443 29.0329 13.9847 29.2082 13.8812 29.4165L10.4813 36.2227L7.075 29.4165C6.97151 29.2082 6.81198 29.0329 6.61435 28.9104C6.41671 28.7878 6.1888 28.7228 5.95625 28.7227H4.375C3.71196 28.7227 3.07607 28.4593 2.60723 27.9905C2.13839 27.5216 1.875 26.8857 1.875 26.2227V7.4727C1.875 6.80966 2.13839 6.17378 2.60723 5.70493C3.07607 5.23609 3.71196 4.9727 4.375 4.9727H8.125V21.2227C8.125 22.5488 8.65178 23.8206 9.58947 24.7582C10.5271 25.6959 11.7989 26.2227 13.125 26.2227H38.125Z"
                                                            fill="#F7A83E" />
                                                        <path
                                                            d="M19.9996 19.3477C19.5092 19.3263 19.0446 19.1219 18.6975 18.7748C18.3504 18.4277 18.146 17.9631 18.1246 17.4727L17.4996 11.2227C17.3371 9.56645 18.4996 8.0977 19.9996 8.0977C21.4871 8.0977 22.6496 9.5477 22.4996 11.2227L21.8746 17.4727C21.8531 17.9631 21.6487 18.4277 21.3016 18.7748C20.9545 19.1219 20.49 19.3263 19.9996 19.3477Z"
                                                            fill="white" />
                                                        <path
                                                            d="M20 25.5977C21.0355 25.5977 21.875 24.7582 21.875 23.7227C21.875 22.6872 21.0355 21.8477 20 21.8477C18.9645 21.8477 18.125 22.6872 18.125 23.7227C18.125 24.7582 18.9645 25.5977 20 25.5977Z"
                                                            fill="white" />
                                                    </svg>
                                                    Important Information</div>
                                                <ul class="star-list custom-list">
                                                    <li> Name Should be Matched with your Passport.</li>
                                                    <li>The Complete Information of Lead Traveller is required.</li>
                                                    <li>All the information of you is safely handled by Travel adventure
                                                        Nepal administration Team.</li>
                                                    <li>We Shall use your Personal Information for Official Propose (Getting
                                                        Travel Permits, National Park and Trekking Permits) on your Behalf
                                                        and Travel Adventure Nepal’s Office Use Like Emergency Contact,
                                                        Cancellation, Refund etc</li>
                                                    <li>Acclimatise safety on a well-paced trek.</li>
                                                    <li>Please go through our <a
                                                            href="{{ route('website.trips.note', ['trip' => $trip->slug]) }}">Trip
                                                            Notes</a> and <a
                                                            href="{{ route('website.page', 'term-condition') }}">Terms
                                                            Conditions</a> before Proceeding.</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-5 mt-md-0">

                                            @include('website::trips.booking.sidebar', [
                                                'trip' => $trip,
                                                'departure' => $departure,
                                            ])
                                        </div>

                                    </div>
                                    <div class="col-md-8">
                                        <div class="btn-wrapper text-end mt-40">
                                            <button type="submit" class="btn btn-custom btn-primary">Continue to
                                                arrangements </button>
                                        </div>
                                        <div
                                            class="btn-wrapper text-end mt-40 d-md-none position-fixed w-100 start-0 bottom-0 bookContinueBtnMobile">
                                            <button type="submit"
                                                class="btn btn-custom btn-primary w-100 rounded-0"><span>Continue to
                                                    arrangements</span></button>
                                        </div>
                                    </div>
                                    </form>
                                </fieldset>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@section('js')
    @if ($errors->any())
        <script>
            var errors = {!! json_encode($errors->getMessages()) !!};
            $.each(errors, function(k, v) {
                var attrId = k.replace(/\./g, "_");
                // console.log(v);
                $("#" + attrId).addClass('red-border');
                $("#" + attrId).parent('.input-group').after("<p class='travelCreateError'>" + v + "</p>");

            });

            $('#errorToastMessage').text("Opps Invalid Data Provided");
            $('#errorToastStatus').text("Error");
            $('.toaster-wrapper-error').show();
        </script>
    @endif
    <script>
        // $('.dates').datepicker({
        //     format: 'dd-mm-yyyy',
        // });
        var custom_form_rules = {
            errorClass: 'redborder1 error',
            errorElement: "span",
            errorPlacement: function(error, element) {}

        };

        function calculateTotalPrice() {
            console.log($('.book-form').length);
            var total_count = parseInt($('.book-form').length);
            var total_price = {{ $departure->cost_price }} * total_count;
            $("div.booking_price").html('$ ' + total_price + ' AUD');
        }

        $(document).ready(function() {

            $(document).on('click', '.remove-passenger', function(e) {
                e.preventDefault();
                $(this).closest('.book-form').remove();
                calculateTotalPrice();
            });

            var curIndex = {{ count($passengers) - 1 }};
            $(document).on('click', ".add-book-form", function(e) {
                e.preventDefault();
                var clonedForm = $("#book-form").clone();

                // $('.date-picker').select2();


                $(clonedForm).find('input.is_lead').val(0);
                // clonedForm.reset();
                curIndex = curIndex + 1;
                $(clonedForm).find('.indexed').each(function(k, v) {
                    // console.log()
                    var oldName = $(v).attr('name');
                    var oldId = $(v).attr('id');
                    $(v).val("");

                    var newName = oldName.replace("passengers[0]", "passengers[" + curIndex + "]");
                    var newId = oldId.replace("passengers_0", "passengers_" + curIndex);
                    $(v).attr('name', newName);
                    $(v).attr('id', newId);
                    // console.log(v);

                });

                $(clonedForm).find('.remove-passenger').show();

                clonedForm.appendTo(".next-book-form").find('form').trigger('reset');
                // $('.dates').datepicker('destroy');
                // $('.dates').datepicker({
                //     format:'dd-mm-yyyy',
                // });
                // $(".date-picker").flatpickr();
                // $('.js-example-basic-single').select2("destroy");
                // $('.js-example-basic-single').select2();

                calculateTotalPrice();
            });
        });
    </script>
@stop
