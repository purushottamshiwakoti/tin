<?php
namespace App\Services\Backend\Features\Users;

use App\Domains\Backend\Jobs\MakeDatatableSearchFieldsJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Domains\Users\Jobs\DatatablePaginateUsersJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ListUsersFeature extends Feature
{
    public function handle(Request $request)
    {
        $searchData = $this->run(new MakeDatatableSearchFieldsJob($request->all()));
        $data = $this->run(new DatatablePaginateUsersJob($searchData,$request->get('length')));
        return $this->run(new RespondWithJsonJob($data));
    }
}