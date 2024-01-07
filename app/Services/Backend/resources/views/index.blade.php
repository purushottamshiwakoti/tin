@extends('backend::layouts.index')

@section('content')
    <div class="card">
        @include('backend::partials.index-header',['route_str'=>$name])

        <div class="card-block">
            <div class="dt-responsive table-responsive">
                <table id="dt-server-processing" class="table table-striped table-bordered nowrap deleteArena">
                    <thead>
                    <tr class="header-cols">
                        <th data-col-name="id">SN</th>
                        @foreach($columns as $column)
                            @php
                              $columnTitle = (str_contains($column,'.'))?str_after($column,'.'):$column;
                              $columnTitle = ucwords(str_replace('_',' ',$columnTitle));
                            @endphp
                            <th data-col-name="{{ $column }}">{{ $columnTitle }}</th>
                        @endforeach

                        <th data-col-name="created_at">Created At</th>
                        @if($settingOptions->showActions)
                        <th data-col-name="action">Actions</th>
                        @endif
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $.fn.dataTable.ext.errMode = 'none';
        var editable = "{{ $settingOptions->editable }}";
        var deletable = "{{ $settingOptions->deletable }}";
        var readable = "{{ $settingOptions->readable }}";
    </script>
    @parent
@stop