@extends('backend::layouts.master')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.standalone.min.css" />
@stop
@section('content')
    <div class="card">
        @include('backend::partials.edit-add-header',['route_str'=>'posts','slug'=>$post?$post->slug:'','show_prev'=>$post?true:false])
        <div class="card-block">
            <hr>
            <form id="main" action="{{ ($post)?route('admin.posts.update',$post->id):route('admin.posts.store') }}" method="post" enctype="multipart/form-data" novalidate>
                {{ csrf_field() }}
                @if($post)<input name="_method" type="hidden" value="PUT">@endif
                <div class="form-group {{ $errors->has('title')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{ oldValue('title',$post) }}" placeholder="Title" class="form-control {{ $errors->has('title')?'form-control-danger':'' }}" required>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('slug')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Slug</label>
                    <div class="col-sm-10">
                        <input type="text" name="slug" value="{{ oldValue('slug',$post) }}" placeholder="Slug" class="form-control {{ $errors->has('slug')?'form-control-danger':'' }}">
                    </div>
                </div>
                <div class="form-group {{ $errors->has('category_id')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <select name="category_id" class="select2-single col-sm-12 {{ $errors->has('category_id')?'form-control-danger':'' }}" required>
                            <optgroup label="Categories">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ oldValue('category_id',$category) == $category->id?'selected':'' }}>{{ $category->title }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                </div>

                @include('backend::partials.attachments',['data'=>$post])
                @include('backend::partials.cover-image',['data'=>$post])

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Body</label>
                    <div class="col-sm-10">
                        <textarea rows="5" name="body" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('body',$post) }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Excerpt</label>
                    <div class="col-sm-10">
                        <textarea rows="5" name="excerpt" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('excerpt',$post) }}</textarea>
                    </div>
                </div>
                @include('backend::partials.image',['field'=>'footer_image','size'=>'*Size(800*450)','data'=>$post])

                @include('backend::partials.metas',['data'=>$post])

                <div class="form-group {{ $errors->has('publish_types')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Publish Types</label>
                    <div class="col-sm-10">
                        <select name="publish_types[]" id="publish_types" class="js-example-tags col-sm-12" multiple="multiple">
                            @foreach($post_options as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('tags')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Tags</label>
                    <div class="col-sm-10">
                        <select name="tags[]" id="tags" class="js-example-tags col-sm-12" multiple="multiple">
                            @foreach($tags as $tag)
                                <option value="{{ $tag }}">{{ $tag }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('publish')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Publish</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="publish" value="0">
                        <input type="checkbox" name="publish" class="js-single" value="1" {{ oldValue('publish',$post)?'checked':'' }} />
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
    @if($post)
        <script>
            $(document).ready(function () {
                var value = {!!   json_encode($post->publish_types) !!};
                var tags = {!!   json_encode($post->tags) !!};

                $('#publish_types').val(value).trigger('change');
                $('#tags').val(tags).trigger('change');
            });

        </script>
    @endif
@stop