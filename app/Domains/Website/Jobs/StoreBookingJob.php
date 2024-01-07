<?php
namespace App\Domains\Website\Jobs;

use App\Data\Repositories\Contracts\BookingInterface;
use Lucid\Units\Job;

class StoreBookingJob extends Job
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
    public function handle(BookingInterface $booking)
    {
        return $booking->storeBooking($this->data);
    }
}
