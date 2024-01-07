<div class="form-group row">
    <label class="col-sm-2 col-form-label">{{ ucwords(str_replace('_',' ',$field)) }}</label>
    <div class="col-sm-10">
        <textarea rows="5" name="{{ $field }}" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue($field,$dataObject) }}</textarea>
    </div>
</div>