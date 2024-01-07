<div class="container-fluid privatedeparture generalform">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12 col12">

                <div class="col-md-12 col-sm-12 col-lg-12 rightcol">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <h6>Fill this form to book a private holiday</h6>
                        <p>Our Expert will get Back to you with all Preparations to make your Perfect Tailormade
                            Adventure Trip.</p>
                    </div>
                    <form action="{{ route('website.travel-style.request.post') }}" method="post">
                        {!! csrf_field() !!}
                        <div class="col-md-6 col-sm-12 col-lg-6 col6">
                            <div class="form-group">
                                <label>First Name*</label>
                                <input type="text" value="{{ old('first_name') }}" name="first_name"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6 col6">
                            <div class="form-group">
                                <label>Last Name*</label>
                                <input type="text" value="{{ old('last_name') }}" name="last_name"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6 col6">
                            <div class="form-group">
                                <label>Email*</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6 col6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="number" name="phone_number" value="{{ old('phone_number') }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6 col6">
                            <div class="form-group">
                                <label>Number of Approximate Travellers*</label>
                                <input type="number" min="1" value="{{ old('passenger_count') }}"
                                    name="passenger_count" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6 col6">
                            <div class="form-group">
                                <label>Types of Group</label>
                                <select class="form-control select2-single" name="group_type">
                                    @foreach (config('constants.group_types') as $group)
                                        <option value="{{ $group }}"
                                            {{ old('group_type') == $group ? 'selected' : '' }}>{{ $group }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6 col6">
                            <div class="form-group">
                                <label>Trip Start Date*</label>
                                <input type="text" name="start_date" readonly class="form-control start_date"
                                    value="{{ old('start_date') }}" id="datetimepicker6" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6 col6">
                            <div class="form-group">
                                <label>Number of Days</label>
                                <input type="number" value="{{ old('days_count') }}" name="days_count"
                                    class="form-control" min="1">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6 col6">
                            <div class="form-group">
                                <label>What activities do you want to include ?*</label>
                                <select class="form-control js-example-tags" name="activities" multiple required>
                                    @foreach ($activity_lists as $activity)
                                        <option value="{{ $activity->title }}">{{ $activity->title }}</option>
                                    @endforeach
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="request_type" value="private_departure">

                        <div class="col-md-6 col-sm-12 col-lg-6 col6">
                            <div class="form-group">
                                <label>Tell us more about your trip</label>
                                <textarea cols="5" rows="5" name="description" class="form-control">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6 col6 children">
                            <div class="form-group">
                                <label class="check-label">Children Travelling with You (Age 5-15) ?
                                    <input type="hidden" name="children_present" value="0">
                                    <input type="checkbox" class="children_present"
                                        {{ old('children_present') == 1 ? 'checked' : '' }} name="children_present"
                                        value="1">
                                    <span class="checkmark {{ $errors->has('agree') ? 'red-border' : '' }}"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12 submitcol nopadding">

                            <div class="col-md-6 col-sm-12 col-lg-6 col6">
                                <div class="g-recaptcha" data-theme="light"
                                    data-sitekey="6LcQtmYUAAAAAF3Nv9kthnzCJok1nVg5uMaFgo8O"></div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span id="sub-error"
                                        class="form-control-danger input-danger text-danger error">Captcha is
                                        required.</span>
                                @endif
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6 col6">
                                <button type="submit" class="btn btn-login hvr-icon-wobble-horizontal">
                                    <i class="fa fa-arrow-circle-right hvr-icon" aria-hidden="true"></i>Send
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-12 col-sm-12 col-lg-12 queries">
                        <h6>Still have some queries, we are here to assist you.</h6>
                        <div class="col-md-4 col-sm-12 col-lg-4 col4 nopaddingleft">
                            <h6>Email address</h6>
                            <ul>
                                <li><a href="mailto:{{ setting('mail') }}">{{ setting('mail') }}</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-12 col-lg-4 col4">
                            <h6>Telephone</h6>
                            <ul>
                                <li>{{ setting('contact') }}</li>
                                <li>{{ setting('extras.mobile_number') }}</li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-12 col-lg-4 col4">
                            <h6>Address</h6>
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
@section('js')
    @parent
    <script src='https://www.google.com/recaptcha/api.js' ></script>
    <script >
        addLoadEvent(function() {
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
