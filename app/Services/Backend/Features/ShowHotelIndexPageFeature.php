<?php
namespace App\Services\Backend\Features;

use App\Data\Repositories\Repository;
use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowHotelIndexPageFeature extends Feature
{
    private  $interface;
    public function __construct(Repository $interface)
    {
        $this->interface = $interface;
    }

    public function handle(Request $request)
    {
        $routeName = $request->route()->getName();
        $view = str_replace('admin.','backend::',$routeName);

        $dataName = explode('.',explode('::',$view)[1])[0];
        $visible = $this->interface->getIndexColumns();
        $data['name'] = $dataName;
        $data['columns'] = $visible;
        $data['settingOptions'] = $this->interface->getSettings();
        try{
            return $this->run(new RespondWithViewJob($view,$data));
        }catch (\InvalidArgumentException $e)
        {
            return $this->run(new RespondWithViewJob('backend::index',$data));
        }
    }
}