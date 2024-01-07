<?php
namespace App\Services\Backend\Features\Teams;
use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\SaveCoverImageJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Domains\Destinations\Jobs\StoreDestinationJob;
use App\Domains\Teams\Jobs\StoreTeamJob;
use App\Services\Destinations\Http\Requests\StoreDestinationRequest;
use App\Domains\TravelStyles\Jobs\StoreTravelStyleJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class StoreTeamFeature extends Feature
{
    public function handle(Request $request)
    {

        $attachment = $this->run(new UploadMediaJob($request->file('image')));
        $cover_image = $this->run(new UploadMediaJob($request->file('cover_image')));
        $team = $this->run(new StoreTeamJob($request->all()));
        $this->run(new SaveAttachmentJob($team,$attachment));
        $this->run(new SaveCoverImageJob($team,$cover_image));
        if($team)
        {
            return redirect()->route('admin.teams.index');
        }
        $result = ['message'=>'Something went wrong','alert-type'=>'error'];
        return redirect()->back()->with($result);

    }
}
