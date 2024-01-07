<?php
namespace App\Domains\Menus\Jobs;

use App\Data\Models\Menu;
use App\Data\Repositories\Contracts\MenuInterface;
use Lucid\Units\Job;

class DatatablePaginateMenuJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $search;
    private $limit;
    public function __construct($search = [], $limit = 20)
    {
        $this->search = $search;
        $this->limit = $limit;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(MenuInterface $menu)
    {
        return $menu->getDatatablePaginated($this->search,$this->limit);
        $query = $menu->select('*');
        foreach ($this->search as $key => $value) {
            $query->orWhere($key,'like', '%'.$value.'%');
        }

        return $query->orderBy('created_at', 'desc')->simplePaginate($this->limit);
    }
}
