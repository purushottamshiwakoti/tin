<?php
namespace App\Domains\Backend\Jobs;

use Lucid\Units\Job;

class GetSingleRepositoryJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $repository;
    private $id;
    public function __construct($repository,$id)
    {
        $this->id = $id;
        $this->repository = $repository;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return $this->repository->find($this->id);
    }
}
