<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/20/18
 * Time: 1:31 PM
 */

namespace App\Data\Models;


use Illuminate\Database\Eloquent\Model;

class FavouriteTour extends Model
{

    protected $fillable = [
        'customer_id',
        'identifier',
        'trip_id',
        'client_ip'
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

}