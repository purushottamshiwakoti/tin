<?php
namespace App\Services\Backend\Features\Regions;

use App\Domains\Activities\Jobs\DatatablePaginateActivitiesJob;
use App\Domains\Backend\Jobs\MakeDatatableSearchFieldsJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Domains\Regions\Jobs\DatatablePaginateRegionsJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ListRegionsFeature extends Feature
{
    public function handle(Request $request)
    {
        $searchData = $this->run(new MakeDatatableSearchFieldsJob($request->all()));
        $data = $this->run(new DatatablePaginateRegionsJob($searchData,$request->get('length')));

        return $this->run(new RespondWithJsonJob($data));

    }
}
