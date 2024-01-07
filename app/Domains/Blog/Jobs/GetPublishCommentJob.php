<?php
namespace App\Domains\Blog\Jobs;

use App\Data\Repositories\Contracts\PostInterface;
use App\Data\Repositories\Contracts\RatingInterface;
use Lucid\Units\Job;

class GetPublishCommentJob extends Job
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
    public function handle(RatingInterface $post)
    {
        return $post->getPublishCommnet();
    }
}
