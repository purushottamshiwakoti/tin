<?php
namespace App\Domains\Search\Jobs;

use App\Data\Models\Place;
use App\Data\Repositories\Contracts\PlaceInterface;
use Lucid\Units\Job;

class DatatablePaginatePlaceJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */

    private $search;
    private $limit;
    public function __construct($search = [],$limit = 20)
    {
        $this->search = $search;
        $this->limit = $limit;
    }

    /**
     * @param searchInterface $testimonialInterface
     * @return mixed
     */
    public function handle(PlaceInterface  $searchInterface)
    {
        return $searchInterface->getDatatablePaginated($this->search,$this->limit);
    }
}