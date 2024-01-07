<?php
namespace App\Services\Blog\Features;

use App\Data\Repositories\Contracts\PostInterface;
use App\Domains\Backend\Jobs\RemoveRepositoryJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class DeletePostFeature extends Feature
{
    public function handle(Request $request,PostInterface $post)
    {
        return $this->run(new RemoveRepositoryJob($post,$request->post));
    }
}
