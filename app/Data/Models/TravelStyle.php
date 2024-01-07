<?php

namespace App\Data\Models;

use App\Data\Traits\AttachableTrait;
use App\Data\Traits\RatableTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class TravelStyle extends Model
{
   

    use AttachableTrait,Sluggable,RatableTrait;
    protected $table='travel_style';

    protected $fillable = ['title',
    'excerpt',
    'description',
    'slug' ,
    'order',
    'publish_types',
    'publish'];
    

    public function sluggable(): array
    {
        return [
            'slug'=>[
                'source'=>'title'
            ]
        ];
    }

    protected $casts = [
        'publish_types' => 'array',
    ];


    public function trips()
    {
        return $this->belongsToMany(Trip::class,'trips_travelstyle_pivot');
    }

    public function scopePublished($query)
    {
        return $query->where('publish',1);
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('id','DESC');
    }
}
