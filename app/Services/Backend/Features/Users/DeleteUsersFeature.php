<?php
namespace App\Services\Backend\Features\Users;

use App\Domains\Users\Jobs\DeleteUserJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class DeleteUsersFeature extends Feature
{
    public function handle(Request $request)
    {
        $result = $this->run(new DeleteUserJob($request->user));
        return $result;
    }
}
