<?php
namespace App\Services\Website\Features;

use App\Flight;
use Lucid\Units\Feature;
use App\Data\Models\Page;
use Illuminate\Http\Request;
use App\Domains\Metas\Jobs\MakeMetasJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Pages\Jobs\GetSinglePageBySlugJob;
use App\FlightDeparture;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GetFlightDetailPageFeature extends Feature
{
    public function handle(Request $request)
    {

        $template = 'flights-detail';
        // $data['page'] = $this->run(new GetSinglePageBySlugJob($page));
        // $data['metas'] = $this->run(new MakeMetasJob($data['page']));
        // $data["page"] = Page::where('slug', 'flights')->first();


        $data['flight'] = Flight::where('slug', $request->slug)->first();
        if($data['flight'] && $data['flight']->category){
         $data['similar_packages'] = Flight::where('category', $data['flight']->category)
         ->where('id', '!=', $data['flight']->id)
         ->get();
         $data['metas'] = (object)[
            'meta_title' => $data['flight']->seo_title,
            'meta_keywords' => $data['flight']->seo_keywords,
            'meta_description' => $data['flight']->seo_description,
            'image' => null,
            'page_title' => $data['flight']->seo_title,

        ];
        // dd($data['metas']);
        }
         $data['departure'] = FlightDeparture::where('flight_id', $data['flight']->id)->get();
        try{

            return $this->run(new RespondWithViewJob('website::pages.'.$template,$data));
        }catch (\InvalidArgumentException $e)
        {            
            return $this->run(new RespondWithViewJob('website::pages.general',$data));
        }

    }
}
