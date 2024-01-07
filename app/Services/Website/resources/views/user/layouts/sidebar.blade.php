<div class="col-md-3 dashboard-sidebar">
    <div class="menu-bar" id="dashboard-menu">
        Dashboard Menu<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-align-right" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#05133A" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <line x1="4" y1="6" x2="20" y2="6" />
            <line x1="10" y1="12" x2="20" y2="12" />
            <line x1="6" y1="18" x2="20" y2="18" />
        </svg>
    </div>
    <div class="dashboard-sidebar-wrapper">
        <ul>
            <li class="@if(Route::is('website.dashboard')) active @endif">
                <a href="{{route('website.dashboard')}}">Dashboard</a></li>

            <li class="@if(Route::is('website.user.profile')) active @endif">
                <a href="{{route('website.user.profile')}}">Profile</a></li>

            <li class="@if(Route::is('website.user.booking')) active @endif">
                <a href="{{route('website.user.booking')}}">Booking</a></li>
            
            <li class="@if(Route::is('website.user.review')) active @endif">
                <a href="{{route('website.user.review')}}">Reviews</a></li>

            <li class="@if(Route::is('website.user.wishlist')) active @endif">
                    <a href="{{route('website.user.wishlist')}}">Wishlist</a></li>
            
                <li class="@if(Route::is('website.dashboard.change.password')) active @endif"><a href="{{route('website.dashboard.change.password')}}">Change Password</a></li>
        </ul>
    </div>
</div>