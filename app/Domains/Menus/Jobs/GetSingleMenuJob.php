<?php
namespace App\Domains\Menus\Jobs;

use App\Data\Models\Menu;
use Lucid\Units\Job;

class GetSingleMenuJob extends Job
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
    public function handle(Menu $menu)
    {
        return $menu->find($this->id);
    }
}
