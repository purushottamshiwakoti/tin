<?php
namespace App\Domains\TravelStyles\Jobs;

use App\Data\Repositories\Contracts\DestinationInterface;
use App\Data\Repositories\Contracts\TravelStyleInterface;
use Lucid\Units\Job;

class UpdateTravelStyleJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */

    private $data;
    private $id;
    public function __construct($id,$data = [])
    {
        $this->id = $id;
        $this->data = $data;
    }

    /**
     * @param TravelStyleInterface $travelStyleInterface
     * @return bool
     */
    public function handle(TravelStyleInterface $travelStyleInterface)
    {
        $result = $travelStyleInterface->update($this->id,$this->data);
        return $result;
    }
}
