<?php
namespace App\Domains\Sliders\Jobs;

use App\Data\Repositories\Contracts\SliderInterface;
use Lucid\Units\Job;

class DeleteSlidersJob extends Job
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
     * Execute the job.
     *
     * @return void
     */
    public function handle(SliderInterface $slider)
    {
        return $slider->remove($this->id);
    }
}
