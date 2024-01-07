<?php
namespace App\Domains\Trips\Jobs;

use App\Data\Repositories\Contracts\FixedDepartureInterface;
use App\Data\Repositories\Contracts\TripInterface;
use Lucid\Units\Job;

class GetAjaxTripJob extends Job
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
     * @param TripInterface $departure
     * @return mixed
     */
    public function handle(TripInterface $departure)
    {
        return $departure->getAjaxTrip($this->data);
    }
}
