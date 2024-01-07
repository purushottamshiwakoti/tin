<div class="form-group {{ $errors->has($field)?'':'' }} row">
    <label class="col-sm-2 col-form-label">{{ ucwords(str_replace('_',' ',$field)) }}</label>
    <div class="col-sm-10">
        <input data-validate="required" type="text" name="{{ $field }}" required value="{{ oldValue($field,$dataObject) }}" placeholder="{{ ucwords(str_replace('_',' ',$field)) }}" class="form-control {{ $errors->has($field)?'form-control-danger':'' }}">
        <span class="messages"></span>
    </div>
</div>