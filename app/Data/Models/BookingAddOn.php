<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/13/18
 * Time: 12:37 PM
 */

namespace App\Data\Models;


use Illuminate\Database\Eloquent\Model;

class BookingAddOn extends Model
{
    protected $table = 'bookings_add_ons';

    protected $fillable = [
        'booking_id',
        'booking_add_on_id',
        'title',
        'key',
        'value'
    ];

}