<?php
namespace App\Domains\Trips\Jobs;

use App\Data\Repositories\Contracts\FixedDepartureInterface;
use Lucid\Units\Job;

class GetScopedUpcomingFixedDepartureJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $start_date;
    public function __construct($start_date)
    {
        $this->start_date = $start_date;
    }

    /**
     * @param FixedDepartureInterface $departure
     * @return mixed
     */
    public function handle(FixedDepartureInterface $departure)
    {
        return $departure->getUpcomingFixedDepartureTrip($this->start_date);
    }
}
