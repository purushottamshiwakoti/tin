<?php
namespace App\Domains\Trips\Jobs;

use App\Data\Repositories\Contracts\ActivityInterface;
use App\Data\Repositories\Contracts\TripInterface;
use Illuminate\Support\Collection;
use Lucid\Units\Job;

class GetOtherPackagesWithDealsJob extends Job
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
     * @param TripInterface $trip
     * @param ActivityInterface $activity
     * @return Collection
     */
    public function handle(TripInterface $trip,ActivityInterface $activity)
    {
        $curActivity = $activity->findOneLike('slug','day-tour');
        $trips = new Collection();
        if($curActivity) {
            $trips= $trip->getHotDealsByTripableType('activity', $curActivity->id);
        }
        $secondActivity = $activity->findOneLike('slug','short-break');
        if($secondActivity)
        {
            $tours1 = $trip->getHotDealsByTripableType('activity',$secondActivity->id);
            $trips->merge($tours1);
        }
        return $trips;

    }
}
