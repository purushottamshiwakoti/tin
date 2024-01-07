<?php
namespace App\Domains\MenuItems\Jobs;

use App\Data\Models\MenuItem;
use Lucid\Units\Job;

class UpdateMenuItemOrderJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $menuId;
    private $data;
    public function __construct($menuId,$data = [])
    {
        $this->menuId = $menuId;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(MenuItem $menuItem)
    {

        $this->orderMenu($this->data, null);
    }

    private function orderMenu(array $menuItems, $parentId)
    {
        foreach ($menuItems as $index => $menuItem) {
            $item = MenuItem::findOrFail($menuItem->id);
            $item->item_order = $index + 1;
            $item->parent_id = $parentId;
            $item->save();

            if (isset($menuItem->children)) {
                $this->orderMenu($menuItem->children, $item->id);
            }
        }
    }
}
