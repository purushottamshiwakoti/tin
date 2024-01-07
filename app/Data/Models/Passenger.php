<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/12/18
 * Time: 5:02 PM
 */

namespace App\Data\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Passenger extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'booking_id',
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'date_of_birth',
        'nationality',
        'gender',
        'address',
        'second_address',
        'is_lead',
        'mobile_number',
        'state',
        'zip_code',
        'country',
        'cancel_requested_at',
        'cancelled_at',
    ];

    /**
     * @param $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return $this->title.' '.$this->first_name.' '.(($this->middle_name)?$this->middle_name.' ':'').$this->last_name;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    /**
     * @param $value
     * @return bool
     */
    public function getIsReadyToGoAttribute($value)
    {
        return ($this->cancel_requested_at || $this->cancelled_at)?false:true;
    }

    public function scopeCancelRequested($query)
    {
        return $query->whereNotNull('cancel_requested_at');
    }
    public function scopeOnlyCancelRequested($query)
    {
        return $query->whereNotNull('cancel_requested_at')->whereNull('cancelled_at');
    }

    public function scopeCancelled($query)
    {
        return $query->whereNotNull('cancelled_at');
    }


}