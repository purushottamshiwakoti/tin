<?php
namespace App\Services\Offers\Features;

use App\Data\Repositories\Contracts\OfferInterface;
use App\Domains\Backend\Jobs\DatatablePaginateJob;
use App\Domains\Backend\Jobs\MakeDatatableSearchFieldsJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ListOffersFeature extends Feature
{
    public function handle(Request $request,OfferInterface $offer)
    {
        $searchData = $this->run(new MakeDatatableSearchFieldsJob($request->all()));
        $data = $this->run(new DatatablePaginateJob($offer,$searchData,$request->get('length')));
        return $this->run(new RespondWithJsonJob($data));
    }
}
