<?php
namespace App\Domains\Search\Jobs;

use App\Data\Repositories\Contracts\PlaceInterface;
use Lucid\Units\Job;

class GetSinglePlaceJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @param SearchInterface $searchInterface
     * @return mixed
     */
    public function handle(PlaceInterface $searchInterface)
    {
        return $searchInterface->find($this->id);
    }
}