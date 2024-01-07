<?php
namespace App\Domains\Blog\Jobs;

use App\Data\Repositories\Contracts\PostInterface;
use Lucid\Units\Job;

class GetSinglePostBySlugJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $slug;
    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(PostInterface $post)
    {
        return $post->findBySlug($this->slug);
    }
}
