<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 11/18/18
 * Time: 3:29 PM
 */

namespace App\Data\Services;


interface DataExportInterface
{

    public function export($data);

    public function exportOne($data);

}