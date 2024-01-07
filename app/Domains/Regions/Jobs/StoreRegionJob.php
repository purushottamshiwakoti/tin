<?php
namespace App\Domains\Regions\Jobs;

use App\Data\Repositories\Contracts\RegionInterface;
use Lucid\Units\Job;

class StoreRegionJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(RegionInterface $region)
    {
        return $region->fillAndSave($this->data);
    }
}
