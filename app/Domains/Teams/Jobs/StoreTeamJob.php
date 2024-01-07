<?php
namespace App\Domains\Teams\Jobs;

use App\Data\Repositories\Contracts\TeamInterface;
use App\Data\Repositories\Contracts\TravelStyleInterface;
use Lucid\Units\Job;

class StoreTeamJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;
    
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * @param TeamInterface $travelStyle
     * @return bool
     */
    public function handle(TeamInterface $teamInterface)
    {
        $result = $teamInterface->fillAndSave($this->data);

        return $result;
    }
}
