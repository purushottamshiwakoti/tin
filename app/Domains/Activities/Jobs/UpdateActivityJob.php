<?php
namespace App\Domains\Activities\Jobs;

use App\Data\Repositories\Contracts\ActivityInterface;
use Lucid\Units\Job;

class UpdateActivityJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $id;
    private $data;
    public function __construct($id,$data = [])
    {
        $this->id = $id;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ActivityInterface $activity)
    {
        return $activity->update($this->id,$this->data);
    }
}
