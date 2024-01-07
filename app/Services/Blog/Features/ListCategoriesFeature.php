<?php
namespace App\Services\Blog\Features;

use App\Data\Repositories\Contracts\CategoryInterface;
use App\Data\Traits\ListsRepoTrait;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ListCategoriesFeature extends Feature
{
    use ListsRepoTrait;
    public function handle(Request $request,CategoryInterface $category)
    {
        return $this->list($request,$category);
    }
}
