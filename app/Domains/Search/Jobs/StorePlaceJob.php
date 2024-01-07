<?php
namespace App\Domains\Search\Jobs;

use App\Data\Models\Place;
use App\Data\Repositories\Contracts\PlaceInterface;
use Lucid\Units\Job;

class StorePlaceJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(PlaceInterface $searchInterface)
    {
        $result = $searchInterface->fillAndSave($this->data);

        return $result;
    }
}