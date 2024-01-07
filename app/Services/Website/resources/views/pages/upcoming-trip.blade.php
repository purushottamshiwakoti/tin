 @extends('website::layouts.master')
 @section('content')

     <section class="mt-80 breadcrumb-section with-text bg-white bg-img">
         <img src="{{ asset('ruploads/' . $page->getCoverImage()) . pages_parallax() }}" alt="upcoming trip">
         <div class="content-wrapper">
             <div class="container">
                 <div class="row">
                     <div class="col-12 breadcrumb-wrapper">
                         <nav aria-label="breadcrumb">
                             <ol class="breadcrumb">
                                 <li class="breadcrumb-item">
                                     <a href="{{ route('website.home') }}">
                                         <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                 d="M13.7899 6.73344L7.75241 0.699063L7.34772 0.294375C7.25551 0.202776 7.13082 0.151367 7.00085 0.151367C6.87087 0.151367 6.74618 0.202776 6.65397 0.294375L0.211783 6.73344C0.117301 6.82755 0.0426296 6.93964 -0.00782254 7.06309C-0.0582747 7.18653 -0.0834854 7.31884 -0.0819665 7.45219C-0.0757165 8.00219 0.382096 8.44125 0.932096 8.44125H1.59616V13.5303H12.4055V8.44125H13.0837C13.3508 8.44125 13.6024 8.33656 13.7915 8.1475C13.8846 8.05471 13.9583 7.94437 14.0085 7.82287C14.0586 7.70137 14.0842 7.57113 14.0837 7.43969C14.0837 7.17406 13.979 6.9225 13.7899 6.73344ZM7.87585 12.4053H6.12585V9.21781H7.87585V12.4053ZM11.2805 7.31625V12.4053H8.87585V8.84281C8.87585 8.4975 8.59616 8.21781 8.25085 8.21781H5.75085C5.40553 8.21781 5.12585 8.4975 5.12585 8.84281V12.4053H2.72116V7.31625H1.22116L7.00241 1.53969L7.36335 1.90063L12.7821 7.31625H11.2805Z"
                                                 fill="white" />
                                         </svg>
                                         Home
                                     </a>
                                 </li>
                                 <li class="breadcrumb-item active" aria-current="page">Last Minute Deals</li>
                             </ol>
                         </nav>
                         <div class="text-content">
                             <h1 class="font-64">Last Minute Deals</h1>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     @if (count($departure_archives) > 0)

         <section class="travel-deals py-100 bg-light">
             <div class="container">
                 <div class="row">
                     <div class="col-12 section-heading mb-40 d-flex justify-content-between">
                         <div>
                             <h2>Last minute travel deals !!</h2>
                             <p>Get some jaw dropping offers and deals with us. We guarantee the best price.</p>
                         </div>

                         <div class="filter-wrapper">
                             <div class="select-wrapper">
                                 {{-- {{ dd($departure_archives)}} --}}

                                 <select class="from js-example-basic-single js-example-responsive" name="upcoming-trips"
                                     id="upcoming-trips">
                                     <!-- for placeholder -->
                                     <option></option>
                                     <!-- for placeholder -->
                                     @foreach ($departure_archives as $da)
                                         <option value="{{ $da['slug'] }}">{{ $da['title'] }}</option>
                                     @endforeach

                                 </select>
                             </div>
                         </div>
                     </div>
                     <div id="defaultDeparture">
                         @foreach ($hotDeals as $h)
                             <div class="col-12 deals-wrapper mb-4">

                                 <div class="row">
                                     <div class="col-md-3 col-sm-6 title">
                                         <p>{{ $h->trip->title }}</p>
                                     </div>

                                     <div class="col-md-3 col-sm-6 date">
                                         <div>
                                             <p>{{ $h->trip->duration }} Days</p>
                                             <span>{{ $h->start_date->format('d M Y') }} -
                                                 {{ $h->finish_date->format('d M Y') }}</span>
                                         </div>
                                     </div>
                                     <div class="col-md-2 col-sm-6 price">
                                         <div>
                                             @if (isset($h->lastminutedeal->deal_price))
                                                 <p>AUD {{ $h->price }}</p>
                                                 <span>AUD {{ $h->lastminutedeal->deal_price }}</span>
                                             @else
                                                 @if (isset($h->trip->old_price))
                                                     <p>AUD {{ $h->trip->old_price }}</p>
                                                 @endif
                                                 <span>AUD {{ $h->price }}</span>
                                             @endif
                                         </div>
                                     </div>
                                     <div class="col-md-1 col-sm-6 stock">
                                         @if ($h->size > 0 || $h->size != null)
                                             <div>
                                                 <p>({{ $h->size }} slots left)</p>
                                                 <span>{{ strtoupper($h->availability) }}</span>
                                             </div>
                                         @else
                                             <p>( No slots left)</p>
                                             <span>NOT AVAILABLE</span>
                                         @endif
                                     </div>
                                     <div class="col-md-3 d-flex justify-content-end col-sm-6 button">
                                         @if ($h->size > 0 || $h->size != null)
                                             <a href="{{ route('website.book.init', ['trip' => $h->trip->slug, 'departure' => $h->id]) }}"
                                                 class="btn btn-custom btn-primary">
                                                 <span>
                                                     Book Now
                                                 </span>
                                             </a>
                                         @else
                                             <a href="javascript:void(0)" class="btn btn-custom btn-primary">
                                                 <span>
                                                     Booking Closed
                                                 </span>
                                             </a>
                                         @endif

                                     </div>
                                 </div>
                             </div>
                         @endforeach
                         {!! $hotDeals->links() !!}
                     </div>
                     <div class="row table-wrapper mt-40 fixed-departures" id="fixed-departures">

                     </div>



                 </div>
             </div>
         </section>

     @endif
 @endsection

 @section('js')

     <script  >
         jQuery(function() {
             $(document).ready(function() {
                 $('#loader').hide();
                 $(".fixed-departures-results").css("opacity", "1");
                 $('#upcoming-trips').change(function(e) {
                     $('#loader').show();
                     $('#defaultDeparture').remove();
                     // $(".fixed-departures-results").css("opacity", "0.2");
                     var p1 = [];
                     p1 = $(this).children("option:selected").val();
                     $.ajax({
                         url: "{{ route('ajax.upcomingTrip') }}",
                         method: 'get',
                         data: {
                             'date': p1
                         },
                         dataType: 'html',
                         beforeSend: function() {
                             $('.fixed-departures').html('');
                             $('#loader').show();
                         },
                         complete: function() {
                             $('#loader').hide();
                             $("#fixed-departures-upcomingTrip").css("opacity", "1");
                         },
                         success: function(response) {
                             $('#loader').hide();
                             $(".fixed-departures-results").css("opacity", "1");
                             $('.fixed-departures').html(response);
                         }
                     });
                 })
             });

             $(document).on('click', '#fixed-departures .pagination a', function(event) {
                 event.preventDefault();
                 var p1 = [];
                 p1 = $("#upcoming-trips").children("option:selected").val();
                 var page = $(this).attr('href').split('page=')[1];
                 fetch_data(page, p1);
             });

             function fetch_data(page, p1) {
                 $.ajax({
                     url: "{{ route('ajax.upcomingTrip') }}" + "?page=" + page,
                     type: 'get',
                     data: {
                         'date': p1
                     },
                     datatype: 'html',
                     success: function(data) {
                         $('.fixed-departures').html(data);
                     }
                 });
             }

         });
     </script>







     <script  >
         $('.book-now').on('click', function(e) {
             var start = $(this).data('start');
             var end = $(this).data('end');
             var title = $(this).data('title');
             $('#trip_name').text(title);
             $('#start_date').val(start);
             $('#finish_date').val(end);
         });
         jQuery(function() {
             $(document).ready(function() {

                 $('#booking').show();
                 $('#returnMessage').hide();
                 $(".error").text('');
                 $("#ajaxLoader").hide();
                 $("#booking-form").validate();
                 $("#booking-form").css("opacity", "1");
                 $("#booking-form").submit(function(e) {
                     e.preventDefault();




                     if ($(this).valid()) {
                         // alert('here');
                         // return false;

                         $("#ajaxLoader").show();

                         $.ajaxSetup({
                             headers: {
                                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                             }
                         })

                         $.ajax({
                             url: "{{ route('website.trip.booking') }}",
                             data: $(this).serialize(),
                             method: 'POST',
                             dataType: 'text',
                             success: function(response) {
                                 console.log(response)

                                 $("#ajaxLoader").hide();
                                 $('#quotemsg4').html(
                                     "<span style='color:#009ad1;'>Successfull Store</span>"
                                     );

                             },
                             error: function(response) {


                                 $("#ajaxLoader").hide();
                                 $("#booking-form").css("opacity", "1");
                                 $("#btnSubmit").removeAttr('disabled');
                                 $('#quotemsg4').html(
                                     "<span style='color:red;'>Something Went Wrong!!</span>"
                                     );

                                 console.log(response);

                             },
                         });
                         return false;
                     } else {
                         console.log('error');
                         return false;
                     }


                 });
                 console.log('here');
                 return false;

             });



         });
     </script>
 @stop
