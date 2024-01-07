@extends('website::layouts.master')
@section('content')
    <div class="container-fluid page-jumbo regionjumbo">
        <div class="row">
            @php
                $pageImage = $page->getCoverImage() ? asset('ruploads/' . $page->getCoverImage()) . pages_parallax() : 'https://www.traveladventurenepal.com.au/ruploads/1542195545.chitwan.jpg';
            @endphp
            <img src="{{ $pageImage }}">
            <div class="overlay"></div>
        </div>
    </div>
    <div class="container-fluid paddingtb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 general-page">
                    {!! $page->page_description !!}
                </div>
            </div>
        </div>
    </div>
    @if ($page->featured_content)
        <!-- explore -->
        <section class="container-fluid trekkings-wrap mt-3 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 heading text-center">
                        <h1>EXPLORE PERKS AND PRIVILAGES</h1>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-12 trekkings mt-3">
                        {!! $page->featured_content !!}
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- explore -->
    <!-- terms&conditions modal -->
    <div class="modal fade termsconditions-modal" id="termsModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 logo text-center mb-5">
                        <img src="https://www.traveladventurenepal.com.au/public/website/img/logo.png" alt="logo">
                    </div>
                    {!! $page->other_description !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script  src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5bf139136fb45184"></script>
    <script>
        addLoadEvent(function() {
            $('.trekkings figure').addClass('col-md-4 col-sm-12 col-lg-4 col-xl-4 col4');
        });
    </script>
@stop
