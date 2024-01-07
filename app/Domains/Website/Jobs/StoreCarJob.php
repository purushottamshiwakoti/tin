<?php
namespace App\Domains\Website\Jobs;

use App\Data\Repositories\Contracts\CarInterface;
use App\Data\Repositories\Contracts\FlightBookingInterface;
use Lucid\Units\Job;

class StoreCarJob extends Job
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
    public function handle(CarInterface $booking)
    {
        return $booking->fillAndSave($this->data);
    }
}