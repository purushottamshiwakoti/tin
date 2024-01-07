<?php
namespace App\Domains\Blog\Jobs;

use App\Data\Repositories\Contracts\PostInterface;
use Lucid\Units\Job;

class GetArchivePostsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $archive;
    public function __construct($archive)
    {
        $this->archive = $archive;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(PostInterface $post)
    {
        return $post->getArchivePosts($this->archive);
    }
}
