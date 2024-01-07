<?php
namespace App\Services\Offers\Features;

use App\Data\Repositories\Contracts\OfferInterface;
use App\Domains\Backend\Jobs\RemoveRepositoryJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class DeleteOfferFeature extends Feature
{
    public function handle(Request $request, OfferInterface $offer)
    {
        return $this->run(new RemoveRepositoryJob($offer,$request->offer));
    }
}
