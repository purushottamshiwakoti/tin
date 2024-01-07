<?php
namespace App\Domains\Roles\Jobs;

use App\Data\Repositories\Contracts\RoleInterface;
use Lucid\Units\Job;

class DeleteRoleJob extends Job
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
     * Execute the job.
     *
     * @return void
     */
    public function handle(RoleInterface $role)
    {
        return $role->remove($this->id);
    }
}
