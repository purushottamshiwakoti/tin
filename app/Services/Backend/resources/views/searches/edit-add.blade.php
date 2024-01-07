@extends('backend::layouts.master')
@section('content')
    <div class="card">
        @include('backend::partials.edit-add-header',['route_str'=>'searches'])
        <div class="card-block">
            <hr>
            <form id="main" action="{{ ($search)?route('admin.searches.update',$search->id):route('admin.searches.store') }}" method="post" enctype="multipart/form-data" novalidate>
                {{ csrf_field() }}
                @if($search)<input name="_method" type="hidden" value="PUT">@endif
                <div class="form-group {{ $errors->has('name')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Place</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="{{ oldValue('name',$search) }}" nameholder="name" class="form-control {{ $errors->has('name')?'form-control-danger':'' }}" required>
                    </div>
                </div>
               

                <div class="form-group {{ $errors->has('publish_types')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Publish Types</label>
                    <div class="col-sm-10">
                        <select name="publish_types" id="publish_types" class="js-example-tags col-sm-12" >
                            @foreach($type_options as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                
             
            
                

                <hr/>
                <div class="clearfix"></div>
                <button class="btn btn-mat waves-effect waves-light btn-success" type="submit">Submit</button>
            </form>


        </div>
    </div>
@stop

@section('javascript')
  
    @if($search)
        <script>
            $(document).ready(function () {
                var value = {!!  json_encode($search->publish_types) !!};

                $('#publish_types').val(value).trigger('change');
            });
        </script>
    @endif
  

   
@stop