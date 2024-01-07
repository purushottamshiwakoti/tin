<?php
namespace App\Domains\Bookings\Jobs;

use App\Data\Repositories\Contracts\BookingInterface;
use Lucid\Units\Job;

class ValidateUpdateBookingSessionJob extends Job
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
        if(session()->has('booking_data'))
        {
            $booking_data = session()->get('booking_data');
            $booking_id = $booking_data['booking_id'];
            if($booking_id!=$this->id)
            {
                abort(404);
            }
            $booking = $booking->find($booking_data['booking_id']);
            return $booking;

        }
    }
}
