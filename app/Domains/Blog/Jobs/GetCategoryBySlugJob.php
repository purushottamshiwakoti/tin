<?php
namespace App\Domains\Blog\Jobs;

use App\Data\Repositories\Contracts\CategoryInterface;
use Lucid\Units\Job;

class GetCategoryBySlugJob extends Job
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
    public function handle(CategoryInterface $category)
    {
        return $category->findBySlug($this->slug);
    }
}
