@extends('website::layouts.master')
@section('content')
    <section class="login mt-100 pt-40 pb-100 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 mx-auto content-wrapper px-0">
                    <div class="row">
                        <div class="col-md-8 form-wrapper">
                            <div class="header">
                                <h1>Sing in to your account</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
                            </div>
                            <form action="{{ route('website.login') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group with-icon">
                                    <label for="">Email *</label>
                                    <div class="input-group @if ($errors->first('email')) after-error @endif">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_135_2153)">
                                                <path
                                                    d="M19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5Z"
                                                    stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M3 7L12 13L21 7" stroke="#0084D4" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_135_2153">
                                                    <rect width="24" height="24" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>

                                        <input type="text" name="email" class="form-control"
                                            value="{{ old('email') }}" placeholder="Email ">
                                        @if ($errors->has('email'))
                                            <label id="email-error" class="error"
                                                for="email">{{ $errors->first('email') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group with-icon">
                                    <label for="">Password *</label>
                                    <div class="input-group @if ($errors->first('password')) after-error @endif">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_149_1366)">
                                                <path
                                                    d="M17 11H7C5.89543 11 5 11.8954 5 13V19C5 20.1046 5.89543 21 7 21H17C18.1046 21 19 20.1046 19 19V13C19 11.8954 18.1046 11 17 11Z"
                                                    stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M12 17C12.5523 17 13 16.5523 13 16C13 15.4477 12.5523 15 12 15C11.4477 15 11 15.4477 11 16C11 16.5523 11.4477 17 12 17Z"
                                                    stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M8 11V7C8 5.93913 8.42143 4.92172 9.17157 4.17157C9.92172 3.42143 10.9391 3 12 3C13.0609 3 14.0783 3.42143 14.8284 4.17157C15.5786 4.92172 16 5.93913 16 7V11"
                                                    stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_149_1366">
                                                    <rect width="24" height="24" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>


                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Password" />
                                        @if ($errors->has('password'))
                                            <label id="password-error" class="error"
                                                for="password">{{ $errors->first('password') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="forgot-password">
                                    <a href="{{ route('website.password.request') }}">Forgot password ?</a>
                                </div>
                                <div class="btn-wrapper mt-4">
                                    <button class="w-100 btn btn-primary btn-custom" type="submit">Sign In</button>
                                </div>
                            </form>
                            <div class="text-center sign-up">Don't have your account yet ? <a
                                    href="{{ route('website.register') }}">Create a new account</a></div>
                        </div>
                        <div class="col-md-4 img-wrapper">
                            <img src="{{ asset('website/assets/img/login.png') }}" alt="login">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
