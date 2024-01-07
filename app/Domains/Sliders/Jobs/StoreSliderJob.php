<?php
namespace App\Domains\Sliders\Jobs;

use App\Data\Repositories\Contracts\SliderInterface;
use Lucid\Units\Job;

class StoreSliderJob extends Job
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
     * Execute the job.
     *
     * @return void
     */
    public function handle(SliderInterface $slider)
    {
        return $slider->fillAndSave($this->data);
    }
}
