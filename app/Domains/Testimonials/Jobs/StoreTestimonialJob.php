<?php
namespace App\Domains\Testimonials\Jobs;

use App\Data\Repositories\Contracts\TeamInterface;
use App\Data\Repositories\Contracts\TestimonialInterface;
use App\Data\Repositories\Contracts\TravelStyleInterface;
use Lucid\Units\Job;

class StoreTestimonialJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;
    
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * @param TestimonialInterface $testimonialInterface
     * @return bool
     */
    public function handle(TestimonialInterface $testimonialInterface)
    {
        $result = $testimonialInterface->fillAndSave($this->data);

        return $result;
    }
}
