<?php
namespace App\Domains\Bookings\Jobs;

use App\Data\Repositories\Contracts\BookingInterface;
use Lucid\Units\Job;

class GetBookingByHashJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $hash;
    public function __construct($hash)
    {
        $this->hash = $hash;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(BookingInterface $booking)
    {
        return $booking->findBy('booking_hash',$this->hash);
    }
}
