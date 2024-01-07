<?php
namespace App\Services\Backend\Features\Pages;

use App\Domains\Pages\Jobs\GetAllPagesJob;
use App\Domains\Pages\Jobs\GetPagePublishOptionsJob;
use App\Domains\Pages\Jobs\GetSinglePageJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Pages\Jobs\GetTemplateListsJob;
use App\Domains\Trips\Jobs\GetScopedTripsJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShowPagesEditAddFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = [];
        $data['page'] = null;
        $data['page_options'] = $this->run(GetPagePublishOptionsJob::class);
        $data['pages'] = $this->run(GetAllPagesJob::class);
        $data['trips'] = $this->run(new GetScopedTripsJob(['published']));
        $data['templates'] = $this->run(new GetTemplateListsJob());
        if($pageId = $request->page)
        {
             if(!$data['page'] = $this->run(new GetSinglePageJob($pageId)))
             {
                 throw new NotFoundHttpException();
             }
        }


        return $this->run(new RespondWithViewJob('backend::pages.edit-add',$data));

    }
}
