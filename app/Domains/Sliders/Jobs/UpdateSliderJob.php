<?php
namespace App\Domains\Sliders\Jobs;

use App\Data\Repositories\Contracts\SliderInterface;
use Lucid\Units\Job;

class UpdateSliderJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;
    private $id;
    public function __construct($id, $data = [])
    {
        $this->data = $data;
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(SliderInterface $slider)
    {
        return $slider->update($this->id,$this->data);
    }
}
