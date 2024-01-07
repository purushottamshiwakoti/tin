<?php
namespace App\Services\Backend\Features\MenuItems;


use App\Domains\MenuItems\Jobs\StoreMenuItemJob;

use App\Services\Backend\Http\Requests\StoreMenuItemRequest;
use Lucid\Units\Feature;

class StoreMenuItemFeature extends Feature
{
    public function handle(StoreMenuItemRequest $request)
    {

        $menu = $this->run(new StoreMenuItemJob($request->all()));
        if($menu)
        {
            return redirect()->route('admin.menus.menu-items.index',['menu'=>$menu->menu_id])->with(['message'=>'Successfully added menu','alert-type'=>'success']);
        }
        $result = ['message'=>'Something went wrong','alert-type'=>'error'];
        return redirect()->back()->with($result);

    }
}
