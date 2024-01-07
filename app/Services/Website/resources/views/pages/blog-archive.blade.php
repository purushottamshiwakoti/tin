@extends('website::layouts.master')
@section('content')
   
<section class="mt-80 breadcrumb-section with-text bg-white bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 breadcrumb-wrapper">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('website.home')}}">
                                <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_266_1654)">
                                        <path d="M13.7899 7.73344L7.75241 1.69906L7.34772 1.29438C7.25551 1.20278 7.13082 1.15137 7.00085 1.15137C6.87087 1.15137 6.74618 1.20278 6.65397 1.29438L0.211783 7.73344C0.117301 7.82755 0.0426296 7.93964 -0.00782254 8.06309C-0.0582747 8.18653 -0.0834854 8.31884 -0.0819665 8.45219C-0.0757165 9.00219 0.382096 9.44125 0.932096 9.44125H1.59616V14.5303H12.4055V9.44125H13.0837C13.3508 9.44125 13.6024 9.33656 13.7915 9.1475C13.8846 9.05471 13.9583 8.94437 14.0085 8.82287C14.0586 8.70137 14.0842 8.57113 14.0837 8.43969C14.0837 8.17406 13.979 7.9225 13.7899 7.73344ZM7.87585 13.4053H6.12585V10.2178H7.87585V13.4053ZM11.2805 8.31625V13.4053H8.87585V9.84281C8.87585 9.4975 8.59616 9.21781 8.25085 9.21781H5.75085C5.40553 9.21781 5.12585 9.4975 5.12585 9.84281V13.4053H2.72116V8.31625H1.22116L7.00241 2.53969L7.36335 2.90063L12.7821 8.31625H11.2805Z" fill="#899098" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_266_1654">
                                            <rect width="14" height="14" fill="white" transform="translate(0 0.84375)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                Home
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"> <a href="{{ route('website.blog.index') }}"> Blogs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog Archive</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="blogs-wrapper bg-light pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12 section-heading mb-40">
                <h1>Our expression through words</h1>
                <p>Our blog where we write much about our opinion and express ourself above everything.</p>
            </div>
            <div class="col-md-9 blog">
                <div class="row">
                    @foreach($posts as $p)

                    <div class="col-xl-12 mb-4 mb-xl-0 blog-card-wrapper full-width mb-4">
                        <a href="{{route('website.blog.detail',$p->slug)}}" class="blog-card">
                            <div class="img-div">
                                <img src="{{ asset('ruploads/'.$p->getCoverImage()).pages_parallax()}}" alt="{{$p->title}}">
                            </div>
                            <div class="text-content">
                                <p class="title">{{$p->title}}
                                </p>
                                <p class="desc"> <?php echo substr(strip_tags($p->body),0,50) ?></p>
                                <div>Keep Reading</div>
                                <span><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-minus" width="12" height="12" viewBox="0 0 24 24" stroke-width="1.5" stroke="#A5A5A5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <rect x="4" y="5" width="16" height="16" rx="2" />
                                        <line x1="16" y1="3" x2="16" y2="7" />
                                        <line x1="8" y1="3" x2="8" y2="7" />
                                        <line x1="4" y1="11" x2="20" y2="11" />
                                        <line x1="10" y1="16" x2="14" y2="16" />
                                    </svg>{{ $p->created_at->format('d M Y') }}</span>
                            </div>
                        </a>
                    </div>
                    @endforeach
                   
                   
                 
                </div>
            </div>
            <div class="col-md-3 blog-sidebar">
                <div class="side-container mb-4">
                    <p>Categories</p>
                    <ul>
                        @foreach($categories as $category)
                        <li>
                            <a href="{{ route('website.blog.category',['category'=>$category->slug]) }}">{{ $category->title }}</a>
                        </li>
                        @endforeach
                        
                    </ul>
                </div>
                <div class="side-container mb-4">
                    <p>Archive</p>
                    <ul>
                      
                        @foreach($archives as $archive)
                        <li>
                            <a href="{{route('website.blog.archive',['archive'=>$archive->slug])}}">{!! $archive->title !!}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="side-container newsletter">
                    <p class="text-tertiary">{{settings()->get('newsletter_title')}}</p>
                    <span>{{settings()->get('newsletter_subtitle')}}</span>
                    <form id="newletter"  method="post" onsubmit="return false" novalidate>
                        {!! csrf_field() !!}                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <div class="input-group">
                                <input type="text"  name="email" class="form-control">
                               
                            </div>
                        </div>
                        <button type="submit" class="btn btn-custom btn-primary">Submit
                            <span class="spinner-border spinner-border-md" style="display:none"
                            id="ajaxLoader"></span>
                        </button>  
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

@include('website::partials.things-know',['nepalPosts'=>$nepalPosts])


@stop
@section('js')



@stop