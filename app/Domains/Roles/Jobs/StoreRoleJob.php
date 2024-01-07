<?php
namespace App\Domains\Roles\Jobs;

use App\Data\Repositories\Contracts\RoleInterface;
use Lucid\Units\Job;

class StoreRoleJob extends Job
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
     * Execute the job.
     *
     * @return void
     */
    public function handle(RoleInterface $role)
    {
        $roleModel = $role->fillAndSave($this->data);
        $roleModel->syncPermissions($this->data['permissions']);
        return $roleModel;
    }
}
