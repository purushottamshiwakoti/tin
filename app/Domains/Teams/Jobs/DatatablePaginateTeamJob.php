<?php
namespace App\Domains\Teams\Jobs;

use App\Data\Repositories\Contracts\TeamInterface;
use Lucid\Units\Job;

class DatatablePaginateTeamJob extends Job
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
     * @param TeamInterface $teamInterface
     * @return mixed
     */
    public function handle(TeamInterface $teamInterface)
    {
        return $teamInterface->getDatatablePaginated($this->search,$this->limit);
    }
}
