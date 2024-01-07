<?php
namespace App\Domains\Teams\Jobs;

use App\Data\Repositories\Contracts\TeamInterface;
use Lucid\Units\Job;

class DeleteTeamJob extends Job
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
     * @return mixed
     */
    public function handle(TeamInterface $teamInterface)
    {
        return $teamInterface->remove($this->id);
    }
}
