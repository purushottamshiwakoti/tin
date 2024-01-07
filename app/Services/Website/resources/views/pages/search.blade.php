@extends('website::layouts.master')

@section('content')

    <section class="breadcrumb-section with-text bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12 breadcrumb-wrapper">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('website.home') }}">
                                    <svg width="14" height="15" viewBox="0 0 14 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_266_1654)">
                                            <path
                                                d="M13.7899 7.73344L7.75241 1.69906L7.34772 1.29438C7.25551 1.20278 7.13082 1.15137 7.00085 1.15137C6.87087 1.15137 6.74618 1.20278 6.65397 1.29438L0.211783 7.73344C0.117301 7.82755 0.0426296 7.93964 -0.00782254 8.06309C-0.0582747 8.18653 -0.0834854 8.31884 -0.0819665 8.45219C-0.0757165 9.00219 0.382096 9.44125 0.932096 9.44125H1.59616V14.5303H12.4055V9.44125H13.0837C13.3508 9.44125 13.6024 9.33656 13.7915 9.1475C13.8846 9.05471 13.9583 8.94437 14.0085 8.82287C14.0586 8.70137 14.0842 8.57113 14.0837 8.43969C14.0837 8.17406 13.979 7.9225 13.7899 7.73344ZM7.87585 13.4053H6.12585V10.2178H7.87585V13.4053ZM11.2805 8.31625V13.4053H8.87585V9.84281C8.87585 9.4975 8.59616 9.21781 8.25085 9.21781H5.75085C5.40553 9.21781 5.12585 9.4975 5.12585 9.84281V13.4053H2.72116V8.31625H1.22116L7.00241 2.53969L7.36335 2.90063L12.7821 8.31625H11.2805Z"
                                                fill="#899098" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_266_1654">
                                                <rect width="14" height="14" fill="white"
                                                    transform="translate(0 0.84375)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Search</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-60">
        <div class="container" id="searchPage">
            <div class="row">
                <div class="filter-bar mobile-view show" id="filterToggler">
                    <div class="icon-filter">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-filter" width="32"
                            height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5.5 5h13a1 1 0 0 1 .5 1.5l-5 5.5l0 7l-4 -3l0 -4l-5 -5.5a1 1 0 0 1 .5 -1.5" />
                        </svg>
                        Filter
                    </div>
                    <div class="close">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="32"
                            height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                    </div>
                </div>
                <div class="col-12 mb-40 section-heading columned">
                    <div class="row">
                        <div class="col-md-8">
                            <h1>Search Keyword</h1>
                            <p>Our blog where we write much about our opinion and express ourself above everything.</p>
                        </div>
                        <div class="col-md-4 sort-by">
                            Sort By:
                            <select @change="fetchTrips(pagination_url)" class="select" v-model="sort_type">
                                <option value="title::asc">A-Z</option>
                                <option value="title::desc">Z-A</option>
                                <option value="difficulty::desc">Difficulty (High to Low)</option>
                                <option value="difficulty::asc">Difficulty (Low to Hight)</option>
                                <option value="price::asc">Price (Low to High)</option>
                                <option value="price::desc">Price (high to Low)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 filter-wrapper">
                    <div class="filter-content">
                        <div class="text-tertiary font-18 fw-600 mb-3">Filters</div>
                        <form class="">
                            <div class="form-group mb-4">
                                <label for="">Search</label>
                                <input type="text" class="form-control afterSearch" @input="fetchTrips(pagination_url)"
                                    v-model="query" name="search" id="search">
                                <div id="resetSearchFilter" class="text-start d-block mt-3 text-danger cursor-pointer"
                                    v-on:click="defaultSearch($event)">Clear all</div>
                            </div>

                            <div class="wrapper mb-4">
                                <div class="form-group">
                                    <label for="">Activities</label>

                                    <div class="form-check form-group mb-2" v-for="activity in activities">
                                        <label class="form-check-label mb-0">
                                            @{{ activity.title }}
                                            <input class="form-check-input me-2" type="checkbox"
                                                @change="changeSelectedActivities(activity,event)"
                                                v-model="selectedActivitiesObject"
                                                :value="{ id: activity.id, title: activity.title }" id="flexCheckChecked">
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="left-trip-panel price-range-slide">
                                <h6>Price Range</h6>
                                <div class="range bottom-border">
                                    <div id="slider-range2"></div>
                                    <p class="range-display">
                                        <input type="text" id="amount-left" readonly
                                            style="border:0; color:#000; font-weight:normal;float:left;width:50%;font-family:'Poppins',sans-serif;font-size: 14px;color: #7c7c7c; ">
                                        <input type="text" id="amount-right" readonly
                                            style="border:0; color:#000; font-weight:normal;float:right;width:50%;text-align:right;font-family:'Poppins',sans-serif;font-size: 14px;color: #7c7c7c; ">
                                    </p>
                                </div>
                            </div>
                            <div class="left-trip-panel trip-duration-slide">
                                <h6>Trip Duration</h6>
                                <div class="range bottom-border">
                                    <div id="slider-range"></div>
                                    <p class="range-display">
                                        <input type="text" id="days-left" readonly
                                            style="border:0; color:#000; font-weight:normal;float:left;width:50%;font-family:'Poppins',sans-serif;font-size: 14px;color: #7c7c7c; ">
                                        <input type="text" id="days-right" readonly
                                            style="border:0; color:#000; font-weight:normal;float:right;width:50%;text-align:right;font-family:'Poppins',sans-serif;font-size: 14px;color: #7c7c7c; ">
                                    </p>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
                <div class="col-lg-9 search-results mt-5 mt-lg-0">
                    <div class="loaderSearch">
                        <img src="{{ asset('website/assets/img/spin.gif') }}" alt="search loader">
                    </div>
                    <div class="row">


                        <div class="col-12 tags-section">
                            <h6>Applied Filters</h6>
                            <div class="tags-wrapper">

                                <div class="item" v-if="query">
                                    @{{ query }}
                                    <div class="close" @click="query='';fetchTrips(pagination_url)">
                                        <svg width="12" height="13" viewBox="0 0 12 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.18031 9.68001L2.82031 3.32001" stroke="#2D71BC"
                                                stroke-linecap="round" stroke-linejoin="bevel" />
                                            <path d="M9.18031 3.32001L2.82031 9.68001" stroke="#2D71BC"
                                                stroke-linecap="round" stroke-linejoin="bevel" />
                                        </svg>
                                    </div>
                                </div>



                                <div class="item" v-for="(a,ai) in selectedActivitiesObject">
                                    @{{ a.title }}
                                    <div class="close">
                                        <svg width="12" height="13" viewBox="0 0 12 13"
                                            @click="selectedActivitiesObject.splice(ai,1);selectedActivities.splice(ai,1);fetchTrips(pagination_url)"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.18031 9.68001L2.82031 3.32001" stroke="#2D71BC"
                                                stroke-linecap="round" stroke-linejoin="bevel" />
                                            <path d="M9.18031 3.32001L2.82031 9.68001" stroke="#2D71BC"
                                                stroke-linecap="round" stroke-linejoin="bevel" />
                                        </svg>
                                    </div>
                                </div>


                            </div>


                        </div>




                        <div class="col-md-4 mb-4 package-card-wrapper" v-for="item in packages">
                            <a :href="makeLink(item)" class="package-card">
                                <div class="img-div">
                                    <img :src="rImage(item)" :alt="item.title">

                                </div>
                                <div class="text-content">
                                    <h6> @{{ item.title }}</h6>
                                    <div class="info d-flex align-items-center">
                                        <div class="rating-wrapper me-3">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-star" width="16" height="16"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="#FAA61A" fill="#FAA61A"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                            </svg>

                                        </div>
                                        <div class="d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-clock" width="16" height="16"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <circle cx="12" cy="12" r="9" />
                                                <polyline points="12 7 12 12 15 15" />
                                            </svg>
                                            <span class="ml-1">@{{ item.duration }} </span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="price">Starting from <span>AUD @{{ item.price }} </span></div>
                                        <svg class="favourite" v-bind:data-trip="item.id" v-bind:data-name="item.title"
                                            data-url="{{ route('website.trips.favourite.store') }}" width="20"
                                            height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            {{-- <g clip-path="url(#clip0_236_1631)"> --}}
                                            <g>
                                                <path
                                                    d="M16.2501 11.31L10.0001 17.5L3.75009 11.31M3.75009 11.31C3.33784 10.9088 3.01312 10.4267 2.79638 9.89387C2.57963 9.36105 2.47556 8.78913 2.4907 8.21412C2.50585 7.6391 2.63989 7.07345 2.88439 6.55279C3.12888 6.03212 3.47853 5.56772 3.91133 5.18882C4.34412 4.80993 4.85068 4.52475 5.3991 4.35124C5.94752 4.17773 6.52593 4.11966 7.09789 4.18067C7.66986 4.24169 8.223 4.42047 8.72248 4.70576C9.22196 4.99105 9.65696 5.37667 10.0001 5.83834C10.3447 5.38002 10.7802 4.99777 11.2793 4.71551C11.7785 4.43325 12.3305 4.25705 12.9009 4.19794C13.4712 4.13883 14.0477 4.19809 14.5941 4.372C15.1405 4.54591 15.6451 4.83073 16.0764 5.20864C16.5077 5.58655 16.8563 6.04941 17.1004 6.56825C17.3446 7.08709 17.479 7.65074 17.4953 8.22393C17.5117 8.79712 17.4095 9.3675 17.1952 9.89938C16.9809 10.4313 16.6592 10.9132 16.2501 11.315"
                                                    stroke="black" stroke-opacity="0.1" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                {{-- <clipPath id="clip0_236_1631"> --}}
                                                <clipPath>
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>

                                    </div>
                                </div>
                            </a>
                        </div>

                        <div v-if="packages.length<=0">
                            {{-- <p>No results found</p> --}}
                            <img src="https://s9.gifyu.com/images/no_result.gif"
                                alt=""style="
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                    ">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- @include('website::partials.things-know',['nepalPosts'=>$nepalPostsTour]) --}}



@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-simulate/1.0.1/jquery.simulate.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <script>
        var base_url = "{{ url('/') }}";
    </script>
    <script>
        addLoadEvent(function() {

            var resultApp = new Vue({
                el: '#resultDiv',
                data: {
                    'resultCount': 0,
                }
            });
            new Vue({
                el: '#searchPage',
                data: {
                    'packages': [],
                    'activities': {!! json_encode($activities) !!},
                    'selectedActivities': [],
                    'regions': {!! json_encode($regions) !!},
                    'selectedRegions': [],
                    'selectedActivitiesObject': [],
                    'query': null,
                    'resultCount': 0,
                    'filter_by': null,
                    'duration': null,
                    'pagination': {},
                    'sort_type': 'title::asc',
                    'price_range': {
                        'min': 0,
                        'max': 5000,
                    },
                    'duration_range': {
                        'min': 0,
                        'max': 90
                    },
                    'pagination_url': "{{ route('website.trips.search') }}",
                },
                created() {
                    var vm = this;
                    vm.query = "{{ request()->get('query') }}";
                    let queryActivityId = "{{ request()->get('activities') }}";
                    let queryActivity = vm.activities.find(elem => elem.id == queryActivityId)
                    if (queryActivity) {
                        vm.selectedActivitiesObject = [{
                            id: queryActivity.id,
                            title: queryActivity.title
                        }]
                    }
                    if (queryActivityId) {
                        vm.selectedActivities = [queryActivityId];
                    }

                    // console.log(vm.selectedActivitiesObject);
                    vm.selectedRegions = ["{{ request()->get('regions') }}"];
                    vm.fetchTrips(vm.pagination_url);

                },
                mounted() {
                    var vm = this;
                    $(document).ready(function() {
                        if ($("#slider-range").length < 1) {
                            return false;
                        }
                        $("#slider-range").slider({
                            range: true,
                            min: 0,
                            max: 90,
                            values: [0, 90],
                            slide: function(event, ui) {
                                $("#days-left").val(ui.values[0] + " Days");
                                $("#days-right").val(ui.values[1] + " Days");
                                $(document).trigger(jQuery.Event("filterChanged", {
                                    "evalues": ui.values,
                                    'ftype': 'duration'
                                }));
                            }
                        });
                        $("#days-left").val($("#slider-range").slider("values", 0) + " Days");
                        $("#days-right").val($("#slider-range").slider("values", 1) + " Days");

                        $("#slider-range2").slider({
                            range: true,
                            min: 1,
                            max: 5000,
                            values: [0, 5000],
                            slide: function(event, ui) {

                                $("#amount-left").val(ui.values[0] + "AUD");
                                $("#amount-right").val(ui.values[1] + "AUD");
                                $(document).trigger(jQuery.Event("filterChanged", {
                                    "evalues": ui.values,
                                    'ftype': 'price'
                                }));
                            }
                        });
                        $("#amount-left").val($("#slider-range2").slider("values", 0) + "AUD");

                        // $("#amount-left").simulate("change");
                        $("#amount-right").val($("#slider-range2").slider("values", 1) + "AUD");
                        $(document).on("filterChanged", function(evt, data) {
                            var range = evt.evalues;
                            var type = evt.ftype;
                            if (type === 'price') {
                                vm.price_range.min = range[0];
                                vm.price_range.max = range[1];
                            } else {
                                vm.duration_range.min = range[0];
                                vm.duration_range.max = range[1];
                            }
                            vm.filterTrips();
                        });

                    })

                },
                computed: {
                    packages: function() {
                        var vm = this;
                        // console.log(vm.selectedActivities);
                    },
                    pages() {
                        let pages = [];
                        var total_pages = Math.ceil(this.pagination.total / this.pagination.per_page);
                        let from = this.pagination.current_page;

                        // console.log(from);
                        // console.log(total_pages);
                        let i = 0;
                        while (from <= total_pages && i < 3) {
                            pages.push({
                                num: from,
                                url: this.pagination_url + '?page=' + from
                            });
                            i++;
                            from++;
                        }
                        return pages;
                    }

                },
                methods: {
                    changeSelectedActivities(activity, e) {
                        e.preventDefault();
                        // console.log(e);
                        let vm = this;
                        // vm.selectedActivitiesObject.push({id:activity.id,title:activity.title});
                        // let queryActivity = vm.activities.find(elem=>elem.id==queryActivityId)
                        // console.log(vm.selectedActivities);
                        let selectedIds = vm.selectedActivitiesObject.map(item => item.id);
                        vm.selectedActivities = selectedIds;
                        vm.fetchTrips(vm.pagination_url);
                        // vm.fetchTrips(vm.pagination_url)
                    },
                    filterTrips: function() {
                        var vm = this;
                        return this.fetchTrips(this.pagination_url);
                    },
                    fetchTrips: function(page_url, event) {
                        var vm = this;
                        $(".loaderSearch").addClass('showLoader');
                        // $(".loaderSearch").delay(1000).fadeOut("fast");
                        if (event) event.preventDefault();
                        var activity_id = vm.selectedActivities.join(',');
                        var duration = $.makeArray(Object.values(vm.duration_range)).join(',');
                        var price = $.makeArray(Object.values(vm.price_range)).join(',');
                        var params = {
                            'q': vm.query,
                            'activity_id': activity_id,
                            'duration': duration,
                            'price': price,
                            'sort-type': vm.sort_type
                        };
                        vm.$http.get(page_url, {
                                'params': params
                            })
                            .then(function(response) {
                                $(".loaderSearch").removeClass('showLoader');

                                vm.makePagination(response.data);
                                vm.packages = response.data.data;
                                vm.resultCount = vm.packages.length;
                                resultApp.resultCount = vm.resultCount;
                                if ($(window).width() <= 768 && $("#sidefilter").is(':visible')) {
                                    $("div.success").fadeOut().fadeIn(300);
                                }
                                $(".loading-overlay-m").hide();
                                // console.log(vm.packages);
                            }, function(response) {
                                console.log(response)
                            });
                    },
                    defaultSearch: function() {
                        if (event) event.preventDefault();
                        var vm = this;
                        vm.price_range = {
                            'min': 0,
                            'max': 5000,
                        };
                        vm.duration_range = {
                            'min': 0,
                            'max': 90
                        };
                        vm.selectedActivities = [];
                        vm.query = '';
                        return this.fetchTrips(this.pagination_url);
                    },
                    makePagination: function(data) {
                        var vm = this;
                        vm.pagination = {
                            current_page: data.current_page,
                            last_page: data.last_page,
                            next_page_url: data.next_page_url,
                            per_page: data.per_page,
                            prev_page_url: data.prev_page_url,
                            total: data.total,
                        };

                    },
                    diffImage(item) {
                        return "{{ public_asset('icons/difficulty/') }}/" + item.difficulty + ".png";
                    },
                    diffLevel(item) {
                        return "difficulty" + item.difficulty;
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
