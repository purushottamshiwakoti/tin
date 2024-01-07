<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/25/18
 * Time: 2:48 PM
 */

namespace App\Data\Models;


use App\Data\Models\Destination;
use App\Data\Traits\AttachableTrait;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DestinationFaq extends Model
{

    use HasFactory;
    protected $fillable=[
        'question',
        'answer',
        'destination_id',
    ];
    public function destination(){
        return $this->belongsTo(Destination::class); 
    }
  

  

}