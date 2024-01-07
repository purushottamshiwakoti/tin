<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model 
{
    use HasFactory;

    protected $table='places';

    
    protected $fillable=['name','publish_types','status'];

   
}