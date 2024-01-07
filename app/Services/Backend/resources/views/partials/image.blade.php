<div class="form-group row">
    <label class="col-sm-2 col-form-label">{{ ucwords(str_replace('_',' ',$field)) }}</label>

    <div class="col-sm-10">
        <p>
            @if($size){{ $size }}@else*For sliders(1366*500), page and trip(1920*750),  *Image (1366x400) for others.@endif
        </p>
        @php
        $relation = camel_case($field);
        @endphp
        <input type="file" name="{{ $field }}" class="form-control">
        @if($data && $data->$relation)
            @php
            $attachment = $data->$relation;
            @endphp
            <div class="deleteArena">
{{--                @foreach($data->coverImages as $attachment)--}}
                    <div class="deleteBox">
                        <a href="{{ asset('ruploads/'.$attachment->media->file_name) }}" target="_blank">
                            <img src="{{ asset('ruploads/'.$attachment->media->file_name) }}" class="img-thumbnail" style="width:200px;">
                        </a>
                        <a href="{{ route('admin.attachments.destroy',$attachment->id) }}" target="_self" id="" class="customBtn btn ajaxDelete btn-danger btn-xs" style="" data-confirm="Are you sure you want to delete this image?" data-url="">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                {{--@endforeach--}}
            </div>
        @endif
    </div>
</div>
