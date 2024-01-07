@extends('backend::layouts.master')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.standalone.min.css" />
@stop
@section('content')
    <div class="card">
        @include('backend::partials.edit-add-header',['route_str'=>'offers'])
        <div class="card-block">
            <hr>
            <form id="main" action="{{ ($offer)?route('admin.offers.update',$offer->id):route('admin.offers.store') }}" method="post" enctype="multipart/form-data" novalidate>
                {{ csrf_field() }}
                @if($offer)<input name="_method" type="hidden" value="PUT">@endif
                <div class="form-group {{ $errors->has('title')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{ oldValue('title',$offer) }}" placeholder="Title" class="form-control {{ $errors->has('title')?'form-control-danger':'' }}" required>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('offerable_id')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Trip</label>
                    <div class="col-sm-10">
                        <select name="offerable_id" class="select2-single col-sm-12 {{ $errors->has('offerable_id')?'form-control-danger':'' }}" required>
                            <optgroup label="Departures">
                                @foreach($trips as $trip)
                                    <option value="{{ $trip->id }}" {{ oldValue('offerable_id',$trip) == $trip->id?'selected':'' }}>{{ $trip->title }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="offerable_type" value="departure">
                <div class="form-group {{ $errors->has('start_date')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Start Date</label>
                    <div class="col-sm-10">
                        <input type="text" name="start_date" value="{{ oldValue('start_date',$offer) }}" placeholder="Start Date" class="dates start_date form-control {{ $errors->has('start_date')?'form-control-danger':'' }}">
                    </div>
                </div>

                <div class="form-group {{ $errors->has('finish_date')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">End Date</label>
                    <div class="col-sm-10">
                        <input type="text" name="finish_date" value="{{ oldValue('finish_date',$offer) }}" placeholder="End Date" class="dates finish_date form-control {{ $errors->has('finish_date')?'form-control-danger':'' }}">
                    </div>
                </div>


                @include('backend::partials.attachments',['data'=>$offer])
                <div class="form-group {{ $errors->has('remaining')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Remaining</label>
                    <div class="col-sm-10">
                        <input type="number" name="remaining" value="{{ oldValue('remaining',$offer) }}" placeholder="Remaining" class="form-control {{ $errors->has('remaining')?'form-control-danger':'' }}" min="0">
                    </div>
                </div>

                <div class="form-group {{ $errors->has('discount')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Discount</label>
                    <div class="col-sm-10">
                        <input type="number" name="discount" value="{{ oldValue('discount',$offer)? :0 }}" placeholder="Discount" class="form-control {{ $errors->has('discount')?'form-control-danger':'' }}" min="0">
                    </div>
                </div>

                <div class="form-group {{ $errors->has('link')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Link</label>
                    <div class="col-sm-10">
                        <input type="link" name="link" value="{{ oldValue('link',$offer) }}" placeholder="Link" class="form-control {{ $errors->has('link')?'form-control-danger':'' }}">
                    </div>
                </div>

                <div class="form-group {{ $errors->has('publish')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Publish</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="publish" value="0">
                        <input type="checkbox" name="publish" class="js-single" value="1" {{ oldValue('publish',$offer)?'checked':'' }} />
                    </div>
                </div>


                <hr/>
                <div class="clearfix"></div>
                <button class="btn btn-mat waves-effect waves-light btn-success" type="submit">Submit</button>
            </form>


        </div>
    </div>
@stop

@section('javascript')

@stop