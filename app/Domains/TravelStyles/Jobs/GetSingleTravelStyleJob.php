<?php
namespace App\Domains\TravelStyles\Jobs;

use App\Data\Repositories\Contracts\DestinationInterface;
use App\Data\Repositories\Contracts\TravelStyleInterface;
use Lucid\Units\Job;

class GetSingleTravelStyleJob extends Job
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
     * @param DestinationInterface $destination
     * @return mixed
     */
    public function handle(TravelStyleInterface $travelStyleInterface)
    {
        return $travelStyleInterface->find($this->id);
    }
}
