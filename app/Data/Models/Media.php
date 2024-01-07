<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/25/18
 * Time: 1:20 PM
 */

namespace App\Data\Models;


use Illuminate\Database\Eloquent\Model;

class Media extends Model
{

    protected $table = 'medias';
    protected $fillable = ['file_name','original_name'];

}