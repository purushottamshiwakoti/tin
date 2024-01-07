<?php
namespace App\Domains\Search\Jobs;

use App\Data\Repositories\Contracts\PlaceInterface;
use Lucid\Units\Job;

class UpdatePlaceJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */

    private $data;
    private $id;
    public function __construct($id,$data = [])
    {
        $this->id = $id;
        $this->data = $data;
    }

    /**
     * @param SearchInterface $searchInterface
     * @return bool
     */
    public function handle(PlaceInterface $searchInterface)
    {
        $result = $searchInterface->update($this->id,$this->data);
        return $result;
    }
}