<?php
namespace App\Domains\Pages\Jobs;

use App\Data\Repositories\Contracts\PageInterface;
use Lucid\Units\Job;

class GetPagePublishOptionsJob extends Job
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
    public function handle(PageInterface $page)
    {
        return $page->getPublishTypes();
    }
}
