@if (!Auth::check())
    <div id="loginModal" class="modal fade loginModal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-window-close"
                        aria-hidden="true"></i></button>
                <div class="modal-body">
                    <div class="login-form">
                        <div class="form-head">
                            <h4>Sign in to your account </h4>
                            <p>Don't have your account yet ? <a href="#" id="create-account">Create a new
                                    account</a></p>
                        </div>
                        <form action="{{ route('website.login') }}" method="post">
                            <fieldset>
                                {!! csrf_field() !!}
                                <div class="col-md-12 col-sm-12 col-xs-12 no-gutter">
                                    <label class="control-label" for="email"> Email Address</label>
                                    <div class="">
                                        <input id="lemail" name="email" value="{{ old('email') }}" type="text"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 no-gutter">
                                    <label class="control-label" for="pwd"> Password</label>
                                    <div class="">
                                        <input id="passwordinput" name="password" type="password"
                                            class="form-control login-pwd error-border">
                                    </div>
                                    @if ($errors->login->has('email'))
                                        <label id="email-error" class="error"
                                            for="password">{{ $errors->login->first('email') }}</label>
                                    @endif
                                    <!-- add class error-border after login-pwd -->
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 no-gutter">
                                    <button type="submit" class="btn btn-view">Sign In</button>
                                    <p><a href="#" class="forgot-password" id="reset-password">Forgot Password</a>
                                    </p>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="signup-form">
                        <div class="form-head">
                            <h4>New here? Sign up </h4>
                            <p>Already have an account ? <a href="#" id="login-account">Login</a></p>
                        </div>
                        <form action="{{ route('website.register') }}" method="post">
                            <fieldset>
                                {!! csrf_field() !!}
                                <div class="col-md-6 col-sm-6 col-xs-12 gutter-left">
                                    <label class="control-label" for="fname"> First Name</label>
                                    <div class="">
                                        <input id="sname" name="first_name" value="{{ old('first_name') }}"
                                            type="text"
                                            class="form-control {{ $errors->register->has('first_name') ? 'error-border' : '' }}">
                                    </div>

                                    @if ($errors->register->has('first_name'))
                                        <label id="email-error" class="error"
                                            for="password">{{ $errors->register->first('first_name') }}</label>
                                    @endif
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 gutter-right">
                                    <label class="control-label" for="lname"> Last Name</label>
                                    <div class="">
                                        <input id="slname" name="last_name" type="text"
                                            value="{{ old('last_name') }}"
                                            class="form-control {{ $errors->register->has('last_name') ? 'error-border' : '' }}">
                                    </div>
                                    @if ($errors->register->has('last_name'))
                                        <label id="email-error" class="error"
                                            for="password">{{ $errors->register->first('last_name') }}</label>
                                    @endif
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 no-gutter">
                                    <label class="control-label" for="email"> Email Address</label>
                                    <div class="">
                                        <input id="remail" name="email" type="text" value="{{ old('email') }}"
                                            class="form-control {{ $errors->register->has('email') ? 'error-border' : '' }}">
                                    </div>
                                    @if ($errors->register->has('email'))
                                        <label id="email-error" class="error"
                                            for="email">{{ $errors->register->first('email') }}</label>
                                    @endif
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 no-gutter">
                                    <label class="control-label" for="pwd"> Password</label>
                                    <div class="">
                                        <input id="rpasswordinput" name="password" type="password"
                                            class="form-control login-pwd {{ $errors->register->has('password') ? 'error-border' : '' }}">
                                    </div>

                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 no-gutter">
                                    <label class="control-label" for="pwd">Confirm Password</label>
                                    <div class="">
                                        <input id="rrpasswordinput" name="password_confirmation" type="password"
                                            class="form-control login-pwd {{ $errors->register->has('password') ? 'error-border' : '' }}">
                                    </div>
                                    @if ($errors->register->has('password'))
                                        <label id="email-error" class="error"
                                            for="password">{{ $errors->register->first('password') }}</label>
                                    @endif

                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 no-gutter">
                                    <button type="submit" class="btn btn-view">Create an account</button>
                                    <p>By clicking "Create an account", you agree with <a href="#">Terms and
                                            conditions</a></p>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="reset-form">
                        <div class="form-head">
                            <h4>Reset your password </h4>
                            <p>Your password does not work? Just use your login e-mail address and we will send you
                                instructions on how to create a new one.</p>
                        </div>
                        <form action="{{ route('website.password.email') }}" method="POST">
                            <fieldset>
                                {!! csrf_field() !!}
                                <div class="col-md-12 col-sm-12 col-xs-12 no-gutter">
                                    <label class="control-label" for="email"> Email Address</label>
                                    <div class="">
                                        <input id="pemail" name="email" type="text"
                                            class="form-control {{ $errors->reset->has('email') ? 'error-border' : '' }}">
                                    </div>
                                    @if ($errors->reset->has('email'))
                                        <label id="email-error" class="error"
                                            for="password">{{ $errors->reset->first('email') }}</label>
                                    @endif
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 no-gutter">
                                    <button type="submit" class="btn btn-view">Send a verification link</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endif
