<?php
namespace App\Services\Backend\Features\Sliders;

use App\Domains\Sliders\Jobs\GetSingleSliderJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShowSliderEditAddFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = [];
        $data['slider'] = null;
        if($sliderId = $request->slider)
        {
             if(!$data['slider'] = $this->run(new GetSingleSliderJob($sliderId)))
             {
                 throw new NotFoundHttpException();
             }
        }


        return $this->run(new RespondWithViewJob('backend::sliders.edit-add',$data));

    }
}
