<?php
namespace App\Services\Backend\Features\Destinations;

use App\Domains\Backend\Jobs\MakeDatatableSearchFieldsJob;
use App\Domains\Destinations\Jobs\DatatablePaginateDestinationsJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ListDestinationsFeature extends Feature
{
    public function handle(Request $request)
    {
        $searchData = $this->run(new MakeDatatableSearchFieldsJob($request->all()));
        $data = $this->run(new DatatablePaginateDestinationsJob($searchData,$request->get('length')));

        return $this->run(new RespondWithJsonJob($data));

    }
}
