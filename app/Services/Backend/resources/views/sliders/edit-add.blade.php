@extends('backend::layouts.master')
@section('css')

@stop
@section('content')
    <div class="card">
        @include('backend::partials.edit-add-header',['route_str'=>'sliders'])
        <div class="card-block">
            <hr>
            <form action="{{ ($slider)?route('admin.sliders.update',$slider->id):route('admin.sliders.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @if($slider)<input name="_method" type="hidden" value="PUT">@endif
                <div class="form-group {{ $errors->has('title')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{ oldValue('title',$slider)? :'none' }}" placeholder="Title" class="form-control {{ $errors->has('title')?'form-control-danger':'' }}">
                    </div>
                </div>
                <div class="form-group {{ $errors->has('caption')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Caption</label>
                    <div class="col-sm-10">
                        <input type="text" name="caption" value="{{ oldValue('caption',$slider) }}" placeholder="Caption" class="form-control {{ $errors->has('caption')?'form-control-danger':'' }}">
                    </div>
                </div>

                @include('backend::partials.attachments',['data'=>$slider])
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea rows="5" name="description" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('description',$slider) }}</textarea>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('link_title')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Link Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="link_title" value="{{ oldValue('link_title',$slider) }}" placeholder="Link Title" class="form-control {{ $errors->has('link_title')?'form-control-danger':'' }}">
                    </div>
                </div>
                <div class="form-group {{ $errors->has('link')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Link</label>
                    <div class="col-sm-10">
                        <input type="text" name="link" value="{{ oldValue('link',$slider) }}" placeholder="Link" class="form-control {{ $errors->has('link')?'form-control-danger':'' }}">
                    </div>
                </div>
                <div class="form-group {{ $errors->has('order')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Order</label>
                    <div class="col-sm-10">
                        <input type="number" name="order" value="{{ oldValue('order',$slider)? :0 }}" placeholder="Order" class="form-control {{ $errors->has('order')?'form-control-danger':'' }}" min="0">
                    </div>
                </div>
                <div class="form-group {{ $errors->has('publish')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Publish</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="publish" value="0">
                        <input type="checkbox" name="publish" class="js-single" value="1" {{ oldValue('publish',$slider)?'checked':'' }} />
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