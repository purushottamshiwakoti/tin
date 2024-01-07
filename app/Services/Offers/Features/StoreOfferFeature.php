<?php
namespace App\Services\Offers\Features;

use App\Data\Repositories\Contracts\OfferInterface;
use App\Data\Traits\RepoStoresTrait;
use App\Services\Offers\Http\Requests\StoreOfferRequest;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class StoreOfferFeature extends Feature
{
    use RepoStoresTrait;
    public $basePrefix = 'offers';
    public function handle(StoreOfferRequest $request,OfferInterface $offer)
    {
        return $this->store($request,$offer);

    }
}
