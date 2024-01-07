<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 9/21/18
 * Time: 2:18 PM
 */

namespace App\Data\Models;


use Illuminate\Database\Eloquent\Model;

class LastMinuteDeal extends Model
{

    protected $fillable = [
        'departure_id',
        'deal_price',
        'available_size',
        'is_menu_featured'
    ];

    public function departure()
    {
        return $this->belongsTo(FixedDeparture::class,'departure_id');
    }
}