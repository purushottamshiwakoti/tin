<?php
namespace App\Domains\Trips\Jobs;

use App\Data\Repositories\Contracts\FixedDepartureInterface;
use Lucid\Units\Job;

class GetDepartureUpcomingTripJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * @param FixedDepartureInterface $departure
     * @return mixed
     */
    public function handle(FixedDepartureInterface $departure)
    {
        return $departure->getDepartureUpcomingTrip($this->data);
    }
}
