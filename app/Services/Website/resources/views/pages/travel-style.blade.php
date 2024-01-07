@extends('website::layouts.master')
@section('content')
    <section class="mt-80 breadcrumb-section with-text bg-white bg-img short-height">
        <img src="{{ asset('ruploads/' . $page->getCoverImage()) . pages_parallax() }}" alt="travel style cover image">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12 breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('website.home') }}">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.7899 6.73344L7.75241 0.699063L7.34772 0.294375C7.25551 0.202776 7.13082 0.151367 7.00085 0.151367C6.87087 0.151367 6.74618 0.202776 6.65397 0.294375L0.211783 6.73344C0.117301 6.82755 0.0426296 6.93964 -0.00782254 7.06309C-0.0582747 7.18653 -0.0834854 7.31884 -0.0819665 7.45219C-0.0757165 8.00219 0.382096 8.44125 0.932096 8.44125H1.59616V13.5303H12.4055V8.44125H13.0837C13.3508 8.44125 13.6024 8.33656 13.7915 8.1475C13.8846 8.05471 13.9583 7.94437 14.0085 7.82287C14.0586 7.70137 14.0842 7.57113 14.0837 7.43969C14.0837 7.17406 13.979 6.9225 13.7899 6.73344ZM7.87585 12.4053H6.12585V9.21781H7.87585V12.4053ZM11.2805 7.31625V12.4053H8.87585V8.84281C8.87585 8.4975 8.59616 8.21781 8.25085 8.21781H5.75085C5.40553 8.21781 5.12585 8.4975 5.12585 8.84281V12.4053H2.72116V7.31625H1.22116L7.00241 1.53969L7.36335 1.90063L12.7821 7.31625H11.2805Z"
                                                fill="white" />
                                        </svg>
                                        Home
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $page->page_title }}</li>
                            </ol>
                        </nav>
                        <div class="text-content">
                            <h1 class="font-64">{{ $page->page_title }}</h1>
                            <p class="text-white">{{ $page->caption }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="travel-style py-60">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-12 section-heading">
                            <h2>{{ $page->page_title }}</h2>
                            <p>{{ $page->caption }} </p>
                        </div>
                        <div class="col-12 text-content general-text-content">
                            {!! $page->page_description !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-3 blog-sidebar">
                    <div class="side-container mb-4">
                        <p>Quick Links</p>
                        <ul>
                            @foreach ($page->relatedPages as $page)
                                <li>
                                    <a href="{{ route('website.page', $page->slug) }}">{{ ucwords($page->page_title) }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($page->other_description)
        <section class="travel-style py-60">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-12 text-content general-text-content">
                                {!! $page->other_description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="insta-photos py-60">
        <div class="container mb-40">
            <div class="row">
                <div class="col-12 heading">
                    <h2>Who can be benifited from the Private Departures?</h2>
                    <p>Tag your instagram photos with #traveladventurenepal and see them here.</p>
                </div>
            </div>
        </div>
        <div class="insta-wrapper d-sm-flex">
            @foreach ($page->attachments as $attachment)
                <a href="#" class="insta-card">
                    <img src="{{ asset('ruploads/' . $attachment->media->file_name) }}"
                        alt="{{ $attachment->media->file_name }}">
                </a>
            @endforeach
        </div>
    </section>

    @if ($faqs)
        <section class="faq bg-light py-60">
            <div class="container">
                <div class="row">
                    <div class="col-12 section-heading mb-40">
                        <h2>Some FAQs related to private departure</h2>
                        <p>Travelling is never easy but its easy with us. </p>
                    </div>
                </div>
                <div class="accordion row accordion-flush" id="faq-accordion">

                    @foreach ($faqs as $faq)
                        <div class="col-12 mb-4 accordion-wrapper">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne{{ $faq->id }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne{{ $faq->id }}" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="collapseOne{{ $faq->id }}" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {!! $faq->answer !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif

    <section class="travel-style form-section py-60">
        <div class="container">
            <div class="col-md-10 mx-auto bg-light p-5">
                <div class="row">
                    <div class="col-12 heading">
                        <p>Fill the form to book a private holiday</p>
                        <span>Our Expert will get back to you with all Preparations to make your Perfect Tailormade
                            Adventure Trip.</span>
                    </div>
                    <form action="{{ route('website.travel-style.request.post') }}" method="post"
                        id="privateTripRequestForm">
                        {!! csrf_field() !!}

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="">First Name<span>*</span></label>
                                <div class="input-group @if ($errors->first('first_name')) after-error @endif">
                                    <input type="text" placeholder="Enter your first name"
                                        value="{{ old('first_name') }}" name="first_name" class="form-control">
                                    @if ($errors->has('first_name'))
                                        <label id="first_name-error" class="error"
                                            for="first_name">{{ $errors->first('first_name') }}</label>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="">Last Name<span>*</span></label>
                                <div class="input-group @if ($errors->first('last_name')) after-error @endif">
                                    <input type="text" placeholder="Enter your last name" value="{{ old('last_name') }}"
                                        name="last_name" class="form-control">
                                    @if ($errors->has('last_name'))
                                        <label id="last_name-error" class="error"
                                            for="last_name">{{ $errors->first('last_name') }}</label>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="">Email<span>*</span></label>
                                <div class="input-group @if ($errors->first('email')) after-error @endif">
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        placeholder="Enter your email" class="form-control">
                                    @if ($errors->has('email'))
                                        <label id="email-error" class="error"
                                            for="email">{{ $errors->first('email') }}</label>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="">Phone</label>
                                <div class="input-group @if ($errors->first('phone_number')) after-error @endif">
                                    <input type="number" name="phone_number" value="{{ old('phone_number') }}"
                                        placeholder="Enter your phone" class="form-control">
                                    @if ($errors->has('phone_number'))
                                        <label id="phone_number-error" class="error"
                                            for="phone_number">{{ $errors->first('phone_number') }}</label>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="">Number of Approximate Travellers<span>*</span></label>
                                <div class="input-group @if ($errors->first('passenger_count')) after-error @endif">
                                    <input type="number" min="1" value="{{ old('passenger_count') }}"
                                        name="passenger_count" placeholder="Enter total passengers number"
                                        class="form-control">
                                    @if ($errors->has('passenger_count'))
                                        <label id="passenger_count-error" class="error"
                                            for="passenger_count">{{ $errors->first('passenger_count') }}</label>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 form-group with-icon white-bg">
                                <label for="">Type of Group</label>
                                <div class="input-group @if ($errors->first('group_type')) after-error @endif">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4.29285 15.8155C4.02797 15.919 3.91945 16.2356 4.06513 16.4799L5.81319 19.4108C6.06359 19.8306 6.58081 20.0079 7.0361 19.8299L23.9381 13.223C24.7279 12.9143 25.1179 12.0237 24.8092 11.234C24.4883 10.413 23.5436 10.0302 22.7417 10.3961L17.7432 12.6773L10.773 6.27125C10.4838 6.00546 10.0685 5.9276 9.70266 6.0706C9.08963 6.31023 8.85636 7.05604 9.22358 7.60227L13.6983 14.2584L6.85554 17.3571L4.72413 15.8669C4.59802 15.7787 4.43618 15.7594 4.29285 15.8155ZM25.6776 22.9521H5.14764V24.5313H25.6776V22.9521Z"
                                            fill="#0084D4"></path>
                                    </svg>
                                    <select class="js-example-basic-single form-control" name="group_type"
                                        id="">
                                        @foreach (config('constants.group_types') as $group)
                                            <option value="{{ $group }}"
                                                {{ old('group_type') == $group ? 'selected' : '' }}>{{ $group }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('group_type'))
                                        <label id="group_type-error" class="error"
                                            for="group_type">{{ $errors->first('group_type') }}</label>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 form-group with-icon white-bg">
                                <label for="">Trip Start Date</label>
                                <div class="input-group @if ($errors->first('start_date')) after-error @endif">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4.29285 15.8155C4.02797 15.919 3.91945 16.2356 4.06513 16.4799L5.81319 19.4108C6.06359 19.8306 6.58081 20.0079 7.0361 19.8299L23.9381 13.223C24.7279 12.9143 25.1179 12.0237 24.8092 11.234C24.4883 10.413 23.5436 10.0302 22.7417 10.3961L17.7432 12.6773L10.773 6.27125C10.4838 6.00546 10.0685 5.9276 9.70266 6.0706C9.08963 6.31023 8.85636 7.05604 9.22358 7.60227L13.6983 14.2584L6.85554 17.3571L4.72413 15.8669C4.59802 15.7787 4.43618 15.7594 4.29285 15.8155ZM25.6776 22.9521H5.14764V24.5313H25.6776V22.9521Z"
                                            fill="#0084D4"></path>
                                    </svg>
                                    <input type="date" name="start_date" value="{{ old('start_date') }}"
                                        class="form-control" placeholder="Select Departure Date">
                                    @if ($errors->has('start_date'))
                                        <label id="start_date-error" class="error"
                                            for="start_date">{{ $errors->first('start_date') }}</label>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="">Number of Days</label>
                                <div class="input-group @if ($errors->first('days_count')) after-error @endif">
                                    <input type="number" placeholder="Enter your trip duration"
                                        value="{{ old('days_count') }}" name="days_count" class="form-control"
                                        min="1">
                                    @if ($errors->has('days_count'))
                                        <label id="days_count-error" class="error"
                                            for="days_count">{{ $errors->first('days_count') }}</label>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 form-group with-icon white-bg">
                                <label for="">What activities do you want to include ?<span>*</span></label>
                                <div class="input-group @if ($errors->first('activities')) after-error @endif">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4.29285 15.8155C4.02797 15.919 3.91945 16.2356 4.06513 16.4799L5.81319 19.4108C6.06359 19.8306 6.58081 20.0079 7.0361 19.8299L23.9381 13.223C24.7279 12.9143 25.1179 12.0237 24.8092 11.234C24.4883 10.413 23.5436 10.0302 22.7417 10.3961L17.7432 12.6773L10.773 6.27125C10.4838 6.00546 10.0685 5.9276 9.70266 6.0706C9.08963 6.31023 8.85636 7.05604 9.22358 7.60227L13.6983 14.2584L6.85554 17.3571L4.72413 15.8669C4.59802 15.7787 4.43618 15.7594 4.29285 15.8155ZM25.6776 22.9521H5.14764V24.5313H25.6776V22.9521Z"
                                            fill="#0084D4"></path>
                                    </svg>
                                    <select class="js-example-basic-single form-control" name="activities[]" multiple
                                        required>
                                        @foreach ($activity_lists as $activity)
                                            <option value="{{ $activity->title }}"
                                                @if (old('activities') && in_array($activity->title, old('activities'))) selected @endif>{{ $activity->title }}
                                            </option>
                                        @endforeach
                                        <option value="other">Other</option>
                                    </select>
                                    @if ($errors->has('activities'))
                                        <label id="activities-error" class="error"
                                            for="activities">{{ $errors->first('activities') }}</label>
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" name="request_type" value="private_departure">

                            <div class="col-md-6 d-flex align-items-center justify-content-start">
                                <div class="form-chec form-group">
                                    <input type="hidden" name="children_present" value="0">
                                    <input class="form-check-input me-2" type="checkbox" value=""
                                        {{ old('children_present') == 1 ? 'checked' : '' }} id="flexCheckChecked"
                                        name="children_present" onclick="$(this).val(this.checked ? 1 : 0)">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Children Travelling with You (Age 5-15)
                                    </label>

                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="">Tell us more about your trip</label>
                                <div class="input-group @if ($errors->first('description')) after-error @endif">
                                    <textarea name="description" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
                                    @if ($errors->has('description'))
                                        <label id="description-error" class="error textarea-error"
                                            for="description">{{ $errors->first('description') }}</label>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 btn-wrapper">
                                <button type="submit" class="btn btn-custom btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                    <div class="row py-4 footer-info">
                        <div class="col-12 title">Still have some queries, we are here to assist you</div>
                        <div class="col-md-4 content-wrapper">
                            <h6>Email Address</h6>
                            <ul>
                                <li>
                                    <a href="mailto:{{ setting('contact_email') }}">{{ setting('contact_email') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 content-wrapper">
                            <h6>Telephone</h6>
                            <ul>
                                <li>
                                    <a
                                        href="tel:{{ settings()->get('contact_phone') }}">{{ setting('contact_phone') }}</a>
                                </li>
                                <li>
                                    <a href="tel:{{ settings()->get('extra_phone') }}">{{ setting('extra_phone') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 content-wrapper">
                            <h6>Address</h6>
                            <ul>
                                <li><a href="#">{{ setting('address') }}</a></li>
                                <li><a href="#">{!! setting('address_description') !!}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="query-banner mt-80 bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-6 py-120 text-content">
                    <h2>We are always here to assist you with any queries you may have in mind.</h2>
                    <div class="d-sm-flex justify-content-between">
                        <div class="item">
                            <a href="tel:{{ settings()->get('contact_phone') }}" class="d-flex align-items-center">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.83203 7.5L9.9987 10.4167L14.1654 7.5" stroke="#FAA61A" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M1.66797 14.1665V5.83317C1.66797 5.39114 1.84356 4.96722 2.15612 4.65466C2.46868 4.3421 2.89261 4.1665 3.33464 4.1665H16.668C17.11 4.1665 17.5339 4.3421 17.8465 4.65466C18.159 4.96722 18.3346 5.39114 18.3346 5.83317V14.1665C18.3346 14.6085 18.159 15.0325 17.8465 15.345C17.5339 15.6576 17.11 15.8332 16.668 15.8332H3.33464C2.89261 15.8332 2.46868 15.6576 2.15612 15.345C1.84356 15.0325 1.66797 14.6085 1.66797 14.1665Z"
                                        stroke="#FAA61A" stroke-width="1.5" />
                                </svg>
                                {{ setting('contact_phone') }}
                            </a>
                            <p>For General Inquiries</p>
                        </div>
                        <div class="item">
                            <a href="mailto:{{ settings()->get('contact_email') }}" class="d-flex align-items-center">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.83203 7.5L9.9987 10.4167L14.1654 7.5" stroke="#FAA61A" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M1.66797 14.1665V5.83317C1.66797 5.39114 1.84356 4.96722 2.15612 4.65466C2.46868 4.3421 2.89261 4.1665 3.33464 4.1665H16.668C17.11 4.1665 17.5339 4.3421 17.8465 4.65466C18.159 4.96722 18.3346 5.39114 18.3346 5.83317V14.1665C18.3346 14.6085 18.159 15.0325 17.8465 15.345C17.5339 15.6576 17.11 15.8332 16.668 15.8332H3.33464C2.89261 15.8332 2.46868 15.6576 2.15612 15.345C1.84356 15.0325 1.66797 14.6085 1.66797 14.1665Z"
                                        stroke="#FAA61A" stroke-width="1.5" />
                                </svg>
                                {{ setting('contact_email') }}
                            </a>
                            <p>For General Inquiries</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 img-div">
                    <img src="{{ asset('website/assets/img/cuate.png') }}" alt="cuate">
                </div>
            </div>
        </div>
    </section>

@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
    <script>
        addLoadEvent(function() {
            var $grid = $('.imagewrap').isotope({
                // options
                itemSelector: '.img-wrap',
                layoutMode: 'masonry',
                masonry: {
                    columnWidth: '.img-wrap',
                    gutter: 5
                }
            });

            // change is-checked class on buttons
            var $buttonGroup = $('.button-group');
            $buttonGroup.on('click', 'a', function(event) {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                var $button = $(event.currentTarget);
                $button.addClass('is-checked');
                var filterValue = $button.attr('data-filter');
                $grid.isotope({
                    filter: filterValue
                });
            });
        });

        if ("{{ $errors->any() }}") {
            var elmnt = document.getElementById("privateTripRequestForm");
            elmnt.scrollIntoView();
        }
    </script>
@stop
