@extends('backend::layouts.master')
@section('content')
    <div class="card">
        @include('backend::partials.edit-add-header',['route_str'=>'testimonials'])
        <div class="card-block">
            <hr>
            <form id="main" action="{{ ($testimonial)?route('admin.testimonials.update',$testimonial->id):route('admin.testimonials.store') }}" method="post" enctype="multipart/form-data" novalidate>
                {{ csrf_field() }}
                @if($testimonial)<input name="_method" type="hidden" value="PUT">@endif
                <div class="form-group {{ $errors->has('name')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="{{ oldValue('name',$testimonial) }}" placeholder="Name" class="form-control {{ $errors->has('name')?'form-control-danger':'' }}" required>
                    </div>
                </div>
             
            
                <div class="form-group {{ $errors->has('place')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Place </label>
                    <div class="col-sm-10">
                        <input type="text" name="place" value="{{ oldValue('place',$testimonial) }}" placeholder="place" class="form-control {{ $errors->has('place')?'form-control-danger':'' }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea rows="5" name="description" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('description',$testimonial) }}</textarea>
                    </div>
                </div>
                @include('backend::partials.cover-image',['data'=>$testimonial])

                @include('backend::partials.attachments',['data'=>$testimonial])
                <hr/>
                <div class="clearfix"></div>
                <button class="btn btn-mat waves-effect waves-light btn-success" type="submit">Submit</button>
            </form>


        </div>
    </div>
@stop

@section('javascript')

@stop