<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripsTravelStylePivot extends Model
{
    use HasFactory;
    protected $table='trips_travelstyle_pivot';

    protected $fillable = ['trip_id',
    'travel_style_id'
    ];
}
