<?php
namespace App\Services\Backend\Features\Users;

use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\SaveCoverImageJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Domains\Users\Jobs\UpdateUserJob;
use App\Services\Backend\Http\Requests\StoreUserRequest;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class UpdateUsersFeature extends Feature
{
    public function handle(StoreUserRequest $request)
    {
        $userId = $request->user;
        $cover_image = $this->run(new UploadMediaJob($request->file('cover_image')));

        $user = $this->run(new UpdateUserJob($userId,$request->except('_token')));
        $this->run(new SaveCoverImageJob($user,$cover_image));
        if(!$user)
        {
            $result = ['message'=>'Something went wrong','alert-type'=>'error'];
            return redirect()->back()->with($result);
        }
        return redirect()->route('admin.users.index');

    }
}
