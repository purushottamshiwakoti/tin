@extends('backend::layouts.master')
@section('content')
    <div class="card">
        @include('backend::partials.edit-add-header', ['route_str' => 'destinations'])
        <div class="card-block">
            <hr>
            <form id="main"
                action="{{ $destination ? route('admin.destinations.update', $destination->id) : route('admin.destinations.store') }}"
                method="post" enctype="multipart/form-data" novalidate>
                {{ csrf_field() }}
                @if ($destination)
                    <input name="_method" type="hidden" value="PUT">
                @endif
                <div class="form-group {{ $errors->has('title') ? '' : '' }} row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{ oldValue('title', $destination) }}"
                            placeholder="Title"
                            class="form-control {{ $errors->has('title') ? 'form-control-danger' : '' }}" required>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('caption') ? '' : '' }} row">
                    <label class="col-sm-2 col-form-label">Caption</label>
                    <div class="col-sm-10">
                        <input type="text" name="caption" value="{{ oldValue('caption', $destination) }}"
                            placeholder="Caption"
                            class="form-control {{ $errors->has('caption') ? 'form-control-danger' : '' }}">
                    </div>
                </div>
                @include('backend::partials.cover-image', ['data' => $destination])

                @include('backend::partials.attachments', ['data' => $destination])
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea rows="5" name="description" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('description', $destination) }}</textarea>
                    </div>
                </div>

                @include('backend::partials.metas', ['data' => $destination])
                <div class="form-group {{ $errors->has('order') ? '' : '' }} row">
                    <label class="col-sm-2 col-form-label">Order</label>
                    <div class="col-sm-10">
                        <input type="number" name="order" value="{{ oldValue('order', $destination) }}"
                            placeholder="Order"
                            class="form-control {{ $errors->has('order') ? 'form-control-danger' : '' }}" min="0">
                    </div>
                </div>
                <hr />
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Activities</label>
                    <div class="col-sm-10">
                        <select name="activities[]" id="publish_types" class="js-example-tags col-sm-12"
                            multiple="multiple">

                            @foreach ($activities as $a)
                               @if ($destination)
                               <option value="{{ $a->id }}" @if ($selectedActivity->contains($a->id)) selected @endif>

                                {{ $a->title }}
                            </option>
                            @else
                            <option value="{{ $a->id }}">

                                {{ $a->title }}
                            </option>
                               @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr />
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Regions</label>
                    <div class="col-sm-10">
                        <select name="regions[]" id="publish_types" class="js-example-tags col-sm-12" multiple="multiple">
                            @foreach ($regions as $r)
                               @if($destination)
                               <option value="{{ $r->id }}" @if ($selectedRegion->contains($r->id)) selected @endif>
                                {{ $r->title }}
                            </option>
                               @else
                               <option value="{{ $r->id }}" >
                                {{ $r->title }}
                            </option>
                               @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr />
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Trips</label>
                    <div class="col-sm-10">
                        <select name="trips[]" id="publish_types" class="js-example-tags col-sm-12" multiple="multiple">
                            @foreach ($trips as $t)
                                @if ($destination)
                                    <option value="{{ $t->id }}" @if ($selectedTrip->contains($t->id)) selected @endif>

                                        {{ $t->title }}
                                    </option>
                                @else
                                    <option value="{{ $t->id }}">

                                        {{ $t->title }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr />
                <div class="mb-3">
                    <label class="input-group-text" id="basic-addon1">FAQS</label>
                    <button class="input-group-text ml-4 btn btn-success add-faq"> <i class="fa fa-plus"></i> Add</button>
                </div>
                @php
                    if ($destination) {
                        $countFaqs = count($destination->faqs);
                    }
                @endphp
                @if ($destination)
                <div id="faq-container" class="mb-3 w-50"></div>

                    @foreach ($destination->faqs as $i => $faq)
                        <div class="mt-2">
                            <div class="w-50 card  faqs-repeater">
                                <div>
                                    <div class="input-group-text" id="basic-addon1">Question
                                    </div>
                                    <input type="text" class="form-control faq-repeater"
                                        name="faq[{{ $i }}][question]" value="{{ $faq->question }}">
                                </div>
                                <div>
                                    <div class="input-group-text" id="basic-addon1">Answer
                                    </div>
                                    <input type="text" class="form-control faq-repeater"
                                        name="faq[{{ $i }}][answer]" value="{{ $faq->answer }}">
                                </div>
                                <button class="btn btn-danger remove-faq w-25 mt-3">Remove</button>

                            </div>

                        </div>
                    @endforeach
                @else
                    <div class="mt-2">
                        <div class="w-50 card ">
                            <div>
                                <div class="input-group-text" id="basic-addon1">Question
                                </div>
                                <input type="text" class="form-control faq-repeater" name="faq[0][question]">
                            </div>
                            <div>
                                <div class="input-group-text" id="basic-addon1">Answer
                                </div>
                                <input type="text" class="form-control faq-repeater" name="faq[0][answer]">
                            </div>
                            <div id="faq-container" class="mb-3"></div>
                        </div>
                    </div>
                @endif
                <div class="clearfix"></div>
                <button class="btn btn-mat waves-effect waves-light btn-success" type="submit">Submit</button>
            </form>


        </div>
    </div>
@stop

@section('javascript')
    <script>
        $(document).ready(function() {

            @if (!empty($countFaqs))
                var faqsData = @json($destination->faqs);
                // var faqsData = 20
                console.log({
                    faqsData
                });
            @else
                var faqsData = [];
            @endif

            @if (!empty($flight_deals))
                var flightDealsData = @json($flight_deals);
            @else
                var flightDealsData = [];
            @endif

            let flightDeals = flightDealsData.length == 0 ? 1 : flightDealsData.length;
            let faqValue = faqsData.length == 0 ? 1 : faqsData.length;
            console.log({
                faqValue
            });

            function updateFlightDealsHeader() {
                $('.best-flights-repeater h3').each(function(index) {
                    $(this).text(`Flights Deals ${index + 1}`);
                });
            }

            function updateFlightDeals() {
                $('.best-flights-repeater').each(function(index) {
                    let currentDeal = $(this);
                    currentDeal.find('[name]').each(function() {
                        let nameAttr = $(this).attr('name');
                        nameAttr = nameAttr.replace(/\[[0-9]+\]/, `[${index}]`);
                        $(this).attr('name', nameAttr);
                    });
                });
            }



            $('.flight-deals').on('click', function(e) {
                e.preventDefault();
                var valid = true;
                $('.deals-repeater').each(function() {
                    if ($(this).val() === '') {
                        valid = false;
                        return false;
                    }
                });
                console.log({
                    valid
                })
                console.log({
                    flightDeals
                })
                if (!valid) {
                    alert("Please input all feilds to add another flight deal");
                } else {
                    // $('.best-flights-remove').show();

                    let dealRepeater = `
                    <div class="mb-3 best-flights-repeater">
                        <h3>Flights Deals ${flightDeals}</h3>
                    <div class="w-50 card ">
                        <div>
                            <div class=" input-group-text" id="basic-addon1">Airline name
                            </div>
                            <input type="text" class="deals-repeater form-control" name="flight_deals[${flightDeals}][airline_name]">
                        </div>
                        <div class="mt-3">
                            <div class="input-group-text" id="basic-addon1">Flight Date
                            </div>
                            <input type="date" class=" deals-repeater form-control" name="flight_deals[${flightDeals}][flight_date]">
                        </div>
                        <div class="mt-3">
                            <div class="input-group-text" id="basic-addon1">Duration
                            </div>
                            <input type="number" class="deals-repeater form-control" name="flight_deals[${flightDeals}][duration]">
                        </div>
                        <div class="mt-3">
                            <div class="input-group-text" id="basic-addon1">Transits
                            </div>
                            <input type="number" class="deals-repeater form-control" name="flight_deals[${flightDeals}][transits]">
                        </div>
                        <div class="mt-3">
                            <div class="input-group-text" id="basic-addon1">Cost </div>
                            <input type="number" class="deals-repeater form-control" name="flight_deals[${flightDeals}][cost]">
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-danger best-flights-remove" >Remove</button>
                    </div>
                </div>`
                    $('#deal-container').append(dealRepeater);
                    flightDeals++;
                }
                console.log({
                    flightDeals
                });
            });
            $('#deal-container').on('click', '.best-flights-remove', function(e) {
                e.preventDefault();
                $(this).closest('.best-flights-repeater').remove();
                flightDeals--;
                updateFlightDealsHeader();
                updateFlightDeals();
            });
            $('.best-flights-remove').on('click', function(e) {
                e.preventDefault();
                $(this).closest('.best-flights-repeater').remove();
                flightDeals--;
                updateFlightDealsHeader();
                updateFlightDeals();
            });
            $('.add-faq').on('click', function(e) {
                e.preventDefault();
                let validFaq = true;
                $('.faq-repeater').each(function() {
                    if ($(this).val() === '') {
                        validFaq = false;
                        return false;
                    }
                });
                if (!validFaq) {
                    alert("Please input all feilds to add another faq");
                } else {
                    let numOfFaqs = $('.faqs-repeater').length;
                    var faq = `
                    <div class="w-80 card faqs-repeater mt-3 ">
                        <h5>Faq</h5>
                        <div>
                            <div class="input-group-text" id="basic-addon1">Question
                            </div>
                            <input type="text" class="form-control faq-repeater" name="faq[${faqValue}][question]">
                        </div>
                        <div>
                            <div class="input-group-text" id="basic-addon1">Answer
                            </div>
                            <input type="text" class="form-control faq-repeater" name="faq[${faqValue}][answer]">
                        </div>
                        <button class="btn btn-danger remove-faq w-25 mt-3">Remove</button>
                    `;
                    $('#faq-container').append(faq);
                    faqValue++;
                }
            });

            function updateFaqs() {
                confirm("Are you sure want to delete this?");
                $('.faqs-repeater').each(function(index) {
                    let currentFaq = $(this);
                    console.log(currentFaq);
                    currentFaq.find('[name]').each(function() {
                        let nameAttr = $(this).attr('name');
                        nameAttr = nameAttr.replace(/\[faq\]\[[0-9]+\]/, `[faq][${index}]`);
                        // nameAttr = nameAttr.replace(/\[[0-9]+\]/, `[${index}]`);
                        $(this).attr('name', nameAttr);
                    });
                });
            }
            $('#faq-container').on('click', '.remove-faq', function(e) {
                e.preventDefault();
                $(this).closest('.faqs-repeater').remove();
                faqValue--
                updateFaqs();
                // alert("fddfdf");
            })
            $('.remove-faq').on('click', function(e) {
                e.preventDefault();
                $(this).closest('.faqs-repeater').remove();
                faqValue--;
                updateFaqs();
                // alert("fddfdf");
            });
            $('.remove-banner-image').on('click', function(e) {
                e.preventDefault();
                alert("deleted successfully");
                $('.banner-image').attr('src', '');
                $('.banner-image').hide();
                $('.image-input-show').show();
            })
        })
    </script>
@stop
