<?php
namespace App\Services\Ratings\Features;

use App\Data\Repositories\Contracts\RatingInterface;
use App\Domains\Backend\Jobs\DatatablePaginateJob;
use App\Domains\Backend\Jobs\MakeDatatableSearchFieldsJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ListRatingsFeature extends Feature
{
    public function handle(Request $request,RatingInterface $rating)
    {
        $searchData = $this->run(new MakeDatatableSearchFieldsJob($request->all()));
        $data = $this->run(new DatatablePaginateJob($rating,$searchData,$request->get('length')));
        return $this->run(new RespondWithJsonJob($data));
    }
}
