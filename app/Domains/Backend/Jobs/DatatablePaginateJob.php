<?php
namespace App\Domains\Backend\Jobs;

use Lucid\Units\Job;

class DatatablePaginateJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $repository;
    private $searchData;
    private $limit;
    public function __construct($repository,$searchData = [],$limit)
    {
        $this->repository = $repository;
        $this->searchData = $searchData;
        $this->limit = $limit;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return $this->repository->getDatatablePaginated($this->searchData,$this->limit);
    }
}
