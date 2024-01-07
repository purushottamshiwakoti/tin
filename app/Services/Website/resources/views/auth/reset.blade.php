@extends('website::layouts.master')
@section('content')
    <section class="login mt-100 pt-40 pb-100 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 mx-auto content-wrapper px-0">
                    <div class="row">
                        <div class="col-md-8 form-wrapper">
                            <div class="header">
                                <h5 class="text-primary">Reset Password</h5>
                            </div>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form action="{{ route('website.password.update') }}" method="POST">
                                {!! csrf_field() !!}
                                <input type="hidden" name="token" value="{{ request()->route()->parameter('token') }}">

                                <div class="form-group with-icon">
                                    <label for="">Email</label>
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
                                    <div class="input-group">
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M22.666 14.6667H9.33268C7.85992 14.6667 6.66602 15.8606 6.66602 17.3333V25.3333C6.66602 26.8061 7.85992 28 9.33268 28H22.666C24.1388 28 25.3327 26.8061 25.3327 25.3333V17.3333C25.3327 15.8606 24.1388 14.6667 22.666 14.6667Z"
                                                stroke="#0084D4" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M15.9993 22.6667C16.7357 22.6667 17.3327 22.0697 17.3327 21.3333C17.3327 20.597 16.7357 20 15.9993 20C15.263 20 14.666 20.597 14.666 21.3333C14.666 22.0697 15.263 22.6667 15.9993 22.6667Z"
                                                stroke="#0084D4" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M10.666 14.6667V9.33333C10.666 7.91885 11.2279 6.56229 12.2281 5.5621C13.2283 4.5619 14.5849 4 15.9993 4C17.4138 4 18.7704 4.5619 19.7706 5.5621C20.7708 6.56229 21.3327 7.91885 21.3327 9.33333V14.6667"
                                                stroke="#0084D4" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>

                                        <input type="password" name="password" id="signUpPassword" class="form-control"
                                            placeholder="New Password" />
                                        @if ($errors->has('password'))
                                            <label id="password-error" class="error"
                                                for="password">{{ $errors->first('password') }}</label>
                                        @endif

                                    </div>
                                    {{-- <i class="fas fa-eye togglePassword" id="toggleSignUpPassword"></i> --}}

                                </div>
                                <div class="form-group with-icon">
                                    <div class="input-group">
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M22.666 14.6667H9.33268C7.85992 14.6667 6.66602 15.8606 6.66602 17.3333V25.3333C6.66602 26.8061 7.85992 28 9.33268 28H22.666C24.1388 28 25.3327 26.8061 25.3327 25.3333V17.3333C25.3327 15.8606 24.1388 14.6667 22.666 14.6667Z"
                                                stroke="#0084D4" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M15.9993 22.6667C16.7357 22.6667 17.3327 22.0697 17.3327 21.3333C17.3327 20.597 16.7357 20 15.9993 20C15.263 20 14.666 20.597 14.666 21.3333C14.666 22.0697 15.263 22.6667 15.9993 22.6667Z"
                                                stroke="#0084D4" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M10.666 14.6667V9.33333C10.666 7.91885 11.2279 6.56229 12.2281 5.5621C13.2283 4.5619 14.5849 4 15.9993 4C17.4138 4 18.7704 4.5619 19.7706 5.5621C20.7708 6.56229 21.3327 7.91885 21.3327 9.33333V14.6667"
                                                stroke="#0084D4" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>

                                        <input type="password" name="password_confirmation" id="confirmPassword"
                                            class="form-control" placeholder="Confirm Password" />
                                        @if ($errors->has('password-confirm'))
                                            <label id="password-error" class="error"
                                                for="password-confirm">{{ $errors->first('password-confirm') }}</label>
                                        @endif
                                    </div>
                                    {{-- <i class="fas fa-eye togglePassword" id="toggleConfirmPassword"></i> --}}

                                </div>

                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Reset Password') }}
                                </button>
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
@endsection
