<?php
namespace App\Domains\Backend\Jobs;

use Lucid\Units\Job;

class GetScopedRepositoryJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $repository;
    public $scopes;
    public function __construct($repository,$scopes = [])
    {
        $this->repository = $repository;
        $this->scopes = $scopes;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return $this->repository->getByScope($this->scopes);
    }
}
