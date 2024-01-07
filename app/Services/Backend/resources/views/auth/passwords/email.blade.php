@extends('backend::auth.layouts.master')

@section('content')
    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->

                    <form class="md-float-material form-material" method="POST" action="{{ route('admin.password.email') }}">
                        {{--<div class="text-center">--}}
                            {{--<img src="../files/assets/images/auth/logo-dark.png" alt="logo.png">--}}
                        {{--</div>--}}
                        <div class="auth-box card">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left">{{ __('Reset Password') }}</h3>
                                    </div>
                                </div>
                                {{ csrf_field() }}

                                <div class="form-group form-primary">
                                    <input type="text" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">{{ __('E-Mail Address') }}</label>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Reset Password</button>
                                    </div>
                                </div>
                                <p class="f-w-600 text-right">Back to <a href="{{ route('admin.login') }}">Login.</a></p>
                                <div class="row">
                                    <div class="col-md-8">
                                        <p class="text-inverse text-left m-b-0">Thank you.</p>
                                        <p class="text-inverse text-left"><a href=""><b>Back to website</b></a></p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ public_asset('admin/assets/images/auth/Logo-small-bottom.png') }}" alt="small-logo.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
@endsection
