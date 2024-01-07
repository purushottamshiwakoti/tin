@extends('backend::layouts.master')
@section('css')

@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>{{ ucfirst($name) }} : {{ $dataObject->id }}</h5>
            <a href="{{ route('admin.'.$name.'.index') }}" class="btn waves-effect waves-light btn-info float-right"><i class="fas fa-plus"></i>View All</a>

            @php
            $showEdit = (!(isset($dataObject->settingOptions)) || optional($dataObject->settingOptions)->editable)?true:false;
            @endphp
            @if($showEdit)
            <a style="margin-right: 4px" href="{{ route('admin.'.$name.'.edit',$dataObject->id) }}" class="btn waves-effect waves-light btn-warning float-right"><i class="fas fa-edit"></i>Edit</a>
            @endif
        </div>
        <div class="card-block">
            @foreach($dataObject->toArray() as $key=>$item)

                <div class="m-b-20">
                    <h6 class="sub-title m-b-15">{{ ucfirst($key) }}</h6>
                    <p>
                    {{ json_encode($item) }}
                    </p>
                </div>
            @endforeach
            @if($dataObject->attachments)
                <div class="m-b-20">
                    <h6 class="sub-title m-b-15">Image</h6>
                    @if($dataObject->attachments->count()>0)
                        <div class="deleteArena">
                            @foreach($dataObject->attachments as $attachment)
                                <div class="deleteBox">
                                    <a href="{{ asset('ruploads/'.$attachment->media->file_name) }}" target="_blank">
                                        <img src="{{ asset('ruploads/'.$attachment->media->file_name) }}" class="img-thumbnail" style="width:200px;">
                                    </a>
                                    <a href="{{ route('admin.attachments.destroy',$attachment->id) }}" target="_self" id="" class="customBtn btn ajaxDelete btn-danger btn-xs" style="" data-confirm="Are you sure you want to delete this image?" data-url="">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif

                @if($dataObject->coverImage)
                    <div class="m-b-20">
                        <h6 class="sub-title m-b-15">Cover Image</h6>
                        @if($dataObject->coverImage->count()>0)
                            @php
                            $attachment = $dataObject->coverImage->first();
                            @endphp
                            <div class="deleteArena">
                                    <div class="deleteBox">
                                        <a href="{{ asset('ruploads/'.$attachment->media->file_name) }}" target="_blank">
                                            <img src="{{ asset('ruploads/'.$attachment->media->file_name) }}" class="img-thumbnail" style="width:200px;">
                                        </a>
                                        <a href="{{ route('admin.attachments.destroy',$attachment->id) }}" target="_self" id="" class="customBtn btn ajaxDelete btn-danger btn-xs" style="" data-confirm="Are you sure you want to delete this image?" data-url="">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                            </div>
                        @endif
                    </div>
                @endif
        </div>
    </div>
@stop
