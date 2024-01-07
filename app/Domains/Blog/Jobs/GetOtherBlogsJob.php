<?php
namespace App\Domains\Blog\Jobs;

use App\Data\Repositories\Contracts\ActivityInterface;
use App\Data\Repositories\Contracts\BlogInterface;
use App\Data\Repositories\Contracts\TripInterface;
use Illuminate\Support\Collection;
use Lucid\Units\Job;

class GetOtherBlogsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @param TripInterface $trip
     * @param ActivityInterface $activity
     * @return Collection
     */
    public function handle(BlogInterface $blog)
    {
        // dd($this->id);
        return $blog->getOtherBlogs($this->id);



    }
}
