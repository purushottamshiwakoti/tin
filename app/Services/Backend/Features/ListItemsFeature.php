<?php
namespace App\Services\Backend\Features;

use App\Data\Repositories\Repository;
use App\Domains\Backend\Jobs\DatatablePaginateJob;
use App\Domains\Backend\Jobs\MakeDatatableSearchFieldsJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ListItemsFeature extends Feature
{

    public $interface;
    public function __construct(Repository $interface)
    {
        $this->interface = $interface;
    }

    public function handle(Request $request)
    {
        $searchData = $this->run(new MakeDatatableSearchFieldsJob($request->all()));
        $data = $this->run(new DatatablePaginateJob($this->interface,$searchData,$request->get('length')));
        return $this->run(new RespondWithJsonJob($data));
    }
}
