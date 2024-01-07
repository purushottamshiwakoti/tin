<?php
namespace App\Domains\Roles\Jobs;

use App\Data\Repositories\Contracts\RoleInterface;
use Lucid\Units\Job;

class DatatablePaginateRolesJob extends Job
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
     * @param RoleInterface $role
     * @return mixed
     */
    public function handle(RoleInterface $role)
    {
        return $role->getDatatablePaginated($this->search,$this->limit);
    }
}
