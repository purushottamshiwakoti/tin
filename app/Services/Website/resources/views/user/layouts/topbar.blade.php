<div class="user-info-wrapper">
    <i class="fal fa-bars" id="sidebarToggler"></i>
    <a href="#" class="user-info">
        @if(!empty(auth('customer')->user()->image))
        <img  id="avatar"
        src="{{asset('storage/image/'.auth('customer')->user()->image)}}"
        alt="dashboard-profile">
        @else
        <img class="name-logo"  src="{{\Avatar::create(auth('customer')->user()->email)->toBase64() }}"/>
        @endif
        @if(!empty(auth('customer')->user()->full_name  )){{auth('customer')->user()->full_name  }} @else {{auth('customer')->user()->email  }} @endif

    </a>
</div>