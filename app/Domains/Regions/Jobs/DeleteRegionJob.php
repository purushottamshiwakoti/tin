<?php
namespace App\Domains\Regions\Jobs;

use App\Data\Repositories\Contracts\RegionInterface;
use Lucid\Units\Job;

class DeleteRegionJob extends Job
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
    public function handle(RegionInterface $region)
    {
        return $region->remove($this->id);
    }
}
