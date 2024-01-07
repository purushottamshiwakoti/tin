<div class="modal booking-modal fade addd flight-modal" id="hotelModal" tabindex="-1"
    aria-labelledby="hotelModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2C3E50" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
            <div class="modal-body container" id="flight">
                <div class="row">
                    <div class="col-12 heading">
                        <h2>Hotel Form</h2>

                    </div>

                    <form id="hotel-form" class="row" novalidate>
                        {{ csrf_field() }}
                        <span id="quotemsg5"></span>
                        <span id="hotel_type"></span>
                        <input type="hidden" id="hotel_type_input" name="hotel_type" value="one-way">



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
                                <input type="text" class="form-control" id="first_name " name="first_name"
                                    value="" placeholder="First Name " required>
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
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    value="" placeholder="Last Name" required>
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
                                <input type="email" class="form-control" data-id="email" id="email"
                                    name="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-0">
                            <div class="input-group total-travellers js-select-special">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="16" cy="11" r="4" fill="#605E2B" />
                                    <path
                                        d="M10 24C8.89543 24 7.97435 23.0907 8.24685 22.0202C9.12788 18.5595 12.265 16 16 16C19.735 16 22.8721 18.5595 23.7531 22.0202C24.0257 23.0907 23.1046 24 22 24H10Z"
                                        fill="#605E2B" />
                                </svg>

                                <input type="text" class="form-control info-input" id="HotelOneWay"
                                    spellcheck="false" readonly="readonly" placeholder="Travellers">
                            </div>
                            <div class="traveller-dropdown-select position-absolute">
                                <div class="traveller adult-container d-flex">
                                    <h6>Adult</h6>
                                    <div class="control adult d-flex align-items-center">
                                        <span class="adult-hotel-one-way btn minus disabled"><i
                                                class="far fa-minus"></i></span>
                                        <span id="adult-count-hotel-one-way" class="adult-count count">1</span>
                                        <span class="adult-hotel-one-way btn plus">
                                            <i class="far fa-plus"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="traveller children-container d-flex">
                                    <h6>Children <span>(0-11)</span></h6>
                                    <div class="control child d-flex align-items-center">
                                        <span class="child-hotel-one-way btn minus disabled"><i
                                                class="far fa-minus"></i></span>
                                        <span id="child-count-hotel-one-way" class="child-count count">0</span>
                                        <span class="child-hotel-one-way btn plus"><i class="far fa-plus"></i></span>
                                    </div>
                                </div>

                                <div class="traveller infant-container d-flex">
                                    <h6>Infant <span>(12-16)</span></h6>
                                    </h6>
                                    <div class="control infant d-flex align-items-center">
                                        <span class="infant-hotel-one-way btn minus disabled"><i
                                                class="far fa-minus"></i></span>
                                        </span><span id="infant-count-hotel-one-way"
                                            class="infant-count count">0</span>
                                        <span class="infant-hotel-one-way btn plus"><i class="far fa-plus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6 select-wrapper d-flex align-items-center">
                            <div class="col-md-3 hoteldeparture">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 21H21" stroke="#777777" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M5 21V7L13 3V21" stroke="#777777" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M19 21V11L13 7" stroke="#777777" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M9 9V9.01" stroke="#777777" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M9 12V12.01" stroke="#777777" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M9 15V15.01" stroke="#777777" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M9 18V18.01" stroke="#777777" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <span class="wpcf7-form-control-wrap DepartureCity">
                                    <input required type="text" name="place" value="" size="40"
                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required place"
                                        aria-required="true" aria-invalid="false" placeholder="Name ?*" />
                                </span>
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
                                    id="check_in" name="check_in_date" placeholder="Check In Date" value=""
                                    required />
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
                                    id="check_out" name="check_out_date" placeholder="Check Out Date" value=""
                                    required />
                            </div>
                        </div>


                        <div class="col-md-12 form-group textarea">
                            <span>Remark</span>
                            <textarea name="message" id="" cols="30" rows="10"></textarea>
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
                                    id="ajaxLoader2"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
