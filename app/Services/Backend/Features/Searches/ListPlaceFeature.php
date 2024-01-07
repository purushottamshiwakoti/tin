<?php
namespace App\Services\Backend\Features\Searches;

use App\Domains\Backend\Jobs\MakeDatatableSearchFieldsJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Domains\Search\Jobs\DatatablePaginatePlaceJob;
use App\Domains\Search\Jobs\DatatablePaginateSearchJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ListPlaceFeature extends Feature
{
    public function handle(Request $request)
    {
        $searchData = $this->run(new MakeDatatableSearchFieldsJob($request->all()));
        $data = $this->run(new DatatablePaginatePlaceJob($searchData,$request->get('length')));

        return $this->run(new RespondWithJsonJob($data));

    }
}