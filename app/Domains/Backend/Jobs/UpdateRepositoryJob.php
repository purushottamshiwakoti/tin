<?php
namespace App\Domains\Backend\Jobs;

use Lucid\Units\Job;

class UpdateRepositoryJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $repository;
    private $id;
    private $data;
    public function __construct($repository,$id,$data = [])
    {
        $this->repository = $repository;
        $this->id = $id;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return $this->repository->update($this->id,$this->data);
    }
}
