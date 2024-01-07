@extends('website::layouts.master')
@section('content')
    <div class="container-fluid page-jumbo">
        <div class="row">
            <img src="{{ asset('ruploads/' . $page->getCoverImage()) . pages_parallax() }}" class="jumbo-img">
        </div>
    </div>
    <div class="container-fluid paddingtb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- DETAIL POST -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 general-page text-center">
                        <div class="row">
                            <h4>{{ $page->page_title }}</h4>
                            {!! $page->page_description !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid generalimages general">
        <div class="container">
            <div class="row">
                {!! $page->other_description !!}
            </div>
        </div>
    </div>
    <div class="container-fluid generalfaq">
        <div class="container">
            <div class="row">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    @foreach ($faqs as $faq)
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading{{ $faq->id }}">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse{{ $faq->id }}" aria-expanded="true"
                                        aria-controls="collapse{{ $faq->id }}">
                                        {{ $faq->question }}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{ $faq->id }}" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="heading{{ $faq->id }}">
                                <div class="panel-body">
                                    {!! $faq->answer !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('website::partials.general-form')
@stop
