<?php
namespace App\Services\Backend\Features;

use App\Data\Repositories\Repository;
use App\Domains\Backend\Jobs\GetSingleRepositoryJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShowSingleItemFeature extends Feature
{
    protected $interface;
    protected $id;
    public function __construct(Repository $interface, $id)
    {
        $this->interface = $interface;
        $this->id = $id;
    }

    public function handle(Request $request)
    {
        if(!$data['dataObject'] = $this->run(new GetSingleRepositoryJob($this->interface,$this->id)))
        {
            throw new NotFoundHttpException();
        }

        $routeName = $request->route()->getName();
        $dataName = explode('.',$routeName)[1];
        $visible = $this->interface->getIndexColumns();
        $data['name'] = $dataName;
        $data['columns'] = $visible;
        try{
            return $this->run(new RespondWithViewJob('backend::'.$dataName.'.read',$data));
        }catch (\InvalidArgumentException $e)
        {
            return $this->run(new RespondWithViewJob('backend::read',$data));
        }
    }
}
