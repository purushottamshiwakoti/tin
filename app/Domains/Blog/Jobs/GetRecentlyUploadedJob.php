<?php
namespace App\Domains\Blog\Jobs;

use App\Data\Repositories\Contracts\PageInterface;
use App\Data\Repositories\Contracts\PostInterface;
use Lucid\Units\Job;

class GetRecentlyUploadedJob extends Job
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
     * Execute the job.
     *
     * @return void
     */
    public function handle(PostInterface $post)
    {
        return $post->GetRecentlyUploaded();
    }
}
