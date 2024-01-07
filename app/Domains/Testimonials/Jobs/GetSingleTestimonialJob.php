<?php
namespace App\Domains\Testimonials\Jobs;

use App\Data\Repositories\Contracts\DestinationInterface;
use App\Data\Repositories\Contracts\TeamInterface;
use App\Data\Repositories\Contracts\TestimonialInterface;
use App\Data\Repositories\Contracts\TravelStyleInterface;
use Lucid\Units\Job;

class GetSingleTestimonialJob extends Job
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
     * @param TestimonialInterface $testimonialInterface
     * @return mixed
     */
    public function handle(TestimonialInterface $testimonialInterface)
    {
        return $testimonialInterface->find($this->id);
    }
}
