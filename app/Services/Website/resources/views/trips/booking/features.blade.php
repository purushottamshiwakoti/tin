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
                                    <li class="active ">
                                        <span class="circle">1</span>
                                        <span class="fw-600">Travel Information</span>
                                    </li>
                                    <li class="active">
                                        <span class="circle">2</span>
                                        <span class="fw-600">Options/Arrangements</span>
                                    </li>
                                    <li class="">
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
                          
                           
                           

                            <fieldset class="step-2 steps">
                                <form action="{{ route('website.booking.store-features',['booking'=>Crypt::encrypt($booking->id)]) }}" method="post">
                                        <input type="hidden" name="_method" value="PUT">
                                        {!! csrf_field() !!}
                                    <div class="row">
                                       
                                            <div class="col-md-8">
                                                <div class="option-box shadow-box">
                                                    <h4>Options and Arrangement</h4>
                                                    <div class="option-item">
                                                        <div class="icon-div">
                                                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M9.73828 7.43747C9.73828 7.7587 9.39063 8.26177 9.15832 8.49813C8.83791 8.81854 8.83791 9.33769 9.15832 9.65811C9.47873 9.97852 9.99788 9.97852 10.3183 9.65811C10.4272 9.54993 11.379 8.56545 11.379 7.43752C11.379 6.30959 10.4273 5.32505 10.3207 5.21929C10.086 4.98058 9.73834 4.4775 9.73834 4.15627C9.73834 3.83504 10.086 3.33197 10.3207 3.09325C10.6387 2.77284 10.6379 2.25533 10.3183 1.93568C9.99788 1.61527 9.47873 1.61527 9.15832 1.93568C9.04938 2.04386 8.09766 3.02834 8.09766 4.15627C8.09766 5.2842 9.04933 6.26874 9.15591 6.3745C9.39063 6.61316 9.73828 7.11623 9.73828 7.43747Z" fill="#FAA61A" />
                                                                <path d="M14.6602 5.79684C14.6602 6.11807 14.3125 6.62114 14.0802 6.8575C13.7598 7.17792 13.7598 7.69707 14.0802 8.01748C14.4006 8.3379 14.9198 8.3379 15.2402 8.01748C15.3491 7.90931 16.3008 6.92482 16.3008 5.7969C16.3008 4.66897 15.3492 3.68443 15.2426 3.57866C15.0079 3.33995 14.6602 2.83688 14.6602 2.51565C14.6602 2.19441 15.0079 1.63665 15.2426 1.39794C15.5606 1.07753 15.5598 0.56002 15.2402 0.240372C14.9198 -0.0800425 14.4006 -0.0800425 14.0802 0.240372C13.9713 0.348543 13.0195 1.38772 13.0195 2.51565C13.0195 3.64357 13.9712 4.62811 14.0778 4.73388C14.3125 4.97254 14.6602 5.47561 14.6602 5.79684Z" fill="#FAA61A" />
                                                                <path d="M9.73905 19.7422H11.3789V18.1112C11.3477 17.8989 11.004 17.3838 10.5586 16.855C10.11 17.3878 9.7647 17.9061 9.73828 18.116L9.73905 19.7422Z" fill="#2D71BC" />
                                                                <path d="M19.6111 22.9463C24.2229 22.4636 26.5592 19.4985 26.4628 16.7109C26.3915 14.6449 25.02 13.2013 23.1279 13.2013C22.6589 13.2013 22.1894 13.2872 21.7469 13.4249C21.7644 13.1904 21.7828 12.9971 21.8029 12.9393C22.0376 12.7046 22.1081 12.3522 21.9807 12.0453C21.8542 11.7385 21.5546 11.539 21.2229 11.539H11.3792V15.3077C12.0095 15.9737 13.0198 17.1838 13.0198 18.1015V20.5624C13.0198 21.0159 12.6529 21.3828 12.1995 21.3828H8.91826C8.46484 21.3828 8.09794 21.0159 8.09794 20.5624V18.1015C8.09794 17.1837 9.10824 15.9736 9.73857 15.3077V11.5391H3.17607C2.84444 11.5391 2.51758 11.7041 2.39021 12.0101C2.26366 12.3169 2.3061 12.6341 2.54082 12.8688C2.65375 13.0963 2.69941 14.0457 2.73627 14.8083C2.91565 18.5398 3.28818 26.3594 12.201 26.3594C16.0248 26.3594 18.2706 24.8726 19.6111 22.9463ZM24.823 16.7677C24.8835 18.5207 23.5584 20.4804 20.572 21.1517C21.3917 19.1187 21.5651 16.8928 21.6481 15.2481C22.0473 15.0047 22.6072 14.8419 23.1279 14.8419C24.3303 14.842 24.7926 15.8793 24.823 16.7677Z" fill="#2D71BC" />
                                                                <path d="M2.35547 27.9999H22.043C22.4964 27.9999 22.8633 27.633 22.8633 27.1796C22.8633 26.7262 22.4964 26.3593 22.043 26.3593H2.35547C1.90205 26.3593 1.53516 26.7262 1.53516 27.1796C1.53516 27.633 1.90205 27.9999 2.35547 27.9999Z" fill="#2D71BC" />
                                                            </svg>
                                                        </div>
                                                        <div class="content">
                                                            <div class="title">Accommodation preference</div>
                                                            <p>Let us know the airport of your preference so that we can arrange your trip accordingly</p>
                                                            <div class="radio-wrapper">
                                                                <div class="form-check form-check-inline">
                                                                    <input checked class="form-check-input" type="radio" name="add_on[accommodation]" id="inlineRadio1" value="1">
                                                                    <label class="form-check-label" for="inlineRadio1">Single suppliment
                                                                        <span>(Available in Kathmandu only)</span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="add_on[accommodation]" value="0">
                                                                    <label class="form-check-label" for="inlineRadio2">No thanks, sharing room </label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="option-item">
                                                        <div class="icon-div">
                                                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_144_2218)">
                                                                    <path d="M27.1433 23.2762H0.90625V26.038H27.1433V23.2762Z" fill="#FAA61A" />
                                                                    <path d="M27.9286 10.3441C27.6317 9.23934 26.4994 8.58342 25.3947 8.88032L18.0552 10.8481L8.52701 1.96204L5.8619 2.68008L11.5788 12.588L4.71577 14.4246L2.00231 12.2911L0 12.8297L2.51325 17.1864L3.56964 19.0161L5.78599 18.4223L13.1255 16.4545L19.1255 14.8458L26.4649 12.878C27.5696 12.5811 28.2255 11.4488 27.9286 10.3441Z" fill="#2D71BC" />
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_144_2218">
                                                                        <rect width="28" height="28" fill="white" />
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        </div>
                                                        <div class="content">
                                                            <div class="title">Flights</div>
                                                            <p>Our Booking consultant will call you to arrange your flights</p>
                                                            <div class="radio-wrapper">
                                                                <div class="form-check form-check-inline">
                                                                    <input checked class="form-check-input" type="radio" checked="checked" name="add_on[flight]" value="1" id="inlineRadio11" >
                                                                    <label class="form-check-label" for="inlineRadio11">Arrange by Travel Adventure Nepal
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="add_on[flight]" value="0" id="inlineRadio21" >
                                                                    <label class="form-check-label" for="inlineRadio21">No thanks, arrange by myself </label>
                                                                </div>

                                                            </div>
                                                            @if(can_show_flight_offer($booking->trip))

                                                            <div class="note">
                                                                Enjoy 50% OFF while booking flight tickets with us. Select "Arrange by Travel Adventure Nepal" and our booking consultant will call you to arrange the flights. You can pay after confirming flight arrangements.
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="option-item">
                                                        <div class="icon-div">
                                                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M9.73828 7.43747C9.73828 7.7587 9.39063 8.26177 9.15832 8.49813C8.83791 8.81854 8.83791 9.33769 9.15832 9.65811C9.47873 9.97852 9.99788 9.97852 10.3183 9.65811C10.4272 9.54993 11.379 8.56545 11.379 7.43752C11.379 6.30959 10.4273 5.32505 10.3207 5.21929C10.086 4.98058 9.73834 4.4775 9.73834 4.15627C9.73834 3.83504 10.086 3.33197 10.3207 3.09325C10.6387 2.77284 10.6379 2.25533 10.3183 1.93568C9.99788 1.61527 9.47873 1.61527 9.15832 1.93568C9.04938 2.04386 8.09766 3.02834 8.09766 4.15627C8.09766 5.2842 9.04933 6.26874 9.15591 6.3745C9.39063 6.61316 9.73828 7.11623 9.73828 7.43747Z" fill="#FAA61A" />
                                                                <path d="M14.6602 5.79684C14.6602 6.11807 14.3125 6.62114 14.0802 6.8575C13.7598 7.17792 13.7598 7.69707 14.0802 8.01748C14.4006 8.3379 14.9198 8.3379 15.2402 8.01748C15.3491 7.90931 16.3008 6.92482 16.3008 5.7969C16.3008 4.66897 15.3492 3.68443 15.2426 3.57866C15.0079 3.33995 14.6602 2.83688 14.6602 2.51565C14.6602 2.19441 15.0079 1.63665 15.2426 1.39794C15.5606 1.07753 15.5598 0.56002 15.2402 0.240372C14.9198 -0.0800425 14.4006 -0.0800425 14.0802 0.240372C13.9713 0.348543 13.0195 1.38772 13.0195 2.51565C13.0195 3.64357 13.9712 4.62811 14.0778 4.73388C14.3125 4.97254 14.6602 5.47561 14.6602 5.79684Z" fill="#FAA61A" />
                                                                <path d="M9.73905 19.7422H11.3789V18.1112C11.3477 17.8989 11.004 17.3838 10.5586 16.855C10.11 17.3878 9.7647 17.9061 9.73828 18.116L9.73905 19.7422Z" fill="#2D71BC" />
                                                                <path d="M19.6111 22.9463C24.2229 22.4636 26.5592 19.4985 26.4628 16.7109C26.3915 14.6449 25.02 13.2013 23.1279 13.2013C22.6589 13.2013 22.1894 13.2872 21.7469 13.4249C21.7644 13.1904 21.7828 12.9971 21.8029 12.9393C22.0376 12.7046 22.1081 12.3522 21.9807 12.0453C21.8542 11.7385 21.5546 11.539 21.2229 11.539H11.3792V15.3077C12.0095 15.9737 13.0198 17.1838 13.0198 18.1015V20.5624C13.0198 21.0159 12.6529 21.3828 12.1995 21.3828H8.91826C8.46484 21.3828 8.09794 21.0159 8.09794 20.5624V18.1015C8.09794 17.1837 9.10824 15.9736 9.73857 15.3077V11.5391H3.17607C2.84444 11.5391 2.51758 11.7041 2.39021 12.0101C2.26366 12.3169 2.3061 12.6341 2.54082 12.8688C2.65375 13.0963 2.69941 14.0457 2.73627 14.8083C2.91565 18.5398 3.28818 26.3594 12.201 26.3594C16.0248 26.3594 18.2706 24.8726 19.6111 22.9463ZM24.823 16.7677C24.8835 18.5207 23.5584 20.4804 20.572 21.1517C21.3917 19.1187 21.5651 16.8928 21.6481 15.2481C22.0473 15.0047 22.6072 14.8419 23.1279 14.8419C24.3303 14.842 24.7926 15.8793 24.823 16.7677Z" fill="#2D71BC" />
                                                                <path d="M2.35547 27.9999H22.043C22.4964 27.9999 22.8633 27.633 22.8633 27.1796C22.8633 26.7262 22.4964 26.3593 22.043 26.3593H2.35547C1.90205 26.3593 1.53516 26.7262 1.53516 27.1796C1.53516 27.633 1.90205 27.9999 2.35547 27.9999Z" fill="#2D71BC" />
                                                            </svg>
                                                        </div>
                                                        <div class="content">
                                                            <div class="title">Airport Pickup</div>
                                                            <p>Let us know the airport of your preference so that we can arrange your trip accordingly</p>
                                                            <div class="radio-wrapper">
                                                                <div class="form-check form-check-inline">
                                                                    <input checked class="form-check-input" type="radio" name="add_on[pick_up]" value="1" id="inlineRadio1" >
                                                                    <label class="form-check-label" for="inlineRadio1">Arrange by Travel Adventure Nepal
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="add_on[pick_up]" value="0" id="inlineRadio2" >
                                                                    <label class="form-check-label" for="inlineRadio2">No thanks, arrange by myself </label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="option-item">
                                                        <div class="icon-div">
                                                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M9.73828 7.43747C9.73828 7.7587 9.39063 8.26177 9.15832 8.49813C8.83791 8.81854 8.83791 9.33769 9.15832 9.65811C9.47873 9.97852 9.99788 9.97852 10.3183 9.65811C10.4272 9.54993 11.379 8.56545 11.379 7.43752C11.379 6.30959 10.4273 5.32505 10.3207 5.21929C10.086 4.98058 9.73834 4.4775 9.73834 4.15627C9.73834 3.83504 10.086 3.33197 10.3207 3.09325C10.6387 2.77284 10.6379 2.25533 10.3183 1.93568C9.99788 1.61527 9.47873 1.61527 9.15832 1.93568C9.04938 2.04386 8.09766 3.02834 8.09766 4.15627C8.09766 5.2842 9.04933 6.26874 9.15591 6.3745C9.39063 6.61316 9.73828 7.11623 9.73828 7.43747Z" fill="#FAA61A" />
                                                                <path d="M14.6602 5.79684C14.6602 6.11807 14.3125 6.62114 14.0802 6.8575C13.7598 7.17792 13.7598 7.69707 14.0802 8.01748C14.4006 8.3379 14.9198 8.3379 15.2402 8.01748C15.3491 7.90931 16.3008 6.92482 16.3008 5.7969C16.3008 4.66897 15.3492 3.68443 15.2426 3.57866C15.0079 3.33995 14.6602 2.83688 14.6602 2.51565C14.6602 2.19441 15.0079 1.63665 15.2426 1.39794C15.5606 1.07753 15.5598 0.56002 15.2402 0.240372C14.9198 -0.0800425 14.4006 -0.0800425 14.0802 0.240372C13.9713 0.348543 13.0195 1.38772 13.0195 2.51565C13.0195 3.64357 13.9712 4.62811 14.0778 4.73388C14.3125 4.97254 14.6602 5.47561 14.6602 5.79684Z" fill="#FAA61A" />
                                                                <path d="M9.73905 19.7422H11.3789V18.1112C11.3477 17.8989 11.004 17.3838 10.5586 16.855C10.11 17.3878 9.7647 17.9061 9.73828 18.116L9.73905 19.7422Z" fill="#2D71BC" />
                                                                <path d="M19.6111 22.9463C24.2229 22.4636 26.5592 19.4985 26.4628 16.7109C26.3915 14.6449 25.02 13.2013 23.1279 13.2013C22.6589 13.2013 22.1894 13.2872 21.7469 13.4249C21.7644 13.1904 21.7828 12.9971 21.8029 12.9393C22.0376 12.7046 22.1081 12.3522 21.9807 12.0453C21.8542 11.7385 21.5546 11.539 21.2229 11.539H11.3792V15.3077C12.0095 15.9737 13.0198 17.1838 13.0198 18.1015V20.5624C13.0198 21.0159 12.6529 21.3828 12.1995 21.3828H8.91826C8.46484 21.3828 8.09794 21.0159 8.09794 20.5624V18.1015C8.09794 17.1837 9.10824 15.9736 9.73857 15.3077V11.5391H3.17607C2.84444 11.5391 2.51758 11.7041 2.39021 12.0101C2.26366 12.3169 2.3061 12.6341 2.54082 12.8688C2.65375 13.0963 2.69941 14.0457 2.73627 14.8083C2.91565 18.5398 3.28818 26.3594 12.201 26.3594C16.0248 26.3594 18.2706 24.8726 19.6111 22.9463ZM24.823 16.7677C24.8835 18.5207 23.5584 20.4804 20.572 21.1517C21.3917 19.1187 21.5651 16.8928 21.6481 15.2481C22.0473 15.0047 22.6072 14.8419 23.1279 14.8419C24.3303 14.842 24.7926 15.8793 24.823 16.7677Z" fill="#2D71BC" />
                                                                <path d="M2.35547 27.9999H22.043C22.4964 27.9999 22.8633 27.633 22.8633 27.1796C22.8633 26.7262 22.4964 26.3593 22.043 26.3593H2.35547C1.90205 26.3593 1.53516 26.7262 1.53516 27.1796C1.53516 27.633 1.90205 27.9999 2.35547 27.9999Z" fill="#2D71BC" />
                                                            </svg>
                                                        </div>
                                                        <div class="content">
                                                            <div class="title">Special Request</div>
                                                            <p>If you have any special request please mention it down. Be as much elaborative as you can.</p>
                                                            <textarea name="special_request" id="" cols="30" rows="10" placeholder="Your comment"></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-5 mt-md-0">
                                               
                                              
                                                @include('website::trips.booking.sidebar',['trip'=>$booking->trip,'departure'=>$booking->departure,'booking'=>$booking])

                                            </div>
                                           

                                    </div>
                                    <div class="col-md-8">
                                        <div class="btn-wrapper mt-40 text-end">
                                            <a class="me-3 btn text-primary btn-transparent btn-custom  bordered mb-lg-0 mb-3 previous"><span>Back to Traveller Information</span></a>
                                            <button type="submit" class="btn btn-custom btn-primary"> Next : Payment </button>
                                            <button type="submit" class="d-md-none position-fixed w-100 start-0 bottom-0 w-100 rounded-0 btn btn-custom btn-primary bookContinueBtnMobile"> Next : Payment </button>
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

@section('js')

@stop
