<?php
namespace App\Domains\Destinations\Jobs;

use App\Data\Repositories\Contracts\DestinationInterface;
use Lucid\Units\Job;

class GetAllDestinationsByPaginationJob extends Job
{


    public function handle(DestinationInterface $destination)
    {
        return $destination->paginateNew(6);
    }
    
}
