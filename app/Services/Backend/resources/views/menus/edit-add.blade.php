@extends('backend::layouts.master')
@section('content')
    <div class="card">
        @include('backend::partials.edit-add-header',['route_str'=>'menus'])
        <div class="card-block">
            <hr>
            <form action="{{ ($menu)?route('admin.menus.update',['id'=>$menu->id]):route('admin.menus.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @if($menu)<input name="_method" type="hidden" value="PUT">@endif
                <div class="form-group {{ $errors->has('title')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{ oldValue('title',$menu) }}" placeholder="Title" class="form-control {{ $errors->has('title')?'form-control-danger':'' }}">
                    </div>
                </div>
                <div class="form-group {{ $errors->has('caption')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Caption</label>
                    <div class="col-sm-10">
                        <input type="text" name="caption" value="{{ oldValue('caption',$menu) }}" placeholder="Caption" class="form-control {{ $errors->has('caption')?'form-control-danger':'' }}">
                    </div>
                </div>
                @include('backend::partials.cover-image',['data'=>$menu])

                @include('backend::partials.attachments',['data'=>$menu])
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea rows="5" name="description" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('description',$menu) }}</textarea>
                    </div>
                </div>

                @include('backend::partials.metas',['data'=>$menu])
                <hr/>
                <div class="clearfix"></div>
                <button class="btn btn-mat waves-effect waves-light btn-success" type="submit">Submit</button>
            </form>


        </div>
    </div>
@stop

@section('javascript')

@stop