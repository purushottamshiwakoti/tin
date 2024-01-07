<?php
namespace App\Services\Website\Features;

use App\Domains\Blog\Jobs\GetPostsByTagJob;

use Illuminate\Http\Request;

use App\Domains\Blog\Jobs\GetArchivePostsJob;

use App\Domains\Blog\Jobs\GetCategoryBySlugJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Metas\Jobs\MakeMetasJob;
use Lucid\Units\Feature;
use App\Domains\Blog\Jobs\GetRecentlyUploadedJob;

use App\Domains\Pages\Jobs\GetSinglePageBySlugJob;
use App\Domains\Blog\Jobs\GetArchiveListJob;
use App\Domains\Blog\Jobs\GetPostTagsJob;
use App\Domains\Categories\Jobs\GetAllCategoriesJob;

class ShowBlogTagPageFeature extends Feature
{
    public function handle(Request $request)
    {
       

        
        
        $data['posts'] = $this->run(new GetPostsByTagJob($request->tag));
        // dd($data['posts']);
        $data['page_title'] = $request->tag;
        $data['page'] = $this->run(new GetSinglePageBySlugJob('blog'));
        
        $data['categories'] =$this->run(new GetAllCategoriesJob());
        $data['archives']=$this->run(new GetArchiveListJob());
        $data['tags']=$this->run(new GetPostTagsJob());
        
        
        $data['recentlyUploaded'] = $this->run(new GetRecentlyUploadedJob('blog'));
        return $this->run(new RespondWithViewJob('website::pages.blog-tag',$data));
    }
}