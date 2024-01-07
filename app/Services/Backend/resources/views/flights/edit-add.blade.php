@extends('backend::layouts.master')
@php
    $currentUrl = url()->current();
    $contains = Illuminate\Support\Str::contains($currentUrl, 'edit');
    
@endphp
@if ($contains)
    {{-- @dd($flight->coverImage()) --}}
    @php
        $faqs = json_decode($flight->faqs);
        $flight_deals = json_decode($flight->flight_deals);
    @endphp
@endif

@section('content')
    {{-- @dd($flight) --}}

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-xl-3 col-md-6">

        {{-- <div class="card">
            <div class="card-block ">
                <div class="row ">
                    <ul class="nav nav-tabs md-tabs tabs-left b-none" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#details" role="tab">Details</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#details" role="tab">Fligt Deals</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#details" role="tab">Faqs</a>
                            <div class="slide"></div>
                        </li>
                    </ul>
                    <!-- Tab panes -->

                </div>

            </div>
        </div> --}}
    </div>
    <div class="card">
        <div class="card-block">
            <form action="{{ $contains ? route('admin.flights.update', $flight->id) : route('admin.flights.store') }}"
                method="post" enctype="multipart/form-data">

                @csrf
                @if ($contains)
                    <input type="text" value="{{ $flight->id }}" name="id" hidden />
                @endif
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Flight OverView Description <span
                            class="text-danger">*</span></span>
                    @if ($contains)
                        <textarea rows="5" name="overview_description" cols="5" class="form-control tinymce"
                            placeholder="Default textarea">{{ $flight->overview_description }}</textarea>
                    @else
                        <textarea rows="5" name="overview_description" cols="5" class="form-control tinymce"
                            placeholder="Default textarea">
                         {{ old('overview_description') }}</textarea>
                    @endif

                </div>
                <div class="mb-3">
                    <div class="d-flex">
                        <span class="input-group-text" id="basic-addon1">Slug <span class="text-danger">*</span></span>
                        @if ($contains)
                            <input type="text" class="form-control  w-50" name="slug" value="{{ $flight->slug }}">
                        @else
                            <input type="text" class="form-control  w-50" name="slug" value="{{ old('slug') }}">
                        @endif

                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex">
                        <span class="input-group-text" id="basic-addon1">Starting Price <span
                                class="text-danger">*</span></span>
                        @if ($contains)
                            <input type="text" class="form-control  w-50" name="starting_price"
                                value="{{ $flight->starting_price }}">
                        @else
                            <input type="number" class="form-control  w-50" name="starting_price"
                                value="{{ old('starting_price') }}">
                        @endif

                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Banner Image <span class="text-danger">*</span></span>
                    @if ($contains)
                        <div class="my-2 d-flex " style="display: block">
                            <img class="ml-2 banner-image"
                                src="{{ asset('ruploads/' . $flight->getCoverImage()) . pages_parallax() }}?w=360&h=404&fit=crop"
                                alt="{{ $flight->slug }}" style="width: 100px;height:100px;object-fit:cover">
                            <div class="ml-3 banner-image">
                                <button class="btn btn-danger remove-banner-image">Remove</button>
                            </div>
                        </div>
                        <input type="file" class="form-control image-input-show" accept="image/*" name="banner_image"
                            style="display: none">
                    @else
                        <input type="file" class="form-control" accept="image/*" name="banner_image">
                    @endif
                </div>


                <div class="d-flex">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">From <span class="text-danger">*</span></span>
                        @if ($contains)
                            <input type="text" class="form-control" name="from" value="{{ $flight->from }}">
                        @else
                            <input type="text" class="form-control" name="from" value="{{ old('from') }}">
                        @endif
                    </div>
                    <div class="input-group mb-3 ml-3">
                        <span class="input-group-text" id="basic-addon1">To <span class="text-danger">*</span></span>
                        @if ($contains)
                            <input type="text" class="form-control" name="to" value="{{ $flight->to }}">
                        @else
                            <input type="text" class="form-control" name="to" value="{{ old('to') }}">
                        @endif

                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Book Flight Descripton <span
                            class="text-danger">*</span></span>
                    @if ($contains)
                        <textarea rows="5" name="book_flight_description" cols="5" class="form-control tinymce"
                            placeholder="Default textarea">{{ $flight->book_flight_description }}</textarea>
                    @else
                        <textarea rows="5" name="book_flight_description" cols="5" class="form-control tinymce"
                            placeholder="Default textarea">
                            {{ old('book_flight_description') }}
                        </textarea>
                    @endif

                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Flight Deals Title <span
                            class="text-danger">*</span></span>
                    @if ($contains)
                        <input type="text" class="form-control" name="flight_deals_title"
                            value="{{ $flight->flight_deals_title }}">
                    @else
                        <input type="text" class="form-control" name="flight_deals_title"
                            value="{{ old('flight_deals_title') }}">
                    @endif
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Flight Deals Description <span
                            class="text-danger">*</span></span>
                    @if ($contains)
                        <textarea rows="5" name="flight_deals_description" cols="5" class="form-control tinymce"
                            placeholder="Default textarea">{{ $flight->flight_deals_description }}</textarea>
                    @else
                        <textarea rows="5" name="flight_deals_description" cols="5" class="form-control tinymce"
                            placeholder="Default textarea">
                            {{ old('flight_deals_description') }}
                        </textarea>
                    @endif

                </div>
                {{-- Best Flight Deals  --}}
                <div class="input-group mb-3">
                    <label class="input-group-text " id="basic-addon1">Best Flight Deals </label>
                    <button class="input-group-text ml-4 btn btn-success flight-deals  "> <i class="fa fa-plus"></i>
                        Add</button>
                </div>
                @if ($contains)
                    @foreach ($flight_deals as $i => $f)
                        {{-- @dd($f) --}}
                        <div class="mb-3 best-flights-repeater">
                            <div class="w-50 card ">
                                <div>
                                    <div class=" input-group-text" id="basic-addon1">Airline name
                                    </div>
                                    <input type="text" class="deals-repeater form-control"
                                        name="flight_deals[{{ $i }}][airline_name]"
                                        value="{{ $f->airline_name }}">

                                </div>
                                <div class="mt-3">
                                    <div class="input-group-text" id="basic-addon1">Flight Date
                                    </div>
                                    <input type="date" class=" deals-repeater form-control"
                                        name="flight_deals[{{ $i }}][flight_date]"
                                        value="{{ $f->flight_date }}">
                                </div>
                                <div class="mt-3">
                                    <div class="input-group-text" id="basic-addon1">Duration
                                    </div>
                                    <input type="number" class="deals-repeater form-control"
                                        name="flight_deals[{{ $i }}][duration]" value="{{ $f->duration }}">
                                </div>
                                <div class="mt-3">
                                    <div class="input-group-text" id="basic-addon1">Transits
                                    </div>
                                    <input type="number" class="deals-repeater form-control"
                                        name="flight_deals[{{ $i }}][transits]" value="{{ $f->transits }}">
                                </div>
                                <div class="mt-3">
                                    <div class="input-group-text" id="basic-addon1">Cost </div>
                                    <input type="number" class="deals-repeater form-control"
                                        name="flight_deals[{{ $i }}][cost]" value="{{ $f->cost }}">
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-danger best-flights-remove">Remove</button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="mb-3 best-flights-repeater">
                        <div class="w-50 card ">
                            <div>
                                <div class=" input-group-text" id="basic-addon1">Airline name
                                </div>

                                <input type="text" class="deals-repeater form-control"
                                    name="flight_deals[0][airline_name]">
                            </div>
                            <div class="mt-3">
                                <div class="input-group-text" id="basic-addon1">Flight Date
                                </div>
                                <input type="date" class=" deals-repeater form-control"
                                    name="flight_deals[0][flight_date]">
                            </div>
                            <div class="mt-3">
                                <div class="input-group-text" id="basic-addon1">Duration
                                </div>
                                <input type="number" class="deals-repeater form-control"
                                    name="flight_deals[0][duration]">
                            </div>
                            <div class="mt-3">
                                <div class="input-group-text" id="basic-addon1">Transits
                                </div>
                                <input type="number" class="deals-repeater form-control"
                                    name="flight_deals[0][transits]">
                            </div>
                            <div class="mt-3">
                                <div class="input-group-text" id="basic-addon1">Cost </div>
                                <input type="number" class="deals-repeater form-control" name="flight_deals[0][cost]">
                            </div>
                        </div>
                        {{-- <div>
                                <button class="btn btn-danger best-flights-remove">Remove</button>
                            </div> --}}
                    </div>

                @endif

                <div id="deal-container"></div>
                {{-- Best Flight Deals  --}}
                <div class="mb-3">
                    <label class="input-group-text" id="basic-addon1">FAQS</label>
                    <button class="input-group-text ml-4 btn btn-success add-faq"> <i class="fa fa-plus"></i> Add</button>
                </div>
                <div class="mb-3">
                    @if ($contains)
                        @foreach ($faqs as $j => $q)
                            <div class="w-75 card faqs-repeater">
                                <div>
                                    <div class="input-group-text" id="basic-addon1">Question</div>
                                    <input type="text" class="form-control faq-repeater"
                                        name="faq[{{ $j }}][question]" value="{{ $q->question }}">
                                </div>
                                <div>
                                    <div class="input-group-text" id="basic-addon1">Answer</div>
                                    <input type="text" class="form-control faq-repeater"
                                        name="faq[{{ $j }}][answer]" value="{{ $q->answer }}">
                                </div>
                                <button class="btn btn-danger remove-faq w-25 mt-3">Remove</button>
                            </div>
                        @endforeach
                        <div id="faq-container" class="mb-3"></div>
                    @else
                        <div class="w-75 card ">
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
                    @endif

                    <div class="mb-3">
                        <div class="d-flex">
                            <span class="input-group-text" id="basic-addon1">Meta Title <span class="text-danger">*</span></span>
                            @if ($contains)
                                <input type="text" class="form-control  w-50" name="seo_title" value="{{ $flight->seo_title }}">
                            @else
                                <input type="text" class="form-control  w-50" name="seo_title" value="{{ old('seo_title') }}">
                            @endif
    
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex">
                            <span class="input-group-text" id="basic-addon1">Meta Keywords <span class="text-danger">*</span></span>
                            @if ($contains)
                                <textarea type="text" class="form-control w-50" name="seo_keywords">{{ $flight->seo_keywords }}</textarea>
                            @else
                                <textarea type="text" class="form-control  w-50" name="seo_keywords">{{ old('seo_keywords') }} </textarea>
                            @endif
    
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex">
                            <span class="input-group-text" id="basic-addon1">Meta Description <span class="text-danger">*</span></span>
                            @if ($contains)
                                <textarea type="text" class="form-control w-50" name="seo_description">{{ $flight->seo_description }}</textarea>
                            @else
                                <textarea type="text" class="form-control  w-50" name="seo_description">{{ old('seo_description') }} </textarea>
                            @endif
    
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex">
                            @if ($contains)
                                <div>
                                    <label class="input-group-text" id="basic-addon1">Best Destinations
                                    </label>

                                    <input type="checkbox" class="ml-1" name="category[]"
                                        style="zoom: 1.4;cursor:pointer" value="top_destination"
                                        @if ($flight->category == 'top_destination' || $flight->category == 'both') checked @endif>
                                </div>
                                <div class="ml-3">
                                    <label class="input-group-text" id="basic-addon1">Top Selling
                                    </label>
                                    <input type="checkbox" class="ml-1" style="zoom: 1.4;cursor:pointer"
                                        name="category[]" value="top_selling"
                                        @if ($flight->category == 'top_selling' || $flight->category == 'both') checked @endif>
                                </div>
                            @else
                                <div>
                                    <label class="input-group-text" id="basic-addon1">Best Destinations
                                    </label>

                                    <input type="checkbox" class="ml-1" name="category[]"
                                        style="zoom: 1.4;cursor:pointer" value="top_destination" checked>
                                </div>
                                <div class="ml-3">
                                    <label class="input-group-text" id="basic-addon1">Top Selling
                                    </label>
                                    <input type="checkbox" class="ml-1" style="zoom: 1.4;cursor:pointer"
                                        name="category[]" value="top_selling">
                                </div>
                            @endif

                        </div>
                    </div>
                    <div class="mb-3 d-flex">
                        <label class="input-group-text" id="basic-addon1">Publish
                        </label>
                        @if ($contains)
                            <input type="checkbox" class="ml-1" style="zoom: 1.4;cursor:pointer" value="publish"
                                name="publish" @if ($flight->publish) checked @endif>
                        @else
                            <input type="checkbox" class="ml-1" style="zoom: 1.4;cursor:pointer" value="publish"
                                name="publish">
                        @endif

                    </div>
                    <div class="mb-3 d-flex">
                        <label class="input-group-text" id="basic-addon1">Sort Order
                        </label>
                        @if ($contains)
                            <input type="number" class="ml-1" style="zoom: 1.4;cursor:pointer" name="sort_order"
                                value="{{ $flight->sort_order }}">
                        @else
                            <input type="number" name="sort_order" class="ml-1" style="zoom: 1.4;cursor:pointer">
                        @endif

                    </div>

                    <div>
                        @if ($contains)
                            <button class="btn btn-success">Update</button>
                        @else
                            <button class="btn btn-success">Save</button>
                        @endif
                    </div>
            </form>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        $(document).ready(function() {

            @if (!empty($faqs))
                var faqsData = @json($faqs);
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
                // if (!valid) {
                //     alert("Please input all feilds to add another flight deal");
                // } else {


                // }
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
