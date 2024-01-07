<?php
namespace App\Services\Backend\Features\Settings;

use App\Domains\Attachments\Jobs\FilenameUploadMediaJob;
use App\Domains\Settings\Jobs\GetFirstSettingJob;
use App\Domains\Settings\Jobs\StoreUpdateSettingJob;
use App\Domains\Attachments\Jobs\SaveCoverImageJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Services\Backend\Http\Requests\StoreSettingRequest;
use Lucid\Units\Feature;

class StoreUpdateSettingFeature extends Feature
{
    public function handle(StoreSettingRequest $request)
    {
                //    print_r($request->all());exit;

        
        $input = $request->all();
        $setting = $this->run(new StoreUpdateSettingJob($request->except(['_token','extra_info','cover_image',
        'home_offer_image','insta_photo_image','query_banner_image','query_banner_details','insta_photo_details',
        'why_us_details','testimonial_details','home_features_details',
        'about_features_details','our_branches_details','about_features_image'])));
        if(!empty($request->home_offer_image)){
            $home_offer_image = $this->run(new FilenameUploadMediaJob($request->home_offer_image));
            settings()->set('home_offer_image',$home_offer_image->file_name);
            
        }
        if(!empty($request->insta_photo_image)){
            $insta_photo_image = $this->run(new FilenameUploadMediaJob($request->insta_photo_image));
            settings()->set('insta_photo_image',$insta_photo_image->file_name);
            
        }
        if(!empty($request->query_banner_image)){
            $query_banner_image = $this->run(new FilenameUploadMediaJob($request->query_banner_image));
            settings()->set('query_banner_image',$query_banner_image->file_name);
            
        }
          if(!empty($request->about_features_image)){
            $about_features_image = $this->run(new FilenameUploadMediaJob($request->about_features_image));
            settings()->set('about_features_image',$about_features_image->file_name);
            
        }
        
       
        

        if(!empty($input['why_us_details']))
        {
            $why_us = $input['why_us_details'];
            $infos = [];
            // print_r($why_us);exit;
            
            foreach($why_us as $info)
            {
                $newObj = [];
                if(!empty($info['title'])){
                    $newObj['title'] = $info['title'];    
                }
                if(!empty($info['description'])){
                    $newObj['description'] = $info['description'];    
                }
                
                // print_r($why_us);exit;
                if(!empty($info['image'])){
                    $image = $this->run(new FilenameUploadMediaJob($info['image']));
                    if($image){
                        $newObj['image']= $image->file_name;
                    }
                }else{
                    $newObj['image'] = !empty($info['old_image'])?$info['old_image']:'';
                }
                
                if(!empty($newObj))
                {
                    $infos[] = $newObj;
                }
            
            }
            // print_r($infos);exit;
            settings()->set('why_us_details',json_encode($infos));
            
        } 
        
        if(!empty($input['insta_photo_details']))
        {
            $insta_photo = $input['insta_photo_details'];
            $infos = [];
            
            foreach($insta_photo as $info)
            {
                $newObj = [];
                if(!empty($info['title'])){
                                $newObj['title'] = $info['title'];    
                            }
                            if(!empty($info['link'])){
                                $newObj['link'] = $info['link'];    
                            }
                
                if(!empty($info['image'])){
                    $image = $this->run(new FilenameUploadMediaJob($info['image']));
                    if($image){
                        $newObj['image']= $image->file_name;
                    }
                }else{
                    $newObj['image'] = !empty($info['old_image'])?$info['old_image']:'';
                }
                
                if(!empty($newObj))
                {
                    $infos[] = $newObj;
                }
            
            }
            settings()->set('insta_photo_details',json_encode($infos));
            
        }
        

    

        if(!empty($input['home_features_details']))
        {
            $home_features = $input['home_features_details'];
            $infos = [];
            foreach($home_features as $info)
            {
                $newObj = [];
                if(!empty($info['title'])){
                    $newObj['title'] = $info['title'];    
                }
                if(!empty($info['description'])){
                    $newObj['description'] = $info['description'];    
                }
                
                if(!empty($info['image'])){
                    $image = $this->run(new FilenameUploadMediaJob($info['image']));
                    if($image){
                        $newObj['image']= $image->file_name;
                    }
                }else{
                    $newObj['image'] = !empty($info['old_image'])?$info['old_image']:'';
                }
                
                if(!empty($newObj))
                {
                    $infos[] = $newObj;
                }
            
            }
            settings()->set('home_features_details',json_encode($infos));
            
        } 
        
        if(!empty($input['query_banner_details']))
        {
            $query_banner = $input['query_banner_details'];
            $infos = [];
            foreach($query_banner as $info)
            {
                $newObj = [];
                if(!empty($info['title'])){
                    $newObj['title'] = $info['title'];    
                }
                if(!empty($info['content'])){
                    $newObj['content'] = $info['content'];    
                }
                
              
                
                if(!empty($newObj))
                {
                    $infos[] = $newObj;
                }
            
            
            }
            settings()->set('query_banner_details',json_encode($infos));
            
        }
        
        // if(!empty($input['about_features_details']))
        // {
        //     $about_features = $input['about_features_details'];
        //     $infos = [];
        //     foreach($about_features as $info)
        //     {
        //         $newObj = [];
        //         if(!empty($info['title'])){
        //             $newObj['title'] = $info['title'];    
        //         }
        //         if(!empty($info['description'])){
        //             $newObj['description'] = $info['description'];    
        //         }
                
        //         if(!empty($info['image'])){
        //             $image = $this->run(new FilenameUploadMediaJob($info['image']));
        //             if($image){
        //                 $newObj['image']= $image->file_name;
        //             }
        //         }else{
        //             $newObj['image'] = !empty($info['old_image'])?$info['old_image']:'';
        //         }
                
        //         if(!empty($newObj))
        //         {
        //             $infos[] = $newObj;
        //         }
            
        //     }
        //     settings()->set('about_features_details',json_encode($infos));
            
        // }
     
        if(!empty($input['our_branches_details']))
        {
            $our_branches = $input['our_branches_details'];
            // print_r($our_branches);exit;
            $infos = [];
            foreach($our_branches as $info)
            {
                // print_r($info);exit;

                $newObj = [];
                if(!empty($info['name'])){
                    $newObj['name'] = $info['name'];    
                }
                if(!empty($info['phone'])){
                    $newObj['phone'] = $info['phone'];    
                }
                if(!empty($info['email'])){
                    $newObj['email'] = $info['email'];    
                }
                if(!empty($info['address'])){
                    $newObj['address'] = $info['address'];    
                }
                
                if(!empty($newObj))
                {
                    $infos[] = $newObj;
                }
            
            }
            settings()->set('our_branches_details',json_encode($infos));
            
        }
        // settings()->save();
        
        // if($cover_image){
        //     settings()->set('cover_image',$cover_image->file_name);
        // }
    //    print_r('done');exit;
        
        if(settings()->save())
        {
            $result = ['message'=>'Setting Updated!!','alert-type'=>'success'];
        }else{
            $result = ['message'=>'Something went wrong','alert-type'=>'error'];
        }
        return redirect()->back()->with($result);

    }
}