<?php

/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/25/18
 * Time: 2:52 PM
 */

namespace App\Data\Models;


use App\Data\Models\Destination;
use App\Data\Traits\TripableTrait;
use App\Data\Traits\AttachableTrait;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    use AttachableTrait, SoftDeletes, TripableTrait, Sluggable;
    protected $fillable = [
        'title',
        'caption',
        'destination_id',
        'activity_id',
        'slug',
        'description',
        'description1',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'publish',
        'show_on_navbar',
        'publish_types'
    ];

    /**
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

    protected $casts = [
        'publish_types' => 'array',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function coverImage()
    {
        return $this->morphOne(Attachment::class, 'attachable')->where('media_type', 'cover');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeFeaturedFirst($query)
    {
        return $query->where('publish_types', 'like', '%First Featured%');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeFeaturedSecond($query)
    {
        return $query->where('publish_types', 'like', '%Second Featured%');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeFeaturedThird($query)
    {
        return $query->where('publish_types', 'like', '%Third Featured%');
    }

    
   public function destination()
   {
    return $this->belongsToMany(Destination::class);
   }
}
