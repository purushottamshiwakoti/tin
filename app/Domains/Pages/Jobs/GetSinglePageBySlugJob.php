<?php
namespace App\Domains\Pages\Jobs;

use App\Data\Repositories\Contracts\PageInterface;
use Lucid\Units\Job;

class GetSinglePageBySlugJob extends Job
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
    public function handle(PageInterface $page)
    {
        // dd($page->findBySlug($this->slug));
        return $page->findBySlug($this->slug);
    }
}
