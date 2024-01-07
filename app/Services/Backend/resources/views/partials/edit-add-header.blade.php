<div class="card-header">
    <h5>{{ ucfirst($route_str) }}</h5>
    <span>Add New</span>
    <a href="{{ route('admin.'.$route_str.'.index') }}" class="btn waves-effect waves-light btn-info float-right"><i class="fas fa-plus"></i>View All</a>
    @if(isset($show_prev) && isset($slug))
        <a target="_blank" href="{{ route('website.blog.detail',$slug) }}" class="btn waves-effect waves-light btn-info float-right"><i class="fas fa-plus"></i>Preview</a>
    @endif
</div>