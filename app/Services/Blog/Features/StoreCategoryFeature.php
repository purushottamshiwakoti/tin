<?php
namespace App\Services\Blog\Features;

use App\Data\Repositories\Contracts\CategoryInterface;
use App\Data\Traits\RepoStoresTrait;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class StoreCategoryFeature extends Feature
{
    use RepoStoresTrait;

    public $basePrefix = 'categories';
    public function handle(Request $request,CategoryInterface $category)
    {
        return $this->store($request,$category);
    }
}
