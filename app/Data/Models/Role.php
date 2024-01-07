<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/10/18
 * Time: 1:27 PM
 */

namespace App\Data\Models;


class Role extends \Spatie\Permission\Models\Role
{

    protected $fillable = ['name','guard_name'];
}