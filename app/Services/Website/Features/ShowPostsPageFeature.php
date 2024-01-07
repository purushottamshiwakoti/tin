<?php
namespace App\Services\Website\Features;

use Lucid\Units\Feature;
use Illuminate\Http\Request;
use App\Domains\Metas\Jobs\MakeMetasJob;
use App\Domains\Blog\Jobs\GetAllPostsJob;
use App\Domains\Blog\Jobs\GetNepalPostJob;
use App\Domains\Blog\Jobs\GetPostsByScopeJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Pages\Jobs\GetScopedPagesJob;
use App\Domains\Blog\Jobs\GetRecentlyUploadedJob;
use App\Domains\Pages\Jobs\GetSinglePageBySlugJob;

class ShowPostsPageFeature extends Feature
{
    public function handle(Request $request)
    {
      
        $data = [];
      
        $data['page'] = $this->run(new GetSinglePageBySlugJob('blog'));
        $data['recentlyUploaded'] = $this->run(new GetRecentlyUploadedJob('blog'));
        $data['nepalPostsBlog'] = $this->run(new GetScopedPagesJob(['NepalHomeFeatured']));

        // $data['metas'] = $this->run(new MakeMetasJob($data['page']));
        $data['posts'] = $this->run(GetAllPostsJob::class);
        // $data['featured'] = $this->run(new GetPostsByScopeJob(['Published','Featured']));
        return $this->run(new RespondWithViewJob('website::pages.blog',$data));
    }
}