<?php
namespace App\Domains\Search\Jobs;

use App\Data\Models\Place;
use App\Data\Repositories\Contracts\PlaceInterface;
use Lucid\Units\Job;

class GetPlacePublishOptionsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(PlaceInterface $searchInterface)
    {
        return $searchInterface->getPublishTypes();
    }
}