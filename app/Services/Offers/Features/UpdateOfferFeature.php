<?php
namespace App\Services\Offers\Features;

use App\Data\Repositories\Contracts\OfferInterface;
use App\Data\Traits\RepoUpdatesTrait;
use App\Services\Offers\Http\Requests\StoreOfferRequest;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class UpdateOfferFeature extends Feature
{
    use RepoUpdatesTrait;
    public $basePrefix = 'offers';
    public function handle(StoreOfferRequest $request,OfferInterface $offer)
    {
        return $this->update($request,$offer,$request->offer);
    }
}
