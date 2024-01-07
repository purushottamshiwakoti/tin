<?php
namespace App\Domains\Trips\Jobs;

use App\Data\Repositories\Contracts\ActivityInterface;
use App\Data\Repositories\Contracts\TripInterface;
use Illuminate\Support\Collection;
use Lucid\Units\Job;

class GetOtherPackagesJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @param TripInterface $trip
     * @param ActivityInterface $activity
     * @return Collection
     */
    public function handle(TripInterface $trip)
    {
        // dd($this->id);
        return $trip->getOtherPackages($this->id);



    }
}
