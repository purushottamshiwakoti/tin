<?php
namespace App\Domains\Testimonials\Jobs;

use App\Data\Repositories\Contracts\DestinationInterface;
use App\Data\Repositories\Contracts\TeamInterface;
use App\Data\Repositories\Contracts\TestimonialInterface;
use App\Data\Repositories\Contracts\TravelStyleInterface;
use Lucid\Units\Job;

class UpdateTestimonialJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */

    private $data;
    private $id;
    public function __construct($id,$data = [])
    {
        $this->id = $id;
        $this->data = $data;
    }

    /**
     * @param TestimonialInterface $teamInterface
     * @return bool
     */
    public function handle(TestimonialInterface $testimonialInterface)
    {
        $result = $testimonialInterface->update($this->id,$this->data);
        return $result;
    }
}
