<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/1/18
 * Time: 2:02 PM
 */

namespace App\Data\Models;


use App\Data\Traits\AttachableTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{

    use AttachableTrait,SoftDeletes,Sluggable;
    protected $fillable = ['title','caption','description','link','slug','order','publish','link_title'];


    /**
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug'=>[
                'source'=>'title',
                'onUpdate'=>true
            ]
        ];
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopePublished($query)
    {
        return $query->where('publish',1);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order','asc');
    }
}