<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/26/18
 * Time: 12:50 PM
 */

namespace App\Data\Traits;


use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\SaveCoverImageJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Domains\Backend\Jobs\UpdateRepositoryJob;
use Illuminate\Http\Request;

trait RepoUpdatesTrait
{


    public function update(Request $request,$repository, int $id)
    {
        $attachment = $this->run(new UploadMediaJob($request->file('image')));
        $cover_image = $this->run(new UploadMediaJob($request->file('cover_image')));

        $res = $this->run(new UpdateRepositoryJob($repository,$id,$request->except('_token')));
        $this->run(new SaveAttachmentJob($res,$attachment));
        $this->run(new SaveCoverImageJob($res,$cover_image));
        if($res)
        {
            $redirectRoute = $this->redirectRoute();
            if($redirectRoute)
            {
                return $redirectRoute;
            }
            return redirect()->route('admin.'.$this->basePrefix.'.index');
        }
        $result = ['message'=>'Something went wrong','alert-type'=>'error'];
        return redirect()->back()->with($result);
    }

    protected function redirectRoute()
    {
        return false;
    }
}