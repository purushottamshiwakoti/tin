<?php
namespace App\Domains\MenuItems\Jobs;

use App\Data\Models\MenuItem;
use Lucid\Units\Job;

class UpdateMenuItemJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $id;
    private $data;
    public function __construct($id,$data = [])
    {
        $this->id = $id;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(MenuItem $menuItem)
    {
        $model = $menuItem->findOrFail($this->id);
        $model->fill($this->data)->save();
        return $model;
    }
}
