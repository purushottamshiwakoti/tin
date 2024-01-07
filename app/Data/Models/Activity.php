<?php

/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/25/18
 * Time: 2:49 PM
 */

namespace App\Data\Models;


use App\Data\Models\Destination;
use App\Data\Traits\TripableTrait;
use App\Data\Traits\AttachableTrait;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{

    use Sluggable;
    use SoftDeletes, AttachableTrait, TripableTrait;
    public $typeParams = [
        'First Featured',
        'Second Featured',
        'Third Featured',
    ];

    protected $fillable = [
        'title',
        'caption',
        'slug',
        'description',
        'description1',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'publish',
        'publish_types'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * @var array
     */
    protected $casts = [
        'publish_types' => 'array',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function regions()
    {
        return $this->hasMany(Region::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function coverImage()
    {
        return $this->morphOne(Attachment::class, 'attachable')->where('media_type', 'cover');
    }

    /**
     * @return mixed
     */
    public function regionFirstFeatured()
    {
        return $this->hasMany(Region::class)->featuredFirst()->take(1);
    }


    /**
     * @return mixed
     */
    public function regionSecondFeatured()
    {
        return $this->hasMany(Region::class)->featuredSecond()->take(2);
    }

    /**
     * @return mixed
     */
    public function regionThirdFeatured()
    {
        return $this->hasMany(Region::class)->featuredThird()->take(3);
    }


    /**
     * @param $query
     * @return mixed
     */
    public function scopePublished($query)
    {
        return $query->where('publish', 1);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeFeatured($query)
    {
        return $query->where('publish_types', 'like', '%Featured%');
    }

    public function scopeFirstFeatured($query)
    {
        return $query->where('publish_types', 'like', '%First Featured%');
    }

    public function scopeSecondFeatured($query)
    {
        return $query->where('publish_types', 'like', '%Second Featured%');
    }

    public function scopeThirdFeatured($query)
    {
        return $query->where('publish_types', 'like', '%Third Featured%');
    }

    public function trips()
    {
        return $this->hasMany(Trip::class, 'tripable_id')
            ->where('trips.tripable_type', 'activity');
    }

    public function regionTrips()
    {
        return $this->hasManyThrough(Trip::class, Region::class, 'activity_id', 'tripable_id')
            ->where('trips.tripable_type', 'region');
    }


    public function getTripCountAttribute()
    {
        return $this->regionTrips->count() + $this->trips->count();
    }

   public function destination()
   {
    return $this->belongsToMany(Destination::class);
   }


}
