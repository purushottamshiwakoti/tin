@extends('website::layouts.master')
@section('content')
    <section class="breadcrumb-section">
        <img src="{{ asset('ruploads/' . $page->getCoverImage()) . pages_parallax() }}" class="jumbo-img"
            alt="blog tag cover image">
        <div class="container position-relative h-100">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('website.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> <a
                                href="{{ route('website.blog.index') }}">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog Tags</li>
                    </ol>
                </nav>
                <div class="col-10 text-content">
                    <h1>{{ $page->title }}</h1>
                    <p>{{ $page->caption }} </p>
                </div>
            </div>
        </div>
    </section>
    <section class="recently-uploaded blog-listings">
        <div class="container">
            <div class="row">
                <h1>{{ $page->title }}</h1>
                <p>{!! $page->page_description !!} </p>
                <div class="col-12 heading">
                    <h2>Recently Uploaded</h2>
                </div>
            </div>

            <div class="row recent-list-wrapper">
                @foreach ($recentlyUploaded as $r)
                    <div class="col-md-6 country-card-wrapper">
                        <a href="#" class="d-block country-card">
                            <div class="overlay"></div>
                            <img src="{{ asset('ruploads/' . $r->getCoverImage()) . pages_parallax() }}"
                                class="{{ $r->slug }}" alt="{{ $r->title }}">
                            <div class="name">
                                <h4>{{ $r->title }}</h4>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <section class="package-listings blog-listings py-80">
        <div class="container">
            <div class="row mt-120 justify-content-between content-wrapper">

                <div class="col-md-3 sidebar">
                    <div class="filter-container mb-60 search">
                        <div class="heading">
                            <h4>Search</h4>
                        </div>
                        <div class="content">
                            <form action="#" id="search_form">
                                <div class="input-group">
                                    <i class="fal fa-search"></i>
                                    <input type="text" name="query" class="form-control" id="query" />
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="filter-container mb-60 categories">
                    <div class="heading">
                        <h4>Categories</h4>
                    </div>
                    <div class="content">
                        <ul>
                            @foreach ($categories as $category)
                                <li>
                                    <a
                                        href="{{ route('website.blog.category', ['category' => $category->slug]) }}">{{ $category->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="filter-container mb-60 categories archives">
                    <div class="heading">
                        <h4>Archives</h4>
                    </div>
                    <div class="content">
                        <ul>
                            @foreach ($archives as $archive)
                                <li>
                                    {{-- {{dd($archive)}} --}}
                                    <a
                                        href="{{ route('website.blog.archive', ['archive' => $archive->slug]) }}">{!! $archive->title !!}</a>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                </div>
                <div class="filter-container mb-60 tags">
                    <div class="heading">
                        <h4>Tags</h4>
                    </div>
                    <div class="content">
                        <ul>
                            @foreach ($tags as $tag)
                                <li>
                                    <a
                                        href="{{ route('website.blog.tag', str_replace(' ', '-', $tag)) }}">{{ $tag }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="filter-container mb-60 plan-trip">
                    <h4>Get exclusive Discounts and Offers on your first Trip! </h4>
                    <span>
                        Are you ready to Travel?
                    </span>
                    <a href="{{ route('website.page', 'trip-planner') }}" class="btn btn-secondary">Plan my trip</a>
                </div>
            </div>
            <div class="col-md-8 listings-wrapper blog-search" id="blog-search">
                <div class="row">

                    @foreach ($posts as $p)
                        <div class="col-md-6 blog-card-two-wrapper">
                            <div class="blog-card">
                                <a href="{{ route('website.blog.detail', $p->slug) }}" class="img-div d-block">
                                    <img src="{{ asset('ruploads/' . $p->getCoverImage()) . pages_parallax() }}"
                                        alt="{{ $p->title }}">
                                </a>
                                <div class="text-content">
                                    <a href="{{ route('website.blog.detail', $p->slug) }}" class="title">
                                        {{ $p->title }}
                                    </a>
                                    <div class="info d-flex">
                                        <span><i
                                                class="fal fa-clock"></i>{{ \Illuminate\Support\Str::readDuration($p->text) }}
                                            Minutes Read</span>
                                        <span>written on {{ $p->created_at->format('d M Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </section>
    @include('website::partials.newletter')
@stop
@section('js')
    <script  >
        jQuery(function() {
            $(document).ready(function() {

                $('#loader').hide();
                $(".blog-results").css("opacity", "1");
                $('#search_form').on('submit', function(e) {
                    $('#loader').show();
                    e.preventDefault();

                    $.ajax({
                        url: "{{ route('website.blog.search') }}" + '?query=' + $('#query')
                            .val(),
                        method: 'get',
                        // data: {'date':p1},
                        dataType: 'text',
                        beforeSend: function() {
                            $('#blog-search').html('');
                            $('#loader').show();
                        },
                        complete: function() {
                            $('#loader').hide();
                            $("#blog").css("opacity", "1");
                        },
                        success: function(response) {
                            $('#loader').hide();
                            $(".blog-results").css("opacity", "1");
                            $('#blog-search').html(response);
                        }
                    });
                })
            });
        });
    </script>
@stop
