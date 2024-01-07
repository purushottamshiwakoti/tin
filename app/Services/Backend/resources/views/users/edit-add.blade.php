@extends('backend::layouts.master')
@section('css')
@stop
@section('content')
    <div class="card">
        @include('backend::partials.edit-add-header',['route_str'=>'users'])
        <div class="card-block">
            <hr>
            <form action="{{ ($user)?route('admin.users.update',$user->id):route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @if($user)<input name="_method" type="hidden" value="PUT">@endif
                <div class="form-group {{ $errors->has('name')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" required name="name" value="{{ oldValue('name',$user) }}" placeholder="Name" class="form-control {{ $errors->has('name')?'form-control-danger':'' }}">
                    </div>
                </div>
                <div class="form-group {{ $errors->has('email')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" required name="email" value="{{ oldValue('email',$user) }}" placeholder="Email" class="form-control {{ $errors->has('email')?'form-control-danger':'' }}">
                    </div>
                </div>
                <div class="form-group {{ $errors->has('password')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" value="{{ old('password') }}" placeholder="Password" class="form-control {{ $errors->has('password')?'form-control-danger':'' }}">
                    </div>
                </div>
                @include('backend::partials.cover-image',['data'=>$user])

                <div class="form-group {{ $errors->has('role_id')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <select name="role_id" class="col-sm-12 js-example-basic-single {{ $errors->has('role_id')?'form-control-danger':'' }}">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ optional($user)->hasRole($role->name)?'selected':'' }}>{{ $role->name }}</option>
                             @endforeach
                        </select>
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