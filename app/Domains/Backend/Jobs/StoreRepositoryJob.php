<?php
namespace App\Domains\Backend\Jobs;

use Lucid\Units\Job;

class StoreRepositoryJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $repository;
    private $data;
    public function __construct($repository,$data = [])
    {
        $this->repository = $repository;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return $this->repository->fillAndSave($this->data);
    }
}
