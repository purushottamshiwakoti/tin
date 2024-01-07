<?php
namespace App\Domains\Settings\Jobs;

use App\Data\Repositories\Contracts\SettingInterface;
use Lucid\Units\Job;

class StoreUpdateSettingJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * @param SettingInterface $setting
     * @return mixed
     */
    public function handle()
    {
        if(isset($data['extra_info']))
        {
            $extraInfo = $data['extra_info'];
            unset($data['extra_info']);
        }
        foreach($this->data as $key=>$d)
        {            
           

            if (!empty($d)) {
                settings()->set($key, $d);
            }
            else{
                settings()->forget($key);
            }
            

        }
        settings()->save();
    }
}