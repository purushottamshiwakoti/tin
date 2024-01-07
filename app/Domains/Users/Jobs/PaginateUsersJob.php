<?php
namespace App\Domains\Users\Jobs;

use App\Data\Repositories\Contracts\UserInterface;
use Lucid\Units\Job;

class PaginateUsersJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $query;
    private $limit;
    public function __construct($query = [], $limit = 25)
    {
        $this->query = $query;
        $this->limit = $limit;
    }

    /**
     * @param UserInterface $user
     * @return mixed
     */
    public function handle(UserInterface $user)
    {
        return $user->getPaginated($this->query);
    }
}
