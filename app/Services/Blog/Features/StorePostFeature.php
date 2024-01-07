<?php
namespace App\Services\Blog\Features;

use App\Data\Repositories\Contracts\PostInterface;
use App\Data\Traits\RepoStoresTrait;
use App\Services\Blog\Http\Requests\StorePostRequest;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class StorePostFeature extends Feature
{
    use RepoStoresTrait;

    public $basePrefix = 'posts';
    public function handle(StorePostRequest $request,PostInterface $post)
    {
        return $this->store($request,$post);
    }
}
