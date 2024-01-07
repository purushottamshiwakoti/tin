@extends('website::user.layouts.master')

@section('content')
@include('website::user.layouts.sidebar')
<div class="dashboard-content">
    @include('website::user.layouts.topbar')
    @yield('main-content-wrapper') 
  



</div>

@endsection
