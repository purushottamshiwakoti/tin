<?php
namespace App\Domains\Bookings\Jobs;

use App\Data\Repositories\Contracts\BookingInterface;
use Lucid\Units\Job;

class ValidateBookingSessionJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $trip;
    private $departure;
    public function __construct($trip,$departure)
    {
        $this->trip = $trip;
        $this->departure = $departure;
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
            try{
                $booking = $booking->find($booking_data['booking_id']);
                if($booking->status == 'incomplete' && $booking->trip_id ==$this->trip->id && $booking->departure_id == $this->departure->id)
                {
                    return $booking;
                }else{
                    session()->forget('booking_data');
                }
            }catch (\Exception $e)
            {
                session()->forget('booking_data');
            }

        }
    }
}
