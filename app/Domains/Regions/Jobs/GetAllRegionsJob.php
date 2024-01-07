<?php

namespace App\Domains\Regions\Jobs;

use App\Data\Repositories\Contracts\RegionInterface;
use Lucid\Units\Job;

class GetAllRegionsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(RegionInterface $region)
    {
        return $region->getAllRegion();
    }
}
