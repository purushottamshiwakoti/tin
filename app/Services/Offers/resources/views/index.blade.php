@extends('backend::layouts.index')

@section('content')
    <div class="card">
        @include('backend::partials.index-header',['route_str'=>'offers'])
        <div class="card-block">

            <div class="dt-responsive table-responsive">
                <table id="dt-server-processing" class="table table-striped table-bordered nowrap deleteArena">
                    <thead>
                    <tr class="header-cols">
                        <th data-col-name="id">SN</th>
                        <th data-col-name="title">Title</th>
                        <th data-col-name="offerable_title">Name</th>
                        <th data-col-name="start_date">Start Date</th>
                        <th data-col-name="finish_date">End Date</th>
                        <th data-col-name="discount">Discount</th>

                        <th data-col-name="created_at">Created At</th>
                        <th data-col-name="action">Actions</th>

                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@stop