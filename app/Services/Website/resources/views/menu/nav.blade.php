<nav class="head @if (\Route::currentRouteName() != 'website.home') fixed-nav @endif" id="header">
    <div class="container">
        <div class="row">

            <div class="col-2 d-flex align-items-center">
                <a href="{{ route('website.home') }}"><img src="{{ asset('website/assets/img/logo.png') }}"
                        alt="logo"></a>
            </div>
            <div class="col-7 nav-items" id="nav-items">
                <div id="close-menu" class="d-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="28"
                        height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#05133A" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </div>
                <ul>

                    @foreach ($items as $item)
                        {{-- {{dd($item)}} --}}
                        <li class="nav-items-custom">
                            @if ($item->children->count())
                                {{-- <a class="cursor-pointer" >{{ $item->name }}</a> --}}
                                <a class="cursor-pointer">{{ $item->name }}</a>

                                @if ($item->layout == 'horizontal')
                                    <div class="submenu-wrapper">
                                        <div class="row">
                                            <div class="col-md-12 d-flex">
                                                <ul class="nav nav-tabs"
                                                    id="myTab{{ preg_replace('/\s+/', '', $item->name) }}"
                                                    role="tablist">
                                                    @foreach ($item->children as $key => $child)
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link {{ $key == 0 ? 'active' : '' }}"
                                                                id="{{ str_slug($child->name) . '-' . $child->id }}-tab"
                                                                data-bs-toggle="tab"
                                                                data-bs-target="#{{ str_slug($child->name) . '-' . $child->id }}"
                                                                type="button" role="tab"
                                                                aria-controls="{{ str_slug($child->name) . '-' . $child->id }}"
                                                                {{-- {{ $key == 0 ? 'aria-selected="true"' : '' }}>{{ $child->name }}</a> --}} {{ $key == 0 ? '' : '' }}>

                                                                {{ $child->name }}
                                                            </button>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <div class="tab-content"
                                                    id="myTabContent{{ preg_replace('/\s+/', '', $item->name) }}">
                                                    @foreach ($item->children as $key => $child)
                                                        <div class="tab-pane fade{{ $key == 0 ? ' show active' : '' }}"
                                                            id="{{ str_slug($child->name) . '-' . $child->id }}"
                                                            role="tabpanel"
                                                            aria-labelledby="{{ str_slug($child->name) . '-' . $child->id }}-tab">
                                                            <div class="d-flex">
                                                                <ul>
                                                                    @foreach ($child->children as $secondChild)
                                                                        @if ($secondChild->layout != 'trip')
                                                                            <li><a
                                                                                    href="{{ $secondChild->link }}">{{ $secondChild->name }}</a>
                                                                            </li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                                @php
                                                                    $tripLink = $child->children->where('layout', 'trip')->first();
                                                                    $trip = $tripLink ? $tripLink->trip : '';
                                                                @endphp
                                                                @if ($trip)
                                                                    <div class="package-card-wrapper">
                                                                        <a href="{{ route('website.trips.detail', $trip->slug) }}"
                                                                            class="package-card">
                                                                            <div class="img-div">
                                                                                {{-- <img src="assets/img/package3.webp" alt=""> --}}
                                                                                <img src="{{ asset('ruploads/' . $trip->getFirstImage()) }}?w=302&h=200&fit=crop"
                                                                                    alt="{{ $trip->slug }}">
                                                                            </div>
                                                                            <div class="text-content">
                                                                                <h6>{{ $tripLink->name }}</h6>
                                                                                <div
                                                                                    class="info d-flex align-items-center">
                                                                                    <div class="rating-wrapper me-3">
                                                                                        @for ($i = 0; $i < $trip->average_rating; $i++)
                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon icon-tabler icon-tabler-star"
                                                                                                width="16"
                                                                                                height="16"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="1.5"
                                                                                                stroke="#FAA61A"
                                                                                                fill="#FAA61A"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                    d="M0 0h24v24H0z"
                                                                                                    fill="none" />
                                                                                                <path
                                                                                                    d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                                                            </svg>
                                                                                        @endfor


                                                                                    </div>
                                                                                    <div
                                                                                        class="d-flex align-items-center">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            class="icon icon-tabler icon-tabler-clock"
                                                                                            width="16"
                                                                                            height="16"
                                                                                            viewBox="0 0 24 24"
                                                                                            stroke-width="1.5"
                                                                                            stroke="#2c3e50"
                                                                                            fill="none"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round">
                                                                                            <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                            <circle cx="12"
                                                                                                cy="12"
                                                                                                r="9" />
                                                                                            <polyline
                                                                                                points="12 7 12 12 15 15" />
                                                                                        </svg>
                                                                                        <span
                                                                                            class="ml-1">{{ $trip->duration }}</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="d-flex justify-content-between">
                                                                                    <div class="price">Starting from
                                                                                        <span>${{ $trip->price }}
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @else
                                    <ul class="submenu">
                                        @foreach ($item->children as $key => $child)
                                            @if ($child->children->count())
                                                <li class="submenu-item">
                                                    <a class="d-flex align-items-center justify-content-between">
                                                        {{ $child->name }}
                                                        <svg viewBox="0 0 24 24" width="20" height="20"
                                                            stroke="currentColor" stroke-width="2" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="right-arrow">
                                                            <polyline points="9 18 15 12 9 6"></polyline>
                                                        </svg>
                                                    </a>
                                                    <ul class="submenu1">
                                                        @foreach ($child->children as $child1)
                                                            <li><a href="{{ $child1->link }}">{{ $child1->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @else
                                                <li class="submenu-item">
                                                    <a href="{{ $child->link }}"
                                                        class="d-flex align-items-center justify-content-between">
                                                        {{ $child->name }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach

                                    </ul>
                                @endif
                            @else
                                <a href="{{ url($item->link) }}">{{ $item->name }}</a>
                            @endif

                        </li>

                    @endforeach

                </ul>
            </div>
            <div class="col-lg-3 col-sm-5 col-7 d-flex align-items-center">
                <div class="position-relative content-wrapper d-flex align-items-center w-100">
                    <a class="search icon cursor-pointer" id="home-search-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#fff"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <circle cx="10" cy="10" r="7" />
                            <line x1="21" y1="21" x2="15" y2="15" />
                        </svg>
                    </a>


                    <a href="{{ route('website.guest.wishlist') }}" class="d-block search ms-4 wishlist">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_236_1491)">
                                <path
                                    d="M19.5003 13.5719L12.0003 20.9999L4.5003 13.5719M4.5003 13.5719C4.00561 13.0905 3.61594 12.5119 3.35585 11.8726C3.09575 11.2332 2.97086 10.5469 2.98904 9.85687C3.00721 9.16685 3.16806 8.48807 3.46146 7.86327C3.75485 7.23847 4.17444 6.68119 4.69379 6.22651C5.21314 5.77184 5.82101 5.42962 6.47911 5.22141C7.13722 5.01321 7.83131 4.94352 8.51767 5.01673C9.20403 5.08995 9.8678 5.30449 10.4672 5.64684C11.0666 5.98919 11.5886 6.45193 12.0003 7.00593C12.4138 6.45595 12.9364 5.99725 13.5354 5.65854C14.1344 5.31982 14.7968 5.10838 15.4812 5.03745C16.1657 4.96652 16.8574 5.03763 17.5131 5.24632C18.1688 5.45502 18.7743 5.79681 19.2919 6.2503C19.8094 6.70379 20.2277 7.25922 20.5207 7.88182C20.8137 8.50443 20.975 9.18082 20.9946 9.86864C21.0142 10.5565 20.8916 11.2409 20.6344 11.8792C20.3773 12.5174 19.9912 13.0958 19.5003 13.5779"
                                    fill="#F95B5B" />
                            </g>
                            <defs>
                                <clipPath id="clip0_236_1491">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <span id="cart-count">0</span>
                    </a>

                    @guest
                        <a href="{{ route('website.login') }}"
                            class="btn btn-custom btn-primary ms-4"><span>Login</span></a>
                    @endguest

                    @auth
                        <div class="logged-in ms-4">
                            <a id="logged-in-user" class="d-flex align-items-center justify-content-center">
                                <svg class="me-1" xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-user-circle" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="12" r="9" />
                                    <circle cx="12" cy="10" r="3" />
                                    <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                                </svg>{{ Auth::getDefaultDriver() == 'customer' ? auth('customer')->user()->full_name : auth('web')->user()->email }}</a>

                            <ul class="dashboardDrop" id="logged-in-submenu">
                                <li class="submenu-item">
                                    <a href="{{ route('website.dashboard') }}">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_207_3281)">
                                                <path d="M4.16667 10H2.5L10 2.5L17.5 10H15.8333" stroke="#0084D4"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M4.16406 10V15.8333C4.16406 16.2754 4.33966 16.6993 4.65222 17.0118C4.96478 17.3244 5.3887 17.5 5.83073 17.5H14.1641C14.6061 17.5 15.03 17.3244 15.3426 17.0118C15.6551 16.6993 15.8307 16.2754 15.8307 15.8333V10"
                                                    stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M7.5 17.4987V12.4987C7.5 12.0567 7.6756 11.6327 7.98816 11.3202C8.30072 11.0076 8.72464 10.832 9.16667 10.832H10.8333C11.2754 10.832 11.6993 11.0076 12.0118 11.3202C12.3244 11.6327 12.5 12.0567 12.5 12.4987V17.4987"
                                                    stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_207_3281">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        Dashboard</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{ route('website.dashboard.change.password') }}">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_207_3319)">
                                                <path
                                                    d="M14.168 9.16669H5.83464C4.91416 9.16669 4.16797 9.91288 4.16797 10.8334V15.8334C4.16797 16.7538 4.91416 17.5 5.83464 17.5H14.168C15.0884 17.5 15.8346 16.7538 15.8346 15.8334V10.8334C15.8346 9.91288 15.0884 9.16669 14.168 9.16669Z"
                                                    stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M10.0013 14.1667C10.4615 14.1667 10.8346 13.7936 10.8346 13.3333C10.8346 12.8731 10.4615 12.5 10.0013 12.5C9.54106 12.5 9.16797 12.8731 9.16797 13.3333C9.16797 13.7936 9.54106 14.1667 10.0013 14.1667Z"
                                                    stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M6.66797 9.16667V5.83333C6.66797 4.94928 7.01916 4.10143 7.64428 3.47631C8.2694 2.85119 9.11725 2.5 10.0013 2.5C10.8854 2.5 11.7332 2.85119 12.3583 3.47631C12.9834 4.10143 13.3346 4.94928 13.3346 5.83333V9.16667"
                                                    stroke="#0084D4" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_207_3319">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        Change Password</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{ route('admin.logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_207_3302)">
                                                <path d="M4.16667 10H2.5L10 2.5L17.5 10H15.8333" stroke="#F95B5B"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M4.16406 10V15.8333C4.16406 16.2754 4.33966 16.6993 4.65222 17.0118C4.96478 17.3244 5.3887 17.5 5.83073 17.5H14.1641C14.6061 17.5 15.03 17.3244 15.3426 17.0118C15.6551 16.6993 15.8307 16.2754 15.8307 15.8333V10"
                                                    stroke="#F95B5B" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M7.5 17.4987V12.4987C7.5 12.0567 7.6756 11.6327 7.98816 11.3202C8.30072 11.0076 8.72464 10.832 9.16667 10.832H10.8333C11.2754 10.832 11.6993 11.0076 12.0118 11.3202C12.3244 11.6327 12.5 12.0567 12.5 12.4987V17.4987"
                                                    stroke="#F95B5B" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_207_3302">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        logout</a>
                                    <form id="logout-form" action="{{ route('website.logout') }}" method="POST"
                                        style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>

                            </ul>
                        </div>
                    @endauth


                    <form action="{{ route('website.page', 'search') }}" id="home-search">

                        <input type="text" name="query" placeholder="Enter keyword">


                    </form>
                </div>

            </div>
            <div class="col-2 burger-menu d-flex align-items-center justify-content-end d-lg-none" id="burger-menu">
                <div><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2"
                        width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#05133A"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="4" y1="6" x2="20" y2="6" />
                        <line x1="4" y1="12" x2="20" y2="12" />
                        <line x1="4" y1="18" x2="20" y2="18" />
                    </svg></div>
            </div>
        </div>
    </div>
</nav>
