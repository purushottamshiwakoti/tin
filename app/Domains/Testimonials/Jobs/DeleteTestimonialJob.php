<?php
namespace App\Domains\Testimonials\Jobs;

use App\Data\Repositories\Contracts\TestimonialInterface;
use Lucid\Units\Job;

class DeleteTestimonialJob extends Job
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
     * @return mixed
     */
    public function handle(TestimonialInterface $testimonialInterface)
    {
        return $testimonialInterface->remove($this->id);
    }
}
