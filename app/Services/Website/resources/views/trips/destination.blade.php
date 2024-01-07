@extends('website::layouts.master')

@section('content')
<section class="country-detail welcome p-0">
    <img src="{{ asset('ruploads/'.$destination->getCoverImage())}}?w=1680&h=408&fit=crop" class="destination">

    <div class="container text-content">
        <h2 class="font-40">{{$destination->title}}</h2>        
        <span>{{$destination->caption}}</span>
    </div>
</section>

<section class="country-detail text-content py-80">
    <div class="container">
        <div class="row">
            <div class="col-12 heading">
                <span>{{$destination->title}}</span>
                <h1>{{$destination->caption}}</h1>
            </div>
            {!!$destination->description!!}
        </div>
    </div>
</section>


@if(count($activities)>0)
<section class="home experience mb-4">
    <div class="container">
        <div class="row ">
            <div class="col-12 section-heading text-center mb-40">
                <h2>Experiences in {{$destination->title}}</h2>
            </div>
            @foreach($activities as $a)
            <div class="col-xl-2 col-lg-3 col-md-4 col-6 experience-card-wrapper">
                <div class="experience-card">
                    <a href="{{route('website.destination-activities.detail',['destination'=>$destination->slug,'activity'=>$a->slug])}}">
                    <span>{{$a->title}}</span>
                    <span>{{$a->getTripCountAttribute()}} Packages</span>
                </a>
                </div>
            </div>
            @endforeach
           
        </div>
    </div>
</section>
@endif

@if(count($trips)>0)
<section class="package-listings bg-white search-page pt-40">
    <div class="container">
        <div class="row align-items-center search-bar-wrapper">
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
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="#fff" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                <span class="d-inline-block mx-4 font-18">Filter</span> 
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="#fff" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="18 15 12 9 6 15"></polyline></svg>
            </div>
            <form class="row filter-content-wrapper  pb-40" id="trip-filter" method="GET" action="{{route('website.trips.search')}}">
                <div id="close-filter" class="pointer text-end">
                    <svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </div>
                <div class="col-12 filter-wrapper sidebar">
                    <div class="select-filter filter-item">
                        <select name="activity_id" id="activity" class="">
                            <!-- for placeholder -->
                            <option></option>
                            <!-- for placeholder -->
                            @foreach($activitie as $a)
                            <option value="{{$a->id}}" @if(request()->get('activity_id')==$a->id) selected @endif >{{$a->title}}</option>
                           @endforeach
                        </select>
                    </div>
                    
                    <div class="select-filter filter-item">
                        <select name="style" id="styles" class=" from js-example-basic-single js-example-responsive">
                            <!-- for placeholder -->
                            <option></option>
                            <!-- for placeholder -->
                            @foreach($style as $s)
                            <option value="{{$s->slug}}" @if(request()->get('style')==$s->slug) selected @endif>{{$s->title}}</option>
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
                                    <span id="slider-range-value1" type="number" name="price"  value="0"></span>
                                </div>
                                <div class="min">
                                    <label for="">Max</label>
                                    <span id="slider-range-value2" type="number" name="price"   value="0"></span>
                                </div>
                            </div>
                            <input type="hidden" name="min-value-price"  id ="min-value-price" value="">
                            <input type="hidden" name="max-value-price"  id ="max-value-price" value="">
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
                                    <span id="slider-duration-value1" type="number" name="duration"   value="0"></span>
                                </div>
                                <div class="min">
                                    <label for="">Max</label>
                                    <span id="slider-duration-value2" type="number"  name="duration"   value="0"></span>
                                </div>
                            </div>
                            <input type="hidden" name="min-value-duration" id ="min-value-duration" value="">
                            <input type="hidden" name="max-value-duration" id ="max-value-duration" value="">
            
                        </div>
                    </div>
                </div>
                @if(!empty(request()->get('activity_id')) || !empty(request()->get('style')) )

                <div class="col-md-7 applied-filter mt-32">
                    <span>
                        Applied filters :
                    </span>
                    <div class="item">
                        
                        @foreach($activities as $a)
                         @if(request()->get('activity_id')==$a->id) {{$a->title}}@endif
                       @endforeach
                    </div>
                    
                    <div class="item">
                        @foreach($style as $s)
                         @if(request()->get('style')==$s->slug) {{$s->slug}} @endif
                       @endforeach
                    </div>
                </div>
                @endif
                <div class="col-md-12 mt-32 btn-wrapper text-md-end">
                    <button class="btn text-danger" id="resetSearchFilter">Clear All</button>
                    <button class="btn btn-primary btnSubmit" type="submit" id="btn-filter-submit">Submit
                        <span class="spinner-border spinner-border-md"
                        id="ajaxLoader"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endif

@if(count($trips)>0)
<section class="search-page listings pb-80">
    <div class="container">
        <div class="col-12 listings-wrapper pt-40">
            <div class="row trip-results">
                @foreach($trips->take('9') as $trip)
                
                <div class="col-lg-4 col-md-6 package-card-wrapper trips-container">
                    <span style="display: none" class="trip-created">{{$trip->created_at}}</span>

                    <div class="package-card">
                        <a href="{{route('website.trips.detail',$trip->slug)}}" class="img-div d-block">
                            <img src="{{ asset('ruploads/'.$trip->getFirstImage()).pages_parallax()}}" alt="{{$trip->slug}}">
                        </a>
                        <div class="text-content">
                            <div class="tags">
                                <ul>
                                    @foreach($trip->travelStyles as $style)
                                    <li><a href="http://tan.com/tan/public/pages/trips?style={{$style->slug}}">{{$style->title}}</a></li>
                                @endforeach
                                </ul>
                            </div>
                            <a href="{{route('website.trips.detail',$trip->slug)}}" class="title">
                                {{$trip->title}}
                            </a>
                            <div class="info d-flex justify-content-between">
                                <div class="ratings">
                            
                               
                                    @for($i = 0;$i<$trip->average_rating;$i++)
                                     <img src="{{ public_asset('website/img/star-icon.svg') }}" alt="star">
                                     @endfor
                                    
                                     
                                     @if($trip->average_rating !=0)
                                     <span> {{number_format($trip->average_rating,1) }}</span>
                                     @endif
                                 </div>
                                <div class="days">
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_2512_9543)">
                                            <path
                                                d="M5.64717 12.0001C5.41532 11.9693 5.18255 11.9489 4.9535 11.9051C3.05312 11.5402 1.63227 10.506 0.703963 8.81271C0.137855 7.78037 -0.0762979 6.66331 0.0233297 5.48946C0.0968865 4.61816 0.354801 3.80177 0.788693 3.04217C0.809177 3.0068 0.855732 2.98539 0.890183 2.9584C0.895769 2.95374 0.90508 2.95467 0.912529 2.95281C1.01123 2.93047 1.10992 2.90906 1.21886 2.90161C1.0913 3.00401 0.962808 3.10641 0.82873 3.21439C1.00378 3.34006 1.15741 3.44711 1.38832 3.4499C1.83152 3.45456 2.25704 3.36426 2.68534 3.28513C2.79614 3.26466 2.85759 3.28141 2.91718 3.3866C3.07361 3.66121 3.24772 3.92558 3.4088 4.1974C3.44232 4.25418 3.46281 4.32679 3.46467 4.39288C3.47119 4.63864 3.46281 4.88532 3.47026 5.13107C3.47212 5.19903 3.4954 5.27722 3.53543 5.33214C3.7738 5.6654 4.02147 5.99214 4.26076 6.32447C4.3129 6.39707 4.36691 6.43617 4.47119 6.39801C4.47119 6.28909 4.47119 6.1718 4.47119 6.05451C4.47957 6.05265 4.48795 6.05172 4.49633 6.04986C4.58199 6.22765 4.67137 6.40266 4.75052 6.58325C4.78497 6.66331 4.83152 6.70427 4.91718 6.72195C5.17696 6.77501 5.43581 6.83087 5.69372 6.8951C5.76076 6.91185 5.83152 6.95002 5.88087 6.99842C6.09968 7.21346 6.29056 7.46759 6.66299 7.46759C6.58385 7.63329 6.51867 7.7692 6.45536 7.9051C6.38925 8.04567 6.27286 8.18809 6.27473 8.32866C6.27659 8.46456 6.39205 8.6042 6.47398 8.7308C6.73748 9.14038 6.82035 9.61234 6.95443 10.0675C6.96467 10.102 6.95443 10.1448 6.94512 10.182C6.8846 10.4362 6.83618 10.695 6.75517 10.9416C6.66486 11.2181 6.71979 11.4899 6.73562 11.7645C6.73934 11.8223 6.74493 11.879 6.74959 11.9423C6.59502 11.9619 6.44884 11.9805 6.30359 11.9991C6.08478 12.0001 5.86597 12.0001 5.64717 12.0001Z"
                                                fill="black" />
                                            <path
                                                d="M12 6.25646C11.9702 6.51152 11.9525 6.76844 11.9078 7.02071C11.6909 8.25134 11.1434 9.31533 10.2654 10.2053C9.49068 10.99 8.56703 11.5187 7.49999 11.798C7.47764 11.8036 7.4553 11.8082 7.4134 11.8166C7.47392 11.6221 7.47392 11.4284 7.68342 11.3111C7.95157 11.1603 8.20111 10.977 8.45343 10.8001C8.5093 10.761 8.55586 10.6958 8.58286 10.6325C8.65735 10.4566 8.71321 10.2732 8.78677 10.0973C8.80818 10.0461 8.85474 9.99302 8.90316 9.96788C9.08379 9.87573 9.27001 9.79567 9.45343 9.70724C9.48975 9.68955 9.53165 9.66348 9.54934 9.62997C9.76721 9.22038 9.98137 8.80893 10.1992 8.3919C10.1667 8.37049 10.1397 8.35001 10.1108 8.33232C9.9972 8.26437 9.88546 8.1899 9.76721 8.13218C9.33519 7.92087 8.97857 7.62206 8.68528 7.2404C8.64897 7.19292 8.57262 7.165 8.51023 7.14917C8.34822 7.10914 8.18249 7.08122 8.01861 7.04677C7.73649 6.98813 7.45623 6.91645 7.17038 6.87735C7.05865 6.86246 6.93202 6.90714 6.82122 6.9481C6.68621 6.99837 6.58658 6.98906 6.50651 6.85781C6.40409 6.69025 6.24208 6.61112 6.04375 6.58692C6.0512 6.43612 6.05865 6.29369 6.0661 6.15313C5.83146 6.10845 5.63965 6.14661 5.51489 6.40074C5.46926 6.20898 5.43295 6.05539 5.39478 5.89341C5.54096 5.8236 5.67969 5.75471 5.82215 5.69234C5.84915 5.68024 5.89105 5.68862 5.91992 5.70072C6.03072 5.74819 6.13686 5.81149 6.25045 5.84873C6.3445 5.87852 6.44692 5.88224 6.54654 5.88969C6.5661 5.89155 6.60427 5.85711 6.60613 5.83756C6.63127 5.52478 6.85753 5.33209 7.02699 5.10123C7.2607 4.78101 7.54654 4.53898 7.91712 4.39283C8.08658 4.32581 8.24021 4.19362 8.4134 4.16476C8.58658 4.13591 8.77466 4.19828 8.95437 4.22062C9.05306 4.02886 9.04468 3.9609 8.90502 3.81848C8.82587 3.73749 8.75045 3.65185 8.66572 3.57738C8.41247 3.3549 8.216 3.09239 8.09403 2.77682C8.06424 2.69862 8.01675 2.66977 7.93481 2.67815C7.75511 2.69769 7.60055 2.64277 7.43481 2.56458C7.27187 2.48825 7.07355 2.48731 6.88174 2.45194C6.84263 2.66791 6.80539 2.86991 6.76628 3.08308C6.56424 3.04491 6.36964 3.01047 6.1769 2.96858C6.15176 2.963 6.12289 2.91459 6.1201 2.88387C6.11079 2.77868 6.07634 2.65022 6.12196 2.57296C6.15641 2.51524 6.29887 2.51245 6.39478 2.50221C6.53072 2.48731 6.5931 2.42495 6.61358 2.28531C6.63872 2.11217 6.68993 1.94368 6.73276 1.75657C6.88733 1.81987 7.0391 1.87666 7.18435 1.94647C7.20856 1.95857 7.22066 2.02932 7.21321 2.06842C7.18342 2.21457 7.23835 2.29462 7.38174 2.3272C7.43388 2.3393 7.48509 2.36351 7.53258 2.38957C7.74114 2.50035 7.93295 2.47987 8.11917 2.30859C8.02047 2.19595 7.92271 2.07586 7.81563 1.96323C7.69459 1.8357 7.57355 1.7063 7.43761 1.59646C7.30911 1.4922 7.2877 1.37212 7.33053 1.20642C7.56703 1.28461 7.81749 1.26134 8.04096 1.4438C8.33705 1.68396 8.48323 1.98743 8.57355 2.33465C8.60055 2.43705 8.6499 2.51617 8.73183 2.58506C8.9106 2.73679 9.07727 2.90156 9.25697 3.05236C9.34636 3.12776 9.4525 3.18361 9.56051 3.25436C9.64617 3.11845 9.72066 3.00954 9.78584 2.89504C9.8268 2.82243 9.87802 2.79078 9.96088 2.7852C10.2253 2.76658 10.4897 2.74051 10.7542 2.71631C10.7737 2.71445 10.7933 2.71445 10.8119 2.7098C10.9916 2.67256 10.9916 2.67256 11.0912 2.83267C11.6192 3.68071 11.9143 4.60321 11.9814 5.60018C11.9842 5.63835 11.9925 5.67652 11.9991 5.71468C12 5.89714 12 6.0768 12 6.25646Z"
                                                fill="black" />
                                            <path
                                                d="M1.39209 2.17171C3.14907 0.00275924 6.21797 -0.562286 8.51499 0.569666C8.3297 0.644137 8.15093 0.579906 7.97775 0.549187C7.82132 0.52126 7.69935 0.544532 7.5662 0.634828C7.3893 0.754912 7.23753 0.896406 7.09693 1.05372C7.06434 1.09003 7.00941 1.11889 6.96192 1.12447C6.66304 1.15891 6.36416 1.19522 6.06434 1.21011C5.91443 1.21756 5.76173 1.18684 5.61276 1.16264C5.54851 1.1524 5.51313 1.16357 5.48054 1.22035C5.41816 1.32833 5.34274 1.42887 5.28222 1.53778C5.24218 1.60946 5.19004 1.6318 5.11276 1.63459C4.8744 1.64297 4.63604 1.67369 4.39861 1.66252C4.23846 1.65507 4.08017 1.59643 3.92375 1.55082C3.83157 1.52382 3.75336 1.5173 3.67142 1.57688C3.41723 1.76213 3.123 1.82636 2.81574 1.85056C2.36974 1.88686 1.94144 2.00509 1.51593 2.13727C1.48054 2.14844 1.44702 2.15682 1.39209 2.17171ZM7.25801 0.484956C7.13045 0.411416 7.02058 0.344393 6.90792 0.283885C6.88557 0.271784 6.84553 0.270853 6.82412 0.282024C6.51872 0.451444 6.21611 0.623657 5.89954 0.802387C6.03268 0.908507 6.14442 0.997872 6.31201 0.959706C6.44702 0.928987 6.60438 0.947604 6.7189 0.885235C6.90699 0.780976 7.069 0.629243 7.25801 0.484956ZM4.46751 0.646929C4.32133 0.760497 4.19097 0.861963 4.05503 0.967153C4.10531 0.997872 4.14907 1.01649 4.18445 1.04628C4.34926 1.18498 4.5243 1.19615 4.72356 1.12168C4.89209 1.05931 5.07086 1.02487 5.25242 0.975531C5.19842 0.880581 5.14907 0.801456 5.10624 0.718607C5.07552 0.6581 5.04013 0.641344 4.97682 0.670201C4.80363 0.749326 4.62859 0.777253 4.46751 0.646929Z"
                                                fill="black" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_2512_9543">
                                                <rect width="12" height="12" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    {{$trip->duration}} Days
                                </div>
                                <div class="activities">
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.62421 0C5.87387 0 6.12439 0 6.37405 0C6.57863 0.0268786 6.78408 0.0450867 6.98692 0.0815029C8.54208 0.358093 9.8129 1.11676 10.7682 2.37225C11.8058 3.73699 12.1846 5.28295 11.9159 6.97457C11.7035 8.30983 11.0959 9.4526 10.1007 10.3673C8.58022 11.765 6.78928 12.2627 4.76342 11.8691C3.73098 11.6688 2.82164 11.1962 2.03626 10.4974C0.997761 9.57399 0.347613 8.42688 0.0953551 7.0578C0.0537456 6.83237 0.0312071 6.6026 0 6.37543C0 6.12572 0 5.87514 0 5.62543C0.0182041 5.4789 0.0338077 5.33237 0.0546124 5.18584C0.225385 3.99191 0.703027 2.93584 1.50488 2.0341C2.43329 0.990173 3.58708 0.337283 4.96626 0.0919075C5.18385 0.0537572 5.4049 0.0303468 5.62421 0ZM10.9537 6.00087C10.9537 3.26705 8.73279 1.04566 5.99957 1.0448C3.26721 1.0448 1.04544 3.26705 1.04457 6C1.0437 8.73208 3.26721 10.9552 5.99957 10.9561C8.73106 10.9569 10.9537 8.73468 10.9537 6.00087Z"
                                            fill="black" />
                                        <path
                                            d="M8.8664 3.41777C8.85773 3.44465 8.84646 3.49754 8.82479 3.54696C8.31941 4.72962 7.81143 5.91228 7.30691 7.0958C7.2627 7.19985 7.19248 7.26661 7.09019 7.31083C5.90606 7.81632 4.72366 8.32355 3.54125 8.82991C3.40082 8.88973 3.2864 8.87673 3.20491 8.79089C3.11216 8.69204 3.11909 8.58106 3.1685 8.46488C3.67908 7.27442 4.18707 6.08395 4.70285 4.89696C4.73666 4.81979 4.81468 4.74089 4.89183 4.70708C6.08203 4.18945 7.2757 3.67875 8.46938 3.16719C8.67569 3.07962 8.86467 3.18713 8.8664 3.41777ZM6.51893 6.00939C6.5224 5.71719 6.29788 5.48482 6.00835 5.48135C5.71621 5.47788 5.4839 5.70245 5.48043 5.99205C5.47696 6.28424 5.70235 6.51661 5.99101 6.52008C6.28228 6.52268 6.51546 6.29812 6.51893 6.00939Z"
                                            fill="black" />
                                    </svg>
                                    <a href="{{route('website.activities.detail',$trip->activite->slug)}}">{{ $trip->activite->title}}</a>

                                </div>
                            </div>
                            <div class="actions d-flex">
                                <div class="price">${{$trip->price}} </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
               
               
            </div>
            <div class="pagination">
               
                {{$trips->appends(request()->query())->links('website::layouts.pagination')}}

            </div>
        </div>
    </div>
</section>
@endif

@if(count($destinationFeatured)>0)
<section class="country-detail bundle py-80">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 mx-auto content-wrapper">
                <div class="text-content-wrapper">
                    @foreach($destinationFeatured->take(1) as $d)
                    <div class="package-card-wrapper">
                        <div class="package-card">
                            <a href="{{route('website.trips.detail',$d->slug)}}" class="img-div d-block">
                                <img src="{{ asset('ruploads/'.$d->getFirstImage()).pages_parallax()}}" alt="{{$d->slug}}?w=416&h=300&fit=crop">
                            </a>
                            <div class="text-content">
                                <div class="tags">
                                    <ul>
                                        @foreach($d->travelStyles as $style)
                                        <li><a href="http://tan.com/tan/public/pages/trips?style={{$style->slug}}">{{$style->title}}</a></li>
                                    @endforeach
                                    </ul>
                                </div>
                                <a href="{{route('website.trips.detail',$d->slug)}}" class="title">
                                    {{$d->title}}
                                </a>
                                <div class="info d-flex justify-content-between">
                                    @if(!empty($trip))
                                    <div class="ratings">
                            
                               
                                        @for($i = 0;$i<$trip->average_rating;$i++)
                                         <img src="{{ public_asset('website/img/star-icon.svg') }}" alt="star">
                                         @endfor
                                        
                                         
                                         @if($trip->average_rating !=0)
                                         <span> {{number_format($trip->average_rating,1) }}</span>
                                         @endif
                                     </div>
                                   
                                     <div class="days">
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_2512_9543)">
                                                <path
                                                    d="M5.64717 12.0001C5.41532 11.9693 5.18255 11.9489 4.9535 11.9051C3.05312 11.5402 1.63227 10.506 0.703963 8.81271C0.137855 7.78037 -0.0762979 6.66331 0.0233297 5.48946C0.0968865 4.61816 0.354801 3.80177 0.788693 3.04217C0.809177 3.0068 0.855732 2.98539 0.890183 2.9584C0.895769 2.95374 0.90508 2.95467 0.912529 2.95281C1.01123 2.93047 1.10992 2.90906 1.21886 2.90161C1.0913 3.00401 0.962808 3.10641 0.82873 3.21439C1.00378 3.34006 1.15741 3.44711 1.38832 3.4499C1.83152 3.45456 2.25704 3.36426 2.68534 3.28513C2.79614 3.26466 2.85759 3.28141 2.91718 3.3866C3.07361 3.66121 3.24772 3.92558 3.4088 4.1974C3.44232 4.25418 3.46281 4.32679 3.46467 4.39288C3.47119 4.63864 3.46281 4.88532 3.47026 5.13107C3.47212 5.19903 3.4954 5.27722 3.53543 5.33214C3.7738 5.6654 4.02147 5.99214 4.26076 6.32447C4.3129 6.39707 4.36691 6.43617 4.47119 6.39801C4.47119 6.28909 4.47119 6.1718 4.47119 6.05451C4.47957 6.05265 4.48795 6.05172 4.49633 6.04986C4.58199 6.22765 4.67137 6.40266 4.75052 6.58325C4.78497 6.66331 4.83152 6.70427 4.91718 6.72195C5.17696 6.77501 5.43581 6.83087 5.69372 6.8951C5.76076 6.91185 5.83152 6.95002 5.88087 6.99842C6.09968 7.21346 6.29056 7.46759 6.66299 7.46759C6.58385 7.63329 6.51867 7.7692 6.45536 7.9051C6.38925 8.04567 6.27286 8.18809 6.27473 8.32866C6.27659 8.46456 6.39205 8.6042 6.47398 8.7308C6.73748 9.14038 6.82035 9.61234 6.95443 10.0675C6.96467 10.102 6.95443 10.1448 6.94512 10.182C6.8846 10.4362 6.83618 10.695 6.75517 10.9416C6.66486 11.2181 6.71979 11.4899 6.73562 11.7645C6.73934 11.8223 6.74493 11.879 6.74959 11.9423C6.59502 11.9619 6.44884 11.9805 6.30359 11.9991C6.08478 12.0001 5.86597 12.0001 5.64717 12.0001Z"
                                                    fill="black" />
                                                <path
                                                    d="M12 6.25646C11.9702 6.51152 11.9525 6.76844 11.9078 7.02071C11.6909 8.25134 11.1434 9.31533 10.2654 10.2053C9.49068 10.99 8.56703 11.5187 7.49999 11.798C7.47764 11.8036 7.4553 11.8082 7.4134 11.8166C7.47392 11.6221 7.47392 11.4284 7.68342 11.3111C7.95157 11.1603 8.20111 10.977 8.45343 10.8001C8.5093 10.761 8.55586 10.6958 8.58286 10.6325C8.65735 10.4566 8.71321 10.2732 8.78677 10.0973C8.80818 10.0461 8.85474 9.99302 8.90316 9.96788C9.08379 9.87573 9.27001 9.79567 9.45343 9.70724C9.48975 9.68955 9.53165 9.66348 9.54934 9.62997C9.76721 9.22038 9.98137 8.80893 10.1992 8.3919C10.1667 8.37049 10.1397 8.35001 10.1108 8.33232C9.9972 8.26437 9.88546 8.1899 9.76721 8.13218C9.33519 7.92087 8.97857 7.62206 8.68528 7.2404C8.64897 7.19292 8.57262 7.165 8.51023 7.14917C8.34822 7.10914 8.18249 7.08122 8.01861 7.04677C7.73649 6.98813 7.45623 6.91645 7.17038 6.87735C7.05865 6.86246 6.93202 6.90714 6.82122 6.9481C6.68621 6.99837 6.58658 6.98906 6.50651 6.85781C6.40409 6.69025 6.24208 6.61112 6.04375 6.58692C6.0512 6.43612 6.05865 6.29369 6.0661 6.15313C5.83146 6.10845 5.63965 6.14661 5.51489 6.40074C5.46926 6.20898 5.43295 6.05539 5.39478 5.89341C5.54096 5.8236 5.67969 5.75471 5.82215 5.69234C5.84915 5.68024 5.89105 5.68862 5.91992 5.70072C6.03072 5.74819 6.13686 5.81149 6.25045 5.84873C6.3445 5.87852 6.44692 5.88224 6.54654 5.88969C6.5661 5.89155 6.60427 5.85711 6.60613 5.83756C6.63127 5.52478 6.85753 5.33209 7.02699 5.10123C7.2607 4.78101 7.54654 4.53898 7.91712 4.39283C8.08658 4.32581 8.24021 4.19362 8.4134 4.16476C8.58658 4.13591 8.77466 4.19828 8.95437 4.22062C9.05306 4.02886 9.04468 3.9609 8.90502 3.81848C8.82587 3.73749 8.75045 3.65185 8.66572 3.57738C8.41247 3.3549 8.216 3.09239 8.09403 2.77682C8.06424 2.69862 8.01675 2.66977 7.93481 2.67815C7.75511 2.69769 7.60055 2.64277 7.43481 2.56458C7.27187 2.48825 7.07355 2.48731 6.88174 2.45194C6.84263 2.66791 6.80539 2.86991 6.76628 3.08308C6.56424 3.04491 6.36964 3.01047 6.1769 2.96858C6.15176 2.963 6.12289 2.91459 6.1201 2.88387C6.11079 2.77868 6.07634 2.65022 6.12196 2.57296C6.15641 2.51524 6.29887 2.51245 6.39478 2.50221C6.53072 2.48731 6.5931 2.42495 6.61358 2.28531C6.63872 2.11217 6.68993 1.94368 6.73276 1.75657C6.88733 1.81987 7.0391 1.87666 7.18435 1.94647C7.20856 1.95857 7.22066 2.02932 7.21321 2.06842C7.18342 2.21457 7.23835 2.29462 7.38174 2.3272C7.43388 2.3393 7.48509 2.36351 7.53258 2.38957C7.74114 2.50035 7.93295 2.47987 8.11917 2.30859C8.02047 2.19595 7.92271 2.07586 7.81563 1.96323C7.69459 1.8357 7.57355 1.7063 7.43761 1.59646C7.30911 1.4922 7.2877 1.37212 7.33053 1.20642C7.56703 1.28461 7.81749 1.26134 8.04096 1.4438C8.33705 1.68396 8.48323 1.98743 8.57355 2.33465C8.60055 2.43705 8.6499 2.51617 8.73183 2.58506C8.9106 2.73679 9.07727 2.90156 9.25697 3.05236C9.34636 3.12776 9.4525 3.18361 9.56051 3.25436C9.64617 3.11845 9.72066 3.00954 9.78584 2.89504C9.8268 2.82243 9.87802 2.79078 9.96088 2.7852C10.2253 2.76658 10.4897 2.74051 10.7542 2.71631C10.7737 2.71445 10.7933 2.71445 10.8119 2.7098C10.9916 2.67256 10.9916 2.67256 11.0912 2.83267C11.6192 3.68071 11.9143 4.60321 11.9814 5.60018C11.9842 5.63835 11.9925 5.67652 11.9991 5.71468C12 5.89714 12 6.0768 12 6.25646Z"
                                                    fill="black" />
                                                <path
                                                    d="M1.39209 2.17171C3.14907 0.00275924 6.21797 -0.562286 8.51499 0.569666C8.3297 0.644137 8.15093 0.579906 7.97775 0.549187C7.82132 0.52126 7.69935 0.544532 7.5662 0.634828C7.3893 0.754912 7.23753 0.896406 7.09693 1.05372C7.06434 1.09003 7.00941 1.11889 6.96192 1.12447C6.66304 1.15891 6.36416 1.19522 6.06434 1.21011C5.91443 1.21756 5.76173 1.18684 5.61276 1.16264C5.54851 1.1524 5.51313 1.16357 5.48054 1.22035C5.41816 1.32833 5.34274 1.42887 5.28222 1.53778C5.24218 1.60946 5.19004 1.6318 5.11276 1.63459C4.8744 1.64297 4.63604 1.67369 4.39861 1.66252C4.23846 1.65507 4.08017 1.59643 3.92375 1.55082C3.83157 1.52382 3.75336 1.5173 3.67142 1.57688C3.41723 1.76213 3.123 1.82636 2.81574 1.85056C2.36974 1.88686 1.94144 2.00509 1.51593 2.13727C1.48054 2.14844 1.44702 2.15682 1.39209 2.17171ZM7.25801 0.484956C7.13045 0.411416 7.02058 0.344393 6.90792 0.283885C6.88557 0.271784 6.84553 0.270853 6.82412 0.282024C6.51872 0.451444 6.21611 0.623657 5.89954 0.802387C6.03268 0.908507 6.14442 0.997872 6.31201 0.959706C6.44702 0.928987 6.60438 0.947604 6.7189 0.885235C6.90699 0.780976 7.069 0.629243 7.25801 0.484956ZM4.46751 0.646929C4.32133 0.760497 4.19097 0.861963 4.05503 0.967153C4.10531 0.997872 4.14907 1.01649 4.18445 1.04628C4.34926 1.18498 4.5243 1.19615 4.72356 1.12168C4.89209 1.05931 5.07086 1.02487 5.25242 0.975531C5.19842 0.880581 5.14907 0.801456 5.10624 0.718607C5.07552 0.6581 5.04013 0.641344 4.97682 0.670201C4.80363 0.749326 4.62859 0.777253 4.46751 0.646929Z"
                                                    fill="black" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_2512_9543">
                                                    <rect width="12" height="12" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        {{$d->duration}} Days
                                    </div>
                                    @endif
                                    <div class="activities">
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.62421 0C5.87387 0 6.12439 0 6.37405 0C6.57863 0.0268786 6.78408 0.0450867 6.98692 0.0815029C8.54208 0.358093 9.8129 1.11676 10.7682 2.37225C11.8058 3.73699 12.1846 5.28295 11.9159 6.97457C11.7035 8.30983 11.0959 9.4526 10.1007 10.3673C8.58022 11.765 6.78928 12.2627 4.76342 11.8691C3.73098 11.6688 2.82164 11.1962 2.03626 10.4974C0.997761 9.57399 0.347613 8.42688 0.0953551 7.0578C0.0537456 6.83237 0.0312071 6.6026 0 6.37543C0 6.12572 0 5.87514 0 5.62543C0.0182041 5.4789 0.0338077 5.33237 0.0546124 5.18584C0.225385 3.99191 0.703027 2.93584 1.50488 2.0341C2.43329 0.990173 3.58708 0.337283 4.96626 0.0919075C5.18385 0.0537572 5.4049 0.0303468 5.62421 0ZM10.9537 6.00087C10.9537 3.26705 8.73279 1.04566 5.99957 1.0448C3.26721 1.0448 1.04544 3.26705 1.04457 6C1.0437 8.73208 3.26721 10.9552 5.99957 10.9561C8.73106 10.9569 10.9537 8.73468 10.9537 6.00087Z"
                                                fill="black" />
                                            <path
                                                d="M8.8664 3.41777C8.85773 3.44465 8.84646 3.49754 8.82479 3.54696C8.31941 4.72962 7.81143 5.91228 7.30691 7.0958C7.2627 7.19985 7.19248 7.26661 7.09019 7.31083C5.90606 7.81632 4.72366 8.32355 3.54125 8.82991C3.40082 8.88973 3.2864 8.87673 3.20491 8.79089C3.11216 8.69204 3.11909 8.58106 3.1685 8.46488C3.67908 7.27442 4.18707 6.08395 4.70285 4.89696C4.73666 4.81979 4.81468 4.74089 4.89183 4.70708C6.08203 4.18945 7.2757 3.67875 8.46938 3.16719C8.67569 3.07962 8.86467 3.18713 8.8664 3.41777ZM6.51893 6.00939C6.5224 5.71719 6.29788 5.48482 6.00835 5.48135C5.71621 5.47788 5.4839 5.70245 5.48043 5.99205C5.47696 6.28424 5.70235 6.51661 5.99101 6.52008C6.28228 6.52268 6.51546 6.29812 6.51893 6.00939Z"
                                                fill="black" />
                                        </svg>
                                        <a href="{{route('website.activities.detail',$d->activite->slug)}}">{{ $d->activite->title}}</a>

                                    </div>
                                </div>
                                <div class="actions d-flex">
                                    <div class="price">${{$d->price}} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <span>Bundle</span>
                    <h3>{{settings()->get('bundle_title')}}</h3>
                    {!!settings()->get('bundle_description')!!}
                </div>

            </div>
        </div>
    </div>
</section>

<section class="country-detail social-share-wrapper pb-80 d-flex justify-content-center">
    <div class="social-share">
        <span>Share this article</span>
        <div class="social-links">
            <a href="{{settings()->get('facebook_link')}}"><i class="fab fa-facebook-f"></i></a>
            <a href="{{settings()->get('instagram_link')}}"> <i class="fab fa-instagram"></i></a>
            <a href="{{settings()->get('twitter_link')}}"><i class="fab fa-twitter"></i></i></a>
            <a href="{{settings()->get('linkedin_link')}}"><i class="fab fa-linkedin"></i></i></a>
        </div>
    </div>
</section>
@endif

@include('website::partials.newletter') 



@endsection
@section('js')

<script  
src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>



<script  >

jQuery(function () {
$(document).ready(function () {
    
   
    $(".error").text('');
    $("#ajaxLoader").hide();
    $("#trip-filter").validate();
    $("#trip-filter").css("opacity", "1");
    $("#trip-filter").submit(function (e) {
        // e.preventDefault();
        var pricemin= $('#slider-range-value1').text().match(/\d/g).join('');
        var pricemax= $('#slider-range-value2').text().match(/\d/g).join('');
        var durationemin= $('#slider-duration-value1').text().match(/\d/g).join('');
        var durationmax= $('#slider-duration-value2').text().match(/\d/g).join('');
                       
        $('#min-value-price').val(pricemin);
        $('#max-value-price').val(pricemax);
        $('#min-value-duration').val(durationemin);
        $('#max-value-duration').val(durationmax);
        


    });

   

});
});
</script>

<script  >

    jQuery(function () {
        $('#drop_down_sort').change(function () {
            $('#loader3').show();
            $("#result").css("opacity", "0.5");
            $("#ajaxData").css("opacity", "0.5");
            var v = $('#drop_down_sort').val();
            if (v === 'recent') {
                $('.trips-container').sort(function (a, b) {
                    var p1 = $(a).find('span.trip-created').text();
                    var p2 = $(b).find('span.trip-created').text();
    
                    if (p1 < p2) {
                        return 1;
                    } else {
                        return -1;
                    }
                }).appendTo('.trip-results');
            }
            if (v === 'old') {
                $('.trips-container').sort(function (a, b) {
                    var p1 = $(a).find('span.trip-created').text();
                    var p2 = $(b).find('span.trip-created').text();
    
                    if (p1 > p2) {
                        return 1;
                    } else {
                        return -1;
                    }
    
                }).appendTo('.trip-results');
            }
            var targeOffsetTop = $('.all-trips').offset().top - 200;
            $('html, body').animate({
                scrollTop: targeOffsetTop,
            });
            $('#loader3').hide();
            $("#result").css("opacity", "1");
            $("#ajaxData").css("opacity", "1");
    
    
        });
        $('#drop_down_sort').trigger('change')
    });
    
    
    </script>
@stop
