@if($route_str != "landing-inquiry" && $route_str != "enquiries" && $route_str != "flight-bookings")
<div class="card-header">
    <a href="{{ route('admin.'.$route_str.'.create') }}" class="btn waves-effect waves-light btn-primary float-left"><i class="fas fa-plus"></i>Add New</a>
</div>
@endif