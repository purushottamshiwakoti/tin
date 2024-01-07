<div class="container-fluid privatedeparture generalform">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12 col12">
                <div class="col-md-12 col-sm-12 col-lg-12 rightcol">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <h6 style="font-size:33px;">Fill this form to book a private holiday</h6>
                        <p>Our Expert will get Back to you with all Preparations to make your Perfect Tailormade
                            Adventure Trip.</p>
                    </div>
                    <div class="row">
                        <form class="col-lg-9 col-12 mb-5 pe-5" action="{{ route('website.travel-style.request.post') }}"
                            method="post">
                            <div class="col-12 yourdetails nopadding shadow-box mb-3 personal-form">
                                <h6>Personal Information</h6>
                                {!! csrf_field() !!}
                                <div class="col-12 col6">
                                    <div class="form-group">
                                        <label>First Name*</label>
                                        <input type="text" value="{{ old('first_name') }}" name="first_name"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col6">
                                    <div class="form-group">
                                        <label>Last Name*</label>
                                        <input type="text" value="{{ old('last_name') }}" name="last_name"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col6">
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="col-12 col6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="number" name="phone_number" value="{{ old('phone_number') }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col6">
                                    <div class="form-group">
                                        <label>Number of Approximate Travellers*</label>
                                        <input type="number" min="1" value="{{ old('passenger_count') }}"
                                            name="passenger_count" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 yourenquiry shadow-box mb-3 trip-form nopadding">
                                <h6>Trip Information</h6>
                                <div class="col-12 col6">
                                    <div class="form-group">
                                        <label>Destination</label>
                                        <input type="text" name="destination" value="Nepal" class="form-control"
                                            placeholder="Nepal" readonly>
                                    </div>
                                </div>
                                <div class="col-12 col6">
                                    <div class="form-group">
                                        <label>Trip Start Date*</label>
                                        <input type="text" name="start_date" readonly class="form-control start_date"
                                            value="{{ old('start_date') }}" id="datetimepicker6" required>
                                    </div>
                                </div>
                                <div class="col-12 col6">
                                    <div class="form-group">
                                        <label>Desired Cost Per Person</label>
                                        <input type="text" name="desired_cost_per_person" class="form-control"
                                            placeholder="" value="{{ old('desired_cost_per_person') }}">
                                    </div>
                                </div>
                                <div class="col-12 col6">
                                    <div class="form-group">
                                        <label>Duration Of Trip</label>
                                        <input type="number" value="{{ old('days_count') }}" name="days_count"
                                            class="form-control" min="1">
                                    </div>
                                </div>
                                <input type="hidden" name="request_type" value="tailor_made">
                                <div class="col-12 col6">
                                    <div class="form-group select-wrap">
                                        <label>Do you require international flights? If so, where from</label>
                                        <select class="form-control select2-single" id="countries"
                                            name="flight_country_from">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-12 checkboxwrap nopadding">
                                    <div class="col-12 mb-3 checkbox">
                                        <h6>Desired accommodation style</h6>
                                        @foreach (config('constants.accommodation_styles') as $accommodation_style)
                                        <label class="check-label me-3">{{ $accommodation_style }}
                                            <input type="checkbox" name="accommodation_styles[]"
                                                value="{{ $accommodation_style }}">
                                            <span class="checkmark"></span>
                                        </label>
                                        @endforeach
                                    </div>
                                    <div class="col-12 mb-3 col4 radio">
                                        <h6>Preferred accommodation standard</h6>
                                        @foreach (config('constants.accommodation_standard') as $standard)
                                        <label class="check-label me-3">{{ $standard }}
                                            <input type="radio" name="accommodation_standards" value="{{ $standard }}"
                                                checked>
                                            <span class="checkmark"></span>
                                        </label>
                                        @endforeach
                                    </div>
                                    <div class="col-12 mb-3 col4 radio">
                                        <h6>Meal Basis</h6>
                                        @foreach (config('constants.meal_basis_types') as $meal)
                                        <label class="check-label me-3">{{ $meal }}
                                            <input type="radio" name="meal_preference" value="{{ $meal }}" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-12 col6">
                                    <div class="form-group select-wrap">
                                        <label>Activities*</label>
                                        <div class="input-group">
                                            <select name="activities[]" class="js-example-basic-single"
                                                multiple="multiple" id="" required>
                                                @foreach ($activity_lists as $activity)
                                                <option value="{{ $activity->title }}">{{ $activity->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col6">
                                    <div class="form-group select-wrap">
                                        <label>Where did you hear about us?</label>
                                        <div class="input-group">
                                            <select name="referral_source" class="js-example-basic-single"
                                                multiple="multiple">
                                                @foreach (config('constants.promo_medias') as $media)
                                                <option value="{{ $media }}">{{ $media }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col6">
                                    <div class="form-group select-wrap">
                                        <label>We'd love to contact you in the future, please select all that
                                            apply.</label>
                                        <div class="input-group">
                                            <select name="contact_options[]" class="js-example-basic-single"
                                                multiple="multiple">
                                                @foreach (config('constants.contact_mediums') as $contactMedium)
                                                <option value="{{ $contactMedium }}">{{ $contactMedium }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Any other comments or requests?</label>
                                        <textarea rows="7" name="description"
                                            class="form-control">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12 submitcol nopadding">
                                <div class="col-12 mb-3 col6">
                                    <div class="g-recaptcha" data-theme="light"
                                        data-sitekey="6LcQtmYUAAAAAF3Nv9kthnzCJok1nVg5uMaFgo8O"></div>
                                    @if ($errors->has('g-recaptcha-response'))
                                    <span id="sub-error"
                                        class="form-control-danger input-danger text-danger error">Captcha
                                        is
                                        required.</span>
                                    @endif
                                </div>
                                <div class="col-12 col6">
                                    <button type="submit"
                                        class="btn btn-custom btn-primary btn-login hvr-icon-wobble-horizontal">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="mb-5 col-lg-3 col-12 queries h-100 info-box bg-secondary-light position-sticky" style="top:15%;">
                            <div class="header">
                                Still have some queries, we are here to assist you.
                            </div>
                            <div class="col-12 col4 nopaddingleft">
                                <h6 class="m-0">Email address</h6>
                                <ul>
                                    <li><a href="mailto:{{ setting('mail') }}">{{ setting('mail') }}</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col4">
                                <h6 class="m-0">Telephone</h6>
                                <ul>
                                    <li>{{ setting('contact') }}</li>
                                    <li>{{ setting('extras.mobile_number') }}</li>
                                </ul>
                            </div>
                            <div class="col-12 col4">
                                <h6 class="m-0">Address</h6>
                                <ul>
                                    <li>{{ setting('address') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
@parent
<script src='https://www.google.com/recaptcha/api.js' ></script>
{{-- <script src="{{ public_asset('website/js/countrySelect.js') }}" ></script> --}}
<script>
addLoadEvent(function() {

    $("select#countries").select2({
        placeholder: "Select a country",
        data: isoCountries
    });
    $('.start_date').datepicker({
        format: 'yyyy-mm-dd'
    });
});
var custom_form_rules = {
    errorClass: 'form-control-danger input-danger redborder1 error',
    errorElement: "span",
    errorPlacement: function(error, element) {
        var el = element.parent().parent();
        // error.appendTo(el);
    }
};
</script>
@stop