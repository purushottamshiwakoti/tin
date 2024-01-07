    @foreach ($hotDeals as $h)
        <div class="col-12 deals-wrapper mb-4">

            <div class="row">
                <div class="col-md-3 col-sm-6 title">
                    <p>{{ $h->trip->title }}</p>
                </div>

                <div class="col-md-3 col-sm-6 date">
                    <div>
                        <p>{{ $h->trip->duration }} Days</p>
                        <span>{{ $h->start_date->format('d M Y') }} - {{ $h->finish_date->format('d M Y') }}</span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 price">
                    <div>
                        @if (isset($h->lastminutedeal->deal_price))
                            <p>AUD {{ $h->price }}</p>
                            <span>AUD {{ $h->lastminutedeal->deal_price }}</span>
                        @else
                            @if (isset($h->trip->old_price))
                                <p>AUD {{ $h->trip->old_price }}</p>
                            @endif
                            <span>AUD {{ $h->price }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-1 col-sm-6 stock">
                    @if ($h->size > 0 || $h->size != null)
                        <div>
                            <p>({{ $h->size }} slots left)</p>
                            <span>{{ strtoupper($h->availability) }}</span>
                        </div>
                    @else
                        <p>( No slots left)</p>
                        <span>NOT AVAILABLE</span>
                    @endif
                </div>
                <div class="col-md-3 d-flex justify-content-end col-sm-6 button">
                    @if ($h->size > 0 || $h->size != null)
                        <a href="{{ route('website.book.init', ['trip' => $h->trip->slug, 'departure' => $h->id]) }}"
                            class="btn btn-custom btn-primary">
                            <span>
                                Book Now
                            </span>
                        </a>
                    @else
                        <a href="javascript:void(0)" class="btn btn-custom btn-primary">
                            <span>
                                Booking Closed
                            </span>
                        </a>
                    @endif

                </div>
            </div>
        </div>
    @endforeach

    {!! $hotDeals->links() !!}
