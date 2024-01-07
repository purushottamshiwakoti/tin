@if (count($trips) > 0)
    <div id="interested-trips">
        <div class="row heading mt-5 mb-4">
            <div class="col-12 text-center">
                <h5 class="mb-3">Choose the trip(s) you are interested in</h5>
                <p>Below are all the destinations Doko Tour offer.</p>
            </div>

        </div>
        <div class="row packages">


            @foreach ($trips as $k => $r)
                <div class="form-check checkbox-type-2 col-lg-3 col-md-4 col-sm-6">
                    <label class="form-check-label checkbox-label" for="defaultCheck{{ $k + 1 }}">
                        <span class="package-name">{{ $r->title }}</span>
                        <input class="form-check-input travelling" type="checkbox" value="{{ $r->title }}"
                            name="interested[]" id="exampleRadios1">
                        <span class="tick-mark"></span>
                    </label>

                </div>
            @endforeach
        </div>
    </div>
@else
    <div class="col-md-12 col-sm-12 package-item float-left trips text-center">
        <h3>Result not Found</h3>
    </div>
@endif
