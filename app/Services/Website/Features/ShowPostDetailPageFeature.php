<?php
namespace App\Services\Website\Features;

use Lucid\Units\Feature;
use Illuminate\Http\Request;
use App\Domains\Metas\Jobs\MakeMetasJob;
use App\Domains\Blog\Jobs\GetNepalPostJob;
use App\Domains\Blog\Jobs\GetOtherBlogsJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Pages\Jobs\GetScopedPagesJob;
use App\Domains\Blog\Jobs\GetPublishCommentJob;
use App\Domains\Backend\Jobs\GetPublishTypesJob;
use App\Domains\Blog\Jobs\GetSinglePostBySlugJob;

class ShowPostDetailPageFeature extends Feature
{
    public function handle(Request $request)
    {
        
        $data['post'] = $this->run(new GetSinglePostBySlugJob($request->post));
        $data['comment']= $this->run (new GetPublishCommentJob());
        $data['other_post'] = $this->run(new GetOtherBlogsJob($data['post']));
        $data['nepalPostsBlogDetails'] = $this->run(new GetScopedPagesJob(['NepalHomeFeatured']));

        if(!$data['post']->publish && !auth('web')->user())
        {
            abort(404);
        }
        $data['metas'] = $this->run(new MakeMetasJob($data['post']));
        return $this->run(new RespondWithViewJob('website::blog.detail',$data));
    }
}