<div class="form-group row">
    <label class="col-sm-2 col-form-label">Upload File</label>
    <div class="col-sm-10">
        <p>
            *For sliders(1366*500), page and trip(1920*750),  *Image (1366x400) for others.
        </p>
        <input type="file" name="image" class="form-control">
        @if($data && $data->attachments->count()>0)
            <div class="deleteArena">
                @foreach($data->attachments as $attachment)
            <div class="deleteBox attachmentDel">
        <a href="{{ asset('ruploads/'.$attachment->media->file_name) }}" target="_blank">
            <img src="{{ asset('ruploads/'.$attachment->media->file_name) }}" class="img-thumbnail" style="width:200px;">
        </a>
                <input type="text" name="captions[{{ $attachment->id }}]" placeholder="caption" class="form-control" value="{{ $attachment->caption }}">
                <a href="{{ route('admin.attachments.destroy',$attachment->id) }}" target="_self" id="" class="customBtn btn ajaxDelete btn-danger btn-xs" style="" data-confirm="Are you sure you want to delete this image?" data-url="">
                    <i class="fa fa-trash"></i>
                </a>
            </div>
                    @endforeach
            </div>
        @endif
    </div>
</div>

@section('javascript')
    @parent
    <script>

    </script>
@stop
