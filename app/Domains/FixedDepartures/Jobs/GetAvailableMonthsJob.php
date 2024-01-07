<?php
namespace App\Domains\FixedDepartures\Jobs;

use App\Data\Models\Trip;
use Illuminate\Support\Collection;
use Lucid\Units\Job;

class GetAvailableMonthsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private  $trip;
    public function __construct(Trip $trip)
    {
        $this->trip = $trip;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $departure = $this->trip->activeFixedDepartures;
        $months = new Collection();
        $departure->map(function ($item) use (&$months){
            $slug = $item->start_date->format('m-Y');
            if(!$months->contains('slug',$slug))
                $months->push(json_decode(json_encode(['slug'=>$slug,'title'=>$item->start_date->format('M Y')])));
        });
        return $months;
    }
}
