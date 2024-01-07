@extends('backend::layouts.index')

@section('content')
    <div class="card">
        <div class="card-header">

            <a href="#" data-toggle="modal" data-target="#add-modal" class="btn waves-effect waves-light btn-primary float-left"><i class="fas fa-plus"></i>Add New</a>
        </div>
        <div class="card-block">

            <div class="dt-responsive table-responsive">
                <table id="dt-server-processing" class="table table-striped table-bordered nowrap deleteArena">
                    <thead>
                    <tr class="header-cols">
                        <th data-col-name="id">SN</th>
                        <th data-col-name="name">Name</th>
                        <th data-col-name="slug">Slug</th>

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
                    <h5 class="modal-title">Add/Update Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('admin.menus.store') }}">
                    {!! csrf_field() !!}
                <div class="modal-body">
                    <div class="form-group {{ $errors->has('name')?'':'' }} row">
                        <label class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" required value="{{ old('name') }}" placeholder="Title" class="form-control {{ $errors->has('name')?'form-control-danger':'' }}">
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('slug')?'':'' }} row">
                        <label class="col-sm-2 col-form-label">Slug</label>
                        <div class="col-sm-10">
                            <input type="text" name="slug" value="{{ old('slug') }}" placeholder="Slug" class="form-control {{ $errors->has('slug')?'form-control-danger':'' }}">
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
                    <h5 class="modal-title">Add/Update Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('admin.menus.index') }}">
                    <input type="hidden" name="_method" value="PUT">
                    {!! csrf_field() !!}
                    <div class="modal-body">
                        <div class="form-group {{ $errors->has('name')?'':'' }} row">
                            <label class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" required value="{{ old('name') }}" placeholder="Title" class="form-control {{ $errors->has('name')?'form-control-danger':'' }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('slug')?'':'' }} row">
                            <label class="col-sm-2 col-form-label">Slug</label>
                            <div class="col-sm-10">
                                <input type="text" name="slug" value="{{ old('slug') }}" placeholder="Slug" class="form-control {{ $errors->has('slug')?'form-control-danger':'' }}">
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
            var cur_row = $(this).closest('tr');
            var action = $("#edit-modal").find('form').attr('action');
            $("#edit-modal").find('form').attr('action',action+'/'+$(cur_row).find('td:first').text());
            $("#edit-modal").find('input[name="name"]').val($(cur_row).find('td.name').text());
            $("#edit-modal").find('input[name="slug"]').val($(cur_row).find('td.slug').text());
            $("#edit-modal").modal('show');
        });

        $(document).on('click','.tabledit-view-button',function (e) {
           e.preventDefault();
            var cur_row = $(this).closest('tr');
            window.location.href = "{{ route('admin.menus.index') }}/"+$(cur_row).find('td.id').text()+"/menu-items"
        });
    </script>
@stop