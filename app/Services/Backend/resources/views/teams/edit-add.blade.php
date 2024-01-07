@extends('backend::layouts.master')
@section('content')
    <div class="card">
        @include('backend::partials.edit-add-header',['route_str'=>'teams'])
        <div class="card-block">
            <hr>
            <form id="main" action="{{ ($team)?route('admin.teams.update',$team->id):route('admin.teams.store') }}" method="post" enctype="multipart/form-data" novalidate>
                {{ csrf_field() }}
                @if($team)<input name="_method" type="hidden" value="PUT">@endif
                <div class="form-group {{ $errors->has('name')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="{{ oldValue('name',$team) }}" placeholder="Name" class="form-control {{ $errors->has('name')?'form-control-danger':'' }}" required>
                    </div>
                </div>
             
            
                <div class="form-group {{ $errors->has('position')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Position </label>
                    <div class="col-sm-10">
                        <input type="text" name="position" value="{{ oldValue('position',$team) }}" placeholder="position" class="form-control {{ $errors->has('position')?'form-control-danger':'' }}">
                    </div>
                </div>
                <div class="form-group {{ $errors->has('title')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Title </label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{ oldValue('title',$team) }}" placeholder="title" class="form-control {{ $errors->has('title')?'form-control-danger':'' }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea rows="5" name="description" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('description',$team) }}</textarea>
                    </div>
                </div>
                @include('backend::partials.cover-image',['data'=>$team])

                @include('backend::partials.attachments',['data'=>$team])
                <hr/>
                <div class="clearfix"></div>
                <button class="btn btn-mat waves-effect waves-light btn-success" type="submit">Submit</button>
            </form>


        </div>
    </div>
@stop

@section('javascript')

@stop