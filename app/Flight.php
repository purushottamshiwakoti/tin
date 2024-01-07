<?php

namespace App;

use App\Data\Models\Attachment;
use App\Data\Traits\AttachableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory, AttachableTrait;
    //  use AttachableTrait,SoftDeletes,Sluggable,RatableTrait;

    protected $fillable = [
        'overview_description',
        'from',
        'slug',
        'starting_price',
        'to',
        'book_flight_description',
        'flight_deals',
        'faqs',
        'category',
        'publish',
        'flight_deals_description',
        'flight_deals_title',
        'seo_title',
        'seo_keywords',
        'seo_description'
    ];

    public function coverImage()
    {
        return $this->morphOne(Attachment::class, 'attachable')->where('media_type', 'cover');
    }

    public function attachments()
    {
        return $this->hasOne(Attachment::class,);
    }
}
