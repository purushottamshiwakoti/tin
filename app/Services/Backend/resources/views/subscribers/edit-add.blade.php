@extends('backend::layouts.master')
@section('content')
    <div class="card">
        @include('backend::partials.edit-add-header',['route_str'=>'subscribers'])
        <div class="card-block">
            <hr>
            <form id="main" action="{{ ($subscribers)?route('admin.subscribers.update',$subscribers->id):route('admin.subscribers.store') }}" method="post" enctype="multipart/form-data" novalidate>
                {{ csrf_field() }}
                @if($subscribers)<input name="_method" type="hidden" value="PUT">@endif
                <div class="form-group {{ $errors->has('first_name')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="first_name" value="{{ oldValue('first_name',$subscribers) }}" placeholder="First Name" class="form-control {{ $errors->has('first_name')?'form-control-danger':'' }}" required>
                    </div>
                </div>
                
                <div class="form-group {{ $errors->has('last_name')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="last_name" value="{{ oldValue('last_name',$subscribers) }}" placeholder="Last Name" class="form-control {{ $errors->has('last_name')?'form-control-danger':'' }}" required>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('email')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" value="{{ oldValue('email',$subscribers) }}" placeholder="Email" class="form-control {{ $errors->has('email')?'form-control-danger':'' }}" required>
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