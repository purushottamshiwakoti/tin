<?php
namespace App\Domains\Bookings\Jobs;

use App\Data\Repositories\Contracts\BookingInterface;
use Lucid\Units\Job;

class GetSingleBookingJob extends Job
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
    public function handle(BookingInterface $booking)
    {
        return $booking->find($this->id);
    }
}
