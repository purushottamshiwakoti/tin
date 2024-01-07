<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 no-gutter">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="right-trip-panel table-of-content right-quick-link content-menu detail-menu">
            <h4>Table Of Contents</h4>
            {!! $page->other_description !!}
        </div>
    </div>
</div>
@section('js')
    @parent
    <script >
        addLoadEvent(function () {
            var content = $('.table-of-content>ul');
            content.addClass('navs-table-detail wow fadeInUp ');
            content.attr('data-wow-delay','.2s');
        });
    </script>
@stop