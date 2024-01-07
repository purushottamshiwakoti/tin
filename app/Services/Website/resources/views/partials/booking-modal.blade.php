<div class="modal fade booking-modal" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2C3E50
" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
            <div class="modal-body container" id="booking">
                <div class="row">
                    <div class="col-12 heading">
                        <h2>Booking Form</h2>
                        <span id="trip_name">{{ isset($trip) ? $trip->title : '' }}</span>
                    </div>

                    <form id="booking-form" class="row" novalidate>
                        {{ csrf_field() }}
                        <span id="quotemsg4"></span>
                        <input type="hidden" class="form-control" name="id"
                            value="{{ isset($trip) ? $trip->id : '' }}">

                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="16" cy="11" r="4" stroke="#605E2B"
                                        stroke-width="2" />
                                    <path
                                        d="M9 26C7.89543 26 6.9729 25.0875 7.27624 24.0254C8.26537 20.5621 11.7961 18 16 18C20.2039 18 23.7346 20.5621 24.7238 24.0254C25.0271 25.0875 24.1046 26 23 26H9Z"
                                        stroke="#605E2B" stroke-width="2" />
                                </svg>
                                <input type="text" class="form-control" id="full_name" name="full_name"
                                    value="" placeholder="Full Name" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M25.3333 6.66663H6.66667C5.19391 6.66663 4 7.86053 4 9.33329V22.6666C4 24.1394 5.19391 25.3333 6.66667 25.3333H25.3333C26.8061 25.3333 28 24.1394 28 22.6666V9.33329C28 7.86053 26.8061 6.66663 25.3333 6.66663Z"
                                        stroke="#605E2B" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M4 9.33337L16 17.3334L28 9.33337" stroke="#605E2B" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <input type="email" class="form-control" data-id="email" id="email" name="email"
                                    value="" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.66667 5.33337H12L14.6667 12L11.3333 14C12.7613 16.8954 15.1046 19.2388 18 20.6667L20 17.3334L26.6667 20V25.3334C26.6667 26.0406 26.3857 26.7189 25.8856 27.219C25.3855 27.7191 24.7072 28 24 28C18.799 27.684 13.8935 25.4754 10.2091 21.7909C6.52467 18.1065 4.31607 13.201 4 8.00004C4 7.2928 4.28095 6.61452 4.78105 6.11442C5.28115 5.61433 5.95942 5.33337 6.66667 5.33337"
                                        stroke="#605E2B" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <input type="text" class="form-control" name="mobile_number"
                                    placeholder="Phone Number" required>
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="input-group">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16 18.6666C18.2091 18.6666 20 16.8758 20 14.6666C20 12.4575 18.2091 10.6666 16 10.6666C13.7909 10.6666 12 12.4575 12 14.6666C12 16.8758 13.7909 18.6666 16 18.6666Z"
                                        stroke="#605E2B" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M23.5433 22.2093L17.886 27.8666C17.386 28.3662 16.7081 28.6467 16.0013 28.6467C15.2945 28.6467 14.6167 28.3662 14.1167 27.8666L8.45799 22.2093C6.96628 20.7175 5.95044 18.8169 5.53891 16.7478C5.12737 14.6787 5.33864 12.534 6.14599 10.5849C6.95334 8.6359 8.32052 6.97003 10.0746 5.79799C11.8287 4.62594 13.891 4.00037 16.0007 4.00037C18.1103 4.00037 20.1726 4.62594 21.9267 5.79799C23.6808 6.97003 25.048 8.6359 25.8553 10.5849C26.6627 12.534 26.8739 14.6787 26.4624 16.7478C26.0509 18.8169 25.035 20.7175 23.5433 22.2093V22.2093Z"
                                        stroke="#605E2B" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <input type="text" class="form-control" name="address" placeholder="Address"
                                    required>
                            </div>
                        </div>


                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="16" cy="11" r="4" stroke="#605E2B"
                                        stroke-width="2" />
                                    <path
                                        d="M9 26C7.89543 26 6.9729 25.0875 7.27624 24.0254C8.26537 20.5621 11.7961 18 16 18C20.2039 18 23.7346 20.5621 24.7238 24.0254C25.0271 25.0875 24.1046 26 23 26H9Z"
                                        stroke="#605E2B" stroke-width="2" />
                                </svg>
                                <input type="number" name="passenger_count" class="form-control"
                                    placeholder="No. of travelers" required min="1">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8 10C8 8.34315 9.34315 7 11 7H21C22.6569 7 24 8.34315 24 10V18C24 19.7824 22.8342 21.2924 21.2236 21.8094L22.7071 23.2929C23.0976 23.6834 23.0976 24.3166 22.7071 24.7071C22.3166 25.0976 21.6834 25.0976 21.2929 24.7071L18.5858 22H13.4142L10.7071 24.7071C10.3166 25.0976 9.68342 25.0976 9.29289 24.7071C8.90237 24.3166 8.90237 23.6834 9.29289 23.2929L10.7764 21.8094C9.16576 21.2924 8 19.7824 8 18V10ZM11 9C10.4477 9 10 9.44772 10 10V14C10 14.5523 10.4477 15 11 15H15V9H11ZM13 18.5C13 19.3284 12.3284 20 11.5 20C10.6716 20 10 19.3284 10 18.5C10 17.6716 10.6716 17 11.5 17C12.3284 17 13 17.6716 13 18.5ZM22 18.5C22 19.3284 21.3284 20 20.5 20C19.6716 20 19 19.3284 19 18.5C19 17.6716 19.6716 17 20.5 17C21.3284 17 22 17.6716 22 18.5ZM17 9H21C21.5523 9 22 9.44772 22 10V14C22 14.5523 21.5523 15 21 15H17V9Z"
                                        fill="#605E2B" />
                                </svg>

                                <input type="number" class="form-control" name="estimated_day"
                                    placeholder="Estimated Days of travel" required min="1">
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="input-group">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 5.77778C10 5.34822 10.5858 5 11 5C11.4142 5 12 5.34822 12 5.77778V7.33333H10V5.77778Z"
                                        fill="#605E2B" />
                                    <path
                                        d="M20 5.77778C20 5.34822 20.5858 5 21 5C21.4142 5 22 5.34822 22 5.77778V7.33333H20V5.77778Z"
                                        fill="#605E2B" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10 7.33333H7.75C7.33579 7.33333 7 7.68156 7 8.11111V25.2222C7 25.6518 7.33579 26 7.75 26H24.25C24.6642 26 25 25.6518 25 25.2222V8.11111C25 7.68156 24.6642 7.33333 24.25 7.33333H22H20H12H10ZM23.5 12H8.5V24.4444H23.5V12Z"
                                        fill="#605E2B" />
                                    <path
                                        d="M10 15.5C10 14.6716 10.6716 14 11.5 14V14C12.3284 14 13 14.6716 13 15.5V15.5C13 16.3284 12.3284 17 11.5 17V17C10.6716 17 10 16.3284 10 15.5V15.5Z"
                                        fill="#605E2B" />
                                    <path
                                        d="M22 18.5C22 17.6716 21.3284 17 20.5 17V17C19.6716 17 19 17.6716 19 18.5V18.5C19 19.3284 19.6716 20 20.5 20V20C21.3284 20 22 19.3284 22 18.5V18.5Z"
                                        fill="#605E2B" />
                                </svg>
                                <input type="text" class="date  start-date flatpickr-input form-control"
                                    id="start_date" name="start_date" placeholder="Trip Start Date" required />
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="input-group">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 5.77778C10 5.34822 10.5858 5 11 5C11.4142 5 12 5.34822 12 5.77778V7.33333H10V5.77778Z"
                                        fill="#605E2B" />
                                    <path
                                        d="M20 5.77778C20 5.34822 20.5858 5 21 5C21.4142 5 22 5.34822 22 5.77778V7.33333H20V5.77778Z"
                                        fill="#605E2B" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10 7.33333H7.75C7.33579 7.33333 7 7.68156 7 8.11111V25.2222C7 25.6518 7.33579 26 7.75 26H24.25C24.6642 26 25 25.6518 25 25.2222V8.11111C25 7.68156 24.6642 7.33333 24.25 7.33333H22H20H12H10ZM23.5 12H8.5V24.4444H23.5V12Z"
                                        fill="#605E2B" />
                                    <path
                                        d="M10 15.5C10 14.6716 10.6716 14 11.5 14V14C12.3284 14 13 14.6716 13 15.5V15.5C13 16.3284 12.3284 17 11.5 17V17C10.6716 17 10 16.3284 10 15.5V15.5Z"
                                        fill="#605E2B" />
                                    <path
                                        d="M22 18.5C22 17.6716 21.3284 17 20.5 17V17C19.6716 17 19 17.6716 19 18.5V18.5C19 19.3284 19.6716 20 20.5 20V20C21.3284 20 22 19.3284 22 18.5V18.5Z"
                                        fill="#605E2B" />
                                </svg>
                                <input type="text" class="date end-date flatpickr-input form-control"
                                    id="finish_date" name="finish_date" placeholder="Trip End Date" required />
                            </div>
                        </div>
                        <div class="col-md-12 form-group textarea">
                            <span>(Describe the activities you are interested in like or would want to experience
                                using our service (eg : culture, nature, religion, hiking, trekking, mountain biking
                                etc.)</span>
                            <textarea name="special_request" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-check col-12">
                            <input class="form-check-input" name="term" type="checkbox" value=""
                                id="flexCheckDefault" required>
                            <label class="form-check-label" for="flexCheckDefault">
                                I accept the <a href="{{ route('website.page', 'term-condition') }}"
                                    target="_blank">&nbsp;
                                    terms and conditions &nbsp;
                                </a> of the company.
                            </label>
                        </div>
                        <div class="col-12">
                            <button type="submit" class=" btnSubmit btn btn-secondary mt-3 d-block w-100">
                                Submit
                                <span class="spinner-border spinner-border-md" style="display:none"
                                    id="ajaxLoader"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
