<?php
namespace App\Domains\TravelStyles\Jobs;

use App\Data\Repositories\Contracts\TravelStyleInterface;
use Lucid\Units\Job;

class DeleteTravelStyleJob extends Job
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
    public function handle(TravelStyleInterface $travelStyle)
    {
        return $travelStyle->deleteTravelStyle($this->id);
    }
}
