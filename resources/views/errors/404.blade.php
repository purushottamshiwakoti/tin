@extends('website::layouts.master')
@section('content')


    <section class="page-not-found pb-800 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto img-wrapper text-center">
                    <img src="{{ asset('website/assets/img/404.png') }}" alt="404">
                </div>
                <div class="col-md-6 mx-auto text-content text-center">
                    <span>OOPS !!!</span>
                    <h2>404 <span>Page Error</span></h2>
                    <p>The page you are looking for is either unavailable or broken. Please use navigation menu in the website or search functionality to find out exciting travel packages.</p>
                    <a href="{{route('website.home')}}"><i class="fal fa-arrow-left"></i>Back to Travel Adventure Nepal Home</a>
                </div>
               
            </div>
        </div>
    </section>

@endsection