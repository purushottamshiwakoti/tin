<section class="to-know py-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <div class="row">
                    <div class="section-heading col-12 mb-40">

                        <h2>{{ settings()->get('nepal_blog_title') }}</h2>
                        {!! settings()->get('nepal_blog_description') !!}
                    </div>
                    @foreach ($nepalPosts as $p)
                        <div class="col-md-3 mb-md-0 mb-4 col-6 travel-card-wrapper type-two">
                            <a href="{{ route('website.page', $p->slug) }}" class="travel-card d-block">
                                <div class="img-div">
                                    <img src="{{ asset('ruploads/' . $p->getCoverImage()) . pages_parallax() }}?w=360&h=404&fit=crop"
                                        alt="{{ $p->title }}">
                                </div>
                                <p>{{ $p->title }}</p>
                            </a>
                        </div>
                    @endforeach

                    <div class="mt-5 col-12 btn-wrapper d-flex justify-content-center">
                        <a href="{{ route('website.pages.index') }}"
                            class="btn text-primary btn-transparent btn-custom  bordered "><span>Explore More
                                Deals</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
