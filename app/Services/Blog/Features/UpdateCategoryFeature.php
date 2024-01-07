<?php
namespace App\Services\Blog\Features;

use App\Data\Repositories\Contracts\CategoryInterface;
use App\Data\Traits\RepoUpdatesTrait;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class UpdateCategoryFeature extends Feature
{
    use RepoUpdatesTrait;
    public $basePrefix = 'categories';
    public function handle(Request $request,CategoryInterface $category)
    {
        return $this->update($request,$category,$request->category);
    }
}
