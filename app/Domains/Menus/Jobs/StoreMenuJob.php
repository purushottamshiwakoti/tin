<?php
namespace App\Domains\Menus\Jobs;

use App\Data\Models\Menu;
use Lucid\Units\Job;

class StoreMenuJob extends Job
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
    public function handle(Menu $menu)
    {
        return $menu->fill($this->data)->save();
    }
}
