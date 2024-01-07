@extends('backend::layouts.master')
@section('css')

@stop
@section('content')
    <div class="card">
        @include('backend::partials.edit-add-header',['route_str'=>$name])
        <div class="card-block">
            <hr>
            <form id="main" action="{{ ($dataObject)?route('admin.'.$name.'.update',$dataObject->id):route('admin.'.$name.'.store') }}" method="post" enctype="multipart/form-data" novalidate>
                {{ csrf_field() }}
                @if($dataObject)<input name="_method" type="hidden" value="PUT">@endif
                 @include('backend::partials.form-fields.datefield',['dataObject'=>$dataObject,'field'=>'start_date'])
                 @include('backend::partials.form-fields.datefield',['dataObject'=>$dataObject,'field'=>'finish_date'])
                 @include('backend::partials.form-fields.text',['dataObject'=>$dataObject,'field'=>'size'])
                 @include('backend::partials.form-fields.text',['dataObject'=>$dataObject,'field'=>'price'])
                 @include('backend::partials.form-fields.select',['dataObject'=>$dataObject,'field'=>'availability','options'=>$trip_availability])
                 @include('backend::partials.form-fields.check',['dataObject'=>$dataObject,'field'=>'include_flight_info'])



                {{--@if($dataObject->has('attachments'))--}}

                {{--@include('backend::partials.attachments',['data'=>$dataObject])--}}
                {{--@endif--}}

                {{--@if($dataObject->has('coverImage'))--}}
                {{--@include('backend::partials.cover-image',['data'=>$dataObject])--}}
                {{--@endif--}}




                <hr/>
                <div class="clearfix"></div>
                <button class="btn btn-mat waves-effect waves-light btn-success" type="submit">Submit</button>
            </form>


        </div>
    </div>
@stop
