<?php
namespace App\Domains\Departures\Jobs;

use App\Data\Repositories\Contracts\FixedDepartureInterface;
use Lucid\Units\Job;

class GetSingleDepartureJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private  $id;
    private $trip;
    public function __construct($id,$trip)
    {
        $this->id = $id;
        $this->trip = $trip;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(FixedDepartureInterface $departure)
    {
        return $departure->findOrNew($this->id,$this->trip);
    }
}
