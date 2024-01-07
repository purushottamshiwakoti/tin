<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ (isset($metas) && $metas->meta_description)?$metas->meta_description:setting('meta_description') }}">
    <meta name="keywords" content="{{ (isset($metas) && $metas->meta_keywords)?$metas->meta_keywords:setting('meta_keywords') }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{ (isset($metas) && $metas->meta_title)?$metas->meta_title:setting('meta_title') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ public_asset('website/img/logo.png') }}">
    <!-- Bootstrap -->
    <link href="{{ public_asset('website/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ public_asset('website/css/animate.css')}}">
    <link href="{{ public_asset('website/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
    <link href="{{ public_asset('website/css/hover.css')}}" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ public_asset('website/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.standalone.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
    <link rel="stylesheet" href="{{ public_asset('website/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" type="text/css" media="screen and (min-width: 769px)" href="{{ public_asset('website/css/yamm.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ public_asset('website/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@yield('css')
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class='loader'>
    <div class="sk-cube-grid">
        <div class="sk-cube sk-cube1"></div>
        <div class="sk-cube sk-cube2"></div>
        <div class="sk-cube sk-cube3"></div>
        <div class="sk-cube sk-cube4"></div>
        <div class="sk-cube sk-cube5"></div>
        <div class="sk-cube sk-cube6"></div>
        <div class="sk-cube sk-cube7"></div>
        <div class="sk-cube sk-cube8"></div>
        <div class="sk-cube sk-cube9"></div>
    </div>
</div>

<div class="sitelogin">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 col12">
                    <div class="login-form">
                        <div class="form-head">
                            <h4>CREATE NEW PASSWORD</h4>
                            <!-- <div class="btn-social">
                              <a href="#" class="btn btn-facebook">FACEBOOK</a>
                              <a href="#" class="btn btn-google">GOOGLE+</a>
                            </div> -->
                        </div>
                        <form method="POST" action="{{ route('website.password.request') }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="token" value="{{ $token }}">
                            {{--<input type="hidden" name="_method" value="put">--}}
                            <fieldset>
                                <div class="col-md-12 col-sm-12 col-xs-12 no-gutter">
                                    <label class="control-label" for="email"> Email Address</label>
                                    <div class="">
                                        <input id="lemail" name="email" value="{{ $email }}" type="text" class="form-control {{ $errors->has('email')? 'error-border':''}}" placeholder="{{ $email }}">
                                    @if ($errors->has('email'))
                                        <!-- add class error-border after login-pwd -->
                                            <label id="email-error" class="error" for="email">{{ $errors->first('email') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 no-gutter">
                                    <label class="control-label" for="pwd"> Password</label>
                                    <div class="">
                                        <input id="passwordinput" name="password" type="password" class="form-control login-pwd {{ $errors->has('password')? 'error-border':''}}">
                                    </div>
                                @if ($errors->has('password'))
                                    <!-- add class error-border after login-pwd -->
                                    <label id="email-error" class="error" for="email">{{ $errors->first('password') }}</label>
                                @endif
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 no-gutter">
                                    <label class="control-label" for="pwd">Conform Password</label>
                                    <div class="">
                                        <input id="passwordConfirmInput" name="password_confirmation" type="password" class="form-control login-pwd {{ $errors->has('password')? 'error-border':''}}">
                                    </div>

                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 no-gutter">
                                    <button type="submit" href="#" class="btn btn-view">Submit</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ public_asset('website/js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- datepicker -->

<script >
    var base_url = "{{ url('/') }}";
    var customer_id = "{{ optional(auth()->user())->id }}";
    $(document).ready(function() {
        console.log({!! $errors !!});
        $('.loader').delay(1500).hide(0);
    });
</script>
@if(Session::has('message'))
    <script>
        $(document).ready(function() {
            toastr.{{ Session::get('alert-type') }}("{{ Session::get('message') }}");
        });
    </script>
@endif
</body>
</html>