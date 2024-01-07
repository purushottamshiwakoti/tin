@extends('backend::layouts.index')

@section('content')
    {{--<div class="card">--}}
        {{--<div class="card-block">--}}
            {{----}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="card">
        {{--<div class="card-header">--}}


        {{--</div>--}}

        <div class="card-block">
            <div class="nav-item nav-grid right">
                <a href="" class="btn btn-sm btn-primary waves-effect waves-light" id="export-excell"> Export Excell</a>
                <a href="" class="btn btn-sm btn-primary waves-effect waves-light" id="export-pdf"> Export Pdf</a>
            </div>

                <form method="POST" id="search-form" class="" role="form">
                    {!! csrf_field() !!}

                    <div class="form-group row">
                        <div class="col-sm-3">
                        <label for="name">Start Date: </label>
                        <input type="text" name="start_date" readonly class="form-control form-control-primary datepicker">
                        <input type="hidden" name="should_export" value="0">
                        </div>
                        <div class="col-sm-3">
                        <label for="name">End Date: </label>
                        <input type="text" name="end_date" readonly class="form-control form-control-primary datepicker">
                        </div>
                        {{-- <div class="col-sm-3" style="text-align: left">
                           
                            Only Day Tours? : <input type="checkbox" name="only_departure" value="1"  class="form-control">

                          
                        </div>

                        <div class="col-sm-3" style="text-align: left">
                          
                            Show Abandoned? : <input type="checkbox" name="abandoned" value="1"  class="form-control">

                           
                        </div> --}}
                        <div class="col-sm-2">
                            <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>

                </form>
            <div class="dt-responsive table-responsive">
                <table id="dt-server-processing" class="table table-striped table-bordered nowrap deleteArena">
                    <thead>
                    <tr class="header-cols">
                        <th data-col-name="id">SN</th>
                        {{-- {{ dd($columns) }} --}}
                        @foreach($columns as $column)
                            @php
                                $columnTitle = (str_contains($column,'.'))?\Illuminate\Support\Str::after($column,'.'):$column;
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
        $('.datepicker').datepicker({
            format:'yyyy-mm-dd'
        })
        $.fn.dataTable.ext.errMode = 'none';
        var editable = "{{ $settingOptions->editable }}";
        var deletable = "{{ $settingOptions->deletable }}";
        var readable = "{{ $settingOptions->readable }}";
    </script>
    @parent
@stop