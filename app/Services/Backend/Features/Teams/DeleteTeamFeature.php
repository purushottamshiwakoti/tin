<?php
namespace App\Services\Backend\Features\Teams;

use App\Domains\Teams\Jobs\DeleteTeamJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class DeleteTeamFeature extends Feature
{
    public function handle(Request $request)
    {
        $result = $this->run(new DeleteTeamJob($request->team));
        return $result;
    }
}
