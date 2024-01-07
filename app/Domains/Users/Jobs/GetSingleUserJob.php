<?php
namespace App\Domains\Users\Jobs;

use App\Data\Repositories\Contracts\UserInterface;
use Lucid\Units\Job;

class GetSingleUserJob extends Job
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
    public function handle(UserInterface $user)
    {
        return $user->find($this->id);
    }
}
