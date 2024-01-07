<?php
namespace App\Domains\Backend\Jobs;

use Lucid\Units\Job;

class GetRepositoryInstanceJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $interface;
    public function __construct($interface)
    {
        $this->interface = $interface;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return $this->interface->getInstance();
    }
}
