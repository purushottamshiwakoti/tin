<?php
namespace App\Services\Backend\Features\Roles;

use App\Domains\Backend\Jobs\MakeDatatableSearchFieldsJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Domains\Roles\Jobs\DatatablePaginateRolesJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ListRolesFeature extends Feature
{
    public function handle(Request $request)
    {
        $searchData = $this->run(new MakeDatatableSearchFieldsJob($request->all()));
        $data = $this->run(new DatatablePaginateRolesJob($searchData,$request->get('length')));
        return $this->run(new RespondWithJsonJob($data));
    }
}