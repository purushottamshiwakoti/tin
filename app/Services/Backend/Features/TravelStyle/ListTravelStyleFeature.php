<?php
namespace App\Services\Backend\Features\TravelStyle;

use App\Domains\Backend\Jobs\MakeDatatableSearchFieldsJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;
use App\Domains\TravelStyles\Jobs\DatatablePaginateTravelStyleJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;

class ListTravelStyleFeature extends Feature
{
    public function handle(Request $request)
    {
        $searchData = $this->run(new MakeDatatableSearchFieldsJob($request->all()));
        $data = $this->run(new DatatablePaginateTravelStyleJob($searchData,$request->get('length')));

        return $this->run(new RespondWithJsonJob($data));

    }
}
