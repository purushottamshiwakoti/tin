<?php
namespace App\Services\Backend\Features\Pages;

use App\Domains\Backend\Jobs\MakeDatatableSearchFieldsJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Domains\Pages\Jobs\DatatablePaginatePagesJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ListPagesFeature extends Feature
{
    public function handle(Request $request)
    {

        $searchData = $this->run(new MakeDatatableSearchFieldsJob($request->all()));
        $data = $this->run(new DatatablePaginatePagesJob($searchData,$request->get('length')));
        return $this->run(new RespondWithJsonJob($data));
    }
}
