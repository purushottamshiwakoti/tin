<?php
namespace App\Domains\Search\Jobs;

use App\Data\Repositories\Contracts\PlaceInterface;
use Lucid\Units\Job;

class GetFlightPlacesJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    /**
     * @param SearchInterface $searchInterface
     * @return mixed
     */
    public function handle(PlaceInterface $searchInterface)
    {
        return $searchInterface->getFlightPlaces();
    }
}