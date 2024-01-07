<div class="modal booking-modal fade addd flight-modal" id="flightModal" tabindex="-1"
    aria-labelledby="flightModalLabel"aria-hidden="true">
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
                        <h2>Flight Form</h2>

                    </div>

                    <form id="flight-form" class="row" novalidate>
                        {{ csrf_field() }}
                        <span id="quotemsg5"></span>
                        <span id="flight_type"></span>
                        <input type="hidden" id="flight_type_input" name="flight_type" value="">



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

                                <input type="text" class="form-control info-input" id="infoFlightOneWay"
                                    spellcheck="false" readonly="readonly" placeholder="Travellers">
                            </div>
                            <div class="traveller-dropdown-select position-absolute">
                                <div class="traveller adult-container d-flex">
                                    <h6>Adult</h6>
                                    <div class="control adult d-flex align-items-center">
                                        <span class="adult-one-way btn minus disabled"><i
                                                class="far fa-minus"></i></span>
                                        <span id="adult-count-flight-one-way" class="adult-count count">1</span>
                                        <span class="adult-one-way btn plus">
                                            <i class="far fa-plus"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="traveller children-container d-flex">
                                    <h6>Children <span>(0-11)</span></h6>
                                    <div class="control child d-flex align-items-center">
                                        <span class="child-one-way btn minus disabled"><i
                                                class="far fa-minus"></i></span>
                                        <span id="child-count-flight-one-way" class="child-count count">0</span>
                                        <span class="child-one-way btn plus"><i class="far fa-plus"></i></span>
                                    </div>
                                </div>

                                <div class="traveller infant-container d-flex">
                                    <h6>Infant <span>(12-16)</span></h6>
                                    </h6>
                                    <div class="control infant d-flex align-items-center">


                                        <span class="infant-one-way btn minus disabled"><i
                                                class="far fa-minus"></i></span>
                                        </span><span id="infant-count-flight-one-way"
                                            class="infant-count count">0</span>
                                        <span class="infant-one-way btn plus"><i class="far fa-plus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6 select-wrapper d-flex align-items-center">
                            <div class="col-md-3 flightdeparture">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.29285 15.8155C4.02797 15.919 3.91945 16.2356 4.06513 16.4799L5.81319 19.4108C6.06359 19.8306 6.58081 20.0079 7.0361 19.8299L23.9381 13.223C24.7279 12.9143 25.1179 12.0237 24.8092 11.234C24.4883 10.413 23.5436 10.0302 22.7417 10.3961L17.7432 12.6773L10.773 6.27125C10.4838 6.00546 10.0685 5.9276 9.70266 6.0706C9.08963 6.31023 8.85636 7.05604 9.22358 7.60227L13.6983 14.2584L6.85554 17.3571L4.72413 15.8669C4.59802 15.7787 4.43618 15.7594 4.29285 15.8155ZM25.6776 22.9521H5.14764V24.5313H25.6776V22.9521Z"
                                        fill="#605E2B" />
                                </svg>

                                <span class="wpcf7-form-control-wrap DepartureCity">
                                    <input type="text" name="departure" value="" size="40"
                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required departureInput"
                                        aria-required="true" aria-invalid="false" placeholder="From Where ?*"
                                        required />
                                </span>
                            </div>

                        </div>
                        <div class="form-group col-md-6 select-wrapper d-flex align-items-center">
                            <div class="col-md-3 flightarrival">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.84164 9.47884C6.57116 9.39096 6.2865 9.56698 6.24428 9.84823L5.73764 13.223C5.66507 13.7065 5.95263 14.1715 6.41754 14.3225L23.6768 19.9304C24.4833 20.1925 25.3495 19.7511 25.6115 18.9446C25.8839 18.1063 25.3961 17.2113 24.544 16.9859L19.2324 15.5805L17.9043 6.20728C17.8492 5.81838 17.5773 5.49483 17.2038 5.37345C16.5778 5.17006 15.9245 5.59886 15.8621 6.2541L15.102 14.2384L7.84583 12.2959L7.14252 9.79209C7.1009 9.64394 6.988 9.52639 6.84164 9.47884ZM25.6777 22.9521H5.14771V24.5314H25.6777V22.9521Z"
                                        fill="#605E2B" />
                                </svg>
                                <span class="wpcf7-form-control-wrap DestinationCity">
                                    <input type="text" name="arrival" value="" size="40"
                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required arrivalInput"
                                        aria-required="true" aria-invalid="false" placeholder="To Where ?*"
                                        required />
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
                                    id="departure_date" name="departure_date" placeholder="Departure Date"
                                    value="" required />
                            </div>
                        </div>

                        <div class="col-md-6 form-group" id="div_return_date">
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
                                    id="return_date" name="return_date" placeholder="Arrival Date" value=""
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
                                    id="ajaxLoader1"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
