@extends('backend::layouts.master')
@section('css')
@stop
@section('content')
    <div class="card">
        @include('backend::partials.edit-add-header', ['route_str' => 'activities'])
        <div class="card-block">
            <hr>
            <form id="main"
                action="{{ $activity ? route('admin.activities.update', $activity->id) : route('admin.activities.store') }}"
                method="post" enctype="multipart/form-data" novalidate>
                {{ csrf_field() }}
                @if ($activity)
                    <input name="_method" type="hidden" value="PUT">
                @endif
                <div class="form-group {{ $errors->has('title') ? '' : '' }} row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{ oldValue('title', $activity) }}" placeholder="Title"
                            class="form-control {{ $errors->has('title') ? 'form-control-danger' : '' }}" required>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('caption') ? '' : '' }} row">
                    <label class="col-sm-2 col-form-label">Caption</label>
                    <div class="col-sm-10">
                        <input type="text" name="caption" value="{{ oldValue('caption', $activity) }}"
                            placeholder="Caption"
                            class="form-control {{ $errors->has('caption') ? 'form-control-danger' : '' }}">
                    </div>
                </div>

                @include('backend::partials.cover-image', ['data' => $activity])
                @include('backend::partials.attachments', ['data' => $activity])
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea rows="5" name="description" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('description', $activity) }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description1</label>
                    <div class="col-sm-10">
                        <textarea rows="5" name="description1" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('description1', $activity) }}</textarea>
                    </div>
                </div>

                @include('backend::partials.metas', ['data' => $activity])

                <div class="form-group {{ $errors->has('publish_types') ? '' : '' }} row">
                    <label class="col-sm-2 col-form-label">Publish Types</label>
                    <div class="col-sm-10">
                        <select name="publish_types[]" id="publish_types" class="js-example-tags col-sm-12"
                            multiple="multiple">
                            @foreach ($activity_options as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('publish') ? '' : '' }} row">
                    <label class="col-sm-2 col-form-label">Publish</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="publish" value="0">
                        <input type="checkbox" name="publish" class="js-single" value="1"
                            {{ oldValue('publish', $activity) ? 'checked' : '' }} />
                    </div>
                </div>


                <hr />
                <div class="clearfix"></div>
                <button class="btn btn-mat waves-effect waves-light btn-success" type="submit">Submit</button>
            </form>


        </div>
    </div>
@stop

@section('javascript')
    @if ($activity)
        <script>
            $(document).ready(function() {
                var value = {!! json_encode($activity->publish_types) !!};
                // $('#publish_types').append(['sldf']).trigger('change.select2');
                $('#publish_types').val(value).trigger('change');
            });
        </script>
    @endif
@stop
