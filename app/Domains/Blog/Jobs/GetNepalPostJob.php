<?php
namespace App\Domains\Blog\Jobs;

use App\Data\Repositories\Contracts\CategoryInterface;
use App\Data\Repositories\Contracts\PostInterface;
use Lucid\Units\Job;

class GetNepalPostJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(PostInterface $postInterface)
    {
        return $postInterface->getNepalPosts($this->title);
    }
}