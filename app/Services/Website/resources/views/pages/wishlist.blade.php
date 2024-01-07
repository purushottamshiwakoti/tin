@extends('website::layouts.master')

@section('content')
    <div class="container-fluid page-jumbo">
        <div class="row">
            <img src="{{ asset('ruploads/' . $page->getCoverImage()) . pages_parallax() }}" class="jumbo-img lazy" alt="wishlist">
        </div>
    </div>
    <div class="container-fluid paddingtb text-center">
        <div class="container">
            <div class="row">
                <div class="activity-desc wishlist clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="double-head">
                            <h1>{{ $page->page_title }} <span>Wishlist</span></h1>
                        </div>
                        @if (!auth()->check())
                            <p>These trips are only stored temporarily. Sign up or log in to make sure they’re saved, and
                                accessible on all your devices.</p>
                            <button data-toggle="modal" data-target="#loginModal" class="btn btn-sign-in">Sign in to my
                                account <i class="fa fa-user"></i> </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid paddingb packages">
        <div class="container">
            <div class="row">
                <div class="packages-thumb-wrap" id="wishlist">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" v-for="item in wishList">
                        <a :href="makeLink(item)">
                            <div class="package-thumb hovereffect">
                                <figure><img :src="rImage(item)" :alt="item.title"></figure>
                                {{-- <img src="{{ public_asset('website/img/category-overlay.png') }}" class="overlay-package"
                                    :alt="item.title"> --}}
                                <div class="package-price">
                                    <p>@{{ item.price }}$</p>
                                    <span>Starting Price</span>
                                </div>
                                <div class="favourite" v-bind:data-trip="item.id" v-bind:data-name="item.title"
                                    @WishlistUpdated="getAllWishList"
                                    data-url="{{ route('website.trips.favourite.store') }}"><i class="fa fa-heart added"
                                        aria-hidden="true"></i></div>
                                <div class="package-detail">
                                    <h6>@{{ item.title }} <span>- @{{ item.duration }}</span></h6>
                                    <div class="rating">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="difficulty-img" v-if="item.difficulty">
                                    <img :src="diffImage(item)" :alt="item.title">
                                    <p>Difficulty</p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- @include('website::partials.help-me') --}}
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1" ></script>
    <script src="https://unpkg.com/vue-cookies@1.5.5/vue-cookies.js" ></script>
    <script>
        addLoadEvent(function() {
            new Vue({
                el: '#wishlist',
                data: {
                    'wishList': [],
                    'computedWishList': [],
                    'favTrips': []
                },
                mounted() {

                    var vm = this;
                    $(document).on("wishlist-updated", vm.getAllWishList);
                    // var fav_trips = $.cookie('fav_trips');

                    vm.getAllWishList();

                },
                updated() {


                },
                computed: {
                    computedWishList: function() {
                        var vm = this;
                        var fav_trips = vm.$cookies.get('fav_trips');
                        console.log(fav_trips);
                        vm.getAllWishList();
                    },
                },
                methods: {
                    getAllWishList: function() {
                        var vm = this;
                        var fav_trips = vm.$cookies.get('fav_trips');
                        if (fav_trips) {
                            fav_trips = JSON.parse(fav_trips);
                        }
                        vm.favTrips = fav_trips;

                        var trip_arrays = vm.favTrips.map(x => {
                            return x.id
                        });
                        var trip_ids = trip_arrays.join(',');

                        vm.$http.get("{{ route('website.trips.favourite.get') }}", {
                                'params': {
                                    'trip_ids': trip_ids
                                }
                            })
                            .then(function(response) {
                                vm.wishList = response.data;
                                console.log(vm.wishList);
                            }, function(response) {});
                    },
                    diffImage(item) {
                        return "{{ public_asset('icons/difficulty/') }}/" + item.difficulty + ".png";
                    },
                    rImage(item) {
                        return "{{ asset('ruploads/') }}/" + item.first_image + "?w=360&h=404&fit=crop";
                    },
                    makeLink(item) {
                        return base_url + "/" + item.slug;
                    }
                }
            });
        });
    </script>
@stop
