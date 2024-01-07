<?php
namespace App\Domains\TravelStyles\Jobs;

use App\Data\Repositories\Contracts\TravelStyleInterface;
use Lucid\Units\Job;

class StoreTravelStyleJob extends Job
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
     * @param TravelStyleInterface $travelStyle
     * @return bool
     */
    public function handle(TravelStyleInterface $travelStyle)
    {
        $result = $travelStyle->fillAndSave($this->data);

        return $result;
    }
}
