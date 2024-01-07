<?php
namespace App\Domains\Sliders\Jobs;

use App\Data\Repositories\Contracts\SliderInterface;
use Lucid\Units\Job;

class DatatablePaginateSlidersJob extends Job
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
     * Execute the job.
     *
     * @return void
     */
    public function handle(SliderInterface $slider)
    {
        return $slider->getDatatablePaginated($this->search,$this->limit);
    }
}
