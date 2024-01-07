<?php
namespace App\Domains\Users\Jobs;

use App\Data\Repositories\Contracts\UserInterface;
use Lucid\Units\Job;

class StoreUserJob extends Job
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
    public function handle(UserInterface $user)
    {
        $userModel = $user->fillAndSave($this->data);
        if(isset($this->data['role_id']))
        {
            $userModel->roles()->sync([$this->data['role_id']]);
        }
        return $userModel;
    }
}
