<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/29/18
 * Time: 1:04 PM
 */

namespace App\Data\Models;


use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{

    protected $fillable = [
        'trip_id',
        'short_description',
        'full_description',
        'equipment',
        'price_include',
        'key_points',
        'price_exclude',
        'keys',
        'values',
        'map_iframe',

    ];

    public function setFullDescriptionAttribute($value)
    {
        $fullDescription = json_decode(json_encode($value));
        $description = '';
        foreach ($fullDescription->days as $key=>$day)
        {
            if($day && $fullDescription->title[$key])
            {
                $description.=$day."$#mk#".$fullDescription->title[$key]."$#mk#".$fullDescription->description[$key]."$#mkrf#";
            }

        }
        $this->attributes['full_description'] = $description;
    }

    public function getFullDescriptionAttribute($value)
    {
        $array = array_filter(explode('$#mkrf#',$value));
        $fullDescription = [];
        foreach ($array as $k=>$item)
        {
            list($days,$title,$description) = explode('$#mk#',$item);
            $fullDescription[$k] = ['days'=>$days,'title'=>$title,'description'=>$description];
        }
        return json_decode(json_encode($fullDescription));

    }

}