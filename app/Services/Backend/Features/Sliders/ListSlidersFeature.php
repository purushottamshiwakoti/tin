<?php
namespace App\Services\Backend\Features\Sliders;

use App\Domains\Backend\Jobs\MakeDatatableSearchFieldsJob;
use App\Domains\Sliders\Jobs\DatatablePaginateSlidersJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ListSlidersFeature extends Feature
{
    public function handle(Request $request)
    {
        $searchData = $this->run(new MakeDatatableSearchFieldsJob($request->all()));
        $data = $this->run(new DatatablePaginateSlidersJob($searchData,$request->get('length')));

        return $this->run(new RespondWithJsonJob($data));

    }
}
