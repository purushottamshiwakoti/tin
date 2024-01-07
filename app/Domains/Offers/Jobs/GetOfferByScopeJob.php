<?php
namespace App\Domains\Offers\Jobs;

use App\Data\Repositories\Contracts\OfferInterface;
use Lucid\Units\Job;

class GetOfferByScopeJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $scopes;
    public function __construct($scopes = [])
    {
        $this->scopes = $scopes;
    }

    /**
     * @param OfferInterface $offer
     * @return mixed
     */
    public function handle(OfferInterface $offer)
    {
        return $offer->getByScope($this->scopes);
    }
}
