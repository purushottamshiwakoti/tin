<?php
namespace App\Domains\Trips\Jobs;

use App\Data\Models\FavouriteTour;

use Lucid\Units\Job;

class StoreFavouriteTripJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;
    private $trips;
    public function __construct($trips,$data = [])
    {
        $this->data = $data;
        $this->trips = $trips;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(FavouriteTour $tour)
    {
        if(count($this->trips)>0)
        {
            $tour->where('customer_id',$this->data['customer_id'])->delete();
            foreach ($this->trips as $trip)
            {
    
                $saveData = $this->data;
                $saveData['trip_id'] = $trip['id'];
                $tour->create($saveData);
            }
             return $tour;
        }

    }
}
