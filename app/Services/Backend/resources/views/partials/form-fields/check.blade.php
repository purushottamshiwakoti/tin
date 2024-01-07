<div class="form-group {{ $errors->has($field)?'':'' }} row">
    <label class="col-sm-2 col-form-label">{{ ucwords(str_replace('_',' ',$field)) }}</label>
    <div class="col-sm-10">
        <input type="hidden" name="{{ $field }}" value="0">
        <input type="checkbox" name="{{ $field }}" class="js-single" value="1" {{ oldValue($field,$dataObject)?'checked':'' }} />
    </div>
</div>