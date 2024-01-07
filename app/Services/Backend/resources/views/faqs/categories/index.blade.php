@extends('backend::layouts.index')
@section('css')
    <style>
        span.select2-container{width:100%!important;}
    </style>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Categories</h5>
            <span>Category List</span>
            <a href="#" data-toggle="modal" data-target="#add-modal" class="btn waves-effect waves-light btn-primary float-left"><i class="fas fa-plus"></i>Add New</a>
        </div>
        <div class="card-block">

            <div class="dt-responsive table-responsive">
                <table id="dt-server-processing" class="table table-striped table-bordered nowrap deleteArena">
                    <thead>
                    <tr class="header-cols">
                        <th data-col-name="id">SN</th>
                        <th data-col-name="title">Title</th>
                        <th data-col-name="value">Description</th>
                        <th data-col-name="icon">Icon</th>
                        <th data-col-name="extras">Page?</th>
                        <th data-col-name="created_at">Created At</th>
                        <th data-col-name="action">Actions</th>

                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add/Update Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('admin.faq-categories.store') }}">
                    {!! csrf_field() !!}
                    <div class="modal-body">
                        <div class="form-group {{ $errors->has('title')?'':'' }} row">
                            <label class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" required value="{{ old('name') }}" placeholder="Title" class="form-control {{ $errors->has('value')?'form-control-danger':'' }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Is page?</label>
                            <div class="col-sm-10">
                                <input type="checkbox" name="is_page" class="border-checkbox show_page" value="1">
                            </div>
                        </div>
                        <div class="pages form-group {{ $errors->has('extras_0_page_id')?'':'' }} row" style="display:none">
                            <label class="col-sm-2 col-form-label">Page</label>
                            <div class="col-sm-10">
                                <select name="extras[page_id]" class="select2-single col-sm-12 {{ $errors->has('extras_0_page_id')?'form-control-danger':'' }}">
                                    <optgroup label="Pages">
                                        @foreach($pages as $option)
                                            @php
                                                $key = isset($option->id)?$option->id:$option;
                                                $text = isset($option->title)?$option->title:$option;
                                            @endphp
                                            <option value="{{ $key }}">{{ $text }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('value')?'':'' }} row">
                            <label class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <input type="text" name="value" value="{{ old('value') }}" placeholder="Value" class="form-control {{ $errors->has('value')?'form-control-danger':'' }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('icon')?'':'' }} row">
                            <label class="col-sm-2 col-form-label">Icon</label>
                            <div class="col-sm-10">
                                <select name="icon" class="form-control {{ $errors->has('icon')?'form-control-danger':'' }}">
                                    @foreach(config('constants.faq_icons') as $icon)
                                        <option value="{{ $icon }}" {{ old('icon') == $icon?'selected':'' }}><img src="{{ public_asset('website/img/'.$icon.'.png') }}"> {{ $icon }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add/Update Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('admin.faq-categories.index') }}">
                    <input type="hidden" name="_method" value="PUT">
                    {!! csrf_field() !!}
                    <div class="modal-body">
                        <div class="form-group {{ $errors->has('title')?'':'' }} row">
                            <label class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" required value="{{ old('title') }}" placeholder="Title" class="form-control {{ $errors->has('title')?'form-control-danger':'' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Is page?</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="is_page" value="0">
                                <input type="checkbox" name="is_page" class="border-checkbox show_page" value="1">
                            </div>
                        </div>
                        <div class="pages form-group {{ $errors->has('extras_0_page_id')?'':'' }} row" style="display:none">
                            <label class="col-sm-2 col-form-label">Page</label>
                            <div class="col-sm-10">
                                <select name="extras[page_id]" id="page_id" class="select2-single col-sm-12 {{ $errors->has('extras_0_page_id')?'form-control-danger':'' }}">
                                    <optgroup label="Pages">
                                        @foreach($pages as $option)
                                            @php
                                                $key = isset($option->id)?$option->id:$option;
                                                $text = isset($option->title)?$option->title:$option;
                                            @endphp
                                            <option value="{{ $key }}">{{ $text }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('Value')?'':'' }} row">
                            <label class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <input type="text" name="value" value="{{ old('value') }}" placeholder="Value" class="form-control {{ $errors->has('value')?'form-control-danger':'' }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('icon')?'':'' }} row">
                            <label class="col-sm-2 col-form-label">Icon</label>
                            <div class="col-sm-10">
                                <select name="icon" class="form-control {{ $errors->has('icon')?'form-control-danger':'' }}">
                                    @foreach(config('constants.faq_icons') as $icon)
                                        <option value="{{ $icon }}" {{ old('icon') == $icon?'selected':'' }}><img src="{{ public_asset('website/img/'.$icon.'.png') }}"/> {{ $icon }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(document).on('click','.tabledit-edit-button',function (e) {
            e.preventDefault();
            $("#edit-modal").find('form').trigger('reset');
            var cur_row = $(this).closest('tr');
            var action = "{{ route('admin.faq-categories.index') }}";
            $("#edit-modal").find('form').attr('action',action+'/'+$(cur_row).find('td:first').text());
            $("#edit-modal").find('input[name="title"]').val($(cur_row).find('td.title').text());
            $("#edit-modal").find('input[name="value"]').val($(cur_row).find('td.value').text());
            $("#edit-modal").find('select[name="icon"]').val($(cur_row).find('td.icon').text());
            var is_page = $(cur_row).find('td.extras').text();
            if(is_page)
            {
                $("#edit-modal").find('input[name="is_page"]').prop('checked',true).trigger('change');
                var is_page = JSON.parse(is_page);
                console.log(is_page.page_id);


                $("#edit-modal").find('select[name="extras[page_id]"]').val(is_page.page_id).trigger('change');
            }

            $("#edit-modal").modal('show');
        });
        $(document).on('change','.show_page',function (e) {
            if($(this).is(':checked'))
            {
                $(this).closest('.modal-body').find('div.pages').show();
            }else{
                $(this).closest('.modal-body').find('div.pages').hide();
            }

        });

        $(document).on('click','.tabledit-view-button',function (e) {
            e.preventDefault();
            var cur_row = $(this).closest('tr');
            window.location.href = "{{ route('admin.menus.index') }}/"+$(cur_row).find('td.id').text()+"/menu-items"
        });
    </script>
@stop