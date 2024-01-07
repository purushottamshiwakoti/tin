@extends('backend::layouts.master')
@section('css')
@stop
@section('content')
    <div class="card">
        @include('backend::partials.edit-add-header',['route_str'=>'ratings'])
        <div class="card-block">
            <hr>
            <form id="main" action="{{ ($rating)?route('admin.ratings.update',$rating->id):route('admin.ratings.store') }}" method="post" enctype="multipart/form-data" novalidate>
                {{ csrf_field() }}
                @if($rating)<input name="_method" type="hidden" value="PUT">@endif
                <div class="form-group {{ $errors->has('title')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{ oldValue('title',$rating) }}" placeholder="Title" class="form-control {{ $errors->has('title')?'form-control-danger':'' }}" required>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('ratable_id')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Trip</label>
                    <div class="col-sm-10">
                        <select name="ratable_id" class="select2-single col-sm-12 {{ $errors->has('ratable_id')?'form-control-danger':'' }}" required>
                            <optgroup label="Destination">
                                @foreach($trips as $trip)
                                    <option value="{{ $trip->id }}" {{ oldValue('ratable_id',$rating) == $trip->id?'selected':'' }}>{{ $trip->title }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="ratable_type" value="trip">
                <div class="form-group {{ $errors->has('full_name')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="full_name" value="{{ oldValue('full_name',$rating) }}" placeholder="Full Name" class="form-control {{ $errors->has('full_name')?'form-control-danger':'' }}">
                    </div>
                </div>

                <div class="form-group {{ $errors->has('email')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" value="{{ oldValue('email',$rating) }}" placeholder="Email" class="form-control {{ $errors->has('email')?'form-control-danger':'' }}">
                    </div>
                </div>
                <div class="form-group {{ $errors->has('phone_number')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" name="phone_number" value="{{ oldValue('phone_number',$rating) }}" placeholder="Phone Number" class="form-control {{ $errors->has('phone_number')?'form-control-danger':'' }}">
                    </div>
                </div>
                @include('backend::partials.attachments',['data'=>$rating])
                <div class="form-group {{ $errors->has('rating_value')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Rating</label>
                    <div class="col-sm-10">
                        <input type="number" name="rating_value" value="{{ oldValue('rating_value',$rating) }}" placeholder="Rating" class="form-control {{ $errors->has('rating_value')?'form-control-danger':'' }}" min="0" max="5">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Review</label>
                    <div class="col-sm-10">
                        <textarea rows="5" name="review" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('review',$rating) }}</textarea>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('publish')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Publish</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="publish" value="0">
                        <input type="checkbox" name="publish" class="js-single" value="1" {{ oldValue('publish',$rating)?'checked':'' }} />
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
    @if($rating)
        <script>
            $(document).ready(function () {
                var value = {!!  json_encode($rating->publish_types) !!};
                // $('#publish_types').append(['sldf']).trigger('change.select2');
                $('#publish_types').val(value).trigger('change');
            });

        </script>
    @endif
@stop