<?php
namespace App\Services\Blog\Features;

use App\Data\Repositories\Contracts\PostInterface;
use App\Domains\Backend\Jobs\GetPublishTypesJob;
use App\Domains\Backend\Jobs\GetScopedRepositoryJob;
use App\Domains\Backend\Jobs\GetSingleRepositoryJob;
use App\Domains\Blog\Jobs\GetPostTagsJob;
use App\Domains\Categories\Jobs\GetAllCategoriesJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShowPostAddUpdateFeature extends Feature
{
    public function handle(Request $request,PostInterface $post)
    {

        $data = [];
        $data['post'] = null;
        $data['categories'] = $this->run(new GetAllCategoriesJob());
        $data['post_options'] = $this->run(new GetPublishTypesJob($post));
        $data['tags'] = $this->run(new GetPostTagsJob());
        if($postId = $request->post)
        {
            if(!$data['post'] = $this->run(new GetSingleRepositoryJob($post,$postId)))
            {
                throw new NotFoundHttpException();
            }
        }

        return $this->run(new RespondWithViewJob('backend::posts.edit-add',$data));
    }
}