<div class="col-md-7 fw-600 font-20 d-none d-lg-block">Filters</div>
<div class="col-md-5 sort-by">
    <span>Sory By</span>
    <select class="sort w-25 js-example-basic-single" name="sort" id="drop_down_sort">
        <option value="recent">Recent</option>
        <option value="old">Old</option>

    </select>
</div>
</div>
<div class="row mt-40 justify-content-between content-wrapper filter-main-wrapper">
    <div class="responsive-filter-bar" id="filter-btn">
        <svg viewBox="0 0 24 24" width="24" height="24" stroke="#fff" stroke-width="2" fill="none"
            stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
        </svg>
        <span class="d-inline-block mx-4 font-18">Filter</span>
        <svg viewBox="0 0 24 24" width="24" height="24" stroke="#fff" stroke-width="2" fill="none"
            stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
            <polyline points="18 15 12 9 6 15"></polyline>
        </svg>
    </div>
    <form class="row filter-content-wrapper  pb-40" method="GET" id="trip-filter" novalidate>
        <div id="close-filter" class="pointer text-end">
            <svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="2" fill="none"
                stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </div>
        <input type="hidden" name="query" value="{{ request()->get('query') }}" />
        <div class="col-12 filter-wrapper sidebar">
            <div class="select-filter filter-item">
                <select name="activity_id" id="activity" class="">
                    <!-- for placeholder -->
                    <option></option>
                    <!-- for placeholder -->
                    @foreach ($activities as $a)
                        <option value="{{ $a->id }}" @if (request()->get('activity_id') == $a->id) selected @endif>
                            {{ $a->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="select-filter filter-item">
                <select name="destination" id="destination" class=" from js-example-basic-single js-example-responsive">
                    <!-- for placeholder -->
                    <option></option>
                    <!-- for placeholder -->
                    @foreach ($destination as $d)
                        <option value="{{ $d->id }}" @if (request()->get('destination') == $d->id) selected @endif>
                            {{ $d->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="select-filter filter-item">
                <select name="style" id="styles" class=" from js-example-basic-single js-example-responsive">
                    <!-- for placeholder -->
                    <option></option>
                    <!-- for placeholder -->
                    @foreach ($style as $s)
                        <option value="{{ $s->slug }}" @if (request()->get('style') == $s->slug) selected @endif>
                            {{ $s->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="filter-container filter-item price range-slider">
                <div class="heading">
                    <span>Price</span>
                </div>
                <div class="content ">
                    <div id="slider-range"></div>
                    <div class="min-max-wrapper">
                        <div class="min caption">
                            <label for="">Min</label>
                            <span id="slider-range-value1" type="number" name="price" value="0"></span>
                        </div>
                        <div class="min">
                            <label for="">Max</label>
                            <span id="slider-range-value2" type="number" name="price" value="0"></span>
                        </div>
                    </div>
                    <input type="hidden" name="min-value-price" id="min-value-price" value="">
                    <input type="hidden" name="max-value-price" id="max-value-price" value="">
                </div>
            </div>
            <div class="filter-container filter-item duration price range-slider">
                <div class="heading">
                    <span>Duration</span>
                </div>
                <div class="content ">
                    <div id="slider-duration"></div>
                    <div class="min-max-wrapper">
                        <div class="min caption">
                            <label for="">Min</label>
                            <span id="slider-duration-value1" type="number" name="duration" value="0"></span>
                        </div>
                        <div class="min">
                            <label for="">Max</label>
                            <span id="slider-duration-value2" type="number" name="duration" value="0"></span>
                        </div>
                    </div>
                    <input type="hidden" name="min-value-duration" id="min-value-duration" value="">
                    <input type="hidden" name="max-value-duration" id="max-value-duration" value="">

                </div>
            </div>
        </div>
        @if (!empty(request()->get('activity_id')) ||
            !empty(request()->get('destination')) ||
            !empty(request()->get('style')))
            <div class="col-md-7 applied-filter mt-32">
                <span>
                    Applied filters :
                </span>
                <div class="item">

                    @foreach ($activities as $a)
                        @if (request()->get('activity_id') == $a->id)
                            {{ $a->title }}
                        @endif
                    @endforeach
                </div>
                <div class="item">
                    @foreach ($destination as $d)
                        @if (request()->get('destination') == $d->id)
                            {{ $d->title }}
                        @endif
                    @endforeach
                </div>
                <div class="item">
                    @foreach ($style as $s)
                        @if (request()->get('style') == $s->slug)
                            {{ $s->slug }}
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
        <div class="col-md-12 mt-32 btn-wrapper text-md-end">
            <button class="btn text-danger" id="resetSearchFilter">Clear All</button>
            <button class="btn btn-primary btnSubmit" type="submit" id="btn-filter-submit">Submit
                <span class="spinner-border spinner-border-md" id="ajaxLoader"></span>
            </button>
        </div>
    </form>
</div>
