<?php
namespace App\Domains\MenuItems\Jobs;

use App\Data\Models\MenuItem;
use Lucid\Units\Job;

class StoreMenuItemJob extends Job
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
    public function handle(MenuItem $menuItem)
    {
        $menuItem->fill($this->data)->save();
        return $menuItem;
    }
}
