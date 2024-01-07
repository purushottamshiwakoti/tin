<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 9/5/18
 * Time: 1:01 PM
 */

namespace App\Data\Traits;


trait ListableRepoTrait
{

    public $settingOptions = [
        'showActions'=>true,
        'editable'=>false,
        'deletable'=>false,
        'readable'=>true
    ];
}