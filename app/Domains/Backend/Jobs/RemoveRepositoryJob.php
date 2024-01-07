<?php
namespace App\Domains\Backend\Jobs;

use Lucid\Units\Job;

class RemoveRepositoryJob extends Job
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
        $this->repository = $repository;
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return $this->repository->remove($this->id);
    }
}
