<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/17/18
 * Time: 5:21 PM
 */

namespace App\Data\Models;


use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{


    use SoftDeletes,Sluggable;
    protected $fillable = [
        'name',
        'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug'=>[
                'source'=>'name'
            ]
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menuItems()
    {
        return $this->hasMany(MenuItem::class,'menu_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rootMenuItems()
    {
        return $this->menuItems()->where(function ($query){
            return $query->orWhere('parent_id',NULL)->orWhere('parent_id',0);
        })->orderBy('item_order','ASC');
    }

    public static function display($menuName, $type = null, array $options = [])
    {
        // GET THE MENU - sort collection in blade
        $menu = static::where('slug', '=', $menuName)
            ->with(['menuItems' => function ($q) {
                $q->where('parent_id',0)->orWhere('parent_id',Null)->orderBy('item_order','ASC');
            }])
            ->first();

        // Check for Menu Existence
        if (!isset($menu)) {
            return false;
        }
//        print_r($menu->rootMenuItems);exit;

        // Set static vars values for admin menus
        if (in_array($type, ['admin', 'admin_menu'])) {
//            $permissions = Voyager::model('Permission')->all();
//            $dataTypes = Voyager::model('DataType')->all();
//            $prefix = trim(route('voyager.dashboard', [], false), '/');
//            $user_permissions = null;
//
//            if (!Auth::guest()) {
//                $user = Voyager::model('User')->find(Auth::id());
//                $user_permissions = $user->role->permissions->pluck('key')->toArray();
//            }
//
//            $options->user = (object) compact('permissions', 'dataTypes', 'prefix', 'user_permissions');
//
//            // change type to blade template name - TODO funky names, should clean up later
//            $type = 'voyager::menu.'.$type;
        } else {
            if (is_null($type)) {
                $type = 'website::menu.default';
            } elseif ($type == 'bootstrap' && !view()->exists($type)) {
                $type = 'website::menu.bootstrap';
            }
        }

        return new \Illuminate\Support\HtmlString(
            \Illuminate\Support\Facades\View::make($type, ['items' => $menu->menuItems,'title'=>$menu->name])->render()
        );
    }
}