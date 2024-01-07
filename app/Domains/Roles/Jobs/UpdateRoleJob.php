<?php
namespace App\Domains\Roles\Jobs;

use App\Data\Repositories\Contracts\RoleInterface;
use Lucid\Units\Job;

class UpdateRoleJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $id;
    private $data;
    public function __construct($id,$data = [])
    {
        $this->id = $id;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(RoleInterface $role)
    {
        $roleModel = $role->update($this->id,$this->data);
        $roleModel->syncPermissions($this->data['permissions']);
        return $roleModel;
    }
}
