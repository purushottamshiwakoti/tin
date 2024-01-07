<!DOCTYPE html>
<html lang="en">

<head>
    <title>Travel Adventure Nepal</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')}}"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    {{-- <link rel="icon" href="{{ public_asset('admin/assets/images/favicon.png')}}"> --}}
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">
    <!-- Required Fremwork -->
{{--    <link rel="stylesheet" type="text/css" href="{{ public_asset('admin/bower_components/bootstrap/css/bootstrap.min.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="{{ public_asset('admin/bower_components/bootstrap/css/bootstrap.min.css')}}">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{ public_asset('admin/assets/pages/waves/css/waves.min.css')}}" type="text/css" media="all">
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="{{ public_asset('admin/assets/icon/feather/css/feather.css')}}">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css" href="{{ public_asset('admin/assets/css/font-awesome-n.min.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ public_asset('admin/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ public_asset('admin/assets/css/pages.css')}}">
    </head>
    <body themebg-pattern="theme1">
    <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <!-- [ Header ] start -->
        <nav class="navbar header-navbar pcoded-header" header-theme="themelight1">
            <div class="navbar-wrapper">
                <div class="navbar-logo" logo-theme="theme1">
                    <a href="{{ route('admin.dashboard') }}">
                        <img class="img-fluid" src="{{ asset('website/assets/img/logo.png') }}" alt="Doko Tours" />
                    </a>
                </div>
                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                <i class="full-screen feather icon-maximize"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- [ chat user list ] start -->
    </div>
    <!-- Menu header end -->
        @yield('content')
    </div>

        <div class="footer">
            <p class="text-center m-b-0">Copyright &copy; 2022 Travel Adventure Nepal , All rights reserved.</p>
        </div>

        <!-- Laravel Mix - JS File -->
        <script  src="{{ public_asset('admin/bower_components/jquery/js/jquery.min.js')}}"></script>
        <script  src="{{ public_asset('admin/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
        <script  src="{{ public_asset('admin/bower_components/popper.js/js/popper.min.js')}}"></script>
        <script  src="{{ public_asset('admin/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>
        <script  src="{{ public_asset('admin/assets/js/pace.min.js')}}"></script>
        <!-- waves js -->
        <script src="{{ public_asset('admin/assets/pages/waves/js/waves.min.js')}}"></script>
        <!-- jquery slimscroll js -->
        <script  src="{{ public_asset('admin/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>
        <!-- modernizr js -->
        <script  src="{{ public_asset('admin/bower_components/modernizr/js/modernizr.js')}}"></script>
        <script  src="{{ public_asset('admin/bower_components/modernizr/js/css-scrollbars.js')}}"></script>
        <!-- Custom js -->
        <script  src="{{ public_asset('admin/assets/js/common-pages.js')}}"></script>
    @yield('js')
    </body>

</html>
