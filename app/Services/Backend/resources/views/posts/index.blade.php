@extends('backend::layouts.index')

@section('content')
    <div class="card">
        @include('backend::partials.index-header',['route_str'=>'posts'])
        <div class="card-block">

            <div class="dt-responsive table-responsive">
                <table id="dt-server-processing" class="table table-striped table-bordered nowrap deleteArena">
                    <thead>
                    <tr class="header-cols">
                        <th data-col-name="id">SN</th>
                        <th data-col-name="title">Title</th>
                        <th data-col-name="author_name">Author</th>
                        <th data-col-name="category_title">Category</th>
                        <th data-col-name="created_at">Created At</th>
                        <th data-col-name="action">Actions</th>

                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@stop