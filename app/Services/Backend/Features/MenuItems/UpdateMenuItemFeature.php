<?php
namespace App\Services\Backend\Features\MenuItems;


use App\Domains\MenuItems\Jobs\UpdateMenuItemJob;
use App\Services\Backend\Http\Requests\StoreMenuItemRequest;
use App\Services\Backend\Http\Requests\StoreMenuRequest;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class UpdateMenuItemFeature extends Feature
{
    public function handle(StoreMenuItemRequest $request)
    {

        $menuId = $request->menu_item;

        $menu = $this->run(new UpdateMenuItemJob($menuId,$request->except('_token')));
        if(!$menu)
        {
            $result = ['message'=>'Something went wrong','alert-type'=>'error'];
            return redirect()->back()->with($result);
        }
        return redirect()->route('admin.menus.menu-items.index',['menu'=>$menu->menu_id])->with(['message'=>'Successfully added menu','alert-type'=>'success']);

    }
}
