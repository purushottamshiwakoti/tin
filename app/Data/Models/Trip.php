<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/25/18
 * Time: 2:54 PM
 */

namespace App\Data\Models;


use App\Data\Traits\AttachableTrait;
use App\Data\Traits\RatableTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Trip extends Model
{

    use AttachableTrait,SoftDeletes,Sluggable,RatableTrait;

    protected $fillable = [
        'title',
        'caption',
        'destination_id',
        'tripable_id',
        'tripable_type',
        'slug',
        'overview',
        'duration',
        'difficulty',
        'old_price',
        'old_price',
        'price',
        'average_rating',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'publish',
        'publish_types',
        'trip_code',
        'has_departure',
        'flight_info',
        'alternate_overview',
        'youtube_code',
        'order'
    ];

    /**
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
    protected $casts = [
        'publish_types' => 'array',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function tripable()
    {
        return $this->morphTo();
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class,'tripable_id')->where('tripable_type','activity');
    }
     public function activite()
    {
        return $this->belongsTo(Activity::class,'tripable_id');
    }
   

    public function region()
    {
        return $this->belongsTo(Region::class,'tripable_id')->where('tripable_type','region');
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class,'destination_id');
    }
    
  

    public function extraValues()
    {
        return $this->morphMany(ExtraValue::class,'addable')->where('type','default');
    }

    public function tripNotes()
    {
        return $this->morphMany(ExtraValue::class,'addable')->where('type','notes');
    }

    public function alternateItinerary()
    {
        return $this->morphMany(ExtraValue::class,'addable')->where('type','alternate_itinerary');
    }

    public function alternateNotes()
    {
        return $this->morphMany(ExtraValue::class,'addable')->where('type','alternate_notes');
    }

    public function getAverageRatingAttribute($value)
    {
        $ratings = $this->ratings;
        if(count($ratings)>0)
        {
            return $ratings->sum('rating_value')/count($ratings);
        }
        return 0;

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class,'trip_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function faqs()
    {
        return $this->hasMany(Faq::class,'trip_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function itinerary()
    {
        return $this->hasOne(Itinerary::class,'trip_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fixedDepartures()
    {
        return $this->hasMany(FixedDeparture::class,'trip_id');
    }

    public function activeFixedDepartures()
    {
        return $this->fixedDepartures()->active();
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopePublished($query)
    {
        return $query->where('publish',1);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeExtension($query)
    {
        return $query->where('publish_types','like','%Extension%');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeFeatured($query)
    {
        return $query->where('publish_types','like','%Featured%');
    }
    
    public function scopeHomeFeatured($query)
    {
        return $query->where('publish_types','like','%HomeFeatured%');
    }
     public function scopeMenuFeatured($query)
    {
        return $query->where('publish_types','like','%MenuFeatured%');
    }

    public function scopeSpecialDeals($query)
    {
        return $query->where('publish_types','like','%SpecialDeals%');
    }
    public function scopeDestinationFeatured($query)
    {
        return $query->where('publish_types','like','%DestinationFeatured%');
    }
    

    public function getFirstImageAttribute()
    {
        return $this->getFirstImage();
    }

    public function scopeHasdeal($query)
    {
        return $query->whereHas('activeFixedDepartures',function ($q){
            return $q->lastminute();
        });
    }

    public function getMinDealPriceAttribute($value)
    {
        $lowestDeal = $this->activeFixedDepartures()->whereHas('lastminutedeal',function ($q){
            return $q->orderBy('deal_price','asc');
        })->first();
//        $price = $departures->filter(function ($item){
//            return $item->lastminutedeal->price;
//        });
        return $lowestDeal->lastminutedeal->deal_price;
    }

    public function getDealWMinPriceAttribute($value)
    {
        $lowestDeal = $this->activeFixedDepartures()->whereHas('lastminutedeal',function ($q){
            return $q->orderBy('deal_price','asc');
        })->first();
        return $lowestDeal;
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeByBooking($query)
    {
        return $query->withCount('bookings')->whereHas('bookings',function ($q){
            $q->where('status','complete');
        })->orderBy('bookings_count','desc')->take(4);
    }

    public function scopeActivityFiltered($query,$activities)
    {
        return $query->where(function($q) use($activities){
            return $q->whereIn('tripable_id', $activities)->where('tripable_type', 'activity')
                ->orWhereHas('region', function ($qs) use ($activities) {
                    return $qs->whereIn('activity_id', $activities);
                });
        });
    }

    public function scopePriceFiltered($query,$price)
    {
        return $query->whereBetween('price',$price);
    }

    public function getDealInitialPriceAttribute($value)
    {
        $departurePrice = $this->activeFixedDepartures()->max('price')? :0;
        return max($departurePrice,$this->price);
//        return $departurePrice?$departurePrice:$this->price;
    }

    public function scopeDurationFiltered($query,$duration)
    {
        return $query->whereBetween(DB::raw("CAST(SUBSTRING_INDEX(duration, ' ', 1) AS DECIMAL(10,2))"),$duration);
    }

    public function gallery()
    {
        return $this->morphMany(Attachment::class,'attachable')->where('media_type','gallery');
    }

    public function coverImage()
    {
        return $this->morphOne(Attachment::class,'attachable')->where('media_type','cover');
    }

    public function travelStyles()
    {
        return $this->belongsToMany(TravelStyle::class,'trips_travelstyle_pivot','trip_id','travel_style_id');
    }
}