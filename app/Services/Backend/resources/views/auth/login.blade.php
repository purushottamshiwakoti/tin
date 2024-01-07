@extends('backend::auth.layouts.master')

@section('content')


        <section class="login-block">
          

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <form class="md-float-material form-material m-t-40 m-b-40" method="POST" action="{{ route('admin.login') }}">
                            {{ csrf_field() }}
                            <div class="auth-box card">
                                <div class="card-block">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h3 class="text-center">Sign In</h3>
                                        </div>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="email" name="email"  class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" required="" value="{{ old('email') }}">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Your Email Address</label>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="password" name="password" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Password</label>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="row m-t-25 text-left">
                                        <div class="col-12">
                                            <div class="checkbox-fade fade-in-primary d-">
                                                <label>
                                                    <input type="checkbox" value="" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <span class="cr"><i class="cr-icon fas fa-check txt-primary"></i></span>
                                                    <span class="text-inverse">Remember me</span>
                                                </label>
                                            </div>
                                            <div class="forgot-phone text-right float-right">
                                                <a href="{{ route('admin.password.request') }}" class="text-right f-w-600"> {{ __('Forgot Your Password?') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign in</button>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <p class="text-inverse text-left m-b-0">Thank you.</p>
                                            <p class="text-inverse text-left"><a href="{{ route('website.home') }}"><b>Back to website</b></a></p>
                                        </div>
                                        <div class="col-md-4">
                                            <img src="{{ asset('website/assets/img/logo.png') }}" alt="small-logo.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
               
            </div>
        
        </section>

        
@stop
@section('js')
<script>
    $(function() {
        $length = $('.form-primary input');
        if ($length.hasClass('is-invalid')) {
            $length.addClass("fill")
        }
    })
</script>
@stop