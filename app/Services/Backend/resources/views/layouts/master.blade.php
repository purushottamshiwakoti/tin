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
    <meta name="author" content="Makura" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon icon -->
    <link rel="icon" href="{{ public_asset('admin/assets/images/favicon.png')}}">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ public_asset('admin/bower_components/bootstrap/css/bootstrap.min.css')}}">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{ public_asset('admin/assets/pages/waves/css/waves.min.css')}}" type="text/css" media="all">
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="{{ public_asset('admin/assets/icon/feather/css/feather.css')}}">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css" href="{{ public_asset('admin/assets/css/font-awesome-n.min.css')}}">
    <!-- Redial css -->
    <link rel="stylesheet" href="{{ public_asset('admin/assets/pages/chart/radial/css/radial.css')}}" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="{{ public_asset('admin/bower_components/switchery/css/switchery.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ public_asset('admin/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ public_asset('admin/assets/css/widget.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.standalone.min.css" />
    @yield('css')
</head>

<body>
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <!-- [ Header ] start -->
        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">
                <div class="navbar-logo">
                    <a href="{{ route('admin.dashboard') }}">
                        <img class="img-fluid" src="{{ asset('website/assets/img/logo.png') }}" alt="Theme-Logo" />
                    </a>
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <i class="feather icon-menu"></i>
                    </a>
                    <a class="mobile-options waves-effect waves-light">
                        <i class="feather icon-more-horizontal"></i>
                    </a>
                </div>
                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                <i class="full-screen feather icon-maximize"></i>
                            </a>
                        </li>
                        <li class="header-search">
                            <div class="main-search morphsearch-search">
                                <div class="input-group">
                                        <span class="input-group-prepend search-close">
    										<i class="feather icon-x input-group-text"></i>
    									</span>
                                    <input type="text" class="form-control" placeholder="Enter Keyword">
                                    <span class="input-group-append search-btn">
    										<i class="feather icon-search input-group-text"></i>
    									</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="feather icon-bell"></i>
                                    <span class="badge bg-c-red"></span>
                                </div>
                                <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <li>
                                        <h6>Notifications</h6>
                                        <label class="label label-danger">New</label>
                                    </li>

                                    @foreach($unotifications as $notification)
                                    <li>
                                        <div class="media">
                                            <div class="media-body">
                                                <a href="{{ $notification->url }}">
                                                <h5 class="notification-user">{{ $notification->title }}</h5>
                                                <p class="notification-msg">{{ $notification->message }}.</p>
                                                </a>
                                                <span class="notification-time">{{ $notification->created_at->diffForHumans() }}</span>

                                            </div>
                                        </div>
                                    </li>
                                        @endforeach

                                </ul>
                            </div>
                        </li>

                        <li class="user-profile header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon feather icon-settings"></i>
                                    <span>{{ auth()->user()->name }}</span>
                                    <i class="feather icon-chevron-down"></i>
                                </div>
                                <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <li class="drp-u-details">
                                        <img src="{{ asset('ruploads/'.auth()->user()->getFirstImage())}}" class="img-radius" alt="User-Profile-Image">
                                        <span>{{ auth()->user()->name }}</span>

                                    </li>
                                    <li>
                                        <a href="{{ route('admin.settings.index') }}">
                                            <i class="feather icon-settings"></i> Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.users.show',['user'=>auth()->user()->id]) }}">
                                            <i class="feather icon-user"></i> Profile
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dud-logout" title="Logout">
                                            <i class="feather icon-log-out"></i> Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- [ chat user list ] start -->
        <div id="sidebar" class="users p-chat-user showChat">
            <div class="had-container">
                <div class="p-fixed users-main">
                    <div class="user-box">
                        <div class="chat-search-box">
                            <a class="back_friendlist">
                                <i class="feather icon-x"></i>
                            </a>
                            <div class="right-icon-control">
                                <div class="input-group input-group-button">
                                    <input type="text" id="search-friends" name="footer-email" class="form-control" placeholder="Search Friend">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary waves-effect waves-light" type="button"><i class="feather icon-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-friend-list">
                            <div class="media userlist-box waves-effect waves-light" data-id="1" data-status="online" data-username="Josephin Doe">
                                <a class="media-left" href="#!">
                                    <img class="media-object img-radius img-radius" src="{{ public_asset('admin/assets/images/avatar-3.jpg')}}" alt="Generic placeholder image ">
                                    <div class="live-status bg-success"></div>
                                </a>
                                <div class="media-body">
                                    <div class="chat-header">Josephin Doe</div>
                                </div>
                            </div>
                            <div class="media userlist-box waves-effect waves-light" data-id="2" data-status="online" data-username="Lary Doe">
                                <a class="media-left" href="#!">
                                    <img class="media-object img-radius" src="{{ public_asset('admin/assets/images/avatar-2.jpg')}}" alt="Generic placeholder image">
                                    <div class="live-status bg-success"></div>
                                </a>
                                <div class="media-body">
                                    <div class="f-13 chat-header">Lary Doe</div>
                                </div>
                            </div>
                            <div class="media userlist-box waves-effect waves-light" data-id="3" data-status="online" data-username="Alice">
                                <a class="media-left" href="#!">
                                    <img class="media-object img-radius" src="{{ public_asset('admin/assets/images/avatar-4.jpg')}}" alt="Generic placeholder image">
                                    <div class="live-status bg-success"></div>
                                </a>
                                <div class="media-body">
                                    <div class="f-13 chat-header">Alice</div>
                                </div>
                            </div>
                            <div class="media userlist-box waves-effect waves-light" data-id="4" data-status="offline" data-username="Alia">
                                <a class="media-left" href="#!">
                                    <img class="media-object img-radius" src="{{ public_asset('admin/assets/images/avatar-3.jpg')}}" alt="Generic placeholder image">
                                    <div class="live-status bg-default"></div>
                                </a>
                                <div class="media-body">
                                    <div class="f-13 chat-header">Alia<small class="d-block text-muted">10 min ago</small></div>
                                </div>
                            </div>
                            <div class="media userlist-box waves-effect waves-light" data-id="5" data-status="offline" data-username="Suzen">
                                <a class="media-left" href="#!">
                                    <img class="media-object img-radius" src="{{ public_asset('admin/assets/images/avatar-2.jpg')}}" alt="Generic placeholder image">
                                    <div class="live-status bg-default"></div>
                                </a>
                                <div class="media-body">
                                    <div class="f-13 chat-header">Suzen<small class="d-block text-muted">15 min ago</small></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ chat user list ] end -->

        <!-- [ chat message ] start -->
        <div class="showChat_inner">
            <div class="media chat-inner-header">
                <a class="back_chatBox">
                    <i class="feather icon-x"></i> Josephin Doe
                </a>
            </div>
            <div class="main-friend-chat">
                <div class="media chat-messages">
                    <a class="media-left photo-table" href="#!">
                        <img class="media-object img-radius img-radius m-t-5" src="{{ public_asset('admin/assets/images/avatar-2.jpg')}}" alt="Generic placeholder image">
                    </a>
                    <div class="media-body chat-menu-content">
                        <div class="">
                            <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                        </div>
                        <p class="chat-time">8:20 a.m.</p>
                    </div>
                </div>
                <div class="media chat-messages">
                    <div class="media-body chat-menu-reply">
                        <div class="">
                            <p class="chat-cont">Ohh! very nice</p>
                        </div>
                        <p class="chat-time">8:22 a.m.</p>
                    </div>
                </div>
                <div class="media chat-messages">
                    <a class="media-left photo-table" href="#!">
                        <img class="media-object img-radius img-radius m-t-5" src="{{ public_asset('admin/assets/images/avatar-2.jpg')}}" alt="Generic placeholder image">
                    </a>
                    <div class="media-body chat-menu-content">
                        <div class="">
                            <p class="chat-cont">can you come with me?</p>
                        </div>
                        <p class="chat-time">8:20 a.m.</p>
                    </div>
                </div>
            </div>
            <div class="chat-reply-box">
                <div class="right-icon-control">
                    <div class="input-group input-group-button">
                        <input type="text" class="form-control" placeholder="Write hear . . ">
                        <div class="input-group-append">
                            <button class="btn btn-primary waves-effect waves-light" type="button"><i class="feather icon-message-circle"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ chat message ] end -->

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <!-- [ navigation menu ] start -->
                <nav class="pcoded-navbar">
                    <div class="nav-list">
                        {{menu('admin','backend::menus.admin')}}
                    </div>
                </nav>
                <!-- [ navigation menu ] end -->
                <div class="pcoded-content">
                    <!-- [ breadcrumb ] start -->
                    @php
                        $segments = request()->segments();
                        $breadcrumbs = (array_filter($segments,function($item){ return !is_numeric($item);}));
                        unset($breadcrumbs[0]);
                        $currentCrumb = end($breadcrumbs);
                        $currentCrumb = in_array($currentCrumb,['create','edit'])?prev($breadcrumbs):$currentCrumb;
                    @endphp
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">{{ ucwords(str_replace('-',' ',$currentCrumb)) }}</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('admin.dashboard') }}">
                                                <i class="feather icon-home"></i>
                                            </a>
                                        </li>
                                        @foreach($breadcrumbs as $breadcrumb)
                                        <li class="breadcrumb-item">
                                            <a href="{{ end($breadcrumbs) == $breadcrumb?url()->current():route('admin.'.$breadcrumb.'.index') }}">{{ ucwords(str_replace('-',' ',$breadcrumb)) }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] end -->
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="page-body">

                                        @yield('content')


                                        <!-- Amount Closed and Revenue end -->
                                    </div>
                                </div>
                                <!-- Page-body start -->

                            </div>
                        </div>
                        <!-- Page-body end -->
                    </div>
                </div>
            </div>
            <!-- [ style Customizer ] start -->
            <div id="styleSelector">
            </div>
            <!-- [ style Customizer ] end -->
        </div>
    </div>
</div>
<form id="my_form" action="{{ route('admin.image.upload') }}" target="form_target" method="post"
      enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
    <input name="image" id="upload_file" type="file"
           onchange="$('#my_form').submit();this.value='';">
    <input type="hidden" name="type_slug" id="type_slug" value="{{ $currentCrumb }}">
    {{ csrf_field() }}
</form>
<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 10]>
<div class="ie-warning">

    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade
        <br/>to any of the following web browsers to access this website.
    </p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="{{ public_asset('admin/assets/images/browser/chrome.png')}}" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="{{ public_asset('admin/assets/images/browser/firefox.png')}}" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="{{ public_asset('admin/assets/images/browser/opera.png')}}" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="{{ public_asset('admin/assets/images/browser/safari.png')}}" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="{{ public_asset('admin/assets/images/browser/ie.png')}}" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script  src="{{ public_asset('admin/bower_components/jquery/js/jquery.min.js')}}"></script>
<script  src="{{ public_asset('admin/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
<script  src="{{ public_asset('admin/bower_components/popper.js/js/popper.min.js')}}"></script>
<script  src="{{ public_asset('admin/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>
<script  src="{{ public_asset('admin/assets/js/pace.min.js')}}"></script>

<!-- waves js -->
<script src="{{ public_asset('admin/assets/pages/waves/js/waves.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script  src="{{ public_asset('admin/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>

<script  src="{{ public_asset('admin/assets/pages/nestable/jquery.nestable.js') }}"></script>
{{--Editor--}}
<script src="{{ public_asset('admin/assets/pages/wysiwyg-editor/js/tinymce.min.js') }}"></script>
{{--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>--}}
{{--<script src="{{ public_asset('admin/assets/pages/wysiwyg-editor/wysiwyg-editor.js') }}"></script>--}}
<!-- Select 2 js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js">
</script>
{{--plugin--}}
<script src="{{ public_asset('admin/assets/js/plugin.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
{{--datepicker--}}
<script src="{{ public_asset('admin/bower_components/switchery/js/switchery.min.js')}}"></script>
<script  src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace()
</script>
<!-- Custom js -->
<script src="{{ public_asset('admin/assets/js/pcoded.js')}}"></script>
<script src="{{ public_asset('admin/assets/js/vertical/vertical-layout.min.js')}}"></script>
<script  src="{{ public_asset('admin/assets/js/script.min.js')}}"></script>
@if(Session::has('message'))
    <script>
        toastr.{{ Session::get('alert-type') }}("{{ Session::get('message') }}");
    </script>
@endif
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>

<script  src="{{ public_asset('admin/assets/js/common.js')}}"></script>
@yield('javascript')
</body>

</html>