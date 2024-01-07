<?php
namespace App\Domains\FixedDepartures\Jobs;

use App\Data\Repositories\Contracts\FixedDepartureInterface;
use Lucid\Units\Job;

class RemoveDealJob extends Job
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
     * Execute the job.
     *
     * @return void
     */
    public function handle(FixedDepartureInterface $departure)
    {
        $current = $departure->find($this->id);
        if($current->lastminutedeal)
        {
            return $current->lastminutedeal->delete();
        }
        return $current;

    }
}
