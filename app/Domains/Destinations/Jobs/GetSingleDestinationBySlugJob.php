<?php
namespace App\Domains\Destinations\Jobs;

use App\Data\Repositories\Contracts\DestinationInterface;
use Lucid\Units\Job;

class GetSingleDestinationBySlugJob extends Job
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
    public function handle(DestinationInterface $destination)
    {
        return $destination->getBySlug($this->slug);
    }
}
