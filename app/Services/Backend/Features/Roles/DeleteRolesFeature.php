<?php
namespace App\Services\Backend\Features\Roles;

use App\Domains\Roles\Jobs\DeleteRoleJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class DeleteRolesFeature extends Feature
{
    public function handle(Request $request)
    {
        $result = $this->run(new DeleteRoleJob($request->role));
        return $result;
    }
}
