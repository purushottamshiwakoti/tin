<?php
namespace App\Domains\Categories\Jobs;

use App\Data\Repositories\Contracts\CategoryInterface;
use Lucid\Units\Job;

class GetAllCategoriesJob extends Job
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
    public function handle(CategoryInterface $category)
    {
        return $category->all();
    }
}
