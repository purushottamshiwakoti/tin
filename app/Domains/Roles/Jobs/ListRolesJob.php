<?php
namespace App\Domains\Roles\Jobs;

use App\Data\Models\Role;
use App\Data\Repositories\Contracts\RoleInterface;
use Lucid\Units\Job;

class ListRolesJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(RoleInterface $role)
    {
        return $role->all();
    }
}
