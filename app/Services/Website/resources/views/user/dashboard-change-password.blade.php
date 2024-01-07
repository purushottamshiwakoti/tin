
@extends('website::layouts.master')
@section('content')

@include('website::user.breadcrumb-section')


<section class="dashboard-content pt-40 pb-80 bg-light">
    <div class="container">
        @if(Session::has('message'))
        <div class="alert alert-success text-success notification-bar">
            {{ session('message') }}
        </div>
        @endif
        <div class="row">
            @include('website::user.layouts.sidebar')
            <div class="col-md-9 content profile">
                <form  class="form-wrapper" method="POST" action="{{route('website.change.password',auth('customer')->user()->id)}}">
                    {{ csrf_field() }}

                    <div class="shadow-box">
                        <h4>Change Password</h4>
                        <div class="row">
                            <div class="col-md-8 form-group">
                                <label>Current Password</label>
                                <div class="input-group @if($errors->first('current-password')) after-error @endif">
                                    <input type="password"  name="current-password" placeholder="Old Password" class="form-control" >
                                    @if ($errors->has('current-password'))
                                    <label class="error" >{{ $errors->first('current-password') }}</label>
                                     @endif
                                </div>
                            </div>
                            <div class="col-md-8 form-group">
                                <label>New Password</label>
                                <div class="input-group @if($errors->first('password')) after-error @endif">
                                    <input type="password" class="form-control" placeholder="New Password" name="password"  >
                                    @if ($errors->has('password'))
                                    <label class="error" >{{ $errors->first('password') }}</label>
                                     @endif
                                </div>
                            </div>
                            <div class="col-md-8 form-group">
                                <label>Retype New Password</label>
                                <div class="input-group @if($errors->first('password_confirmation')) after-error @endif">
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Re-enter Password" >
                                    @if ($errors->has('password_confirmation'))
                                    <label class="error" >{{ $errors->first('password_confirmation') }}</label>
                                     @endif
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="btn-wrapper my-4">
                        <button type="submit" class="btn btn-custom btn-primary"><span>Save Changes</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection