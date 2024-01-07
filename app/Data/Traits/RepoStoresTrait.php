<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/26/18
 * Time: 12:44 PM
 */

namespace App\Data\Traits;


use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\SaveCoverImageJob;
use App\Domains\Attachments\Jobs\SaveImageJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Domains\Backend\Jobs\StoreRepositoryJob;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Lucid\Bus\UnitDispatcher;
use Lucid\Foundation\JobDispatcherTrait;

trait RepoStoresTrait
{

    use DispatchesJobs,UnitDispatcher ; 

    public function store(Request $request,$repository)
    {
        $attachment = $this->run(new UploadMediaJob($request->file('image')));
        $cover_image = $this->run(new UploadMediaJob($request->file('cover_image')));
        $footer_image = $this->run(new UploadMediaJob($request->file('footer_image')));
        $res = $this->run(new StoreRepositoryJob($repository,$request->except('_token')));
        $this->run(new SaveAttachmentJob($res,$attachment));
        $this->run(new SaveCoverImageJob($res,$cover_image));
        $this->run(new SaveImageJob($res,$footer_image,'footer_image'));
        if($res)
        {
            $backUrl = (isset($this->redirectUrl) && $this->redirectUrl)?url()->to($this->redirectUrl):route('admin.'.$this->basePrefix.'.index');
            return redirect()->to($backUrl)->with(['message'=>'Successful','alert-type'=>'success','page'=>'contact']);
        }
        $result = ['message'=>'Something went wrong','alert-type'=>'error'];
        return redirect()->back()->with($result);
    }
}