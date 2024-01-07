@extends('backend::layouts.master')
@section('content')
    <div class="card">
        @include('backend::partials.edit-add-header',['route_str'=>'travelstyles'])
        <div class="card-block">
            <hr>
            <form id="main" action="{{ ($travelstyle)?route('admin.travelstyles.update',$travelstyle->id):route('admin.travelstyles.store') }}" method="post" enctype="multipart/form-data" novalidate>
                {{ csrf_field() }}
                @if($travelstyle)<input name="_method" type="hidden" value="PUT">@endif
                <div class="form-group {{ $errors->has('title')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{ oldValue('title',$travelstyle) }}" placeholder="Title" class="form-control {{ $errors->has('title')?'form-control-danger':'' }}" required>
                    </div>
                </div>
             
            
                <div class="form-group {{ $errors->has('expert')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Excerpt </label>
                    <div class="col-sm-10">
                        <input type="text" name="excerpt" value="{{ oldValue('excerpt',$travelstyle) }}" placeholder="excerpt" class="form-control {{ $errors->has('excerpt')?'form-control-danger':'' }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea rows="5" name="description" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('description',$travelstyle) }}</textarea>
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