<?php
namespace App\Services\Backend\Features\Roles;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Users\Jobs\PaginateUsersJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowRolesIndexPageFeature extends Feature
{
    public function handle(Request $request)
    {
        return $this->run(new RespondWithViewJob('backend::roles.index'));
    }
}
