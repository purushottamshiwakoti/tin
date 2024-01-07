<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/12/18
 * Time: 4:49 PM
 */

namespace App\Data\Models;


use Illuminate\Database\Eloquent\Model;

class AddOn extends Model
{

    protected $table = 'trip_add_ons';

    protected $fillable = [
        'title',
        'description',
        'values',
        'publish',
        'icon'
    ];

    protected $casts = [
        'values' => 'array',
    ];

    public function addOnValue($title)
    {
        return config('constants.'.$title.'.'.$this->where('title',$title)->pluck('key')->first());
    }


}