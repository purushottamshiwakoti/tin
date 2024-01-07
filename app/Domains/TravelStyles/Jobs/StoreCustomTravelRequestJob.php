<?php
namespace App\Domains\TravelStyles\Jobs;

use App\Data\Models\CustomRequest;
use Lucid\Units\Job;

class StoreCustomTravelRequestJob extends Job
{
    private $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CustomRequest $customRequest)
    {
        $customRequest->fill($this->data)->save();
        return $customRequest;
    }
}
