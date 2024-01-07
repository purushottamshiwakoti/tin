@extends('website::layouts.master')

@section('content')

<section class="purchase pb-80 mt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="purchase-box" id="purchase-box">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="planner-step">
                                <ul class="list-unstyled d-flex justify-content-center" id="progressbar">
                                    <li class="active">
                                        <span class="circle">1</span>
                                        <span class="fw-600">Travel Information</span>
                                    </li>
                                    <li class="active">
                                        <span class="circle">2</span>
                                        <span class="fw-600">Options/Arrangements</span>
                                    </li>
                                    <li class="active">
                                        <span class="circle">3</span>
                                        <span class="fw-600">Payment Information</span>
                                    </li>
                                    <li class="">
                                        <span class="circle">4</span>
                                        <span class="fw-600">Booking Completed</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                          
                          
                           


                            <fieldset class="step-3 steps">
                                 <form id="reviewValidate" action="{{ route('website.booking.confirm',['booking'=>Crypt::encrypt($booking->id)]) }}" method="post" novalidate class="bookForm">
                        <input type="hidden" name="_method" value="PUT">
                        {!! csrf_field() !!}
                                        <div class="row">
                                            <div class="col-md-8">
                                                @guest
                                                <div class="login-register text-center d-sm-flex justify-content-between">
                                                    <p>Returning Customer ?</p>
                                                    <div class="mt-3 mt-sm-0">
                                                        <a href="{{route('website.login')}}">Login</a>
                                                        Or
                                                        <a href="{{route('website.register')}}">Register</a>
                                                    </div>
                                                </div>
                                                @endguest
                                                <div class="row mt-4 px-2">
                                                    <div class="form-check col-12 mb-2">
                                                        <input type="checkbox" id="agree" class="agree form-check-input {{ $errors->has('agree')?'border-red':'' }}" {{ old('agree')==1?'checked':'' }} name="agree" value="1" required>
                                                        <span class="checkmark {{ $errors->has('agree')?'red-border':'' }}"></span>                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            I agree to the <a href="{{route('website.page','term-condition')}}">Terms and Conditions</a> and <a href="{{route('website.page','policies')}}">Privacy Policy</a> of Travel Adventure Nepal.<span>*</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check col-12 mb-2">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            I have completely read the <a href="{{ route('website.trips.note',['trip'=>$trip->slug]) }}">Trip Notes</a>
                                                            <span>*</span>
                                                        </label>
                                                        <input type="checkbox" id="read_notes" class="read form-check-input {{ $errors->has('read_notes')?'border-red':'' }}" {{ old('read_notes')==1?'checked':'' }} name="read_notes" required value="1">
                                                        <span class="checkmark {{ $errors->has('read_notes')?'red-border':'' }}"></span>
                                                    </div>
                                                    <div class="form-check col-12">
                                                        <input type="hidden" class="recieve" name="subscribe" value="0">
                                                        <input type="checkbox" class="recieve read form-check-input" name="subscribe" value="1" {{ old('subscribe')==1?'checked':'' }}>
                                                        <span class="checkmark subscribe"></span>
                                                         <label class="form-check-label" for="flexCheckDefault">
                                                            I Would like to Receive Offers Regular Update from Travel Adventure Nepal
                                                        </label>
                                                    </div>

                                                </div>
                                                <div class="book-panel summary-wrap">
                                                    {{-- <h6>Payment Options</h6> --}}
                                                    {{-- <div class="col-md-4 col-sm-12 col-lg-4 col-xl-4 paypal">
                                                        <img src="{{ asset('website/assets/img/paypal.jpg') }}">
                                                    </div> --}}
                                                    {{-- <div class="col-md-8 col-sm-12 col-lg-8 col-xl-8 text">
                                                        <p>We support paypal for payment. Its secured and highly reliable. So dont worry to pay online.</p>
                                                    </div> --}}
                                                    <div class="col-md-8 col-sm-12 col-lg-8 mt-5 col-xl-8 text">
                                                        <p>Once you click book now, your booking will be made. We will send you a conformation email in your inbox.</p>
                                                    </div>
                                                    {{-- <div class="clearfix"></div>
                                                
                                                    <div class="summary-note">
                                                        <div class="summary-note2">
                                                            <p>Click Book Now and We’ll take you to our Secure Payment Gateway
                                                                for Payment Process</p>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                                    <div class="btn-wrapper mt-40 text-end">
                                                        <button type="submit" id="bookBtn" class="btn btn-custom btn-primary"> Book now </button>
                                                        <button type="submit" id="bookBtn" class="d-md-none position-fixed w-100 start-0 bottom-0 w-100 rounded-0 btn btn-custom btn-primary bookContinueBtnMobile"> Book now </button>
                                                    </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-4 mt-5 mt-md-0">
                                                @include('website::trips.booking.sidebar',['trip'=>$booking->trip,'departure'=>$booking->departure,'addOns'=>$booking->addOns,'booking'=>$booking])

                                            </div>

                                        </div>
                                       
                                </form>
                            </fieldset>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  
@stop
@section('js')
    <script src="https://www.paypal.com/sdk/js?client-id={{ config('omnipay.paypal.api_key') }}&currency=AUD"></script>
<script>

    $(".btnLogCont").click(function (e) {
        e.preventDefault();
        // if($("form.bookForm").valid())
        // {
            $("#loginModal").modal('show');
        // }
    });
</script>
    <script>
        function addError(element){

            $('.checkmark').not('.subscribe').addClass('red-border');
            $("#tooltip").tooltip('show');
            $('html, body').animate({
                scrollTop: $("#noticeBlock").offset().top
            }, 2000);
        }
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({
            onInit: function(data, actions) {
                // Disable the buttons
                actions.disable();
                $("#agree, #read_notes").on('change',function () {
                    if($('#agree').is(":checked") && $("#read_notes").is(":checked")){
                        actions.enable();
                    }else{
                        actions.disable();
                    }
                })
            },
            onClick: function() {
                // $("form.bookForm").validate(rules);

                // Show a validation error if the checkbox is not checked
                if (!document.querySelector('#agree').checked) {
                    addError();
                }
                if (!document.querySelector('#read_notes').checked) {
                    addError();
                }
            },
            // Set up the transaction
            createOrder: function(data, actions) {
                return fetch("{{ route('website.booking.confirm',['booking'=>Crypt::encrypt($booking->id)]) }}", {
                    method: 'post',
                    headers: {
                        'Accept':"application/json",
                        'ContentType':"application/json",
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        read_notes:'1',agree:'1'
                    })
                }).then(function(res) {
                    return res.json();
                }).then(function(data) {
                    if(data.message=='success'){
                        return data.id;
                    }

                    toastr.error("Something went wrong!!");
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                console.log(data);
                $(".loader").show();
                return fetch("{{ route('website.checkout.verify','paypal') }}?paymentId="+data.paymentID+"&PayerID="+data.payerID, {
                    method: 'get'
                }).then(function(res) {
                    return res.json();
                }).then(function(details) {
                    if(details.message == 'success'){
                        window.location.replace("{{ route('website.checkout.success') }}");
                    }else{
                        toastr.error("Something went wrong!!");
                    }
                    // Show a success message to the buyer
                });
            }


        }).render('#bookBtn');
    </script>
@stop
