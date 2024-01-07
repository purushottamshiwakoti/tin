<?php
namespace App\Services\Backend\Features\Users;


use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Roles\Jobs\ListRolesJob;
use App\Domains\Users\Jobs\GetSingleUserJob;
use Illuminate\Http\Request;
use Lucid\Units\Feature;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShowUsersEditAddFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = [];
        $data['user'] = null;
        $data['roles'] = $this->run(ListRolesJob::class);
        if($destinationId = $request->user)
        {
             if(!$data['user'] = $this->run(new GetSingleUserJob($destinationId)))
             {
                 throw new NotFoundHttpException();
             }
        }

        return $this->run(new RespondWithViewJob('backend::users.edit-add',$data));

    }
}
