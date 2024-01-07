<?php
namespace App\Services\Backend\Features\Teams;

use App\Domains\Backend\Jobs\MakeDatatableSearchFieldsJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Domains\Teams\Jobs\DatatablePaginateTeamJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ListTeamFeature extends Feature
{
    public function handle(Request $request)
    {
        $searchData = $this->run(new MakeDatatableSearchFieldsJob($request->all()));
        $data = $this->run(new DatatablePaginateTeamJob($searchData,$request->get('length')));

        return $this->run(new RespondWithJsonJob($data));

    }
}
