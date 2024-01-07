<?php
namespace App\Domains\Blog\Jobs;

use App\Data\Repositories\Contracts\PostInterface;
use Lucid\Units\Job;

class GetPostsByTagJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $tag;
    public function __construct($tag)
    {
        $this->tag = $tag;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(PostInterface $post)
    {
        return $post->getByTag($this->tag);
    }
}
