@extends('backend::layouts.master')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.standalone.min.css" />
@stop
@section('content')
    <div class="card">
        @include('backend::partials.edit-add-header',['route_str'=>'categories'])
        <div class="card-block">
            <hr>
            <form id="main" action="{{ ($category)?route('admin.categories.update',$category->id):route('admin.categories.store') }}" method="post" enctype="multipart/form-data" novalidate>
                {{ csrf_field() }}
                @if($category)<input name="_method" type="hidden" value="PUT">@endif
                <div class="form-group {{ $errors->has('title')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{ oldValue('title',$category) }}" placeholder="Title" class="form-control {{ $errors->has('title')?'form-control-danger':'' }}" required>
                    </div>
                </div>


                @include('backend::partials.attachments',['data'=>$category])
                @include('backend::partials.cover-image',['data'=>$category])
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea rows="5" name="description" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('description',$category) }}</textarea>
                    </div>
                </div>
                @include('backend::partials.metas',['data'=>$category])



                <hr/>
                <div class="clearfix"></div>
                <button class="btn btn-mat waves-effect waves-light btn-success" type="submit">Submit</button>
            </form>


        </div>
    </div>
@stop

@section('javascript')

@stop