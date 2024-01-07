<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 9/4/18
 * Time: 3:17 PM
 */

namespace App\Data\Models;


use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $fillable = [
        'title',
        'message',
        'route',
        'url',
        'is_read'
    ];

    public function scopeLatest($query)
    {
        return $query->orderBy('created_at','desc');
    }

    public function getUrlAttribute($value)
    {
        return url('admin/'.$value);
    }
}