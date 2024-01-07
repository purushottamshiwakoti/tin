<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/18/18
 * Time: 3:36 PM
 */

namespace App\Services\Backend\Features\MenuItems;


use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Domains\MenuItems\Jobs\UpdateMenuItemOrderJob;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class OrderMenuItemsFeature extends Feature
{

    public function handle(Request $request)
    {
        $data = json_decode(json_encode($request->get('data')));
        $menu_id = $request->menu;
        $items = $this->run(new UpdateMenuItemOrderJob($menu_id,$data));

        return $this->run(new RespondWithJsonJob(1));
    }
}