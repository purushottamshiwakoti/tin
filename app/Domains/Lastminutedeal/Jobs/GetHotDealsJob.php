<?php
namespace App\Domains\Lastminutedeal\Jobs;

use App\Data\Repositories\Contracts\LastMinuteDealInterface;
use App\Data\Repositories\Contracts\TripInterface;
use Lucid\Units\Job;

class GetHotDealsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public  $type;
    public $id;
    public function __construct($type = 'activity',$id)
    {
        $this->type = $type;
        $this->id = $id;
    }

    /**
     * @param LastMinuteDealInterface $lastMinuteDeal
     * @return mixed
     */
    public function handle(TripInterface $trip)
    {
        return $trip->getHotDealsByTripableType($this->type,$this->id);
    }
}
