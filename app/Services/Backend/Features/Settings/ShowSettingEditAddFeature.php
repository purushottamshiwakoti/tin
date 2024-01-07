<?php
namespace App\Services\Backend\Features\Settings;

use App\Domains\Settings\Jobs\GetFirstSettingJob;
use App\Domains\Settings\Jobs\GetSingleSettingJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShowSettingEditAddFeature extends Feature
{
    public function handle(Request $request)
    {
       
        $data = [];
        $data['setting'] = json_decode(json_encode(settings()->all()));
        return $this->run(new RespondWithViewJob('backend::settings.edit-add',$data));

    }
}
