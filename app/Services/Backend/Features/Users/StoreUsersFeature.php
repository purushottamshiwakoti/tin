<?php
namespace App\Services\Backend\Features\Users;

use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\SaveCoverImageJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Domains\Users\Jobs\StoreUserJob;
use App\Services\Backend\Http\Requests\StoreUserRequest;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class StoreUsersFeature extends Feature
{
    public function handle(StoreUserRequest $request)
    {

        $cover_image = $this->run(new UploadMediaJob($request->file('cover_image')));
        $user = $this->run(new StoreUserJob($request->all()));
        $this->run(new SaveCoverImageJob($user,$cover_image));
        if($user)
        {
            return redirect()->route('admin.users.index');
        }
        $result = ['message'=>'Something went wrong','alert-type'=>'error'];
        return redirect()->back()->with($result);

    }
}
