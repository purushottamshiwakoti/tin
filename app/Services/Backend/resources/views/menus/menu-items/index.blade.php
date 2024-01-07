@extends('backend::layouts.index')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ public_asset('admin/assets/pages/nestable/nestable.css') }}">
    <style>
        .dd{max-width: 100%;}
        .dd-handle{
            height: 70px;padding: 20px;}
            .item-edit{float: right;
                background: #4fc3f7;
                border: 0;
                color: #ffffff;
                padding: 10px 20px;
                margin-left: 15px;
                border-radius: 3px;
                font-size: 16px;}
        .item-delete{float: right;
            background: #FA2A00;
            border: 0;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 3px;
            font-size: 16px;}
        .dd-item > button{font-size: 25px;font-weight: 400;margin: 16px 0;}
    </style>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="#" data-toggle="modal" data-target="#add-modal" class="btn waves-effect waves-light btn-primary float-left"><i class="fas fa-plus"></i>Add New</a>
        </div>
        <div class="card-block">

            <div class="col-lg-12 col-sm-12">
                <div class="dd deleteArena" id="menu-items" data-href="{{ route('admin.menus.menu-items.index',$menu->id) }}">
                    {!! buildTree($menu->rootMenuItems) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Menu Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('admin.menus.menu-items.store',$menu->id) }}">
                    {!! csrf_field() !!}
                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                <div class="modal-body">
                    <div class="form-group {{ $errors->has('name')?'':'' }} row">
                        <label class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" required value="{{ old('name') }}" placeholder="Title" class="form-control {{ $errors->has('name')?'form-control-danger':'' }}">
                        </div>
                    </div>
                    <div class="form-group icon {{ $errors->has('icon')?'':'' }} row">
                        <label class="col-sm-2 col-form-label">Icon</label>
                        <div class="col-sm-10">
                            <input type="text" name="icon" value="{{ old('icon') }}" placeholder="Icon" class="form-control {{ $errors->has('icon')?'form-control-danger':'' }}">
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('layout')?'':'' }} row">
                        <label class="col-sm-2 col-form-label">Layout</label>
                        <div class="col-sm-10">
                            <select name="layout" class="form-control {{ $errors->has('layout')?'form-control-danger':'' }}">
                                <option value="vertical">Vertical</option>
                                <option value="horizontal">Horizontal</option>
                                <option value="trip">Trip</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group link {{ $errors->has('link')?'':'' }} row">
                        <label class="col-sm-2 col-form-label">Link</label>
                        <div class="col-sm-10">
                            <input type="text" name="link" value="{{ old('link') }}" placeholder="Link" class="form-control {{ $errors->has('link')?'form-control-danger':'' }}">
                        </div>
                    </div>

                    <div class="form-group trip {{ $errors->has('trip_id')?'':'' }} row" style="display: none">
                        <label class="col-sm-2 col-form-label">Trip</label>
                        <div class="col-sm-10">
                            <select name="trip_id" class="form-control {{ $errors->has('trip_id')?'form-control-danger':'' }}">
                                @foreach ($trips as $key=>$value)
                                <option value="{{ $key }}">{{$value}}</option>    
                                @endforeach
                                
                            </select>                            
                        </div>
                    </div>

                    
                    {{-- <div class="form-group {{ $errors->has('icon')?'':'' }} row">
                        <label class="col-sm-2 col-form-label">Icon</label>
                        <div class="col-sm-8">
                            <input type="text" name="icon" value="{{ old('icon') }}" placeholder="Icon" class="form-control {{ $errors->has('icon')?'form-control-danger':'' }}">
                        </div>
                        <div class="col-sm-2"><span class="pcoded-micon"><i class="feather icon-anchor"></i></span>
                            <a href="https://feathericons.com/" target="_blank"> Lists</a>
                        </div>
                    </div> --}}
                    <div class="form-group {{ $errors->has('description')?'':'' }} row">
                        <label class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea type="text" name="description" placeholder="Description" class="form-control {{ $errors->has('description')?'form-control-danger':'' }}">{{ old('description') }}</textarea>
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
                    <h5 class="modal-title">Update Menu Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" class="default_update_route" value="{{ route('admin.menus.menu-items.index',$menu->id) }}">
                <form method="post" action="{{ route('admin.menus.menu-items.index',$menu->id) }}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                    {!! csrf_field() !!}
                    <div class="modal-body">
                        <div class="form-group {{ $errors->has('name')?'':'' }} row">
                            <label class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" required value="{{ old('name') }}" placeholder="Title" class="form-control {{ $errors->has('name')?'form-control-danger':'' }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('icon')?'':'' }} row">
                            <label class="col-sm-2 col-form-label">Icon</label>
                            <div class="col-sm-10">
                                <input type="text" name="icon" value="{{ old('icon') }}" placeholder="Icon" class="form-control {{ $errors->has('icon')?'form-control-danger':'' }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('layout')?'':'' }} row">
                            <label class="col-sm-2 col-form-label">Layout</label>
                            <div class="col-sm-10">
                                <select name="layout" class="form-control {{ $errors->has('layout')?'form-control-danger':'' }}">
                                    <option value="vertical">Vertical</option>                                    
                                    <option value="horizontal">Horizontal</option>
                                    <option value="trip">Trip</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group link {{ $errors->has('link')?'':'' }} row">
                            <label class="col-sm-2 col-form-label">Link</label>
                            <div class="col-sm-10">
                                <input type="text" name="link" value="{{ old('link') }}" placeholder="Link" class="form-control {{ $errors->has('link')?'form-control-danger':'' }}">
                            </div>
                        </div>

                        <div class="form-group trip {{ $errors->has('trip_id')?'':'' }} row" style="display: none">
                            <label class="col-sm-2 col-form-label">Trip</label>
                            <div class="col-sm-10">
                                <select name="trip_id" class="form-control {{ $errors->has('trip_id')?'form-control-danger':'' }}">
                                    @foreach ($trips as $key=>$value)
                                    <option value="{{ $key }}">{{$value}}</option>    
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                        
                        {{-- <div class="form-group {{ $errors->has('icon')?'':'' }} row">
                            <label class="col-sm-2 col-form-label">Icon</label>
                            <div class="col-sm-8">
                                <input type="text" name="icon" value="{{ old('icon') }}" placeholder="Icon" class="form-control {{ $errors->has('icon')?'form-control-danger':'' }}">

                            </div>
                           <div class="col-sm-2"><span class="pcoded-micon"><i class="feather icon-anchor"></i></span>
                               <a href="https://feathericons.com/" target="_blank"> Lists</a>
                           </div>
                        </div> --}}
                        <div class="form-group {{ $errors->has('description')?'':'' }} row">
                            <label class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea type="text" name="description" placeholder="Description" class="form-control {{ $errors->has('description')?'form-control-danger':'' }}">{{ old('description') }}</textarea>
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
        $(document).on('click','.item-edit',function (e) {
            e.preventDefault();
            var cur_row = $(this).closest('li');
            var action = $("#edit-modal").find('form').attr('action');
            var defaultUpdateRoute = $('.default_update_route').val();
            $("#edit-modal").find('form').attr('action',defaultUpdateRoute+'/'+$(cur_row).attr('data-id'));
            $("#edit-modal").find('input[name="name"]').val($(cur_row).attr('data-name'));
            $("#edit-modal").find('input[name="link"]').val($(cur_row).attr('data-link'));
            $("#edit-modal").find('input[name="icon"]').val($(cur_row).attr('data-icon'));
            $("#edit-modal").find('select[name="layout"]').val($(cur_row).attr('data-layout'));
            $("#edit-modal").find('select[name="trip_id"]').val($(cur_row).attr('data-trip_id'));
            $("#edit-modal").find('textarea[name="description"]').html($(cur_row).attr('data-description'));
            $("#edit-modal").modal('show');
        });

        $(document).on('click','.tabledit-view-button',function (e) {
           e.preventDefault();
            var cur_row = $(this).closest('tr');
            window.location.href = "{{ route('admin.menus.index') }}/"+$(cur_row).find('td.id').text()+"/menu-items"
        });

        $(document).ready(function() {
            $(document).on('change','select[name="layout"]',function(){
                if($(this).val()=='trip')
                {
                    $('.trip').show();
                    $('.link').hide();
                }else{
                    $('.trip').hide();
                    $('.link').show();
                }
            })



            // output initial serialised data

        });
    </script>
@stop