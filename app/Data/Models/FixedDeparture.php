<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/11/18
 * Time: 3:24 PM
 */

namespace App\Data\Models;



use App\Data\Traits\OfferableTrait;
use Illuminate\Database\Eloquent\Model;

class FixedDeparture extends Model
{

    use OfferableTrait;
    protected $fillable = [
        'trip_id',
        'start_date',
        'finish_date',
        'availability',
        'size',
        'price',
        'publish',
        'include_flight_info',
        'trip_code'
    ];

    public $indexColumns = [
        'trip.title',

        'trip_code',
        'start_date',
        'finish_date',
        'price',
        'lastminutedeal.deal_price',
        'lastminutedeal.available_size',

    ];

    public static function boot()
    {
        static::saving(function($model){
            $model->trip_code = optional($model->trip)->trip_code.'-'.$model->start_date->format('dmy');

        });
        parent::boot();
    }

    protected $dates = ['start_date','finish_date'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

//    public function getTripCodeAttribute($value)
//    {
//        $trip_code = $this->trip_code;
//        if(!$trip_code)
//        {
//            $trip_code = $this->trip->trip_code.'-'.$this->start_date->format('dmy');
//        }
//        return $trip_code;
//    }

    public function getCostPriceAttribute($value)
    {
        if($this->lastminutedeal)
        {
            return $this->lastminutedeal->deal_price;
        }
        return $this->price;
    }

    /**
     * @param $value
     * @return string
     */
    public function getTitleAttribute($value)
    {
        return $this->trip->title.' '.$this->start_date->format('M d Y').'-'.$this->finish_date->format('M d Y');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopePublished($query)
    {
        return $query->where('publish',1)->whereHas('trip');
    }


    /**
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('start_date','>=',now())->orderBy('start_date','asc');
    }

    /**
     * @param $value
     * @return string
     */
    public function getDayDurationAttribute($value)
    {
        $interval = $this->finish_date->diff($this->start_date);
        return ($interval)?$interval->format('%a').' days':'-';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lastminutedeal()
    {
        return $this->hasOne(LastMinuteDeal::class,'departure_id');
    }

    public function scopeLastminute($query)
    {
        return $query->whereHas('lastminutedeal');
    }

}