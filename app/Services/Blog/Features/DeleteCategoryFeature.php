<?php
namespace App\Services\Blog\Features;

use App\Data\Repositories\Contracts\CategoryInterface;
use App\Domains\Backend\Jobs\RemoveRepositoryJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class DeleteCategoryFeature extends Feature
{
    public function handle(Request $request,CategoryInterface $category)
    {
        return $this->run(new RemoveRepositoryJob($category,$request->category));
    }
}
