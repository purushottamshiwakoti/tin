<?php
namespace App\Services\Website\Features;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Metas\Jobs\MakeMetasJob;
use App\Domains\Pages\Jobs\GetSinglePageBySlugJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShowPageDetailFeature extends Feature
{
    public function handle(Request $request)
    {


        $page = $request->slug;

        $data['page'] = $this->run(new GetSinglePageBySlugJob($page));
        
        $data['pageFeaturedTrips'] = $data['page']->featuredTrips;

        $data['metas'] = $this->run(new MakeMetasJob($data['page']));
        $template = $data['page']->template;
        try{

            return $this->run(new RespondWithViewJob('website::pages.'.$template,$data));
        }catch (\InvalidArgumentException $e)
        {            
            return $this->run(new RespondWithViewJob('website::pages.general',$data));
        }

    }
}
