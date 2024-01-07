<?php
namespace App\Services\Backend\Features\Roles;


use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Permissions\Jobs\ListPermissionsJob;
use App\Domains\Roles\Jobs\ListRolesJob;
use App\Domains\Roles\Jobs\GetSingleRoleJob;
use Illuminate\Http\Request;
use Lucid\Units\Feature;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShowRolesEditAddFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = [];
        $data['role'] = null;
        $data['permissions'] = $this->run(ListPermissionsJob::class);
        $permission_groups = [];
        $data['permissions']->map(function ($item) use(&$permission_groups){
            $group = explode('.',$item->name)[0];
//            if(!in_array($group,$permission_groups))
//            {
//                $permission_groups[] =  $group;
//            }
            $item->label = ucwords(str_replace('.',' ',$item->name));
            $permission_groups[$group][] =  $item;

        });

        $data['permissionGroups'] = json_decode(json_encode($permission_groups));
        if($roleId = $request->role)
        {
             if(!$data['role'] = $this->run(new GetSingleRoleJob($roleId)))
             {
                 throw new NotFoundHttpException();
             }
        }

        return $this->run(new RespondWithViewJob('backend::roles.edit-add',$data));

    }
}
