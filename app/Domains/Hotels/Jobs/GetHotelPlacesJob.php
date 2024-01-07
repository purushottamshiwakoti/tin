<?php
namespace App\Domains\Hotels\Jobs;

use App\Data\Repositories\Contracts\PlaceInterface;
use Lucid\Units\Job;

class GetHotelPlacesJob extends Job
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
        return $searchInterface->getHotelPlaces();
    }
}