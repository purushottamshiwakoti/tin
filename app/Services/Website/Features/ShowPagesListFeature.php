<?php
namespace App\Services\Website\Features;

use Lucid\Units\Feature;
use Illuminate\Http\Request;
use App\Domains\Pages\Jobs\GetAllPagesJob;
use App\Domains\Http\Jobs\RespondWithViewJob;


class ShowPagesListFeature extends Feature
{
    public function handle(Request $request)
    {
      
        $data = [];
      
        // $data['page'] = $this->run(new GetSinglePageBySlugJob('blog'));
        // $data['recentlyUploaded'] = $this->run(new GetRecentlyUploadedJob('blog'));
        // $data['nepalPostsBlog'] = $this->run(new GetScopedPagesJob(['NepalHomeFeatured']));

        $data['pages'] = $this->run(GetAllPagesJob::class);
        return $this->run(new RespondWithViewJob('website::pages.pages',$data));
    }
}