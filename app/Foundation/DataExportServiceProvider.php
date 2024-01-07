<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 11/21/18
 * Time: 1:32 PM
 */

namespace App\Foundation;


use App\Data\Services\DataExportInterface;
use App\Data\Services\SpideyMailExport;

class DataExportServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(DataExportInterface::class,SpideyMailExport::class);
    }
}