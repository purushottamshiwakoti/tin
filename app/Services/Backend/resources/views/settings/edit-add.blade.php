@extends('backend::layouts.master')
@section('css')
<style>
    .btndeladd{
        margin-top:0px !important
    }
</style>
@stop
@section('content')
<div class="col-xl-12 col-md-12">

    <div class="card">
        <div class="card-block ">
            
                <ul class="nav nav-tabs md-tabs tabs-top b-none" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#details" role="tab">Details</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#why-us" role="tab">Why Us</a>
                        <div class="slide"></div>
                    </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#insta-photo" role="tab">Insta Photo</a>
                        <div class="slide"></div>
                    </li> 
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#discover-nepal" role="tab">Discover Nepal</a>
                        <div class="slide"></div>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#query-banner" role="tab">Query Banner</a>
                        <div class="slide"></div>
                    </li> 
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#newsletter" role="tab">Newsletter</a>
                        <div class="slide"></div>
                    </li> 
                    
                    
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#testimonial" role="tab">Testimonial</a>
                        <div class="slide"></div>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#blog" role="tab">Blog Plan My Trip</a>
                        <div class="slide"></div>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#home-offer" role="tab">Home Offer</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#home-features" role="tab">Home Features</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#home-notice" role="tab">Home Notice</a>
                        <div class="slide"></div>
                    </li>
                     {{-- <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#our-mission" role="tab">Our Mission</a>
                        <div class="slide"></div>
                    </li> --}}
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#about-features" role="tab">About Features</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#footer" role="tab">footer</a>
                        <div class="slide"></div>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#bundle" role="tab">Bundle</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#our-branches" role="tab">Our Branches</a>
                        <div class="slide"></div>
                    </li>  --}}
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#contact" role="tab">Contact</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#home-package" role="tab">Home Package</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#fixed-departure" role="tab">Fixed Departure</a>
                        <div class="slide"></div>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#featured-blog" role="tab">Featured Blog</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tour" role="tab">Tour</a>
                        <div class="slide"></div>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#home-review" role="tab">Home Review</a>
                        <div class="slide"></div>
                    </li> --}}
                    
                   

                </ul>
                <!-- Tab panes -->

            

        </div>
    </div>
</div>
    <div class="card">
        <div class="card-block">
            
            
            <form id="main" action="{{ route('admin.settings.store') }}" method="post" enctype="multipart/form-data" novalidate>
                {{ csrf_field() }}
                <div class="tab-content tabs-left-content">
                    <div class="tab-pane active" id="details" role="tabpanel">
                <div class="form-group {{ $errors->has('site_name')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Site Title</label>
                    <div class="col-sm-10">
                        <input data-validate="required" type="text" name="site_name" required value="{{ oldValue('site_name',$setting) }}" placeholder="Site Title" class="form-control {{ $errors->has('site_name')?'form-control-danger':'' }}">
                        <span class="messages"></span>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('tagline')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Tagline</label>
                    <div class="col-sm-10">
                        <input type="text" name="tagline" value="{{ oldValue('tagline',$setting) }}" placeholder="Tagline" class="form-control {{ $errors->has('tagline')?'form-control-danger':'' }}">
                        <span class="messages"></span>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('mail')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Mail</label>
                    <div class="col-sm-10">
                        <input data-validate="required" type="text" name="mail" required value="{{ oldValue('mail',$setting) }}" placeholder="Mail" class="form-control {{ $errors->has('mail')?'form-control-danger':'' }}">
                        <span class="messages"></span>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('contact')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Contact</label>
                    <div class="col-sm-10">
                        <input type="text" name="contact" value="{{ oldValue('contact',$setting) }}" placeholder="Contact" class="form-control {{ $errors->has('contact')?'form-control-danger':'' }}">
                        <span class="messages"></span>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('fax')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Fax</label>
                    <div class="col-sm-10">
                        <input type="text" name="fax" value="{{ oldValue('fax',$setting) }}" placeholder="Fax" class="form-control {{ $errors->has('fax')?'form-control-danger':'' }}">
                        <span class="messages"></span>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('address')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <input type="text" name="website_address" value="{{ oldValue('website_address',$setting) }}" placeholder="website_address" class="form-control {{ $errors->has('website_address')?'form-control-danger':'' }}">
                        <span class="messages"></span>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('website')?'':'' }} row">
                    <label class="col-sm-2 col-form-label">Website</label>
                    <div class="col-sm-10">
                        <input type="text" name="website" value="{{ oldValue('website',$setting) }}" placeholder="Website" class="form-control {{ $errors->has('website')?'form-control-danger':'' }}">
                        <span class="messages"></span>
                    </div>
                </div>
                {{-- @include('backend::partials.cover-image',['data'=>$setting]) --}}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Site Description</label>
                    <div class="col-sm-10">
                        <textarea rows="5" name="site_description" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('site_description',$setting) }}</textarea>
                    </div>
                </div>
                {{-- <div class="form-group row appendable">
                    <label class="col-sm-2 col-form-label departschedule">Key Values</label>


                    @php
                        $extraValues = old('extra_info');
                        if($extraValues)
                        {
                            $extraValues = json_decode(json_encode(array_filter(array_map('array_filter',$extraValues))));
                            $extraIndexValue = count($extraValues);
                        }else{
                            $extraValues = settings()->get('extra_values')??[];
                            $extraIndexValue = count($extraValues);
                        }

                    @endphp
                    @if($extraValues)

                        @foreach($extraValues as $key=>$extraInfo)
                            <div class="main_content_desc appended_div">
                                <div class="col-md-12 row">
                                    <div class="col-md-10 row">
                                        <div class="col-md-6 col6">
                                            <input  id="extra_info_{{ $key }}_key" name="extra_info[{{ $key }}][key]" value="{{ $extraInfo->key }}" placeholder="Key" class="form-control">
                                        </div>
                                        <div class="col-md-6 col6">
                                            <input type="text" value="{{ $extraInfo->value }}" name="extra_info[{{ $key }}][value]" placeholder="Value" class="form-control">
                                        </div>

                                    </div>
                                    <div class="col-md-2 btndeladd">
                                        <div class="grp-btn">
                                            <a href="#" style="" class="btn btn-danger waves-effect waves-light tier_delete">
                                                <span class="fas fa-trash"></span>

                                            </a>

                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        @endforeach

                    @endif
                    <div class="clearfix"></div>
                    <div id="tier_pricing" class="tier_pricing departpricing">
                        <div class="appended_div">
                            <div class="col-md-12 row">
                                <div class="col-md-10 row">
                                    <div class="col-md-6 col6">
                                        <input type="text" id="extra_info_{{ $extraIndexValue }}_key" name="extra_info[{{ $extraIndexValue }}][key]" placeholder="Key" class="form-control indexed">
                                    </div>

                                    <div class="col-md-6 col6">
                                        <input type="text" name="extra_info[{{ $extraIndexValue }}][value]" placeholder="Value" class="form-control indexed">
                                    </div>

                                </div>
                                <div class="col-md-2 btndeladd">
                                    <div class="grp-btn">
                                        <a href="#" style="display: none" class="btn btn-danger waves-effect waves-light tier_delete">
                                            <span class="fas fa-trash"></span>
                                        </a>
                                        <a href="#" class="btn btn-primary waves-effect waves-light extra_add tier_add_btn" id="extra_add"><span class="fa fa-plus-circle"></span></a>
                                    </div>
                                </div>

                            </div>
                            <hr>
                        </div>
                    </div>
                    <div id="tier_price_append" class="tier_price_append extra_append"></div>
                </div> --}}


                @include('backend::partials.metas',['data'=>$setting])


                    </div>
                    {{-- why us --}}
                    <div class="tab-pane" id="why-us" role="tabpanel">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Why Us Title</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="why_us_title" required value="{{ oldValue('why_us_title',$setting) }}" placeholder="Why Us Title" class="form-control {{ $errors->has('why_us_title')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Why Us Subtitle</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="why_us_subtitle" required value="{{ oldValue('why_us_subtitle',$setting) }}" placeholder="Why Us Subtitle" class="form-control {{ $errors->has('why_us_subtitle')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row appendable">
                            <label class="col-sm-2 col-form-label departschedule">Key Values</label>
        
        
                            @php
                                $extraValues = oldValue('why_us_details');
                                if($extraValues)
                                {
                                    $extraValues = json_decode(json_encode(array_filter(array_map('array_filter',$extraValues))));
                                    $extraIndexValue = count($extraValues);
                                }else{
                                    $extraValues = settings()->get('why_us_details');
                                    $extraValues = $extraValues?json_decode($extraValues):[];
                                    $extraIndexValue = count($extraValues);
                                }
        
                            @endphp
                            @if($extraValues)
                            @php
                                // print_r($extraValues);exit;
                            @endphp
                                @foreach($extraValues as $key=>$extraInfo)
                                @if(isset($extraInfo->title) && isset($extraInfo->description))
                                
                                    <div class="main_content_desc appended_div">
                                        <div class="col-md-12 row">
                                            <div class="col-md-10 row">
                                                <div class="col-md-6 col6">
                                                    <input  id="why_us_details_{{ $key }}_key" name="why_us_details[{{ $key }}][title]" value="{{ $extraInfo->title }}" placeholder="Title" class="form-control">
                                                </div>
                                                <div class="col-md-6 col6">
                                                    <input type="text" value="{{ $extraInfo->description }}" name="why_us_details[{{ $key }}][description]" placeholder="Description" class="form-control">
                                                </div>
                                                <div class="col-md-12 col12 row">
                                                    <div class="col-md-6">
                                                    <input type="file" name="why_us_details[{{ $key }}][image]" placeholder="Image" class="form-control">
                                                    </div>
                                                    <div class="col-md-6">
                                                    @if(!empty($extraInfo->image))
                                                    <input type="hidden" name="why_us_details[{{ $key }}][old_image]" value="{{ $extraInfo->image }}">
                                                    <img src="{{ asset('ruploads/'.$extraInfo->image) }}?w=200&h=200" class="img-thumbnail" style="width:200px;">
                                                    @endif
                                                    </div>
                                                </div>
        
                                            </div>
                                            <div class="col-md-2 btndeladd">
                                                <div class="grp-btn">
                                                    <a href="#" style="" class="btn btn-danger waves-effect waves-light tier_delete">
                                                        <span class="fas fa-trash"></span>
        
                                                    </a>
        
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    @endif
                                @endforeach
        
                            @endif
                            <div class="clearfix"></div>
                            <div id="tier_pricing" class="tier_pricing departpricing">
                                <div class="appended_div">
                                    <div class="col-md-12 row">
                                        <div class="col-md-10 row">
                                            <div class="col-md-6 col6">
                                                <input  id="why_us_details_{{ $extraIndexValue }}_key" name="why_us_details[{{ $extraIndexValue }}][title]" value="" placeholder="Title" class="form-control">
                                            </div>
                                            <div class="col-md-6 col6">
                                                <input type="text" value="" name="why_us_details[{{ $extraIndexValue }}][description]" placeholder="Description" class="form-control">
                                            </div>
                                            <div class="col-md-6 col6">
                                                <input type="file" name="why_us_details[{{ $extraIndexValue }}][image]" placeholder="Image" class="form-control">
                                            </div>

                                          
        
                                        </div>
                                        <div class="col-md-2 btndeladd">
                                            <div class="grp-btn">
                                                <a href="#" style="display: none" class="btn btn-danger waves-effect waves-light tier_delete">
                                                    <span class="fas fa-trash"></span>
                                                </a>
                                                <a href="#" class="btn btn-primary waves-effect waves-light extra_add tier_add_btn" id="extra_add"><span class="fa fa-plus-circle"></span></a>
                                            </div>
                                        </div>
        
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div id="tier_price_append" class="tier_price_append extra_append"></div>
                        </div>
                    </div>
                    {{-- end why us --}}
                    {{-- insta photo --}}
                    <div class="tab-pane" id="insta-photo" role="tabpanel">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Insta Photo Title</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="insta_photo_title" required value="{{ oldValue('insta_photo_title',$setting) }}" placeholder="Insta Photo Title" class="form-control {{ $errors->has('insta_photo_title')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Insta Photo Subtitle</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="insta_photo_subtitle" required value="{{ oldValue('insta_photo_subtitle',$setting) }}" placeholder="Insta Photo Subtitle" class="form-control {{ $errors->has('insta_photo_subtitle')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Insta Photo Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="insta_photo_image" value="{{ oldValue('insta_photo_image',$setting) }}" placeholder="Image" class="form-control">
                            </div>
                            <div class="col-sm-10">
                            @if(!empty(oldValue('insta_photo_image',$setting)))
                            <img src="{{ asset('ruploads/'.oldValue('insta_photo_image',$setting)) }}?w=200&h=200" class="img-thumbnail" style="width:200px;">
                                @endif
                            </div>
                            
                            
                        </div>
                        <div class="form-group row appendable">
                            <label class="col-sm-2 col-form-label departschedule">Key Values</label>
        
        
                            @php
                                $extraValues = oldValue('insta_photo_details');
                                if($extraValues)
                                {
                                    $extraValues = json_decode(json_encode(array_filter(array_map('array_filter',$extraValues))));
                                    $extraIndexValue = count($extraValues);
                                }else{
                                    $extraValues = settings()->get('insta_photo_details');
                                    $extraValues = $extraValues?json_decode($extraValues):[];
                                    $extraIndexValue = count($extraValues);
                                }
        
                            @endphp
                            @if($extraValues)
                            @php
                                // print_r($extraValues);exit;
                            @endphp
                                @foreach($extraValues as $key=>$extraInfo)
                                @if(isset($extraInfo->title) && isset($extraInfo->link))
                                
                                    <div class="main_content_desc appended_div">
                                        <div class="col-md-12 row">
                                            <div class="col-md-10 row">
                                                <div class="col-md-6 col6">
                                                    <input  id="insta_photo_details_{{ $key }}_key" name="insta_photo_details[{{ $key }}][title]" value="{{ $extraInfo->title }}" placeholder="Title" class="form-control">
                                                </div>
                                                 <div class="col-md-6 col6">
                                                    <input  name="insta_photo_details[{{ $key }}][link]" value="{{ $extraInfo->link }}" placeholder="Link" class="form-control">
                                                </div>
                                                <div class="col-md-12 col12 row">
                                                    <div class="col-md-6">
                                                    <input type="file" name="insta_photo_details[{{ $key }}][image]" placeholder="Image" class="form-control">
                                                    </div>
                                                    <div class="col-md-6">
                                                    @if(!empty($extraInfo->image))
                                                    <input type="hidden" name="insta_photo_details[{{ $key }}][old_image]" value="{{ $extraInfo->image }}">
                                                    <img src="{{ asset('ruploads/'.$extraInfo->image) }}?w=200&h=200" class="img-thumbnail" style="width:200px;">
                                                    @endif
                                                    </div>
                                                </div>
        
                                            </div>
                                            <div class="col-md-2 btndeladd">
                                                <div class="grp-btn">
                                                    <a href="#" style="" class="btn btn-danger waves-effect waves-light tier_delete">
                                                        <span class="fas fa-trash"></span>
        
                                                    </a>
        
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    @endif
                                @endforeach
        
                            @endif
                            <div class="clearfix"></div>
                            <div id="tier_pricing" class="tier_pricing departpricing">
                                <div class="appended_div">
                                    <div class="col-md-12 row">
                                        <div class="col-md-10 row">
                                            <div class="col-md-6 col6">
                                                <input  id="insta_photo_details_{{ $extraIndexValue }}_key" name="insta_photo_details[{{ $extraIndexValue }}][title]" value="" placeholder="Title" class="form-control">
                                            </div>
                                            <div class="col-md-6 col6">
                                                <input   name="insta_photo_details[{{ $extraIndexValue }}][link]" value="" placeholder="Link" class="form-control">
                                            </div>
                                            <div class="col-md-6 col6">
                                                <input type="file" name="insta_photo_details[{{ $extraIndexValue }}][image]" placeholder="Image" class="form-control">
                                            </div>

                                          
        
                                        </div>
                                        <div class="col-md-2 btndeladd">
                                            <div class="grp-btn">
                                                <a href="#" style="display: none" class="btn btn-danger waves-effect waves-light tier_delete">
                                                    <span class="fas fa-trash"></span>
                                                </a>
                                                <a href="#" class="btn btn-primary waves-effect waves-light extra_add tier_add_btn" id="extra_add"><span class="fa fa-plus-circle"></span></a>
                                            </div>
                                        </div>
        
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div id="tier_price_append" class="tier_price_append extra_append"></div>
                        </div>
                    </div>
                    {{-- insta photo end --}}
                    {{-- discover-nepal --}}
                    <div class="tab-pane" id="discover-nepal" role="tabpanel">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Discover Nepal Title</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="discover_nepal_title" required value="{{ oldValue('discover_nepal_title',$setting) }}" placeholder="Discover Nepal Title" class="form-control {{ $errors->has('discover_nepal_title')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Discover Nepal Subtitle</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="discover_nepal_subtitle" required value="{{ oldValue('discover_nepal_subtitle',$setting) }}" placeholder="Discover Nepal Subtitle" class="form-control {{ $errors->has('discover_nepal_subtitle')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        
                        
                    </div>
                    {{--  end discover-nepal --}}
                    {{--  query-banner --}}
                    <div class="tab-pane" id="query-banner" role="tabpanel">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Query Banner Title</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="query_banner_title" required value="{{ oldValue('query_banner_title',$setting) }}" placeholder="Query Banner Title" class="form-control {{ $errors->has('query_banner_title')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Query Banner Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="query_banner_image" value="{{ oldValue('query_banner_image',$setting) }}" placeholder="Image" class="form-control">
                            </div>
                            <div class="col-sm-10">
                            @if(!empty(oldValue('query_banner_image',$setting)))
                            <img src="{{ asset('ruploads/'.oldValue('query_banner_image',$setting)) }}?w=200&h=200" class="img-thumbnail" style="width:200px;">
                                @endif
                            </div>
                        </div>
                        <div class="form-group row appendable">
                            <label class="col-sm-2 col-form-label departschedule">Key Values</label>
        
        
                            @php
                                $extraValues = oldValue('query_banner_details');
                                if($extraValues)
                                {
                                    $extraValues = json_decode(json_encode(array_filter(array_map('array_filter',$extraValues))));
                                    $extraIndexValue = count($extraValues);
                                }else{
                                    $extraValues = settings()->get('query_banner_details');
                                    $extraValues = $extraValues?json_decode($extraValues):[];
                                    $extraIndexValue = count($extraValues);
                                }
        
                            @endphp
                            @if($extraValues)
                            @php
                                                            // print_r($extraValues);exit;

                            @endphp
                                @foreach($extraValues as $key=>$extraInfo)
                                @if(isset($extraInfo->title) )
                                
                                    <div class="main_content_desc appended_div">
                                        <div class="col-md-12 row">
                                            <div class="col-md-10 row">
                                                <div class="col-md-6 col6">
                                                    <input  id="query_banner_details_{{ $key }}_key" name="query_banner_details[{{ $key }}][title]" value="{{ $extraInfo->title }}" placeholder="Title" class="form-control">
                                                </div>
                                                 <div class="col-md-6 col6">
                                                    <input  name="query_banner_details[{{ $key }}][content]" value="{{ $extraInfo->content }}" placeholder="Content" class="form-control">
                                                </div>
                                                
        
                                            </div>
                                            <div class="col-md-2 btndeladd">
                                                <div class="grp-btn">
                                                    <a href="#" style="" class="btn btn-danger waves-effect waves-light tier_delete">
                                                        <span class="fas fa-trash"></span>
        
                                                    </a>
        
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    @endif
                                @endforeach
        
                            @endif
                            <div class="clearfix"></div>
                            <div id="tier_pricing" class="tier_pricing departpricing">
                                <div class="appended_div">
                                    <div class="col-md-12 row">
                                        <div class="col-md-10 row">
                                            <div class="col-md-6 col6">
                                                <input  id="query_banner_details_{{ $extraIndexValue }}_key" name="query_banner_details[{{ $extraIndexValue }}][title]" value="" placeholder="Title" class="form-control">
                                            </div>
                                            <div class="col-md-6 col6">
                                                <input   name="query_banner_details[{{ $extraIndexValue }}][content]" value="" placeholder="Link" class="form-control">
                                            </div>
                                           
                                          
        
                                        </div>
                                        <div class="col-md-2 btndeladd">
                                            <div class="grp-btn">
                                                <a href="#" style="display: none" class="btn btn-danger waves-effect waves-light tier_delete">
                                                    <span class="fas fa-trash"></span>
                                                </a>
                                                <a href="#" class="btn btn-primary waves-effect waves-light extra_add tier_add_btn" id="extra_add"><span class="fa fa-plus-circle"></span></a>
                                            </div>
                                        </div>
        
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div id="tier_price_append" class="tier_price_append extra_append"></div>
                        </div>
                            
                            
                        
                        
                        
                    </div>
                    {{-- end  query-banner--}}
                    {{-- newsletter --}}
                    <div class="tab-pane" id="newsletter" role="tabpanel">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Newsletter Title</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="newsletter_title" required value="{{ oldValue('newsletter_title',$setting) }}" placeholder="Newsletter Title" class="form-control {{ $errors->has('newsletter_title')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Newsletter SubTitle</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="newsletter_subtitle" required value="{{ oldValue('newsletter_subtitle',$setting) }}" placeholder="Newsletter SubTitle" class="form-control {{ $errors->has('newsletter_subtitle')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                    </div>
                    {{-- end newsletter --}}
                        
                            
                            
                        
                        
                        
                 

                      {{-- testimonial --}}
                      <div class="tab-pane" id="testimonial" role="tabpanel">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Testimonial  Title</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="testimonial_title"  value="{{ oldValue('testimonial_title',$setting) }}" placeholder="Testimonial Title" class="form-control {{ $errors->has('testimonial_title')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Testimonial Subtitle</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="testimonial_subtitle"  value="{{ oldValue('testimonial_subtitle',$setting) }}" placeholder="Why Us Subtitle" class="form-control {{ $errors->has('testimonial_subtitle')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                     
                    </div>
                    {{-- end testimonial --}} 

                       {{-- blog --}}
                       <div class="tab-pane" id="blog" role="tabpanel">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="title"  value="{{ oldValue('title',$setting) }}" placeholder="Title" class="form-control {{ $errors->has('title')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Content</label>
                            <div class="col-sm-10">
                                <textarea rows="5" name="content" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('content',$setting) }}</textarea>

                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Link</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="link"  value="{{ oldValue('link',$setting) }}" placeholder="link" class="form-control {{ $errors->has('link')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Button Text</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="button_text"  value="{{ oldValue('button_text',$setting) }}" placeholder="button text" class="form-control {{ $errors->has('button_text')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                     
                    </div>
                    {{-- end blog --}} 


                    {{-- home offer --}}
                    <div class="tab-pane" id="home-offer" role="tabpanel">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Home Offer Title</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="home_offer_title"  value="{{ oldValue('home_offer_title',$setting) }}" placeholder="Home Offer Title" class="form-control {{ $errors->has('home_offer_title')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Home Offer Subtitle</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="home_offer_subtitle"  value="{{ oldValue('home_offer_subtitle',$setting) }}" placeholder="Home Offer Subtitle" class="form-control {{ $errors->has('home_offer_subtitle')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Home Offer Link Text</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="home_offer_link_text"  value="{{oldValue('home_offer_link_text',$setting) }}" placeholder="Home Offer Link Text" class="form-control {{ $errors->has('home_offer_link_text')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Home Offer Link</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="home_offer_link"  value="{{oldValue('home_offer_link',$setting) }}" placeholder="Home Offer Link" class="form-control {{ $errors->has('home_offer_link')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Home Offer Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="home_offer_image" value="{{ oldValue('home_offer_image',$setting) }}" placeholder="Image" class="form-control">
                            </div>
                            <div class="col-sm-10">
                            @if(!empty(oldValue('home_offer_image',$setting)))
                            <img src="{{ asset('ruploads/'.oldValue('home_offer_image',$setting)) }}?w=200&h=200" class="img-thumbnail" style="width:200px;">
                                @endif
                            </div>
                            
                            
                        </div>
                       
                       
                    </div>
                    {{-- end home offer --}}

                     {{-- home-features --}}
                    <div class="tab-pane" id="home-features" role="tabpanel">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Home Features Title</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="home_features_title"
                                  value="{{ oldValue('home_features_title',$setting) }}"
                                   placeholder="Home Features Title"
                                    class="form-control {{ $errors->has('home_features_title')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Home Features Subtitle</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="home_features_subtitle"
                                  value="{{ oldValue('home_features_subtitle',$setting) }}"
                                   placeholder="Home Features Subtitle" 
                                   class="form-control {{ $errors->has('home_features_subtitle')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>

                        <div class="form-group row appendable">
                            <label class="col-sm-2 col-form-label departschedule">Key Values</label>
        
        
                            @php
                                $extraValues = oldValue('home_features_details');
                                if($extraValues)
                                {
                                    $extraValues = json_decode(json_encode(array_filter(array_map('array_filter',$extraValues))));
                                    $extraIndexValue = count($extraValues);
                                }else{
                                    $extraValues = settings()->get('home_features_details');
                                    $extraValues = $extraValues?json_decode($extraValues):[];
                                    $extraIndexValue = count($extraValues);
                                }
        
                            @endphp
                            @if($extraValues)
        
                            @foreach($extraValues as $key=>$extraInfo)
                            @if(isset($extraInfo->title) && isset($extraInfo->description))
                              <div class="main_content_desc appended_div">
                                        <div class="col-md-12 row">
                                            <div class="col-md-10 row">
                                                <div class="col-md-6 col6">
                                                    <input  id="home_features_details_{{ $key }}_key" name="home_features_details[{{ $key }}][title]" value="{{ $extraInfo->title }}" placeholder="Title" class="form-control">
                                                </div>
                                                 <div class="col-md-6 col6">
                                                    <input type="text" value="{{ $extraInfo->description }}" name="home_features_details[{{ $key }}][description]" placeholder="Description" class="form-control">
                                                </div>
                                                <div class="col-md-12 col12 row">
                                                    <div class="col-md-6">
                                                    <input type="file" name="home_features_details[{{ $key }}][image]" placeholder="Image" class="form-control">
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- {{dd(asset('ruploads/'.$extraInfo->image))}} --}}
                                                  
                                                        @if(!empty($extraInfo->image))
                                                        <input type="hidden" name="home_features_details[{{ $key }}][old_image]" value="{{ $extraInfo->image }}">
                                                        <img src="{{ asset('ruploads/'.$extraInfo->image) }}?w=200&h=200" class="img-thumbnail" style="width:200px;">
                                                        @endif
                                                    </div>
                                                </div>
        
                                            </div>
                                            <div class="col-md-2 btndeladd">
                                                <div class="grp-btn">
                                                    <a href="#" style="" class="btn btn-danger waves-effect waves-light tier_delete">
                                                        <span class="fas fa-trash"></span>
        
                                                    </a>
        
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    @endif
                                @endforeach
        
                            @endif
                            <div class="clearfix"></div>
                            <div id="tier_pricing" class="tier_pricing departpricing">
                                <div class="appended_div">
                                    <div class="col-md-12 row">
                                        <div class="col-md-10 row">
                                            <div class="col-md-6 col6">
                                                <input  id="home_features_details_{{ $extraIndexValue }}_key" name="home_features_details[{{ $extraIndexValue }}][title]" value="" placeholder="Title" class="form-control">
                                            </div>
                                          
                                            <div class="col-md-6 col6">
                                                <input type="text" value="" name="home_features_details[{{ $extraIndexValue }}][description]" placeholder="Description" class="form-control">
                                            </div>
                                            <div class="col-md-6 col6">
                                                <input type="file" name="home_features_details[{{ $extraIndexValue }}][image]" placeholder="Image" class="form-control">
                                            </div>

                                          
        
                                        </div>
                                        <div class="col-md-2 btndeladd">
                                            <div class="grp-btn">
                                                <a href="#" style="display: none" class="btn btn-danger waves-effect waves-light tier_delete">
                                                    <span class="fas fa-trash"></span>
                                                </a>
                                                <a href="#" class="btn btn-primary waves-effect waves-light extra_add tier_add_btn" id="extra_add"><span class="fa fa-plus-circle"></span></a>
                                            </div>
                                        </div>
        
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div id="tier_price_append" class="tier_price_append extra_append"></div>
                        </div>
                    </div> 
                    {{-- end home-features --}} 
                    
                    {{-- home-notice --}}
                    <div class="tab-pane" id="home-notice" role="tabpanel">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Home Notice Title</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="home-notice_title"
                                  value="{{ oldValue('home-notice_title',$setting) }}"
                                   placeholder="Home Notice Title"
                                    class="form-control {{ $errors->has('home-notice_title')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Home Notice Link</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="home-notice_link"
                                  value="{{ oldValue('home-notice_link',$setting) }}"
                                   placeholder="Home Notice Link" 
                                   class="form-control {{ $errors->has('home-notice_link')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>

                       
                    </div> 
                    {{-- end home-notice --}}

                      {{-- Our Mission --}}
                      <div class="tab-pane" id="our-mission" role="tabpanel">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Our Mission Title</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="our_mission_title"
                                  value="{{ oldValue('our_mission_title',$setting) }}"
                                   placeholder="Our Mission Title"
                                    class="form-control {{ $errors->has('our_mission_title')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Our Mission Subtitle</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="our_mission_subtitle"
                                  value="{{ oldValue('our_mission_subtitle',$setting) }}"
                                   placeholder="Our Mission Subtitle" 
                                   class="form-control {{ $errors->has('our_mission_subtitle')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Our Mission Description</label>
                            <div class="col-sm-10">
                                <textarea rows="5" name="our_mission_description" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('our_mission_description',$setting) }}</textarea>

                                <span class="messages"></span>
                            </div>
                        </div>

                       
                    </div> 
                    {{-- end Our Mission --}}
                            

                    {{-- about-features --}}
                    <div class="tab-pane" id="about-features" role="tabpanel">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">About Features Title</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="about_features_title" 
                                required value="{{ oldValue('about_features_title',$setting) }}" placeholder="About Features Title"
                                 class="form-control {{ $errors->has('about_features_title')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">About Features Subtitle</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text"
                                 name="about_features_subtitle" required 
                                 value="{{ oldValue('about_features_subtitle',$setting) }}" placeholder="About Features Subtitle"
                                  class="form-control {{ $errors->has('about_features_subtitle')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">About Features Description</label>
                            <div class="col-sm-10">
                                <textarea rows="5" name="about_features_description" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('about_features_description',$setting) }}</textarea>

                                <span class="messages"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">About Features Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="about_features_image" value="{{ oldValue('about_features_image',$setting) }}" placeholder="Image" class="form-control">
                            </div>
                            <div class="col-sm-10">
                            @if(!empty(oldValue('about_features_image',$setting)))
                            <img src="{{ asset('ruploads/'.oldValue('about_features_image',$setting)) }}?w=200&h=200" class="img-thumbnail" style="width:200px;">
                                @endif
                            </div>
                            
                            
                        </div>

                        {{-- <div class="form-group row appendable">
                            <label class="col-sm-2 col-form-label departschedule">Key Values</label>
        
        
                            @php
                                $extraValues = oldValue('about_features_details');
                                if($extraValues)
                                {
                                    $extraValues = json_decode(json_encode(array_filter(array_map('array_filter',$extraValues))));
                                    $extraIndexValue = count($extraValues);
                                }else{
                                    $extraValues = settings()->get('about_features_details');
                                    $extraValues = $extraValues?json_decode($extraValues):[];
                                    $extraIndexValue = count($extraValues);
                                }
        
                            @endphp
                            @if($extraValues)
        
                            @foreach($extraValues as $key=>$extraInfo)
                            @if(isset($extraInfo->title) && isset($extraInfo->description))
                            
                                    <div class="main_content_desc appended_div">
                                        <div class="col-md-12 row">
                                            <div class="col-md-10 row">
                                                <div class="col-md-6 col6">
                                                    <input  id="about_features_details_{{ $key }}_key" name="about_features_details[{{ $key }}][title]" value="{{ $extraInfo->title }}" placeholder="Title" class="form-control">
                                                </div>
                                                <div class="col-md-6 col6">
                                                    <input type="text" value="{{ $extraInfo->description }}" name="about_features_details[{{ $key }}][description]" placeholder="Description" class="form-control">
                                                </div>
                                                <div class="col-md-12 col12 row">
                                                    <div class="col-md-6">
                                                    <input type="file" name="about_features_details[{{ $key }}][image]" placeholder="Image" class="form-control">
                                                    </div>
                                                    <div class="col-md-6">
                                                        @if(!empty($extraInfo->image))
                                                        <input type="hidden" name="about_features_details[{{ $key }}][old_image]" value="{{ $extraInfo->image }}">
                                                        <img src="{{ asset('ruploads/'.$extraInfo->image) }}?w=200&h=200" class="img-thumbnail" style="width:200px;">
                                                        @endif
                                                    </div>
                                                </div>
        
                                            </div>
                                            <div class="col-md-2 btndeladd">
                                                <div class="grp-btn">
                                                    <a href="#" style="" class="btn btn-danger waves-effect waves-light tier_delete">
                                                        <span class="fas fa-trash"></span>
        
                                                    </a>
        
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    @endif
                                @endforeach
        
                            @endif
                            <div class="clearfix"></div>
                            <div id="tier_pricing" class="tier_pricing departpricing">
                                <div class="appended_div">
                                    <div class="col-md-12 row">
                                        <div class="col-md-10 row">
                                            <div class="col-md-6 col6">
                                                <input  id="about_features_details_{{ $extraIndexValue }}_key" name="about_features_details[{{ $extraIndexValue }}][title]" value="" placeholder="Title" class="form-control">
                                            </div>
                                            <div class="col-md-6 col6">
                                                <input type="text" value="" name="about_features_details[{{ $extraIndexValue }}][description]" placeholder="Description" class="form-control">
                                            </div>
                                            <div class="col-md-6 col6">
                                                <input type="file" name="about_features_details[{{ $extraIndexValue }}][image]" placeholder="Image" class="form-control">
                                            </div>

                                          
        
                                        </div>
                                        <div class="col-md-2 btndeladd">
                                            <div class="grp-btn">
                                                <a href="#" style="display: none" class="btn btn-danger waves-effect waves-light tier_delete">
                                                    <span class="fas fa-trash"></span>
                                                </a>
                                                <a href="#" class="btn btn-primary waves-effect waves-light extra_add tier_add_btn" id="extra_add"><span class="fa fa-plus-circle"></span></a>
                                            </div>
                                        </div>
        
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div id="tier_price_append" class="tier_price_append extra_append"></div>
                        </div> --}}
                    </div>
                    {{-- end about-features --}}

                     {{-- footer --}}
                     <div class="tab-pane" id="footer" role="tabpanel">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Footer Title</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="footer_title"
                                  value="{{ oldValue('footer_title',$setting) }}"
                                   placeholder="Footer Title"
                                    class="form-control {{ $errors->has('footer_title')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Footer Description1</label>
                            <div class="col-sm-10">
                                <textarea rows="5" name="footer_description1" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('footer_description1',$setting) }}</textarea>

                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Footer Description2</label>
                            <div class="col-sm-10">
                                <textarea rows="5" name="footer_description2" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('footer_description2',$setting) }}</textarea>

                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Facebook Link</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="facebook_link"
                                  value="{{ oldValue('facebook_link',$setting) }}"
                                   placeholder="Facebook Link"
                                    class="form-control {{ $errors->has('facebook_link')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Instagram Link</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="instagram_link"
                                  value="{{ oldValue('instagram_link',$setting) }}"
                                   placeholder="Instagram Link"
                                    class="form-control {{ $errors->has('instagram_link')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Twitter Link</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="twitter_link"
                                  value="{{ oldValue('twitter_link',$setting) }}"
                                   placeholder="Twitter Link"
                                    class="form-control {{ $errors->has('twitter_link')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Linkedin Link</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="linkedin_link"
                                  value="{{ oldValue('linkedin_link',$setting) }}"
                                   placeholder="Linkedin Link"
                                    class="form-control {{ $errors->has('linkedin_link')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="phone"
                                  value="{{ oldValue('phone',$setting) }}"
                                   placeholder="phone"
                                    class="form-control {{ $errors->has('phone')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Extra Phone</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="extra_phone"
                                  value="{{ oldValue('extra_phone',$setting) }}"
                                   placeholder="extra_phone"
                                    class="form-control {{ $errors->has('extra_phone')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="address"
                                  value="{{ oldValue('address',$setting) }}"
                                   placeholder="address"
                                    class="form-control {{ $errors->has('address')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Copyright</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="copyright"
                                  value="{{ oldValue('copyright',$setting) }}"
                                   placeholder="copyright"
                                    class="form-control {{ $errors->has('copyright')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Opening Day</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="opening_day"
                                  value="{{ oldValue('opening_day',$setting) }}"
                                   placeholder="opening_day"
                                    class="form-control {{ $errors->has('opening_day')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Opening Time</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="opening_time"
                                  value="{{ oldValue('opening_time',$setting) }}"
                                   placeholder="opening_time"
                                    class="form-control {{ $errors->has('opening_time')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>


                       
                    </div> 
                    {{-- end footer --}}
                    
                    {{-- bundle --}}
                    <div class="tab-pane" id="bundle" role="tabpanel">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Bundle Title</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="bundle_title"
                                  value="{{ oldValue('bundle_title',$setting) }}"
                                   placeholder="Bundle Title"
                                    class="form-control {{ $errors->has('bundle_title')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Bundle Description</label>
                            <div class="col-sm-10">
                                <textarea rows="5" name="bundle_description" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('bundle_description',$setting) }}</textarea>

                                <span class="messages"></span>
                            </div>
                        </div>
                     </div> 
                    {{-- end bundle --}}
                            


                       {{-- our_branches_details --}}
                       <div class="tab-pane" id="our-branches" role="tabpanel">
                        <div class="form-group row appendable">
                            <label class="col-sm-2 col-form-label departschedule">Key Values</label>
        
        
                            @php
                                $extraValues = oldValue('our_branches_details');
                                if($extraValues)
                                {
                                    $extraValues = json_decode(json_encode(array_filter(array_map('array_filter',$extraValues))));
                                    $extraIndexValue = count($extraValues);
                                }else{
                                    $extraValues = settings()->get('our_branches_details');
                                    $extraValues = $extraValues?json_decode($extraValues):[];
                                    $extraIndexValue = count($extraValues);
                                }
        
                            @endphp
                            @if($extraValues)
        
                                @foreach($extraValues as $key=>$extraInfo)
                                @if(isset($extraInfo->phone) && isset($extraInfo->address) && isset($extraInfo->email) && isset($extraInfo->name))
                            
                                    <div class="main_content_desc appended_div">
                                        <div class="col-md-12 row">
                                            <div class="col-md-10 row">
                                                <div class="col-md-6 col6">
                                                    <input  id="our_branches_details_{{ $key }}_key" name="our_branches_details[{{ $key }}][name]" value="{{ $extraInfo->name }}" placeholder="Name" class="form-control">
                                                </div>
                                                <div class="col-md-6 col6">
                                                    <input type="text" value="{{ $extraInfo->phone }}" name="our_branches_details[{{ $key }}][phone]" placeholder="phone" class="form-control">
                                                </div>
                                                <div class="col-md-12 col12 row">
                                                    <div class="col-md-6">
                                                    <input type="email"  value="{{ $extraInfo->email }}"  name="our_branches_details[{{ $key }}][email]" placeholder="email" class="form-control">
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-12 col12 row">
                                                    <div class="col-md-6">
                                                    <input type="address"  value="{{ $extraInfo->address }}"  name="our_branches_details[{{ $key }}][address]" placeholder="address" class="form-control">
                                                    </div>
                                                    
                                                </div>
        
                                            </div>
                                            <div class="col-md-2 btndeladd">
                                                <div class="grp-btn">
                                                    <a href="#" style="" class="btn btn-danger waves-effect waves-light tier_delete">
                                                        <span class="fas fa-trash"></span>
        
                                                    </a>
        
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    @endif
                                @endforeach
        
                            @endif
                            <div class="clearfix"></div>
                            <div id="tier_pricing" class="tier_pricing departpricing">
                                <div class="appended_div">
                                    <div class="col-md-12 row">
                                        <div class="col-md-10 row">
                                            <div class="col-md-6 col6">
                                                <input  id="our_branches_details_{{ $extraIndexValue }}_key" name="our_branches_details[{{ $extraIndexValue }}][name]" value="" placeholder="Name" class="form-control">
                                            </div>
                                            <div class="col-md-6 col6">
                                                <input type="text" value="" name="our_branches_details[{{ $extraIndexValue }}][phone]" placeholder="phone" class="form-control">
                                            </div>
                                            <div class="col-md-6 col6">
                                                <input type="email" value="" name="our_branches_details[{{ $extraIndexValue }}][email]" placeholder="email" class="form-control">
                                            </div> 
                                             <div class="col-md-6 col6">
                                                <input type="address" value="" name="our_branches_details[{{ $extraIndexValue }}][address]" placeholder="address" class="form-control">
                                            </div>

                                          
        
                                        </div>
                                        <div class="col-md-2 btndeladd">
                                            <div class="grp-btn">
                                                <a href="#" style="display: none" class="btn btn-danger waves-effect waves-light tier_delete">
                                                    <span class="fas fa-trash"></span>
                                                </a>
                                                <a href="#" class="btn btn-primary waves-effect waves-light extra_add tier_add_btn" id="extra_add"><span class="fa fa-plus-circle"></span></a>
                                            </div>
                                        </div>
        
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div id="tier_price_append" class="tier_price_append extra_append"></div>
                        </div>
                    </div>
                    {{-- end our_branches --}}

                     {{-- contact --}}
                     <div class="tab-pane" id="contact" role="tabpanel">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Contact Address</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="contact_address"
                                  value="{{ oldValue('contact_address',$setting) }}"
                                   placeholder="Contact Address"
                                    class="form-control {{ $errors->has('contact_address')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
          
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Address Description</label>
                            <div class="col-sm-10">
                                <textarea rows="5" name="address_description" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('address_description',$setting) }}</textarea>

                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Address Link</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="address_link"
                                  value="{{ oldValue('address_link',$setting) }}"
                                   placeholder="address_link"
                                    class="form-control {{ $errors->has('address_link')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Contact Email</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="contact_email"
                                  value="{{ oldValue('contact_email',$setting) }}"
                                   placeholder="contact_email"
                                    class="form-control {{ $errors->has('contact_email')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
          
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email Description</label>
                            <div class="col-sm-10">
                                <textarea rows="5" name="email_description" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('email_description',$setting) }}</textarea>

                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email Link</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="email_link"
                                  value="{{ oldValue('email_link',$setting) }}"
                                   placeholder="email_link"
                                    class="form-control {{ $errors->has('v')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Contact Phone</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="contact_phone"
                                  value="{{ oldValue('contact_phone',$setting) }}"
                                   placeholder="contact_phone"
                                    class="form-control {{ $errors->has('contact_phone')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
          
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Phone Description</label>
                            <div class="col-sm-10">
                                <textarea rows="5" name="phone_description" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('phone_description',$setting) }}</textarea>

                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Phone Link</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="phone_link"
                                  value="{{ oldValue('phone_link',$setting) }}"
                                   placeholder="phone_link"
                                    class="form-control {{ $errors->has('phone_link')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="phone_number"
                                  value="{{ oldValue('phone_number',$setting) }}"
                                   placeholder="phone_number"
                                    class="form-control {{ $errors->has('phone_number')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        
                       
                    </div> 
                    {{-- end contact --}}
                        
                        {{-- home package --}}
                    <div class="tab-pane" id="home-package" role="tabpanel">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Home Package Title</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="home_package_title"  value="{{ oldValue('home_package_title',$setting) }}" placeholder="Home Package Title" class="form-control {{ $errors->has('home_package_title')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Home Package Subtitle</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="home_package_subtitle"  value="{{ oldValue('home_package_subtitle',$setting) }}" placeholder="Home Package Subtitle" class="form-control {{ $errors->has('home_package_subtitle')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                       
                       
                       
                       
                    </div>
                    {{-- end home offer --}}

                      {{-- fixed-departure --}}
                    <div class="tab-pane" id="fixed-departure" role="tabpanel">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Fixed Departure Title</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="fixed_departure_title"  value="{{ oldValue('fixed_departure_title',$setting) }}" placeholder="Fixed Departure Title" class="form-control {{ $errors->has('fixed_departure_title')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Fixed Departure Description</label>
                            <div class="col-sm-10">
                                <textarea rows="5" name="fixed_departure_description" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('fixed_departure_description',$setting) }}</textarea>

                                <span class="messages"></span>
                            </div>
                        </div>
                       
                       
                       
                       
                    </div>
                    {{-- end fixed-departure --}}

                      {{-- featured-blog --}}
                      <div class="tab-pane" id="featured-blog" role="tabpanel">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Fixed Departure Title</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="featured_blog_title"  value="{{ oldValue('featured_blog_title',$setting) }}" placeholder="Featured Blog Title" class="form-control {{ $errors->has('featured_blog_title')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Featured Blog Description</label>
                            <div class="col-sm-10">
                                <textarea rows="5" name="featured_blog_description" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('featured_blog_description',$setting) }}</textarea>

                                <span class="messages"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Things to know Nepal Title</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="nepal_blog_title"  value="{{ oldValue('nepal_blog_title',$setting) }}" placeholder="Blog Title" class="form-control {{ $errors->has('nepal_blog_title')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Things to know Nepal Description</label>
                            <div class="col-sm-10">
                                <textarea rows="5" name="nepal_blog_description" cols="5" class="form-control tinymce" placeholder="Default textarea">{{ oldValue('nepal_blog_description',$setting) }}</textarea>

                                <span class="messages"></span>
                            </div>
                        </div>
                       
                       
                       
                       
                    </div>
                    {{-- end featured-blog --}}

                    {{-- home review --}}
                    <div class="tab-pane" id="home-review" role="tabpanel">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Total Review</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="total_review"  value="{{ oldValue('total_review',$setting) }}" placeholder="Total review" class="form-control {{ $errors->has('total_review')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Rating out of</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="rating_out_of"  value="{{ oldValue('rating_out_of',$setting) }}" placeholder="Rating out of" class="form-control {{ $errors->has('rating_out_of')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Rating Value</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="rating_value"  value="{{ oldValue('rating_value',$setting) }}" placeholder="Rating value" class="form-control {{ $errors->has('rating_value')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>
                       
                       
                       
                       
                    </div>
                       {{-- end home review --}}

                          {{-- trips --}}
                    <div class="tab-pane" id="tour" role="tabpanel">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tour Details Caption</label>
                            <div class="col-sm-10">
                                <input data-validate="required" type="text" name="tour_details_caption" required value="{{ oldValue('tour_details_caption',$setting) }}" placeholder="Trip details caption" class="form-control {{ $errors->has('tour_details_caption')?'form-control-danger':'' }}">
                                <span class="messages"></span>
                            </div>
                        </div>                        
                        
                    </div>
                    {{--  end trips --}}
                    
                   
                
                
                
                <div class="clearfix"></div>
                <button class="btn btn-mat waves-effect waves-light btn-success" type="submit">Submit</button>
            </form>


        </div>
    </div>
@stop

@section('javascript')
        <script>
            $(document).ready(function () {
                function appendToDiv(event,add_btn,index = 0)
                {
                    var cur_form = event.closest('.appendable');
                    var append_cont = event.closest('.appendable').find('.tier_pricing').html();
                    $(cur_form).find('.'+add_btn).hide();
                    $(cur_form).find('.tier_price_append').append(append_cont);
                    $(cur_form).find('.tier_price_append').find('.tier_delete').show();
                    $(cur_form).find('.tier_price_append').find('.'+add_btn+':last').show();
                }
                var newIndex = {{ $extraIndexValue }};
                var newIndexValue = {{ $extraIndexValue }};
                $(document).on('click','.extra_add',function (e) {
                    e.preventDefault();
                    appendToDiv($(this),'extra_add');
                    newIndex = newIndex+1;

                    $(".extra_append").find('.appended_div:last').find('.indexed').each(function (k,v) {
                        var oldName = $(v).attr('name');
                        var oldId = $(v).attr('id');

                        var newName = oldName.replace("extra_info["+newIndexValue+"]","extra_info["+newIndex+"]");

                        $(v).attr('name',newName);
                        if(oldId){
                            var newId = oldId.replace("extra_info_"+newIndexValue+"_","extra_info_"+newIndex+"_");
                            $(v).attr('id',newId);
                        }

                    });

                });
                $(document).on('click','.tier_delete',function (e) {
                    e.preventDefault();
                    // var cur_form = $(this).closest('.panel');
                    var cur_form = $("#main");
                    $(this).closest('.appended_div').remove();
                    $(cur_form).find('.appended_div:last').find('.tier_add_btn').show();
                });
            });

        </script>
@stop