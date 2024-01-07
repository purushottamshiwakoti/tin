<?php
namespace App\Services\Backend\Features\Teams;

use Lucid\Units\Feature;
use Illuminate\Http\Request;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Teams\Jobs\GetSingleTeamJob;
use Http\Discovery\Exception\NotFoundException;

class ShowTeamEditAddFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = [];
        $data['team'] = null;
        if($teamId = $request->team)
        {
             if(!$data['team'] = $this->run(new GetSingleTeamJob($teamId)))
             {
                 throw new NotFoundException();
             }
        }


        return $this->run(new RespondWithViewJob('backend::teams.edit-add',$data));


    }
}
