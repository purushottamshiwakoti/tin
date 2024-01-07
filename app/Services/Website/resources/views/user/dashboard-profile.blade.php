@extends('website::layouts.master')
@section('content')

    @include('website::user.breadcrumb-section')

    <section class="dashboard-content pt-40 pb-80 bg-light">
        <div class="container">
            <div class="row">
                @include('website::user.layouts.sidebar')
                <div class="col-md-9 content profile">

                    <form method="POST" action="{{ route('website.edit', auth('customer')->user()->id) }}"
                        enctype="multipart/form-data" class="form-wrapper">
                        {{ csrf_field() }}
                        <div class="shadow-box info-wrapper mb-4">
                            <div class="info-div d-flex justify-content-center align-items-center">
                                @if (!empty(auth('customer')->user()->image))
                                    <img id="avatar" src="{{ asset('storage/resizedUserImage/' . auth('customer')->user()->image) }}"
                                        alt="dashboard-profile">
                                @else
                                    <img class="name-logo"
                                        src="{{ \Avatar::create(auth('customer')->user()->email)->toBase64() }}" />
                                @endif
                                <div class="info">
                                    <p>{{ auth('customer')->user()->email }}</p>
                                    <span>Member since {{ auth('customer')->user()->created_at->format('d M Y') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4 profile-upload">
                                <a href="#" class="btn text-primary btn-transparent btn-custom change-profile-btn bordered"><span>Change Profile Picture</span></a>
                                <input type="file" class="profile-upload-file" name="image" id="imageUpload">
                            </div>
                        </div>
                        <div class="shadow-box">
                            <h4>Personal Information</h4>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>First Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                            value="{{ old('first_name', auth('customer')->user()->first_name) }}"
                                            name="first_name" placeholder="First Name" placeholder="Card Holder First Name">
                                    </div>
                                    @if ($errors->has('first_name'))
                                            <label id="first_name-error" class="error"
                                                for="first_name" style="color: red;">{{ $errors->first('first_name') }}</label>
                                        @endif
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Last Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                            value="{{ old('last_name', auth('customer')->user()->last_name) }} "
                                            name="last_name" placeholder="Last Name" placeholder="Card Holder Last Name">
                                    </div>
                                    @if ($errors->has('last_name'))
                                    <label id="last_name-error" class="error"
                                        for="last_name" style="color: red">{{ $errors->first('last_name') }}</label>
                                    @endif
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Date of Birth</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="date_of_birth"
                                            value="{{ old('date_of_birth', auth('customer')->user()->date_of_birth) }}"
                                            placeholder="Date of Birth">
                                    </div>
                                    @if ($errors->has('date_of_birth'))
                                    <label id="date_of_birth-error" class="error"
                                        for="date_of_birth" style="color: red">{{ $errors->first('date_of_birth') }}</label>
                                    @endif
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Email Address</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                            value="{{ old('email', auth('customer')->user()->email) }}" name="email"
                                            placeholder="Email" readonly>
                                    </div>
                                    @if ($errors->has('email'))
                                    <label id="email-error" class="error"
                                        for="email" style="color: red">{{ $errors->first('email') }}</label>
                                    @endif
                                </div>

                                <div class="col-md-6 form-group">
                                    <label>Gender</label>
                                    <div class="input-group">
                                        <select class="js-example-basic-single indexed" required name="gender"
                                            id="gender">
                                            <option value="male"
                                                {{ old('gender', auth('customer')->user()->gender) == 'male' ? 'selected' : '' }}>
                                                Male</option>
                                            <option value="female"
                                                {{ old('gender', auth('customer')->user()->gender) == 'female' ? 'selected' : '' }}>
                                                Female</option>
                                            <option value="other"
                                                {{ old('gender', auth('customer')->user()->gender) == 'other' ? 'selected' : '' }}>
                                                Other</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('gender'))
                                    <label id="gender-error" class="error"
                                        for="gender" style="color: red">{{ $errors->first('gender') }}</label>
                                    @endif
                                </div>

                                <div class="col-md-6 form-group">
                                    <label>Contact Number</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                            value="{{ old('mobile_number', auth('customer')->user()->mobile_number) }}"
                                            name="mobile_number" placeholder="Phone">
                                    </div>
                                    @if ($errors->has('mobile_number'))
                                    <label id="mobile_number-error" class="error"
                                        for="mobile_number" style="color: red">{{ $errors->first('mobile_number') }}</label>
                                    @endif
                                </div>

                                <div class="col-md-6 form-group">
                                    <label>Country</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                            value="{{ old('country', auth('customer')->user()->country) }}" name="country"
                                            placeholder="Country">
                                    </div>
                                    @if ($errors->has('country'))
                                    <label id="country-error" class="error"
                                        for="country" style="color: red">{{ $errors->first('country') }}</label>
                                    @endif
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Address</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                            value="{{ old('address', auth('customer')->user()->address) }}" name="address"
                                            placeholder="address">
                                    </div>
                                    @if ($errors->has('address'))
                                    <label id="address-error" class="error"
                                        for="address" style="color: red">{{ $errors->first('address') }}</label>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="btn-wrapper my-4">
                            <button type="submit" class="btn btn-custom btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

