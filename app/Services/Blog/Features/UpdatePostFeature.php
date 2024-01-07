<?php
namespace App\Services\Blog\Features;

use App\Data\Repositories\Contracts\PostInterface;
use App\Data\Traits\RepoUpdatesTrait;
use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\SaveCoverImageJob;
use App\Domains\Attachments\Jobs\SaveImageJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Domains\Backend\Jobs\UpdateRepositoryJob;
use App\Services\Blog\Http\Requests\StorePostRequest;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class UpdatePostFeature extends Feature
{
//    use RepoUpdatesTrait;
    public $basePrefix = 'posts';
    public function handle(StorePostRequest $request,PostInterface $post)
    {
        $attachment = $this->run(new UploadMediaJob($request->file('image')));
        $cover_image = $this->run(new UploadMediaJob($request->file('cover_image')));
        $footer_image = $this->run(new UploadMediaJob($request->file('footer_image')));

        $res = $this->run(new UpdateRepositoryJob($post,$request->post,$request->except('_token')));
        $this->run(new SaveAttachmentJob($res,$attachment));
        $this->run(new SaveCoverImageJob($res,$cover_image));
        $this->run(new SaveImageJob($res,$footer_image,'footer_image'));
        if($res)
        {
        return redirect()->route('admin.posts.edit',$request->post);

            // $redirectRoute = $this->redirectRoute();
            // if($redirectRoute)
            // {
            //     return $redirectRoute;
            // }
            // return redirect()->route('admin.'.$this->basePrefix.'.index');
        }
        $result = ['message'=>'Something went wrong','alert-type'=>'error'];
        return redirect()->back()->with($result);
    }

    protected function redirectRoute()
    {
        return redirect()->route('admin.posts.edit',['post'=>request()->post]);
    }
}
