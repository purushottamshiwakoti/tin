<?php
namespace App\Domains\Teams\Jobs;

use App\Data\Repositories\Contracts\DestinationInterface;
use App\Data\Repositories\Contracts\TeamInterface;
use App\Data\Repositories\Contracts\TravelStyleInterface;
use Lucid\Units\Job;

class UpdateTeamJob extends Job
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
     * @param TeamInterface $teamInterface
     * @return bool
     */
    public function handle(TeamInterface $teamInterface)
    {
        $result = $teamInterface->update($this->id,$this->data);
        return $result;
    }
}
