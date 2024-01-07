@extends('backend::layouts.master')
@section('css')
@stop
@section('content')
    <div class="card">
    {{--@include('backend::partials.edit-add-header',['route_str'=>'trips'])--}}
    </div>
    <div class="row">
    <div class="col-xl-3 col-md-6">

        <div class="card">
            <div class="card-block ">
                <div class="row ">
                    <ul class="nav nav-tabs md-tabs tabs-left b-none" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#details" role="tab">Details</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#itinerary" role="tab">Itinerary</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#faqs" role="tab">Faqs</a>
                            <div class="slide"></div>
                        </li>

                    </ul>
                    <!-- Tab panes -->

                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-9 col-md-6">
    <div class="card">


        <div class="card-block">


                <div class="tab-content tabs-left-content">
                <div class="tab-pane active" id="details" role="tabpanel">
                    <div class="m-b-20">
                    <h6 class="sub-title m-b-15">Title</h6>
                    <p>
                        {!! $trip->title !!}
                    </p>
                    </div>
                    <div class="m-b-20">
                        <h6 class="sub-title m-b-15">Destination</h6>
                        <p>
                            {!! $trip->destination->title !!}
                        </p>
                    </div>
                    <div class="m-b-20">
                        <h6 class="sub-title m-b-15">{{ ucfirst($trip->tripable_type) }}</h6>
                        <p>
                            {!! $trip->tripable->title !!}
                        </p>
                    </div>

                    <div class="m-b-20">
                        <h6 class="sub-title m-b-15">Caption</h6>
                        <p>
                            {!! $trip->caption !!}
                        </p>
                    </div>
                    <div class="m-b-20">
                        <h6 class="sub-title m-b-15">Image</h6>
                        @if($trip && $trip->attachments->count()>0)
                            <div class="deleteArena">
                                @foreach($trip->attachments as $attachment)
                                    <div class="deleteBox">
                                        <a href="{{ asset('ruploads/'.$attachment->media->file_name) }}" target="_blank">
                                            <img src="{{ asset('ruploads/'.$attachment->media->file_name) }}" class="img-thumbnail" style="width:200px;">
                                        </a>
                                        <a href="{{ route('admin.attachments.destroy',$attachment->id) }}" target="_self" id="" class="customBtn btn ajaxDelete btn-danger btn-xs" style="" data-confirm="Are you sure you want to delete this image?" data-url="">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="m-b-20">
                        <h6 class="sub-title m-b-15">Overview</h6>
                        <p>
                            {!! $trip->overview !!}
                        </p>
                    </div>
                    <div class="m-b-20">
                        <h6 class="sub-title m-b-15">Duration</h6>
                        <p>
                            {!! $trip->duration !!}
                        </p>
                    </div>
                        <div class="m-b-20">
                            <h6 class="sub-title m-b-15">Price</h6>
                            <p>
                                Old: {!! $trip->old_price !!} New: {!! $trip->price !!}
                            </p>
                        </div>
                        <div class="m-b-20">
                            <h6 class="sub-title m-b-15">Meta Title</h6>
                            <p>
                                {!! $trip->meta_title !!}
                            </p>
                        </div>
                        <div class="m-b-20">
                            <h6 class="sub-title m-b-15">Meta Description</h6>
                            <p>
                                {!! $trip->meta_description !!}
                            </p>
                        </div>
                        <div class="m-b-20">
                            <h6 class="sub-title m-b-15">Meta Keyword</h6>
                            <p>
                                {!! $trip->meta_keywords !!}
                            </p>
                        </div>
                        <div class="m-b-20">
                            <h6 class="sub-title m-b-15">Avg Rating</h6>
                            <p>
                                {!! $trip->average_rating !!}
                            </p>
                        </div>



                </div>
                <div class="tab-pane" id="itinerary" role="tabpanel">

                    <div class="m-b-20">
                        <h6 class="sub-title m-b-15">Short Description</h6>
                        <p>
                            {!! $trip->itinerary->short_description !!}
                        </p>
                    </div>
                    <div class="m-b-20">
                        <h6 class="sub-title m-b-15">Full Description</h6>
                        @foreach($trip->itinerary->full_description as $des)
                            day {!! $des->days !!}: {{ $des->title }}

                        <p>
                            {!! $des->description !!}
                        </p>
                            <hr/>

                        @endforeach
                    </div>
                    <div class="m-b-20">
                        <h6 class="sub-title m-b-15">Equipment</h6>
                        <p>
                            {!! $trip->itinerary->equipment !!}
                        </p>
                    </div>
                    <div class="m-b-20">
                        <h6 class="sub-title m-b-15">Price Included</h6>
                        <p>
                            {!! $trip->itinerary->price_included !!}
                        </p>
                    </div>
                    <div class="m-b-20">
                        <h6 class="sub-title m-b-15">Price Excluded</h6>
                        <p>
                            {!! $trip->itinerary->price_excluded !!}
                        </p>
                    </div>
                    <div class="m-b-20">
                        <h6 class="sub-title m-b-15">Map Iframe</h6>
                        <p>
                            {!! $trip->itinerary->map_iframe !!}
                        </p>
                    </div>
                </div>
                <div class="tab-pane" id="faqs" role="tabpanel">

                </div>

                </div>
        </div>
    </div>
    </div>
    </div>
@stop

@section('javascript')



@stop