<?php
namespace App\Services\Backend\Features\Trips;

use App\Domains\Activities\Jobs\DatatablePaginateActivitiesJob;
use App\Domains\Backend\Jobs\MakeDatatableSearchFieldsJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Domains\Trips\Jobs\DatatablePaginateTripsJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ListTripFeature extends Feature
{
    public function handle(Request $request)
    {
        $searchData = $this->run(new MakeDatatableSearchFieldsJob($request->all()));
        $data = $this->run(new DatatablePaginateTripsJob($searchData,$request->get('length')));

        return $this->run(new RespondWithJsonJob($data));

    }
}
