<?php
namespace App\Services\Backend\Features\Menus;

use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\SaveCoverImageJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Domains\Menus\Jobs\StoreMenuJob;

use App\Services\Backend\Http\Requests\StoreMenuRequest;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class StoreMenuFeature extends Feature
{
    public function handle(StoreMenuRequest $request)
    {

        $menu = $this->run(new StoreMenuJob($request->all()));
        if($menu)
        {
            return redirect()->route('admin.menus.index')->with(['message'=>'Successfully added menu','alert-type'=>'success']);
        }
        $result = ['message'=>'Something went wrong','alert-type'=>'error'];
        return redirect()->back()->with($result);

    }
}
