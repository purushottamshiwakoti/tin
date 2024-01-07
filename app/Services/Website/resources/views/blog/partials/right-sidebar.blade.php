<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 no-gutter">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 popular-treks-wrapper">
        <h6>Popular Packages</h6>
    </div>
    @if (count($hotDeals))
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 best-deal no-gutter">

            <h6><span>Best Deal </span> for this month</h6>

            <div id="carousel-example-generic-best" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @for ($i = 0; $i < 5; $i++)
                        <li data-target="#carousel-example-generic-best" data-slide-to="{{ $i }}"
                            class="{{ $i == 0 ? 'active' : '' }}"></li>
                    @endfor
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    @foreach ($hotDeals->take(5) as $key => $hotDeal)
                        <div class="item {{ $key == 0 ? 'active' : '' }}">
                            <a href="{{ route('website.trips.detail', ['trip' => $hotDeal->trip->slug]) }}"><img
                                    src="{{ asset('ruploads/' . $hotDeal->trip->getFirstImage()) }}"
                                    alt="{{ $hotDeal->trip->title }}"></a>
                            <div class="carousel-caption">
                                <a href="{{ route('website.trips.detail', ['trip' => $hotDeal->trip->slug]) }}">
                                    <h6>{{ $hotDeal->trip->title }}</h6>
                                </a>
                                <div>
                                    @for ($i = 0; $i < $hotDeal->trip->average_rating; $i++)
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    @endfor
                                    <span>{{ $hotDeal->day_duration }}</span>
                                </div>
                                <div>
                                    <p><del>${{ $hotDeal->price }}</del>${{ $hotDeal->lastminutedeal->deal_price }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>

        </div>
    @endif
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
        <div class="right-trip-panel right-quick-link">
            <h4>Categories</h4>
            <ul>
                @foreach ($categories as $category)
                    <li>
                        <a
                            href="{{ route('website.blog.category', ['category' => $category->slug]) }}">{{ $category->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="right-trip-panel right-quick-link">
            <h4>Archives</h4>
            <ul>
                @foreach ($archives as $archive)
                    <li>
                        <a
                            href="{{ route('website.blog.archive', ['archive' => $archive->slug]) }}">{!! $archive->title !!}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="right-trip-panel subscribe-right">
            <h4>Newsletter</h4>
            <p>Enter your email address below to subscribe to our newsletter</p>
            <form method="post" id="subscribe-form" action="{{ route('website.subscribe.post') }}">
                <fieldset>
                    <div class="">
                        <input id="subemail" name="email" type="email" class="form-control"
                            placeholder="email address">
                    </div>
                    <button href="#" class="btn btn-subscribe">Subscribe Now</button>
                </fieldset>
            </form>
        </div>
        <div class="right-trip-panel tags-right">
            <h4>Tags</h4>
            <ul>
                @foreach ($tags as $tag)
                    <li>
                        <a href="{{ route('website.blog.tag', str_replace(' ', '-', $tag)) }}">{{ $tag }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
