<?php
namespace App\Domains\Trips\Jobs;

use App\Data\Repositories\Contracts\ActivityInterface;
use App\Data\Repositories\Contracts\TripInterface;
use Lucid\Units\Job;

class GetTourPackagesWithDealsJob extends Job
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
     * Execute the job.
     *
     * @return void
     */
    public function handle(TripInterface $trip,ActivityInterface $activity)
    {
        $curActivity = $activity->findOneLike('slug','tour');
        if($curActivity) {
            return $trip->getHotDealsByTripableType('activity', $curActivity->id);
        }
    }
}
