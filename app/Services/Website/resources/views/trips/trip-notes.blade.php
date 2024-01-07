@extends('website::layouts.master')
@section('content')

<section class="print-welcome-page py-40">
    <div class="container">
        <div class="row">
            <div class="col-12 logo-wrapper">
                <img src="{{ asset('website/assets/img/logo.png') }}" alt="logo">
            </div>
        </div>
    </div>
</section>

<section class="detail-content general-page py-60 mt-80" id="tripNotePagePrint">
    <div class="container">
        <div class="row">
            <div class="col-md-8 detail-wrapper">
                <div class="header">
                    <p>Plan your trip with Travel Adventure Nepal</p>
                    <h1>{{$trip->title}}</h1>
                </div>
                <div class="feature-wrapper">
                    @foreach($trip->extraValues as $extraValue)
                    <div class="item col-4">
                        <img src="{{public_asset("icons/trip/$extraValue->key.png")}}" alt="{{ $extraValue->key }}">
                       {{$extraValue->value}}
                    </div>
                    @endforeach
                </div>
                <div class="content-wrapper nav-content overview" id="overview">
                    <div class="header">
                        <h5>Overview</h5>
                    </div>
                    <p>{!!$trip->overview!!} </p>

                </div>
                @if(!empty($trip->itinerary->short_description))

                <div class="content-wrapper nav-content highlights" id="highlights">
                    <div class="header">
                        <h5>Highlights</h5>
                    </div>
                    <ul class="blue-tick custom-list">
                        {!!$trip->itinerary->short_description!!}
                    </ul>
                </div>
                @endif
                @if(!empty($trip->itinerary->key_points))

                <div class="content-wrapper nav-content things-to-know" id="things-to-know">
                    <div class="header">
                        <h5>Things to Know</h5>
                    </div>
                    <ul class="blue-tick custom-list">
                    {!!$trip->itinerary->key_points!!}
                    </ul>
                </div>
                @endif
                @if(!empty($trip->itinerary))

                <div class="content-wrapper nav-content itineries" id="itineries">
                    <div class="header d-flex justify-content-between align-items-center">
                        <div>Itinerary</div>
                        <div class="font-14 text-primary-variant view-all-accordion cursor-pointer">View All</div>
                    </div>
                    <div class="accordion itinery" id="accordionExample">
                        @foreach($trip->itinerary->full_description as $key=>$itinerary_desc)

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{$key+1}}">
                                <button data-days="{{$key+1}}" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$key+1}}" aria-expanded="true" aria-controls="collapse{{$key+1}}">
                                    <span>Day {{ $itinerary_desc->days }}</span>{{ $itinerary_desc->title }}
                                </button>
                            </h2>
                            <div id="collapse{{$key+1}}" class="accordion-collapse collapse @if($key+1 == 1) show @endif" aria-labelledby="heading{{$key+1}}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {!!($itinerary_desc->description) !!}

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                @if(!empty($trip->itinerary->price_include))
                <div class="content-wrapper nav-content includes" id="includes">
                    <div class="header">
                        <h5>Included Services</h5>
                    </div>
                    <ul class="green-tick custom-list">
                    {!!$trip->itinerary->price_include!!}
                    </ul>
                </div>
                @endif

                @if(!empty($trip->itinerary->price_include))
                <div class="content-wrapper nav-content excludes" id="excludes">
                    <div class="header">
                        <h5>Excluded Services</h5>
                    </div>
                    <ul class="red-tick custom-list">
                        {!!$trip->itinerary->price_exclude!!}
                    </ul>   
                </div>
                @endif

                @foreach($trip->tripNotes as $note)
                <div class="content-wrapper nav-content overview" id="notes{{ $note->id }}">
                    <div class="header">
                        <h5>{{ $note->key }}</h5>
                    </div>
                    <p>{!!$note->value!!} </p>

                </div>
                @endforeach

       
            </div>
            <div class="col-md-4 sidebar">
                <div class="header">
                    <div class="right-content d-flex mb-3">
                        <a onclick="window.print()" class="me-3">
                            <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_236_2016)">
                                    <path d="M17 17H19C19.5304 17 20.0391 16.7893 20.4142 16.4142C20.7893 16.0391 21 15.5304 21 15V11C21 10.4696 20.7893 9.96086 20.4142 9.58579C20.0391 9.21071 19.5304 9 19 9H5C4.46957 9 3.96086 9.21071 3.58579 9.58579C3.21071 9.96086 3 10.4696 3 11V15C3 15.5304 3.21071 16.0391 3.58579 16.4142C3.96086 16.7893 4.46957 17 5 17H7" stroke="#2D71BC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M17 9V5C17 4.46957 16.7893 3.96086 16.4142 3.58579C16.0391 3.21071 15.5304 3 15 3H9C8.46957 3 7.96086 3.21071 7.58579 3.58579C7.21071 3.96086 7 4.46957 7 5V9" stroke="#2D71BC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M15 13H9C7.89543 13 7 13.8954 7 15V19C7 20.1046 7.89543 21 9 21H15C16.1046 21 17 20.1046 17 19V15C17 13.8954 16.1046 13 15 13Z" stroke="#2D71BC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                                <defs>
                                    <clipPath id="clip0_236_2016">
                                        <rect width="24" height="24" fill="white"></rect>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                        <a href="#">
                            <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_236_2009)">
                                    <path d="M6 15C7.65685 15 9 13.6569 9 12C9 10.3431 7.65685 9 6 9C4.34315 9 3 10.3431 3 12C3 13.6569 4.34315 15 6 15Z" stroke="#2D71BC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M18 9C19.6569 9 21 7.65685 21 6C21 4.34315 19.6569 3 18 3C16.3431 3 15 4.34315 15 6C15 7.65685 16.3431 9 18 9Z" stroke="#2D71BC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M18 21C19.6569 21 21 19.6569 21 18C21 16.3431 19.6569 15 18 15C16.3431 15 15 16.3431 15 18C15 19.6569 16.3431 21 18 21Z" stroke="#2D71BC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M8.7002 10.7L15.3002 7.29999" stroke="#2D71BC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M8.7002 13.3L15.3002 16.7" stroke="#2D71BC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                                <defs>
                                    <clipPath id="clip0_236_2009">
                                        <rect width="24" height="24" fill="white"></rect>
                                    </clipPath>
                                </defs>
                            </svg>

                        </a>
                    </div>
                </div>
                <div class="content-wrapper">
                    <ul>
                        @foreach($trip->tripNotes as $note)
                        <li><a href="#notes{{ $note->id }}">{{ $note->key }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@include('website::partials.query-banner') 

@endsection