<?php
namespace App\Domains\Destinations\Jobs;

use App\Data\Repositories\Contracts\DestinationInterface;
use Lucid\Units\Job;

class DeleteDestinationJob extends Job
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
     * @param DestinationInterface $destination
     * @return mixed
     */
    public function handle(DestinationInterface $destination)
    {
        return $destination->remove($this->id);
    }
}
