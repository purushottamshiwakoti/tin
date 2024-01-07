<?php
namespace App\Domains\Search\Jobs;

use App\Data\Repositories\Contracts\PlaceInterface;
use Lucid\Units\Job;

class DeletePlaceJob extends Job
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
     * @return mixed
     */
    public function handle(PlaceInterface $searchInterface)
    {
        return $searchInterface->remove($this->id);
    }
}