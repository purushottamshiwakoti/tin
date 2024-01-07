<?php
namespace App\Domains\Website\Jobs;

use App\Data\Repositories\Contracts\HotelInterface;
use Lucid\Units\Job;

class StoreHotelBookingJob extends Job
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
    public function handle(HotelInterface $booking)
    {
        return $booking->fillAndSave($this->data);
    }
}