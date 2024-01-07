@extends('backend::layouts.index')

@section('content')
    <div class="card">
        {{--@include('backend::partials.index-header',['route_str'=>$name])--}}

        <div class="card-block">
            <div class="dt-responsive table-responsive">
                <table id="dt-server-processing" class="table table-striped table-bordered nowrap deleteArena">
                    <thead>
                    <tr class="header-cols">
                        <th data-col-name="id">SN</th>
                        @foreach($columns as $column)
                            @php
                                $columnTitle = (str_contains($column,'.'))?Illuminate\Support\Str::after($column,'.'):$column;
                                $columnTitle = ucwords(str_replace('_',' ',$columnTitle));
                            @endphp
                            <th data-col-name="{{ $column }}">{{ $columnTitle }}</th>
                        @endforeach

                            <th data-col-name="action">Actions</th>

                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Last Menaute Deal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('admin.fixed-departures.index') }}">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="modal-body">

                        <div class="form-group {{ $errors->has('deal_price')?'':'' }} row">
                            <label class="col-sm-2 col-form-label">Deal Price</label>
                            <div class="col-sm-10">
                                <input type="text" name="deal_price" required value="{{ old('deal_price') }}" placeholder="Deal Price" class="form-control {{ $errors->has('deal_price')?'form-control-danger':'' }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('available_size')?'':'' }} row">
                            <label class="col-sm-2 col-form-label">Remaining Seat</label>
                            <div class="col-sm-10">
                                <input type="text" name="available_size" required value="{{ old('available_size') }}" placeholder="Remaining Seat" class="form-control {{ $errors->has('available_size')?'form-control-danger':'' }}">
                            </div>
                        </div>
                        {{--<div class="form-group {{ $errors->has('is_menu_featured')?'':'' }} row">--}}
                            {{--<label class="col-sm-2 col-form-label">Featured in menu?</label>--}}
                            {{--<div class="col-sm-10">--}}
                                {{--<input type="hidden" name="is_menu_featured" value="0">--}}
                                {{--<input type="checkbox" name="is_menu_featured" class="js-switch is_menu_featured" value="1" {{ old('is_menu_featured')?'checked':'' }} />--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    </div>
                    <div class="modal-footer">
                        <a class="deal_delete" href="{{ route('admin.fixed-departures.index') }}">Delete this deal</a>
                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('js')

    @parent
    <script>
        $.fn.dataTable.ext.errMode = 'none';
        var popbtn = true;
        $(document).ready(function () {
            // var elemsingle = document.querySelector('.js-switch');
            // var switchery = new Switchery(elemsingle, {color: '#4099ff', jackColor: '#fff'});

            $(document).on('click','a.tabledit-pop-button',function (e) {
                e.preventDefault();
                var cur_row = $(this).closest('tr');
                var action = "{{ route('admin.fixed-departures.index') }}";
                // $("#add-modal").find('form').trigger('reset');
                $("#add-modal").find('form').attr('action',action+'/'+$(cur_row).find('td:first').text());
                $("#add-modal").find('.deal_delete').attr('href',action+'/'+$(cur_row).find('td:first').text()+'?type=deal');
                $("#add-modal").find('input[name="deal_price"]').val($(cur_row).find('td[class*=deal_price]').text());
                $("#add-modal").find('input[name="available_size"]').val($(cur_row).find('td[class*=available_size]').text());
                // var checked = $(cur_row).find('td[class*=is_menu_featured]').text();
                // $("#add-modal").find('input.is_menu_featured').prop('checked',checked==1?true:false);
                // var special = document.querySelector('.is_menu_featured');
                // setSwitchery(special);
                $('#add-modal').modal('show');
            })
        })
    </script>
@stop