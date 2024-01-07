<?php
namespace App\Domains\Destinations\Jobs;

use App\Data\Repositories\Contracts\DestinationInterface;
use Lucid\Units\Job;

class UpdateDestinationJob extends Job
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
     * @param DestinationInterface $destination
     * @return bool
     */
    public function handle(DestinationInterface $destination)
    {
        $result = $destination->update($this->id,$this->data);
        return $result;
    }
}
