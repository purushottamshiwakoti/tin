<div class="form-group {{ $errors->has($field)?'':'' }} row">
    <label class="col-sm-2 col-form-label">{{ ucwords(str_replace('_',' ',$field)) }}</label>
    <div class="col-sm-10">
        <select name="{{$field}}[]" id="{{$field}}" class="js-example-tags col-sm-12" multiple="multiple">
            @foreach($options as $item)
                <option value="{{$item}}">{{$item}}</option>
            @endforeach
        </select>
    </div>
</div>

@section('javascript')

    @parent
    @if($dataObject)
        <script>
            $(document).ready(function () {
                var value = {!! json_encode($dataObject->$field) !!};

                $('#{{$field}}').val(value).trigger('change');

            });

        </script>
    @endif
@stop