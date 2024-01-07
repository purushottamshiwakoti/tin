<?php
namespace App\Domains\Testimonials\Jobs;

use App\Data\Repositories\Contracts\TeamInterface;
use App\Data\Repositories\Contracts\TestimonialInterface;
use Lucid\Units\Job;

class DatatablePaginateTestimonialJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */

    private $search;
    private $limit;
    public function __construct($search = [],$limit = 20)
    {
        $this->search = $search;
        $this->limit = $limit;
    }

    /**
     * @param TestimonialInterface $testimonialInterface
     * @return mixed
     */
    public function handle(TestimonialInterface $testimonialInterface)
    {
        return $testimonialInterface->getDatatablePaginated($this->search,$this->limit);
    }
}