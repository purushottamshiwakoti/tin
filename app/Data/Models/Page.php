<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/25/18
 * Time: 12:08 PM
 */

namespace App\Data\Models;


use App\Data\Traits\AttachableTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{

    use AttachableTrait,SoftDeletes,Sluggable;

    protected $table = 'front_pages';

    protected $fillable = [
        'page_title',
        'slug',
        'caption',
        'page_description',
        'featured_content',
        'other_description',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'publish_types',
        'template',
        'publish',
    ];

    public function sluggable(): array
    {
        return [
            'slug'=>[
                'source'=>'page_title'
            ]
        ];
    }

    public function getTitleAttribute($value)
    {
        return $this->page_title;
    }

    protected $casts = [
        'publish_types' => 'array',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function relatedPages()
    {
        return $this->belongsToMany(self::class,'pages_pivot','page_id','related_page_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function featuredTrips()
    {
        return $this->belongsToMany(Trip::class,'pages_trips_pivot','page_id','trip_id');
    }

    public function coverImage()
    {
        
        return $this->morphOne(Attachment::class,'attachable')->where('media_type','cover');
    }

    public function scopePublished($query)
    {
        return $query->where('publish',1);
    }

    public function scopeHomeFeatured($query)
    {
        return $query->where('publish_types','like','%Home%')->orWhere('publish_types','like','%Home Featured%');
    }

    public function scopeNepalHomeFeatured($query)
    {
        return $query->where('publish_types','like','%Nepal%')->orWhere('publish_types','like','%Home Featured%');
    }
}