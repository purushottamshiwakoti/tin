@extends('website::user.layouts.workspace')
@section('main-content-wrapper')
    <div class="header">
        <div class="breadcrumb-section">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('website.home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Settings</li>
                </ol>
            </nav>
        </div>
        <h2>Settings</h2>
    </div>
    <div class="settings content-wrapper">
        @if(Session::has('message'))
        <div class="alert alert-success text-success notification-bar">
            {{ session('message') }}
        </div>
        @endif

        <div class="row">
            <h5 class="mb-4">Personal Information</h5>
            <div class="col-lg-7  personal-info">
                
                
                <form  method="POST"  action="{{route('website.edit',auth('customer')->user()->id)}}" 
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                   
                    <div class="row mb-40 image-upload">
                        <div class="col-12">
                            <div class="img-div">
                                @if(!empty(auth('customer')->user()->image))
                                <img  id="avatar"
                                src="{{asset('storage/image/'.auth('customer')->user()->image)}}"
                                alt="dashboard-profile">
                                @else
                                <img  id="avatar" src="{{ public_asset('website/img/profile-mock.jpg') }}" alt="dashboard-profile">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4 buttons">
                            <input type="file" id="imageUpload" name="image" style="display:none" />
                            <a class="btn btn-primary d-block" id="openImageUpload">Upload <i class="fal fa-plus"></i></a>
                            {{-- <a href="#" class="btn text-danger text-center w-100">Remove</a> --}}
                        </div>
                        <div class="col-md-8 info font-12">
                            <i class="far fa-exclamation-circle"></i> Max file size is <b>50MB</b>, Minimum dimension:
                            <b>150x150</b> and Suitable files are .jpg &
                            .png
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <i class="far fa-user"></i>
                                    <input type="text" class="form-control" value="{{auth('customer')->user()->full_name}}" name="full_name" placeholder="Full Name">
                                </div>
                            </div>
                        </div>
        
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <i class="far fa-envelope"></i>  
                                    <input type="email" class="form-control"  value="{{auth('customer')->user()->email}}" name="email" placeholder="Email" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <i class="far fa-phone-alt"></i>
                                    <input type="number" class="form-control"  value="{{auth('customer')->user()->mobile_number}}" name="mobile_number" placeholder="Phone">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <i class="far fa-calendar-day"></i>
                                    <input type="date" class="form-control date" name="date_of_birth"  value="{{auth('customer')->user()->date_of_birth}}" placeholder="Date of Birth">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <i class="far fa-map-marker-alt"></i>
                                    <input type="text" class="form-control" name="address" value="{{auth('customer')->user()->address}}"  placeholder="Address">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3 btn-wrapper">
                            <button type="submit" class="btn btn-custom btn-primary">Save Changes</button>
                            {{-- <button class="btn text-danger">Delete Account</button> --}}
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-5 password-wrapper">
                <div class="password-section">
                    <h5>Change Password</h5>
                  
                    <form  id="update-user-password" method="POST" action="{{route('website.change.password',auth('customer')->user()->id)}}">
                        {{ csrf_field() }}
                        <p id="quotemsg4"></p>
                        <div class="form-group">
                            <div class="input-group">
                                <i class="far fa-lock"></i>
                                <input type="password" id="oldPassword" class="form-control" name="current-password" placeholder="Old Password" required> 
                            </div>
                            <i class="fas fa-eye togglePassword" id="toggleOldPassword"></i>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <i class="far fa-lock"></i>
                                <input type="password" class="form-control" id="newPassword"  name="password" placeholder="New Password" required>
                            </div>
                            <i class="fas fa-eye togglePassword" id="toggleNewPassword"></i>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <i class="far fa-lock"></i>
                                <input type="password" class="form-control"  id="confirmPassword" name="password_confirmation" placeholder="Re-enter Password" required>
                            </div>
                            <i class="fas fa-eye togglePassword" id="toggleConfirmPassword"></i>
                        </div>
                        <div class="btn-wrapper">
                            <button  type="submit"  id="btnUpdate" class="btn btn-primary">Submit
                                <span style="display: none"
                                class="spinner-border spinner-border-md"
                                id="ajaxLoader4"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
{{-- @section('user-js')

    <script 
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js">

    </script>
    <script>


        $(document).ready(function () {

            $('#ajaxLoader4').hide();
            $("#update-user-password").css("opacity", "1");
            $('#update-user-password').validate();
            $('#update-user-password').submit(function () {

                if ($(this).valid()) {
                
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });

                    $.ajax({
                     var url : {{ url('/user/change/password/'.$user->id )}},
                        url: url,

                        data: $(this).serialize(),
                        method: 'POST',
                        dataType: 'text',

                        success: function (response) {
                            // console.log(response);
                            $("#ajaxLoader4").hide();
                            $('#quotemsg4').html(response);
                            $("#update-user-password").css("opacity", "1");
                            $("#btnUpdate").removeAttr('disabled');

                            return false;
                        },

                        error: function (data) {
                            $("#ajaxLoader4").hide();
                            $("#update-user-password").css("opacity", "1");
                            $("#btnUpdate").removeAttr('disabled');
                            $('#quotemsg4').html("<span style='color:red;'>Something Went Wrong!!</span>");
                        }
                    });
                    return false;
                } else {
                    return false;
                }
            });
            return false;
        });


    </script>
@stop --}}