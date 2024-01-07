<?php
namespace App\Domains\Trips\Jobs;

use App\Data\Models\FixedDeparture;
use Lucid\Units\Job;

class GetPaginatedUpcomingFixedDepartureJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    
    public function __construct($scopes = [])
    {
       
    }


    public function handle()
    {
        
        return FixedDeparture::where('start_date','>',now())->paginate(10);
    }
}
