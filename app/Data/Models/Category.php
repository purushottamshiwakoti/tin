<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/26/18
 * Time: 1:24 PM
 */

namespace App\Data\Models;


use App\Data\Traits\AttachableTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes,AttachableTrait,Sluggable;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];

    public function sluggable(): array
    {
        return [
            'slug'=>[
                'source'=>'title'
            ]
        ];
    }

    public function coverImage()
    {
        return $this->morphOne(Attachment::class,'attachable')->where('media_type','cover');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}