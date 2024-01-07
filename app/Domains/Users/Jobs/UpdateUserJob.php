<?php
namespace App\Domains\Users\Jobs;

use App\Data\Repositories\Contracts\UserInterface;
use Lucid\Units\Job;

class UpdateUserJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;
    private $id;
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
    public function handle(UserInterface $user)
    {
        $userModel = $user->update($this->id,$this->data);
        if(isset($this->data['role_id']))
        {
            $userModel->roles()->sync([$this->data['role_id']]);

        }
        return $userModel;
    }
}
