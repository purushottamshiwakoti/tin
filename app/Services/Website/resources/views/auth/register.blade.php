@extends('website::layouts.master')
@section('content')

    <section class="login mt-100 pt-40 pb-100 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 mx-auto content-wrapper px-0">
                    <div class="row">
                        <div class="col-md-8 form-wrapper">
                            <div class="header">
                                <h1>Let’s begin your journey to Nepal with us.</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
                            </div>
                            <form action="{{ route('website.register') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group with-icon">
                                    <label for="">First Name *</label>
                                    <div class="input-group @if ($errors->first('first_name')) after-error @endif">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_135_2304)">
                                                <path
                                                    d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                                                    stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z"
                                                    stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M6.16797 18.849C6.41548 18.0252 6.92194 17.3032 7.61222 16.79C8.30249 16.2768 9.13982 15.9997 9.99997 16H14C14.8612 15.9997 15.6996 16.2774 16.3904 16.7918C17.0811 17.3062 17.5874 18.0298 17.834 18.855"
                                                    stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_135_2304">
                                                    <rect width="24" height="24" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <input type="text" name="first_name" class="form-control"
                                            value="{{ old('first_name') }}" autocomplete="false">
                                        @if ($errors->has('first_name'))
                                            <label id="first_name-error" class="error"
                                                for="first_name">{{ $errors->first('first_name') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group with-icon">
                                    <label for="">Last Name *</label>
                                    <div class="input-group @if ($errors->first('last_name')) after-error @endif">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_135_2304)">
                                                <path
                                                    d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                                                    stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z"
                                                    stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M6.16797 18.849C6.41548 18.0252 6.92194 17.3032 7.61222 16.79C8.30249 16.2768 9.13982 15.9997 9.99997 16H14C14.8612 15.9997 15.6996 16.2774 16.3904 16.7918C17.0811 17.3062 17.5874 18.0298 17.834 18.855"
                                                    stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_135_2304">
                                                    <rect width="24" height="24" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <input type="text" name="last_name" class="form-control"
                                            value="{{ old('last_name') }}" autocomplete="false">
                                        @if ($errors->has('last_name'))
                                            <label id="last_name-error" class="error"
                                                for="last_name">{{ $errors->first('last_name') }}</label>
                                        @endif
                                    </div>
                                </div>
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

                                        <input type="email" class="form-control" name="email"
                                            value="{{ old('email') }}" autocomplete="false">
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


                                        <input type="password" class="form-control" name="password"
                                            autocomplete="false">
                                        @if ($errors->has('password'))
                                            <label id="password-error" class="error"
                                                for="password">{{ $errors->first('password') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group with-icon">
                                    <label for="">Password confirmation *</label>
                                    <div class="input-group @if ($errors->first('password_confirmation')) after-error @endif">
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


                                        <input type="password" name="password_confirmation" id="confirmPassword"
                                            class="form-control" placeholder="Password Confirmation" />

                                        @if ($errors->has('password_confirmation'))
                                            <label class="error">{{ $errors->first('password_confirmation') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="forgot-password">
                                    <a href="{{ route('website.password.request') }}">Forgot password ?</a>
                                </div>
                                <div class="btn-wrapper mt-4">
                                    <button class="w-100 btn btn-primary btn-custom" type="submit">Sign Up</button>
                                </div>
                            </form>
                            <div class="text-center sign-up">Already have an account ? <a
                                    href="{{ route('website.login') }}">Login</a></div>
                        </div>
                        <div class="col-md-4 img-wrapper">
                            <img src="{{ asset('website/assets/img/register.png') }}" alt="register">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
