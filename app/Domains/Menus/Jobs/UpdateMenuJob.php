<?php
namespace App\Domains\Menus\Jobs;

use App\Data\Models\Menu;
use Lucid\Units\Job;

class UpdateMenuJob extends Job
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
        $this->id= $id;
        $this->data = $data;
    }

    /**
     * @param Menu $menu
     * @return mixed
     */
    public function handle(Menu $menu)
    {
        $model =  $menu->find($this->id);
        return $model->fill($this->data)->save();
    }
}
