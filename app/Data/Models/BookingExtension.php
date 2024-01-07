<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/14/18
 * Time: 2:16 PM
 */

namespace App\Data\Models;


use Illuminate\Database\Eloquent\Model;

class BookingExtension extends Model
{

    protected $fillable = [
        'booking_id',
        'trip_id',
        'price',
        'title'
    ];

}