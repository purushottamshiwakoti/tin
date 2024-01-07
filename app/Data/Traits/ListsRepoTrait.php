<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/26/18
 * Time: 1:35 PM
 */

namespace App\Data\Traits;


use App\Domains\Backend\Jobs\DatatablePaginateJob;
use App\Domains\Backend\Jobs\MakeDatatableSearchFieldsJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Lucid\Bus\UnitDispatcher;
use Lucid\Foundation\JobDispatcherTrait;

trait ListsRepoTrait
{
    use DispatchesJobs ,UnitDispatcher;
    public function list(Request $request,$repository)
    {
        $searchData = $this->run(new MakeDatatableSearchFieldsJob($request->all()));
        $data = $this->run(new DatatablePaginateJob($repository,$searchData,$request->get('length')));
        return $this->run(new RespondWithJsonJob($data));
    }
}