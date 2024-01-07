<?php
namespace App\Domains\Regions\Jobs;

use App\Data\Repositories\Contracts\RegionInterface;
use Lucid\Units\Job;

class DatatablePaginateRegionsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $search;
    private $limit;
    public function __construct($search = [], $limit = 20)
    {
        $this->search = $search;
        $this->limit = $limit;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(RegionInterface $region)
    {
        return $region->getDatatablePaginated($this->search,$this->limit);
    }
}
