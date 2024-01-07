<div class="form-group {{ $errors->has($field)?'':'' }} row">
    <label class="col-sm-2 col-form-label">{{ ucwords(str_replace('_',' ',$field)) }}</label>
    <div class="col-sm-10">
        <select name="{{ $field }}" id="{{ $field }}" class="js-example-tags col-sm-12 {{ $errors->has($field)?'form-control-danger':'' }}">
            <optgroup label="Options">
                @foreach($options as $option)
                    @php
                        $key = isset($option->id)?$option->id:$option;
                        $text = isset($option->title)?$option->title:$option;
                    @endphp
                    <option value="{{ $key }}" {{ optional($dataObject)->$field == $key?'selected':'' }}>{{ $text }}</option>
                @endforeach
            </optgroup>
        </select>
    </div>
</div>