@extends('backend::layouts.master')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.standalone.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ public_asset('admin/assets/pages/nestable/nestable.css') }}">
    <style>
        .departschedule{min-width: 25%;}
        .departpricing{min-width: 50%!important;}
        .select2-container{width: 100%!important;}
        .ck-editor{
            width: inherit !important;
            min-height: 30px;
        }
        .tier_pricing .mainwrap .row {
            margin-right: 0;
            padding: 0;
            margin-left: 0;
            max-width: 100%;
        }
        .tier_pricing{width:100%;margin-left: 0;}
        .mainwrap .row .col6 {
            margin-top: 15px;
            /* float: left; */
        }
        .departpricing .btndeladd{margin-right: -100px;}
    </style>
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
                            <a class="nav-link" data-toggle="tab" href="#alternate-itinerary" role="tab">Alternate Itinerary</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#others" role="tab">Others</a>
                            <div class="slide"></div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#fixed-departures" role="tab">Fixed Departures</a>
                            <div class="slide"></div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#icons" role="tab">Infos</a>
                            <div class="slide"></div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#notes" role="tab">Trip Notes</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#gallery" role="tab">Gallery</a>
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
            <form id="main" action="{{ ($trip)?route('admin.trips.update',$trip->id):route('admin.trips.store') }}" method="post" enctype="multipart/form-data" novalidate>
                {{ csrf_field() }}
                <button class="btn btn-mat waves-effect waves-light btn-success" id="submitTripBtn" type="submit">Submit</button>
                <hr>
                @if($trip)<input name="_method" type="hidden" value="PUT">@endif
                <div class="tab-content tabs-left-content">
                    <div class="tab-pane active" id="details" role="tabpanel">
                        <div class="form-group {{ $errors->has('destination_id')?'':'' }} row">
                        <label class="col-sm-2 col-form-label">Trip Of</label>
                        <div class="form-radio">
                                <div class="radio radio-inline">
                                    <label>
                                        <input class="tripable_type" type="radio" name="tripable_type" value="region">
                                        <i class="helper"></i>Region
                                    </label>
                                </div>
                                <div class="radio radio-inline">
                                    <label>
                                        <input type="radio" class="tripable_type" name="tripable_type" value="activity">
                                        <i class="helper"></i>Activity
                                    </label>
                                </div>
                        </div>
                        </div>
                        {{-- {{dd($trip)}} --}}
                        <div class="form-group {{ $errors->has('destination_id')?'':'' }} row">
                            <label class="col-sm-2 col-form-label">Destination</label>
                            <div class="col-sm-10">
                                <select name="destination_id" class="select2-single col-sm-12 {{ $errors->has('destination__id')?'form-control-danger':'' }}" required>
                                    <optgroup label="Destination">
                                    @foreach($destinations as $destination)
                                        <option value="{{ $destination->id }}" {{ oldValue('destination_id',$trip) == $destination->id?'selected':'' }}>{{ $destination->title }}</option>
                                    @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('activity_id')?'':'' }} row tripable" id="trip_activity">
                            <label class="col-sm-2 col-form-label">Activity</label>
                            <div class="col-sm-10">
                                <select name="activity_tripable_id" id="tripable_id" class="select2-single col-sm-12 {{ $errors->has('activity_id')?'form-control-danger':'' }}" required>
                                    <optgroup label="Activities">
                                    @foreach($activities as $activity)
                                        <option value="{{ $activity->id }}" {{ optional($trip)->tripable_id == $activity->id?'selected':'' }}>{{ $activity->title }}</option>
                                    @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('tripable_id')?'':'' }} row tripable" id="trip_region">
                            <label class="col-sm-2 col-form-label">Region</label>
                            <div class="col-sm-10">
                                <select name="region_tripable_id" id="tripable_id" class="select2-single col-sm-12 {{ $errors->has('tripable_id')?'form-control-danger':'' }}" required>
                                    <optgroup label="Regions">
                                        @foreach($regions as $region)
                                            <option value="{{ $region->id }}" {{ optional($trip)->tripable_id == $region->id?'selected':'' }}>{{ $region->title }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        
                        <div class="form-group {{ $errors->has('travelStyles')?'':'' }} row " id="travelStyles">
                            <label class="col-sm-2 col-form-label">TravelStyles</label>
                            <div class="col-sm-10">
                                
                                <select multiple="multiple" name="travelStyles[]" id="travelStyles" class="select2-single col-sm-12 {{ $errors->has('travelStyles')?'form-control-danger':'' }}" required>
                                    <optgroup label="travelStyles">
                                        @foreach($travelstyle as $travel)
                                            <option value="{{ $travel->id }}"  @if($trip != null && $trip->travelStyles != null && $trip->travelStyles->find($travel->id) != null) selected  @endif>{{ $travel->title }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                       


                        <div class="form-group {{ $errors->has('title')?'':'' }} row">
                            <label class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" value="{{ oldValue('title',$trip) }}" placeholder="Title" class="form-control {{ $errors->has('title')?'form-control-danger':'' }}" required>
                                <span class="messages"></span>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('slug')?'':'' }} row">
                            <label class="col-sm-2 col-form-label">Slug</label>
                            <div class="col-sm-10">
                                <input type="text" name="slug" value="{{ oldValue('slug',$trip) }}" placeholder="Slug" class="form-control {{ $errors->has('slug')?'form-control-danger':'' }}" >
                                <span class="messages"></span>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('trip_code')?'':'' }} row">
                            <label class="col-sm-2 col-form-label">Trip Code</label>
                            <div class="col-sm-10">
                                <input type="text" name="trip_code" value="{{ oldValue('trip_code',$trip) }}" placeholder="Trip Code" class="form-control trip-code {{ $errors->has('trip_code')?'form-control-danger':'' }}" required>
                                <span class="messages" id="tripCode"></span>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('youtube_code')?'':'' }} row">
                            <label class="col-sm-2 col-form-label">Youtube Code</label>
                            <div class="col-sm-10">
                                <input type="text" name="youtube_code" value="{{ oldValue('youtube_code',$trip) }}" placeholder="Youtube Code" class="form-control {{ $errors->has('trip_code')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Caption</label>
                            <div class="col-sm-10">
                                <input type="text" name="caption" value="{{ oldValue('caption',$trip) }}" placeholder="Caption" class="form-control {{ $errors->has('caption')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Feature Image</label>
                        
                            <div class="col-sm-10">
                                <p>
                                    *For sliders(1366*500), page and trip(1920*750),  *Image (1366x400) for others.
                                </p>
                                <input type="file" name="cover_image" class="form-control">
                                @if($trip && $trip->coverImage)
                                    @php
                                    $attachment = $trip->coverImage;
                                    @endphp
                                    <div class="deleteArena">                                     
                                            <div class="deleteBox">
                                                <a href="{{ asset('ruploads/'.$attachment->media->file_name) }}" target="_blank">
                                                    <img src="{{ asset('ruploads/'.$attachment->media->file_name) }}" class="img-thumbnail" style="width:200px;">
                                                </a>
                                                <a href="{{ route('admin.attachments.destroy',$attachment->id) }}" target="_self" id="" class="customBtn btn ajaxDelete btn-danger btn-xs" style="" data-confirm="Are you sure you want to delete this image?" data-url="">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @include('backend::partials.attachments',['data'=>$trip])
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Overview</label>
                            <div class="col-sm-10">
                                <textarea rows="5" name="overview" cols="5" class="form-control tinymce" placeholder="Overview">{{ oldValue('overview',$trip) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Duration</label>
                            <div class="col-sm-10">
                                <input type="text" name="duration" value="{{ oldValue('duration',$trip) }}" placeholder="Duration" class="form-control {{ $errors->has('duration')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Difficulty</label>
                            <div class="col-sm-10">
                                <input type="number" name="difficulty" value="{{ oldValue('difficulty',$trip) }}" placeholder="Difficulty" class="form-control {{ $errors->has('difficulty')?'form-control-danger':'' }}" min="0" max="10">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Flight Info</label>
                            <div class="col-sm-10">
                                <input type="number" name="flight_info" value="{{ oldValue('flight_info',$trip) }}" placeholder="Flight Info" class="form-control {{ $errors->has('flight_info')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Old Price</label>
                            <div class="col-sm-10">
                                <input type="text" name="old_price" value="{{ oldValue('old_price',$trip) }}" placeholder="Old Price" class="form-control {{ $errors->has('old_price')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input type="text" name="price" value="{{ oldValue('price',$trip) }}" placeholder="Price" class="form-control {{ $errors->has('price')?'form-control-danger':'' }}" required>
                                <span class="messages"></span>
                            </div>
                        </div>

                        @include('backend::partials.metas',['data'=>$trip])

                        <div class="form-group {{ $errors->has('order')?'':'' }} row">
                            <label class="col-sm-2 col-form-label">Order</label>
                            <div class="col-sm-10">
                                <input type="text" name="order" value="{{ oldValue('order',$trip) }}" placeholder="Order" class="form-control {{ $errors->has('order')?'form-control-danger':'' }}">
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('publish_types')?'':'' }} row">
                            <label class="col-sm-2 col-form-label">Publish Types</label>
                            <div class="col-sm-10">
                                <select name="publish_types[]" id="publish_types" class="js-example-tags col-sm-12" multiple="multiple">
                                    @foreach($trip_options as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('publish')?'':'' }} row">
                            <label class="col-sm-2 col-form-label">Publish</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="publish" value="0">
                                <input type="checkbox" name="publish" class="js-single" value="1" {{ oldValue('publish',$trip)?'checked':'' }} />
                            </div>
                        </div>

                        
                        <hr/>
                        <div class="clearfix"></div>
                    </div>
                    <div class="tab-pane" id="itinerary" role="tabpanel">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Highlights</label>
                            <div class="col-sm-10">
                                <textarea rows="5" name="itinerary[short_description]" cols="5" class="form-control tinymce" placeholder="Short Description">{{ oldValue('short_description',optional($trip)->itinerary) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row appendable">
                        <label class="col-sm-2 col-form-label">Full Description</label>
                            <div id="sortable" style="" class="w-100">

                            @if($trip && $trip->itinerary)

                                @foreach($trip->itinerary->full_description as $description)
                                <div class="main_content_desc appended_div ui-state-default">
                                    <div class="col-md-10 mainwrap">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input type="text" name="itinerary[full_description][days][]" placeholder="Day" value="{{ $description->days }}" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="itinerary[full_description][title][]" value="{{ $description->title }}" placeholder="Title" class="form-control">
                                            </div>
                                            <span class="pcoded-micon handle"><i data-feather="move"></i></span>
                                        </div>
                                        <div class="col-md-10 description">
                                            <textarea rows="5" cols="5" name="itinerary[full_description][description][]" class="form-control descriptions editor">{{ $description->description }}</textarea>
                                            {{--<input type="text" name="itinerary[description][]" placeholder="Description" class="form-control">--}}
                                        </div>
                                        <div class="col-md-2 btndeladd">
                                            <div class="grp-btn">
                                                <a href="#" style="" class="btn btn-danger waves-effect waves-light tier_delete">
                                                    <span class="fas fa-trash"></span>

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                @endforeach

                            @endif
                            <div class="clearfix"></div>
                            <div id="tier_pricing" class="tier_pricing">
                                <div class="appended_div main_content_desc  ui-state-default">
                                    <div class="col-md-10 mainwrap pl-0 ">
                                        <div class="row">
                                        <div class="col-md-2 pl-0">
                                        <input type="text" name="itinerary[full_description][days][]" placeholder="Day" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="itinerary[full_description][title][]" placeholder="Title" class="form-control">
                                        </div>
                                            <span class="pcoded-micon handle"><i data-feather="move"></i></span>
                                        </div>
                                    <div class="col-md-10 description">
                                        <textarea rows="5" cols="5" name="itinerary[full_description][description][]" class="form-control descriptions editor"></textarea>
                                        {{--<input type="text" name="itinerary[description][]" placeholder="Description" class="form-control">--}}
                                    </div>
                                    <div class="col-md-2 btndeladd">
                                        <div class="grp-btn">
                                            <a href="#" style="display: none" class="btn btn-danger waves-effect waves-light tier_delete">
                                                <span class="fas fa-trash"></span>

                                            </a>
                                            <a href="#" class="btn btn-primary waves-effect waves-light tier_add tier_add_btn" id="tier_add"><span class="fa fa-plus-circle"></span></a>
                                        </div>
                                    </div>
                                </div>
                                    <hr>
                                </div>  
                            </div>
                            <div id="tier_price_append" class="tier_price_append tier_pricing"></div>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Map Iframe</label>
                            <div class="col-sm-10">
                                <input type="text" name="itinerary[map_iframe]" value="{{ oldValue('map_iframe',optional($trip)->itinerary) }}" placeholder="Map Iframe" class="form-control {{ $errors->has('price')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="tab-pane" id="alternate-itinerary" role="tabpanel">
                        <ul class="nav nav-tabs md-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#alt-itinerary" role="tab" aria-selected="true">Itinerary</a>
                                <div class="slide"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#other-notes" role="tab" aria-selected="false">Other Notes</a>
                                <div class="slide"></div>
                            </li>
                        </ul>
                        <div class="tab-content card-block">
                            <div class="tab-pane active show" id="alt-itinerary" role="tabpanel">
                        <div class="form-group row appendable">
                            <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Alternate Overview</label>
                                <div class="col-sm-8">
                                    <textarea rows="5" name="alternate_overview" cols="5" class="form-control tinymce" placeholder="Alternate Overview">{{ oldValue('alternate_overview',$trip) }}</textarea>
                                </div>
                            </div>
                            </div>
                            <label class="col-sm-2 col-form-label">Alternate Itinerary</label>
                            @php
                                $alternates = old('alternate_itinerary');
                                if($alternates)
                                {
                                    $alternates = json_decode(json_encode(array_filter(array_map('array_filter',$alternates))));
                                    $alternateIndexValue = count($alternates);

                                }else{
                                    $alternates = ($trip && $trip->alternateItinerary)?$trip->alternateItinerary:[];
                                    $alternateIndexValue = count($alternates);
                                }

                            @endphp

                            @if($alternates)

                                <div class="main_content_desc appended_div">

                                </div>

                                @foreach($alternates as $key=>$alternate)

                                    @if(isset($alternate->value))
                                        <div class="main_content_desc appended_div">
                                            <div class="col-md-12">
                                                <div class=" row" style="margin-bottom: 15px">
                                                    <input type="hidden" id="alternate_itinerary_{{ $key }}_id" name="alternate_itinerary[{{ $key }}][id]" class="indexed" value="{{ optional($alternate)->id }}">
                                                    <input type="hidden" id="alternate_itinerary_{{ $key }}_type" name="alternate_itinerary[{{ $key }}][type]" class="indexed" value="notes">
                                                    <div class="col-md-10 col6">
                                                        <input type="text" id="alternate_itinerary_{{ $key }}_key" name="alternate_itinerary[{{ $key }}][key]" placeholder="Key" value="{{ $alternate->key }}" class="form-control indexed">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="grp-btn row">
                                                            <a href="#" style="" class="btn btn-danger waves-effect waves-light tier_delete">
                                                                <span class="fas fa-trash"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-10 col6 row">
                                                    <textarea type="text" cols="5" rows="5" id="alternate_itinerary_{{ $key }}_value" name="alternate_itinerary[{{ $key }}][value]" placeholder="Value" class="form-control editor indexed">{{ $alternate->value }}</textarea>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        {{--@endif--}}
                                    @endif
                                        @php
                                            $key = $key+1;
                                        @endphp
                                @endforeach

                            @endif
                            <div class="clearfix"></div>
                            <div id="tier_pricing" class="tier_pricing">
                                <div class="appended_div main_content_desc">
                                    <div class="col-md-12">
                                        <div class=" row" style="margin-bottom: 15px">
                                            <div class="col-md-10 col6">
                                                <input type="hidden" name="alternate_itinerary[{{ $alternateIndexValue }}][type]" value="alternate_itinerary">
                                                <input type="text" id="alternate_itinerary_{{ $alternateIndexValue }}_key" name="alternate_itinerary[{{ $alternateIndexValue }}][key]" placeholder="Key" class="form-control indexed">
                                            </div>
                                            <div class="col-md-2">
                                                <div class="grp-btn row">
                                                    <a href="#" style="display: none" class="btn btn-danger waves-effect waves-light tier_delete">
                                                        <span class="fas fa-trash"></span>
                                                    </a>
                                                    <a href="#" class="btn btn-primary waves-effect waves-light alternate_add tier_add_btn" id="alternate_add"><span class="fa fa-plus-circle"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col6 row">
                                            <textarea type="text" cols="12" rows="10" id="alternate_itinerary_{{ $alternateIndexValue }}_value" name="alternate_itinerary[{{ $alternateIndexValue }}][value]" placeholder="Value" class="form-control editor indexed new">
                                            </textarea>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div id="tier_price_append" class="tier_price_append alternate_append" style="margin-left: 0!important;width: 100%!important;"></div>
                        </div>
                            </div>
                            <div class="tab-pane" id="other-notes" role="tabpanel">
                                <div class="form-group row appendable">

                                    <label class="col-sm-2 col-form-label">Other Notes</label>
                                    @php
                                        $alternateNotes = old('alternate_notes');
                                        if($alternateNotes)
                                        {
                                            $alternateNotes = json_decode(json_encode(array_filter(array_map('array_filter',$alternateNotes))));
                                            $alternateNoteIndexValue = count($alternateNotes);

                                        }else{
                                            $alternateNotes = ($trip && $trip->alternateNotes)?$trip->alternateNotes:[];
                                            $alternateNoteIndexValue = count($alternateNotes);
                                        }

                                    @endphp

                                    @if($alternates)

                                        <div class="main_content_desc appended_div">

                                        </div>

                                        @foreach($alternateNotes as $key=>$alternateNote)

                                            @if(isset($alternateNote->value))
                                                <div class="main_content_desc appended_div">
                                                    <div class="col-md-12">
                                                        <div class=" row" style="margin-bottom: 15px">
                                                            <input type="hidden" id="alternate_notes_{{ $key }}_id" name="alternate_notes[{{ $key }}][id]" class="indexed" value="{{ optional($alternateNote)->id }}">
                                                            <input type="hidden" id="alternate_notes_{{ $key }}_type" name="alternate_notes[{{ $key }}][type]" class="indexed" value="notes">
                                                            <div class="col-md-10 col6">
                                                                <input type="text" id="alternate_notes_{{ $key }}_key" name="alternate_notes[{{ $key }}][key]" placeholder="Key" value="{{ $alternateNote->key }}" class="form-control indexed">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="grp-btn row">
                                                                    <a href="#" style="" class="btn btn-danger waves-effect waves-light tier_delete">
                                                                        <span class="fas fa-trash"></span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-10 col6 row">
                                                            <textarea type="text" cols="5" rows="5" id="alternate_notes_{{ $key }}_value" name="alternate_notes[{{ $key }}][value]" placeholder="Value" class="form-control editor indexed">{{ $alternateNote->value }}</textarea>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                                {{--@endif--}}
                                            @endif
                                            @php
                                                $key = $key+1;
                                            @endphp
                                        @endforeach

                                    @endif
                                    <div class="clearfix"></div>
                                    <div id="tier_pricing" class="tier_pricing">
                                        <div class="appended_div main_content_desc">
                                            <div class="col-md-12">
                                                <div class=" row" style="margin-bottom: 15px">
                                                    <div class="col-md-10 col6">
                                                        <input type="hidden" name="alternate_notes[{{ $alternateNoteIndexValue }}][type]" value="alternate_notes">
                                                        <input type="text" id="alternate_notes_{{ $alternateNoteIndexValue }}_key" name="alternate_notes[{{ $alternateNoteIndexValue }}][key]" placeholder="Key" class="form-control indexed">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="grp-btn row">
                                                            <a href="#" style="display: none" class="btn btn-danger waves-effect waves-light tier_delete">
                                                                <span class="fas fa-trash"></span>
                                                            </a>
                                                            <a href="#" class="btn btn-primary waves-effect waves-light alternate_notes_add tier_add_btn" id="alternate_notes_add"><span class="fa fa-plus-circle"></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-10 col6 row">
                                            <textarea type="text" cols="12" rows="10" id="alternate_notes_{{ $alternateNoteIndexValue }}_value" name="alternate_notes[{{ $alternateNoteIndexValue }}][value]" placeholder="Value" class="form-control editor indexed new">
                                            </textarea>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    <div id="tier_price_append" class="tier_price_append alternate_notes_append" style="margin-left: 0!important;width: 100%!important;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="others" role="tabpanel">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Things to Know</label>
                            <div class="col-sm-10">
                                <textarea rows="5" name="itinerary[key_points]" cols="5" class="form-control tinymce" placeholder="Things To Know">{{ oldValue('key_points',optional($trip)->itinerary) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Equipment</label>
                            <div class="col-sm-10">
                                <textarea rows="5" name="itinerary[equipment]" cols="5" class="form-control tinymce" placeholder="Equipment">{{ oldValue('equipment',optional($trip)->itinerary) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Price Include</label>
                            <div class="col-sm-10">
                                <textarea rows="5" name="itinerary[price_include]" cols="5" class="form-control tinymce" placeholder="Price Include">{{ oldValue('price_include',optional($trip)->itinerary) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Price Exclude</label>
                            <div class="col-sm-10">
                                <textarea rows="5" name="itinerary[price_exclude]" cols="5" class="form-control tinymce" placeholder="Price Exclude">{{ oldValue('price_exclude',optional($trip)->itinerary) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="fixed-departures" role="tabpanel">
                        <div class="form-group {{ $errors->has('has_departure')?'':'' }} row">
                            <label class="col-sm-2 col-form-label">Has Fixed Departure?</label>
                            <div class="col-sm-10 d-flex align-items-center">
                                <input type="hidden" name="has_departure" value="0">
                                <input type="checkbox" name="has_departure" class="js-single" value="1" {{ oldValue('has_departure',$trip)?'checked':'' }} />
                            </div>
                        </div>
                        <div class="form-group row appendable departure-schedule">
                            <label class="col-sm-2 col-form-label departschedule">Departure Schedule</label>


                            @php
                            $indexValue = ($trip && $trip->fixedDepartures)?$trip->fixedDepartures->count():0;
                            @endphp
                            @if($trip && $trip->fixedDepartures)

                                @foreach($trip->fixedDepartures as $key=>$departure)
                                {{-- {{dd($departure)}} --}}
                                    <div class="main_content_desc appended_div">
                                        <div class="col-md-12 mainwrap">
                                            <div class="col-md-10 row">
                                                <div class="col-md-6 col6">
                                                    <input type="hidden" name="fixed_departures[{{ $key }}][id]" value="{{ $departure->id }}">
                                                    <input type="text" value="{{ $departure->start_date }}" name="fixed_departures[{{ $key }}][start_date]" placeholder="Start Date" class="form-control start_date dates">
                                                </div>
                                                <div class="col-md-6 col6">
                                                    <input type="text" value="{{ $departure->finish_date }}" name="fixed_departures[{{ $key }}][finish_date]" placeholder="Finish Date" class="form-control end_date dates">
                                                </div>
                                            </div>

                                            <div class="col-md-10 row">
                                                <div class="col-md-6 col6">
                                                    <select name="fixed_departures[{{ $key }}][availability]" class="select2-tags col-sm-12">
                                                        @foreach($trip_availability as $item)
                                                            <option value="{{ $item }}" {{ $departure->availability == $item?"selected":"" }}>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col6 row">

                                                    <div class="col-md-6">
                                                    <input type="text" name="fixed_departures[{{ $key }}][price]" placeholder="Price" class="form-control" value="{{ $departure->price }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                    <input type="text" name="fixed_departures[{{ $key }}][size]" placeholder="Size" class="form-control" value="{{ $departure->size }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col6">
                                                    <div class="col-md-6">
                                                        Include Flight Info
                                                        <input type="hidden" name="fixed_departures[{{ $key }}][include_flight_info]" value="0">
                                                        <input type="checkbox" name="fixed_departures[{{ $key }}][include_flight_info]" class="js-single" value="1" {{ $departure->include_flight_info?'checked':'' }} />

                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 btndeladd">
                                                <div class="grp-btn">
                                                    <a href="#" style="" class="btn btn-danger waves-effect waves-light tier_delete">
                                                        <span class="fas fa-trash"></span>

                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                @endforeach

                            @endif
                            <div class="clearfix"></div>
                            <div id="tier_pricing" class="tier_pricing departpricing">
                                <div class="appended_div main_content_desc ml-0 w-100">
                                    <div class="col-md-12 mainwrap">
                                        <div class="col-md-10 row">

                                            <div class="col-md-6 col6">
                                                <input type="text" name="fixed_departures[{{ $indexValue }}][start_date]" placeholder="Start Date" class="form-control indexed start_date dates">
                                            </div>
                                            <div class="col-md-6 col6">
                                                <input type="text" name="fixed_departures[{{ $indexValue }}][finish_date]" placeholder="Finish Date" class="form-control indexed end_date dates">
                                            </div>
                                        </div>

                                        <div class="col-md-10 row">
                                            <div class="col-md-6 col6">
                                                <select name="fixed_departures[{{ $indexValue }}][availability]" class="select2-tags indexed col-sm-12">
                                                    @foreach($trip_availability as $item)
                                                        <option value="{{ $item }}" >{{ $item }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 col6 row">
                                                <div class="col-md-6">
                                                    <input type="text" name="fixed_departures[{{ $indexValue }}][price]" placeholder="Price" class="form-control indexed" value="">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="fixed_departures[{{ $indexValue }}][size]" placeholder="Size" class="form-control indexed" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col6">
                                                <div class="col-md-6">
                                                    Include Flight Info
                                                    <input type="hidden" name="fixed_departures[{{ $indexValue }}][include_flight_info]" value="0">
                                                    <input type="checkbox" name="fixed_departures[{{ $indexValue }}][include_flight_info]" class="js-single" value="1"/>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-2 btndeladd">
                                            <div class="grp-btn">
                                                <a href="#" style="display: none" class="btn btn-danger waves-effect waves-light tier_delete">
                                                    <span class="fas fa-trash"></span>

                                                </a>
                                                <a href="#" class="btn btn-primary waves-effect waves-light fixed_add tier_add_btn" id="tier_add"><span class="fa fa-plus-circle"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div id="tier_price_append" class="tier_price_append fixed_append tier_pricing"></div>
                        </div>

                    </div>
                    <div class="tab-pane" id="icons" role="tabpanel">
                        <div class="form-group row appendable">
                            <label class="col-sm-2 col-form-label departschedule">Key Values</label>



                            @php
                                $extraValues = old('extra_info');
                                   if($extraValues)
                                   {
                                       $extraValues = json_decode(json_encode(array_filter(array_map('array_filter',$extraValues))));


                                   }else{
                                       $extraValues = ($trip && $trip->extraValues)?$trip->extraValues:[];
                                   }
                                   $extraIndexValue = count($extraValues);
                            @endphp

                            @if($extraValues)
                                @foreach($extraValues as $key=>$extraInfo)
                                    <div class="main_content_desc appended_div">
                                        <div class="col-md-12 mainwrap">
                                            <div class="col-md-10 row">
                                                <div class="col-md-6 col6">
                                                    <select  id="extra_info_{{ $key }}_key" name="extra_info[{{ $key }}][key]" class="js-example-templating col-sm-12">

                                                    </select>
                                                </div>
                                                <div class="col-md-6 col6">
                                                    <input type="text" value="{{ $extraInfo->value }}" name="extra_info[{{ $key }}][value]" placeholder="Value" class="form-control">
                                                </div>


                                            </div>


                                            <div class="col-md-2 btndeladd">
                                                <div class="grp-btn">
                                                    <a href="#" style="" class="btn btn-danger waves-effect waves-light tier_delete">
                                                        <span class="fas fa-trash"></span>

                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                @endforeach

                            @endif
                            <div class="clearfix"></div>
                            <div id="tier_pricing" class="tier_pricing departpricing">
                                <div class="appended_div main_content_desc ml-0">
                                    <div class="col-md-12 mainwrap pl-0">
                                        <div class="col-md-10 row w-75" >
                                            <div class="col-md-6 col6">
                                                <select id="extra_info_{{ $extraIndexValue }}_key" name="extra_info[{{ $extraIndexValue }}][key]" class="js-example-templating indexed col-sm-12">
                                                </select>
                                            </div>

                                            <div class="col-md-6 col6">
                                                <input type="text" name="extra_info[{{ $extraIndexValue }}][value]" placeholder="Value" class="form-control indexed">
                                            </div>

                                        </div>


                                        <div class="col-md-2 btndeladd">
                                            <div class="grp-btn">
                                                <a href="#" style="display: none" class="btn btn-danger waves-effect waves-light tier_delete">
                                                    <span class="fas fa-trash"></span>
                                                </a>
                                                <a href="#" class="btn btn-primary waves-effect waves-light extra_add tier_add_btn" id="extra_add"><span class="fa fa-plus-circle"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div id="tier_price_append" class="tier_price_append extra_append tier_pricing"></div>
                        </div>
                    </div>
                    <div class="tab-pane" id="notes" role="tabpanel">

                        <div class="form-group row appendable">
                            <label class="col-sm-2 col-form-label">Trip Notes</label>
                            @php
                                $tripNotes = old('trip_notes');
                                if($tripNotes)
                                {
                                    $tripNotes = json_decode(json_encode(array_filter(array_map('array_filter',$tripNotes))));
                                    $noteIndexValue = count($tripNotes)+1;

                                }else{
                                    $tripNotes = ($trip && $trip->tripNotes)?$trip->tripNotes:[];
                                    $noteIndexValue = count($tripNotes)+1;
                                }
                            $noteKey = $note_keys;
                            @endphp

                            @if($tripNotes)
                                @php
                                $validDate = $tripNotes->where('slug','valid-date')->first();
                                @endphp
                                <div class="main_content_desc appended_div">
                                    <div class="col-md-12">
                                        <div class=" row" style="margin-bottom: 15px">
                                            <input type="hidden" id="trip_notes_0_id" name="trip_notes[0][id]" class="indexed" value="{{ optional($validDate)->id }}">
                                            <input type="hidden" id="trip_notes_0_type" name="trip_notes[0][type]" class="indexed" value="notes">
                                            <div class="col-md-10 col6">
                                                <input type="hidden" id="trip_notes_0_key" name="trip_notes[0][key]" placeholder="Key" value="valid-date" class="form-control indexed">
                                            </div>
                                        </div>
                                        <div class="col-md-10 col6 row">
                                            <label>Valid Date</label>
                                            <input type="text" id="trip_notes_0_value" name="trip_notes[0][value]" placeholder="Value" class="form-control dates indexed" value="{{ optional($validDate)->value }}">
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @php
                            $filteredNotes = $tripNotes->filter(function($item){
                            return $item->slug!='valid-date';
                            });
                            
                            @endphp
                                    @foreach($filteredNotes->values() as $key=>$tripNote)
                                        @php
                                            $key = $key+1;
                                        @endphp
                                        @if(isset($tripNote->value))
                                            {{--@if($tripNote->slug == 'valid-date')--}}

                                                {{--@else--}}
                                        <div class="main_content_desc appended_div">
                                            <div class="col-md-12">
                                                <div class=" row" style="margin-bottom: 15px">
                                                    <input type="hidden" id="trip_notes_{{ $key }}_id" name="trip_notes[{{ $key }}][id]" class="indexed" value="{{ optional($tripNote)->id }}">
                                                    <input type="hidden" id="trip_notes_{{ $key }}_type" name="trip_notes[{{ $key }}][type]" class="indexed" value="notes">
                                                    <div class="col-md-10 col6">
                                                        <select type="text" id="trip_notes_{{ $key }}_key" name="trip_notes[{{ $key }}][key]" placeholder="Key" value="{{ $tripNote->key }}" class="select2-tags  form-control indexed">
                                                            @foreach( $noteKey as $item)
                                                                <option value="{{ $item }}" {{ $tripNote->key==$item?'selected':'' }}>{{ $item }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="grp-btn row">
                                                            <a href="#" style="" class="btn btn-danger waves-effect waves-light tier_delete">
                                                                <span class="fas fa-trash"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-10 col6 row">
                                            <textarea type="text" cols="5" rows="5" id="trip_notes_{{ $key }}_value" name="trip_notes[{{ $key }}][value]" placeholder="Value" class="form-control editor indexed">{{ $tripNote->value }}</textarea>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                                {{--@endif--}}
                                    @endif
                                @endforeach

                            @endif
                            <div class="clearfix"></div>
                            <div id="tier_pricing" class="tier_pricing">
                                <div class="appended_div main_content_desc">
                                    <div class="col-md-12">
                                        <div class=" row" style="margin-bottom: 15px">
                                            <div class="col-md-10 col6">
                                                <input type="hidden" name="trip_notes[{{ $noteIndexValue }}][type]" value="notes">
                                                <select type="text" id="trip_notes_{{ $noteIndexValue }}_key" name="trip_notes[{{ $noteIndexValue }}][key]" placeholder="Key" class="select2-tags indexed">
                                                    @foreach( $noteKey as $item)
                                                        <option value="{{ $item }}">{{ $item }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="grp-btn row">
                                                    <a href="#" style="display: none" class="btn btn-danger waves-effect waves-light tier_delete">
                                                        <span class="fas fa-trash"></span>
                                                    </a>
                                                    <a href="#" class="btn btn-primary waves-effect waves-light notes_add tier_add_btn" id="notes_add"><span class="fa fa-plus-circle"></span></a>
                                                </div>
                                            </div>



                                        </div>
                                        <div class="col-md-10 col6 row">
                                            <textarea type="text" cols="12" rows="10" id="trip_notes_{{ $noteIndexValue }}_value" name="trip_notes[{{ $noteIndexValue }}][value]" placeholder="Value" class="form-control editor indexed new">
                                            </textarea>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div id="tier_price_append" class="tier_price_append notes_append tier_pricing"></div>
                        </div>
                    </div>
                    
                    <div class="tab-pane" id="gallery" role="tabpanel">

                        @include('backend::partials.multiple-image',['field'=>'gallery','size'=>'','data'=>$trip])

                    </div>
                   


                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
@stop

@section('javascript')
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>

    <script>
        var trip_id = 0;
        $(document).ready(function(e){
            var trip_id = <?php echo isset($trip) ? $trip->id : 0; ?>;
            if(trip_id == 0)
            {
                $("#submitTripBtn").attr('disabled',true);
            }
        });
        $('.trip-code').on('input',function(e){

            var trip_code = $(this).val();
            $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    })
                    $.ajax({
                        url: "{{ route('admin.check.trip-code') }}",
                        data: {'trip_code':trip_code,'trip_id':trip_id},
                        method: 'POST',
                        dataType: 'json',
                        beforeSend: function()
                        {
                            $('#tripCode').text(' ');
                        },
                        success: function(response) {

                            if(response.status)
                            {
                                $("#submitTripBtn").attr('disabled',false);
                            } else {
                                $("#submitTripBtn").attr('disabled',true);
                                $('#tripCode').text('You must fill this and should be unique').css('color','red');
                            }

                        },
                        error: function(xhr) {
              
                                            }
                    });


        });
    </script>

    <script>

       function makeCk()
        {
            $('.editor:visible:not(.added)').each(function () {
                ClassicEditor
                    .create( this,{
                        toolbar: [ 'bold', 'italic', 'link','blockQuote','bulletedList','numberedList']
                    }  ).then(editor=>{
                        // console.log(editor);
                })
                    .catch( error => {
                        console.error( error );
                    } );
            }).addClass('added');

        }

       function makeOneCk()
       {
           $('.editor:hidden:not(.added)').each(function () {
               ClassicEditor
                   .create( this,{
                       toolbar: [ 'bold', 'italic', 'link','blockQuote','bulletedList','numberedList']
                   }  ).then(editor=>{
                   // console.log(editor);
               })
                   .catch( error => {
                       console.error( error );
                   } );
           }).addClass('added');

       }
       makeCk();


    </script>
    @if($trip)
        <script>
            $(document).ready(function () {
                var value = {!!  json_encode($trip->publish_types) !!};

                $('#publish_types').val(value).trigger('change');
            });
        </script>
    @endif
    <script>

        $(document).ready(function () {
            function toggleDeparture(isActive)
            {
                if(isActive)
                {
                    $('.departure-schedule').show();
                }else{
                    $('.departure-schedule').hide();
                }

            }

            $(document).on('change','input[name=has_departure]',function () {
               var isActive = $(this).is(':checked');
               toggleDeparture(isActive);
            });
            toggleDeparture($('input[name=has_departure]').is(":checked"));
            function formatState(state) {
                if (!state.id) {
                    return state.text;
                }
                var asset_url = "{{public_asset("icons/trip")}}";
                var $state = $(
                    '<span><img src="' + asset_url + '/' + state.id + '.png" class="img-flag" /> ' + state.text + '</span>'
                );
                return $state;
            }

            var icons = {!! json_encode(config('constants.info-icons')) !!};
            var data = $.map(icons, function (k,v) {
                return {
                    'id':v,
                    'text':k
                };
            });
            $(".js-example-templating").select2({
                templateResult: formatState,
                data:data
            });

            $('input.dates').datepicker({
                format:'yyyy-mm-dd',
                startDate:'+1d'
            });

            $('.tripable_type').on('click',function () {
                $('.tripable').hide();
                $('#trip_'+$('.tripable_type:checked').val()).show();
            });
            var tripable_type = "{{ optional($trip)->tripable_type }}";
            tripable_type = tripable_type?tripable_type:"region";
            $('.tripable_type[value="'+tripable_type+'"]').prop('checked',true).trigger('click');
            // $('.tripable_type').trigger('click');
            // $('.tier_add:last').trigger('click');
            var curIndex = {{ $indexValue }};
            var indexValue = {{ $indexValue }};


            function appendToDiv(event,add_btn,index = 0)
            {
                var cur_form = event.closest('.appendable');
                var append_cont = event.closest('.appendable').find('.tier_pricing').html();
                $(cur_form).find('.'+add_btn).hide();
                $(cur_form).find('.tier_price_append').append(append_cont);
                $(cur_form).find('.tier_price_append').find('.tier_delete').show();
                $(cur_form).find('.tier_price_append').find('.'+add_btn+':last').show();
                $(cur_form).find('.tier_price_append').find('span.select2').remove();
                $(cur_form).find('.tier_price_append').find('.editor').removeClass('added');
                $(cur_form).find('.tier_price_append').find('.ck-editor').remove();

                $('.dates').datepicker('destroy');
                $('.dates').datepicker({
                    format:'yyyy-mm-dd',
                    startDate:'+1d'
                });
                $(".select2-tags").select2({
                    tags: true
                });
            }

            function makeValues(selector,nameKey,newIndex,currentIndex)
            {
                console.log(selector);

                $(selector).find('.appended_div:last').find('.indexed').each(function (k,v) {
                    var oldName = $(v).attr('name');
                    var oldId = $(v).attr('id');
                    var newName = oldName.replace(nameKey+"["+currentIndex+"]",nameKey+"["+newIndex+"]");
                    $(v).attr('name',newName);
                    console.log(newName);
                    if(oldId){
                        var newId = oldId.replace(nameKey+"_"+currentIndex+"_",nameKey+"_"+newIndex+"_");
                        $(v).attr('id',newId);
                    }

                });

            }

            $(document).on('click','.fixed_add',function (e) {
                e.preventDefault();
                appendToDiv($(this),'fixed_add');
                curIndex = curIndex+1;
                $(".fixed_append").find('.appended_div:last').find('.indexed').each(function (k,v) {
                    var oldName = $(v).attr('name');

                    var newName = oldName.replace("fixed_departures["+indexValue+"]","fixed_departures["+curIndex+"]");
                    $(v).attr('name',newName);

                    console.log($(v).attr('name'));
                })

            });

            $(document).on('click','.tier_add',function (e) {
                e.preventDefault();
                appendToDiv($(this),'tier_add');
                makeOneCk();

            });

            var noteIndex = {{ $noteIndexValue }};
            var noteIndexValue = {{ $noteIndexValue }};

            $(document).on('click','.notes_add',function (e) {
                e.preventDefault();
                appendToDiv($(this),'notes_add');
                noteIndex = noteIndex + 1;
                makeValues('.notes_append','trip_notes',noteIndex,noteIndexValue);
                makeOneCk();
            });

            var alternateIndex = {{ $alternateIndexValue }};
            var alternateIndexValue = {{ $alternateIndexValue }};

            $(document).on('click','.alternate_add',function (e) {
                e.preventDefault();
                appendToDiv($(this),'alternate_add');
                alternateIndex = alternateIndex + 1;
                makeValues('.alternate_append','alternate_itinerary',alternateIndex,alternateIndexValue);
                makeOneCk();
            });

            var alternateNoteIndex = {{ $alternateNoteIndexValue }};
            var alternateNoteIndexValue = {{ $alternateNoteIndexValue }};

            $(document).on('click','.alternate_notes_add',function (e) {
                e.preventDefault();
                appendToDiv($(this),'alternate_notes_add');
                alternateNoteIndex = alternateNoteIndex + 1;
                makeValues('.alternate_notes_append','alternate_notes',alternateNoteIndex,alternateNoteIndexValue);
                makeOneCk();
            });
            // $('.notes_add').trigger('click');

            var newIndex = {{ $extraIndexValue }};
            var newIndexValue = {{ $extraIndexValue }};
            $(document).on('click','.extra_add',function (e) {
                e.preventDefault();
                appendToDiv($(this),'extra_add');
                newIndex = newIndex+1;
                makeValues('.extra_append','extra_info',newIndex,newIndexValue);

                // $(".extra_append").find('.appended_div:last').find('.indexed').each(function (k,v) {
                //     var oldName = $(v).attr('name');
                //     var oldId = $(v).attr('id');
                //
                //     var newName = oldName.replace("extra_info["+newIndexValue+"]","extra_info["+newIndex+"]");
                //
                //     $(v).attr('name',newName);
                //     if(oldId){
                //         var newId = oldId.replace("extra_info_"+newIndexValue+"_","extra_info_"+newIndex+"_");
                //         $(v).attr('id',newId);
                //     }
                //
                // });
                $(".js-example-templating").select2({
                    templateResult: formatState,
                    data:data
                });

            });

            $(document).on('change','input.start_date',function () {
               var date = $(this).datepicker('getDate','+1d');
               date.setDate(date.getDate()+1);
               $(this).closest('.row').find('.end_date').datepicker('setDate',date);
            });

            $(document).on('click','.tier_delete',function (e) {
                e.preventDefault();
                if(!confirm('Are you sure?')){
                    return false;
                }
                // var cur_form = $(this).closest('.panel');
                // var cur_form = $("#main");
                cur_id = $(this).closest('.appendable').closest('.tab-pane').attr('id');
                $(this).closest('.appended_div').remove();
                $("#"+cur_id).find('.appended_div:last').find('.tier_add_btn').show();
            });

        });
        $('#sortable').sortable({axis: "y",handle:'.handle',items:'.appended_div',placeholder: "ui-state-highlight",helper:'clone',scroll: true, scrollSensitivity: 100,scrollSpeed: 100,
            sort: function(event, ui) {
                var currentScrollTop = $(window).scrollTop(),
                    topHelper = ui.position.top,
                    winHeight =$( window ).height(),
                    delta = topHelper - currentScrollTop,
                    winMaxHeight = winHeight + delta;
                if((winHeight>topHelper && currentScrollTop>200) || (winHeight)<topHelper)
                setTimeout(function() {
                    $(window).scrollTop(currentScrollTop + delta);
                }, 5);
            }});

    </script>
    @if($trip)
        <script>
            $(document).ready(function () {

                var trip_values = {!! json_encode($trip->extraValues) !!};
                $.each(trip_values, function (k,v) {
                    $("#extra_info_"+k+"_key").val(v.key).trigger('change');
                });
            });
        </script>
    @endif
@stop