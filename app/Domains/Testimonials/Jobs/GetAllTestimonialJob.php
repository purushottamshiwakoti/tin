<?php
namespace App\Domains\Testimonials\Jobs;

use App\Data\Repositories\Contracts\TestimonialInterface;
use Lucid\Units\Job;

class GetAllTestimonialJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $scopes;
    public function __construct($scopes = ['published'])
    {
        $this->scopes = $scopes;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(TestimonialInterface $testimonialInterface)
    {
        return $testimonialInterface->getByScope($this->scopes);
    }
    
}
