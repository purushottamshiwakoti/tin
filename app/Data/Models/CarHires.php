<?php

namespace App\Data\Models;

use App\Data\Traits\ListableRepoTrait;
use Illuminate\Database\Eloquent\Model;

class CarHires extends Model
{

    use ListableRepoTrait;

    protected $fillable = [
        'departure',
        'arrival',
        'flight_type',
        'departure_date',
        'return_date',
        'adult',
        'child',
        'infant',
        'number_of_pax',
        'flexible_date',
        'first_name',
        'last_name',
        'email',
        'message'
    ];

   
}