<?php
namespace App\Services\Blog\Features;

use App\Data\Repositories\Contracts\PostInterface;
use App\Data\Traits\ListsRepoTrait;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ListPostsFeature extends Feature
{
    use ListsRepoTrait;
    public function handle(Request $request,PostInterface $post)
    {
        return $this->list($request,$post);
    }
}
