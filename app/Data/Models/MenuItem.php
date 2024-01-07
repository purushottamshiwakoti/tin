<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/17/18
 * Time: 5:21 PM
 */

namespace App\Data\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuItem extends Model
{

    use SoftDeletes;
    protected $fillable = [
        'name',
        'menu_id',
        'link',
        'parent_id',
        'item_order',
        'trip_id',
        'icon',
        'layout',
        'description'
    ];
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function getSlugAttribute($value)
    {
        return str_slug($this->name,'-');
    }

    public function children()
    {
        return $this->hasMany(self::class,'parent_id')->orderBy('item_order','ASC')->with('children');
    }

    public function link($absolute = false)
    {
        $url = $this->link;
        $components = parse_url($url);
        return (empty($components['host']))?url($url):$url;
    }
}