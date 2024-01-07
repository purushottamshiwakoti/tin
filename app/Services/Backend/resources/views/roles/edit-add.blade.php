@extends('backend::layouts.master')
@section('css')
@stop
@section('content')
    <div class="card">
        @include('backend::partials.edit-add-header',['route_str'=>'roles'])
        <div class="card-block">
            <hr>
            <form action="{{ ($role)?route('admin.roles.update',$role->id):route('admin.roles.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @if($role)<input name="_method" type="hidden" value="PUT">@endif
                <div class="form-group {{ $errors->has('name')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" required name="name" value="{{ oldValue('name',$role) }}" placeholder="Name" class="form-control {{ $errors->has('name')?'form-control-danger':'' }}">
                    </div>
                </div>
                <div class="form-group">
                <div class="col-md-3">
                    <div class="checkbox-fade fade-in-primary m-b-15">
                        <label>
                            <input type="checkbox" id="checkbox" onclick="$('.permissions').prop('checked',$(this).is(':checked'))">
                            <span class="cr"><i class="cr-icon fas fa-check txt-primary"></i></span>
                            <span>Check All</span>
                        </label>
                    </div>
                </div>
                </div>
                <hr/>
                <div class="form-group {{ $errors->has('name')?'':'' }} row">
                    <div class="col-md-12">
                        @foreach($permissionGroups as $key=>$permissionGroup)
                            <div class="card-header">
                                {{ ucfirst($key) }}
                            </div>
                            <div class="card-body row">
                                @foreach($permissionGroup as $permission)
                                <div class="col-md-3">
                                    <div class="checkbox-fade fade-in-primary m-b-15">
                                        <label>
                                            <input type="checkbox" class="permissions" id="checkbox" name="permissions[]" {{ optional(optional($role)->permissions)->contains($permission->id)?'checked':'' }} value="{{ $permission->id }}">
                                            <span class="cr"><i class="cr-icon fas fa-check txt-primary"></i></span>
                                            <span>{{ $permission->label }}</span>
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <hr>
                        @endforeach
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