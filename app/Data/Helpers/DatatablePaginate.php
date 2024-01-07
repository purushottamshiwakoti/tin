<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/21/18
 * Time: 2:39 PM
 */

namespace App\Data\Helpers;


class DatatablePaginate
{

    public static function makeSearchData($columns,$value)
    {
        $search = [];
        foreach ($columns as $k=>$column)
        {
            $search[$k] = [$column['data']=>$value];
        }
        return $search;
    }
}