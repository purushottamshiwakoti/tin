@extends('website::layouts.master')
@section('content')
    <div class="container-fluid page-jumbo all-jumbo">
        <div class="row">
            <img src="{{ asset('ruploads/'.$trip->getFirstImage()).pages_parallax() }}" class="jumbo-img">
            {{--<div class="parallax-window parallax-small" data-parallax="scroll" data-speed="0.67" data-image-src="{{ asset('ruploads/'.$trip->getFirstImage()).pages_parallax() }}" >--}}
                <div class="col-md-12 col-sm-12 col-lg-12 col12 nopadding">

                    <div class="col-md-6 col-sm-12 col-lg-6 col6 nopadding">
                        <img src="{{ public_asset('website/img/logo.png') }}" class="logo">
                        <h1>{{ $trip->title }}</h1>
                    </div>
                    <div class="col-md-2 col-sm-12 col-lg-2 col2 nopadding">

                    </div>

                </div>
            {{--</div>--}}
        </div>
    </div>
    @php
        $alternates = $trip->alternateItinerary;
        $alternateKeys = $alternates->pluck('key');

    @endphp
    <div class="container-fluid basicinfo tripnoteinfo">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-lg-8 trip-activity nopadding">
                    <ul>
                        @foreach($trip->extraValues as $extraValue)
                            <li><div class="{{$extraValue->key}}"></div>{{ $extraValue->value }}</li>
                        @endforeach

                    </ul>
                </div>
                <div class="col-md-2 col-sm-12 col-lg-2 trip-head-btn">
                    <a href="#" onclick="myPrint()">
                        <div class="trip-head-print">
                            <i class="fa fa-print" aria-hidden="true"></i>
                        </div>
                    </a>
                    <!-- <div class="trip-head-share">
                              <i class="fa fa-share-alt" aria-hidden="true"></i>
                            </div> -->
                    <div class="cell">

                        @include('website::partials.share-this')
                    </div>
                    <div class="col-md-12 trip-code">
                        <h6>{{ $trip->trip_code }}</h6>
                        <p>Trip Code</p>
                    </div>

                </div>

            </div>
        </div>
    </div><!--basicinfo-->

    <div class="container-fluid tripdetail tripnote">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-lg-push-8 col-md-4 col-md-push-8 col-sm-12 col-xs-12 no-gutter">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="detail-menu">
                            <ul class="nav-tabs-detail wow fadeInUp" data-wow-delay="0.2s">
                                <li>
                                    <a class="active" href="#trip-overview">
                                        Overview</a>
                                </li>
                                <li>
                                    <a class="" href="#itinerary">
                                        Trip Itinerary</a>
                                </li>
                                @foreach($trip->alternateNotes as $key=>$note)
                                    <li>
                                        <a class="active" href="#{{ strtolower(str_replace(' ','-',$note->slug)) }}">
                                            {{ $note->key }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-lg-pull-4 col-md-8 col-md-pull-4 col-sm-12 col-xs-12 no-gutter">
                    <div class="left-panel">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="clearfix"></div>
                            <div class="detail-cont">
                                <section id="trip-overview" class="trip-overview">
                                    <h4>Overview</h4>
                                    {!! html_entity_decode($trip->alternate_overview??$trip->overview) !!}
                                </section>
                                <hr>

                                <section id="itinerary" class="itinerary">
                                    <h4><span class="titinerary-icon"></span>Trip Itinerary</h4>
                                    <div class="trip-itinerary">
                                        <div class="panel-group" id="accordion">
                                            @foreach($alternates as $key=>$alternate)
                                                @php
                                                    $cur_id = strtolower(str_replace(' ','-',$alternate->key));
                                                @endphp
                                                <div class="panel panel-default {{ $key==0?'shadow':'' }}">
                                                    <div class="panel-heading {{ $key==0?'opened':'' }}">
                                                        <div class="timeline" data-days="{{ $key+1 }}">

                                                        </div>
                                                        <h6 class="panel-title">
                                                            <a class="accordion-toggle {{ $key==0?'red':'' }}" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key+1}}">
                                                                <span class="accordin-icon accordin-icon-{{ $key==0?'minus':'plus' }}"></span>
                                                                {{ $alternate->key }}
                                                            </a>
                                                        </h6>
                                                    </div>
                                                    <div id="collapse{{$key+1}}" class="panel-collapse collapse {{ $key==0?'in':'' }}">
                                                        <div class="panel-body">
                                                            {!! html_entity_decode($alternate->value) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </section>
                                <hr>
                                @foreach($trip->alternateNotes as $note)
                                    @php
                                        $cur_id = $note->slug;
                                    @endphp
                                    <section id="{{ $cur_id }}" class="{{ $cur_id }}">
                                        <h4>{{ $note->key }}</h4>
                                        {!! html_entity_decode($note->value) !!}
                                    </section>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
@section('otherContent')
    <!-- sidemenu -->
    <div id="sidenav" class="sidemenu-overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fas fa-times"></i></a>
        <div class="menus">
            <ul>
                <li>
                    <a class="active" onclick="closeNav()" href="#trip-overview">
                        Overview</a>
                </li>
                @foreach($alternateKeys as $alternateKey)
                    <li>
                        <a class="" onclick="closeNav()" href="#{{ strtolower(str_replace(' ','-',$alternateKey)) }}">
                            {{ $alternateKey }}</a>
                    </li>
                @endforeach

            </ul>

        </div>
    </div>
    <i class="fas fa-ellipsis-h" onclick="openNav()"></i>
    <!-- sidemenu -->
@stop
@section('js')
    <script src="{{ public_asset('website/js/stick-detail-menu.js').'?'.now() }}"></script>
    @if($errors->any())
        <script>
            $(document).ready(function () {
                $("#reviews")[0].scrollIntoView({
                    behavior: "smooth"
                });
                $('.btn-add-review').trigger('click').trigger('click').trigger('click');
            })

        </script>
    @endif
    <script>
        function myPrint() {
            window.print();
        }
    </script>
@stop