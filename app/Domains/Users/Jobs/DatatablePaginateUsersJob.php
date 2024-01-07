<?php
namespace App\Domains\Users\Jobs;

use App\Data\Repositories\Contracts\UserInterface;
use Lucid\Units\Job;

class DatatablePaginateUsersJob extends Job
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
     * @param UserInterface $user
     * @return mixed
     */
    public function handle(UserInterface $user)
    {
        return $user->getDatatablePaginated($this->search,$this->limit);
    }
}
