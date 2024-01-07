@extends('website::layouts.master')

@section('content')
    {{-- <section class="breadcrumb-section with-text bg-white bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 breadcrumb-wrapper">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('website.home') }}">
                                    <svg width="14" height="15" viewBox="0 0 14 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_266_1654)">
                                            <path
                                                d="M13.7899 7.73344L7.75241 1.69906L7.34772 1.29438C7.25551 1.20278 7.13082 1.15137 7.00085 1.15137C6.87087 1.15137 6.74618 1.20278 6.65397 1.29438L0.211783 7.73344C0.117301 7.82755 0.0426296 7.93964 -0.00782254 8.06309C-0.0582747 8.18653 -0.0834854 8.31884 -0.0819665 8.45219C-0.0757165 9.00219 0.382096 9.44125 0.932096 9.44125H1.59616V14.5303H12.4055V9.44125H13.0837C13.3508 9.44125 13.6024 9.33656 13.7915 9.1475C13.8846 9.05471 13.9583 8.94437 14.0085 8.82287C14.0586 8.70137 14.0842 8.57113 14.0837 8.43969C14.0837 8.17406 13.979 7.9225 13.7899 7.73344ZM7.87585 13.4053H6.12585V10.2178H7.87585V13.4053ZM11.2805 8.31625V13.4053H8.87585V9.84281C8.87585 9.4975 8.59616 9.21781 8.25085 9.21781H5.75085C5.40553 9.21781 5.12585 9.4975 5.12585 9.84281V13.4053H2.72116V8.31625H1.22116L7.00241 2.53969L7.36335 2.90063L12.7821 8.31625H11.2805Z"
                                                fill="#899098" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_266_1654">
                                                <rect width="14" height="14" fill="white"
                                                    transform="translate(0 0.84375)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page"><a
                                    href="{{ route('website.blog.index') }}">Blogs</a></li>
                            {{-- <li class="breadcrumb-item active" aria-current="page"><a
                                    href="{{ route('website.blog.detail', $post->slug) }}">{{ $post->title }}</a></li> --}}
                                    {{-- <li class="breadcrumb-item active" aria-current="page"> --}}
                                        {{-- <a
                                        href="{{ route('website.blog.detail', $post->slug) }}"> --}}
                                        {{ $post->title }}
                                    {{-- </a> --}}
                                    
                                    {{-- </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div> --}}
    {{-- </section>  --}}


    <section class="blog-detail-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 featured-img">
                    @if ($post->getCoverImage())
                        <img src="{{ asset('ruploads/' . $post->getCoverImage()) . pages_parallax() }}" class="jumbo-img"
                            alt="jumbo-img">
                    @endif
                </div>

                <section class="breadcrumb-section with-text bg-white bg-light">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 breadcrumb-wrapper">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('website.home') }}">
                                                <svg width="14" height="15" viewBox="0 0 14 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_266_1654)">
                                                        <path
                                                            d="M13.7899 7.73344L7.75241 1.69906L7.34772 1.29438C7.25551 1.20278 7.13082 1.15137 7.00085 1.15137C6.87087 1.15137 6.74618 1.20278 6.65397 1.29438L0.211783 7.73344C0.117301 7.82755 0.0426296 7.93964 -0.00782254 8.06309C-0.0582747 8.18653 -0.0834854 8.31884 -0.0819665 8.45219C-0.0757165 9.00219 0.382096 9.44125 0.932096 9.44125H1.59616V14.5303H12.4055V9.44125H13.0837C13.3508 9.44125 13.6024 9.33656 13.7915 9.1475C13.8846 9.05471 13.9583 8.94437 14.0085 8.82287C14.0586 8.70137 14.0842 8.57113 14.0837 8.43969C14.0837 8.17406 13.979 7.9225 13.7899 7.73344ZM7.87585 13.4053H6.12585V10.2178H7.87585V13.4053ZM11.2805 8.31625V13.4053H8.87585V9.84281C8.87585 9.4975 8.59616 9.21781 8.25085 9.21781H5.75085C5.40553 9.21781 5.12585 9.4975 5.12585 9.84281V13.4053H2.72116V8.31625H1.22116L7.00241 2.53969L7.36335 2.90063L12.7821 8.31625H11.2805Z"
                                                            fill="#899098" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_266_1654">
                                                            <rect width="14" height="14" fill="white"
                                                                transform="translate(0 0.84375)" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                Home
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page"><a
                                                href="{{ route('website.blog.index') }}">Blogs</a></li>
                                        {{-- <li class="breadcrumb-item active" aria-current="page"><a
                                                href="{{ route('website.blog.detail', $post->slug) }}">{{ $post->title }}</a></li> --}}
                                                <li class="breadcrumb-item active" aria-current="page">
                                                    {{-- <a
                                                    href="{{ route('website.blog.detail', $post->slug) }}"> --}}
                                                    {{ $post->title }}
                                                {{-- </a> --}}
                                                
                                                </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="col-12 detail-header pt-40 pb-4 mb-40">
                    <div class="col-md-9">

                        <h1>{!! $post->title !!}</h1>
                        <div class="info-wrapper">
                            <div class="info">
                                <p>written on {{ $post->created_at->format('d M Y') }}</p>
                                <p><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_97_2164)">
                                            <path
                                                d="M10 17.5C14.1421 17.5 17.5 14.1421 17.5 10C17.5 5.85786 14.1421 2.5 10 2.5C5.85786 2.5 2.5 5.85786 2.5 10C2.5 14.1421 5.85786 17.5 10 17.5Z"
                                                stroke="#353535" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M10 5.83334V10L12.5 12.5" stroke="#353535" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_97_2164">
                                                <rect width="20" height="20" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>{{ \Illuminate\Support\Str::readDuration($post->text) }} Minutes Read</p>
                            </div>
                            <div class="social">
                                <ul>
                                    <li>
                                        <a href="{{ settings()->get('facebook_link') }}"><i
                                                class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{ settings()->get('instagram_link') }}"> <i
                                                class="fab fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{ settings()->get('twitter_link') }}"><i
                                                class="fab fa-twitter"></i></i></a>
                                    </li>
                                    <li>
                                        <a href="{{ settings()->get('linkedin_link') }}"><i
                                                class="fab fa-linkedin"></i></i></a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-9 content-wrapper ">
                    <div class="text-content">
                        {!! html_entity_decode($post->body) !!}

                    </div>

                    <div class="row comment-section py-40">
                        <div class="col-12 mb-4 header d-flex justify-content-between align-items-center">
                            <h2>Comments</h2>
                        </div>

                        @foreach ($comment as $r)
                            <div class="col-md-12 mb-4 review-card-wrapper">
                                <div class="review-card">
                                    <div class="header mb-3">
                                        @if (!empty($r->getFirstImage()))
                                            <div class="img-div">
                                                <img src="{{ asset('ruploads/' . $r->getFirstImage()) }}?w=78&h=78&fit=crop"
                                                    class="img-responsive" alt="{{ $r->getNameAttribute('dummy') }}">
                                            </div>
                                        @else
                                            <div class="img-div">
                                                <img src="{{ \Avatar::create($r->getNameAttribute('dummy'))->toBase64() }}"
                                                    alt="{{ $r->getNameAttribute('dummy') }}">
                                            </div>
                                        @endif
                                        <div class="info">
                                            <p>{{ $r->full_name }}</p>
                                            <div class="rating-wrapper">
                                                @for ($i = 0; $i < $r->rating_value; $i++)
                                                    <svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M6.31579 0L8.26737 3.94953L12.6316 4.58675L9.47369 7.65931L10.2189 12L6.31579 9.94953L2.41263 12L3.1579 7.65931L0 4.58675L4.36421 3.94953L6.31579 0Z"
                                                            fill="#FAA61A" />
                                                    </svg>
                                                @endfor

                                            </div>
                                        </div>
                                        <div>Wrote a review on {{ $r->created_at->format('d M Y') }}</div>
                                    </div>
                                    {!! $r->review !!}

                                </div>
                            </div>
                        @endforeach

                        <div class="col-12 mt-5">
                            <div class="form-wrapper blog-form-wrapper">
                                <h2 class="font-40 text-tertiary mb-4">Leave a comment</h2>
                                <form action="{{ route('website.review.post', $post->id) }}" method="POST" id="reviewForm">
                                    {{ csrf_field() }}
                                    <input type="hidden" class="form-control" name="title" value="comment">
                                    @auth('customer')
                                        <input type="hidden" name="full_name"
                                            value="{{ auth()->user('customer')->first_name . ' ' . auth()->user('customer')->last_name }}">
                                        <input type="hidden" name="email" value="{{ auth()->user('customer')->email }}">
                                    @endauth
                                    <div class="row">
                                        @guest
                                            <div class="col-md-6 form-group with-icon white-bg">
                                                <div class="input-group @if ($errors->first('full_name')) after-error @endif">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_400_1864)">
                                                            <path
                                                                d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                                                                stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z"
                                                                stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M6.16797 18.849C6.41548 18.0252 6.92194 17.3032 7.61222 16.79C8.30249 16.2768 9.13982 15.9997 9.99997 16H14C14.8612 15.9997 15.6996 16.2774 16.3904 16.7918C17.0811 17.3062 17.5874 18.0298 17.834 18.855"
                                                                stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_400_1864">
                                                                <rect width="24" height="24" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>

                                                    <input type="text" class="form-control"
                                                        value="{{ old('full_name') }}" name="full_name"
                                                        placeholder="Full Name">
                                                    @if ($errors->has('full_name'))
                                                        <label class="error">{{ $errors->first('full_name') }}</label>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group with-icon white-bg">
                                                <div class="input-group @if ($errors->first('email')) after-error @endif">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_400_1874)">
                                                            <path
                                                                d="M19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5Z"
                                                                stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path d="M3 7L12 13L21 7" stroke="#0084D4" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_400_1874">
                                                                <rect width="24" height="24" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>

                                                    <input type="email" class="form-control" value="{{ old('email') }}"
                                                        name="email" placeholder="Email Address">
                                                    @if ($errors->has('email'))
                                                        <label class="error">{{ $errors->first('email') }}</label>
                                                    @endif
                                                </div>
                                            </div>
                                        @endguest
                                        <div class="col-12 form-group">
                                            <div class="input-group @if ($errors->first('review')) after-error @endif">
                                                <textarea placeholder="Enter your comment" name="review" id="" cols="30" rows="10"
                                                    class="form-control">{{ old('review') }}</textarea>
                                                @if ($errors->has('review'))
                                                    <label
                                                        class="error textarea-error
                                                ">{{ $errors->first('review') }}</label>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="btn-wrapper my-4">
                                            <button type="submit" class="btn btn-custom btn-primary"><span>Submit
                                                    Comment</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 blog-sidebar">
                    <div class="side-container mb-4">
                        <p>Categories</p>
                        <ul>
                            @foreach ($categories as $category)
                                <li>
                                    <a
                                        href="{{ route('website.blog.category', ['category' => $category->slug]) }}">{{ $category->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="side-container mb-4">
                        <p>Archive</p>
                        <ul>
                            @foreach ($archives as $archive)
                                <li>
                                    <a
                                        href="{{ route('website.blog.archive', ['archive' => $archive->slug]) }}">{!! $archive->title !!}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (!empty($other_post))

        <section class="our-expression py-100">
            <div class="container">
                <div class="row">
                    <div class="col-12 section-heading columned mb-40">
                        <div class="row">
                            <div class="col-md-8">
                                <h2>You may also like</h2>
                                <p>Our blog where we write much about our opinion and express ourself above everything.</p>
                            </div>
                            <div class="col-md-4 d-flex justify-content-end align-items-center">
                                <a href="{{ route('website.page', 'blog') }}"
                                    class="btn bg-white text-primary btn-transparent btn-custom  bordered"><span>Learn
                                        More</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($other_post as $p)
                            <div class="col-xl-6 mb-4 mb-xl-0 blog-card-wrapper">
                                <a href="{{ route('website.blog.detail', $p->slug) }}" class="blog-card">
                                    <div class="img-div">
                                        <img src="{{ asset('ruploads/' . $p->getCoverImage()) . pages_parallax() }}"
                                            alt="{{ $p->title }}">
                                    </div>
                                    <div class="text-content">
                                        <p class="title">{{ $p->title }}</p>
                                        <p class="desc"> <?php echo substr($p->body, 0, 50); ?></p>
                                        <div>Keep Reading</div>
                                        <span><svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-calendar-minus" width="12"
                                                height="12" viewBox="0 0 24 24" stroke-width="1.5" stroke="#A5A5A5"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <rect x="4" y="5" width="16" height="16"
                                                    rx="2" />
                                                <line x1="16" y1="3" x2="16" y2="7" />
                                                <line x1="8" y1="3" x2="8" y2="7" />
                                                <line x1="4" y1="11" x2="20" y2="11" />
                                                <line x1="10" y1="16" x2="14" y2="16" />
                                            </svg>{{ $p->created_at->format('d M Y') }}
                                        </span>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
    @endif

    @include('website::partials.things-know', ['nepalPosts' => $nepalPostsBlogDetails])


@stop

@section('js')

    <script>
        if ("{{ $errors->any() }}") {
            var elmnt = document.getElementById("reviewForm");
            elmnt.scrollIntoView();
        }
    </script>

@endsection
