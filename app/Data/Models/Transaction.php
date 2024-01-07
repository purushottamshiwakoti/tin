<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 3/28/19
 * Time: 11:39 AM
 */

namespace App\Data\Models;


use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{


    public $fillable = [
        'payable_id',
        'payable_type',
        'gateway',
        'transaction_id',
        'status',
        'payer_id'
    ];

    public function payable()
    {
        return $this->morphTo();
    }

}