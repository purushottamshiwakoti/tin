@extends('backend::layouts.master')
@section('css')

@stop
@section('content')
    <div class="card">
        @include('backend::partials.edit-add-header', ['route_str' => 'pages'])
        <div class="card-block">
            <hr>

            <form id="main" action="{{ $page ? route('admin.pages.update', $page->id) : route('admin.pages.store') }}"
                method="post" enctype="multipart/form-data" novalidate>
                {{ csrf_field() }}
                @if ($page)
                    <input name="_method" type="hidden" value="PUT">
                @endif
                <div class="form-group {{ $errors->has('title') ? '' : '' }} row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input data-validate="required" type="text" name="page_title" required
                            value="{{ oldValue('page_title', $page) }}" placeholder="Title"
                            class="form-control {{ $errors->has('page_title') ? 'form-control-danger' : '' }}">
                        <span class="messages"></span>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('caption') ? '' : '' }} row">
                    <label class="col-sm-2 col-form-label">Caption</label>
                    <div class="col-sm-10">
                        <input data-validate="required" type="text" name="caption" required
                            value="{{ oldValue('caption', $page) }}" placeholder="Caption"
                            class="form-control {{ $errors->has('page_caption') ? 'form-control-danger' : '' }}">
                        <span class="messages"></span>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('slug') ? '' : '' }} row">
                    <label class="col-sm-2 col-form-label">Slug</label>
                    <div class="col-sm-10">
                        <input data-validate="required" type="text" name="slug" value="{{ oldValue('slug', $page) }}"
                            placeholder="Slug"
                            class="form-control {{ $errors->has('slug') ? 'form-control-danger' : '' }}">
                        <span class="messages"></span>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('template') ? '' : '' }} row">
                    <label class="col-sm-2 col-form-label">Template</label>
                    <div class="col-sm-10">
                        <select name="template" id="template" class="js-example-tags col-sm-12">
                            @foreach ($templates as $key => $template)
                                <option value="{{ $key }}"
                                    {{ oldValue('template', $page) == $key ? 'selected' : '' }}>
                                    {{ $template }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                @include('backend::partials.cover-image', ['data' => $page])
                @include('backend::partials.attachments', ['data' => $page])
                <div class="form-group row">
                    {{-- <div class="form-group row featured_content"> --}}
                        <label class="col-sm-2 col-form-label">Featured Content</label>
                        <div class="col-sm-10">
                            <textarea rows="5" name="featured_content" cols="5" class="form-control tinymce"
                                placeholder="Default textarea">{{ oldValue('featured_content', $page) }}</textarea>
                        {{-- </div> --}}
                    </div>
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea rows="5" name="page_description" cols="5" class="form-control tinymce"
                            placeholder="Default textarea">{{ oldValue('page_description', $page) }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label other_desc">Other Description</label>
                    <div class="col-sm-10">
                        <textarea rows="5" name="other_description" cols="5" class="form-control tinymce"
                            placeholder="Default textarea">{{ oldValue('other_description', $page) }}</textarea>
                    </div>
                </div>



                @include('backend::partials.metas', ['data' => $page])

                <div class="form-group {{ $errors->has('publish_types') ? '' : '' }} row">
                    <label class="col-sm-2 col-form-label">Publish Types</label>
                    <div class="col-sm-10">
                        <select name="publish_types[]" id="publish_types" class="js-example-tags col-sm-12"
                            multiple="multiple">
                            @foreach ($page_options as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group related_pages {{ $errors->has('related_pages') ? '' : '' }} row">
                    <label class="col-sm-2 col-form-label">Related Pages</label>
                    <div class="col-sm-10">
                        <select name="related_pages[]" id="related_pages" class="js-example-tags col-sm-12"
                            multiple="multiple">
                            @foreach ($pages as $item)
                                @if (optional($page)->id !== $item->id)
                                    <option value="{{ $item->id }}">{{ $item->page_title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group featured_trips {{ $errors->has('featured_trips') ? '' : '' }} row">
                    <label class="col-sm-2 col-form-label">Featured Trips</label>
                    <div class="col-sm-10">
                        <select name="featured_trips[]" id="featured_trips" class="js-example-tags col-sm-12"
                            multiple="multiple">
                            @foreach ($trips as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('publish') ? '' : '' }} row">
                    <label class="col-sm-2 col-form-label">Publish</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="publish" value="0">
                        <input type="checkbox" name="publish" class="js-single" value="1"
                            {{ oldValue('publish', $page) ? 'checked' : '' }} />
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

    @if ($page)
        <script>
            $(document).ready(function() {
                var value = {!! json_encode($page->publish_types) !!};

                $('#publish_types').val(value).trigger('change');

                var page_values = {!! json_encode($page->relatedPages->pluck('id')) !!};
                $('#related_pages').val(page_values).trigger('change');
                var featured_trips = {!! json_encode($page->featuredTrips->pluck('id')) !!};
                $('#featured_trips').val(featured_trips).trigger('change');
                changeTemplates($('#template').val())
                $('#template').change(function() {
                    changeTemplates($(this).val())
                });

                function changeTemplates(val) {
                    $('.other_desc').text(val == 'offer-landing' ? 'Model Content' : 'Other Description');
                    if (val == 'offer-landing') {
                        $('.featured_content').show();
                        $('.featured_trips').hide();
                        $('.related_pages').hide();
                    } else {
                        $('.featured_content').hide();
                        $('.featured_trips').show();
                        $('.relates_pages').show();
                    }

                }
            });
        </script>
    @endif
@stop
