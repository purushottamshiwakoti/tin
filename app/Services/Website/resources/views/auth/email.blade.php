@extends('website::layouts.master')
@section('content')
    <section class="login mt-100 pt-40 pb-100 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 mx-auto content-wrapper px-0">
                    <div class="row">
                        <div class="col-md-8 form-wrapper">
                            <div class="header">
                                <h1>Forgot Password</h1>
                                <p>Please enter your email address. We will send you with the link for password recovery</p>
                            </div>
                            <form action="{{ route('website.password.email') }}" method="POST">
                                {!! csrf_field() !!}
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
                                            value="{{ old('email') }}" placeholder="Email Address">
                                        @if ($errors->has('email'))
                                            <label class="error">{{ $errors->first('email') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="btn-wrapper mt-4">
                                    <button class="w-100 btn btn-primary btn-custom" type="submit">Send Recovery
                                        Email</button>
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
@endsection

@section('js')
    <script>
        if ("{{ session('status') }}") {
            $('#toastMessage').text('Reset password link sent successfully.Please check email.');
            $('#toastStatus').text("Success");
            $('.toaster-wrapper').show();
        }
    </script>
@endsection
