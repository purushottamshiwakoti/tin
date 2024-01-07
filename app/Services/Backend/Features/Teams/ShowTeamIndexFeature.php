<?php
namespace App\Services\Backend\Features\Teams;

use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowTeamIndexFeature extends Feature
{
    public function handle(Request $request)
    {
      
        return $this->run(new RespondWithViewJob('backend::teams.index'));
    }
}
