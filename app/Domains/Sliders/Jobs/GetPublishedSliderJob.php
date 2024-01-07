<?php
namespace App\Domains\Sliders\Jobs;

use App\Data\Repositories\Contracts\SliderInterface;
use Lucid\Units\Job;

class GetPublishedSliderJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(SliderInterface $slider)
    {
        return $slider->getByScope(['published','ordered']);
    }
}
