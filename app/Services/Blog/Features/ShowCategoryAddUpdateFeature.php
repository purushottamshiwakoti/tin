<?php
namespace App\Services\Blog\Features;

use App\Data\Repositories\Contracts\CategoryInterface;
use App\Domains\Backend\Jobs\GetSingleRepositoryJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShowCategoryAddUpdateFeature extends Feature
{
    public $basePrefix = 'categories';
    public function handle(Request $request,CategoryInterface $category)
    {
        $data = [];
        $data['category'] = null;
//        $data['trips'] = $this->run(new GetAllFixedDeparturesJob());
        if($catId = $request->category)
        {
            if(!$data['category'] = $this->run(new GetSingleRepositoryJob($category,$catId)))
            {
                throw new NotFoundHttpException();
            }
        }

        return $this->run(new RespondWithViewJob('backend::categories.edit-add',$data));
    }
}