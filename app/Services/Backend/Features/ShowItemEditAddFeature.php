<?php
namespace App\Services\Backend\Features;

use App\Data\Repositories\Repository;
use App\Domains\Backend\Jobs\GetRepositoryInstanceJob;
use App\Domains\Backend\Jobs\GetSingleRepositoryJob;
use App\Domains\Backend\Jobs\GetViewNameJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Trips\Jobs\GetDepartureAvailabilityJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShowItemEditAddFeature extends Feature
{

    public $interface;

    public $id;
    public function __construct(Repository $interface,$id  = '')
    {
        $this->interface = $interface;
        $this->id = $id;
    }

    public function handle(Request $request)
    {
        $data = [];
        $data['dataObject'] = $this->run(new GetRepositoryInstanceJob($this->interface));
        if($this->id)
        {
            if(!$data['dataObject'] = $this->run(new GetSingleRepositoryJob($this->interface,$this->id)))
            {
                throw new NotFoundHttpException();
            }
        }

        $data['trip_availability'] = $this->run(GetDepartureAvailabilityJob::class);
        $routeName = $request->route()->getName();
        $dataName = explode('.',$routeName)[1];
        $visible = $this->interface->getIndexColumns();
        $data['name'] = $dataName;
        $data['columns'] = $visible;
        try{
            return $this->run(new RespondWithViewJob('backend::'.$dataName.'.edit-add',$data));
        }catch (\InvalidArgumentException $e)
        {
            return $this->run(new RespondWithViewJob('backend::edit-add',$data));
        }
    }
}
