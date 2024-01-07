<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 8/29/18
 * Time: 4:05 PM
 */

namespace App\Services\Backend\database\seeds;


use App\Data\Models\Menu;
use App\Data\Models\MenuItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminMenuItemsSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        $menu = Menu::where('slug','admin')->first();
        if(!$menu)
        {
            $menu = new Menu();
            $menu->fill(['name'=>'Admin'])->save();
        }
        MenuItem::where('menu_id',$menu->id)->forceDelete();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $routes = [
            'dashboard'=>'Home',
            'settings'=>'Setting',
            'pages'=>'Pages',
            'menus'=>'Menu',
            'subscribers'=>'Subscribers',
            'sliders'=>'Sliders',
            'destinations'=>'Destination',
            'activities'=>'Activities',
            'regions'=>'Regions',
            'trips'=>'Trips',
            'ratings'=>'Ratings',
            'offers'=>'Offers',
            'categories'=>'Categories',
            'posts'=>'Posts',
            'faq-categories'=>'Faq Categories',
            'faq'=>'Faqs'

        ];

        $menuItems = [];
        $k= 0;
        foreach ($routes as $key=>$route)
        {
            $menuItems[] = [
                'name'=>$route,
                'link'=>$key,
                'item_order' => $k,
                'menu_id'=>$menu->id,
                'icon'=>'home'
            ];
            $k++;
        }

        MenuItem::insert($menuItems);
    }

}