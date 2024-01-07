<?php
namespace App\Domains\Blog\Jobs;

use App\Data\Repositories\Contracts\PostInterface;
use Lucid\Units\Job;

class GetPostTagsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param PostInterface $post
     * @return array
     */
    public function handle(PostInterface $post)
    {
        $tags = $post->all()->pluck('tags');
        $items = [];
        $tags->map(function ($item) use (&$items){
            if(is_array($item))
            {
                $items = array_flatten($item);
            }

        });
        return $items;
    }
}
