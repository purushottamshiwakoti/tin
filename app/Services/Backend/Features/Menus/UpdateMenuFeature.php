<?php
namespace App\Services\Backend\Features\Menus;

use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\SaveCoverImageJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Domains\Menus\Jobs\UpdateMenuJob;
use App\Services\Backend\Http\Requests\StoreMenuRequest;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class UpdateMenuFeature extends Feature
{
    public function handle(StoreMenuRequest $request)
    {

        $menuId = $request->menu;

        $menu = $this->run(new UpdateMenuJob($menuId,$request->except('_token')));
        if(!$menu)
        {
            $result = ['message'=>'Something went wrong','alert-type'=>'error'];
            return redirect()->back()->with($result);
        }
        return redirect()->route('admin.menus.index')->with(['message'=>'Successfully added menu','alert-type'=>'success']);

    }
}
