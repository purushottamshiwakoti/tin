<?php
namespace App\Services\Backend\Features\Users;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Users\Jobs\PaginateUsersJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowUserIndexPageFeature extends Feature
{
    public function handle(Request $request)
    {
        return $this->run(new RespondWithViewJob('backend::users.index'));
    }
}
