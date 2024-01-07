<?php
namespace App\Domains\MenuItems\Jobs;

use App\Data\Models\MenuItem;
use Lucid\Units\Job;

class DeleteMenuItemJob extends Job
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
     * @param MenuItem $menuItem
     * @return mixed
     */
    public function handle(MenuItem $menuItem)
    {
        $item = $menuItem->findOrFail($this->id);
        foreach ($item->children as $child)
        {
            $child->delete();
        }
        return $item->delete();
//        return $menuItem->where('id',$this->id)->delete();
    }
}
