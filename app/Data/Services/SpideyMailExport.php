<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 11/18/18
 * Time: 3:30 PM
 */

namespace App\Data\Services;


use GuzzleHttp\Client;

class SpideyMailExport implements DataExportInterface
{

    protected $client;
    private $listUid;
    public function __construct()
    {
        $config = config('dataexport.settings.spidey.config');
        $this->listUid = config('dataexport.settings.spidey.listuid');
        $this->client = new Client($config);
    }

    public function export($data)
    {

    }

    public function exportOne($data)
    {
        try{
            $subscriber = $this->client->post('lists/'.$this->listUid.'/subscribers/store',$data);
            return $subscriber->getBody();
        }catch (\Exception $exception)
        {
            return $exception->getCode();
        }


    }
}