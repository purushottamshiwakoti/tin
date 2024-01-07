@extends('website::layouts.master')

@section('content')
    <section class="mt-80 breadcrumb-section with-text bg-white bg-light">
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
                            <li class="breadcrumb-item active" aria-current="page">Contacts</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-us bg-light">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 mx-auto">
                    <div class="row">
                        <div class="col-12 section-heading py-60">
                            <h1>Contact Us</h1>
                            <p>Our blog where we write much about our opinion and express ourself above everything.</p>
                        </div>
                        <div class="col-md-6 info-wrapper">
                            <div class="item">
                                <div>Our Office</div>
                                <p>{{ settings()->get('contact_address') }}</p>
                                <a href="{{ settings()->get('address_link') }}" target="blank">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.6569 16.6569C16.7202 17.5935 14.7616 19.5521 13.4138 20.8999C12.6327 21.681 11.3677 21.6814 10.5866 20.9003C9.26234 19.576 7.34159 17.6553 6.34315 16.6569C3.21895 13.5327 3.21895 8.46734 6.34315 5.34315C9.46734 2.21895 14.5327 2.21895 17.6569 5.34315C20.781 8.46734 20.781 13.5327 17.6569 16.6569Z"
                                            stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M15 11C15 12.6569 13.6569 14 12 14C10.3431 14 9 12.6569 9 11C9 9.34315 10.3431 8 12 8C13.6569 8 15 9.34315 15 11Z"
                                            stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    Get Direction</a>
                            </div>
                            <div class="item">
                                <div>Chat with us</div>
                                <a
                                    href="mailto:{{ settings()->get('contact_email') }}">{{ settings()->get('contact_email') }}</a>
                                <a href="mailto:{{ settings()->get('contact_email') }}">
                                    <svg width="24" height="26" viewBox="0 0 24 26" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3 10L10.8906 15.2604C11.5624 15.7083 12.4376 15.7083 13.1094 15.2604L21 10M5 21H19C20.1046 21 21 20.1046 21 19V9C21 7.89543 20.1046 7 19 7H5C3.89543 7 3 7.89543 3 9V19C3 20.1046 3.89543 21 5 21Z"
                                            stroke="#2D71BC" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    Email</a>
                            </div>
                            <div class="item">
                                <div>Phone</div>
                                <a href="tel:{{ settings()->get('contact_phone') }}">Ring us on
                                    {{ settings()->get('contact_phone') }}</a>
                                <a href="tel:{{ settings()->get('contact_phone') }}">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.6569 16.6569C16.7202 17.5935 14.7616 19.5521 13.4138 20.8999C12.6327 21.681 11.3677 21.6814 10.5866 20.9003C9.26234 19.576 7.34159 17.6553 6.34315 16.6569C3.21895 13.5327 3.21895 8.46734 6.34315 5.34315C9.46734 2.21895 14.5327 2.21895 17.6569 5.34315C20.781 8.46734 20.781 13.5327 17.6569 16.6569Z"
                                            stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M15 11C15 12.6569 13.6569 14 12 14C10.3431 14 9 12.6569 9 11C9 9.34315 10.3431 8 12 8C13.6569 8 15 9.34315 15 11Z"
                                            stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    Call Us</a>
                            </div>
                            <div class="social-share text-start py-4 mt-40">
                                <p class="font-14 fw-600 text-tertiary">TAN on Socials</p>
                                <ul class="justify-content-start">
                                    <li>
                                        <a href="{{ settings()->get('facebook_link') }}"><i
                                                class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{ settings()->get('instagram_link') }}"> <i
                                                class="fab fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{ settings()->get('twitter_link') }}"><i
                                                class="fab fa-twitter"></i></i></a>
                                    </li>
                                    <li>
                                        <a href="{{ settings()->get('linkedin_link') }}"><i
                                                class="fab fa-linkedin"></i></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 form-wrapper">
                            <p class="title">We are here to provide all the travel information and solution for your trip
                                to Nepal</p>
                            {{-- <form  id="contact" method="post" onsubmit="return false" novalidate> --}}
                            <form id="contact" method="POST" action="{{ route('website.contact.post') }}">
                                {!! csrf_field() !!}
                                <span id="quotemsg5"></span>
                                <input type="hidden" value="contact" class="form-control" name="subject" />
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <div class="input-group @if ($errors->first('name')) after-error @endif">
                                        <input type="text" class="form-control forError" name="name"
                                            value="{{ old('name') }}" id="name" placeholder="Full name"
                                            required />
                                        @if ($errors->has('name'))
                                            <label id="name-error" class="error"
                                                for="name">{{ $errors->first('name') }}</label>
                                        @endif
                                        <p class="fieldRequirederror"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <div class="input-group @if ($errors->first('email')) after-error @endif">
                                        <input type="email" class="form-control forError" name="email"
                                            value="{{ old('email') }}" id="email" placeholder="Email Address"
                                            required />
                                        @if ($errors->has('email'))
                                            <label id="email-error" class="error"
                                                for="email">{{ $errors->first('email') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="subject">Issue</label>
                                    <div class="input-group @if ($errors->first('issue')) after-error @endif">
                                        <input type="text" class="form-control forError" name="issue"
                                            value="{{ old('issue') }}" id="issue" placeholder="Issues" required />
                                        @if ($errors->has('issue'))
                                            <label id="issue-error" class="error"
                                                for="issue">{{ $errors->first('issue') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Message</label>
                                    <div class="input-group @if ($errors->first('messgae')) after-error @endif">
                                        <textarea class="form-control forError" name="message" id="message" cols="30" rows="10" required>{{ old('message') }}</textarea>
                                        @if ($errors->has('message'))
                                            <label id="message-error" class="error"
                                                for="message">{{ $errors->first('password') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        required />
                                    <label class="form-check-label" for="flexCheckDefault">
                                        I accept the <a href="{{ route('website.page', 'term-condition') }}"
                                            target="_blank">&nbsp;
                                            terms and conditions &nbsp;
                                        </a> of the company.
                                    </label>
                                </div>
                                <div class="btn-wrapper">
                                    <button type="submit" id="btnSubmit1"
                                        class="w-100 btn btn-custom btn-primary"><span>Send Message</span>
                                        <span class="spinner-border spinner-border-md" id="loader1"></span></button>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('website::partials.query-banner')
@endsection
@section('js')
    <script  >
        jQuery(function() {
            $(document).ready(function() {



                $("#loader1").hide();
                // $("#contact").validate();
                $("#contact").css("opacity", "1");

                $("#contact").submit(function(e) {

                    e.preventDefault();

                    // if ($(this).valid()) {


                    $("#loader1").show();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    })
                    $.ajax({
                        url: "{{ route('website.contact.post') }}",
                        data: $(this).serialize(),
                        method: 'POST',
                        dataType: 'text',
                        success: function(response) {
                            //         alert('here');
                            // return false;    



                            $('#contact').trigger('reset');
                            $("#loader1").hide();
                            $('#quotemsg5').html(
                                "<span  style='color:#605E2B;'>Thank you! We will contact you soon.</span>"
                                );

                        },
                        error: function(response) {


                            $("#loader1").hide();
                            $("#contact").css("opacity", "1");
                            $("#btnSubmit1").removeAttr('disabled');
                            $('#quotemsg5').html(
                                "<span style='color:red;'>Something Went Wrong!!</span>"
                                );

                            console.log(response);
                        },
                    });
                    return false;
                    // } else {

                    // return false;
                    // }


                });



            });



        });

        // let errorMessage = document.querySelector('.forError');

        // function validateForm() {
        //     if (errorMessage.value == "") {
        //         $('.forError').addClass('errorField')
        //         $('.fieldRequired').html("Required");
        //         $('.fieldRequiredDescription').html("Required");
        //         return false;
        //     } else {
        //         $('.fieldRequirederror').html("Field is Required")
        //         $('#contact').submit();
        //     }
        // }

        // $("#btnSubmit1").click(function(e) {
        //         e.preventDefault();
        //         validateForm();
        //     });
    </script>
@endsection
