<?php
namespace App\Services\Website\Features;

use Lucid\Units\Feature;
use Illuminate\Http\Request;
use App\Domains\Metas\Jobs\MakeMetasJob;
use App\Domains\Blog\Jobs\GetPostTagsJob;
use App\Domains\Blog\Jobs\GetNepalPostJob;

use App\Domains\Blog\Jobs\GetArchiveListJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Pages\Jobs\GetScopedPagesJob;
use App\Domains\Blog\Jobs\GetCategoryBySlugJob;
use App\Domains\Blog\Jobs\GetRecentlyUploadedJob;
use App\Domains\Pages\Jobs\GetSinglePageBySlugJob;
use App\Domains\Categories\Jobs\GetAllCategoriesJob;

class ShowCategoryPostsPageFeature extends Feature
{
    public function handle(Request $request,$slug = null)
    {
       

        $data['categories'] =$this->run(new GetAllCategoriesJob());
        $data['archives']=$this->run(new GetArchiveListJob());
        $data['tags']=$this->run(new GetPostTagsJob());
        $data['nepalPosts'] = $this->run(new GetScopedPagesJob(['NepalHomeFeatured']));


        $data['page'] = $this->run(new GetSinglePageBySlugJob('blog'));
        $data['category'] = $this->run(new GetCategoryBySlugJob($request->category));
        // dd($data['posts']);
        $data['posts'] = $data['category']->posts;
        $data['metas'] = $this->run(new MakeMetasJob($data['category']));
        $data['page'] = $this->run(new GetSinglePageBySlugJob('blog'));
        $data['recentlyUploaded'] = $this->run(new GetRecentlyUploadedJob('blog'));
       
        return $this->run(new RespondWithViewJob('website::pages.blog-category',$data));
    }
}