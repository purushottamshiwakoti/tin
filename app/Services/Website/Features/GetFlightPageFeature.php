<?php
namespace App\Services\Website\Features;

use App\Flight;
use Lucid\Units\Feature;
use App\Data\Models\Page;
use Illuminate\Http\Request;
use App\Domains\Metas\Jobs\MakeMetasJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Pages\Jobs\GetSinglePageBySlugJob;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GetFlightPageFeature extends Feature
{
    public function handle(Request $request)
    {

        $page = $template = 'flights';
        $data['page'] = $this->run(new GetSinglePageBySlugJob($page));
        $data['metas'] = $this->run(new MakeMetasJob($data['page']));
        $data["page"] = Page::where('slug', 'flights')->first();
        $data["top_destinations"] = Flight::where('category', 'top_destination')->orWhere('category', 'both')->whereNotNull('publish')->orderBy('sort_order')->paginate(6);
        $data["top_selling"] = Flight::where('category', 'top_selling')->whereNotNull('publish')->orWhere('category', 'both')->whereNotNull('publish')->orderBy('sort_order')->paginate(9);

        // return $data['metas'];

        // $template = $data['page']->template;
        // dd($template);
        try{

            return $this->run(new RespondWithViewJob('website::pages.'.$template,$data));
        }catch (\InvalidArgumentException $e)
        {            
            return $this->run(new RespondWithViewJob('website::pages.general',$data));
        }

    }
}
