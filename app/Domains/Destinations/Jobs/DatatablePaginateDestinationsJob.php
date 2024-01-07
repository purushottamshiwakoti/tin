<?php
namespace App\Domains\Destinations\Jobs;

use App\Data\Repositories\Contracts\DestinationInterface;
use Lucid\Units\Job;

class DatatablePaginateDestinationsJob extends Job
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
     * @param DestinationInterface $destination
     * @return mixed
     */
    public function handle(DestinationInterface $destination)
    {
        return $destination->getDatatablePaginated($this->search,$this->limit);
    }
}
