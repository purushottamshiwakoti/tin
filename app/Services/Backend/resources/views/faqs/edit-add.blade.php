@extends('backend::layouts.master')
@section('css')

@stop
@section('content')
    <div class="card">
        @include('backend::partials.edit-add-header',['route_str'=>$name])
        <div class="card-block">
            <hr>
            <form id="main" action="{{ isset($dataObject->id)?route('admin.'.$name.'.update',$dataObject->id):route('admin.'.$name.'.store') }}" method="post" enctype="multipart/form-data" novalidate>
                {{ csrf_field() }}
                @if(isset($dataObject->id))<input name="_method" type="hidden" value="PUT">@endif
                @include('backend::partials.form-fields.text',['dataObject'=>$dataObject,'field'=>'question'])
                @include('backend::partials.form-fields.textarea',['dataObject'=>$dataObject,'field'=>'answer'])
                {{-- @include('backend::partials.form-fields.select',['dataObject'=>$dataObject,'field'=>'category_id','options'=>$dataObject->{'categoryOptions'}]) --}}
                @include('backend::partials.form-fields.check',['dataObject'=>$dataObject,'field'=>'publish'])
                <hr/>
                <div class="clearfix"></div>
                <button class="btn btn-mat waves-effect waves-light btn-success" type="submit">Submit</button>
            </form>


        </div>
    </div>
@stop
