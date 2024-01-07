<style>
    .owl-item.active:first-of-type {
        width: 0px !important;
    }

    #instafeed img {
        width: 382px;
        height: 316px;
    }
</style>
<div class="container-fluid paddingtb insta-sec text-center">
    <h2>#traveladventurenepal</h2>
    <p>Tag your instagram photos with #traveladventurenepal and see them here</p>

    <div class="insta-carousel owl-carousel" id="instafeed">
        <div class="insta-img-wrap"><a href="https://www.instagram.com/traveladventurenepalptyltd/" target="_blank">
                <div class="overlay"></div><img src="{{ public_asset('website/img/insta1.jpg') }}" alt="">
            </a></div>
    </div>
</div>
@section('javascript')
    <script src="{{ public_asset('website/js/instafeed.js') }}" ></script>
    <script>
        addLoadEvent(function() {
            $(document).ready(function() {
                var config = {
                    autoplay: true,
                    autoplayTimeout: 2000,
                    autoplayHoverPause: true,
                    loop: true,
                    margin: 0,
                    items: 4,
                    nav: false,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        600: {
                            items: 2,
                        },
                        1000: {
                            items: 6,
                        }
                    }
                };

                var feed = new Instafeed({
                    get: 'user',
                    tagName: 'traveladventurenepal',
                    userId: "{{ config('instafeed.userId') }}",
                    accessToken: "{{ config('instafeed.accessToken') }}",
                    resolution: 'standard_resolution',
                    template: '<div class="insta-img-wrap">' +
                        '<a target="_blank" href="@{{ link }}">' +
                        '<div class="overlay"></div>' +
                        '<img data-src="@{{ image }}" alt="" class="lazyimg"/>' +
                        '</a>' +
                        '</div>',
                    after: function() {
                        $('.lazyimg').each(function(k, v) {
                            $(v).attr('src', $(v).attr('data-src'));
                        });
                        $('#instafeed').data('owl.carousel').destroy();
                        $("#instafeed").owlCarousel(config);
                        $('.owl-item.active').first().remove();
                        //

                    }
                });
                feed.run();
            });
        });
    </script>
    @parent
@stop
