<?php
namespace App\Domains\Trips\Jobs;

use App\Data\Repositories\Contracts\TripInterface;
use Lucid\Units\Job;

class GetSingleTripBySlugJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $slug;
    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @param TripInterface $trip
     * @return mixed
     */
    public function handle(TripInterface $trip)
    {
        return $trip->findBySlug($this->slug);
    }
}
