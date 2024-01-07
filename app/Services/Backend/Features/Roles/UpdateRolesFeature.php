<?php
namespace App\Services\Backend\Features\Roles;

use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\SaveCoverImageJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Domains\Roles\Jobs\UpdateRoleJob;
use App\Services\Backend\Http\Requests\StoreRoleRequest;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class UpdateRolesFeature extends Feature
{
    public function handle(StoreRoleRequest $request)
    {
        $roleId = $request->role;

        $role = $this->run(new UpdateRoleJob($roleId,$request->except('_token')));
        if(!$role)
        {
            $result = ['message'=>'Something went wrong','alert-type'=>'error'];
            return redirect()->back()->with($result);
        }
        return redirect()->route('admin.roles.index');

    }
}
