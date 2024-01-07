<?php
namespace App\Domains\Teams\Jobs;

use App\Data\Repositories\Contracts\DestinationInterface;
use App\Data\Repositories\Contracts\TeamInterface;
use App\Data\Repositories\Contracts\TravelStyleInterface;
use Lucid\Units\Job;

class GetSingleTeamJob extends Job
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
     * @param TeamInterface $destination
     * @return mixed
     */
    public function handle(TeamInterface $teamInterface)
    {
        return $teamInterface->find($this->id);
    }
}
