<?php
namespace App\Domains\Roles\Jobs;

use App\Data\Repositories\Contracts\RoleInterface;
use Lucid\Units\Job;

class GetSingleRoleJob extends Job
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
     * @param RoleInterface $role
     * @return mixed
     */
    public function handle(RoleInterface $role)
    {
        return $role->find($this->id);
    }
}
