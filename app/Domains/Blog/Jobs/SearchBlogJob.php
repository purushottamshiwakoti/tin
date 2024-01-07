<?php
namespace App\Domains\Blog\Jobs;

use App\Data\Repositories\Contracts\PostInterface;
use Lucid\Units\Job;

class SearchBlogJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $attributes;
    private $query;
    private $filters;
    public function __construct($attributes = [],$query,$filters = [])
    {
        $this->attributes = $attributes;
        $this->query = $query;
        $this->filters = $filters;
    }

    /**
     * @param TripInterface $trip
     * @return mixed
     */
    public function handle(PostInterface $blog)
    {
        $blogs = $blog->searchBlog($this->attributes,$this->query,$this->filters);
     
        return $blogs;
    }
}
