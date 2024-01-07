<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/25/18
 * Time: 2:48 PM
 */

namespace App\Data\Models;


use App\Data\Models\Trip;
use App\Data\Models\Region;
use App\Data\Models\Activity;
use App\Data\Models\DestinationFaq;
use App\Data\Traits\AttachableTrait;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Destination extends Model
{

    use SoftDeletes,AttachableTrait,Sluggable;
    protected $fillable = [
        'title',
        'caption',
        'slug',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'publish',
        'order'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug'=>[
                'source'=>'title'
            ]
        ];
    }

    public function scopePublished($query)
    {
        return $query->where('publish',1);
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('id','DESC');
    }



    public function coverImage()
    {
        return $this->morphOne(Attachment::class,'attachable')->where('media_type','cover');
    }

    public function trips()
    {
        return $this->hasMany(Trip::class,'destination_id');
    }

    public function faqs()
    {
        return $this->hasMany(DestinationFaq::class,'destination_id');
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class,'destination_activity');

    }
    public function regions()
    {
        return $this->belongsToMany(Region::class,'destination_region');

    }

    public function destinationTrip()
    {
        return $this->belongsToMany(Trip::class,'destination_trip');
    }

}