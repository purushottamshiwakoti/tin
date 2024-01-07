<?php
namespace App\Services\Website\Features;

use Lucid\Units\Feature;

use Illuminate\Http\Request;
use App\Domains\Metas\Jobs\MakeMetasJob;
use App\Domains\Blog\Jobs\GetPostTagsJob;
use App\Domains\Blog\Jobs\GetNepalPostJob;
use App\Domains\Blog\Jobs\GetArchiveListJob;

use App\Domains\Blog\Jobs\GetArchivePostsJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Pages\Jobs\GetScopedPagesJob;
use App\Domains\Blog\Jobs\GetCategoryBySlugJob;
use App\Domains\Blog\Jobs\GetRecentlyUploadedJob;
use App\Domains\Pages\Jobs\GetSinglePageBySlugJob;
use App\Domains\Categories\Jobs\GetAllCategoriesJob;
use Exception;

class ShowArchivePageFeature extends Feature
{
    public function handle(Request $request)
    {
       
        try{
        $data['page'] = $this->run(new GetSinglePageBySlugJob('blog'));
        
        $data['categories'] =$this->run(new GetAllCategoriesJob());
        $data['archives']=$this->run(new GetArchiveListJob());
        $data['tags']=$this->run(new GetPostTagsJob());
        
        $data['nepalPosts'] = $this->run(new GetScopedPagesJob(['NepalHomeFeatured']));

        $data['recentlyUploaded'] = $this->run(new GetRecentlyUploadedJob('blog'));
        $data['posts'] = $this->run(new GetArchivePostsJob($request->archive));
       
        $data['page_title'] = $request->archive;
        return $this->run(new RespondWithViewJob('website::pages.blog-archive',$data));
        } catch (Exception $e)
        {
            return redirect()->route('website.home')->with(['alert-type'=>'error','message'=>'Opps Something went wrong.']);
        }
    }
}