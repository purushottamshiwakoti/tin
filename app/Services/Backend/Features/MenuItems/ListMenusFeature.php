<?php
namespace App\Services\Backend\Features\MenuItems;

use App\Domains\Backend\Jobs\MakeDatatableSearchFieldsJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Domains\Menus\Jobs\DatatablePaginateMenuJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ListMenusFeature extends Feature
{
    public function handle(Request $request)
    {
        $searchData = $this->run(new MakeDatatableSearchFieldsJob($request->all()));
        $data = $this->run(new DatatablePaginateMenuJob($searchData,$request->get('length')));

        return $this->run(new RespondWithJsonJob($data));

    }
}
