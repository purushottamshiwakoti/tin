@extends('backend::layouts.master')
@section('css')

@stop
@section('content')
    <div class="card">
        @include('backend::partials.edit-add-header', ['route_str' => 'regions'])
        <div class="card-block">
            <hr>
            <form id="main"
                action="{{ $region ? route('admin.regions.update', $region->id) : route('admin.regions.store') }}"
                method="post" enctype="multipart/form-data" novalidate>
                {{ csrf_field() }}
                @if ($region)
                    <input name="_method" type="hidden" value="PUT">
                @endif

                <div class="form-group {{ $errors->has('destination_id') ? '' : '' }} row">
                    <label class="col-sm-2 col-form-label">Destination</label>
                    <div class="col-sm-10">
                        <select name="destination_id"
                            class="select2-single col-sm-12 {{ $errors->has('destination__id') ? 'form-control-danger' : '' }}"
                            required>
                            <optgroup label="Destination">
                                @foreach ($destinations as $destination)
                                    <option value="{{ $destination->id }}"
                                        {{ optional($region)->destination_id == $destination->id ? 'selected' : '' }}>
                                        {{ $destination->title }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('activity_id') ? '' : '' }} row">
                    <label class="col-sm-2 col-form-label">Activity</label>
                    <div class="col-sm-10">
                        <select name="activity_id" id="activity_id"
                            class="select2-single col-sm-12 {{ $errors->has('activity_id') ? 'form-control-danger' : '' }}"
                            required>
                            <optgroup label="Activities">
                                @foreach ($activities as $activity)
                                    <option value="{{ $activity->id }}"
                                        {{ optional($region)->activity_id == $activity->id ? 'selected' : '' }}>
                                        {{ $activity->title }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('title') ? '' : '' }} row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input data-validate="required" type="text" name="title" required
                            value="{{ oldValue('title', $region) }}" placeholder="Title"
                            class="form-control {{ $errors->has('title') ? 'form-control-danger' : '' }}">
                        <span class="messages"></span>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('caption') ? '' : '' }} row">
                    <label class="col-sm-2 col-form-label">Caption</label>
                    <div class="col-sm-10">
                        <input data-validate="required" type="text" name="caption" required
                            value="{{ oldValue('caption', $region) }}" placeholder="Title"
                            class="form-control {{ $errors->has('caption') ? 'form-control-danger' : '' }}">
                        <span class="messages"></span>
                    </div>
                </div>

                @include('backend::partials.cover-image', ['data' => $region])
                @include('backend::partials.attachments', ['data' => $region])
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea rows="5" name="description" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('description', $region) }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description1</label>
                    <div class="col-sm-10">
                        <textarea rows="5" name="description1" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('description1', $region) }}</textarea>
                    </div>
                </div>

                @include('backend::partials.metas', ['data' => $region])

                <div class="form-group {{ $errors->has('publish_types') ? '' : '' }} row">
                    <label class="col-sm-2 col-form-label">Publish Types</label>
                    <div class="col-sm-10">
                        <select name="publish_types[]" id="publish_types" class="js-example-tags col-sm-12"
                            multiple="multiple">
                            @foreach ($region_options as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('publish') ? '' : '' }} row">
                    <label class="col-sm-2 col-form-label">Publish</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="publish" value="0">
                        <input type="checkbox" name="publish" class="js-single" value="1"
                            {{ oldValue('publish', $region) ? 'checked' : '' }} />
                    </div>
                </div>

                <div class="form-group {{ $errors->has('show_on_navbar') ? '' : '' }} row">
                    <label class="col-sm-2 col-form-label">Show on navbar</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="show_on_navbar" value="0">
                        <input type="checkbox" name="show_on_navbar" class="js-single-child" value="1"
                            {{ oldValue('show_on_navbar', $region) ? 'checked' : '' }} />
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

    @if ($region)
        <script>
            $(document).ready(function() {
                var value = {!! json_encode($region->publish_types) !!};

                $('#publish_types').val(value).trigger('change');
            });
        </script>
    @endif
@stop
