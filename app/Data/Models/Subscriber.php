<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/14/18
 * Time: 1:39 PM
 */

namespace App\Data\Models;


use App\Data\Traits\ListableRepoTrait;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use ListableRepoTrait;

    protected $fillable = [
        'first_name',
        'last_name',
        'is_active',
        'unsubscribed_on',
        'email'
    ];

    public $indexColumns = [
        'first_name',
        'last_name',
        'email',
        'is_active'
    ];

    public function getNameAttribute($value)
    {
        return $this->first_name.' '.$this->last_name;
    }

}