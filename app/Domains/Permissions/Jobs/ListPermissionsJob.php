<?php
namespace App\Domains\Permissions\Jobs;

use App\Data\Models\Permission;
use Lucid\Units\Job;

class ListPermissionsJob extends Job
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
    public function handle(Permission $permission)
    {
        return $permission->all();
    }
}
