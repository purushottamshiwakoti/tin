<?php

namespace App\Data\Models;


use App\Data\Traits\ListableRepoTrait;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{

    use ListableRepoTrait;

    protected $fillable = [
        'place',
        'hotel_type',
        'check_in_date',
        'check_out_date',
        'number_of_pax',
        
        'first_name',
        'last_name',
        'email',
        'message'
    ];

   
}