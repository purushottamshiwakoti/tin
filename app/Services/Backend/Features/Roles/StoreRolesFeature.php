<?php
namespace App\Services\Backend\Features\Roles;

use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\SaveCoverImageJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Domains\Roles\Jobs\StoreRoleJob;
use App\Services\Backend\Http\Requests\StoreRoleRequest;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class StoreRolesFeature extends Feature
{
    public function handle(StoreRoleRequest $request)
    {

        $role = $this->run(new StoreRoleJob($request->all()));
        if($role)
        {
            return redirect()->route('admin.roles.index');
        }
        $result = ['message'=>'Something went wrong','alert-type'=>'error'];
        return redirect()->back()->with($result);

    }
}
