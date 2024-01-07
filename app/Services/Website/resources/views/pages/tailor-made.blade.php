@extends('website::layouts.master')
@section('content')
    <div class="container-fluid page-jumbo all-jumbo regionjumbo">
        <div class="row">
            <img class="mb-3 p-0 w-100" src="{{ asset('ruploads/' . $page->getCoverImage()) . pages_parallax() }}" class="jumbo-img lazy">
            <div class="overlay"></div>
            <div class="jumbo-txt">
                <h1>{{ $page->page_title }}</h1>
                <hr>
            </div>

        </div>
    </div>
    <div class="container-fluid paddingtb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 privatedeparture">
                    <!-- DETAIL POST -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col12">
                        <div class="row">
                            {!! $page->page_description !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @if ($page->other_description)
        <div class="container-fluid privatedeparture">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 col12">
                        {!! $page->other_description !!}
                    </div>
                </div>
            </div>
        </div>
    @endif
    @include('website::partials.tailor-made-form')
@stop
@section('js')
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"
        ></script>
    <script>
        addLoadEvent(function() {
            var $grid = $('.imagewrap').isotope({
                // options
                itemSelector: '.img-wrap',
                layoutMode: 'masonry',
                masonry: {
                    columnWidth: '.img-wrap',
                    gutter: 5
                }
            });

            // change is-checked class on buttons
            var $buttonGroup = $('.button-group');
            $buttonGroup.on('click', 'a', function(event) {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                var $button = $(event.currentTarget);
                $button.addClass('is-checked');
                var filterValue = $button.attr('data-filter');
                $grid.isotope({
                    filter: filterValue
                });
            });
        });
    </script>
@stop
