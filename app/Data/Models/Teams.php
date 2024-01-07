<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Data\Traits\AttachableTrait;

class Teams extends Model
{
    use HasFactory;
    use AttachableTrait;

    protected $fillable = ['name','title','description','position','publish'];


  


    public function coverImage()
    {
        return $this->morphOne(Attachment::class,'attachable')->where('media_type','cover');
    }
    public function scopePublished($query)
    {
        return $query->where('publish',1);
    }

}
