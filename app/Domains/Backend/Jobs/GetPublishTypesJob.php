<?php
namespace App\Domains\Backend\Jobs;

use Lucid\Units\Job;

class GetPublishTypesJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $repository;
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return $this->repository->getPublishTypes();
    }
}
