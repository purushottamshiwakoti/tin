<?php
namespace App\Services\Backend\Features\Teams;

use App\Domains\Teams\Jobs\UpdateTeamJob;
use App\Domains\TravelStyles\Jobs\UpdateTravelStyleJob;
use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\SaveCoverImageJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class UpdateTeamFeature extends Feature
{
    public function handle(Request $request)
    {

    $teamId = $request->team;
      
        $attachment = $this->run(new UploadMediaJob($request->file('image')));
        $cover_image = $this->run(new UploadMediaJob($request->file('cover_image')));
        $team = $this->run(new UpdateTeamJob($teamId,$request->except('_token')));
        $this->run(new SaveAttachmentJob($team,$attachment));
        $this->run(new SaveCoverImageJob($team,$cover_image));

      
        if(!$team)
        {
            $result = ['message'=>'Something went wrong','alert-type'=>'error'];
            return redirect()->back()->with($result);
        }
        return redirect()->route('admin.teams.index');

    }
}
