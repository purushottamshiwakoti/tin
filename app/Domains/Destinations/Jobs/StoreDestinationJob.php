<?php
namespace App\Domains\Destinations\Jobs;

use App\Data\Repositories\Contracts\DestinationInterface;
use Lucid\Units\Job;

class StoreDestinationJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;
    private $attachment;
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * @param DestinationInterface $destination
     * @return bool
     */
    public function handle(DestinationInterface $destination)
    {
        $result = $destination->fillAndSave($this->data);

        return $result;
    }
}
