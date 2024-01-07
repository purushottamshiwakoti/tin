@extends('backend::layouts.master')
@section('content')
    <div class="page-wrapper">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
        <!-- Page-body start -->
        <div class="page-body">
            <div class="row">
                <!-- web statustic card start -->
                <div class="col-xl-3 col-md-6">
                    <div class="card o-hidden bg-c-blue web-num-card">
                        <a href="{{ url('admin/bookings') }}">
                        <div class="card-block text-white">

                            <h5 class="m-t-15">Trip Booking</h5>
                            <h3 class="m-b-15">{{ $counts->trips }}</h3>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card o-hidden bg-c-green web-num-card">
                        <a href="{{ url('admin/flight-bookings') }}">
                        <div class="card-block text-white">
                            <h5 class="m-t-15">Flight Booking</h5>
                            <h3 class="m-b-15">{{ $counts->flights }}</h3>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card o-hidden bg-c-red web-num-card">
                        <a href="{{ url('admin/customers') }}">
                        <div class="card-block text-white">
                            <h5 class="m-t-15">Customers</h5>
                            <h3 class="m-b-15">{{ $counts->customers }}</h3>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card o-hidden bg-c-yellow web-num-card">
                        <a href="{{ url('admin/subscribers') }}">
                        <div class="card-block text-white">
                            <h5 class="m-t-15">Subscribers</h5>
                            <h3 class="m-b-15">{{ $counts->subscribers }}</h3>
                        </div>
                        </a>
                    </div>
                </div>
                <!-- web statustic card end -->

                <!-- Lead, Today’s  Schedule start -->
                <div class="col-xl-8 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Leads Overview</h5>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                                    <li><i class="feather icon-maximize full-card"></i></li>
                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                    <li><i class="feather icon-refresh-cw reload-card"></i></li>
                                    <li><i class="feather icon-trash close-card"></i></li>
                                    <li><i class="feather icon-chevron-left open-card-option"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            <div id="lead-overview-chart" class="chart-shadow" style="height:345px">
                                <div id="embed-api-auth-container"></div>
                                <div id="view-selector-container"></div>
                                <div id="main-chart-container"></div>
                                <div id="breakdown-chart-container"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card amount-close-card">
                        <div class="card-header">
                            <h5>Trips By Bookings</h5>
                        </div>
                        <div class="card-block">
                            @php
                            $colorOptions = ['blue','red','yellow','green'];
                            $i = 0;
                            @endphp
                            @foreach($popularTrips as $trip)
                            <div class="row align-items-center m-b-15">
                                <div class="col-auto">
                                    <h6 class="m-b-0 text-c-{{$colorOptions[$i]}}">{{ $trip->title }}</h6>
                                </div>
                                <div class="col text-right">
                                    <p class="m-b-0">{{ $trip->bookings_count }}</p>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-c-{{$colorOptions[$i]}}" style="width:{{$trip->bookPer}}%"></div>
                            </div>
                                @php
                                $i++
                                @endphp
                            @endforeach

                        </div>
                    </div>


                </div>
                <!-- Lead, Today’s  Schedule end -->

                <!-- market, Bandwidth usage card start -->
                <div class="col-md-6">
                    <div class="card table-card">
                        <div class="card-header">
                            <h5>Upcoming Fixed Departures</h5>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                                    <li><i class="feather icon-maximize full-card"></i></li>
                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                    <li><i class="feather icon-refresh-cw reload-card"></i></li>
                                    <li><i class="feather icon-trash close-card"></i></li>
                                    <li><i class="feather icon-chevron-left open-card-option"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block p-b-0">
                            <div class="table-responsive">
                                <table class="table table-hover m-b-0">
                                    <thead>
                                    <tr>
                                        {{--<th>Id</th>--}}
                                        <th>Departure Date</th>
                                        <th>Trip Name</th>
                                        <th>Return Date</th>
                                        <th>Starting From</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($hotDeals->take(5) as $hotDeal)
                                    <tr>
                                        {{--<td class="text-left">--}}
                                            {{--<i class="fab fa-bitcoin text-c-blue f-18 m-r-10"></i>Bitcoin--}}
                                        {{--</td>--}}
                                        <td>{{ $hotDeal->start_date->format('Y M d') }}</td>
                                        <td>{{ $hotDeal->trip->title }}</td>
                                        <td>{{ ($hotDeal->return_date)?$hotDeal->return_date->format('Y M d'):'-' }}</td>
                                        <td>${{ $hotDeal->price }}</td>
                                    </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Amount Closed and Revenue start -->
                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Recent Comments</h5>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                                    <li><i class="feather icon-maximize full-card"></i></li>
                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                    <li><i class="feather icon-refresh-cw reload-card"></i></li>
                                    <li><i class="feather icon-trash close-card"></i></li>
                                    <li><i class="feather icon-chevron-left open-card-option"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            <div class="schedule-block">
                                @foreach($recentReviews as $recentReview)
                                <div class="schedule-list">
                                    <p>Star: {{ $recentReview->rating_value }}</p>
                                    <a href="{{ route('admin.ratings.show',['rating'=>$recentReview->id]) }}"><h6>{{ $recentReview->title }}<small class="m-l-10 text-c-blue f-w-700">{{ $recentReview->created_at->diffForHumans() }}</small></h6>
                                    <p class="">{{ str_limit(strip_tags($recentReview->review),30) }}</p>
                                    </a>
                                    {{--<button class="btn btn-success btn-outline-success btn-sm">Approve</button>--}}
                                    {{--<button class="btn btn-danger btn-outline-danger btn-sm m-l-15">Refuse</button>--}}
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Statistics</h5>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                                    <li><i class="feather icon-maximize full-card"></i></li>
                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                    <li><i class="feather icon-refresh-cw reload-card"></i></li>
                                    <li><i class="feather icon-trash close-card"></i></li>
                                    <li><i class="feather icon-chevron-left open-card-option"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block ">
                            <div id="revenue-chart" style="height:345px" class="chart-shadow"></div>
                        </div>
                    </div>
                </div>
               
                <!-- Amount Closed and Revenue end -->
            </div>
            <div>
                <a type="button" class="btn btn-primary" href="{{ route("sitemap") }}">
                   Renew Sitemap
                </a>
            </div>
        </div>
    </div>
@stop
@section('javascript')
    <script>
        (function(w,d,s,g,js,fs){
            g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
            js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
            js.src='https://apis.google.com/js/platform.js';
            fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
        }(window,document,'script'));
    </script>
    <script>

        gapi.analytics.ready(function() {

            /**
             * Authorize the user immediately if the user has already granted access.
             * If no access has been created, render an authorize button inside the
             * element with the ID "embed-api-auth-container".
             */
            gapi.analytics.auth.authorize({
                container: 'embed-api-auth-container',
                clientid: 'REPLACE WITH YOUR CLIENT ID'
            });


            /**
             * Create a new ViewSelector instance to be rendered inside of an
             * element with the id "view-selector-container".
             */
            var viewSelector = new gapi.analytics.ViewSelector({
                container: 'view-selector-container'
            });

            // Render the view selector to the page.
            viewSelector.execute();

            /**
             * Create a table chart showing top browsers for users to interact with.
             * Clicking on a row in the table will update a second timeline chart with
             * data from the selected browser.
             */
            var mainChart = new gapi.analytics.googleCharts.DataChart({
                query: {
                    'dimensions': 'ga:browser',
                    'metrics': 'ga:sessions',
                    'sort': '-ga:sessions',
                    'max-results': '6'
                },
                chart: {
                    type: 'TABLE',
                    container: 'main-chart-container',
                    options: {
                        width: '100%'
                    }
                }
            });


            /**
             * Create a timeline chart showing sessions over time for the browser the
             * user selected in the main chart.
             */
            var breakdownChart = new gapi.analytics.googleCharts.DataChart({
                query: {
                    'dimensions': 'ga:date',
                    'metrics': 'ga:sessions',
                    'start-date': '7daysAgo',
                    'end-date': 'yesterday'
                },
                chart: {
                    type: 'LINE',
                    container: 'breakdown-chart-container',
                    options: {
                        width: '100%'
                    }
                }
            });


            /**
             * Store a refernce to the row click listener variable so it can be
             * removed later to prevent leaking memory when the chart instance is
             * replaced.
             */
            var mainChartRowClickListener;


            /**
             * Update both charts whenever the selected view changes.
             */
            viewSelector.on('change', function(ids) {
                var options = {query: {ids: ids}};

                // Clean up any event listeners registered on the main chart before
                // rendering a new one.
                if (mainChartRowClickListener) {
                    google.visualization.events.removeListener(mainChartRowClickListener);
                }

                mainChart.set(options).execute();
                breakdownChart.set(options);

                // Only render the breakdown chart if a browser filter has been set.
                if (breakdownChart.get().query.filters) breakdownChart.execute();
            });


            /**
             * Each time the main chart is rendered, add an event listener to it so
             * that when the user clicks on a row, the line chart is updated with
             * the data from the browser in the clicked row.
             */
            mainChart.on('success', function(response) {

                var chart = response.chart;
                var dataTable = response.dataTable;

                // Store a reference to this listener so it can be cleaned up later.
                mainChartRowClickListener = google.visualization.events
                    .addListener(chart, 'select', function(event) {

                        // When you unselect a row, the "select" event still fires
                        // but the selection is empty. Ignore that case.
                        if (!chart.getSelection().length) return;

                        var row =  chart.getSelection()[0].row;
                        var browser =  dataTable.getValue(row, 0);
                        var options = {
                            query: {
                                filters: 'ga:browser==' + browser
                            },
                            chart: {
                                options: {
                                    title: browser
                                }
                            }
                        };

                        breakdownChart.set(options).execute();
                    });
            });

        });
    </script>
@stop