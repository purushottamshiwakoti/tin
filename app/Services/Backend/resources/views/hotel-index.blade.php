@extends('backend::layouts.index')
@section('content')
    <div class="card">
        @include('backend::partials.index-header',['route_str'=>'hotels'])
        <div class="card-block">

            <div class="dt-responsive table-responsive">
                <table id="dt-server-processing" class="table table-striped table-bordered nowrap deleteArena">
                    <thead>
                    <tr class="header-cols">
                        <th data-col-name="id">SN</th>
                     

                        <th data-col-name="place">Name</th>
                        {{-- <th data-col-name="hotel_type">hotel_type </th> --}}
                        <th data-col-name="first_name">first_name </th>
                        <th data-col-name="last_name">last_name </th>
                        <th data-col-name="created_at">Created At</th>

                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@stop
{{-- @section('js')
<script>
    $.fn.dataTable.ext.errMode = 'none';
    var editable = "{{ $settingOptions->editable }}";
    var deletable = "{{ $settingOptions->deletable }}";
    var readable = "{{ $settingOptions->readable }}";
</script>
@parent
@stop --}}