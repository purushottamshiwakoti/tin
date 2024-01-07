<?php
namespace App\Domains\Regions\Jobs;

use App\Data\Repositories\Contracts\RegionInterface;
use Lucid\Units\Job;

class GetSingleRegionBySlugJob extends Job
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
    public function handle(RegionInterface $region)
    {
        return $region->findBySlug($this->slug);
    }
}
