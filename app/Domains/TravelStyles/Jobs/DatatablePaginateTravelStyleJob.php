<?php
namespace App\Domains\TravelStyles\Jobs;

use App\Data\Repositories\Contracts\TravelStyleInterface;
use Lucid\Units\Job;

class DatatablePaginateTravelStyleJob extends Job
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
     * @param TravelStyleInterface $destination
     * @return mixed
     */
    public function handle(TravelStyleInterface $travelStyleInterface)
    {
        return $travelStyleInterface->getDatatablePaginated($this->search,$this->limit);
    }
}
